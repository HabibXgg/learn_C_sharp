# Zero to Hero with C#

Website belajar C# berbahasa Indonesia dengan roadmap bertahap, materi beranalogi, contoh kode, dan latihan. Dibangun dengan PHP native agar mudah dijalankan pada shared hosting, tanpa Composer, NPM, atau database.

Versi diperluas: **40 materi**, bedah kode bertahap, 80 latihan tambahan dengan petunjuk dan pembahasan, serta 5 lab visual yang dapat diputar, dijeda, dan dijelajahi per langkah. Penjelasan diperiksa melalui sumber resmi Microsoft Learn dan Unity, dengan tautan rujukan pada tiap materi.

## Menjalankan lokal

Siapkan PHP 8.2 atau lebih baru yang masih mendapat pembaruan keamanan dari penyedia runtime. Jalankan perintah berikut dari folder proyek:

```powershell
php -v
php -S 127.0.0.1:8080 -t public
```

Buka [http://127.0.0.1:8080](http://127.0.0.1:8080) di browser. Hentikan server dengan `Ctrl+C`. Server bawaan PHP digunakan untuk pengembangan lokal.

## Struktur proyek

```text
app/
  bootstrap.php       # Memuat konten dan fungsi aplikasi
  data/               # Materi inti, materi tambahan, pendalaman, dan ilustrasi
  views/              # Template artikel dan lab visual
public/
  index.php           # Titik masuk aplikasi
  assets/             # CSS dan JavaScript, termasuk learning.css / learning.js
docs/
  implementation-notes.md
```

Halaman menggunakan parameter URL. Konfigurasi URL rewrite tidak diperlukan.

| Halaman | Contoh URL |
|---|---|
| Roadmap empat tahap | `?page=roadmap` |
| Filter tahap | `?page=roadmap&stage=fondasi` |
| Materi belajar | `?page=materi&id=instalasi-dotnet` |
| Pengenalan C# | `?page=tentang-csharp` |
| Kelebihan dan kekurangan | `?page=kelebihan-kekurangan` |
| Fitur C# | `?page=fitur-csharp` |
| Direktori 20 tools | `?page=tools` |
| Pencarian | `?page=cari&q=LINQ` |
| Tentang dan FAQ | `?page=tentang` |

## Deploy ke shared hosting

1. Pilih versi PHP yang memenuhi kebutuhan di atas pada panel hosting.
2. Unggah **isi** folder `public` ke document root, biasanya `public_html`.
3. Unggah folder `app` ke direktori yang sama tingkatnya dengan `public_html`, di luar document root.
4. Aktifkan HTTPS melalui panel hosting, lalu buka domain dan periksa navigasi, pencarian, serta halaman materi.

Struktur pada hosting:

```text
direktori-akun/
  app/
    bootstrap.php
    data/
  public_html/
    index.php
    assets/
```

`index.php` memuat `dirname(__DIR__) . '/app/bootstrap.php'`, sehingga susunan ini langsung cocok. Jika penyedia hosting tidak mengizinkan folder sejajar di luar document root, minta pengaturan document root yang sesuai kepada penyedia. Folder `app` tidak ditujukan untuk akses publik langsung.

## Mengubah materi

Edit konten pada `app/data/*.php`, ikuti struktur entri yang sudah ada, dan pertahankan ID/slug unik agar tautan tetap valid. Perbarui penjelasan, analogi, contoh, latihan, serta referensinya bersama-sama. Tidak ada proses build; perubahan tersedia saat halaman dimuat kembali.

Periksa sintaks setelah mengubah berkas PHP:

```powershell
Get-ChildItem app, public -Recurse -Filter *.php | ForEach-Object { php -l $_.FullName }
php tests/smoke.php
# Dengan server lokal yang sedang berjalan:
php tests/http-smoke.php
```

## Cakupan versi ini

Halaman [Praktik API Chinook](http://127.0.0.1:8080/index.php?page=praktik-api) menjelaskan struktur file C#, alur request dengan analogi sederhana, tabel Artist–Album dari SQL Chinook, dan langkah pengujian di Postman/Bruno. Proyek .NET runnable berada di `examples/chinook-api`; salinan kode untuk halaman berada di `app/practice-sample` agar deploy PHP cukup memakai struktur `app` dan `public` yang sama. Saat memperbaiki contoh, perbarui kedua lokasi.

Pengunjung dapat mengambil [repository contoh asli](https://github.com/opxw/api-samples) dengan `git clone https://github.com/opxw/api-samples.git`, lalu masuk ke `api-samples/chinook/src`. Repository website ini juga menyertakan `database/Chinook_MySql.sql` agar proyek latihan beserta datanya tersedia setelah di-clone. SQL tersebut tidak ada di repository contoh asli. Periksa [peringatan impor database](database/README.md) sebelum menjalankannya.

`.gitignore` di root dan di `examples/chinook-api` mengabaikan hasil build .NET, konfigurasi lokal yang mungkin berisi kredensial, arsip deploy, serta file editor. Berkas `appsettings.json` contoh tetap disertakan dengan password kosong; simpan kredensial sungguhan di environment variable atau file lokal yang diabaikan Git.

Implementasi memperluas Fase 1 PRD sesuai permintaan pengguna: 40 materi dalam empat tahap (10 fondasi, 9 OOP, 10 lanjutan, 11 spesialisasi), empat halaman panduan, 20 tools, navigasi, pencarian dasar, dan tampilan responsif. Setiap materi memiliki uraian lebih mendalam, bedah kode, kesalahan umum, latihan utama, serta dua latihan tambahan dengan petunjuk dan jawaban.

Lab visual memperlihatkan contoh variabel, loop, referensi object, LINQ, dan async/await melalui urutan yang sudah disiapkan. Tombol animasi menyimpan preferensi pada browser dan mengikuti `prefers-reduced-motion`. Indikator posisi baca hanya menunjukkan posisi pada artikel saat ini. Kode C# dipraktikkan di lingkungan .NET milik pengguna; website tidak mengompilasi atau mengeksekusi C#.

Materi inti tetap di `curriculum.php`. Modul baru disimpan pada `lessons-foundation.php` dan `lessons-advanced.php`, pendalaman materi lama pada `lesson-enrichment.php`, serta contoh visual pada `visualizations.php`. Urutan lintas materi didefinisikan dalam `$lessonOrder` pada `app/bootstrap.php`; saat menambah ID baru, masukkan ke daftar tersebut. Catatan riset tersedia di `docs/sources-*.md`.

Akun, penyimpanan progres di server, quiz dengan skor, dan code playground belum termasuk. Rincian keputusan dan fase lanjutan ada di [catatan implementasi](docs/implementation-notes.md).
