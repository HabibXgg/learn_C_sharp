<?php
$currentStage = findStage($lesson['stage']);
$lessonIndex = array_search($lesson['id'], array_column($lessons, 'id'), true);
$previous = $lessons[$lessonIndex - 1] ?? null;
$next = $lessons[$lessonIndex + 1] ?? null;
$hasVisual = false;
foreach ($visualizations as $visual) {
    if (in_array($lesson['id'], $visual['lessons'], true)) $hasVisual = true;
}
$sourceList = $lesson['sources'] ?? [['label' => 'Dokumentasi resmi untuk materi ini', 'url' => $lesson['source']]];
?>
<div class="reading-progress" data-reading-progress hidden><progress max="100" value="0" aria-label="Posisi baca halaman ini"></progress></div>
<a class="back-link" href="<?= e(url('roadmap', ['stage' => $lesson['stage']])) ?>"><?= icon('arrow') ?> <?= e($currentStage['label']) ?></a>
<div class="article-layout">
    <article class="lesson-article" data-reading-article>
        <div class="eyebrow"><?= e($currentStage['level']) ?> · TAHAP <?= e($currentStage['number']) ?></div>
        <h1><?= e($lesson['title']) ?></h1>
        <p class="article-lead"><?= e($lesson['summary']) ?></p>
        <div class="article-meta"><span><?= icon('clock') ?> ±<?= e($lesson['minutes']) ?> menit belajar & praktik</span><span><?= icon('code') ?> C# / .NET</span><span>Ditinjau 14 Sep 2026</span></div>
        <nav class="lesson-jump-links" aria-label="Bagian utama materi"><a href="#bagian-0">Pelajari konsepnya</a><a href="#contoh">Lihat kode</a><?php if ($hasVisual): ?><a href="#visualisasi"><?= icon('play') ?> Lab visual</a><?php endif; ?><a href="#latihan">Coba latihan</a></nav>
        <section class="objectives"><h2>Setelah materi ini, kamu bisa…</h2><ul><?php foreach ($lesson['objectives'] as $objective): ?><li><?= icon('check') ?><?= e($objective) ?></li><?php endforeach; ?></ul></section>
        <?php foreach ($lesson['sections'] as $idx => $section): ?>
            <section id="bagian-<?= $idx ?>" class="prose-section"><h2><?= e($section['heading']) ?></h2><p><?= nl2br(e($section['body'])) ?></p></section>
            <?php if ($idx === 0): ?><aside class="analogy"><div class="analogy-title"><?= icon('bulb') ?> Bayangkan begini</div><p><?= nl2br(e($lesson['analogy'])) ?></p></aside><?php endif; ?>
            <?php if ($idx === 2 || (count($lesson['sections']) < 3 && $idx === count($lesson['sections']) - 1)) renderLearningExamples($lesson); ?>
        <?php endforeach; ?>
        <?php if (!empty($lesson['mistakes'])): ?>
        <section id="kesalahan-umum" class="common-mistakes"><div class="section-kicker"><?= icon('info') ?> JANGAN TERJEBAK</div><h2>Kesalahan yang sering terjadi</h2><div class="mistake-list"><?php foreach ($lesson['mistakes'] as $mistake): ?><div class="mistake-item"><span><?= icon('info') ?></span><div><h3><?= e($mistake['title']) ?></h3><p><?= e($mistake['body']) ?></p></div></div><?php endforeach; ?></div></section>
        <?php endif; ?>
        <section id="latihan" class="exercise-card"><span class="small-tag"><?= icon('code') ?> GILIRANMU MENCOBA</span><h2>Dari paham jadi bisa.</h2><p><?= nl2br(e($lesson['exercise'])) ?></p><details class="solution"><summary>Lihat petunjuk & pembahasan <?= icon('down') ?></summary><div><?= nl2br(e($lesson['solution'])) ?></div></details></section>
        <?php if (!empty($lesson['practice'])): ?>
        <section id="latihan-lanjutan" class="practice-section"><div class="section-kicker"><?= icon('rocket') ?> TANTANG DIRIMU</div><h2>Latihan bertingkat</h2><p class="practice-intro">Coba selesaikan dulu. Buka petunjuk saat buntu, lalu bandingkan cara berpikirmu dengan pembahasan.</p>
            <?php foreach ($lesson['practice'] as $idx => $practice): ?>
            <article class="practice-card"><div class="practice-title"><span><?= str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) ?></span><h3><?= e($practice['title']) ?></h3></div><p><?= e($practice['task']) ?></p><details class="practice-hint"><summary><?= icon('bulb') ?> Butuh petunjuk? <?= icon('down') ?></summary><div><?= nl2br(e($practice['hint'])) ?></div></details><details class="solution"><summary>Lihat pembahasan <?= icon('down') ?></summary><div><?= nl2br(e($practice['answer'])) ?></div></details></article>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>
        <section id="rangkuman" class="prose-section"><h2>Yang perlu kamu ingat</h2><ul class="takeaways"><?php foreach ($lesson['takeaways'] as $point): ?><li><?= e($point) ?></li><?php endforeach; ?></ul></section>
        <section id="referensi" class="lesson-sources"><div class="section-kicker"><?= icon('book') ?> LANJUT MEMBACA</div><h2>Rujukan resmi, untuk menggali lagi.</h2><p>Materi ditulis ulang dengan penjelasan dan studi kasus sendiri. Gunakan sumber berikut untuk melihat perilaku API serta dokumentasi lengkapnya.</p><?php foreach ($sourceList as $source): ?><a class="source-link" href="<?= e($source['url']) ?>" target="_blank" rel="noopener noreferrer"><?= e($source['label']) ?> <?= icon('external') ?></a><?php endforeach; ?></section>
        <nav class="lesson-pagination" aria-label="Materi sebelumnya dan berikutnya">
            <?php if ($previous): ?><a href="<?= e(url('materi', ['id' => $previous['id']])) ?>"><small>SEBELUMNYA</small><span><?= e($previous['title']) ?></span></a><?php else: ?><a href="<?= e(url('roadmap')) ?>"><small>KEMBALI KE</small><span>Roadmap belajar</span></a><?php endif; ?>
            <?php if ($next): ?><a class="next-lesson" href="<?= e(url('materi', ['id' => $next['id']])) ?>"><small>MATERI BERIKUTNYA <?= icon('arrow') ?></small><span><?= e($next['title']) ?></span></a><?php else: ?><a class="next-lesson" href="<?= e(url('roadmap')) ?>"><small>LANGKAH SELANJUTNYA <?= icon('arrow') ?></small><span>Ulangi & bangun proyekmu</span></a><?php endif; ?>
        </nav>
    </article>
    <aside class="article-toc"><p class="nav-caption">DALAM MATERI INI</p><nav>
        <?php foreach ($lesson['sections'] as $idx => $section): ?><a href="#bagian-<?= $idx ?>"><?= e($section['heading']) ?></a><?php if ($idx === 2): ?><a href="#contoh">Contoh kode</a><?php if ($hasVisual): ?><a href="#visualisasi">Lab visual</a><?php endif; ?><?php if (!empty($lesson['walkthrough'])): ?><a href="#bedah-kode">Bedah kode</a><?php endif; ?><?php endif; ?><?php endforeach; ?>
        <?php if (!empty($lesson['mistakes'])): ?><a href="#kesalahan-umum">Kesalahan umum</a><?php endif; ?><a href="#latihan">Latihan mandiri</a><?php if (!empty($lesson['practice'])): ?><a href="#latihan-lanjutan">Latihan bertingkat</a><?php endif; ?><a href="#rangkuman">Rangkuman</a><a href="#referensi">Referensi resmi</a>
    </nav><div class="toc-note"><?= icon('bulb') ?><p>Satu konsep, satu percobaan.<br>Jangan ragu mengulang langkah yang belum jelas.</p></div></aside>
</div>
