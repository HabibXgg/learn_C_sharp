<?php
$sampleRoot = dirname(__DIR__) . '/practice-sample';
$sampleFiles = [
    ['Program.cs', 'Pintu masuk', 'Mendaftarkan controller, service, dan repository agar bisa saling dipanggil.'],
    ['Controllers/ArtistsController.cs', 'Penerima pesanan', 'Menerima alamat URL, memanggil service, lalu mengirim respons HTTP.'],
    ['Services/ArtistService.cs', 'Koki', 'Menentukan aturan: ID tidak sah ditolak, data artist dan album digabung.'],
    ['Data/ArtistRepository.cs', 'Petugas gudang', 'Mengambil data dari tabel Artist dan Album memakai query berparameter.'],
    ['Models/Artist.cs', 'Bentuk barang', 'Menggambarkan satu baris Artist atau Album dari database.'],
    ['Dtos/ArtistDetailDto.cs', 'Kotak kiriman', 'Memilih data yang dikirim kembali sebagai JSON kepada pengguna API.'],
    ['appsettings.json', 'Alamat gudang', 'Menyimpan contoh alamat koneksi MySQL lokal; sandi asli sebaiknya lewat environment variable.'],
];
?>
<div class="practice-page">
  <div class="practice-hero">
    <div><div class="eyebrow">PROYEK LATIHAN · API & DATABASE</div><h1>Dari folder ke respons API.</h1><p>Bangun katalog musik sederhana dari database Chinook. Lihat bagaimana satu permintaan bergerak melalui file C# sampai menjadi JSON yang bisa diuji di Postman.</p><div class="practice-hero-actions"><a class="button primary" href="#alur">Ikuti alurnya <?= icon('arrow') ?></a><a class="button practice-secondary" href="#kode">Lihat struktur kode</a></div></div>
    <div class="practice-terminal" aria-label="Contoh respons API"><div class="practice-terminal-top"><span></span><span></span><span></span><small>GET /api/artists/1</small></div><pre>{
  "artistId": 1,
  "name": "AC/DC",
  "albums": [
    { "albumId": 1,
      "title": "For Those About To Rock" }
  ]
}</pre><div class="practice-terminal-foot">200 OK <span>application/json</span></div></div>
  </div>
  <nav class="practice-jump" aria-label="Bagian praktik"><a href="#clone">Clone repo</a><a href="#alur">Alur request</a><a href="#struktur">Peta folder</a><a href="#kode">Contoh kode</a><a href="#database">Database</a><a href="#uji">Uji API</a><a href="#tantangan">Tantangan</a></nav>
  <section id="clone" class="practice-section practice-clone"><div class="practice-section-head"><span>AMBIL CONTOH ASLI</span><h2>Clone sendiri dari GitHub</h2><p>Pastikan Git sudah terpasang, buka terminal di folder tempat kamu ingin menyimpan proyek, lalu jalankan perintah ini.</p></div>
    <?php codeBlock("git clone https://github.com/opxw/api-samples.git\ncd api-samples/chinook/src", 'Terminal'); ?>
    <div class="practice-clone-actions"><a class="button practice-secondary" href="https://github.com/opxw/api-samples" target="_blank" rel="noopener noreferrer">Buka repository <?= icon('external') ?></a><span>Folder yang dipelajari: <code>chinook/src</code></span></div>
    <div class="practice-callout"><strong>Dua contoh yang berbeda:</strong> repository GitHub di atas adalah proyek referensi asli dengan beberapa proyek C# dan paket Opx. Folder <code>examples/chinook-api</code> di repository website ini adalah versi latihan yang lebih kecil. Salinan SQL ada di <code>database/Chinook_MySql.sql</code> pada repository website ini dan akan ikut saat repository website di-clone; repo contoh asli di atas tidak menyertakannya.</div>
  </section>
  <section id="alur" class="practice-section"><div class="practice-section-head"><span>01 / PAHAMI</span><h2>Satu request, enam pemberhentian</h2><p>Bayangkan kamu memesan album di restoran. Setiap bagian punya tugas sendiri, sehingga satu file tidak perlu mengerjakan semuanya.</p></div><div class="practice-flow">
    <?php foreach ([['Postman', 'Pelanggan', 'Mengirim GET /api/artists/1'], ['Controller', 'Pelayan', 'Menerima pesanan dan mengantar hasil'], ['Service', 'Koki', 'Memeriksa aturan dan merakit jawaban'], ['Repository', 'Petugas gudang', 'Mencari data lewat SQL'], ['MySQL', 'Gudang', 'Menyimpan Artist dan Album'], ['DTO → JSON', 'Kotak pesanan', 'Mengemas data untuk pelanggan']] as $idx => [$name, $analogy, $detail]): ?><div class="flow-step"><span class="flow-number"><?= str_pad((string)($idx + 1), 2, '0', STR_PAD_LEFT) ?></span><strong><?= e($name) ?></strong><em><?= e($analogy) ?></em><p><?= e($detail) ?></p></div><?php endforeach; ?>
  </div><div class="practice-callout"><strong>Alur balik:</strong> MySQL mengirim baris data → repository membuat objek → service menyusun DTO → controller mengirim HTTP 200 + JSON. Kalau ID tidak ada, service mengembalikan kosong dan controller mengirim 404.</div></section>
  <section id="struktur" class="practice-section"><div class="practice-section-head"><span>02 / SUSUN</span><h2>Struktur folder yang bisa langsung dijalankan</h2><p>Proyek referensi memakai beberapa `.csproj`. Contoh latihan ini mempertahankan pembagian peran file dalam satu proyek agar mudah dimulai.</p></div><div class="practice-tree"><pre>examples/chinook-api/
├── ChinookPractice.csproj
├── Program.cs
├── appsettings.json
├── Controllers/
│   └── ArtistsController.cs
├── Services/
│   └── ArtistService.cs
├── Data/
│   └── ArtistRepository.cs
├── Models/
│   └── Artist.cs
└── Dtos/
    └── ArtistDetailDto.cs</pre></div><p class="practice-note">Mengacu pada folder asli <code>presentation</code>, <code>services</code>, <code>db/Domain</code>, dan <code>dto</code>. Contoh latihan ini memakai paket MySqlConnector secara langsung.</p></section>
  <section id="kode" class="practice-section"><div class="practice-section-head"><span>03 / BACA KODE</span><h2>Pilih file, pahami tugasnya</h2><p>Potongan di bawah diambil langsung dari proyek latihan. Mulai dari <code>Program.cs</code>, lalu ikuti jejak request ke bawah.</p></div><div class="practice-files"><?php foreach ($sampleFiles as [$path, $analogy, $description]): ?><details class="practice-file"><summary><span class="practice-file-icon"><?= icon('code') ?></span><span><strong><?= e($path) ?></strong><small><?= e($analogy) ?> · <?= e($description) ?></small></span><?= icon('down') ?></summary><div class="practice-file-body"><?php codeBlock((string)file_get_contents($sampleRoot . '/' . $path), str_ends_with($path, '.json') ? 'JSON' : 'C#'); ?></div></details><?php endforeach; ?></div></section>
  <section id="database" class="practice-section"><div class="practice-section-head"><span>04 / SIAPKAN DATA</span><h2>Kenali database sebelum impor</h2><p>File <code>database/Chinook_MySql.sql</code> ikut dalam repository website ini dan menyediakan tabel serta data musik. Contoh API memakai dua tabel berikut.</p></div><div class="practice-db-grid"><div><span>Artist</span><h3>Siapa musisinya?</h3><p><code>ArtistId</code> adalah nomor unik; <code>Name</code> adalah nama artis.</p></div><div><span>Album</span><h3>Apa albumnya?</h3><p><code>AlbumId</code>, <code>Title</code>, dan <code>ArtistId</code>. Kolom terakhir menghubungkan album ke artisnya.</p></div></div><div class="practice-callout practice-warning"><strong>Periksa sebelum impor.</strong> Skrip SQL sumber dimulai dengan <code>DROP DATABASE IF EXISTS Chinook</code>. Jalankan hanya pada MySQL lokal khusus latihan yang boleh dihapus. Petunjuk koneksi ada di README proyek latihan.</div></section>
  <section id="uji" class="practice-section"><div class="practice-section-head"><span>05 / COBA SENDIRI</span><h2>Uji lewat Postman atau Bruno</h2><p>Jalankan MySQL lokal dan proyek .NET terlebih dahulu. API contoh mendengar di <code>127.0.0.1:5099</code>; website pembelajaran berjalan terpisah.</p></div><ol class="practice-instructions"><li><strong>Impor data latihan.</strong> Baca peringatan di atas, lalu impor file SQL ke MySQL lokal. Pastikan tabel <code>Artist</code> dan <code>Album</code> ada.</li><li><strong>Atur koneksi.</strong> Sesuaikan <code>ConnectionStrings:Chinook</code> dengan MySQL kamu. Simpan kata sandi lewat environment variable <code>ConnectionStrings__Chinook</code> bila diperlukan.</li><li><strong>Jalankan API.</strong> Dari <code>examples/chinook-api</code>, ketik <code>dotnet run --urls http://127.0.0.1:5099</code>.</li><li><strong>Kirim request GET.</strong> Di Postman atau Bruno, buat request baru dengan URL di bawah dan tekan Send. Tidak perlu body atau token.</li></ol><div class="practice-request-grid"><div><span>DAFTAR ARTIS</span><code>GET http://127.0.0.1:5099/api/artists</code><p>Harapkan 200 dan array maksimum 50 artis.</p></div><div><span>DETAIL + ALBUM</span><code>GET http://127.0.0.1:5099/api/artists/1</code><p>Harapkan 200 dan objek dengan daftar album.</p></div><div><span>DATA TIDAK ADA</span><code>GET http://127.0.0.1:5099/api/artists/999999</code><p>Harapkan 404 dan pesan “Artist tidak ditemukan”.</p></div></div><details class="practice-file practice-check"><summary>Contoh assertion di Postman <?= icon('down') ?></summary><div class="practice-file-body"><?php codeBlock("pm.test('Status sukses', () => pm.response.to.have.status(200));\nconst data = pm.response.json();\npm.test('Daftar artist tersedia', () => pm.expect(data).to.be.an('array'));", 'Postman Tests'); ?></div></details></section>
  <section id="tantangan" class="practice-section"><div class="practice-section-head"><span>06 / NAIK LEVEL</span><h2>Latihan setelah contoh pertama berhasil</h2></div><div class="practice-challenges"><article><span>01 · PEMULA</span><h3>Tambah batas daftar</h3><p>Ubah <code>LIMIT 50</code> menjadi 20. Jelaskan kenapa membatasi data penting untuk respons API.</p></article><article><span>02 · MENENGAH</span><h3>Cari berdasarkan nama</h3><p>Tambah <code>GET /api/artists?name=AC</code>. Gunakan parameter SQL, lalu uji hasil cocok dan hasil kosong.</p></article><article><span>03 · LANJUT</span><h3>Tambahkan endpoint album</h3><p>Buat Controller, Service, Repository, dan DTO album. Uji ID ada dan ID tidak ada di Postman.</p></article></div></section>
</div>
