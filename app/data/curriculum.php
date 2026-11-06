<?php
declare(strict_types=1);

return [
    'stages' => [
        ['id' => 'fondasi', 'number' => 1, 'label' => 'Fondasi C#', 'level' => 'Beginner', 'description' => 'Mulai dari menyiapkan alat sampai menulis program pertamamu.', 'icon' => 'terminal', 'project' => 'Buat kalkulator belanja: masukkan harga dan jumlah barang, hitung total, lalu tampilkan struk sederhana.'],
        ['id' => 'oop', 'number' => 2, 'label' => 'Berpikir dengan Objek', 'level' => 'Intermediate', 'description' => 'Susun data dan perilaku menjadi komponen yang mudah dipahami.', 'icon' => 'layers', 'project' => 'Bangun perpustakaan console: buku, anggota, peminjaman, dan validasi ketika buku tidak tersedia.'],
        ['id' => 'lanjutan', 'number' => 3, 'label' => 'Konsep Lanjutan', 'level' => 'Advanced', 'description' => 'Olah koleksi, tangani pekerjaan async, dan simpan data ke file.', 'icon' => 'bolt', 'project' => 'Buat pencatat pengeluaran: simpan ke JSON, kelompokkan transaksi dengan LINQ, dan tampilkan laporan bulanan.'],
        ['id' => 'spesialisasi', 'number' => 4, 'label' => 'Pilih Spesialisasimu', 'level' => 'Master', 'description' => 'Terapkan fondasi C# ke proyek nyata yang bisa diuji dan dirilis.', 'icon' => 'rocket', 'project' => 'Pilih satu proyek: API katalog buku, aplikasi inventaris desktop, atau game koleksi koin. Sertakan pengujian, penyimpanan yang sesuai, dan petunjuk menjalankan.'],
    ],
    'lessons' => [
        [
            'id' => 'instalasi-dotnet', 'stage' => 'fondasi', 'title' => 'Siapkan .NET & Editor',
            'summary' => 'Kenali SDK, runtime, dan editor. Jalankan aplikasi console pertamamu.', 'minutes' => 25,
            'objectives' => ['Membedakan C#, .NET SDK, dan runtime.', 'Membuat proyek console dan menjalankannya dari terminal.'],
            'sections' => [
                ['heading' => 'Tiga alat dengan tugas berbeda', 'body' => 'C# adalah bahasa untuk menulis instruksi. .NET SDK menyediakan compiler dan perintah untuk membuat, membangun, serta menjalankan proyek. Runtime menjalankan aplikasi yang sudah dibangun. Untuk belajar dan menulis kode, pasang SDK; memasang runtime saja belum menyediakan semua alat pengembangan.'],
                ['heading' => 'Siapkan ruang kerja', 'body' => 'Pasang .NET 10 SDK dari halaman instalasi resmi sesuai Windows, macOS, atau Linux. Gunakan editor yang nyaman, misalnya VS Code dengan C# Dev Kit. Setelah instalasi, buka terminal baru dan jalankan dotnet --version. Jika perintah belum dikenali, periksa instalasi dan PATH sebelum melanjutkan.'],
                ['heading' => 'Dari file menjadi program', 'body' => 'Jalankan perintah contoh satu per satu di folder latihan yang baru. dotnet new console membuat proyek dan Program.cs; cd berpindah ke foldernya; dotnet run membangun lalu menjalankan program. Buka Program.cs dan ubah teks di Console.WriteLine. Tanda kutip membatasi teks, sedangkan titik koma mengakhiri instruksi.'],
            ],
            'analogy' => 'SDK seperti bengkel beserta alat perakitannya, runtime seperti mesin yang membuat kendaraan bekerja, dan editor seperti meja tempat menggambar rancangan. Editor tidak menggantikan SDK; menulis rancangan saja belum merakit program.',
            'code' => <<<'CODE'
dotnet --version
dotnet new console -n HaloCSharp -f net10.0
cd HaloCSharp
dotnet run
CODE,
            'output' => 'Perintah pertama menampilkan versi SDK yang terpasang. Setelah pesan pembuatan proyek, dotnet run menampilkan: Hello, World!',
            'exercise' => 'Ubah Program.cs agar mencetak nama panggilanmu pada baris pertama dan alasan belajar C# pada baris kedua. Jalankan ulang dari terminal, kemudian jelaskan fungsi dotnet run dengan bahasamu sendiri.',
            'solution' => 'Gunakan dua pemanggilan Console.WriteLine, misalnya Console.WriteLine("Halo, saya Habib!"); dan Console.WriteLine("Saya ingin membuat aplikasi.");. Simpan file sebelum menjalankan dotnet run. Setiap WriteLine menambahkan pergantian baris.',
            'takeaways' => ['Pasang SDK untuk mengembangkan aplikasi.', 'Program.cs adalah titik awal proyek console sederhana.', 'Simpan perubahan, jalankan ulang, lalu baca hasil dan pesan error.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/core/install/',
        ],
        [
            'id' => 'variabel-tipe-data', 'stage' => 'fondasi', 'title' => 'Variabel, Tipe Data & Operator',
            'summary' => 'Simpan nilai dan hitung total belanja dengan tipe data yang tepat.', 'minutes' => 35,
            'objectives' => ['Menggunakan string, int, decimal, dan bool.', 'Membedakan penugasan, perhitungan, dan perbandingan.'],
            'sections' => [
                ['heading' => 'Nilai yang mempunyai nama', 'body' => 'Variabel menyimpan nilai agar bisa dipakai lagi. Deklarasi int jumlah = 3 berarti jumlah mempunyai tipe bilangan bulat dan nilai awal tiga. Gunakan string untuk teks, bool untuk true atau false, dan decimal untuk perhitungan desimal seperti harga. Akhiran m pada literal harga memilih tipe decimal.'],
                ['heading' => 'Tipe membantu sebelum program berjalan', 'body' => 'Compiler memeriksa kecocokan tipe. Variabel int tidak dapat langsung diisi teks "tiga". Kata var meminta compiler menyimpulkan tipe dari nilai awal; tipenya tetap tidak bebas berubah. Tanda = memberikan nilai, sedangkan == membandingkan dua nilai. Nama variabel C# membedakan huruf besar dan kecil.'],
                ['heading' => 'Baca urutan perhitungan', 'body' => 'Operator * mengalikan, + menjumlahkan, dan >= memeriksa batas minimal. Perkalian dikerjakan sebelum penjumlahan; gunakan tanda kurung ketika urutan perlu diperjelas. Pada contoh, total berasal dari harga dikali jumlah. Bentuk $ di depan string memungkinkan nilai di dalam kurung kurawal dimasukkan ke teks keluaran. Ganti seluruh isi Program.cs dengan contoh ini.'],
            ],
            'analogy' => 'Variabel seperti kotak berlabel: kotak jumlah menerima bilangan bulat, kotak nama menerima teks. Label membantu mencegah salah isi, tetapi tidak memastikan isi masuk akal; jumlah negatif tetap bertipe int dan membutuhkan validasi sendiri.',
            'code' => <<<'CODE'
string barang = "Buku";
int jumlah = 3;
decimal harga = 12000m;
decimal total = harga * jumlah;
bool dapatDiskon = total >= 30000m;

Console.WriteLine($"{barang}: {jumlah} buah");
Console.WriteLine($"Total: {total:0}");
Console.WriteLine($"Dapat diskon: {dapatDiskon}");
CODE,
            'output' => "Buku: 3 buah\nTotal: 36000\nDapat diskon: True",
            'exercise' => 'Tambahkan ongkir sebesar 5000 dan diskon sebesar 10% dari total barang bila total minimal 30000. Hitung hasilnya di kertas dahulu, lalu buat variabel totalBayar tanpa mengubah harga satuan.',
            'solution' => 'Untuk data contoh, diskon adalah 3600 dan total bayar adalah 36000 - 3600 + 5000 = 37400. Gunakan decimal diskon = dapatDiskon ? total * 0.10m : 0m; lalu decimal totalBayar = total - diskon + 5000m;. Operator ?: memilih satu nilai berdasarkan kondisi.',
            'takeaways' => ['Pilih tipe sesuai arti datanya.', 'var tetap menghasilkan tipe yang ditetapkan saat kompilasi.', 'Tipe yang benar belum menggantikan aturan bisnis.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/tour-of-csharp/overview',
        ],
        [
            'id' => 'percabangan-perulangan', 'stage' => 'fondasi', 'title' => 'Percabangan & Perulangan',
            'summary' => 'Ajarkan program mengambil keputusan dan mengulangi pekerjaan.', 'minutes' => 40,
            'objectives' => ['Memilih alur dengan if/else dan switch.', 'Mengulang dengan for, while, dan foreach secara terkontrol.'],
            'sections' => [
                ['heading' => 'Pilih jalur berdasarkan kondisi', 'body' => 'if menjalankan blok ketika kondisinya true. else menyediakan jalur ketika kondisi tersebut false. Untuk kategori diskret, seperti pilihan menu 1, 2, atau 3, switch bisa membuat daftar kasus lebih mudah dibaca. Sediakan kasus default untuk input yang tidak dikenal; jangan menganggap pengguna selalu memberi pilihan yang benar.'],
                ['heading' => 'Ulangi dengan batas yang jelas', 'body' => 'for cocok ketika jumlah pengulangan diketahui. Bagian awal membuat penghitung, bagian tengah menentukan kapan loop berlanjut, dan bagian akhir memperbarui penghitung. while mengulang selama kondisi benar, sehingga kondisi harus punya kesempatan berubah. foreach cocok untuk membaca tiap anggota koleksi; kita akan mempelajari koleksi berikutnya.'],
                ['heading' => 'Telusuri sebelum menekan Run', 'body' => 'Contoh memeriksa angka satu sampai lima. Operator % menghasilkan sisa pembagian; angka yang dibagi dua bersisa nol adalah genap. Tulis nilai angka dan hasil kondisi pada tiap putaran untuk memahami alur. Perhatikan perbedaan < 5 dan <= 5: yang pertama berhenti sebelum angka lima diproses.'],
            ],
            'analogy' => 'if seperti aturan membawa payung ketika hujan. Loop seperti memeriksa satu per satu kursi sebelum acara dimulai. Analogi berhenti di sini: komputer tidak tahu sendiri kapan tugas selesai, sehingga batas pengulangan harus ditulis dengan benar.',
            'code' => <<<'CODE'
for (int angka = 1; angka <= 5; angka++)
{
    if (angka % 2 == 0)
    {
        Console.WriteLine($"{angka}: genap");
    }
    else
    {
        Console.WriteLine($"{angka}: ganjil");
    }
}
CODE,
            'output' => "1: ganjil\n2: genap\n3: ganjil\n4: genap\n5: ganjil",
            'exercise' => 'Hitung jumlah semua bilangan genap dari 1 sampai 10. Tampilkan hasil akhir sekali saja, lalu ubah batasnya menjadi 11 dan jelaskan mengapa hasilnya tetap sama.',
            'solution' => 'Buat int total = 0 sebelum loop. Ulangi angka dari 1 sampai batas dan tambahkan ke total hanya jika angka % 2 == 0. Cetak total sesudah loop. Hasilnya 2 + 4 + 6 + 8 + 10 = 30; menambahkan batas 11 tidak menambahkan bilangan genap.',
            'takeaways' => ['Kondisi harus menghasilkan bool.', 'Periksa batas awal, batas akhir, dan perubahan penghitung.', 'Letak WriteLine di dalam atau di luar loop mengubah jumlah keluaran.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/statements/selection-statements',
        ],
        [
            'id' => 'array-koleksi', 'stage' => 'fondasi', 'title' => 'Array, List & Dictionary',
            'summary' => 'Kelola banyak nilai dengan struktur yang sesuai cara mengaksesnya.', 'minutes' => 40,
            'objectives' => ['Memilih array, List, atau Dictionary.', 'Membaca koleksi tanpa melewati indeks atau mengasumsikan key tersedia.'],
            'sections' => [
                ['heading' => 'Array untuk ukuran yang tetap', 'body' => 'Array menyimpan sejumlah elemen dengan tipe yang sama. Setelah dibuat, panjang satu objek array tidak berubah. Indeks dimulai dari nol; array berisi tiga elemen memiliki indeks 0, 1, dan 2. Gunakan Length untuk panjang array. Mengakses indeks sama dengan Length akan berada di luar batas.'],
                ['heading' => 'List untuk anggota yang bertambah', 'body' => 'List<T> mendukung penambahan dan penghapusan anggota. T menandai tipe elemen: List<string> berarti daftar teks. Gunakan Add untuk menambah dan Count untuk mengetahui jumlahnya. Array dan List menyimpan urutan, tetapi urutan saja tidak selalu cocok untuk mencari data berdasarkan nama atau kode.'],
                ['heading' => 'Dictionary untuk pasangan key dan value', 'body' => 'Dictionary<TKey, TValue> memetakan key yang unik ke sebuah value. Pada contoh, nama barang adalah key dan stok adalah value. TryGetValue memeriksa keberadaan key sekaligus mengambil nilainya tanpa melempar error untuk key yang tidak ada. Contoh memakai List untuk daftar belanja dan Dictionary untuk stok; keduanya melayani kebutuhan berbeda.'],
            ],
            'analogy' => 'Array seperti rak dengan jumlah slot tetap, List seperti daftar belanja yang bisa bertambah, dan Dictionary seperti buku kontak berdasarkan nama. Key harus unik dalam satu Dictionary; dua orang bernama sama memerlukan kode lain agar tidak tertukar.',
            'code' => <<<'CODE'
using System.Collections.Generic;

var belanja = new List<string> { "Beras", "Telur" };
belanja.Add("Susu");
Console.WriteLine($"Jumlah barang: {belanja.Count}");

var stok = new Dictionary<string, int>
{
    ["Beras"] = 8,
    ["Telur"] = 12
};

foreach (string barang in belanja)
{
    if (stok.TryGetValue(barang, out int jumlah))
        Console.WriteLine($"{barang}: {jumlah}");
    else
        Console.WriteLine($"{barang}: belum tercatat");
}
CODE,
            'output' => "Jumlah barang: 3\nBeras: 8\nTelur: 12\nSusu: belum tercatat",
            'exercise' => 'Tambahkan stok Susu sebanyak 4, lalu ubah stok Beras menjadi 6. Tampilkan jumlah jenis barang yang tercatat dan total stok seluruh barang. Bedakan dua angka tersebut.',
            'solution' => 'Gunakan stok["Susu"] = 4 dan stok["Beras"] = 6. stok.Count bernilai 3 karena menghitung key. Untuk total stok, mulai dari nol lalu foreach atas stok.Values dan jumlahkan nilainya; hasilnya 6 + 12 + 4 = 22.',
            'takeaways' => ['Indeks pertama adalah 0.', 'Length digunakan untuk array; Count untuk List dan Dictionary.', 'Jumlah anggota berbeda dari penjumlahan nilai anggota.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/builtin-types/collections',
        ],
        [
            'id' => 'method-parameter', 'stage' => 'fondasi', 'title' => 'Method & Parameter',
            'summary' => 'Pecah program menjadi pekerjaan kecil yang bisa dipakai kembali.', 'minutes' => 35,
            'objectives' => ['Membedakan parameter, argumen, dan nilai kembali.', 'Membuat method perhitungan yang tidak bergantung pada tampilan.'],
            'sections' => [
                ['heading' => 'Nama untuk satu pekerjaan', 'body' => 'Method mengelompokkan instruksi di bawah sebuah nama. Method HitungTotal sebaiknya menghitung total, sehingga pembacanya dapat menebak tujuannya. Parameter adalah nama input dalam deklarasi; argumen adalah nilai yang diberikan ketika memanggilnya. Tipe sebelum nama method menentukan jenis nilai yang dikembalikan.'],
                ['heading' => 'Kembalikan nilai, lalu gunakan', 'body' => 'return mengirim hasil ke pemanggil dan mengakhiri pemanggilan tersebut. Method bertipe void melakukan pekerjaan tanpa memberikan nilai kembali. Memisahkan hitungan dari Console.WriteLine membuat perhitungan yang sama bisa dipakai di console, web, atau pengujian. Hindari membaca variabel luar secara tersembunyi ketika input bisa dinyatakan sebagai parameter.'],
                ['heading' => 'Perhatikan lingkup dan bentuk kode', 'body' => 'Variabel yang dibuat di dalam method tidak otomatis tersedia di luar method. Pada contoh, class Kalkulator berisi static method sehingga bisa dipanggil tanpa membuat objek. Baris yang menjalankan aplikasi ditempatkan sebelum deklarasi class, sesuai aturan top-level statements. Ganti seluruh Program.cs dengan contoh, lalu coba argumen lain.'],
            ],
            'analogy' => 'Method seperti resep kecil: parameter adalah daftar bahan yang diperlukan, argumen adalah bahan yang benar-benar diserahkan, dan return adalah masakan jadi. Resep yang mencetak struk sekaligus memasak lebih sulit dipakai ulang; pisahkan pekerjaan yang tujuannya berbeda.',
            'code' => <<<'CODE'
decimal total = Kalkulator.HitungTotal(12000m, 3);
Console.WriteLine($"Total: {total:0}");
Console.WriteLine($"Pesanan lain: {Kalkulator.HitungTotal(5000m, 2):0}");

static class Kalkulator
{
    public static decimal HitungTotal(decimal harga, int jumlah)
    {
        return harga * jumlah;
    }
}
CODE,
            'output' => "Total: 36000\nPesanan lain: 10000",
            'exercise' => 'Buat method HitungKembalian yang menerima total belanja dan uang dibayar, lalu mengembalikan selisihnya. Uji pembayaran 50000 untuk total 36000, dan jelaskan arti hasil negatif bila uang kurang.',
            'solution' => 'Deklarasikan public static decimal HitungKembalian(decimal total, decimal dibayar) dengan return dibayar - total;. Data contoh menghasilkan 14000. Hasil negatif berarti kekurangan uang, sehingga pemanggil perlu memilih pesan yang sesuai menggunakan if, bukan menuliskannya sebagai kembalian biasa.',
            'takeaways' => ['Parameter menyatakan kebutuhan sebuah method.', 'return memberi hasil; WriteLine hanya menampilkan.', 'Method kecil dengan satu tujuan lebih mudah diperiksa.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/methods',
        ],
        [
            'id' => 'class-object', 'stage' => 'oop', 'title' => 'Class, Object & Constructor',
            'summary' => 'Modelkan sebuah buku menggunakan data dan perilaku yang saling terkait.', 'minutes' => 45,
            'objectives' => ['Membuat objek dari class.', 'Mengisi keadaan awal melalui constructor dan membaca property.'],
            'sections' => [
                ['heading' => 'Dari nilai terpisah menjadi model', 'body' => 'Class mendefinisikan bentuk data dan perilaku suatu jenis objek. Untuk perpustakaan, Buku bisa memiliki Judul dan status Dipinjam. Objek adalah instance nyata dari class itu; dua objek Buku dapat menyimpan judul yang berbeda. Property menyediakan cara membaca atau mengubah data lewat anggota class.'],
                ['heading' => 'Bangun keadaan awal yang jelas', 'body' => 'Constructor dipanggil ketika new membuat instance. Namanya sama dengan class dan tidak mempunyai tipe return. Gunakan constructor untuk menerima data yang wajib tersedia. Property dengan get saja dapat diisi saat konstruksi dan dibaca dari luar, sedangkan private set membatasi perubahan ke dalam class.'],
                ['heading' => 'Pahami referensi', 'body' => 'Class merupakan reference type. Menyalin variabel yang menunjuk objek tidak otomatis menggandakan seluruh objek; dua variabel dapat merujuk instance yang sama. Pada contoh, Pinjam mengubah status buku tersebut. Ketika memerlukan buku lain, buat instance baru dengan new, bukan sekadar menugaskan variabel lama ke nama baru.'],
            ],
            'analogy' => 'Class seperti rancangan rumah dan objek seperti rumah yang dibangun dari rancangan itu. Constructor menyiapkan rumah saat pertama dibuat. Variabel referensi lebih mirip alamat rumah; menyalin alamat tidak membangun rumah kedua.',
            'code' => <<<'CODE'
var buku = new Buku("Petualangan C#");
Console.WriteLine($"{buku.Judul}: {buku.Dipinjam}");
buku.Pinjam();
Console.WriteLine($"{buku.Judul}: {buku.Dipinjam}");

class Buku
{
    public string Judul { get; }
    public bool Dipinjam { get; private set; }

    public Buku(string judul)
    {
        Judul = judul;
    }

    public void Pinjam()
    {
        Dipinjam = true;
    }
}
CODE,
            'output' => "Petualangan C#: False\nPetualangan C#: True",
            'exercise' => 'Tambahkan method Kembalikan dan buat dua objek buku berbeda. Pinjam hanya buku pertama. Tampilkan status keduanya untuk membuktikan bahwa keadaan dua instance terpisah.',
            'solution' => 'Kembalikan cukup mengubah Dipinjam menjadi false. Buat var kedua = new Buku("Belajar .NET"); lalu panggil Pinjam hanya pada buku pertama. Status pertama menjadi true dan kedua tetap false. Sebaliknya, var kedua = buku akan membuat keduanya merujuk objek yang sama.',
            'takeaways' => ['Class mendefinisikan tipe; new membuat instance.', 'Constructor menyiapkan keadaan awal.', 'Penyalinan referensi bukan penyalinan objek.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/classes',
        ],
        [
            'id' => 'prinsip-oop', 'stage' => 'oop', 'title' => 'Empat Prinsip OOP',
            'summary' => 'Kenali encapsulation, inheritance, polymorphism, dan abstraction lewat kendaraan.', 'minutes' => 50,
            'objectives' => ['Menghubungkan empat prinsip OOP dengan kode.', 'Memakai virtual dan override untuk variasi perilaku.'],
            'sections' => [
                ['heading' => 'Lindungi aturan dengan encapsulation', 'body' => 'Encapsulation menyatukan data dan operasi yang mengaturnya. Saldo rekening, misalnya, lebih aman diubah melalui Setor dan Tarik yang memeriksa aturan daripada property publik yang bebas diisi. Tujuannya menjaga keadaan objek tetap valid, bukan sekadar menjadikan semua anggota private. Abstraction menampilkan operasi yang diperlukan sambil menyembunyikan detail pelaksanaannya.'],
                ['heading' => 'Wariskan hubungan yang benar', 'body' => 'Inheritance membuat class turunan memakai atau memperluas class dasar. Gunakan saat hubungan “adalah sejenis” masuk akal: Sepeda adalah Kendaraan. Hubungan “memiliki” biasanya lebih cocok memakai komposisi, seperti Mobil memiliki Mesin. Class C# hanya dapat mewarisi satu class dasar secara langsung.'],
                ['heading' => 'Satu panggilan, perilaku berbeda', 'body' => 'Polymorphism memungkinkan kode bekerja melalui tipe dasar sambil menjalankan implementasi turunan. Method virtual menyediakan perilaku yang boleh diganti; override menggantinya dengan aturan yang cocok. Dalam contoh, variabel bertipe Kendaraan menunjuk objek Sepeda, sehingga Gerak memilih implementasi Sepeda saat program berjalan.'],
            ],
            'analogy' => 'Pengemudi cukup mengenal kontrol kendaraan tanpa merakit mesinnya: itu abstraction. Kap membatasi akses: itu gambaran encapsulation. Sepeda dan bus termasuk kendaraan, tetapi cara bergeraknya berbeda. Analogi tidak berarti semua hubungan dunia nyata perlu dijadikan inheritance dalam kode.',
            'code' => <<<'CODE'
Kendaraan kendaraan = new Sepeda("Sepeda kota");
Console.WriteLine(kendaraan.Nama);
Console.WriteLine(kendaraan.Gerak());

class Kendaraan
{
    public string Nama { get; }
    public Kendaraan(string nama) { Nama = nama; }
    public virtual string Gerak() => "Kendaraan bergerak";
}

class Sepeda : Kendaraan
{
    public Sepeda(string nama) : base(nama) { }
    public override string Gerak() => "Bergerak dengan kayuhan";
}
CODE,
            'output' => "Sepeda kota\nBergerak dengan kayuhan",
            'exercise' => 'Tambahkan class Bus yang mewarisi Kendaraan dan mengganti Gerak menjadi “Bergerak dengan mesin”. Buat array Kendaraan berisi Sepeda dan Bus, lalu panggil Gerak untuk setiap anggotanya.',
            'solution' => 'Constructor Bus meneruskan nama dengan base(nama), lalu gunakan public override string Gerak() => "Bergerak dengan mesin";. Array Kendaraan dapat memuat kedua class turunan. foreach memanggil Gerak tanpa memeriksa jenis kendaraan dengan if karena pemilihan perilaku ditangani polymorphism.',
            'takeaways' => ['Encapsulation menjaga aturan objek.', 'Inheritance sebaiknya menggambarkan hubungan tipe yang masuk akal.', 'Polymorphism mengurangi percabangan berdasarkan jenis objek.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/object-oriented/',
        ],
        [
            'id' => 'interface-abstract', 'stage' => 'oop', 'title' => 'Interface vs Abstract Class',
            'summary' => 'Pisahkan kontrak kemampuan dari fondasi perilaku bersama.', 'minutes' => 45,
            'objectives' => ['Mendesain interface kecil untuk sebuah kemampuan.', 'Menentukan kapan abstract class lebih sesuai.'],
            'sections' => [
                ['heading' => 'Interface menyatakan kemampuan', 'body' => 'Interface adalah kontrak anggota yang harus disediakan implementasi. IPemberitahuan dalam contoh menyatakan kemampuan Kirim tanpa menentukan apakah pesan dikirim ke console atau layanan lain. Kode yang menerima interface dapat memakai implementasi berbeda tanpa bergantung pada class tertentu. Satu class dapat mengimplementasikan beberapa interface.'],
                ['heading' => 'Abstract class menyediakan fondasi', 'body' => 'Abstract class tidak dapat dibuat langsung dengan new. Ia dapat mempunyai constructor, state, method biasa, dan method abstract yang harus diisi class turunan. Gunakan ketika beberapa tipe benar-benar berbagi fondasi dan hubungan pewarisan. Interface lebih berfokus pada kontrak; fitur modern interface memang lebih luas daripada deklarasi method saja, tetapi kita mulai dari bentuk yang paling sederhana.'],
                ['heading' => 'Bergantung pada kebutuhan paling kecil', 'body' => 'Jika fungsi hanya perlu mengirim pesan, cukup minta IPemberitahuan, bukan seluruh layanan yang juga membaca database dan membuat laporan. Ini mempermudah mengganti implementasi dan menguji pemanggil. Nama interface sering diawali I sesuai konvensi .NET. Metode implementasi biasa dibuat public agar memenuhi kontrak yang terlihat oleh pemanggil.'],
            ],
            'analogy' => 'Interface seperti persyaratan pekerjaan “bisa mengirim pesan”; pelaksananya bebas memilih caranya. Abstract class seperti kerangka bangunan bersama yang sudah menyediakan sebagian struktur. Dua alat dengan kemampuan sama tidak harus berasal dari kerangka yang sama.',
            'code' => <<<'CODE'
IPemberitahuan pemberitahuan = new PesanConsole();
pemberitahuan.Kirim("Buku berhasil dipinjam.");

interface IPemberitahuan
{
    void Kirim(string pesan);
}

class PesanConsole : IPemberitahuan
{
    public void Kirim(string pesan)
    {
        Console.WriteLine($"Info: {pesan}");
    }
}
CODE,
            'output' => 'Info: Buku berhasil dipinjam.',
            'exercise' => 'Buat implementasi kedua bernama PesanHurufBesar yang mencetak pesan dengan ToUpperInvariant(). Ganti objek pada baris pertama saja. Jelaskan mengapa baris pemanggilan Kirim tetap sama.',
            'solution' => 'PesanHurufBesar mengimplementasikan IPemberitahuan dan method Kirim memanggil Console.WriteLine(pesan.ToUpperInvariant());. Ubah new PesanConsole() menjadi new PesanHurufBesar(). Pemanggil hanya mengetahui kontrak Kirim, sehingga tidak perlu mengetahui cara format pesan di dalam class.',
            'takeaways' => ['Interface memisahkan kontrak dari implementasi.', 'Abstract class dapat berbagi state dan implementasi.', 'Pilih berdasarkan kebutuhan, bukan karena salah satunya selalu lebih baik.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/interfaces',
        ],
        [
            'id' => 'exception-handling', 'stage' => 'oop', 'title' => 'Menangani Error dengan Tepat',
            'summary' => 'Gunakan try/catch/finally dan bedakan kegagalan dengan input yang belum valid.', 'minutes' => 35,
            'objectives' => ['Menangkap exception yang dapat ditangani.', 'Menggunakan TryParse untuk input yang wajar salah.'],
            'sections' => [
                ['heading' => 'Ketika operasi gagal', 'body' => 'Exception menandakan operasi tidak dapat diselesaikan seperti yang dijanjikan. Bagian try memuat operasi yang mungkin gagal. catch memilih jenis kegagalan yang dapat ditangani dengan tindakan bermakna. Menelan semua exception tanpa memberi informasi membuat masalah tersembunyi; tangkap jenis yang dipahami dan biarkan lapisan yang tepat menangani sisanya.'],
                ['heading' => 'Tidak semua kesalahan perlu exception', 'body' => 'Input pengguna yang bukan angka adalah kejadian yang bisa diperkirakan. int.TryParse mengembalikan bool dan hasil melalui parameter out, sehingga cocok untuk validasi input. Gunakan exception untuk kegagalan operasi atau pelanggaran kontrak, bukan sebagai pengganti percabangan normal pada setiap langkah program.'],
                ['heading' => 'Pekerjaan penutup', 'body' => 'finally dijalankan ketika alur keluar dari blok try/catch dalam eksekusi normal .NET, termasuk ketika exception ditangani. Pada contoh pembagian bilangan bulat dengan nol memicu DivideByZeroException, lalu pesan penutup tetap dicetak. Untuk sumber daya seperti file atau koneksi yang mendukung IDisposable, using biasanya lebih tepat daripada menulis pelepasan sumber daya sendiri.'],
            ],
            'analogy' => 'try adalah rencana utama, catch adalah prosedur saat masalah tertentu muncul, dan finally seperti menutup meja kerja setelah proses. Analogi “selalu” punya batas: penghentian paksa proses atau mati listrik tidak menjamin kode penutup sempat berjalan.',
            'code' => <<<'CODE'
int jumlahPeserta = 0;

try
{
    int bagian = 12 / jumlahPeserta;
    Console.WriteLine(bagian);
}
catch (DivideByZeroException)
{
    Console.WriteLine("Jumlah peserta tidak boleh nol.");
}
finally
{
    Console.WriteLine("Perhitungan selesai diperiksa.");
}
CODE,
            'output' => "Jumlah peserta tidak boleh nol.\nPerhitungan selesai diperiksa.",
            'exercise' => 'Ganti jumlah peserta tetap dengan teks input "empat". Validasi memakai int.TryParse dan periksa angka lebih dari nol sebelum membagi. Program harus menampilkan pesan ramah untuk teks maupun nol tanpa menggunakan exception sebagai alur utama.',
            'solution' => 'Gunakan if (!int.TryParse(input, out int peserta) || peserta <= 0) untuk menampilkan “Masukkan bilangan bulat lebih dari nol.”. Pada else, lakukan 12 / peserta. Operator || melakukan short-circuit, dan kedua penyebab input salah ditangani sebelum pembagian.',
            'takeaways' => ['Tangkap jenis exception yang bisa ditangani dengan benar.', 'TryParse cocok untuk validasi input angka.', 'Gunakan using untuk sumber daya yang perlu dilepas.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/exceptions/exception-handling',
        ],
        [
            'id' => 'generics', 'stage' => 'lanjutan', 'title' => 'Generics: Satu Pola, Banyak Tipe',
            'summary' => 'Gunakan parameter tipe agar komponen bisa dipakai ulang tanpa kehilangan pemeriksaan tipe.', 'minutes' => 40,
            'objectives' => ['Membuat class generic sederhana.', 'Memahami manfaat batasan tipe atau constraints.'],
            'sections' => [
                ['heading' => 'Parameter untuk tipe', 'body' => 'Generics memberi parameter pada tipe, bukan hanya pada nilai. Kotak<T> dapat dipakai sebagai Kotak<string> atau Kotak<int>; T diganti tipe konkret ketika dipakai. Kamu sudah menggunakannya lewat List<string>. Compiler tetap memeriksa apakah nilai yang dimasukkan cocok dengan tipe kotak tersebut.'],
                ['heading' => 'Gunakan ulang tanpa semua menjadi object', 'body' => 'Menyimpan segala hal sebagai object membuat pemanggil harus mengetahui tipe asli dan melakukan cast untuk menggunakannya kembali. Generic mempertahankan informasi tipe di kontrak komponen. Kotak<int>.Isi langsung bertipe int, sehingga bisa dihitung tanpa menebak atau mengubah tipe di tempat pemakaian.'],
                ['heading' => 'Batasi kemampuan jika dibutuhkan', 'body' => 'T yang belum dibatasi tidak otomatis mempunyai method khusus seperti Kirim. Constraint, misalnya where T : IPemberitahuan, menyatakan kemampuan yang wajib tersedia. Gunakan constraint hanya ketika implementasi memang membutuhkannya. Contoh kotak cukup menerima dan menyimpan nilai, sehingga tidak memerlukan constraint apa pun.'],
            ],
            'analogy' => 'Generics seperti desain kotak penyimpanan dengan label jenis isi yang dipilih saat dipesan. Desainnya bisa dipakai untuk buku atau angka, tetapi satu kotak yang sudah ditetapkan untuk angka tidak tiba-tiba menerima teks.',
            'code' => <<<'CODE'
var judul = new Kotak<string>("Belajar C#");
var jumlah = new Kotak<int>(3);
Console.WriteLine(judul.Isi);
Console.WriteLine(jumlah.Isi + 2);

class Kotak<T>
{
    public T Isi { get; }
    public Kotak(T isi)
    {
        Isi = isi;
    }
}
CODE,
            'output' => "Belajar C#\n5",
            'exercise' => 'Buat Kotak<decimal> berisi 15000m dan hitung nilai isinya dikali dua. Setelah itu coba membuat Kotak<int> dengan nilai "tiga". Baca pesan compiler dan jelaskan mengapa program tidak boleh dilanjutkan.',
            'solution' => 'new Kotak<decimal>(15000m) menghasilkan Isi bertipe decimal, sehingga Isi * 2 menghasilkan 30000. new Kotak<int>("tiga") gagal saat kompilasi karena constructor memerlukan int. Kegagalan ini menunjukkan kontrak generic membantu sebelum kode berjalan.',
            'takeaways' => ['T adalah parameter tipe, bukan tipe dinamis.', 'Generics mempertahankan informasi tipe saat komponen dipakai ulang.', 'Constraint menyatakan kemampuan yang diperlukan dari parameter tipe.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/generics',
        ],
        [
            'id' => 'delegates-events-lambda', 'stage' => 'lanjutan', 'title' => 'Delegates, Events & Lambda',
            'summary' => 'Kirim perilaku sebagai nilai dan beri tahu bagian lain saat sesuatu terjadi.', 'minutes' => 50,
            'objectives' => ['Menggunakan Action dan Func untuk kontrak fungsi.', 'Berlangganan event dengan ekspresi lambda.'],
            'sections' => [
                ['heading' => 'Fungsi juga dapat diteruskan', 'body' => 'Delegate adalah tipe yang mewakili pemanggilan method dengan parameter dan nilai kembali tertentu. Action<string> menerima teks tanpa mengembalikan nilai; Func<int, int> menerima int dan mengembalikan int. Lambda adalah cara ringkas menulis fungsi, misalnya angka => angka * 2. Compiler mencocokkannya dengan kontrak delegate.'],
                ['heading' => 'Event membatasi siapa yang mengumumkan', 'body' => 'Event memungkinkan suatu objek mengumumkan kejadian kepada subscriber. Kode luar dapat berlangganan dengan += dan berhenti dengan -=, tetapi tidak bebas memicu event tersebut. Pada contoh, hanya class Toko yang mengumumkan PesananDibuat ketika BuatPesanan dipanggil. Tanda ?. pada Invoke mencegah pemanggilan ketika belum ada subscriber.'],
                ['heading' => 'Pisahkan kejadian dari respons', 'body' => 'Toko tidak perlu tahu apakah subscriber mencetak pesan, memperbarui tampilan, atau mencatat log. Ingat bahwa event biasa memanggil handler secara sinkron; ia tidak otomatis membuat pekerjaan berjalan di background. Jika objek penerbit hidup lama, simpan handler yang diperlukan agar dapat berhenti berlangganan ketika penerimanya sudah tidak dipakai.'],
            ],
            'analogy' => 'Event seperti bel pintu: rumah menyediakan tombol, penghuni berlangganan bunyinya, dan setiap penghuni dapat bereaksi berbeda. Bunyi bel tidak menciptakan pekerja tambahan; event C# biasa juga tidak otomatis berjalan paralel.',
            'code' => <<<'CODE'
var toko = new Toko();
toko.PesananDibuat += nama => Console.WriteLine($"Siapkan: {nama}");
toko.BuatPesanan("Nasi goreng");

class Toko
{
    public event Action<string>? PesananDibuat;

    public void BuatPesanan(string nama)
    {
        PesananDibuat?.Invoke(nama);
    }
}
CODE,
            'output' => 'Siapkan: Nasi goreng',
            'exercise' => 'Tambahkan subscriber kedua yang menulis “Catat pesanan”. Buat satu pesanan dan lihat kedua respons. Lalu simpan handler kedua dalam variabel Action<string>, lepaskan dengan -=, dan buat pesanan baru.',
            'solution' => 'Deklarasikan Action<string> pencatat = nama => Console.WriteLine("Catat pesanan");, lalu tambahkan dengan += pencatat. Pemesanan pertama menjalankan kedua subscriber. Setelah -= pencatat, pemesanan berikutnya hanya memanggil handler “Siapkan”. Menyimpan variabel memudahkan melepaskan delegate yang sama.',
            'takeaways' => ['Delegate menyatakan bentuk fungsi yang boleh dipanggil.', 'Lambda menyediakan implementasi fungsi secara ringkas.', 'Event membatasi publikasi dan menghubungkan banyak subscriber.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/delegates-overview',
        ],
        [
            'id' => 'linq', 'stage' => 'lanjutan', 'title' => 'LINQ untuk Mengolah Data',
            'summary' => 'Saring, urutkan, dan bentuk hasil koleksi dengan ekspresi yang mudah dibaca.', 'minutes' => 45,
            'objectives' => ['Menyusun query Where, OrderBy, dan Select.', 'Membedakan query yang ditunda dengan hasil yang sudah dimaterialisasi.'],
            'sections' => [
                ['heading' => 'Nyatakan hasil yang dicari', 'body' => 'LINQ menyediakan operasi query yang terintegrasi dengan C#. Where menyaring, OrderBy mengurutkan, dan Select mengubah setiap elemen menjadi bentuk hasil yang diinginkan. Lambda menyatakan aturan pada tiap operasi. Pada koleksi dalam memori, operasi ini bekerja atas objek C# tanpa perlu menulis SQL.'],
                ['heading' => 'Urutan operasi mempunyai arti', 'body' => 'Contoh mencari nilai minimal 75, mengurutkannya dari kecil ke besar, lalu menambahkan label. Membaca rantai tersebut dari kiri ke kanan membantu memeriksa maksudnya. Select tidak hanya memilih kolom; ia bisa menghasilkan tipe baru. Operasi seperti Count dan Sum cocok ketika yang dibutuhkan satu nilai agregat.'],
                ['heading' => 'Ketahui kapan query dijalankan', 'body' => 'Banyak operasi yang menghasilkan rangkaian elemen menunda pekerjaannya sampai hasil diiterasi. ToList menjalankan query dan menyimpan hasilnya sebagai daftar pada saat itu. Tanpa materialisasi, perubahan sumber sebelum iterasi dapat mengubah hasil. Ketika memakai EF Core nanti, penyedia query dapat menerjemahkan LINQ ke SQL, dan tidak semua ekspresi C# dapat diterjemahkan.'],
            ],
            'analogy' => 'LINQ seperti memberi petugas gudang daftar kriteria, urutan pengemasan, dan bentuk label. Query yang ditunda mirip instruksi yang baru dikerjakan ketika pesanan diminta; ToList seperti mengambil hasilnya sekarang dan menyimpannya di kotak.',
            'code' => <<<'CODE'
using System.Linq;

int[] nilai = { 90, 60, 75, 80 };
var lulus = nilai
    .Where(angka => angka >= 75)
    .OrderBy(angka => angka)
    .Select(angka => $"Lulus: {angka}")
    .ToList();

foreach (string hasil in lulus)
{
    Console.WriteLine(hasil);
}
CODE,
            'output' => "Lulus: 75\nLulus: 80\nLulus: 90",
            'exercise' => 'Ambil dua nilai tertinggi tanpa nilai di bawah 75. Tampilkan angkanya, kemudian hitung rata-rata semua nilai yang lulus. Jelaskan mengapa Take(2) diletakkan setelah pengurutan.',
            'solution' => 'Gunakan nilai.Where(n => n >= 75).OrderByDescending(n => n).Take(2) untuk menghasilkan 90 dan 80. Rata-rata kelulusan berasal dari nilai.Where(n => n >= 75).Average() yaitu sekitar 81,67. Take sebelum pengurutan akan membatasi anggota menurut urutan asal, bukan memilih dua yang terbesar.',
            'takeaways' => ['Where menyaring, Select membentuk hasil, OrderBy mengurutkan.', 'ToList menyimpan hasil query pada saat dijalankan.', 'LINQ pada database memiliki batas penerjemahan ke SQL.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/linq/',
        ],
        [
            'id' => 'async-await', 'stage' => 'lanjutan', 'title' => 'Async/Await & Concurrency',
            'summary' => 'Tunggu pekerjaan I/O tanpa memblokir thread yang sedang menunggu.', 'minutes' => 50,
            'objectives' => ['Membuat method yang mengembalikan Task<T>.', 'Membedakan asynchronous I/O, concurrency, dan pekerjaan CPU.'],
            'sections' => [
                ['heading' => 'Menunggu juga bagian dari pekerjaan', 'body' => 'Membaca file, mengakses jaringan, dan menunggu database sering menghabiskan waktu untuk menunggu I/O. async dan await memudahkan penulisan operasi seperti ini. Task mewakili penyelesaian pekerjaan; Task<T> juga membawa hasil bertipe T. await menunda kelanjutan method sampai task selesai tanpa memblokir thread selama penantian yang belum selesai.'],
                ['heading' => 'Async tidak sama dengan thread baru', 'body' => 'Menambahkan async tidak otomatis membuat kode berjalan di thread terpisah atau membuat perhitungan lebih cepat. Untuk pekerjaan CPU yang berat, strategi seperti Task.Run atau pemrosesan paralel perlu dipilih sesuai konteks aplikasi. Jangan mengganti operasi I/O async dengan Thread.Sleep; Sleep justru memblokir thread. Hindari .Result dan .Wait() ketika alur dapat memakai await.'],
                ['heading' => 'Mulai, kerjakan hal lain, lalu tunggu', 'body' => 'Contoh menggunakan Task.Delay untuk mensimulasikan penantian. Pemanggilan AmbilPesananAsync mulai berjalan, lalu program menulis kegiatan lain sebelum menunggu hasilnya. Jika beberapa operasi independen memang perlu berjalan bersamaan, Task.WhenAll dapat menunggu semuanya. Pada aplikasi nyata, tambahkan penanganan kegagalan dan CancellationToken untuk pembatalan yang kooperatif.'],
            ],
            'analogy' => 'Seperti kasir menerima pesanan lalu melakukan pekerjaan lain sambil menunggu dapur. Kasir tidak otomatis berlipat ganda; async terutama membantu memanfaatkan waktu tunggu, bukan menjamin masakan selesai lebih cepat.',
            'code' => <<<'CODE'
using System.Threading.Tasks;

Task<string> pesanan = AmbilPesananAsync();
Console.WriteLine("Sambil menunggu, siapkan meja.");
string hasil = await pesanan;
Console.WriteLine(hasil);

static async Task<string> AmbilPesananAsync()
{
    await Task.Delay(300);
    return "Pesanan siap.";
}
CODE,
            'output' => "Sambil menunggu, siapkan meja.\nPesanan siap.",
            'exercise' => 'Ubah method agar menerima nama menu. Mulai dua pesanan dengan nama berbeda, lalu tunggu keduanya memakai Task.WhenAll dan cetak hasilnya. Jangan membuat pesanan kedua baru setelah pesanan pertama selesai ditunggu.',
            'solution' => 'Terima string menu dan kembalikan $"{menu} siap.". Simpan dua task dari pemanggilan method, lalu string[] hasil = await Task.WhenAll(taskPertama, taskKedua);. foreach mencetak hasil sesuai urutan task yang diberikan ke WhenAll, walaupun urutan penyelesaian pekerjaannya dapat berbeda.',
            'takeaways' => ['Task mewakili pekerjaan; await menunggu penyelesaiannya.', 'Async tidak otomatis membuat thread baru.', 'Gunakan WhenAll hanya untuk operasi yang memang dapat berjalan independen.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/asynchronous-programming/',
        ],
        [
            'id' => 'file-json', 'stage' => 'lanjutan', 'title' => 'File I/O & JSON',
            'summary' => 'Simpan daftar belanja ke file dan baca kembali sebagai objek C#.', 'minutes' => 45,
            'objectives' => ['Melakukan serialisasi dan deserialisasi dengan System.Text.Json.', 'Memahami lokasi file dan kegagalan yang perlu ditangani.'],
            'sections' => [
                ['heading' => 'Data yang bertahan setelah aplikasi ditutup', 'body' => 'Variabel dalam memori hilang ketika proses selesai. File memungkinkan data dibaca pada eksekusi berikutnya. File.WriteAllTextAsync menyimpan teks dan mengganti isi file yang sudah ada; File.ReadAllTextAsync membacanya. Path relatif seperti belanja.json dihitung dari working directory proses, yang tidak selalu sama dengan folder source code.'],
                ['heading' => 'Ubah bentuk tanpa mengubah makna', 'body' => 'Serialisasi mengubah data menjadi format yang dapat disimpan atau dikirim. JSON memiliki struktur seperti objek, array, teks, angka, dan boolean. JsonSerializer.Serialize mengubah nilai C# menjadi teks JSON; Deserialize<T> mencoba membangun nilai bertipe T dari teks tersebut. Formatnya harus cocok dengan model yang diharapkan.'],
                ['heading' => 'Periksa batas penyimpanan sederhana', 'body' => 'Hasil deserialisasi dapat null, file bisa tidak ditemukan, izin bisa ditolak, dan JSON bisa rusak. Contoh memakai fallback array kosong untuk nilai null, tetapi aplikasi nyata tetap perlu menangani kegagalan I/O dan JsonException. File tunggal cocok untuk latihan lokal; banyak proses menulis file yang sama memerlukan pengaturan tambahan atau database.'],
            ],
            'analogy' => 'Objek seperti isi tas dan JSON seperti daftar pengemasan tertulis. Serialisasi menulis daftarnya; deserialisasi menyusun kembali data berdasarkan daftar. Daftar yang rusak atau berbeda bentuk tidak otomatis menghasilkan objek yang valid.',
            'code' => <<<'CODE'
using System.IO;
using System.Text.Json;

string[] belanja = { "Beras", "Telur" };
string json = JsonSerializer.Serialize(belanja);
await File.WriteAllTextAsync("belanja.json", json);

string tersimpan = await File.ReadAllTextAsync("belanja.json");
string[] dibaca = JsonSerializer.Deserialize<string[]>(tersimpan)
    ?? Array.Empty<string>();

Console.WriteLine(tersimpan);
Console.WriteLine($"Jumlah barang: {dibaca.Length}");
CODE,
            'output' => "[\"Beras\",\"Telur\"]\nJumlah barang: 2\nFile belanja.json dibuat atau diperbarui di working directory.",
            'exercise' => 'Tambahkan Susu sebelum serialisasi, lalu periksa isi file yang dihasilkan. Pisahkan langkah pembacaan agar pada eksekusi berikutnya dapat membaca file tanpa menulis ulang. Tentukan pesan ketika file belum ada.',
            'solution' => 'Array awal menjadi { "Beras", "Telur", "Susu" } sehingga JSON memuat tiga teks. Pada mode membaca saja, hilangkan langkah WriteAllTextAsync dan periksa File.Exists sebagai penanganan awal. Jika belum ada, tampilkan “Belum ada daftar belanja”; pembacaan tetap dapat gagal setelah pemeriksaan, sehingga tangani IOException pada aplikasi yang lebih lengkap.',
            'takeaways' => ['Path relatif mengikuti working directory.', 'Serialize menghasilkan teks; Deserialize membutuhkan tipe tujuan.', 'WriteAllText mengganti isi lama, bukan menambahkan otomatis.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/standard/serialization/system-text-json/how-to',
        ],
        [
            'id' => 'pilih-spesialisasi', 'stage' => 'spesialisasi', 'title' => 'Web, Desktop, atau Game?',
            'summary' => 'Pilih satu arah proyek dan coba endpoint pertamamu dengan ASP.NET Core.', 'minutes' => 50,
            'objectives' => ['Memilih jalur berdasarkan jenis produk yang ingin dibuat.', 'Mengenali request dan response lewat Minimal API.'],
            'sections' => [
                ['heading' => 'Pilih hasil yang ingin dibuat', 'body' => 'Jalur Web cocok untuk layanan HTTP, API, dan aplikasi berbasis browser dengan ASP.NET Core. Desktop berfokus pada aplikasi berjendela; WPF dan WinForms menargetkan Windows, sedangkan .NET MAUI mempunyai cakupan platform sendiri. Jalur Game menggunakan C# bersama engine seperti Unity. Pilih satu proyek kecil dahulu agar latihan mempunyai arah yang konkret.'],
                ['heading' => 'Fondasi bersama, kebutuhan berbeda', 'body' => 'Method, objek, koleksi, dan penanganan error tetap berguna di semua jalur. Setelah itu kebutuhan bercabang: Web mempelajari HTTP dan otorisasi, Desktop mempelajari event UI dan binding, Game mempelajari game loop serta koordinat. Materi API dan EF Core berikut adalah contoh pendalaman jalur Web; penyelesaian tahap ini dapat memakai proyek desktop atau game dengan kriteria yang setara.'],
                ['heading' => 'Coba satu layanan HTTP', 'body' => 'Untuk contoh Web, buat proyek baru dengan dotnet new web -n HaloApi -f net10.0, lalu masuk ke foldernya. Ganti Program.cs dengan kode berikut. Jalankan dotnet run --urls http://localhost:5050 dan buka http://localhost:5050/api/salam. MapGet memasangkan HTTP GET ke fungsi yang membuat response. Server tetap berjalan sampai dihentikan dengan Ctrl+C.'],
            ],
            'analogy' => 'Spesialisasi seperti memilih jurusan setelah mempelajari dasar yang sama. Mengetahui bahasa C# seperti bisa membaca not balok; membuat web, desktop, atau game tetap memerlukan latihan memainkan alat yang berbeda.',
            'code' => <<<'CODE'
var builder = WebApplication.CreateBuilder(args);
var app = builder.Build();

app.MapGet("/api/salam", () => new
{
    pesan = "Halo dari C#!",
    topik = "Minimal API"
});

app.Run();
CODE,
            'output' => 'Buka http://localhost:5050/api/salam setelah menjalankan perintah di atas. Response JSON berisi {"pesan":"Halo dari C#!","topik":"Minimal API"}. Terminal juga menampilkan log server.',
            'exercise' => 'Untuk jalur Web, tambahkan endpoint /api/buku yang mengembalikan dua judul buku. Untuk Desktop atau Game, tuliskan satu fitur utama, input pengguna, dan hasil yang dapat diamati dari proyek pilihanmu sebelum memilih framework.',
            'solution' => 'Tambahkan app.MapGet("/api/buku", () => new[] { "Belajar C#", "Dasar .NET" }); sebelum app.Run(). Response adalah array JSON dua teks. Contoh lingkup Desktop: formulir menambah barang ke daftar inventaris. Contoh Game: pemain bergerak dan skor bertambah ketika mengambil koin.',
            'takeaways' => ['Pilih satu cabang untuk proyek pertama.', 'Kemampuan C# tetap perlu dilengkapi konsep platform.', 'Endpoint HTTP memetakan request ke response.'],
            'source' => 'https://learn.microsoft.com/en-us/aspnet/core/tutorials/min-web-api?view=aspnetcore-10.0',
        ],
        [
            'id' => 'design-pattern', 'stage' => 'spesialisasi', 'title' => 'Design Pattern & Dependency Injection',
            'summary' => 'Pakai pola ketika ada masalah nyata, lalu pisahkan dependensi dari pemakainya.', 'minutes' => 50,
            'objectives' => ['Mengenali tujuan Factory, Repository, dan Singleton.', 'Menerapkan constructor injection tanpa framework tambahan.'],
            'sections' => [
                ['heading' => 'Pola adalah pilihan desain', 'body' => 'Design pattern memberi nama pada solusi berulang. Factory memusatkan pembuatan objek ketika pemilihannya mulai rumit. Repository dapat menyediakan batas akses data yang sesuai kebutuhan domain. Singleton mengatur satu instance bersama pada lingkup tertentu, tetapi state bersama dan concurrency perlu dipikirkan. Jangan menambah pola hanya karena namanya populer; mulai dari masalah yang sedang dihadapi.'],
                ['heading' => 'Berikan dependensi dari luar', 'body' => 'Dependency injection memberikan objek yang diperlukan kepada pemakainya, alih-alih membuatnya secara tersembunyi di dalam. LayananCheckout hanya perlu cara memberi notifikasi, sehingga menerima INotifikasi lewat constructor. Teknik ini dapat dipakai tanpa container DI. ASP.NET Core menyediakan container ketika aplikasi memerlukan registrasi dan pengelolaan lifetime layanan.'],
                ['heading' => 'Ukuran desain yang membantu', 'body' => 'Pemisahan ini memungkinkan notifikasi console diganti implementasi lain atau fake saat pengujian tanpa mengubah aturan checkout. Jangan menyamakan setiap class dengan satu interface wajib. Tambahkan batas ketika ada variasi, ketergantungan eksternal, atau perilaku yang perlu diuji terpisah. Pada DI berbasis container, lifetime singleton, scoped, dan transient perlu sesuai cara layanan menyimpan state.'],
            ],
            'analogy' => 'Constructor injection seperti memberikan alat yang diperlukan kepada teknisi. Teknisi tidak perlu membangun pabrik obeng di dalam setiap tugas. Pola desain seperti rancangan perkakas yang sudah dikenal; manfaatnya muncul ketika cocok dengan pekerjaan.',
            'code' => <<<'CODE'
var checkout = new LayananCheckout(new NotifikasiConsole());
checkout.Selesaikan("INV-001");

interface INotifikasi
{
    void Kirim(string pesan);
}

class NotifikasiConsole : INotifikasi
{
    public void Kirim(string pesan) => Console.WriteLine(pesan);
}

class LayananCheckout
{
    private readonly INotifikasi _notifikasi;
    public LayananCheckout(INotifikasi notifikasi)
    {
        _notifikasi = notifikasi;
    }
    public void Selesaikan(string nomor)
    {
        _notifikasi.Kirim($"Pesanan {nomor} selesai.");
    }
}
CODE,
            'output' => 'Pesanan INV-001 selesai.',
            'exercise' => 'Buat implementasi NotifikasiCatatan yang menyimpan pesan terakhir pada property. Gunakan implementasi itu untuk memeriksa pesan checkout tanpa membaca layar console.',
            'solution' => 'Tambahkan property public string PesanTerakhir { get; private set; } = ""; pada class yang mengimplementasikan INotifikasi. Method Kirim mengisi property tersebut. Simpan instance catatan, berikan ke constructor checkout, jalankan Selesaikan, lalu periksa PesanTerakhir sama dengan pesan yang diharapkan.',
            'takeaways' => ['Pola desain mengikuti masalah yang ingin diselesaikan.', 'Dependency injection bisa dilakukan lewat constructor biasa.', 'State bersama dan lifetime layanan memengaruhi perilaku aplikasi.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/overview',
        ],
        [
            'id' => 'unit-testing-clean-code', 'stage' => 'spesialisasi', 'title' => 'Unit Testing & Clean Code',
            'summary' => 'Buktikan aturan diskon dengan pengujian yang memeriksa batas penting.', 'minutes' => 55,
            'objectives' => ['Menulis pengujian xUnit dengan pola Arrange, Act, Assert.', 'Memeriksa perilaku batas dan memberi nama yang menjelaskan maksud.'],
            'sections' => [
                ['heading' => 'Uji janji sebuah fungsi', 'body' => 'Unit test memeriksa perilaku bagian kecil program secara otomatis. Untuk aturan diskon minimal 100000, kasus penting ada di bawah batas, tepat di batas, dan di atasnya. Uji hasil yang diharapkan dari aturan tersebut, bukan menyalin langkah perhitungan implementasi ke dalam test; salinan logika yang salah dapat sama-sama lulus.'],
                ['heading' => 'Siapkan proyek pengujian', 'body' => 'Buat folder baru dengan dotnet new xunit -n Belanja.Tests -f net10.0, lalu masuk ke foldernya. Ganti UnitTest1.cs dengan contoh berikut dan jalankan dotnet test. Theory menjalankan test yang sama dengan beberapa baris data InlineData. Di proyek nyata, logika aplikasi biasanya ada di proyek terpisah yang direferensikan oleh proyek test.'],
                ['heading' => 'Jaga maksud tetap terbaca', 'body' => 'Arrange menyiapkan input, Act menjalankan perilaku, dan Assert memeriksa hasil. Nama yang menjelaskan aturan membuat kegagalan lebih cepat dipahami. Clean code berarti kode mudah dibaca dan diubah: fungsi punya tujuan jelas, penamaan sesuai arti, dan efek samping dibatasi. Test tidak menjamin aplikasi bebas bug; integrasi database dan HTTP memerlukan pengujian pada batas yang berbeda.'],
            ],
            'analogy' => 'Unit test seperti menimbang kemasan dengan bobot yang sudah diketahui. Penguji memeriksa standar hasil, bukan mengulangi tebakan mesin. Pemeriksaan satu komponen tidak membuktikan seluruh jalur produksi sudah benar.',
            'code' => <<<'CODE'
using Xunit;

public static class AturanDiskon
{
    public static int Hitung(int total)
        => total >= 100000 ? 10000 : 0;
}

public class AturanDiskonTests
{
    [Theory]
    [InlineData(99999, 0)]
    [InlineData(100000, 10000)]
    [InlineData(150000, 10000)]
    public void DiskonDiberikanMulaiSeratusRibu(int total, int diharapkan)
    {
        int hasil = AturanDiskon.Hitung(total);
        Assert.Equal(diharapkan, hasil);
    }
}
CODE,
            'output' => 'dotnet test menjalankan tiga kasus dan melaporkan semuanya lulus. Format ringkasan dapat berbeda menurut versi test runner. Kode ini ditempatkan di proyek xUnit, bukan Program.cs proyek console.',
            'exercise' => 'Ubah implementasi >= menjadi > dan jalankan test. Identifikasi kasus yang gagal sebelum memperbaikinya kembali. Tambahkan aturan bahwa total negatif harus ditolak dan tulis test exception untuk aturan baru.',
            'solution' => 'Kasus total 100000 gagal setelah perubahan karena tepat di batas tidak lagi mendapat diskon. Kembalikan >=. Untuk total negatif, lempar ArgumentOutOfRangeException sebelum perhitungan, lalu buat Fact yang memanggil Assert.Throws<ArgumentOutOfRangeException>(() => AturanDiskon.Hitung(-1));. Tambahkan using System; bila diperlukan.',
            'takeaways' => ['Test yang baik memeriksa aturan dan kasus batas.', 'Perubahan yang salah seharusnya dapat membuat test gagal.', 'Unit test dan integration test memeriksa batas yang berbeda.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/core/testing/unit-testing-csharp-with-xunit',
        ],
        [
            'id' => 'entity-framework', 'stage' => 'spesialisasi', 'title' => 'Database dengan Entity Framework Core',
            'summary' => 'Hubungkan model C# ke SQLite dan simpan satu buku secara permanen.', 'minutes' => 60,
            'objectives' => ['Mengenali DbContext, DbSet, dan SaveChanges.', 'Membedakan pembuatan database latihan dengan migrations untuk evolusi skema.'],
            'sections' => [
                ['heading' => 'Objek bertemu database', 'body' => 'Entity Framework Core adalah ORM yang memetakan model C# ke database melalui provider. DbContext mengatur akses dan pelacakan perubahan; DbSet<Buku> menjadi titik query untuk entitas Buku. SQL tetap penting untuk memahami relasi, indeks, dan biaya query. ORM mengurangi kode akses data berulang, tetapi tidak otomatis membuat semua query efisien.'],
                ['heading' => 'Mulai dari SQLite lokal', 'body' => 'Buat proyek console .NET 10 baru, lalu pasang provider dengan dotnet add package Microsoft.EntityFrameworkCore.Sqlite --version 10.0.12. Ganti Program.cs dengan contoh di bawah. UseSqlite memilih provider dan file database. EnsureCreated membuat skema awal untuk latihan yang belum memakai migrations; jangan mencampurkannya dengan alur migrations untuk database yang sama.'],
                ['heading' => 'Simpan perubahan dengan sengaja', 'body' => 'Add menandai objek baru pada context, sedangkan SaveChangesAsync mengirim perubahan ke database. Contoh menambah satu buku hanya ketika tabel kosong, sehingga menjalankan ulang tidak menggandakan data contoh. Untuk proyek yang berkembang, gunakan migrations yang ditinjau dan backup sebelum perubahan skema. DbContext tidak thread-safe; jangan memakai satu context untuk beberapa operasi paralel.'],
            ],
            'analogy' => 'EF Core seperti petugas yang menerjemahkan formulir objek menjadi catatan gudang. DbContext adalah meja kerja petugas, dan SaveChanges seperti mengesahkan perubahan. Terjemahan tetap perlu mengikuti struktur gudang; perubahan skema tidak bisa diabaikan.',
            'code' => <<<'CODE'
using Microsoft.EntityFrameworkCore;

using var db = new PerpustakaanDb();
await db.Database.EnsureCreatedAsync();

if (!await db.Buku.AnyAsync())
{
    db.Buku.Add(new Buku { Judul = "Belajar C#" });
    await db.SaveChangesAsync();
}

foreach (Buku buku in await db.Buku.OrderBy(b => b.Id).ToListAsync())
    Console.WriteLine($"{buku.Id}: {buku.Judul}");

class Buku
{
    public int Id { get; set; }
    public string Judul { get; set; } = "";
}

class PerpustakaanDb : DbContext
{
    public DbSet<Buku> Buku => Set<Buku>();
    protected override void OnConfiguring(DbContextOptionsBuilder options)
        => options.UseSqlite("Data Source=perpustakaan.db");
}
CODE,
            'output' => 'Pada database baru, keluaran adalah: 1: Belajar C#. File perpustakaan.db dibuat di working directory. Eksekusi berikutnya membaca buku yang sudah tersimpan.',
            'exercise' => 'Cari buku pertama, ubah judulnya menjadi “C# untuk Pemula”, simpan perubahan, lalu jalankan aplikasi lagi. Terangkan mengapa perubahan property saja belum cukup untuk menyimpan ke database.',
            'solution' => 'Ambil var buku = await db.Buku.FirstAsync();, isi buku.Judul = "C# untuk Pemula";, lalu panggil await db.SaveChangesAsync();. Context melacak entitas yang diambil, tetapi perubahan baru dikirim saat SaveChanges. Untuk aplikasi tanpa data awal, gunakan FirstOrDefaultAsync dan tangani hasil null.',
            'takeaways' => ['Provider menentukan database yang digunakan.', 'Add dan perubahan property belum sama dengan menyimpan.', 'EnsureCreated untuk latihan berbeda dari pengelolaan skema dengan migrations.'],
            'source' => 'https://learn.microsoft.com/en-us/ef/core/get-started/overview/first-app',
        ],
        [
            'id' => 'deployment', 'stage' => 'spesialisasi', 'title' => 'Publish & Siapkan Proyek Rilis',
            'summary' => 'Buat paket aplikasi, pahami kebutuhan runtime, dan rencanakan deployment pertama.', 'minutes' => 45,
            'objectives' => ['Membedakan build, publish, dan deployment.', 'Menentukan kebutuhan runtime serta langkah verifikasi rilis.'],
            'sections' => [
                ['heading' => 'Dari lingkungan latihan ke paket aplikasi', 'body' => 'Build memeriksa dan mengompilasi source code. Publish menyiapkan keluaran aplikasi beserta dependensi yang diperlukan sesuai model deployment. Deployment menempatkan paket itu pada lingkungan tujuan, mengatur konfigurasi, dan menjalankannya. Keberhasilan build saja belum memastikan aplikasi bisa berjalan di mesin lain dengan izin dan konfigurasi yang berbeda.'],
                ['heading' => 'Pilih kebutuhan runtime', 'body' => 'Framework-dependent deployment memerlukan runtime .NET yang sesuai di mesin tujuan. Self-contained deployment menyertakan runtime untuk target sistem operasi dan arsitektur tertentu, sehingga paketnya biasanya lebih besar. Contoh di bawah memublikasikan proyek HaloCSharp dari pelajaran awal sebagai paket framework-dependent. Jalankan dari folder yang berisi HaloCSharp.csproj.'],
                ['heading' => 'Buat rilis yang bisa diperiksa', 'body' => 'Untuk layanan web, hosting harus mendukung .NET dan proses aplikasi, konfigurasi environment, serta HTTPS. Container dapat mengemas aplikasi bersama lingkungan pengguna yang dibutuhkan; container bukan pengganti database, penyimpanan persisten, atau pengelolaan rahasia. Sebelum rilis, jalankan test, coba paket publish, dokumentasikan konfigurasi, dan sediakan cara kembali ke versi sebelumnya jika pemeriksaan gagal.'],
            ],
            'analogy' => 'Publish seperti mengemas makanan beserta petunjuk penyajian, sedangkan deployment seperti mengantarnya ke tempat yang akan menyajikan. Paket framework-dependent mengandalkan peralatan yang sudah tersedia; self-contained membawa lebih banyak perlengkapannya sendiri. Tujuan tetap harus cocok dengan paketnya.',
            'code' => <<<'CODE'
dotnet build -c Release
dotnet publish -c Release --self-contained false -o hasil-publish
dotnet hasil-publish/HaloCSharp.dll
CODE,
            'output' => 'Build dan publish melaporkan hasil proses serta membuat folder hasil-publish. Perintah terakhir menjalankan aplikasi HaloCSharp dan menampilkan isi Console.WriteLine milikmu. Mesin tujuan memerlukan runtime .NET yang sesuai.',
            'exercise' => 'Buat README proyek yang menjelaskan versi .NET, cara menjalankan, cara menguji, lokasi data, dan tiga skenario penerimaan. Jalankan aplikasi dari folder hasil publish, kemudian pastikan file data dibuat di lokasi yang kamu dokumentasikan.',
            'solution' => 'Tuliskan prasyarat SDK untuk pengembangan dan runtime untuk paket framework-dependent. Sertakan perintah dotnet run, dotnet test bila proyek memiliki test, serta perintah publish. Uji satu alur berhasil, satu input tidak valid, dan pembukaan ulang data. Jelaskan working directory agar path relatif tidak mengejutkan saat aplikasi dipindah.',
            'takeaways' => ['Build, publish, dan deployment adalah langkah berbeda.', 'Paket harus cocok dengan platform dan runtime tujuan.', 'Proyek siap dibagikan ketika orang lain dapat menjalankan dan memeriksanya.'],
            'source' => 'https://learn.microsoft.com/en-us/dotnet/core/deploying/',
        ],
    ],
];
