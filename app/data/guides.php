<?php

declare(strict_types=1);

return [
    'guides' => [
        'tentang-csharp' => [
            'title' => 'Apa itu C#?',
            'eyebrow' => 'KENALI BAHASANYA',
            'summary' => 'Satu bahasa untuk membangun banyak hal. Kenali asal-usul C#, hubungannya dengan .NET, dan tempatnya di dunia pengembangan aplikasi.',
            'sections' => [
                [
                    'heading' => 'C# dibaca “C sharp”',
                    'body' => 'C# adalah bahasa pemrograman serbaguna dengan pemeriksaan tipe yang kuat. Kamu dapat menulis instruksi sederhana, menyusun aplikasi dengan object-oriented programming, dan mengolah data memakai gaya deklaratif. Pemeriksaan compiler membantu menemukan banyak kesalahan sebelum program dijalankan, tetapi logika program tetap perlu diuji.',
                    'analogy' => 'Bayangkan menulis resep dengan satuan bahan yang jelas. Gram, mililiter, dan jumlah butir membantu mencegah salah campur sebelum masakan masuk ke panci.',
                    'code' => <<<'CSHARP'
string nama = "Habib";
int hariBelajar = 1;

Console.WriteLine($"Halo, {nama}! Ini hari ke-{hariBelajar} belajar C#.");
CSHARP,
                ],
                [
                    'heading' => 'C# dan .NET punya peran berbeda',
                    'body' => 'C# adalah bahasanya. .NET adalah platform yang menyediakan runtime, pustaka, dan alat pengembangan. SDK digunakan untuk membuat, membangun, dan menjalankan proyek; runtime menjalankan aplikasi yang sudah dibangun. Saat belajar dari nol, pasang .NET SDK agar perlengkapan pengembangan ikut tersedia.',
                    'analogy' => 'C# adalah bahasa yang dipakai menulis resep. .NET adalah dapur beserta kompor dan perkakasnya. SDK menambahkan meja kerja untuk merancang masakan baru.',
                ],
                [
                    'heading' => 'Berawal di Microsoft',
                    'body' => 'C# dikembangkan di Microsoft. Anders Hejlsberg, Scott Wiltamuth, dan Peter Golde termasuk perancang utamanya. Implementasi awal diperkenalkan pada 2000, lalu C# 1.0 dirilis pada Januari 2002 bersama Visual Studio .NET 2002. Jadi, 2000 merujuk pada kemunculan awalnya, sedangkan 2002 merujuk pada rilis C# 1.0.',
                    'analogy' => 'Seperti rumah contoh yang diperkenalkan sebelum kompleksnya resmi dibuka: tanggal perkenalan dan tanggal rilis pertama menjelaskan dua peristiwa berbeda.',
                ],
                [
                    'heading' => 'Dari class sampai C# modern',
                    'body' => 'C# 1 membawa class, properties, dan events. C# 2 menambahkan generics; C# 3 memperkenalkan LINQ; C# 5 membawa async/await. C# 8 menambahkan nullable reference types, lalu C# 9 menghadirkan records dan top-level statements. C# 10–13 melanjutkan penyederhanaan sintaks. C# 14, dirilis November 2025, menambahkan extension members dan penyempurnaan properties.',
                    'analogy' => 'Seperti bengkel yang bertambah lengkap dari tahun ke tahun: alat baru mempercepat pekerjaan, sementara teknik dasar mengukur dan merakit tetap berguna.',
                ],
                [
                    'heading' => '.NET Framework, .NET Core, dan .NET hari ini',
                    'body' => '.NET Framework adalah lini historis yang berfokus pada Windows. .NET Core membawa fondasi lintas platform, dan lini modern diteruskan dengan nama .NET sejak .NET 5. Materi ini menggunakan .NET 10 LTS dengan C# 14 sebagai acuan stabil. Cocokkan versi SDK dengan kebutuhan proyek; tutorial .NET Framework lama dapat memakai API dan struktur proyek yang berbeda.',
                    'analogy' => 'Seperti keluarga kendaraan dengan generasi berbeda. Namanya mirip, tetapi suku cadang dan buku petunjuknya belum tentu dapat dipertukarkan.',
                ],
                [
                    'heading' => 'Apa yang bisa kamu bangun?',
                    'body' => 'ASP.NET Core digunakan untuk layanan web dan API. WPF dan WinForms menargetkan desktop Windows. .NET MAUI menargetkan Android, iOS, macOS, dan Windows. Di Unity, C# mengatur perilaku game melalui script; inti engine Unity juga menggunakan C/C++. Pilihan framework menentukan platform dan kemampuan aplikasi, sehingga satu bahasa tidak berarti semua proyek langsung berjalan di semua perangkat.',
                    'analogy' => 'Kemampuan menggambar denah bisa dipakai untuk rumah, toko, atau panggung. Setiap bangunan tetap membutuhkan bahan dan aturan pengerjaannya sendiri.',
                ],
                [
                    'heading' => 'Contoh proyek nyata, tanpa mitos “yang pertama”',
                    'body' => 'Roslyn, platform compiler untuk C# dan Visual Basic, merupakan contoh proyek sumber terbuka besar di ekosistem .NET. Unity menunjukkan pemakaian C# untuk scripting gameplay. Tidak ada satu daftar resmi yang menetapkan “program besar pertama yang dibuat dengan C#”; gunakan contoh yang dapat ditelusuri, bukan klaim urutan yang sulit dibuktikan.',
                    'analogy' => 'Saat belajar arsitektur, mempelajari bangunan dengan denah yang bisa diperiksa lebih berguna daripada memperdebatkan siapa yang pertama memasang batu bata.',
                ],
            ],
            'sources' => [
                ['label' => 'Microsoft · Pengantar spesifikasi C#', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/language-specification/introduction'],
                ['label' => 'Microsoft · Sejarah versi C#', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/whats-new/csharp-version-history'],
                ['label' => 'Microsoft · C# 14', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/whats-new/csharp-14'],
                ['label' => 'Microsoft · Kebijakan dukungan .NET', 'url' => 'https://dotnet.microsoft.com/en-us/platform/support/policy'],
                ['label' => 'Microsoft · Jelajah C#', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/tour-of-csharp/overview'],
                ['label' => 'Roslyn · Repositori resmi', 'url' => 'https://github.com/dotnet/roslyn'],
                ['label' => 'Unity · Arsitektur engine', 'url' => 'https://docs.unity3d.com/2021.1/Documentation/Manual/unity-architecture.html'],
            ],
        ],
        'kelebihan-kekurangan' => [
            'title' => 'Kelebihan & kekurangan C#',
            'eyebrow' => 'PILIH DENGAN PAHAM',
            'summary' => 'Bahasa yang tepat bergantung pada kebutuhanmu. Lihat kekuatan C# sekaligus biaya dan batasan yang perlu dipertimbangkan.',
            'sections' => [
                [
                    'heading' => 'Kelebihan · Kesalahan tipe terdeteksi lebih awal',
                    'body' => 'Compiler memeriksa kecocokan tipe sebelum program berjalan. Generics membantu menjaga konsistensi koleksi, dan nullable reference types dapat memperingatkan akses ke nilai yang mungkin null. Ini mengurangi sejumlah kesalahan umum, tetapi tidak membuktikan bahwa rumus, aturan bisnis, atau seluruh program sudah benar.',
                    'analogy' => 'Kotak berlabel membantu memastikan gula tidak tertukar dengan garam. Kamu masih perlu mencicipi apakah resepnya sudah pas.',
                ],
                [
                    'heading' => 'Kelebihan · Perkakas dan pustaka yang saling terhubung',
                    'body' => 'SDK menyediakan perintah build dan test, NuGet membantu mengelola paket, sedangkan editor dapat memberi saran kode dan debugger. ASP.NET Core, EF Core, dan pustaka dasar .NET mengurangi pekerjaan berulang. Dokumentasi dan kebijakan dukungan rilis membantu merencanakan pemeliharaan aplikasi.',
                    'analogy' => 'Seperti bengkel dengan perkakas yang ukurannya serasi. Kamu tetap merakit produknya, tetapi tidak perlu membuat setiap obeng sendiri.',
                ],
                [
                    'heading' => 'Kelebihan · Banyak pilihan platform dan bidang',
                    'body' => 'Aplikasi console dan ASP.NET Core dapat berjalan di Windows, Linux, dan macOS dengan dukungan .NET yang sesuai. Fondasi C# yang sama juga berguna untuk cloud, desktop, dan scripting game. Namun, kompatibilitas harus diperiksa pada framework, paket, dan API yang dipakai oleh proyek tersebut.',
                    'analogy' => 'Satu kemampuan mengemudi dapat membantu saat belajar beberapa kendaraan, tetapi setiap kendaraan tetap punya jalur dan batas penggunaannya.',
                ],
                [
                    'heading' => 'Kelebihan · Ruang untuk optimasi performa',
                    'body' => '.NET menawarkan kompilasi JIT, garbage collector, dan pilihan Native AOT untuk skenario yang mendukungnya. Aplikasi dapat berkinerja baik jika algoritma, penggunaan memori, database, dan I/O dirancang dengan tepat. Ukur kebutuhanmu dengan profiling; performa tidak dapat dijamin hanya dari pilihan bahasa.',
                    'analogy' => 'Mesin yang bagus membantu mobil melaju, tetapi rute, muatan, dan cara mengemudi ikut menentukan waktu sampai.',
                ],
                [
                    'heading' => 'Pertimbangan · Ada konsep awal yang perlu dipelajari',
                    'body' => 'Tipe data, object-oriented programming, generics, dan asynchronous programming membawa istilah baru bagi pemula. Pelajari berurutan: variabel dan percabangan dahulu, lalu method, object, dan konsep lanjutan. Kamu tidak perlu menguasai seluruh fitur bahasa untuk membuat program pertama.',
                    'analogy' => 'Belajar memasak dimulai dari memotong dan merebus. Teknik restoran menjadi lebih mudah setelah gerakan dasar terasa nyaman.',
                ],
                [
                    'heading' => 'Pertimbangan · Ukuran aplikasi dan pengelolaan memori',
                    'body' => 'Distribusi self-contained menyertakan runtime sehingga ukuran unduhan dapat bertambah. Distribusi framework-dependent memerlukan runtime yang sesuai pada mesin tujuan. Garbage collection membantu mengelola memori, tetapi alokasi berlebihan tetap dapat menambah beban; Native AOT dan trimming juga memiliki batas kompatibilitas yang perlu diuji.',
                    'analogy' => 'Membawa dapur portable membuatmu lebih mandiri saat bepergian, tetapi barang bawaannya bertambah. Memakai dapur di tujuan lebih ringan, asalkan tersedia.',
                ],
                [
                    'heading' => 'Pertimbangan · Framework dan peluang kerja punya konteks',
                    'body' => 'WPF dan WinForms tetap khusus Windows. Beberapa tool atau layanan memiliki syarat lisensi dan biaya sendiri. Untuk karier, periksa lowongan di lokasi serta industri yang kamu tuju; jumlah lowongan berubah dan tidak cukup dinilai dari popularitas bahasa secara umum. Utamakan dasar yang kuat dan proyek yang dapat diperlihatkan.',
                    'analogy' => 'Memilih perlengkapan kerja seperti menyiapkan kendaraan untuk tujuan tertentu: cek medan, biaya operasional, dan kebutuhan perjalananmu.',
                ],
            ],
            'sources' => [
                ['label' => 'Microsoft · Nullable reference types', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/null-safety/nullable-reference-types'],
                ['label' => 'Microsoft · Pilihan deployment .NET', 'url' => 'https://learn.microsoft.com/en-us/dotnet/core/deploying/'],
                ['label' => 'Microsoft · Native AOT', 'url' => 'https://learn.microsoft.com/en-us/dotnet/core/deploying/native-aot/'],
                ['label' => 'Microsoft · Tentang WPF', 'url' => 'https://learn.microsoft.com/en-us/dotnet/desktop/wpf/overview/'],
                ['label' => 'Microsoft · Dukungan .NET', 'url' => 'https://dotnet.microsoft.com/en-us/platform/support/policy'],
            ],
        ],
        'fitur-csharp' => [
            'title' => 'Fitur khas C#',
            'eyebrow' => 'KENALI KEKUATANNYA',
            'summary' => 'Fitur yang membuat kode C# terasa ekspresif, dengan contoh kecil dan analogi sehari-hari. Banyak konsep ini juga tersedia dalam bentuk berbeda di bahasa lain.',
            'sections' => [
                [
                    'heading' => 'LINQ · Tanyakan data yang kamu butuhkan',
                    'body' => 'LINQ menyediakan operasi untuk menyaring, mengurutkan, dan membentuk data melalui C#. Where menyaring elemen, Select mengubah bentuknya, dan OrderBy mengurutkan hasil. Untuk database, provider seperti EF Core menerjemahkan query yang didukung ke SQL. Tidak semua operasi C# dapat diterjemahkan oleh setiap provider.',
                    'analogy' => 'Seperti meminta petugas gudang “ambil barang yang stoknya di bawah lima”, tanpa menulis ulang prosedur pemeriksaan setiap rak.',
                    'code' => <<<'CSHARP'
int[] stok = [12, 3, 8, 1];
var perluDibeli = stok.Where(jumlah => jumlah < 5).OrderBy(jumlah => jumlah);

Console.WriteLine(string.Join(", ", perluDibeli)); // 1, 3
CSHARP,
                ],
                [
                    'heading' => 'Properties · Akses data dengan aturan yang jelas',
                    'body' => 'Property memakai accessor get dan set untuk membaca atau mengubah nilai. Akses dari luar tetap ringkas, sementara class dapat membatasi perubahan atau menambahkan validasi. Pada contoh ini, kode luar dapat membaca Saldo, tetapi perubahan saldo hanya dilakukan dari dalam class.',
                    'analogy' => 'Seperti loket bank: nasabah dapat melihat saldo dan mengajukan setoran melalui prosedur yang disediakan, bukan mengubah buku besar sesuka hati.',
                    'code' => <<<'CSHARP'
public class Dompet
{
    public decimal Saldo { get; private set; }

    public void Setor(decimal jumlah)
    {
        if (jumlah <= 0) throw new ArgumentOutOfRangeException(nameof(jumlah));
        Saldo += jumlah;
    }
}
CSHARP,
                ],
                [
                    'heading' => 'Delegates & events · Hubungkan aksi dan notifikasi',
                    'body' => 'Delegate menyimpan referensi ke method dengan parameter dan hasil yang cocok. Action dan Func adalah tipe delegate yang umum digunakan. Event memberi mekanisme berlangganan notifikasi: kode luar mendaftar atau berhenti berlangganan, sementara tipe pemilik event mengendalikan kapan notifikasi dipicu.',
                    'analogy' => 'Delegate seperti nomor kontak petugas. Event seperti bel pengumuman yang memberi tahu para pelanggan ketika pesanan selesai.',
                    'code' => <<<'CSHARP'
Action<string> kabari = pesan => Console.WriteLine(pesan);
kabari("Pesananmu siap diambil!");
CSHARP,
                ],
                [
                    'heading' => 'Nullable reference types · Jelaskan kemungkinan kosong',
                    'body' => 'Dalam nullable context, string? menandai bahwa referensi dapat bernilai null. Analisis compiler memberi peringatan ketika nilai yang mungkin null digunakan tanpa pemeriksaan yang memadai. Ini adalah bantuan analisis saat kompilasi, bukan mekanisme yang otomatis mencegah seluruh NullReferenceException pada runtime.',
                    'analogy' => 'Seperti label “mungkin kosong” pada kotak. Label mengingatkanmu untuk memeriksa isinya, tetapi tidak mengisi kotak secara otomatis.',
                    'code' => <<<'CSHARP'
string? nama = null;
string sapaan = nama ?? "Teman belajar";
Console.WriteLine($"Selamat datang, {sapaan}!");
CSHARP,
                ],
                [
                    'heading' => 'Async/await · Menunggu tanpa memblokir',
                    'body' => 'Async/await menyusun operasi asynchronous dengan alur kode yang mudah diikuti. Await pada operasi I/O yang belum selesai dapat mengembalikan kendali ke pemanggil sehingga thread tidak perlu diblokir selama menunggu. Async tidak otomatis membuat thread baru atau mempercepat pekerjaan CPU; parallelism adalah persoalan berbeda.',
                    'analogy' => 'Seperti kasir yang dapat melayani urusan lain saat mesin pembayaran memproses transaksi. Menunggu lebih efisien, tetapi mesin pembayarannya tidak tiba-tiba lebih cepat.',
                    'code' => <<<'CSHARP'
Console.WriteLine("Menyiapkan pengingat...");
await Task.Delay(1000);
Console.WriteLine("Waktunya belajar satu topik!");
CSHARP,
                ],
                [
                    'heading' => 'Extension methods · Tambahkan cara memakai tipe',
                    'body' => 'Extension method adalah method static yang dapat dipanggil menggunakan sintaks seolah-olah milik tipe yang diperluas. Implementasi tipe aslinya tidak berubah, dan method ini tidak mendapat akses khusus ke anggota private. C# 14 juga menyediakan extension blocks untuk bentuk extension members yang lebih luas.',
                    'analogy' => 'Seperti menambah pegangan pada gelas agar lebih nyaman dipakai. Gelas aslinya tetap sama; aksesori menambah cara menggunakannya.',
                    'code' => <<<'CSHARP'
Console.WriteLine("  habib  ".Rapikan()); // HABIB

public static class TeksExtensions
{
    public static string Rapikan(this string teks)
        => teks.Trim().ToUpperInvariant();
}
CSHARP,
                ],
                [
                    'heading' => 'Pattern matching · Buat keputusan dari bentuk data',
                    'body' => 'Pattern matching mencocokkan nilai, tipe, atau struktur data dengan pola tertentu. Switch expression dapat menghasilkan nilai dengan aturan yang ringkas. Susun pola dari kondisi yang relevan dan sediakan penanganan untuk nilai lain; pada contoh ini, simbol _ menjadi pola penampung sisanya.',
                    'analogy' => 'Seperti petugas sortir yang menempatkan paket berdasarkan ukuran dan berat, mengikuti aturan yang terbaca jelas.',
                    'code' => <<<'CSHARP'
int nilai = 85;
string hasil = nilai switch
{
    >= 90 => "Sangat baik",
    >= 70 => "Lulus",
    _ => "Coba lagi"
};
Console.WriteLine(hasil); // Lulus
CSHARP,
                ],
                [
                    'heading' => 'Records · Model data dengan perbandingan nilai',
                    'body' => 'Record adalah jenis deklarasi tipe yang membantu membuat model data dengan perbandingan berdasarkan nilai. Record berbeda dari pattern matching, walau keduanya sering digunakan bersama. With expression membuat salinan dengan perubahan tertentu. Records tidak otomatis membuat semua objek yang dirujuk di dalamnya menjadi immutable.',
                    'analogy' => 'Seperti menyalin formulir pesanan lalu mengganti jumlahnya. Formulir awal tetap ada, tetapi barang yang dirujuk keduanya belum tentu ikut disalin.',
                    'code' => <<<'CSHARP'
var awal = new Pesanan("Buku C#", 1);
var revisi = awal with { Jumlah = 2 };
Console.WriteLine(revisi);

public record Pesanan(string Produk, int Jumlah);
CSHARP,
                ],
                [
                    'heading' => 'Partial, attributes, reflection, dan unsafe',
                    'body' => 'Partial membagi deklarasi satu tipe ke beberapa bagian, berguna ketika kode buatan developer berdampingan dengan hasil generator. Attributes menambahkan metadata; reflection membaca informasi tipe pada runtime. Unsafe membuka operasi seperti pointer dalam konteks yang diizinkan. Pelajari fitur ini setelah fondasi kuat karena kebutuhan, biaya runtime, dan risiko kesalahannya berbeda.',
                    'analogy' => 'Partial seperti satu buku dengan beberapa penulis, attributes seperti label katalog, reflection seperti membaca katalog saat dibutuhkan, dan unsafe seperti akses langsung ke ruang mesin.',
                ],
            ],
            'sources' => [
                ['label' => 'Microsoft · LINQ', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/linq/'],
                ['label' => 'Microsoft · Properties', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/properties'],
                ['label' => 'Microsoft · Delegates', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/delegates/'],
                ['label' => 'Microsoft · Events', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/events/'],
                ['label' => 'Microsoft · Nullable reference types', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/null-safety/nullable-reference-types'],
                ['label' => 'Microsoft · Async/await', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/asynchronous-programming/'],
                ['label' => 'Microsoft · Extension members', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/extension-methods'],
                ['label' => 'Microsoft · Pattern matching', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/functional/pattern-matching'],
                ['label' => 'Microsoft · Records', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/records'],
                ['label' => 'Microsoft · Panduan pemrograman C#', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/'],
            ],
        ],
        'tentang' => [
            'title' => 'Tentang & pertanyaan umum',
            'eyebrow' => 'TEMAN SEPERJALANAN',
            'summary' => 'Zero to Hero with C# membantu kamu mengubah rasa ingin tahu menjadi langkah belajar yang jelas, satu topik dan satu latihan setiap kali.',
            'sections' => [
                [
                    'heading' => 'Untuk siapa roadmap ini?',
                    'body' => 'Untuk pemula total, pelajar, mahasiswa, dan developer dari bahasa lain yang ingin memahami C#. Materi dapat dibaca tanpa akun dan memakai Bahasa Indonesia, contoh yang dekat dengan keseharian, serta urutan dari fondasi sampai spesialisasi. Jika sudah memahami suatu topik, gunakan latihan untuk memeriksa pemahaman sebelum melanjutkan.',
                    'analogy' => 'Seperti jalur pendakian dengan penanda pos. Pendaki baru dapat mengikuti rute lengkap, sementara yang berpengalaman dapat menilai bekal sebelum menuju pos berikutnya.',
                ],
                [
                    'heading' => 'Harus sudah pernah coding?',
                    'body' => 'Tidak. Mulai dari tahap Fondasi: menyiapkan alat, mengenal variabel, membuat keputusan, mengulang instruksi, dan menulis method. Ketik ulang contoh, ubah satu nilai, lalu amati hasilnya. Kebiasaan mencoba dan membaca pesan error lebih berguna daripada menghafal seluruh sintaks sekaligus.',
                    'analogy' => 'Seperti belajar memasak: satu resep sederhana yang benar-benar dicoba lebih melekat daripada membaca seratus resep tanpa menyalakan kompor.',
                ],
                [
                    'heading' => 'Berapa lama sampai mahir?',
                    'body' => 'Durasi pada materi adalah perkiraan waktu untuk membaca dan mencoba dasar topik, bukan jaminan menguasainya. Sisihkan waktu untuk mengulang, memperbaiki error, dan membuat proyek sendiri. “Hero” berarti semakin mampu menyelesaikan masalah secara mandiri; menuntaskan bacaan adalah tonggak belajar, bukan sertifikasi keahlian profesional.',
                    'analogy' => 'Peta bisa memperkirakan jarak, tetapi kecepatan perjalanan bergantung pada latihan, kondisi, dan berapa kali kamu berhenti untuk memahami medan.',
                ],
                [
                    'heading' => 'Apakah progres belajar sudah tersimpan?',
                    'body' => 'Versi awal ini menyediakan roadmap, materi, pencarian, dan latihan tertulis. Pelacak progres serta quiz interaktif direncanakan untuk tahap pengembangan berikutnya. Untuk saat ini, catat topik terakhir di buku atau aplikasi catatanmu agar mudah melanjutkan belajar.',
                    'analogy' => 'Seperti memakai buku panduan perjalanan dan memberi penanda halaman sendiri pada pemberhentian terakhir.',
                ],
                [
                    'heading' => 'Di mana saya menjalankan latihan?',
                    'body' => 'Jalankan kode di editor atau IDE milikmu dengan .NET SDK. Baca instruksi latihan, coba menulis solusi sendiri, lalu buka pembahasan yang disediakan untuk membandingkan pendekatan. Website ini belum menjalankan atau menilai kode secara otomatis. Ubah contoh dan ulangi latihan untuk memeriksa pemahaman.',
                    'analogy' => 'Seperti buku resep yang kamu praktikkan di dapur sendiri, kemudian dibandingkan dengan petunjuk hasil yang diharapkan.',
                ],
                [
                    'heading' => 'Perlu menginstal semua tools?',
                    'body' => 'Mulai dengan .NET SDK dan satu editor atau IDE. Tambahkan framework serta paket saat materi memerlukannya. Pilih jalur web, desktop, atau game setelah fondasi dan OOP cukup dipahami. Daftar tools adalah referensi pilihan, sehingga kamu tidak perlu memakai semuanya untuk mulai belajar.',
                    'analogy' => 'Untuk membuat telur dadar, cukup siapkan bahan, wajan, dan spatula. Oven besar baru diperlukan saat resep yang kamu pilih memang membutuhkannya.',
                ],
                [
                    'heading' => 'Bagaimana cara memakai roadmap dengan baik?',
                    'body' => 'Baca satu materi, tulis contoh dengan tanganmu sendiri, lalu selesaikan tantangannya di lingkungan C# milikmu. Catat kemajuan ketika kamu sudah dapat menjelaskan idenya dan mencoba latihan. Di akhir tahap, gabungkan beberapa konsep menjadi proyek kecil sebelum berpindah ke tahap berikutnya.',
                    'analogy' => 'Seperti membangun rumah: pelajari fungsi batu bata, coba menyusunnya, lalu bangun satu dinding yang utuh sebelum menambah lantai.',
                ],
            ],
            'sources' => [
                ['label' => 'Microsoft Learn · Belajar C#', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/'],
                ['label' => 'Microsoft · Unduh .NET', 'url' => 'https://dotnet.microsoft.com/en-us/download'],
            ],
        ],
    ],
    'tools' => [
        [
            'name' => '.NET SDK', 'category' => 'SDK & Runtime', 'level' => 'Pemula', 'mark' => '.N',
            'description' => 'Perlengkapan utama untuk membuat, membangun, menguji, dan menjalankan proyek C#. Gunakan .NET 10 LTS sebagai acuan belajar.',
            'analogy' => 'Kotak perkakas dasar sebelum kamu mulai merakit aplikasi.',
            'url' => 'https://dotnet.microsoft.com/en-us/download',
        ],
        [
            'name' => 'Visual Studio Code', 'category' => 'IDE & Editor', 'level' => 'Pemula', 'mark' => 'VS',
            'description' => 'Editor untuk Windows, Linux, dan macOS. Tambahkan ekstensi C# Dev Kit untuk pengelolaan proyek dan pengalaman pengembangan C#.',
            'analogy' => 'Meja kerja ringkas yang dapat ditambah alat sesuai kebutuhan.',
            'url' => 'https://code.visualstudio.com/docs/csharp/get-started',
        ],
        [
            'name' => 'Visual Studio', 'category' => 'IDE & Editor', 'level' => 'Pemula', 'mark' => 'VI',
            'description' => 'IDE Windows dengan debugger, pengelolaan solution, dan tools .NET yang terintegrasi. Pilih workload sesuai jenis proyekmu.',
            'analogy' => 'Bengkel lengkap dengan alat ukur dan pemeriksaan dalam satu tempat.',
            'url' => 'https://visualstudio.microsoft.com/vs/',
        ],
        [
            'name' => 'JetBrains Rider', 'category' => 'IDE & Editor', 'level' => 'Lanjutan', 'mark' => 'RD',
            'description' => 'IDE .NET lintas platform dengan analisis kode, refactoring, dan dukungan pengembangan game. Periksa ketentuan lisensi sesuai penggunaanmu.',
            'analogy' => 'Asisten bengkel yang ikut membantu menata dan memeriksa hasil rakitan.',
            'url' => 'https://www.jetbrains.com/rider/',
        ],
        [
            'name' => 'NuGet', 'category' => 'Paket', 'level' => 'Pemula', 'mark' => 'Nu',
            'description' => 'Sistem paket .NET untuk memasang pustaka dan mengelola dependensi proyek. Periksa penerbit, dokumentasi, dan kompatibilitas paket sebelum memakainya.',
            'analogy' => 'Rak komponen siap pakai, lengkap dengan daftar bagian yang dibutuhkan.',
            'url' => 'https://learn.microsoft.com/en-us/nuget/what-is-nuget',
        ],
        [
            'name' => 'ASP.NET Core', 'category' => 'Web', 'level' => 'Lanjutan', 'mark' => 'AS',
            'description' => 'Framework untuk web dan API dengan pilihan Minimal API, controllers, MVC, dan Razor Pages. Cocok setelah dasar C# dan HTTP dipahami.',
            'analogy' => 'Kerangka restoran yang menyediakan loket permintaan dan alur pelayanan.',
            'url' => 'https://learn.microsoft.com/en-us/aspnet/core/',
        ],
        [
            'name' => 'Blazor', 'category' => 'Web', 'level' => 'Lanjutan', 'mark' => 'Bl',
            'description' => 'Framework UI berbasis komponen dalam ASP.NET Core yang menggunakan C# dan Razor. Pilihan render mode menentukan tempat interaktivitas berjalan.',
            'analogy' => 'Blok antarmuka yang dapat dirakit dan dipakai kembali di banyak halaman.',
            'url' => 'https://learn.microsoft.com/en-us/aspnet/core/blazor/',
        ],
        [
            'name' => 'WPF', 'category' => 'Desktop & Mobile', 'level' => 'Lanjutan', 'mark' => 'WP',
            'description' => 'Windows Presentation Foundation untuk aplikasi desktop Windows dengan XAML, data binding, dan kontrol UI. WPF hanya berjalan di Windows.',
            'analogy' => 'Perabot khusus rumah Windows, dengan tampilan yang dapat disusun detail.',
            'url' => 'https://learn.microsoft.com/en-us/dotnet/desktop/wpf/overview/',
        ],
        [
            'name' => 'Windows Forms', 'category' => 'Desktop & Mobile', 'level' => 'Lanjutan', 'mark' => 'WF',
            'description' => 'Framework UI desktop khusus Windows dengan pendekatan form, kontrol, dan event. Berguna untuk aplikasi internal dengan alur formulir.',
            'analogy' => 'Papan formulir digital yang diberi tombol dan aturan respons.',
            'url' => 'https://learn.microsoft.com/en-us/dotnet/desktop/winforms/overview/',
        ],
        [
            'name' => '.NET MAUI', 'category' => 'Desktop & Mobile', 'level' => 'Lanjutan', 'mark' => 'MA',
            'description' => 'Framework UI untuk Android, iOS, macOS, dan Windows dengan C# dan XAML. Kebutuhan build serta integrasi native tetap bergantung pada platform tujuan.',
            'analogy' => 'Satu denah dasar yang disesuaikan dengan aturan setiap lokasi pembangunan.',
            'url' => 'https://learn.microsoft.com/en-us/dotnet/maui/what-is-maui',
        ],
        [
            'name' => 'Unity', 'category' => 'Game', 'level' => 'Lanjutan', 'mark' => 'Un',
            'description' => 'Engine untuk game dan pengalaman interaktif. C# digunakan untuk menulis perilaku gameplay dan komponen; engine tidak seluruhnya ditulis dalam C#.',
            'analogy' => 'Panggung game dengan C# sebagai naskah yang mengatur perilaku pemain dan objek.',
            'url' => 'https://docs.unity3d.com/Manual/intro-to-scripting.html',
        ],
        [
            'name' => 'Godot .NET', 'category' => 'Game', 'level' => 'Lanjutan', 'mark' => 'Go',
            'description' => 'Edisi Godot dengan dukungan scripting C#. Pasang edisi .NET dan cek dukungan ekspor C# untuk platform game yang kamu targetkan.',
            'analogy' => 'Studio panggung terbuka yang menyediakan jalur scripting C#.',
            'url' => 'https://docs.godotengine.org/en/stable/tutorials/scripting/c_sharp/c_sharp_basics.html',
        ],
        [
            'name' => 'Entity Framework Core', 'category' => 'Database', 'level' => 'Lanjutan', 'mark' => 'EF',
            'description' => 'ORM .NET untuk memetakan object dan database, menulis query, serta mengelola migrasi. Pilih provider yang sesuai dengan database proyek.',
            'analogy' => 'Penerjemah antara model C# dan rak penyimpanan di database.',
            'url' => 'https://learn.microsoft.com/en-us/ef/core/',
        ],
        [
            'name' => 'Dapper', 'category' => 'Database', 'level' => 'Lanjutan', 'mark' => 'Da',
            'description' => 'Pustaka pemetaan hasil query SQL ke object .NET. Kamu tetap menulis SQL dan mengendalikan akses datanya; gunakan parameter untuk nilai input.',
            'analogy' => 'Petugas yang memindahkan hasil dari formulir database ke formulir aplikasi.',
            'url' => 'https://github.com/DapperLib/Dapper',
        ],
        [
            'name' => 'xUnit.net', 'category' => 'Testing', 'level' => 'Lanjutan', 'mark' => 'xU',
            'description' => 'Framework pengujian .NET untuk memeriksa perilaku kode secara otomatis. Cocok untuk latihan menguji logika method dan aturan aplikasi.',
            'analogy' => 'Petugas pemeriksa yang mengulang pengukuran yang sama setiap kali produk berubah.',
            'url' => 'https://xunit.net/',
        ],
        [
            'name' => 'NUnit', 'category' => 'Testing', 'level' => 'Lanjutan', 'mark' => 'NU',
            'description' => 'Framework pengujian .NET dengan assertions dan test cases berbasis atribut. Pilih satu framework testing dahulu agar fokus pada prinsip pengujiannya.',
            'analogy' => 'Daftar prosedur pengujian yang dapat dijalankan berulang secara konsisten.',
            'url' => 'https://nunit.org/',
        ],
        [
            'name' => 'MSTest', 'category' => 'Testing', 'level' => 'Lanjutan', 'mark' => 'MT',
            'description' => 'Framework pengujian Microsoft untuk proyek .NET dengan integrasi tools pengujian. Gunakan untuk menguji hasil yang diharapkan dan penanganan kasus tepi.',
            'analogy' => 'Meja quality control yang memastikan komponen bekerja sebelum dirakit bersama.',
            'url' => 'https://learn.microsoft.com/en-us/dotnet/core/testing/unit-testing-mstest-intro',
        ],
        [
            'name' => 'Microsoft Azure', 'category' => 'Cloud', 'level' => 'Lanjutan', 'mark' => 'Az',
            'description' => 'Platform cloud dengan layanan hosting aplikasi, database, dan monitoring. Pelajari layanan serta model biaya yang diperlukan saat mulai deployment.',
            'analogy' => 'Menyewa ruang usaha dan fasilitasnya sesuai kebutuhan operasional.',
            'url' => 'https://learn.microsoft.com/en-us/azure/?product=popular',
        ],
        [
            'name' => 'GitHub Actions', 'category' => 'CI/CD', 'level' => 'Lanjutan', 'mark' => 'GH',
            'description' => 'Otomasi workflow di GitHub untuk build, test, dan deployment. Simpan konfigurasi workflow bersama kode dan kelola kredensial melalui secrets.',
            'analogy' => 'Ban berjalan yang memeriksa dan mengemas kode setiap perubahan masuk.',
            'url' => 'https://docs.github.com/en/actions',
        ],
        [
            'name' => 'Azure DevOps', 'category' => 'CI/CD', 'level' => 'Lanjutan', 'mark' => 'AD',
            'description' => 'Layanan pengelolaan pekerjaan, repositori, dan pipeline tim. Azure Pipelines membantu menjalankan build, test, dan deployment terotomasi.',
            'analogy' => 'Ruang kendali proyek yang menghubungkan daftar pekerjaan dengan proses pengiriman.',
            'url' => 'https://learn.microsoft.com/en-us/azure/devops/user-guide/what-is-azure-devops',
        ],
    ],
];
