<?php
declare(strict_types=1);

$curriculum = require __DIR__ . '/data/curriculum.php';
$reference = require __DIR__ . '/data/guides.php';
$visualizations = require __DIR__ . '/data/visualizations.php';
require __DIR__ . '/views/learning-examples.php';
$stages = $curriculum['stages'];
$lessons = $curriculum['lessons'];
$guides = $reference['guides'];
$tools = $reference['tools'];

foreach (['lessons-foundation.php', 'lessons-advanced.php'] as $file) {
    $lessons = array_merge($lessons, require __DIR__ . '/data/' . $file);
}
$enrichment = require __DIR__ . '/data/lesson-enrichment.php';
foreach ($lessons as &$entry) {
    $extra = $enrichment[$entry['id']] ?? [];
    $entry['sections'] = array_merge($entry['sections'], $extra['extra_sections'] ?? []);
    $entry['minutes'] += $extra['minutes_extra'] ?? 0;
    foreach (['walkthrough', 'mistakes', 'practice', 'sources'] as $field) {
        if (isset($extra[$field])) $entry[$field] = $extra[$field];
    }
}
unset($entry);
$lessonOrder = [
    'cara-kerja-program', 'instalasi-dotnet', 'variabel-tipe-data', 'input-output', 'string-formatting',
    'konversi-validasi', 'percabangan-perulangan', 'array-koleksi', 'method-parameter', 'debugging-dasar',
    'class-object', 'properties-encapsulation', 'prinsip-oop', 'interface-abstract', 'struct-enum-record',
    'komposisi-objek', 'exception-handling', 'prinsip-solid', 'proyek-perpustakaan',
    'generics', 'nullable-reference', 'delegates-events-lambda', 'linq', 'linq-lanjutan',
    'async-await', 'cancellation-token', 'file-json', 'httpclient-api', 'proyek-pengeluaran',
    'pilih-spesialisasi', 'sql-relasional', 'entity-framework', 'rest-crud', 'design-pattern',
    'dependency-injection', 'unit-testing-clean-code', 'blazor-pertama', 'unity-pertama', 'wpf-pertama', 'deployment',
];
$lessonRanks = array_flip($lessonOrder);
usort($lessons, static fn(array $a, array $b): int => ($lessonRanks[$a['id']] ?? PHP_INT_MAX) <=> ($lessonRanks[$b['id']] ?? PHP_INT_MAX));

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function query(string $key, string $default = ''): string
{
    $value = $_GET[$key] ?? $default;
    return is_string($value) ? trim(substr($value, 0, 300)) : $default;
}

function url(string $page, array $params = []): string
{
    $link = 'index.php?' . http_build_query(['page' => $page] + $params, '', '&', PHP_QUERY_RFC3986);
    return $page === 'roadmap' && isset($params['stage']) ? $link . '#path-heading' : $link;
}

function icon(string $name, string $class = ''): string
{
    $paths = [
        'route' => '<circle cx="6" cy="5" r="2"/><path d="M8 5h8a4 4 0 0 1 0 8H8a4 4 0 0 0 0 8h8"/><circle cx="18" cy="21" r="2"/>',
        'book' => '<path d="M12 5v16M3 3h5a4 4 0 0 1 4 2 4 4 0 0 1 4-2h5v16h-5a4 4 0 0 0-4 2 4 4 0 0 0-4-2H3z"/>',
        'code' => '<path d="m8 7-5 5 5 5m8-10 5 5-5 5m-3-13-2 16"/>',
        'tools' => '<path d="M14 6a5 5 0 0 0-6 6l-5 5a2.1 2.1 0 0 0 3 3l5-5a5 5 0 0 0 6-6l-3 3-3-3z"/>',
        'search' => '<circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/>',
        'arrow' => '<path d="M4 12h16m-6-6 6 6-6 6"/>',
        'chevron' => '<path d="m9 5 7 7-7 7"/>',
        'down' => '<path d="m6 9 6 6 6-6"/>',
        'terminal' => '<rect x="3" y="4" width="18" height="16" rx="3"/><path d="m7 9 3 3-3 3m6 0h4"/>',
        'layers' => '<path d="m12 3 10 5-10 5L2 8zM2 12l10 5 10-5M2 16l10 5 10-5"/>',
        'bolt' => '<path d="m13 2-9 12h7l-1 8 10-12h-7z"/>',
        'rocket' => '<path d="M12 16c6-3 8-7 8-13-6 0-10 2-13 8m5 5-5-5m5 5v5l4-3v-5M7 11H2l3-4h5M4 16l-2 6 6-2"/><circle cx="15" cy="8" r="1"/>',
        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'check' => '<path d="m5 12 4 4L19 6"/>',
        'menu' => '<path d="M4 6h16M4 12h16M4 18h16"/>',
        'x' => '<path d="m6 6 12 12M6 18 18 6"/>',
        'external' => '<path d="M14 3h7v7m-1-6-10 10M10 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5"/>',
        'bulb' => '<path d="M9 18h6m-5 3h4M8 14a6 6 0 1 1 8 0c-1 1-1 2-1 2H9s0-1-1-2"/>',
        'compass' => '<circle cx="12" cy="12" r="9"/><path d="m16 8-3 5-5 3 3-5z"/>',
        'info' => '<circle cx="12" cy="12" r="9"/><path d="M12 11v6m0-10v.1"/>',
        'copy' => '<rect x="8" y="8" width="13" height="13" rx="2"/><path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"/>',
        'scale' => '<path d="M12 3v18m-5 0h10M4 7h16M5 7l-3 7h6zm14 0-3 7h6z"/>',
        'spark' => '<path d="m12 3 3 6 6 3-6 3-3 6-3-6-6-3 6-3z"/>',
        'play' => '<path d="m8 4 12 8-12 8z"/>',
    ];
    return '<svg class="icon ' . e($class) . '" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($paths[$name] ?? $paths['book']) . '</svg>';
}

function stageLessons(string $id): array
{
    global $lessons;
    return array_values(array_filter($lessons, fn(array $lesson): bool => $lesson['stage'] === $id));
}

function findLesson(string $id): ?array
{
    global $lessons;
    foreach ($lessons as $lesson) {
        if ($lesson['id'] === $id) return $lesson;
    }
    return null;
}

function findStage(string $id): ?array
{
    global $stages;
    foreach ($stages as $stage) {
        if ($stage['id'] === $id) return $stage;
    }
    return null;
}

function searchContent(string $q): array
{
    global $lessons, $guides, $tools;
    if ($q === '') return [];
    $results = [];
    $matches = static function (array $record) use ($q): bool {
        return stripos(json_encode($record, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), $q) !== false;
    };
    foreach ($lessons as $lesson) {
        if ($matches($lesson)) $results[] = ['title' => $lesson['title'], 'summary' => $lesson['summary'], 'type' => 'Materi · ' . (findStage($lesson['stage'])['label'] ?? ''), 'url' => url('materi', ['id' => $lesson['id']])];
    }
    foreach ($guides as $id => $guide) {
        if ($matches($guide)) $results[] = ['title' => $guide['title'], 'summary' => $guide['summary'], 'type' => 'Panduan', 'url' => url($id)];
    }
    foreach ($tools as $tool) {
        if ($matches($tool)) $results[] = ['title' => $tool['name'], 'summary' => $tool['description'], 'type' => 'Tools · ' . $tool['category'], 'url' => url('tools', ['category' => $tool['category']])];
    }
    return $results;
}

function codeBlock(string $code, string $label = 'C#'): void
{
    ?>
    <div class="code-block">
        <div class="code-toolbar"><span><?= icon('code') ?> <?= e($label) ?></span><button class="copy-button" type="button" data-copy><?= icon('copy') ?><span>Salin kode</span></button></div>
        <pre tabindex="0" aria-label="Contoh kode <?= e($label) ?>"><code><?= e($code) ?></code></pre>
    </div>
    <?php
}
