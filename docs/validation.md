# Catatan pemeriksaan versi perluasan

Tanggal: 14 September 2026. Lingkungan: PHP 8.2.31, Windows, server lokal `127.0.0.1:8080`.

- PHP lint: seluruh berkas PHP valid.
- `php tests/smoke.php`: 3.263 pemeriksaan berhasil, mencakup struktur 40 materi, urutan prasyarat, ID lama, pembagian tahap 10/9/10/11, 80 latihan tambahan, lima lab visual, pencarian, encoding URL, dan escaping.
- `php tests/http-smoke.php`: 98 kasus HTTP dan 1.675 pemeriksaan berhasil. Mencakup seluruh 40 materi, 4 panduan, filter roadmap/tools, pencarian 21 materi baru, halaman tidak dikenal, input berbentuk array, payload HTML, header keamanan, dan kecocokan aset. Tidak ditemukan warning/fatal PHP dalam respons.
- JavaScript: `node --check public/assets/learning.js` berhasil.
- Browser: navigasi materi, pencarian LINQ, hasil pencarian kosong, filter kategori tools, disclosure pembahasan, dan salin kode berhasil.
- Menu ponsel: buka/tutup, Escape, dan pengembalian fokus ke tombol menu berhasil.
- Pembelajaran interaktif: langkah berikut/sebelumnya, penelusuran kode, putar/jeda visualisasi, berhenti pada langkah terakhir, serta disclosure petunjuk dan jawaban berhasil diperiksa di browser. Status langkah diperbarui bersama panel yang aktif.
- Tombol animasi: preferensi mati bertahan setelah reload, putar otomatis dinonaktifkan, dan langkah manual tetap dapat dioperasikan dengan keyboard. Implementasi juga mengikuti pengaturan sistem `prefers-reduced-motion`; perubahan pengaturan sistem tidak diuji secara langsung.
- Lebar 375, 768, 1024, dan 1440px diperiksa; tidak ditemukan overflow horizontal halaman pada tampilan yang diuji. Artikel ponsel serta roadmap desktop diperiksa secara visual.
- Tidak ditemukan error console browser pada alur pembelajaran yang diperiksa.
- Materi C# sebelumnya: 14 contoh console menghasilkan keluaran sesuai; contoh instalasi/publish, tiga kasus xUnit, dan EF Core SQLite berhasil dijalankan. Contoh Minimal API awal berhasil dibangun tanpa warning/error.
- Tambahan fondasi/OOP: seluruh 10 contoh dibangun dan dijalankan dengan .NET SDK 10.0.302, warning diperlakukan sebagai error. Delapan kasus input tambahan berhasil. Rincian ada di [sumber fondasi](sources-foundation.md).
- Tambahan lanjutan: contoh nullable, LINQ, cancellation, SQLite, HttpClient, dan penyimpanan JSON berhasil dibangun dan dijalankan. CRUD baru diuji melalui request HTTP (200/201/400/200/204/404); lifetime DI diuji melalui dua request. Blazor dan WPF berhasil dibangun tanpa warning, tetapi interaksi UI contoh tersebut belum diuji. Script Unity ditinjau terhadap dokumentasi resmi dan belum dijalankan di Unity Editor. Rincian ada di [sumber lanjutan](sources-advanced.md).
- Lima kode lengkap lab visual berhasil dibangun dan dijalankan pada .NET 10; hasil akhir sesuai dengan panel visualisasi. Lab website sendiri menggunakan urutan ilustrasi yang sudah disiapkan, bukan compiler C#.

Ini pemeriksaan lokal, bukan audit aksesibilitas menyeluruh atau pengukuran performa hosting. Domain, TLS, konfigurasi PHP hosting, dan waktu muat jaringan produksi perlu diperiksa setelah deployment.
