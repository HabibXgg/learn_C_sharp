<?php
declare(strict_types=1);
require dirname(__DIR__) . '/app/bootstrap.php';
header('Content-Type: text/html; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Content-Security-Policy: default-src 'self'; style-src 'self' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:; script-src 'self'; object-src 'none'; base-uri 'self'; frame-ancestors 'self'");

$page = query('page', 'roadmap');
$lesson = $page === 'materi' ? findLesson(query('id')) : null;
$allowedPages = array_merge(['roadmap', 'materi', 'tools', 'cari', 'praktik-api'], array_keys($guides));
if (!in_array($page, $allowedPages, true) || ($page === 'materi' && !$lesson)) {
    $page = '404';
    http_response_code(404);
}
$pageTitle = match ($page) {
    'roadmap' => 'Roadmap Belajar', 'materi' => $lesson['title'], 'tools' => 'Tools & Ekosistem',
    'cari' => 'Cari Materi', 'praktik-api' => 'Praktik API Chinook', '404' => 'Halaman tidak ditemukan', default => $guides[$page]['title'],
};
$description = $lesson['summary'] ?? $guides[$page]['summary'] ?? 'Belajar C# dari nol dengan roadmap terstruktur, analogi sehari-hari, contoh kode, dan latihan. Mulai perjalananmu menjadi developer.';
$firstLesson = $lessons[0];
$selectedStage = query('stage');
if (!findStage($selectedStage)) $selectedStage = '';
$searchQuery = query('q');
$navItems = [
    ['roadmap', 'Roadmap Belajar', 'route'], ['tentang-csharp', 'Apa itu C#?', 'compass'],
    ['kelebihan-kekurangan', 'Kelebihan & Kekurangan', 'scale'], ['fitur-csharp', 'Fitur C#', 'spark'], ['praktik-api', 'Praktik API Chinook', 'terminal'], ['tools', 'Tools & Ekosistem', 'tools'],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($description) ?>">
    <meta name="theme-color" content="#6D42D8">
    <title><?= e($pageTitle) ?> — Zero to Hero with C#</title>
    <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;450;500;550;600;650;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/app.css?v=2">
    <link rel="stylesheet" href="assets/learning.css?v=2">
    <link rel="stylesheet" href="assets/practice.css?v=1">
    <script src="assets/app.js?v=2" defer></script>
    <script src="assets/learning.js?v=2" defer></script>
</head>
<body>
<a class="skip-link" href="#main">Langsung ke konten</a>
<div class="mobile-shade" data-close-nav hidden></div>
<aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <a class="brand" href="<?= e(url('roadmap')) ?>" aria-label="Zero to Hero with C#, beranda">
        <span class="brand-mark">C<span>#</span></span><span class="brand-copy">zero to hero<span>WITH C#</span></span>
    </a>
    <button type="button" class="icon-button close-menu" data-close-nav aria-label="Tutup navigasi"><?= icon('x') ?></button>
    <div class="sidebar-scroll">
        <p class="nav-caption">RUANG BELAJAR</p>
        <nav class="main-nav">
            <?php foreach ($navItems as [$navPage, $navLabel, $navIcon]): ?>
                <a href="<?= e(url($navPage)) ?>" class="nav-link <?= $page === $navPage ? 'active' : '' ?>" <?= $page === $navPage ? 'aria-current="page"' : '' ?>><?= icon($navIcon) ?><span><?= e($navLabel) ?></span><?= $page === $navPage ? '<span class="active-dot"></span>' : '' ?></a>
            <?php endforeach; ?>
        </nav>
        <p class="nav-caption stage-caption">TAHAP BELAJAR</p>
        <nav class="stage-nav">
            <?php foreach ($stages as $stage): ?>
            <a href="<?= e(url('roadmap', ['stage' => $stage['id']])) ?>" class="stage-nav-link <?= ($selectedStage === $stage['id'] || ($lesson['stage'] ?? '') === $stage['id']) ? 'selected' : '' ?>"><span class="stage-mini stage-<?= e($stage['number']) ?>"><?= e($stage['number']) ?></span><?= e($stage['label']) ?></a>
            <?php endforeach; ?>
        </nav>
        <div class="sidebar-note"><div class="tiny-icon"><?= icon('bulb') ?></div><strong>Setiap expert pernah<br>menjadi beginner.</strong><p>Satu topik hari ini adalah<br>satu langkah lebih dekat.</p><a href="<?= e(url('materi', ['id' => $firstLesson['id']])) ?>">Yuk, mulai belajar <?= icon('arrow') ?></a></div>
    </div>
    <a class="sidebar-bottom" href="<?= e(url('tentang')) ?>"><?= icon('info') ?><span>Tentang & FAQ</span><?= icon('external') ?></a>
</aside>
<div class="app-shell">
    <header class="topbar">
        <div class="breadcrumb"><button type="button" class="icon-button menu-button" aria-label="Buka navigasi" aria-expanded="false" aria-controls="sidebar" data-open-nav><?= icon('menu') ?></button><span class="breadcrumb-home">Ruang Belajar</span><?= icon('chevron') ?><span><?= e($page === 'materi' ? 'Materi Belajar' : $pageTitle) ?></span></div>
        <form class="header-search" action="index.php" method="get" role="search"><input type="hidden" name="page" value="cari"><label for="header-search" class="sr-only">Cari materi C#</label><?= icon('search') ?><input type="search" name="q" id="header-search" placeholder="Cari materi..." value="<?= e($searchQuery) ?>" maxlength="200"><button class="search-submit" type="submit" aria-label="Cari"><?= icon('arrow') ?></button></form>
        <button type="button" class="motion-toggle" data-motion-toggle aria-pressed="true" aria-label="Aktifkan animasi" hidden><?= icon('spark') ?><span data-motion-label>Animasi aktif</span></button>
    </header>
    <main id="main" tabindex="-1" class="main-content page-<?= e($page) ?>">
    <?php if ($page === 'roadmap'): ?>
        <div class="page-heading"><div><div class="eyebrow">PERJALANANMU DIMULAI DI SINI</div><h1>Roadmap Belajar C<span class="text-purple">#</span></h1><p>Dari baris kode pertama, sampai aplikasi pertamamu.</p></div><span class="version-tag"><?= icon('code') ?> C# 14 · .NET 10</span></div>
        <section class="welcome-card" aria-label="Mulai belajar C#">
            <div class="welcome-copy"><span class="small-tag"><span></span> DARI NOL, SELANGKAH DEMI SELANGKAH</span><h2>Langkah kecil.<br><span>Skill besar.</span></h2><p>Belajar C# jadi lebih masuk akal dengan jalur yang jelas, analogi sederhana, dan praktik langsung.</p><a class="button primary" href="<?= e(url('materi', ['id' => $firstLesson['id']])) ?>">Mulai dari dasar <?= icon('arrow') ?></a><span class="welcome-footnote">Gratis. Belajar sesuai ritmemu.</span></div>
            <div class="hero-code" aria-label="Contoh program C# pertama"><div class="window-top"><div class="window-dots"><i></i><i></i><i></i></div><span>Program.cs</span><span>C#</span></div><div class="hero-code-body"><p><span class="line-no">1</span><span class="code-comment">// Semua dimulai dari satu baris.</span></p><p><span class="line-no">2</span><span class="code-keyword">string</span> nama = <span class="code-string">"Developer"</span>;</p><p><span class="line-no">3</span>Console.<span class="code-method">WriteLine</span>(</p><p><span class="line-no">4</span>&nbsp; <span class="code-string">$"Halo, {nama}!"</span>);</p><p class="empty-line"><span class="line-no">5</span>&nbsp;</p></div><div class="hero-output"><span><?= icon('terminal') ?> OUTPUT</span><p>Halo, Developer!<span class="code-cursor"></span></p></div><span class="code-caption"><?= icon('check') ?> Perjalanan besar, awal yang sederhana.</span></div>
        </section>
        <div class="course-facts"><span><?= icon('layers') ?><strong>4</strong> tahap belajar</span><span><?= icon('book') ?><strong><?= count($lessons) ?></strong> topik terarah</span><span><?= icon('code') ?> Contoh kode & latihan</span><span><?= icon('compass') ?> Dari pemula ke spesialisasi</span></div>
        <div class="roadmap-layout"><section class="roadmap-main" aria-labelledby="path-heading"><div class="section-heading"><div><h2 id="path-heading">Peta perjalananmu</h2><p>Ikuti urutannya, atau pilih topik yang ingin kamu dalami.</p></div><span class="subtle-label">01 — 04</span></div>
            <nav class="filter-tabs" aria-label="Filter tahap"><a href="<?= e(url('roadmap')) ?>" class="<?= $selectedStage === '' ? 'selected' : '' ?>" <?= $selectedStage === '' ? 'aria-current="true"' : '' ?>>Semua tahap</a><?php foreach ($stages as $stage): ?><a href="<?= e(url('roadmap', ['stage' => $stage['id']])) ?>" class="<?= $selectedStage === $stage['id'] ? 'selected' : '' ?>" <?= $selectedStage === $stage['id'] ? 'aria-current="true"' : '' ?>><?= e($stage['level']) ?></a><?php endforeach; ?></nav>
            <div class="timeline">
            <?php foreach ($stages as $stage): if ($selectedStage !== '' && $selectedStage !== $stage['id']) continue; $items = stageLessons($stage['id']); ?>
                <div class="timeline-item stage-<?= e($stage['number']) ?>"><span class="timeline-number"><?= str_pad((string) $stage['number'], 2, '0', STR_PAD_LEFT) ?></span><details class="stage-card" <?= $stage['number'] === 1 || $selectedStage !== '' ? 'open' : '' ?>><summary><div class="stage-icon"><?= icon($stage['icon']) ?></div><div class="stage-title"><span class="stage-level"><?= e($stage['level']) ?></span><h3><?= e($stage['label']) ?></h3><p><?= e($stage['description']) ?></p></div><div class="stage-meta"><span><?= count($items) ?> topik</span><?= icon('down', 'expand-icon') ?></div></summary><div class="stage-lessons"><?php foreach ($items as $idx => $item): ?><a class="lesson-row" href="<?= e(url('materi', ['id' => $item['id']])) ?>"><span class="lesson-index"><?= str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) ?></span><span class="lesson-row-title"><?= e($item['title']) ?></span><span class="lesson-time"><?= icon('clock') ?> <?= e($item['minutes']) ?> mnt</span><?= icon('chevron') ?></a><?php endforeach; ?><div class="stage-project"><?= icon('rocket') ?><div><span>PROYEK TAHAP <?= e($stage['number']) ?></span><p><?= e($stage['project']) ?></p></div></div></div></details></div>
            <?php endforeach; ?>
            </div><div class="roadmap-end"><?= icon('compass') ?><p>Tujuan akhirnya? <strong>Bisa membangun dengan percaya diri.</strong></p></div>
        </section><aside class="learning-aside" aria-label="Panduan belajar"><div class="aside-card start-card"><span class="aside-icon"><?= icon('compass') ?></span><h3>Baru kenal C#?</h3><p>Kenali bahasanya, cari tahu kegunaannya, lalu mulai langkah pertamamu.</p><a href="<?= e(url('tentang-csharp')) ?>">Kenalan dulu, yuk <?= icon('arrow') ?></a></div><div class="aside-card habit-card"><div class="aside-card-heading"><?= icon('bulb') ?><h3>Biar belajarnya nempel</h3></div><ol><li><span>01</span><div><strong>Pahami, jangan hafalkan</strong><p>Hubungkan konsep dengan analogi sehari-hari.</p></div></li><li><span>02</span><div><strong>Ketik sendiri kodenya</strong><p>Coba ubah sesuatu. Error juga bagian dari belajar.</p></div></li><li><span>03</span><div><strong>Sedikit, tapi konsisten</strong><p>Luangkan waktu untuk satu konsep setiap hari.</p></div></li></ol></div><a class="tool-shortcut" href="<?= e(url('tools')) ?>"><?= icon('tools') ?><span>Siapkan alat belajarmu<small>SDK, editor, dan tools pilihan</small></span><?= icon('arrow') ?></a><p class="aside-quote">“Tidak perlu hebat untuk memulai.<br>Mulailah untuk menjadi lebih baik.”</p></aside></div>
    <?php elseif ($page === 'materi'): require dirname(__DIR__) . '/app/views/lesson.php'; ?>
    <?php elseif ($page === 'praktik-api'): require dirname(__DIR__) . '/app/views/practice-api.php'; ?>
    <?php elseif ($page === 'tools'): $categories = array_values(array_unique(array_column($tools, 'category'))); $category = query('category'); if (!in_array($category, $categories, true)) $category = ''; ?>
        <div class="page-heading"><div><div class="eyebrow">KENALI ISI KOTAK PERKAKASMU</div><h1>Tools & Ekosistem</h1><p>Alat yang tepat membuat langkah pertamamu lebih mudah.</p></div></div>
        <div class="info-banner"><?= icon('bulb') ?><p><strong>Mulai dari yang penting.</strong> Untuk praktik pertama, siapkan .NET SDK dan satu editor. Tools lainnya bisa menyusul sesuai kebutuhan.</p></div>
        <nav class="filter-tabs wrap-tabs" aria-label="Kategori tools"><a href="<?= e(url('tools')) ?>" class="<?= $category === '' ? 'selected' : '' ?>">Semua tools</a><?php foreach ($categories as $item): ?><a href="<?= e(url('tools', ['category' => $item])) ?>" class="<?= $category === $item ? 'selected' : '' ?>"><?= e($item) ?></a><?php endforeach; ?></nav>
        <div class="tools-grid"><?php foreach ($tools as $tool): if ($category !== '' && $category !== $tool['category']) continue; ?><article class="tool-card"><div class="tool-card-top"><span class="tool-mark"><?= e($tool['mark']) ?></span><span class="pill <?= $tool['level'] === 'Pemula' ? 'pill-green' : '' ?>"><?= e($tool['level']) ?></span></div><span class="tool-category"><?= e($tool['category']) ?></span><h2><?= e($tool['name']) ?></h2><p><?= e($tool['description']) ?></p><div class="tool-analogy"><?= icon('bulb') ?><span><?= e($tool['analogy']) ?></span></div><a href="<?= e($tool['url']) ?>" target="_blank" rel="noopener noreferrer">Dokumentasi resmi <?= icon('external') ?></a></article><?php endforeach; ?></div>
    <?php elseif (isset($guides[$page])): $guide = $guides[$page]; ?>
        <div class="article-layout"><article class="lesson-article guide-article"><div class="eyebrow"><?= e($guide['eyebrow']) ?></div><h1><?= e($guide['title']) ?></h1><p class="article-lead"><?= e($guide['summary']) ?></p>
        <?php foreach ($guide['sections'] as $idx => $section): ?><section id="bagian-<?= $idx ?>" class="prose-section"><h2><?= e($section['heading']) ?></h2><p><?= nl2br(e($section['body'])) ?></p><?php if (!empty($section['analogy'])): ?><aside class="analogy"><div class="analogy-title"><?= icon('bulb') ?> Bayangkan begini</div><p><?= nl2br(e($section['analogy'])) ?></p></aside><?php endif; ?><?php if (!empty($section['code'])) codeBlock($section['code']); ?></section><?php endforeach; ?>
        <?php if (!empty($guide['sources'])): ?><section class="guide-sources"><h2>Referensi untuk lanjut membaca</h2><?php foreach ($guide['sources'] as $source): ?><a class="source-link" href="<?= e($source['url']) ?>" target="_blank" rel="noopener noreferrer"><?= e($source['label']) ?> <?= icon('external') ?></a><?php endforeach; ?></section><?php endif; ?>
        <a class="button primary" href="<?= e(url('roadmap')) ?>">Jelajahi roadmap <?= icon('arrow') ?></a></article><aside class="article-toc"><p class="nav-caption">DALAM HALAMAN INI</p><nav><?php foreach ($guide['sections'] as $idx => $section): ?><a href="#bagian-<?= $idx ?>"><?= e($section['heading']) ?></a><?php endforeach; ?></nav></aside></div>
    <?php elseif ($page === 'cari'): $results = searchContent($searchQuery); ?>
        <div class="page-heading"><div><div class="eyebrow">TEMUKAN LANGKAH BERIKUTNYA</div><h1>Cari materi</h1><p>Cari konsep, topik belajar, atau alat yang kamu butuhkan.</p></div></div><form class="large-search" action="index.php" method="get" role="search"><input type="hidden" name="page" value="cari"><label for="main-search" class="sr-only">Kata kunci pencarian</label><?= icon('search') ?><input type="search" id="main-search" name="q" placeholder="Misalnya: variabel, LINQ, atau Visual Studio" value="<?= e($searchQuery) ?>" maxlength="200"><button class="button primary" type="submit">Cari <?= icon('arrow') ?></button></form>
        <?php if ($searchQuery !== ''): ?><p class="search-count"><strong><?= count($results) ?> hasil</strong> untuk “<?= e($searchQuery) ?>”</p><?php endif; ?>
        <div class="search-results"><?php foreach ($results as $result): ?><a class="search-result" href="<?= e($result['url']) ?>"><span class="result-type"><?= e($result['type']) ?></span><h2><?= e($result['title']) ?> <?= icon('arrow') ?></h2><p><?= e($result['summary']) ?></p></a><?php endforeach; ?></div>
        <?php if (count($results) === 0): ?><div class="empty-state"><?= icon('search') ?><h2><?= $searchQuery === '' ? 'Mau belajar apa hari ini?' : 'Belum ada hasil yang cocok.' ?></h2><p><?= $searchQuery === '' ? 'Mulai dengan satu kata kunci, atau jelajahi materi dari fondasi.' : 'Coba kata yang lebih singkat, periksa ejaannya, atau buka roadmap untuk melihat semua topik.' ?></p><div class="suggested-searches"><?php foreach (['Variabel', 'OOP', 'LINQ', 'Database'] as $keyword): ?><a href="<?= e(url('cari', ['q' => $keyword])) ?>"><?= e($keyword) ?></a><?php endforeach; ?></div><a class="text-link" href="<?= e(url('roadmap')) ?>">Kembali ke roadmap <?= icon('arrow') ?></a></div><?php endif; ?>
    <?php else: ?>
        <div class="empty-state error-page"><div class="error-number">404</div><h1>Sepertinya jalurnya terlewat.</h1><p>Halaman yang kamu cari belum ada. Yuk, kembali ke peta perjalananmu.</p><a class="button primary" href="<?= e(url('roadmap')) ?>">Kembali ke roadmap <?= icon('arrow') ?></a></div>
    <?php endif; ?>
    <footer class="page-footer"><span>zero to hero <strong>with C#</strong></span><p>Dibuat untuk setiap langkah belajarmu.</p><a href="<?= e(url('tentang')) ?>">Tentang proyek <?= icon('arrow') ?></a></footer>
    </main>
</div>
<div class="toast" role="status" aria-live="polite" hidden></div>
</body>
</html>
