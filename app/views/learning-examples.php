<?php
declare(strict_types=1);

function renderLearningExamples(array $lesson): void
{
    global $visualizations;
    ?>
    <section id="contoh" class="prose-section">
        <div class="section-kicker"><?= icon('terminal') ?> DARI KONSEP KE KODE</div>
        <h2>Lihat kodenya</h2>
        <?php codeBlock($lesson['code'], str_starts_with(ltrim($lesson['code']), 'dotnet ') ? 'Terminal' : 'C#'); ?>
        <div class="output-block"><span>HASIL / PERILAKU</span><pre><?= e($lesson['output']) ?></pre></div>
    </section>
    <?php foreach ($visualizations as $key => $visual): if (!in_array($lesson['id'], $visual['lessons'], true)) continue; ?>
    <section id="visualisasi" class="concept-lab" data-stepper data-kind="visual">
        <div class="section-kicker"><?= icon('spark') ?> LAB VISUAL</div>
        <h2><?= e($visual['title']) ?></h2>
        <p class="lab-intro"><?= e($visual['intro']) ?></p>
        <div class="step-controls" hidden>
            <button type="button" class="button primary" data-step-play><?= icon('play') ?><span>Putar alurnya</span></button>
            <div class="step-navigation">
                <button type="button" class="icon-button" data-step-prev aria-label="Langkah sebelumnya"><?= icon('arrow', 'reverse-icon') ?></button>
                <span class="step-count" data-step-count>1 / <?= count($visual['frames']) ?></span>
                <button type="button" class="icon-button" data-step-next aria-label="Langkah berikutnya"><?= icon('arrow') ?></button>
            </div>
        </div>
        <ol class="visual-frames" data-step-list>
        <?php foreach ($visual['frames'] as $idx => $frame): ?>
            <li class="visual-frame" data-step>
                <div class="frame-heading"><span class="frame-number"><?= str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) ?></span><h3><?= e($frame['title']) ?></h3></div>
                <pre class="frame-code"><code><?= e($frame['code']) ?></code></pre>
                <div class="memory-cells" aria-label="Keadaan nilai pada langkah ini">
                    <?php foreach ($frame['cells'] as $cell): ?><div class="memory-cell state-<?= e($cell['state'] ?? 'default') ?>"><span><?= e($cell['label']) ?></span><strong><?= e($cell['value']) ?></strong></div><?php endforeach; ?>
                </div>
                <p class="frame-explanation"><?= e($frame['explanation']) ?></p>
                <div class="frame-output"><span><?= icon('terminal') ?> KELUARAN / KEADAAN</span><pre><?= e($frame['output']) ?></pre></div>
            </li>
        <?php endforeach; ?>
        </ol>
        <div class="step-dots" aria-label="Pilih langkah visualisasi" hidden><?php foreach ($visual['frames'] as $idx => $frame): ?><button type="button" data-step-to="<?= $idx ?>" aria-label="Langkah <?= $idx + 1 ?>: <?= e($frame['title']) ?>"><span><?= $idx + 1 ?></span></button><?php endforeach; ?></div>
        <p class="lab-caption">Ilustrasi alur yang sudah disiapkan. Coba kode lengkapnya di editor untuk menjalankan C# sendiri.</p>
        <details class="lab-full-code"><summary><?= icon('code') ?> Lihat kode lengkap ilustrasi <?= icon('down') ?></summary><div><p>Contoh mandiri untuk proyek console .NET 10. Ganti seluruh isi Program.cs agar tidak bercampur dengan deklarasi dari contoh sebelumnya.</p><?php codeBlock($visual['full_code']); ?></div></details>
        <span class="sr-only" data-step-status role="status" aria-live="polite"></span>
    </section>
    <?php endforeach; ?>
    <?php if (!empty($lesson['walkthrough'])): ?>
    <section id="bedah-kode" class="walkthrough" data-stepper data-kind="walkthrough">
        <div class="section-kicker"><?= icon('layers') ?> BEDAH KODE</div>
        <h2>Pahami satu langkah dulu.</h2>
        <p class="lab-intro">Ikuti alasan di balik contoh kode, lalu coba jelaskan kembali dengan bahasamu.</p>
        <div class="step-controls" hidden><span class="step-count" data-step-count>1 / <?= count($lesson['walkthrough']) ?></span><div class="step-navigation"><button type="button" class="icon-button" data-step-prev aria-label="Penjelasan sebelumnya"><?= icon('arrow', 'reverse-icon') ?></button><button type="button" class="icon-button" data-step-next aria-label="Penjelasan berikutnya"><?= icon('arrow') ?></button></div></div>
        <ol class="walkthrough-steps" data-step-list>
        <?php foreach ($lesson['walkthrough'] as $idx => $step): ?>
            <li data-step><span class="walkthrough-number"><?= str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) ?></span><div><h3><?= e($step['title']) ?></h3><p><?= e($step['explanation']) ?></p></div></li>
        <?php endforeach; ?>
        </ol>
        <div class="step-dots" aria-label="Pilih penjelasan" hidden><?php foreach ($lesson['walkthrough'] as $idx => $step): ?><button type="button" data-step-to="<?= $idx ?>" aria-label="Penjelasan <?= $idx + 1 ?>: <?= e($step['title']) ?>"><span><?= $idx + 1 ?></span></button><?php endforeach; ?></div>
        <span class="sr-only" data-step-status role="status" aria-live="polite"></span>
    </section>
    <?php endif;
}
