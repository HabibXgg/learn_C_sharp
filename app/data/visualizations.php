<?php
declare(strict_types=1);

// Authored teaching examples. These frames illustrate C# behavior, not a compiler.
return [
    'variables' => [
        'title' => 'Lihat nilai berpindah, satu baris demi satu baris.',
        'intro' => 'Variabel menyimpan nilai saat ini. Mengubah satu variabel tidak otomatis menghitung ulang variabel lain.',
        'lessons' => ['variabel-tipe-data', 'konversi-validasi'],
        'full_code' => <<<'CSHARP'
decimal harga = 12000m;
int jumlah = 3;
decimal total = harga * jumlah;
jumlah = 4;
total = harga * jumlah;
Console.WriteLine(total);
CSHARP,
        'frames' => [
            ['title' => 'Siapkan harga', 'code' => 'decimal harga = 12000m;', 'explanation' => 'Variabel harga dibuat dengan nilai 12000. Akhiran m memilih decimal, bukan bagian dari nilainya.', 'cells' => [['label' => 'harga · decimal', 'value' => '12000', 'state' => 'active']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Tentukan jumlah', 'code' => 'int jumlah = 3;', 'explanation' => 'Kotak kedua menyimpan 3. Harga tetap 12000 karena pernyataan ini hanya membuat jumlah.', 'cells' => [['label' => 'harga · decimal', 'value' => '12000'], ['label' => 'jumlah · int', 'value' => '3', 'state' => 'active']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Hitung sekali', 'code' => 'decimal total = harga * jumlah;', 'explanation' => 'C# membaca kedua nilai, mengalikan 12000 × 3, lalu menyimpan hasil 36000 ke total.', 'cells' => [['label' => 'harga', 'value' => '12000'], ['label' => 'jumlah', 'value' => '3'], ['label' => 'total · decimal', 'value' => '36000', 'state' => 'active']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Ubah jumlah', 'code' => 'jumlah = 4;', 'explanation' => 'Jumlah menjadi 4. Total masih 36000: variabel total menyimpan hasil sebelumnya, bukan rumus spreadsheet yang selalu dihitung ulang.', 'cells' => [['label' => 'harga', 'value' => '12000'], ['label' => 'jumlah', 'value' => '4', 'state' => 'active'], ['label' => 'total', 'value' => '36000']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Hitung ulang dan tampilkan', 'code' => 'total = harga * jumlah;' . "\n" . 'Console.WriteLine(total);', 'explanation' => 'Penugasan baru menghitung 12000 × 4. WriteLine membaca total yang sekarang bernilai 48000.', 'cells' => [['label' => 'harga', 'value' => '12000'], ['label' => 'jumlah', 'value' => '4'], ['label' => 'total', 'value' => '48000', 'state' => 'active']], 'output' => '48000'],
        ],
    ],
    'loop' => [
        'title' => 'Ikuti putaran loop, bukan hanya hasil akhirnya.',
        'intro' => 'Contoh ini menjumlahkan bilangan genap dari 1 sampai 4. Perhatikan kapan kondisi benar dan kapan total berubah.',
        'lessons' => ['percabangan-perulangan'],
        'full_code' => <<<'CSHARP'
int total = 0;
for (int angka = 1; angka <= 4; angka++)
{
    if (angka % 2 == 0)
        total += angka;
}
Console.WriteLine(total);
CSHARP,
        'frames' => [
            ['title' => 'Mulai dari nol', 'code' => 'int total = 0;', 'explanation' => 'Total ditempatkan sebelum loop agar tidak kembali nol setiap putaran.', 'cells' => [['label' => 'angka', 'value' => 'belum mulai'], ['label' => 'total', 'value' => '0', 'state' => 'active']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Putaran pertama: 1', 'code' => 'if (angka % 2 == 0) total += angka;', 'explanation' => '1 % 2 menghasilkan 1. Kondisi false, sehingga total tidak berubah.', 'cells' => [['label' => 'angka', 'value' => '1', 'state' => 'active'], ['label' => 'genap?', 'value' => 'false', 'state' => 'muted'], ['label' => 'total', 'value' => '0']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Putaran kedua: 2', 'code' => 'if (angka % 2 == 0) total += angka;', 'explanation' => '2 % 2 menghasilkan 0. Kondisi true, jadi total bertambah 2: sekarang 0 + 2 = 2.', 'cells' => [['label' => 'angka', 'value' => '2'], ['label' => 'genap?', 'value' => 'true', 'state' => 'accepted'], ['label' => 'total', 'value' => '2', 'state' => 'active']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Putaran ketiga: 3', 'code' => 'if (angka % 2 == 0) total += angka;', 'explanation' => 'Angka 3 adalah ganjil. Nilai total tetap 2; tidak setiap putaran melakukan penjumlahan.', 'cells' => [['label' => 'angka', 'value' => '3', 'state' => 'active'], ['label' => 'genap?', 'value' => 'false', 'state' => 'muted'], ['label' => 'total', 'value' => '2']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Putaran keempat: 4', 'code' => 'if (angka % 2 == 0) total += angka;', 'explanation' => 'Angka 4 adalah genap. Total menjadi 2 + 4 = 6.', 'cells' => [['label' => 'angka', 'value' => '4'], ['label' => 'genap?', 'value' => 'true', 'state' => 'accepted'], ['label' => 'total', 'value' => '6', 'state' => 'active']], 'output' => 'Belum ada keluaran.'],
            ['title' => 'Batas tercapai', 'code' => '// for (int angka = 1; angka <= 4; angka++) selesai' . "\n" . 'Console.WriteLine(total);', 'explanation' => 'Sesudah angka dinaikkan menjadi 5, kondisi angka <= 4 gagal. Loop selesai dan WriteLine di luarnya mencetak total sekali.', 'cells' => [['label' => 'kondisi akhir', 'value' => '5 <= 4: false', 'state' => 'muted'], ['label' => 'total', 'value' => '6', 'state' => 'accepted']], 'output' => '6'],
        ],
    ],
    'objects' => [
        'title' => 'Dua variabel belum tentu dua object.',
        'intro' => 'Ilustrasi ini memakai model Buku terpisah dengan property Judul yang dapat diubah. Diagram menunjukkan referensi ke object, bukan lokasi memori fisik. Kode lengkap modelnya tersedia di bawah.',
        'lessons' => ['class-object', 'properties-encapsulation', 'komposisi-objek'],
        'full_code' => <<<'CSHARP'
// Ganti seluruh Program.cs dengan contoh mandiri ini.
var a = new Buku { Judul = "C# Dasar" };
var b = a;
b.Judul = "C# Lanjutan";
var c = new Buku { Judul = a.Judul };
c.Judul = "Belajar OOP";
Console.WriteLine($"a: {a.Judul} | b: {b.Judul} | c: {c.Judul}");

// Setter public dipakai khusus untuk memperlihatkan perubahan object.
class Buku
{
    public string Judul { get; set; } = "";
}
CSHARP,
        'frames' => [
            ['title' => 'Buat object pertama', 'code' => 'var a = new Buku { Judul = "C# Dasar" };', 'explanation' => 'new membuat satu object Buku. Variabel a menyimpan referensi ke object #1.', 'cells' => [['label' => 'referensi a', 'value' => '→ object #1', 'state' => 'active'], ['label' => 'object #1 · Judul', 'value' => 'C# Dasar']], 'output' => 'a.Judul = C# Dasar'],
            ['title' => 'Salin referensinya', 'code' => 'var b = a;', 'explanation' => 'Pernyataan ini tidak menyalin Buku. a dan b menunjuk object #1 yang sama.', 'cells' => [['label' => 'referensi a', 'value' => '→ object #1'], ['label' => 'referensi b', 'value' => '→ object #1', 'state' => 'active'], ['label' => 'object #1 · Judul', 'value' => 'C# Dasar']], 'output' => 'a.Judul dan b.Judul = C# Dasar'],
            ['title' => 'Ubah lewat b', 'code' => 'b.Judul = "C# Lanjutan";', 'explanation' => 'Object #1 berubah. Karena a menunjuk object yang sama, membaca a.Judul juga menghasilkan C# Lanjutan.', 'cells' => [['label' => 'referensi a & b', 'value' => '→ object #1'], ['label' => 'object #1 · Judul', 'value' => 'C# Lanjutan', 'state' => 'active']], 'output' => 'a.Judul dan b.Judul = C# Lanjutan'],
            ['title' => 'Buat object yang terpisah', 'code' => 'var c = new Buku { Judul = a.Judul };', 'explanation' => 'new membuat object #2. Judul awalnya sama, tetapi Buku ini terpisah dari object #1.', 'cells' => [['label' => 'a & b → object #1', 'value' => 'C# Lanjutan'], ['label' => 'c → object #2', 'value' => 'C# Lanjutan', 'state' => 'active']], 'output' => 'Dua object berbeda, judul awal sama.'],
            ['title' => 'Perubahan kini terpisah', 'code' => 'c.Judul = "Belajar OOP";', 'explanation' => 'Hanya object #2 berubah. a dan b tetap membaca C# Lanjutan dari object #1.', 'cells' => [['label' => 'a & b → object #1', 'value' => 'C# Lanjutan'], ['label' => 'c → object #2', 'value' => 'Belajar OOP', 'state' => 'active']], 'output' => 'a: C# Lanjutan | b: C# Lanjutan | c: Belajar OOP'],
        ],
    ],
    'linq' => [
        'title' => 'Saring data, lalu lihat hasilnya terbentuk.',
        'intro' => 'Contoh LINQ to Objects: Where memilih nilai genap, Select mengalikannya sepuluh, dan ToList menjalankan enumerasi lalu menyimpan hasil.',
        'lessons' => ['linq', 'linq-lanjutan'],
        'full_code' => <<<'CSHARP'
using System.Linq;

int[] angka = { 1, 2, 3, 4 };
var query = angka.Where(x => x % 2 == 0)
                 .Select(x => x * 10);
var hasil = query.ToList();
Console.WriteLine(string.Join(", ", hasil));
CSHARP,
        'frames' => [
            ['title' => 'Data sumber', 'code' => 'int[] angka = { 1, 2, 3, 4 };', 'explanation' => 'Array sumber berisi empat angka. Query berikutnya tidak mengubah isi array ini.', 'cells' => [['label' => 'sumber [0]', 'value' => '1'], ['label' => 'sumber [1]', 'value' => '2'], ['label' => 'sumber [2]', 'value' => '3'], ['label' => 'sumber [3]', 'value' => '4']], 'output' => 'Sumber: 1, 2, 3, 4'],
            ['title' => 'Susun query', 'code' => 'var query = angka.Where(x => x % 2 == 0)' . "\n" . '                 .Select(x => x * 10);', 'explanation' => 'Where dan Select menyusun rangkaian iterator. Pada contoh ini, data belum dienumerasi sampai hasil diminta.', 'cells' => [['label' => 'langkah 1', 'value' => 'Where: genap', 'state' => 'active'], ['label' => 'langkah 2', 'value' => 'Select: × 10'], ['label' => 'eksekusi', 'value' => 'menunggu enumerasi']], 'output' => 'Belum ada daftar hasil.'],
            ['title' => 'ToList meminta hasil: 1', 'code' => 'var hasil = query.ToList(); // periksa 1', 'explanation' => 'Enumerasi dimulai. Where menolak 1 karena ganjil, sehingga nilai ini tidak diteruskan ke Select.', 'cells' => [['label' => 'nilai diperiksa', 'value' => '1', 'state' => 'muted'], ['label' => 'Where', 'value' => 'tidak lolos', 'state' => 'muted'], ['label' => 'hasil sementara', 'value' => '[ ]']], 'output' => 'Hasil sementara: [ ]'],
            ['title' => '2 lolos filter', 'code' => '// Where(2) = true → Select(2) = 20', 'explanation' => 'Angka 2 genap, sehingga diteruskan ke Select. Nilai 20 dimasukkan ke daftar hasil.', 'cells' => [['label' => 'nilai diperiksa', 'value' => '2'], ['label' => 'Select × 10', 'value' => '20', 'state' => 'active'], ['label' => 'hasil sementara', 'value' => '[20]', 'state' => 'accepted']], 'output' => 'Hasil sementara: [20]'],
            ['title' => '3 dilewati, 4 diterima', 'code' => '// Where(3) = false' . "\n" . '// Where(4) = true → Select(4) = 40', 'explanation' => 'Angka 3 tidak lolos. Angka 4 lolos lalu menjadi 40. Tiap elemen mengalir melalui operasi yang diperlukan.', 'cells' => [['label' => 'nilai 3', 'value' => 'tidak lolos', 'state' => 'muted'], ['label' => 'nilai 4 → × 10', 'value' => '40', 'state' => 'active'], ['label' => 'hasil', 'value' => '[20, 40]', 'state' => 'accepted']], 'output' => 'Hasil: [20, 40]'],
            ['title' => 'Sumber tetap utuh', 'code' => 'Console.WriteLine(string.Join(", ", hasil));', 'explanation' => 'ToList sudah menyimpan hasil enumerasi saat itu. Array angka tetap 1, 2, 3, 4; hasil adalah daftar baru berisi 20 dan 40.', 'cells' => [['label' => 'sumber', 'value' => '[1, 2, 3, 4]'], ['label' => 'daftar hasil', 'value' => '[20, 40]', 'state' => 'accepted']], 'output' => '20, 40'],
        ],
    ],
    'async' => [
        'title' => 'Menunggu tanpa menahan seluruh alur pemanggil.',
        'intro' => 'Ilustrasi alur async dengan Task.Delay. Waktu pada kartu adalah urutan logis, bukan benchmark dan bukan bukti penggunaan thread baru.',
        'lessons' => ['async-await', 'cancellation-token'],
        'full_code' => <<<'CSHARP'
using System.Threading.Tasks;

Task tugas = TungguAsync();
Console.WriteLine("Kerjakan hal lain");
await tugas;

static async Task TungguAsync()
{
    Console.WriteLine("Mulai menunggu");
    await Task.Delay(1000);
    Console.WriteLine("Tunggu selesai");
}
CSHARP,
        'frames' => [
            ['title' => 'Panggil pekerjaan async', 'code' => 'Task tugas = TungguAsync();', 'explanation' => 'TungguAsync mulai berjalan secara sinkron hingga mencapai await yang belum selesai.', 'cells' => [['label' => 'pemanggil', 'value' => 'memanggil metode'], ['label' => 'TungguAsync', 'value' => 'mulai', 'state' => 'active']], 'output' => 'Mulai menunggu'],
            ['title' => 'Await belum selesai', 'code' => 'await Task.Delay(1000); // di dalam TungguAsync', 'explanation' => 'Metode menangguhkan kelanjutannya dan mengembalikan Task yang belum selesai. Task.Delay tidak perlu memblokir thread selama satu detik.', 'cells' => [['label' => 'Task.Delay', 'value' => 'belum selesai', 'state' => 'active'], ['label' => 'TungguAsync', 'value' => 'ditangguhkan'], ['label' => 'pemanggil', 'value' => 'bisa lanjut']], 'output' => 'Mulai menunggu'],
            ['title' => 'Pemanggil melanjutkan', 'code' => 'Console.WriteLine("Kerjakan hal lain");', 'explanation' => 'Pemanggil menjalankan baris berikutnya sebelum menunggu tugas. Async tidak otomatis mempercepat komputasi atau menjamin dua CPU bekerja bersamaan.', 'cells' => [['label' => 'pemanggil', 'value' => 'menulis pesan', 'state' => 'active'], ['label' => 'Task.Delay', 'value' => 'belum selesai']], 'output' => "Mulai menunggu\nKerjakan hal lain"],
            ['title' => 'Pemanggil ikut menunggu', 'code' => 'await tugas;', 'explanation' => 'Kini pemanggil menunggu sampai TungguAsync benar-benar selesai. Menyimpan Task lalu meng-await-nya mencegah pekerjaan ditinggal tanpa pengamatan.', 'cells' => [['label' => 'pemanggil', 'value' => 'await tugas', 'state' => 'active'], ['label' => 'Task.Delay', 'value' => 'menunggu timer']], 'output' => "Mulai menunggu\nKerjakan hal lain"],
            ['title' => 'Lanjut setelah timer', 'code' => 'Console.WriteLine("Tunggu selesai"); // setelah Delay' . "\n" . '// TungguAsync selesai, kemudian await tugas selesai.', 'explanation' => 'Saat timer selesai, kelanjutan metode bisa dijadwalkan. Metode mencetak pesan dan menyelesaikan Task; barulah pemanggil dapat melanjutkan sesudah await tugas.', 'cells' => [['label' => 'TungguAsync', 'value' => 'selesai', 'state' => 'accepted'], ['label' => 'pemanggil', 'value' => 'lanjut', 'state' => 'active']], 'output' => "Mulai menunggu\nKerjakan hal lain\nTunggu selesai"],
        ],
    ],
];
