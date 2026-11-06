# Product Requirements Document (PRD)
## Website Roadmap Belajar C# — Dari Nol Hingga Master

**Versi:** 1.2 (revisi: analogi konsisten di setiap penjelasan)
**Tanggal:** 14 September 2026
**Disusun untuk:** Proyek personal/portofolio website edukasi programming

---

## 1. Ringkasan Produk (Overview)

Website edukasi yang menyediakan roadmap terstruktur untuk belajar bahasa pemrograman **C#**, mulai dari pengenalan dasar hingga level mahir (master). Website ini menggabungkan konten teori, referensi tools/framework, latihan interaktif, dan tracking progres belajar dalam satu platform.

> 💡 **Analogi:** anggap website ini seperti **GPS untuk pendakian gunung**. Ada rute yang jelas dari base camp (nol) sampai puncak (master), ada pos-pos istirahat di tengah jalan (latihan & quiz), dan kamu selalu tahu "posisi belajar kamu sekarang ada di mana" — bukan jalan sendirian tanpa peta.

Target akhirnya adalah pengguna (pemula hingga menengah) bisa mengikuti jalur belajar yang jelas, tidak tersesat mencari-cari materi dari berbagai sumber, dan punya tempat untuk praktik langsung.

> 💡 **Analogi:** seperti mengikuti **kursus mengemudi dengan instruktur dan jalur latihan yang jelas** — pengguna tidak hanya membaca teori rambu lalu lintas, tetapi juga tahu kapan harus belajar belok, parkir, masuk jalan raya, lalu mempraktikkannya.

---

## 2. Latar Belakang & Masalah (Problem Statement)

- Materi belajar C# di internet tersebar di banyak sumber (dokumentasi resmi Microsoft, YouTube, Udemy, blog) sehingga pemula sering bingung menentukan urutan belajar.
  > 💡 **Analogi:** seperti belajar merakit meja tetapi **halaman 1 ada di buku A, halaman 2 di video B, dan ukuran baut ada di forum C** — bahannya ada, tetapi urutannya membingungkan.
- Banyak roadmap yang ada bersifat generik dan tidak menjelaskan **mengapa** C# punya keunggulan/fitur unik dibanding bahasa lain, padahal ini penting untuk motivasi belajar.
  > 💡 **Analogi:** seperti disuruh membeli sebuah kendaraan tanpa dijelaskan **kenapa harus memilih mobil, motor, atau sepeda** — kita tahu cara mengendarainya, tetapi belum tahu kapan pilihan itu paling cocok.
- Minim platform lokal (berbahasa Indonesia) yang membahas C# secara terstruktur dari sejarah, konsep, sampai latihan.
  > 💡 **Analogi:** seperti punya buku panduan mesin yang lengkap tetapi semuanya memakai bahasa teknis asing — informasinya benar, namun orang baru tetap kesulitan memahaminya.

> 💡 **Analogi:** kondisi ini seperti mau **masak satu resep, tapi bahan dan instruksinya tercecer di lima buku masak berbeda** — sedikit dari buku A, sedikit dari buku B, akhirnya masakan (pemahaman) jadi nggak konsisten. Harusnya cukup satu buku resep yang urut dari awal sampai akhir.

## 3. Tujuan Produk (Goals & Objectives)

| Tujuan | Indikator Keberhasilan | Analogi Sederhana |
|---|---|---|
| Menyediakan roadmap belajar C# yang terstruktur & mudah diikuti | Pengguna bisa mengikuti tahapan dari Beginner → Intermediate → Advanced → Master tanpa bingung urutan | Seperti **peta jalur kereta** — pengguna tahu stasiun awal, urutan pemberhentian, dan tujuan akhirnya |
| Memberi pemahaman konteks (sejarah, kelebihan/kekurangan) sebelum masuk teknis | Pengguna paham *kenapa* belajar C#, bukan cuma *bagaimana* | Seperti belajar memakai alat: bukan cuma tahu **cara menyalakan bor**, tetapi juga tahu kapan bor lebih tepat daripada palu |
| Menyediakan referensi tools & ekosistem C# yang relevan & up-to-date | Daftar tools/framework selalu mengarah ke versi stabil terkini | Seperti **daftar perlengkapan tukang yang selalu diperbarui**, sehingga pengguna tidak membeli alat yang sudah usang |
| Menyediakan latihan/praktik langsung | Tersedia minimal 1 fitur code exercise/quiz per topik | Seperti belajar berenang: teori penting, tetapi tetap harus **masuk ke kolam** supaya benar-benar bisa |

## 4. Target Pengguna (User Personas)

1. **Pemula total** — belum pernah coding sama sekali, butuh penjelasan konsep dasar pemrograman + C#. *(Ibarat orang yang baru pertama kali masuk dapur — belum tahu bedanya spatula dan sendok sayur.)*
2. **Pemula dari bahasa lain** — sudah bisa bahasa lain (Python/PHP/JS) dan ingin transisi ke C#, butuh perbandingan konsep. *(Ibarat koki masakan Jepang yang mau belajar masakan Italia — dasar teknik masak sudah ada, tinggal adaptasi bumbu dan bahannya.)*
3. **Mahasiswa/pelajar IT** — butuh referensi terstruktur untuk tugas kuliah atau persiapan kerja (khususnya arah .NET Developer). *(Ibarat siswa yang butuh satu buku paket utama agar materi ujian tidak tercecer di banyak catatan.)*
4. **Self-taught developer** — ingin mempersiapkan diri untuk interview/kerja sebagai .NET Developer. *(Ibarat atlet yang latihan sendiri dan butuh program latihan terukur supaya tahu kemampuan apa yang masih kurang sebelum pertandingan.)*

---

## 5. Ruang Lingkup Konten (Content Scope)

Berikut detail 6 poin yang diminta, sudah dipecah menjadi struktur konten yang bisa langsung dipakai sebagai outline halaman — tiap penjelasan teknis dilengkapi analogi sederhana supaya mudah dicerna orang awam.

### 5.1 Pengertian C# (Sejarah, Penemu, Program Besar Pertama)

Halaman **"Apa itu C#?"** berisi:

- Definisi C# sebagai bahasa pemrograman multi-paradigma (object-oriented, type-safe) buatan Microsoft.
  > 💡 **Analogi:** C# itu seperti **bahasa Inggris di dunia pemrograman** — punya tata bahasa (aturan tipe data) yang cukup ketat, supaya "obrolan" antara manusia dan komputer nggak gampang salah paham.
- Sejarah singkat: dirancang oleh **Anders Hejlsberg** (juga dikenal sebagai arsitek Turbo Pascal & Delphi), dirilis pertama kali bersamaan dengan **.NET Framework 1.0** pada tahun 2000–2002 sebagai bagian dari strategi Microsoft menyaingi Java.
  > 💡 **Analogi:** Anders Hejlsberg berperan seperti **arsitek yang merancang cetak biru sebuah kota** (bahasa C#), sementara .NET adalah kota itu sendiri — tempat C# "tinggal, dapat listrik, dan bekerja".
- Evolusi versi C# (garis waktu C# 1.0 s/d versi terbaru) dan kaitannya dengan versi .NET (.NET Framework → .NET Core → .NET 5+ → .NET 10 saat ini).
  > 💡 **Analogi:** mirip **update sistem operasi HP** (iOS/Android) — tiap versi baru biasanya lebih cepat, lebih aman, dan nambah fitur baru, tapi konsep dasarnya tetap sama.
- Contoh proyek/software besar yang dibangun dengan C#: Visual Studio, Unity Engine, Stack Overflow (backend awal ASP.NET), berbagai aplikasi enterprise berbasis .NET, hingga game-game besar yang dibangun di Unity.
  > 💡 **Analogi:** ini seperti menunjukkan **gedung-gedung pencakar langit yang berdiri kokoh** — C# ibarat semen dan baja yang jadi struktur utamanya, meski yang keliatan dari luar cuma fasad gedungnya (aplikasi/game-nya).
- Posisi C# di industri saat ini (backend enterprise, game development, desktop, cloud/Azure).
  > 💡 **Analogi:** C# seperti **tenaga ahli serbaguna di sebuah perusahaan** — bisa ditempatkan di bagian sistem internal, layanan online, aplikasi desktop, cloud, bahkan produksi game.

### 5.2 Kelebihan dan Kekurangan C#

Halaman **"Kelebihan & Kekurangan C#"**, disajikan dalam format tabel perbandingan agar mudah dipindai — tiap poin diberi analogi sehari-hari:

**Kelebihan:**

| Kelebihan | Analogi Sederhana |
|---|---|
| Strongly-typed & type-safe → mengurangi bug saat runtime | Seperti **kotak barang yang sudah diberi label jelas** — nggak bisa asal taruh barang beda jenis, jadi nggak ketuker pas dipakai nanti |
| Ekosistem .NET matang, didukung penuh Microsoft (LTS, tooling, dokumentasi lengkap) | Seperti **brand mobil besar yang punya bengkel resmi di mana-mana** — kalau ada masalah, gampang cari suku cadang dan servis resmi |
| Cross-platform (Windows, Linux, macOS) sejak era .NET Core | Seperti **charger USB-C** yang bisa dipakai buat HP, laptop, atau tablet — nggak perlu ganti-ganti alat |
| Performa tinggi, mendekati bahasa native | Seperti **mobil yang irit bensin tapi tetap kencang di jalan tol** |
| Cocok multi-domain (web, desktop, game, cloud, mobile) | Seperti **pisau lipat serbaguna** — satu alat, banyak fungsi |
| Tooling IDE sangat kuat (Visual Studio, Rider, IntelliSense) | Seperti **bengkel lengkap dengan mekanik siap bantu 24 jam**, bukan cuma dikasih kunci pas doang |

**Kekurangan:**

| Kekurangan | Analogi Sederhana |
|---|---|
| Historis terasa "terikat" ekosistem Microsoft/Windows (meski sudah banyak berubah) | Dulu ibarat **aplikasi yang cuma bisa dibuka di satu merek HP tertentu** |
| Kurva belajar OOP & tipe data ketat terasa berat bagi pemula dari bahasa dinamis (Python/JS) | Seperti **belajar mobil manual dulu sebelum matic** — awalnya ribet, tapi begitu paham, kontrolnya jadi lebih presisi |
| Ukuran runtime/aplikasi bisa lebih besar dibanding bahasa scripting ringan | Seperti **bawa toolbox lengkap kemana-mana**, dibanding cuma bawa satu obeng kecil di kantong |
| Komunitas & lowongan kerja di beberapa region masih kalah besar dari JS/Python | Seperti **restoran enak tapi belum se-terkenal warteg di tiap sudut jalan** — kualitasnya nggak kalah, cuma jumlahnya belum sebanyak itu |

*(Catatan: poin-poin di atas adalah kerangka awal; saat produksi konten sebaiknya divalidasi ulang dengan sumber terbaru karena ekosistem berkembang cepat.)*

> 💡 **Analogi:** seperti buku panduan gadget — prinsip dasarnya bisa tetap sama, tetapi model, fitur, dan versi terbaru perlu dicek lagi sebelum diterbitkan.

### 5.3 Tools, Framework, dan Ekosistem C#

Halaman **"Tools & Ekosistem"**, dikelompokkan per kategori dengan analogi supaya orang awam langsung ngeh fungsinya:

- **IDE/Editor** (Visual Studio, VS Code + C# Dev Kit, JetBrains Rider) — *seperti bengkel lengkap dengan alat-alat siap pakai, bukan cuma kasih obeng doang.*
- **SDK/Runtime** (.NET SDK, LTS terbaru **.NET 10** dengan **C# 14**; preview berikutnya **C# 15/.NET 11**) — *seperti kotak perkakas dasar yang wajib ada sebelum mulai kerja apa pun.*
- **Web Framework** (ASP.NET Core — MVC, Web API, Minimal API, Blazor) — *seperti cetakan kue: tinggal isi adonan (logic bisnis), nggak perlu bikin cetakan dari nol.*
- **Desktop** (WPF, WinForms, .NET MAUI) — *seperti bikin furnitur yang bisa dipasang di banyak jenis "rumah" (Windows, Mac, dll) tanpa didesain ulang total.*
- **Game Development** (Unity, Godot) — *seperti panggung teater, di mana C# jadi "naskah" yang mengatur gerak-gerik aktor (objek dalam game).*
- **ORM/Database** (Entity Framework Core, Dapper) — *seperti penerjemah antara bahasa C# dan bahasa database, jadi nggak perlu nulis SQL manual terus-menerus.*
- **Testing** (xUnit, NUnit, MSTest) — *seperti quality control di pabrik — tiap "produk" (fitur) dicek dulu sebelum dikirim ke pelanggan.*
- **Package Manager** (NuGet) — *seperti App Store/Play Store-nya C#, tinggal instal "paket" fitur yang sudah jadi.*
- **Cloud** (Azure) — *seperti menyewa gedung kantor siap pakai, dibanding bangun gedung sendiri dari nol.*
- **DevOps/CI-CD** (GitHub Actions, Azure DevOps) — *seperti ban berjalan otomatis di pabrik: kode masuk, otomatis dicek dan dikemas rapi.*

> Rekomendasi: halaman ini dibuat dalam format **card/grid** dengan logo + deskripsi singkat + link dokumentasi resmi, dan ditandai kategori "wajib untuk pemula" vs "untuk level lanjut".

> 💡 **Analogi:** seperti rak supermarket yang dibagi per kategori dan diberi label **“kebutuhan pokok”** versus **“opsional”**, sehingga pemula tidak bingung harus mengambil semuanya sekaligus.

### 5.4 Fitur/Metode C# yang Tidak Ada (atau Berbeda) di Bahasa Lain

Halaman **"Fitur Unik C#"** — penting untuk menunjukkan nilai jual C# dibanding bahasa lain:

- **LINQ (Language Integrated Query)** — query data langsung di dalam sintaks C#, mirip SQL tapi native di bahasa.
  > 💡 *Seperti mesin pencari bawaan di dalam bahasa itu sendiri — nggak perlu "keluar rumah" (nulis loop manual) buat nyari barang, tinggal minta lewat satu perintah.*
- **Properties** dengan syntax `get`/`set` bawaan bahasa, tanpa perlu bikin method getter/setter manual seperti di Java.
  > 💡 *Seperti pintu otomatis di mall — pengunjung (kode lain) nggak perlu tahu cara kerja motor di baliknya, tinggal lewat saja.*
- **Delegates & Events** sebagai first-class citizen untuk pola observer/callback.
  > 💡 *Seperti bel pintu rumah — begitu ditekan (event terjadi), semua orang yang "berlangganan" bel itu langsung tahu dan bereaksi, tanpa harus dicek satu-satu.*
- **Nullable Reference Types** — sistem type yang membantu mencegah null reference exception sejak compile-time.
  > 💡 *Seperti stiker "HATI-HATI: MUNGKIN KOSONG" di kardus — orang yang angkat sudah waspada duluan, nggak kaget pas dibuka ternyata isinya nggak ada.*
- **Async/Await** — sintaks asynchronous programming yang sangat ergonomis.
  > 💡 *Seperti masak sambil nunggu cucian selesai — nggak perlu diam mematung nungguin air mendidih, sambil nunggu bisa kerjain hal lain, begitu selesai baru balik lagi.*
- **Extension Methods** — menambahkan method baru ke tipe data yang sudah ada tanpa mengubah source code aslinya.
  > 💡 *Seperti nambahin casing/aksesoris ke HP tanpa perlu bongkar mesin HP-nya.*
- **Pattern Matching** modern (switch expressions, record types).
  > 💡 *Seperti satpam yang mencocokkan pola wajah/KTP dengan cepat untuk menentukan orang itu masuk kategori mana.*
- **Partial Classes**, **Attributes/Reflection**, dan **Unsafe Code** untuk kontrol memori low-level.
  > 💡 *Seperti mengizinkan mekanik ahli buka kap mesin mobil untuk oprek langsung ke dalam — sesuatu yang biasanya "disegel" di kebanyakan mobil lain.*

### 5.5 Pembelajaran dan Latihan Menggunakan C# (Roadmap Utama)

Ini adalah **jantung dari website**, disusun sebagai roadmap bertahap.

> 💡 **Analogi besar:** seluruh roadmap ini seperti **main game RPG** — naik level satu per satu (Beginner → Intermediate → Advanced → Master), tiap level ada "musuh" (studi kasus/latihan) yang harus dikalahkan dulu sebelum lanjut ke level berikutnya. Nggak bisa loncat dari level 1 langsung ke bos akhir.

**Tahap 1 — Fondasi (Beginner)** *(ibarat belajar mengenal dapur: alat-alat dasar dan bahan-bahan utama)*
- Instalasi .NET SDK & IDE — *seperti menyiapkan meja kerja, laptop, dan alat tulis sebelum mulai belajar; tanpa alatnya, materi belum bisa dipraktikkan.*
- Sintaks dasar: variabel, tipe data, operator — *seperti belajar alfabet, angka, dan tanda baca sebelum bisa menulis kalimat.*
- Struktur kontrol: if/else, switch, loop — *seperti membuat aturan: kalau hujan bawa payung, kalau tidak hujan lanjut jalan; loop seperti mengulang mencuci piring sampai semuanya bersih.*
- Array & koleksi dasar (List, Dictionary) — *seperti rak penyimpanan: List seperti daftar belanja berurutan, Dictionary seperti buku telepon yang mencari data berdasarkan nama/kunci.*
- Method & parameter — *seperti resep kecil yang bisa dipakai berulang; parameter adalah bahan yang dimasukkan ke resep tersebut.*

**Tahap 2 — OOP (Intermediate)** *(ibarat belajar menyusun resep jadi sistem — bahan mana masuk kategori apa)*
- Class, object, constructor — *class seperti cetakan rumah, object adalah rumah yang benar-benar dibangun, constructor adalah proses awal saat rumah mulai dibuat.*
- Encapsulation, Inheritance, Polymorphism, Abstraction — *seperti dunia kendaraan: mesin disembunyikan di balik kap (encapsulation), mobil listrik dan mobil bensin sama-sama mewarisi konsep kendaraan (inheritance), tombol “start” bisa bekerja berbeda pada tiap kendaraan (polymorphism), dan pengemudi cukup tahu cara mengemudi tanpa memahami semua detail mesin (abstraction).*
- Interface vs Abstract Class — *interface seperti daftar syarat yang wajib dipenuhi sebuah pekerjaan, sedangkan abstract class seperti kerangka bangunan yang sudah menyediakan sebagian fondasi tetapi masih harus dilengkapi.*
- Exception handling (try/catch/finally) — *seperti prosedur darurat: coba jalankan rencana, kalau ada masalah tangani, dan apa pun hasilnya tetap lakukan langkah penutup seperti mematikan kompor.*

**Tahap 3 — Konsep Lanjutan (Advanced)** *(ibarat belajar teknik masak level restoran — lebih efisien dan rapi)*
- Generics — *seperti kotak penyimpanan serbaguna dengan aturan jenis isi; desain kotaknya sama, tetapi bisa dipakai khusus untuk buku, pakaian, atau alat.*
- Delegates, Events, Lambda expression — *seperti sistem notifikasi: delegate menentukan siapa yang bisa dipanggil, event memberi tahu saat sesuatu terjadi, dan lambda seperti menulis instruksi singkat tanpa membuat formulir panjang.*
- LINQ — *seperti meminta petugas gudang: “ambil semua barang kategori A yang stoknya masih ada”, tanpa kita menyisir rak satu per satu.*
- Async/Await & multithreading dasar — *seperti kasir yang bisa melayani pekerjaan lain sambil menunggu mesin pembayaran memproses transaksi, bukan berdiri diam tanpa melakukan apa-apa.*
- File I/O & serialization (JSON) — *File I/O seperti membaca/menulis buku catatan; serialization seperti mengemas isi objek ke format paket standar agar mudah disimpan atau dikirim.*

**Tahap 4 — Spesialisasi (Menuju Master)** *(ibarat memilih jadi koki khusus — pastry, masakan Asia, atau grill)*
- Pilih jalur: Web (ASP.NET Core) / Desktop (MAUI/WPF) / Game (Unity) — *seperti lulusan kedokteran memilih spesialisasi: dasar ilmunya sama, tetapi bidang penerapannya berbeda.*
- Design pattern umum (Singleton, Factory, Repository, dsb.) — *seperti pola denah bangunan yang sudah terbukti efektif; tidak perlu menemukan cara baru setiap kali menghadapi masalah yang sama.*
- Unit testing & clean code — *seperti mengecek setiap komponen kendaraan sebelum dirakit sekaligus menata kabelnya dengan rapi agar mudah diperbaiki nanti.*
- Koneksi database dengan Entity Framework Core — *seperti menghubungkan aplikasi ke gudang data melalui petugas penerjemah yang memahami bahasa kedua sisi.*
- Deployment dasar (publish aplikasi, containerization dengan Docker) — *seperti memindahkan makanan dari dapur percobaan ke kemasan standar agar bisa dikirim dan disajikan dengan cara yang sama di tempat berbeda.*

**Fitur latihan yang menyertai tiap tahap:**
- Mini quiz pilihan ganda per topik *(seperti ujian sabuk di bela diri — buktikan dulu kemampuan sebelum naik sabuk berikutnya)*.
- Coding challenge sederhana dengan studi kasus — *seperti latihan simulasi sebelum ujian praktik: pengguna menghadapi masalah kecil yang menyerupai situasi nyata.*
- Proyek akhir per tahap (contoh: Tahap 1 → kalkulator sederhana; Tahap 4 → aplikasi CRUD lengkap) — *seperti tugas membuat satu produk jadi setelah selesai mempelajari beberapa teknik, agar semua kemampuan digabungkan dalam satu pekerjaan nyata.*

### 5.6 Saran Fitur Tambahan untuk Website

Lihat Bagian 6 di bawah — bagian ini dijawab lebih detail sebagai bagian dari *functional requirements* karena berupa daftar fitur konkret, bukan konten.

> 💡 **Analogi:** Bagian 5 membahas **apa yang dipelajari di kelas**, sedangkan Bagian 6 membahas **fasilitas sekolahnya** — papan tulis, ruang latihan, rapor progres, dan alat bantu belajar.

---

## 6. Functional Requirements (Daftar Fitur)

Diprioritaskan pakai model **MoSCoW** (Must have / Should have / Could have / Won't have).

> 💡 **Analogi MoSCoW:** seperti **packing koper liburan** — *Must have* itu paspor & tiket (wajib banget, nggak bisa berangkat tanpa itu), *Should have* itu baju cadangan (penting, tapi masih bisa dicari di tempat tujuan kalau ketinggalan), *Could have* itu oleh-oleh titipan (bagus kalau kebawa, nggak masalah juga kalau nggak), dan *Won't have* itu barang yang memang sengaja ditinggal di rumah dulu untuk trip kali ini.

### Must Have (MVP)
- Halaman roadmap visual (timeline/step-by-step) dari Beginner → Master — *seperti peta perjalanan yang menunjukkan titik awal, pemberhentian, dan tujuan akhir.*
- Halaman konten per topik (pengertian, kelebihan-kekurangan, tools, fitur unik) — *seperti buku pelajaran yang setiap babnya fokus pada satu tema supaya tidak bercampur.*
- Navigasi sitemap yang jelas (sidebar/menu per tahap) — *seperti papan petunjuk di rumah sakit: pengguna tahu harus menuju ruangan mana tanpa bertanya terus-menerus.*
- Desain responsif (mobile-friendly) — *seperti meja lipat yang bisa menyesuaikan ukuran ruangan; tampilannya tetap nyaman di HP, tablet, maupun desktop.*
- Search/filter konten dasar — *seperti indeks di belakang buku: pengguna bisa langsung mencari istilah yang dibutuhkan tanpa membuka halaman satu per satu.*

### Should Have
- **Progress tracker** *(seperti checklist di kertas ujian — dicentang tiap kelar satu soal)* — checklist topik yang sudah diselesaikan.
- **Quiz interaktif** per topik dengan skor *(mirip ulangan harian di sekolah — bukan untuk menghukum, tetapi untuk mengecek bagian mana yang sudah dipahami dan mana yang perlu diulang)*.
- **Code playground** sederhana *(seperti taman bermain pasir — bisa coba-coba bentuk tanpa takut merusak apa pun di luar taman itu)*.
- **Dark mode** — *seperti mengganti lampu kamar dari terang ke redup agar mata lebih nyaman sesuai kondisi lingkungan.*
- Halaman "Rekomendasi jalur karier" (Web Dev / Game Dev / Desktop Dev) berdasarkan minat — *seperti konselor sekolah yang membantu memilih jurusan berdasarkan minat dan tujuan.*

### Could Have
- **Sistem akun/login** agar progres tersimpan permanen lintas device — *seperti punya kartu anggota: catatan belajar tetap dikenali walau pengguna datang dari perangkat yang berbeda.*
- **Sertifikat digital** otomatis setelah menyelesaikan seluruh roadmap *(seperti piagam kelulusan kursus — bukti bahwa seluruh jalur sudah diselesaikan)*.
- **Forum/diskusi** atau komentar per halaman untuk tanya-jawab komunitas — *seperti ruang belajar kelompok tempat peserta bisa bertanya dan saling membantu.*
- **Leaderboard** gamifikasi (poin, badge) *(mirip papan skor tinggi di warnet/game arcade dulu — memberi dorongan tambahan lewat pencapaian yang terlihat)*.
- Integrasi **AI Assistant** *(seperti guru les privat yang standby 24 jam)* untuk menjawab pertanyaan seputar materi C#.
- Bookmark/simpan halaman favorit — *seperti memberi sticky note pada halaman buku penting agar mudah dibuka kembali.*
- Estimasi waktu belajar per topik (misal: "±2 jam") agar user bisa atur target — *seperti melihat durasi film sebelum menonton, sehingga pengguna bisa menyesuaikan dengan waktu yang tersedia.*

### Won't Have (di luar scope v1)
- Live class / mentoring berbayar — *ibarat sekolah memilih belum membuka kelas tatap muka dulu karena versi pertama fokus membangun buku dan ruang belajarnya.*
- Sistem pembayaran/monetisasi — *seperti toko yang pada fase awal masih menjadi ruang pamer, belum memasang kasir karena fokusnya menguji pengalaman pengunjung.*
- Multi-bahasa (selain Bahasa Indonesia) — bisa jadi rencana fase berikutnya — *seperti menerbitkan buku edisi Indonesia dulu, lalu menerjemahkannya ke bahasa lain setelah isi utamanya matang.*

---

## 7. Non-Functional Requirements

| Aspek | Penjelasan | Analogi |
|---|---|---|
| **Performance** | Halaman statis/konten harus load cepat (<2 detik) | Seperti **restoran cepat saji** — pesanan harus cepat sampai meja, kalau kelamaan pelanggan kabur |
| **SEO** | Struktur URL & heading yang ramah mesin pencari | Seperti **papan nama toko di pinggir jalan ramai** — biar gampang ditemukan orang yang lewat/nyari |
| **Accessibility** | Kontras warna cukup, mendukung navigasi keyboard dasar | Seperti **trotoar dengan jalur khusus kursi roda** — memastikan semua orang bisa akses, bukan cuma sebagian |
| **Maintainability** | Konten dipisah dari kode agar mudah diupdate | Seperti **buku manual servis motor** — begitu ada yang rusak/mau diupdate, tinggal buka manualnya, nggak perlu bongkar semua dari awal |
| **Scalability** | Struktur data topik dibuat modular | Seperti **rumah dengan pondasi kuat dari awal** — gampang nambah kamar kalau keluarga makin besar, nggak perlu bongkar total |

---

## 8. Information Architecture / Sitemap

> 💡 **Analogi:** sitemap ini seperti **denah mall** — begitu masuk, pengunjung langsung tahu lantai mana ada apa, tanpa harus muter-muter nyasar.

```
Home
├── Roadmap (halaman utama, visual timeline) — seperti peta utama perjalanan
├── Apa itu C#? (sejarah & pengertian) — seperti bab pengenalan tokoh dan asal-usulnya
├── Kelebihan & Kekurangan — seperti melihat plus-minus kendaraan sebelum membelinya
├── Tools & Ekosistem — seperti mengenal isi kotak perkakas
├── Fitur Unik C# — seperti mengenal fitur khusus sebuah kendaraan
├── Materi Belajar — seperti ruang kelas utama
│   ├── Tahap 1: Fondasi — seperti belajar alfabet
│   ├── Tahap 2: OOP — seperti belajar menyusun bagian-bagian menjadi sistem
│   ├── Tahap 3: Konsep Lanjutan — seperti masuk latihan tingkat lanjut
│   └── Tahap 4: Spesialisasi — seperti memilih jurusan
├── Latihan & Quiz — seperti ruang ujian dan latihan
├── Progress Saya (dashboard tracker) — seperti rapor perjalanan belajar
└── Tentang / FAQ — seperti meja informasi
```

## 9. User Flow (Ringkas)

> 💡 **Analogi:** alur ini seperti **rute jalan kaki pengunjung mall** — dari pintu masuk utama, ke etalase besar (roadmap), lalu mampir ke toko-toko (topik) satu per satu sesuai rencana belanja.

1. User masuk ke Home → diarahkan ke halaman **Roadmap** sebagai peta utama. *(Seperti masuk ke taman wisata lalu pertama-tama melihat peta area.)*
2. User klik salah satu tahap → masuk ke daftar topik dalam tahap tersebut. *(Seperti memilih satu zona di peta lalu melihat wahana apa saja yang ada di sana.)*
3. User baca materi topik → kerjakan quiz/latihan di akhir halaman → topik otomatis tercentang di progress tracker. *(Seperti menyelesaikan satu pos permainan lalu mendapat cap bahwa pos itu sudah dituntaskan.)*
4. User lanjut ke topik berikutnya sesuai urutan roadmap, atau eksplor bebas via menu. *(Seperti mengikuti rute tur resmi atau memilih jalan sendiri jika sudah tahu tujuan.)*
5. Setelah semua tahap selesai → muncul notifikasi/sertifikat penyelesaian (jika fitur ini diaktifkan). *(Seperti mendapat medali setelah menyelesaikan seluruh lintasan lomba.)*

---

## 10. Arsitektur Sistem & Framework (Full C# Stack)

Karena website ini fokus penuh ke C#, seluruh stack pembangunannya juga dibuat end-to-end pakai ekosistem C#/.NET — selain konsisten, ini sekaligus jadi bukti nyata (dogfooding) dari apa yang diajarkan di dalam kontennya sendiri.

> 💡 **Analogi:** seperti **sekolah memasak yang dapurnya sendiri memakai teknik yang diajarkan di kelas** — peserta bukan hanya diberi teori, tetapi bisa melihat bahwa ilmunya benar-benar dipakai untuk membangun produknya.

### 10.1 Arsitektur Environment: Development → Staging → Production

> 💡 **Analogi besar:** bayangkan ini seperti **membuka restoran**.
> - **Development** = dapur rumah sendiri — bebas coba-coba resep, boleh gagal berkali-kali, nggak ada yang lihat kalau kebakar.
> - **Staging** = dapur restoran saat *soft opening* — masakan disimulasikan persis kayak beneran, dicicipin tim internal dulu, tapi belum untuk pelanggan asli.
> - **Production** = restoran yang sudah resmi buka — harus higienis, rapi, dan minim kesalahan, karena langsung dinilai pelanggan sungguhan.

```
[ Development ]          [ Staging ]              [ Production ]
Local machine             Pre-live server           Live server
.NET SDK (10 LTS)   →     Mirror config prod   →    Azure App Service /
Docker (DB lokal)         Data dummy/sample          hosting resmi
Hot reload                Dipakai utk QA/UAT         Data & user asli
     │                         │                          │
     └──── git push ────► CI/CD Pipeline (GitHub Actions) ┘
              (build, test, otomatis deploy per environment)
```

| Environment | Tujuan | Karakteristik | Analogi |
|---|---|---|---|
| **Development** | Coding sehari-hari di lokal | .NET SDK terpasang lokal, database via Docker container, hot reload aktif untuk iterasi cepat, memakai `appsettings.Development.json` | Seperti **dapur percobaan pribadi** — bebas mencoba resep, mengubah bahan, dan gagal tanpa dilihat pelanggan |
| **Staging** | Tempat uji coba sebelum rilis (QA/UAT) | Konfigurasi & environment semirip mungkin dengan production, memakai data dummy/sample, dipakai untuk cek bug sebelum di-deploy ke user asli | Seperti **simulasi soft opening** — meja, menu, dan alurnya dibuat semirip restoran asli tetapi belum melayani pelanggan umum |
| **Production** | Environment live yang diakses user | Data & user sungguhan, wajib ada monitoring/logging, backup database terjadwal, HTTPS wajib | Seperti **restoran yang sudah buka resmi** — semua proses harus stabil karena langsung dipakai pelanggan sungguhan |

**CI/CD:** Setiap push ke branch tertentu (misal `develop` → auto-deploy ke Staging, `main` → auto-deploy ke Production) via **GitHub Actions**, dengan tahapan: build → run unit test → publish → deploy.

> 💡 **Analogi:** seperti paket di pusat sortir otomatis: label tujuan menentukan apakah paket masuk jalur pemeriksaan internal (Staging) atau jalur pengiriman pelanggan (Production), lalu mesin menjalankan tahapan pemeriksaan secara berurutan.

> 💡 **Analogi CI/CD:** seperti **ban berjalan otomatis di pabrik makanan** — begitu adonan (kode) baru masuk, otomatis dicek kualitasnya, dimasak, dikemas, lalu dikirim ke rak yang sesuai (environment yang sesuai), tanpa perlu buruh angkat manual satu-satu.

Konfigurasi rahasia (connection string, API key) disimpan di **GitHub Secrets**/Azure App Configuration, bukan hardcode di kode — *seperti brankas terpisah untuk simpan kunci rumah, bukan digantung di depan pintu.*

### 10.2 Framework untuk API / Backend

> 💡 **Analogi:** kalau website ini ibarat restoran, **backend/API adalah dapurnya** — tempat semua "olahan" data terjadi. Pelanggan (user) nggak lihat langsung apa yang terjadi di dalam, tapi ini bagian paling menentukan rasa akhirnya.

- **ASP.NET Core Web API** — bisa pakai **Minimal API** (ringkas, cocok endpoint sederhana seperti progress tracker/quiz) atau **Controller-based** (lebih terstruktur untuk API besar). *Analogi: Minimal API seperti loket kecil dengan sedikit layanan; Controller-based seperti kantor pelayanan besar yang membagi urusan ke beberapa meja supaya rapi.*
- **Entity Framework Core** — ORM untuk akses database. *Analogi: seperti penerjemah antara chef (kode C#) dan gudang bahan baku (database), jadi chef nggak perlu paham "bahasa gudang" secara detail.*
- **Autentikasi:** ASP.NET Core Identity + **JWT** *(seperti kartu member restoran — bukti bahwa yang datang memang pelanggan terdaftar)*.
- **Database:** SQL Server, PostgreSQL, atau MySQL — EF Core mendukung ketiganya lewat provider masing-masing. *Analogi: database seperti gudang penyimpanan; SQL Server/PostgreSQL/MySQL adalah merek gudangnya, sedangkan EF Core punya “jalur pengiriman” yang bisa terhubung ke masing-masing.*
- **Validasi & mapping:** FluentValidation, AutoMapper (opsional). *Analogi: validasi seperti petugas pemeriksa formulir sebelum diterima, sedangkan mapping seperti petugas yang memindahkan data dari formulir A ke format formulir B tanpa mengetik ulang semuanya.*
- **Testing:** xUnit + WebApplicationFactory untuk integration test endpoint. *Analogi: seperti simulasi layanan restoran dari saat pelanggan memesan sampai makanan tiba, untuk memastikan seluruh rantai proses bekerja, bukan cuma satu alat di dapur.*

### 10.3 Framework untuk Frontend

> 💡 **Analogi:** kalau backend itu dapur, **frontend adalah meja saji/etalase** — tempat pelanggan (user) melihat menu dan memilih apa yang mau dipesan.

Supaya tetap 100% dalam ekosistem C# (tanpa perlu menulis JavaScript terpisah), pilihan utamanya adalah **Blazor**:

> 💡 **Analogi:** seperti memilih satu bahasa komunikasi untuk seluruh tim proyek — daripada bagian depan bicara bahasa A dan bagian belakang bahasa B, tim bisa tetap bekerja dengan “bahasa” C# dari banyak sisi.

| Mode | Cara Kerja | Analogi | Cocok Untuk |
|---|---|---|---|
| **Blazor WebAssembly (WASM)** | Kode C# di-compile ke WebAssembly, jalan langsung di browser | Seperti **download resep lengkap ke rumah pelanggan** — pelanggan bisa "masak sendiri" (proses) di dapurnya (browser) tanpa harus telepon restoran tiap kali mau nambah bumbu | Interaktivitas tinggi (progress tracker real-time, quiz, code playground) |
| **Blazor Server** | UI dirender di server, komunikasi lewat SignalR | Seperti **layanan delivery real-time** — tiap kali pelanggan minta sesuatu, request dikirim ke dapur restoran (server), diproses, baru hasilnya dikirim balik | Loading awal cepat & SEO mudah, tapi butuh koneksi internet stabil terus |
| **Blazor United/Auto (hybrid, .NET 8+)** | Kombinasi statis + interaktif | Seperti **menu utama dicetak di brosur** (statis, cepat dibaca semua orang) **tapi bagian custom order pakai sistem real-time** | Kombinasi ideal: halaman materi statis (SEO-friendly) + fitur interaktif (quiz, tracker, playground) |

> Rekomendasi: pakai **render mode hybrid/auto** — halaman konten roadmap dirender statis agar cepat & SEO-friendly, sementara komponen interaktif (quiz, progress tracker, code playground) pakai mode interaktif.

> 💡 **Analogi:** seperti **buku pelajaran digital**: halaman teorinya sudah tercetak dan bisa dibuka cepat, tetapi bagian latihan memiliki tombol, skor, dan aktivitas interaktif yang hidup saat digunakan.

**Opsional untuk pengembangan lanjutan:** jika suatu saat ingin ada versi aplikasi desktop/mobile dari roadmap ini, **.NET MAUI Blazor Hybrid** memungkinkan reuse komponen Blazor yang sama — *seperti resep yang sama dipakai lagi, tinggal ganti wadah penyajiannya.*

### 10.4 Diagram Arsitektur High-Level

```
┌─────────────────────┐        ┌──────────────────────┐        ┌────────────────┐
│   Frontend (Blazor)  │  HTTP  │  Backend (ASP.NET     │  EF    │   Database      │
│  WASM/Server/Auto     │──────▶│  Core Web API)         │  Core  │  (SQL Server /  │
│  - Halaman roadmap     │◀──────│  - Endpoint konten     │───────▶│   PostgreSQL /  │
│  - Quiz & tracker      │        │  - Endpoint progress   │        │   MySQL)        │
│  - Code playground      │        │  - Auth (Identity/JWT) │        │                 │
└─────────────────────┘        └──────────────────────┘        └────────────────┘
      (etalase/meja saji)            (dapur restoran)              (gudang bahan baku)
```

Seluruh lapisan — frontend, backend API, hingga layer akses data — konsisten dibangun dengan C#, sehingga selaras dengan tujuan website ini sebagai media belajar C# itu sendiri.

> 💡 **Analogi:** seperti membangun **rumah contoh dari bahan yang sedang dipromosikan** — pengunjung bisa melihat langsung bahwa bahan tersebut bukan hanya dibahas di brosur, tetapi benar-benar dipakai dari ruang depan sampai fondasi.

---

## 11. Success Metrics / KPI

> 💡 **Analogi:** angka-angka di bawah ini seperti **rapor nilai sekolah** — menunjukkan apakah "murid" (website) beneran belajar dengan baik, atau cuma dibuka sekali lalu ditinggal.

- Jumlah pengunjung unik & retensi (user kembali lagi untuk lanjut belajar) — *seperti menghitung berapa orang masuk ke gym dan berapa banyak yang benar-benar kembali latihan minggu berikutnya.*
- Completion rate tiap tahap roadmap (berapa % user yang menyelesaikan Tahap 1, 2, dst) — *seperti melihat berapa peserta kursus yang berhasil naik kelas, bukan hanya mendaftar di awal.*
- Rata-rata skor quiz per topik — *seperti nilai ulangan kelas untuk melihat apakah materi benar-benar dipahami atau hanya dibaca sekilas.*
- Waktu rata-rata yang dihabiskan per sesi belajar — *seperti mengukur berapa lama pengunjung berada di perpustakaan; terlalu sebentar bisa berarti materi tidak menarik, terlalu lama bisa berarti materinya membingungkan.*

## 12. Roadmap Pengembangan Website (Milestone)

> 💡 **Analogi:** seperti **membangun rumah** — nggak mungkin pasang atap dulu sebelum pondasi jadi. MVP (Fase 1) itu pondasi & dinding dasarnya; fitur-fitur berikutnya itu perabotan dan dekorasi yang nambah kenyamanan.

| Fase | Fokus | Analogi |
|---|---|---|
| Fase 1 (MVP) | Konten dasar (poin 5.1–5.5) + navigasi + desain responsif | Seperti **membangun pondasi, dinding, dan pintu rumah** agar sudah bisa dipakai secara dasar |
| Fase 2 | Progress tracker + quiz interaktif | Seperti menambahkan **rapor dan ruang latihan** supaya penghuni tahu perkembangan kemampuannya |
| Fase 3 | Code playground + dark mode + rekomendasi jalur karier | Seperti menambahkan **workshop, lampu yang bisa diatur, dan konselor arah karier** |
| Fase 4 | Akun/login, sertifikat, forum, gamifikasi | Seperti membangun **komunitas penghuni lengkap dengan kartu anggota, piagam, ruang diskusi, dan sistem penghargaan** |

## 13. Risiko & Mitigasi

> 💡 **Analogi:** mitigasi di sini seperti **bawa payung sebelum hujan** — nggak nunggu masalah beneran kejadian baru dicariin solusinya.

| Risiko | Mitigasi | Analogi |
|---|---|---|
| Konten cepat basi karena versi C#/.NET terus update (rilis tahunan) | Pisahkan konten versi-spesifik agar mudah direvisi; buat catatan "terakhir diupdate" di tiap halaman | Seperti **buku harga elektronik** yang cepat usang; bagian yang sering berubah harus dibuat mudah diganti tanpa mencetak ulang seluruh buku |
| Scope terlalu besar untuk dikerjakan sendiri | Mulai dari MVP (Fase 1) dulu, fitur lain menyusul bertahap | Seperti membangun rumah **satu lantai yang layak huni dulu**, bukan memaksa membuat gedung 10 lantai sekaligus |
| Konten terasa seperti terjemahan dokumentasi resmi, kurang orisinal | Tambahkan penjelasan dengan bahasa sendiri, analogi, dan studi kasus lokal/relatable | Seperti guru yang tidak hanya membaca buku teks, tetapi **menerjemahkan konsep ke contoh kehidupan sehari-hari** supaya murid benar-benar paham |

---

## Catatan Penutup

PRD ini adalah kerangka awal. Sebelum masuk tahap desain UI/UX dan development, disarankan:
1. Validasi ulang poin-poin teknis (kelebihan/kekurangan, fitur unik) dengan sumber terbaru — ekosistem C#/.NET berkembang cepat (saat ini versi stabil adalah **.NET 10 LTS dengan C# 14**, dengan **C# 15/.NET 11** dalam tahap preview). *(Seperti mengecek harga dan jadwal kereta sebelum berangkat; informasi lama bisa sudah berubah.)*
2. Tentukan dulu scope MVP (Fase 1) agar proyek tidak terlalu besar di awal. *(Seperti membuka warung dengan menu inti dulu, bukan langsung menyediakan ratusan menu pada hari pertama.)*
3. Buat wireframe sederhana untuk halaman Roadmap (karena ini halaman paling penting/sering dibuka). *(Seperti menggambar denah rumah di kertas sebelum mulai memasang batu bata.)*
4. Pertahankan gaya "analogi sehari-hari" ini juga saat menulis konten asli di website — ini yang bikin materi C# terasa lebih dekat dan mudah dicerna orang awam, bukan cuma copy-paste dari dokumentasi resmi. *(Seperti guru yang selalu menghubungkan rumus dengan contoh nyata, sehingga murid tidak hanya menghafal tetapi memahami.)*