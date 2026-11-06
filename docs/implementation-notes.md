# Catatan implementasi

## Dasar dan keputusan

Sumber kebutuhan: `PRD_Roadmap_CSharp_v1.2_Analogi_Lengkap.md`, versi 1.2, 14 September 2026.

- **Prioritas Fase 1.** Mengikuti milestone §12 dan mitigasi scope §13: bangun roadmap serta konten yang dapat digunakan lebih dahulu.
- **PHP native untuk website.** Pengguna membebaskan bahasa implementasi dan menyebut PHP agar mudah di-deploy. Instruksi tersebut menggantikan persyaratan full C# stack pada §10; bahasa yang dipelajari tetap C#.
- **HTML dirender di server, CSS dan JavaScript ringan.** Tidak ada kebutuhan Composer, NPM, database, atau layanan API untuk menjalankan MVP.
- **Konten terpisah.** Data pembelajaran berada di `app/data/*.php` agar pembaruan materi tidak membutuhkan perubahan layout.
- **Routing melalui query string.** Hosting tidak memerlukan modul rewrite. `public/index.php` menjadi titik masuk dan folder `app` ditempatkan di luar document root.
- **Praktik secara lokal.** Latihan menyediakan studi kasus dan solusi yang dapat dibuka. Pengguna menjalankan contoh melalui .NET SDK di perangkatnya.

## Pemetaan cakupan

| Kebutuhan PRD | Cakupan implementasi |
|---|---|
| §5.1–5.4: pengenalan, kelebihan/kekurangan, ekosistem, fitur C# | Halaman referensi berbahasa Indonesia, dengan analogi dan tautan sumber |
| §5.5: roadmap pembelajaran | Empat tahap: Fondasi, OOP, Konsep Lanjutan, dan Spesialisasi |
| §6 Must Have | Roadmap visual, materi, navigasi, pencarian/filter dasar, tampilan responsif |
| §7: pemeliharaan dan aksesibilitas | Data konten terpisah, struktur HTML semantik, fokus keyboard dan tata letak adaptif |
| §9: membaca lalu berlatih | Navigasi materi dan latihan tertulis; penyelesaian otomatis belum diterapkan |
| §10: stack C# dan database | Diganti PHP untuk MVP sesuai arahan pengguna; tanpa akun dan database |

Target performa PRD di bawah dua detik tetap perlu diukur setelah hosting dan kondisi jaringan diketahui. Metrik retensi, penyelesaian, dan skor pada §11 memerlukan instrumentasi tambahan; versi ini tidak mengklaim telah mengumpulkannya.

## Fase selanjutnya

1. **Fase 2:** progress tracker dan quiz interaktif dengan skor. Tentukan terlebih dahulu apakah progres hanya tersimpan pada browser atau perlu sinkronisasi akun.
2. **Fase 3:** code playground, dark mode, dan rekomendasi jalur karier. Playground memerlukan lingkungan eksekusi terisolasi; PHP shared hosting saja bukan lingkungan eksekusi C#.
3. **Fase 4:** akun, sertifikat, forum, dan gamifikasi, beserta penyimpanan data serta kebutuhan operasionalnya.

Setiap materi versi-spesifik perlu diperiksa terhadap dokumentasi resmi sebelum diperbarui. Gaya penjelasan dengan analogi sehari-hari tetap menjadi pedoman editorial utama.

## Perluasan konten dan animasi

Permintaan lanjutan pengguna menambah kedalaman materi dan animasi membaca. Cakupan kini 40 materi: 21 modul baru serta pendalaman seluruh 19 modul sebelumnya. Semua ID lama tetap valid. Tiap materi menyediakan minimal lima bagian penjelasan, bedah kode, dua kesalahan umum, dan dua latihan tambahan dengan petunjuk/jawaban.

Lima lab visual adalah demonstrasi urutan yang sudah disiapkan, dengan kode lengkap yang dapat disalin ke proyek console. Pembaca dapat memutar, menjeda, atau memilih langkah. Ini tidak menambahkan compiler C# di server maupun kebutuhan hosting baru.

`learning.js` menggunakan Web Animations untuk perpindahan langkah dan kemunculan kartu. Intersection Observer menghentikan pemutaran di luar layar. Preferensi animasi tersimpan lokal; pengaturan reduced-motion perangkat mengalahkan pilihan aktif. CSS/HTML tetap menampilkan seluruh langkah ketika JavaScript tidak tersedia. Indikator posisi baca tidak disimpan sebagai progres belajar.

Rujukan implementasi: [Intersection Observer](https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API) dan [prefers-reduced-motion](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/At-rules/%40media/prefers-reduced-motion). Catatan sumber untuk isi pelajaran ada di `sources-foundation.md`, `sources-advanced.md`, dan `sources-enrichment.md`.
