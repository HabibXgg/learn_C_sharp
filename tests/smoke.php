<?php
declare(strict_types=1);

// Run from the project directory: php tests/smoke.php
error_reporting(E_ALL);
set_error_handler(static function (int $severity, string $message, string $file, int $line): never {
    throw new ErrorException($message, 0, $severity, $file, $line);
});
require dirname(__DIR__) . '/app/bootstrap.php';

$checks = 0;
$failures = [];
$check = static function (bool $condition, string $label) use (&$checks, &$failures): void {
    $checks++;
    if (!$condition) $failures[] = $label;
};
$textFields = static function (array $record, array $keys, string $label) use ($check): void {
    foreach ($keys as $key) {
        $check(isset($record[$key]) && is_string($record[$key]) && trim($record[$key]) !== '', "$label.$key must contain text");
    }
};
$textList = static function (mixed $values, string $label) use ($check): void {
    $check(is_array($values) && count($values) > 0, "$label must be a nonempty list");
    if (!is_array($values)) return;
    foreach ($values as $index => $value) {
        $check(is_string($value) && trim($value) !== '', "$label.$index must contain text");
    }
};
$https = static function (mixed $value): bool {
    return is_string($value) && filter_var($value, FILTER_VALIDATE_URL) !== false && parse_url($value, PHP_URL_SCHEME) === 'https';
};

$expectedStageIds = ['fondasi', 'oop', 'lanjutan', 'spesialisasi'];
$expectedLessonIds = [
    'instalasi-dotnet', 'variabel-tipe-data', 'percabangan-perulangan', 'array-koleksi', 'method-parameter',
    'class-object', 'prinsip-oop', 'interface-abstract', 'exception-handling',
    'generics', 'delegates-events-lambda', 'linq', 'async-await', 'file-json',
    'pilih-spesialisasi', 'design-pattern', 'unit-testing-clean-code', 'entity-framework', 'deployment',
];
$check(count($stages) === 4, 'Roadmap must contain four stages');
$check(count($lessons) === 40, 'Expanded curriculum must contain forty lessons');
$check(array_column($stages, 'id') === $expectedStageIds, 'Stage IDs/order must preserve the published roadmap');
$check(array_diff($expectedLessonIds, array_column($lessons, 'id')) === [], 'Expansion must preserve every previously published lesson link');
$check(array_column($lessons, 'id') === $lessonOrder, 'Every ordered lesson must exist and next/previous navigation must follow the curriculum');
$check(count(array_unique(array_column($lessons, 'id'))) === count($lessons), 'Lesson IDs must be unique');

foreach ($stages as $index => $stage) {
    $textFields($stage, ['id', 'label', 'level', 'description', 'icon', 'project'], "stage.$index");
    $check(($stage['number'] ?? null) === $index + 1, "stage.$index must have the correct number");
    $check(count(stageLessons($stage['id'])) === [10, 9, 10, 11][$index], "stage.$index must contain its complete expanded lessons");
    $check(findStage($stage['id']) === $stage, "stage.$index lookup must resolve");
}
foreach ($lessons as $index => $lesson) {
    $label = 'lesson.' . ($lesson['id'] ?? $index);
    $textFields($lesson, ['id', 'stage', 'title', 'summary', 'analogy', 'code', 'output', 'exercise', 'solution', 'source'], $label);
    $check(preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $lesson['id']) === 1, "$label must have a URL-safe slug");
    $check(findStage($lesson['stage']) !== null, "$label must reference an existing stage");
    $check(findLesson($lesson['id']) === $lesson, "$label lookup must resolve");
    $check(is_int($lesson['minutes'] ?? null) && $lesson['minutes'] > 0, "$label must have a positive duration");
    $textList($lesson['objectives'] ?? null, "$label.objectives");
    $textList($lesson['takeaways'] ?? null, "$label.takeaways");
    $check(isset($lesson['sections']) && is_array($lesson['sections']) && count($lesson['sections']) > 0, "$label must have sections");
    foreach ($lesson['sections'] ?? [] as $sectionIndex => $section) {
        $textFields($section, ['heading', 'body'], "$label.section.$sectionIndex");
    }
    $check(count($lesson['sections']) >= 5, "$label must include substantive sections beyond the original outline");
    $check(count($lesson['walkthrough'] ?? []) >= 3, "$label must include a code walkthrough");
    foreach ($lesson['walkthrough'] ?? [] as $step) $textFields($step, ['title', 'explanation'], "$label.walkthrough");
    $check(count($lesson['mistakes'] ?? []) >= 2, "$label must explain common mistakes");
    foreach ($lesson['mistakes'] ?? [] as $mistake) $textFields($mistake, ['title', 'body'], "$label.mistake");
    $check(count($lesson['practice'] ?? []) >= 2, "$label must include extra exercises with solutions");
    foreach ($lesson['practice'] ?? [] as $practice) $textFields($practice, ['title', 'task', 'hint', 'answer'], "$label.practice");
    foreach ($lesson['sources'] ?? [] as $source) {
        $textFields($source, ['label', 'url'], "$label.source");
        $check($https($source['url']), "$label sources must link to HTTPS");
    }
    $check($https($lesson['source']), "$label must link to an HTTPS source");
}

foreach ($visualizations as $id => $visual) {
    $textFields($visual, ['title', 'intro', 'full_code'], "visual.$id");
    $check(count($visual['frames']) >= 3, "visual.$id must have a meaningful sequence");
    foreach ($visual['lessons'] as $lessonId) $check(findLesson($lessonId) !== null, "visual.$id must reference a real lesson");
    foreach ($visual['frames'] as $frame) {
        $textFields($frame, ['title', 'code', 'explanation', 'output'], "visual.$id.frame");
        foreach ($frame['cells'] as $cell) $textFields($cell, ['label', 'value'], "visual.$id.cell");
    }
}
$check($visualizations['variables']['frames'][4]['cells'][2]['value'] === '48000', 'Variable demo must recompute 12000 times 4');
$check($visualizations['loop']['frames'][5]['output'] === '6', 'Loop demo must sum even numbers 2 and 4');
$check($visualizations['linq']['frames'][5]['output'] === '20, 40', 'LINQ demo must filter then project without changing the source');

$check(array_keys($guides) === ['tentang-csharp', 'kelebihan-kekurangan', 'fitur-csharp', 'tentang'], 'Four guide routes must match navigation');
foreach ($guides as $id => $guide) {
    $textFields($guide, ['title', 'eyebrow', 'summary'], "guide.$id");
    $check(isset($guide['sections']) && is_array($guide['sections']) && count($guide['sections']) > 0, "guide.$id must have sections");
    foreach ($guide['sections'] ?? [] as $index => $section) {
        $textFields($section, ['heading', 'body', 'analogy'], "guide.$id.section.$index");
    }
    $check(isset($guide['sources']) && is_array($guide['sources']) && count($guide['sources']) > 0, "guide.$id must have sources");
    foreach ($guide['sources'] ?? [] as $index => $source) {
        $textFields($source, ['label', 'url'], "guide.$id.source.$index");
        $check($https($source['url']), "guide.$id.source.$index must use HTTPS");
    }
}
$check(count($tools) === 20, 'MVP tools directory must contain twenty entries');
foreach ($tools as $index => $tool) {
    $textFields($tool, ['name', 'category', 'level', 'mark', 'description', 'analogy', 'url'], "tool.$index");
    $check($https($tool['url']), "tool.$index must link to HTTPS documentation");
}

$linqResults = searchContent('LINQ');
$check(count($linqResults) > 0, 'LINQ search must return results');
$check(in_array(url('materi', ['id' => 'linq']), array_column($linqResults, 'url'), true), 'LINQ search must include the actual LINQ lesson');
$check(searchContent('linq') === $linqResults, 'Search must be case insensitive');
$check(searchContent('') === [], 'Empty search must not list all content');
$check(searchContent('zzzz-no-such-topic-9150') === [], 'Unknown search must have no results');
$check(findLesson('missing-lesson') === null, 'Unknown lesson must return null for 404 handling');
$check(findStage('missing-stage') === null, 'Unknown stage must return null for filter fallback');
$check(stageLessons('missing-stage') === [], 'Unknown stage must return no lessons');

$_GET = ['page' => ['materi'], 'id' => ['nested' => 'linq'], 'q' => ['<script>alert(1)</script>']];
$check(query('page', 'roadmap') === 'roadmap', 'Array page input must fall back safely');
$check(query('id') === '', 'Nested array ID input must be rejected');
$check(query('q') === '', 'Array search input must be rejected');
$_GET = ['q' => '  LINQ  ', 'long' => str_repeat('a', 301)];
$check(query('q') === 'LINQ', 'Query values must be trimmed');
$check(query('missing', 'fallback') === 'fallback', 'Missing query must honor its default');
$check(strlen(query('long')) === 300, 'Query values must be bounded');
$_GET = [];

$payload = '"><script>alert(1)</script>&\'';
$escaped = e($payload);
$check(!str_contains($escaped, '<') && !str_contains($escaped, '>') && !str_contains($escaped, '"') && !str_contains($escaped, "'"), 'HTML escaping must neutralize markup and both quote styles');
$check(htmlspecialchars_decode($escaped, ENT_QUOTES) === $payload, 'HTML escaping must preserve the displayed value');
$check(e("\xC3") !== '', 'Malformed UTF-8 must be substituted safely');
$link = url('cari', ['q' => $payload]);
parse_str((string) parse_url($link, PHP_URL_QUERY), $linkParams);
$check(($linkParams['q'] ?? '') === $payload && ($linkParams['page'] ?? '') === 'cari', 'URL builder must encode arbitrary search values without changing route');
$check(str_contains(e($link), '&amp;') && !str_contains(e($link), '<'), 'Built URLs must remain safe after HTML escaping');
$check(url('roadmap', ['page' => 'materi']) === 'index.php?page=roadmap', 'Extra parameters must not overwrite the intended route');

if ($failures !== []) {
    fwrite(STDERR, implode(PHP_EOL, array_map(static fn(string $failure): string => 'FAIL: ' . $failure, $failures)) . PHP_EOL);
    fwrite(STDERR, count($failures) . " failed out of $checks checks." . PHP_EOL);
    exit(1);
}
echo "PASS: $checks checks; 4 stages, 40 lessons, 5 visualizations, 4 guides, 20 tools; enriched content, search, routing inputs, escaping." . PHP_EOL;
