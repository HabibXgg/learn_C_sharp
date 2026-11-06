<?php
declare(strict_types=1);

// Run: php tests/http-smoke.php [http://127.0.0.1:8080]
// The web server must already be running. Uses PHP streams; no cURL or packages.
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$baseUrl = rtrim($argv[1] ?? 'http://127.0.0.1:8080', '/');
$baseParts = parse_url($baseUrl);
if ($baseParts === false || !in_array($baseParts['scheme'] ?? '', ['http', 'https'], true)
    || empty($baseParts['host']) || isset($baseParts['query']) || isset($baseParts['fragment'])
    || isset($baseParts['user']) || isset($baseParts['pass'])) {
    fwrite(STDERR, "Use an HTTP(S) base directory URL without credentials, query, or fragment.\n");
    exit(2);
}
if (!filter_var(ini_get('allow_url_fopen'), FILTER_VALIDATE_BOOLEAN)) {
    fwrite(STDERR, "HTTP smoke requires allow_url_fopen=1 (standard PHP HTTP streams).\n");
    exit(2);
}

require dirname(__DIR__) . '/app/bootstrap.php';
if (count($lessons) !== 40 || count($guides) !== 4) {
    fwrite(STDERR, 'FAIL: complete manifest required; found ' . count($lessons) . ' lessons and ' . count($guides) . " guides.\n");
    exit(1);
}

$checks = 0;
$cases = 0;
$failures = [];
$check = static function (bool $condition, string $label) use (&$checks, &$failures): void {
    $checks++;
    if (!$condition) $failures[] = $label;
};

/** @return array{status:int, headers:array<string,string>, body:string, error:string} */
$request = static function (string $path) use ($baseUrl, &$cases): array {
    $cases++;
    $warning = '';
    $context = stream_context_create(['http' => [
        'method' => 'GET', 'timeout' => 8, 'ignore_errors' => true,
        'follow_location' => 0, 'protocol_version' => 1.1,
        'header' => "Accept: */*\r\nConnection: close\r\nUser-Agent: ZeroToHero-HTTP-Smoke\r\n",
    ]]);
    set_error_handler(static function (int $severity, string $message) use (&$warning): bool {
        $warning = $message;
        return true;
    });
    try {
        $stream = fopen($baseUrl . '/' . ltrim($path, '/'), 'rb', false, $context);
        if ($stream === false) return ['status' => 0, 'headers' => [], 'body' => '', 'error' => $warning];
        $body = stream_get_contents($stream);
        $metadata = stream_get_meta_data($stream);
        fclose($stream);
    } finally {
        restore_error_handler();
    }
    $status = 0;
    $headers = [];
    foreach ($metadata['wrapper_data'] ?? [] as $line) {
        if (preg_match('~^HTTP/\S+\s+(\d{3})~i', $line, $match) === 1) {
            $status = (int) $match[1];
            $headers = [];
        } elseif (str_contains($line, ':')) {
            [$name, $value] = explode(':', $line, 2);
            $headers[strtolower(trim($name))] = trim($value);
        }
    }
    return ['status' => $status, 'headers' => $headers, 'body' => $body === false ? '' : $body,
        'error' => !empty($metadata['timed_out']) ? 'Response timed out' : $warning];
};

$html = static function (string $path, int $expectedStatus, string $label) use ($request, $check): string {
    $response = $request($path);
    $check($response['error'] === '', "$label: request completed " . $response['error']);
    $check($response['status'] === $expectedStatus, "$label: expected HTTP $expectedStatus, got {$response['status']}");
    $type = strtolower($response['headers']['content-type'] ?? '');
    $check(str_contains($type, 'text/html') && str_contains($type, 'utf-8'), "$label: HTML UTF-8 content type");
    $check(strtolower($response['headers']['x-content-type-options'] ?? '') === 'nosniff', "$label: nosniff header");
    $check(($response['headers']['referrer-policy'] ?? '') === 'strict-origin-when-cross-origin', "$label: referrer policy");
    $csp = $response['headers']['content-security-policy'] ?? '';
    $check(str_contains($csp, "script-src 'self'") && str_contains($csp, "object-src 'none'"), "$label: script/object CSP");
    $body = $response['body'];
    $check(str_contains($body, '<!doctype html>') && str_contains($body, '</html>'), "$label: complete HTML document");
    $check(preg_match('~(?:<b>)?(?:Fatal error|Parse error)(?:</b>)?:|(?:<b>)?(?:Warning|Notice|Deprecated)(?:</b>)?:[^\r\n]*(?: on line |<b>[^<]+</b> on line )~i', $body) === 0,
        "$label: no PHP error output");
    $check(str_contains($body, 'assets/learning.js') && str_contains($body, 'assets/learning.css'), "$label: learning assets linked");
    return $body;
};

$roadmap = $html(url('roadmap'), 200, 'roadmap');
$check(substr_count($roadmap, 'class="lesson-row"') === 40, 'roadmap: all forty lessons rendered');
foreach ($stages as $stage) {
    $body = $html(url('roadmap', ['stage' => $stage['id']]), 200, 'stage ' . $stage['id']);
    $check(substr_count($body, 'class="lesson-row"') === count(stageLessons($stage['id'])), 'stage ' . $stage['id'] . ': only selected lessons rendered');
}

foreach ($lessons as $lesson) {
    $label = 'lesson ' . $lesson['id'];
    $body = $html(url('materi', ['id' => $lesson['id']]), 200, $label);
    $check(str_contains($body, '<h1>' . e($lesson['title']) . '</h1>'), "$label: correct title");
    foreach (['contoh', 'bedah-kode', 'kesalahan-umum', 'latihan', 'latihan-lanjutan', 'rangkuman', 'referensi'] as $sectionId) {
        $check(str_contains($body, 'id="' . $sectionId . '"'), "$label: section $sectionId rendered");
    }
    $check(str_contains($body, 'id="bagian-' . (count($lesson['sections']) - 1) . '"'), "$label: final content section rendered");
    $check(substr_count($body, 'class="practice-card"') === count($lesson['practice']), "$label: all practice cards rendered");
    foreach ($lesson['walkthrough'] as $step) {
        $check(str_contains($body, e($step['explanation'])), "$label: walkthrough explanation rendered");
    }
    foreach ($lesson['sources'] as $source) {
        $check(str_contains($body, 'href="' . e($source['url']) . '"'), "$label: reference URL rendered");
    }
    $check(str_contains($body, '<code>' . e($lesson['code']) . '</code>'), "$label: complete code rendered as escaped text");
    $check(str_contains($body, 'data-reading-progress') && str_contains($body, 'data-kind="walkthrough"'), "$label: reading and walkthrough controls present");
}

foreach ($guides as $id => $guide) {
    $body = $html(url($id), 200, 'guide ' . $id);
    $check(str_contains($body, '<h1>' . e($guide['title']) . '</h1>'), 'guide ' . $id . ': correct title');
    $check(str_contains($body, 'id="bagian-' . (count($guide['sections']) - 1) . '"'), 'guide ' . $id . ': all sections rendered');
    foreach ($guide['sources'] as $source) {
        $check(str_contains($body, 'href="' . e($source['url']) . '"'), 'guide ' . $id . ': reference rendered');
    }
}

$toolsBody = $html(url('tools'), 200, 'tools');
$check(substr_count($toolsBody, 'class="tool-card"') === count($tools), 'tools: complete directory rendered');
$categories = array_values(array_unique(array_column($tools, 'category')));
foreach ($categories as $category) {
    $body = $html(url('tools', ['category' => $category]), 200, 'tools category ' . $category);
    $expectedTools = array_values(array_filter($tools, static fn(array $tool): bool => $tool['category'] === $category));
    $check(substr_count($body, 'class="tool-card"') === count($expectedTools), 'category ' . $category . ': filtered count');
    foreach ($expectedTools as $tool) {
        $check(str_contains($body, '<h2>' . e($tool['name']) . '</h2>'), 'category ' . $category . ': expected tool ' . $tool['name']);
    }
}
$body = $html(url('tools', ['category' => 'unknown-category']), 200, 'unknown tool category');
$check(substr_count($body, 'class="tool-card"') === count($tools), 'unknown category: fallback to complete directory');

// Search every newly added title through the real HTTP route, not only the PHP helper.
$originalIds = [
    'instalasi-dotnet', 'variabel-tipe-data', 'percabangan-perulangan', 'array-koleksi', 'method-parameter',
    'class-object', 'prinsip-oop', 'interface-abstract', 'exception-handling', 'generics',
    'delegates-events-lambda', 'linq', 'async-await', 'file-json', 'pilih-spesialisasi',
    'design-pattern', 'unit-testing-clean-code', 'entity-framework', 'deployment',
];
$newLessons = array_values(array_filter($lessons, static fn(array $lesson): bool => !in_array($lesson['id'], $originalIds, true)));
foreach ($newLessons as $lesson) {
    $body = $html(url('cari', ['q' => $lesson['title']]), 200, 'search ' . $lesson['id']);
    $expectedLink = '<a class="search-result" href="' . e(url('materi', ['id' => $lesson['id']])) . '"';
    $check(str_contains($body, $expectedLink), 'search ' . $lesson['id'] . ': actual lesson result linked');
}
$body = $html(url('cari', ['q' => 'zzzz-http-smoke-no-topic-7419']), 200, 'search no results');
$check(str_contains($body, 'Belum ada hasil yang cocok.') && !str_contains($body, 'class="search-result"'), 'unmatched search: useful empty state');
$body = $html(url('cari'), 200, 'search empty');
$check(str_contains($body, 'Mau belajar apa hari ini?'), 'empty search: guidance shown');

foreach ([url('missing-page'), url('materi', ['id' => 'missing-lesson']), url('materi')] as $path) {
    $body = $html($path, 404, '404 ' . $path);
    $check(str_contains($body, 'class="error-number">404</div>'), '404: helpful app page at ' . $path);
}

$arrayCases = [
    ['page' => ['materi']],
    ['page' => 'materi', 'id' => ['linq']],
    ['page' => 'materi', 'id' => ['nested' => ['linq']]],
    ['page' => 'cari', 'q' => ['<script>alert(7419)</script>']],
    ['page' => 'tools', 'category' => ['IDE']],
    ['page' => 'roadmap', 'stage' => ['fondasi']],
];
foreach ($arrayCases as $index => $params) {
    $path = 'index.php?' . http_build_query($params, '', '&', PHP_QUERY_RFC3986);
    $body = $html($path, in_array($index, [1, 2], true) ? 404 : 200, 'array input ' . ($index + 1));
    $check(!str_contains($body, '<script>alert(7419)</script>'), 'array input: script is not reflected as markup');
    if ($index === 0 || $index === 5) $check(substr_count($body, 'class="lesson-row"') === 40, 'array input: roadmap fallback');
    if ($index === 3) $check(str_contains($body, 'Mau belajar apa hari ini?'), 'array query: empty search fallback');
    if ($index === 4) $check(substr_count($body, 'class="tool-card"') === count($tools), 'array category: complete directory fallback');
}

$payload = '"><script>alert(7419)</script><img src=x onerror=alert(7419)>&\'';
$body = $html(url('cari', ['q' => $payload]), 200, 'XSS search');
$check(str_contains($body, 'value="' . e($payload) . '"'), 'XSS search: escaped input value retains original text');
$check(!str_contains($body, '<script>alert(7419)</script>') && !str_contains($body, '<img src=x onerror=alert(7419)>'), 'XSS search: no executable injected markup');
foreach ([url($payload), url('materi', ['id' => $payload])] as $path) {
    $body = $html($path, 404, 'XSS unknown route');
    $check(!str_contains($body, $payload), 'XSS route: untrusted markup not reflected');
}

foreach (['learning.js' => ['javascript', 'prefers-reduced-motion'], 'learning.css' => ['text/css', '.walkthrough']] as $asset => [$type, $marker]) {
    $response = $request('assets/' . $asset . '?v=http-smoke');
    $check($response['error'] === '' && $response['status'] === 200, "$asset: successful request");
    $check(str_contains(strtolower($response['headers']['content-type'] ?? ''), $type), "$asset: correct MIME type");
    $check(str_contains($response['body'], $marker) && !str_contains($response['body'], '<!doctype html>'), "$asset: actual interaction asset served");
    $localAsset = file_get_contents(dirname(__DIR__) . '/public/assets/' . $asset);
    $check($localAsset !== false && hash('sha256', $response['body']) === hash('sha256', $localAsset), "$asset: served bytes match current workspace");
}

if ($failures !== []) {
    foreach ($failures as $failure) fwrite(STDERR, 'FAIL: ' . $failure . PHP_EOL);
    fwrite(STDERR, count($failures) . " failures; $cases HTTP cases, $checks checks. Base: $baseUrl\n");
    exit(1);
}
echo "PASS: $cases HTTP cases, $checks checks; 40 lessons, 4 guides, " . count($categories)
    . ' tool categories, ' . count($newLessons) . " new-topic searches, filters, 404, array/XSS inputs, learning assets. Base: $baseUrl\n";
