<?php
declare(strict_types=1);

// Materi tambahan: contoh dan latihan ditulis untuk kurikulum ini.
return [
    [
        'id' => 'nullable-reference', 'stage' => 'lanjutan', 'title' => 'Null Safety & Nullable Reference',
        'summary' => 'Bedakan data yang tidak tersedia, teks kosong, dan nilai wajib sebelum mengaksesnya.', 'minutes' => 55,
        'objectives' => ['Menyatakan kontrak data opsional dengan string?.', 'Memperbaiki kemungkinan null melalui alur validasi.', 'Memilih fallback sesuai arti data, bukan sekadar menghilangkan warning.'],
        'sections' => [
            ['heading' => 'Prasyarat dan pertanyaan yang ingin dijawab', 'body' => 'Selesaikan materi method, class, dan exception. Buat proyek baru dengan dotnet new console -n LatihanNull -f net10.0, masuk ke foldernya, lalu ganti Program.cs dengan contoh di bawah. Jalankan dotnet run. Kita membuat penyambut pengguna: nama panggilan boleh belum diisi, tetapi pesan salam harus selalu bisa ditampilkan. Tentukan perilaku untuk empat input sebelum menulis kode: tidak ada nilai, teks kosong, spasi saja, dan nama yang memiliki spasi di tepinya.'],
            ['heading' => 'Null mempunyai arti yang berbeda dari kosong', 'body' => 'null berarti referensi tidak menunjuk objek. String kosong tetap merupakan objek teks dengan panjang nol; teks berisi tiga spasi memiliki panjang tiga walaupun terlihat kosong di layar. Pada formulir profil, ketiganya dapat diperlakukan sebagai nama yang belum layak ditampilkan. Pada catatan audit, perbedaannya mungkin perlu dipertahankan. Mulailah dari aturan produk: apakah pengguna boleh tidak punya nama panggilan, atau nama wajib diisi? Keputusan itu menentukan apakah kita menyediakan label Tamu atau meminta perbaikan input.'],
            ['heading' => 'Nyatakan data opsional pada kontrak', 'body' => 'string? memberi tahu compiler bahwa null diperbolehkan; string menyatakan niat agar nilainya tersedia. Fitur nullable reference adalah analisis saat kompilasi dan tidak membuat jenis string baru saat runtime. Directive #nullable enable memastikan analisis aktif pada contoh ini. Compiler mengikuti pemeriksaan null dan percabangan untuk menilai apakah akses aman. Peringatan bukan bukti aplikasi pasti gagal, tetapi titik yang harus diperiksa: apakah kontraknya salah, input belum divalidasi, atau jalur yang menuju akses tersebut belum jelas?'],
            ['heading' => 'Validasi dahulu, kemudian normalisasi', 'body' => 'Method NamaTampilan menerima string? karena sumbernya boleh kosong. IsNullOrWhiteSpace menutup tiga kasus awal sekaligus. Jalur itu langsung mengembalikan Tamu. Jalur berikutnya menggunakan Trim untuk membuang spasi tepi dari nama yang berisi karakter. Return awal membuat jalur sukses lebih mudah dibaca. Nama yang ditampilkan tetap mempertahankan huruf aslinya; mengubah semuanya menjadi huruf besar belum tentu sesuai preferensi pemilik nama. Pisahkan normalisasi teknis dari perubahan yang mengubah makna data pengguna.'],
            ['heading' => 'Gunakan operator sesuai kebutuhan', 'body' => 'Operator ?. mengakses anggota hanya ketika penerimanya tersedia; panjang nama?.Length menghasilkan nilai yang juga dapat tidak tersedia. Operator ?? memilih nilai cadangan ketika hasil kiri null. Bentuk nama ?? "Tamu" tidak menangani string kosong atau spasi saja, sehingga belum memenuhi aturan penyambut kita. Operator ! hanya menekan analisis compiler; ia tidak mengisi objek maupun melakukan pemeriksaan runtime. Pilih pemeriksaan eksplisit ketika ada aturan yang perlu terlihat dan dijelaskan oleh pembaca berikutnya.'],
            ['heading' => 'Latih kontrak pada batas aplikasi', 'body' => 'Data dari terminal, JSON, database, dan respons jaringan perlu diperiksa di tempat masuknya. Anotasi pada model tidak membuktikan sumber luar mematuhi aturan kita. Jika email wajib untuk mengirim tanda terima, hentikan alur ketika email tidak tersedia dan tampilkan masalah yang dapat diperbaiki. Mengganti email dengan teks Tamu akan menyembunyikan data yang hilang. Untuk menguji penyambut ini, bandingkan keluaran empat kasus secara terpisah dan pastikan input tidak valid tidak menimbulkan NullReferenceException.'],
        ],
        'analogy' => 'Kolom formulir seperti slot kartu nama. null berarti kartu belum ada; string kosong berarti kartunya ada tetapi belum ditulis. Petugas boleh menyapa Tamu, tetapi tidak boleh menganggap itu nama resmi. Analogi ini membantu membedakan kondisi; validitas nama tetap aturan aplikasi, bukan sesuatu yang dipahami compiler.',
        'code' => <<<'CODE'
#nullable enable
string?[] masukan = { null, "", "   ", "  Habib  " };

foreach (string? nama in masukan)
    Console.WriteLine($"Halo, {NamaTampilan(nama)}!");

static string NamaTampilan(string? nama)
{
    if (string.IsNullOrWhiteSpace(nama))
        return "Tamu";

    return nama.Trim();
}
CODE,
        'output' => "Halo, Tamu!\nHalo, Tamu!\nHalo, Tamu!\nHalo, Habib!",
        'exercise' => 'Buat method RingkasCatatan(string? catatan) yang menghasilkan “Belum ada catatan” untuk null, kosong, dan spasi; selain itu kembalikan teks yang sudah dipangkas spasi tepinya. Tuliskan empat contoh input dan keluaran sebelum menjalankannya.',
        'solution' => 'Gunakan IsNullOrWhiteSpace untuk jalur fallback, lalu return catatan.Trim() pada jalur lainnya. Input null, "", dan "  " menghasilkan pesan fallback, sementara "  Bawa buku  " menghasilkan "Bawa buku". Tipe return tetap string karena kedua jalur selalu menghasilkan teks.',
        'takeaways' => ['Null, kosong, dan spasi merupakan keadaan berbeda.', 'Nullable reference membantu analisis compiler tanpa mengubah tipe runtime.', 'Fallback harus sesuai arti data yang dibutuhkan.'],
        'mistakes' => [
            ['title' => 'Menghapus semua warning memakai !', 'body' => 'nama!.Length tetap gagal bila nama benar-benar null. Perbaiki kontrak atau tambahkan pemeriksaan; jangan mengganti penalaran dengan operator penekan warning.'],
            ['title' => 'Menganggap ?? menyaring spasi', 'body' => '"   " ?? "Tamu" menghasilkan tiga spasi. Untuk nama yang harus terbaca, gunakan pemeriksaan IsNullOrWhiteSpace sebelum normalisasi.'],
        ],
        'practice' => [
            ['title' => 'Prediksi panjang', 'task' => 'Jika string? kota = null, berapa hasil kota?.Length ?? 0?', 'hint' => 'Akses bersyarat memberi hasil null, lalu fallback bekerja.', 'answer' => 'Hasilnya 0. Ini cocok untuk panjang tampilan, tetapi dapat menyamarkan beda kota tidak tersedia dan kota kosong.'],
            ['title' => 'Nama wajib', 'task' => 'Ubah kebutuhan: pendaftaran wajib memiliki nama. Apa yang berubah?', 'hint' => 'Label cadangan tidak lagi memenuhi aturan pendaftaran.', 'answer' => 'Tolak null, kosong, dan spasi dengan pesan validasi. Method untuk salam boleh menerima fallback, sedangkan alur pendaftaran harus meminta pengguna mengisi nama.'],
        ],
        'walkthrough' => [
            ['title' => 'Terima keadaan opsional', 'explanation' => 'Array menyimpan empat keadaan yang berbeda. Parameter string? mempertahankan kemungkinan null sampai method memutuskan apa yang harus dilakukan.'],
            ['title' => 'Tutup jalur tidak valid', 'explanation' => 'Tiga input awal memenuhi IsNullOrWhiteSpace dan langsung menghasilkan Tamu, sehingga Trim tidak dijalankan pada null.'],
            ['title' => 'Hasilkan teks siap tampil', 'explanation' => 'Input keempat melewati validasi, menjadi Habib setelah Trim, lalu disisipkan ke kalimat salam oleh pemanggil.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/null-safety/nullable-reference-types',
        'sources' => [
            ['label' => 'Microsoft Learn: nullable reference types', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/null-safety/nullable-reference-types'],
            ['label' => 'Microsoft Learn: operator ?? dan ??=', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/operators/null-coalescing-operator'],
        ],
    ],
    [
        'id' => 'linq-lanjutan', 'stage' => 'lanjutan', 'title' => 'LINQ: GroupBy, Join & Laporan',
        'summary' => 'Gabungkan katalog dengan transaksi dan susun laporan yang bisa diperiksa dengan hitungan manual.', 'minutes' => 70,
        'objectives' => ['Mengelompokkan transaksi berdasarkan key.', 'Menggabungkan dua koleksi dengan Join.', 'Membedakan query tertunda dengan hasil yang sudah dimaterialisasi.'],
        'sections' => [
            ['heading' => 'Mulai dari pertanyaan laporan', 'body' => 'Pelajari List, record atau class, lambda, serta LINQ dasar terlebih dahulu. Buat proyek console LaporanToko dengan target net10.0 dan ganti Program.cs. Pertanyaan kita adalah: berapa nilai penjualan setiap produk, dari terbesar ke terkecil? Katalog menyimpan nama barang, sementara transaksi menyimpan kode, jumlah, dan harga pada waktu penjualan. Dua koleksi dipisahkan karena nama produk dan kejadian penjualan memiliki tujuan berbeda. Harga transaksi tidak diambil ulang dari katalog agar perubahan harga besok tidak mengubah laporan kemarin.'],
            ['heading' => 'Kelompok adalah wadah beberapa transaksi', 'body' => 'GroupBy mengumpulkan anggota yang mempunyai key sama. Key contoh adalah Kode. Dua baris berkode BK masuk satu kelompok, sedangkan PN masuk kelompok lainnya. Setiap kelompok tetap dapat dibaca sebagai urutan transaksi. Sum menghitung Jumlah dikali Harga pada tiap anggota lalu menjumlahkannya. Count hanya menghitung banyak baris, bukan jumlah barang atau omzet. Tuliskan ketiga ukuran itu pada kertas untuk BK: dua transaksi, tiga barang, dan nilai 36000.'],
            ['heading' => 'Hubungkan kode dengan nama', 'body' => 'Join mencocokkan key dari ringkasan dengan key pada katalog. Bentuk yang dipakai adalah inner join: hanya pasangan yang mempunyai kecocokan di kedua sisi yang menghasilkan baris. Jika transaksi memakai kode yang tidak ada di katalog, nilainya akan hilang dari hasil join contoh ini. Itu alasan kita harus memvalidasi kode sebelum transaksi diterima, atau membuat laporan terpisah untuk kode tak dikenal. Kode katalog juga sebaiknya unik; dua katalog dengan kode sama dapat menggandakan baris hasil.'],
            ['heading' => 'Pilih bentuk hasil yang diperlukan', 'body' => 'Select membentuk objek ringkasan yang hanya berisi Kode dan Total, lalu Join menghasilkan Nama dan Total. Proyeksi ini membuat langkah berikutnya tidak harus memahami semua detail transaksi. OrderByDescending menempatkan nilai terbesar dahulu, sementara ThenBy menentukan urutan nama ketika total sama. Urutan tambahan membuat laporan lebih mudah dibandingkan antarpercobaan. Jangan mengandalkan urutan kebetulan koleksi ketika antarmuka menyebut suatu peringkat; tulis aturan pengurutan yang sesuai kebutuhan pembaca.'],
            ['heading' => 'Pahami kapan data benar-benar dibaca', 'body' => 'Banyak operator LINQ atas IEnumerable menyusun rencana yang baru dievaluasi ketika diiterasi. ToList pada akhir pipeline menjalankannya dan menyimpan hasil saat itu. Jika transaksi berubah setelah ToList, list ringkasan yang sudah terbentuk tidak otomatis dihitung ulang. Untuk memperbaruinya, jalankan query lagi. Sebaliknya, enumerasi query tertunda berulang dapat mengerjakan perhitungan yang sama berkali-kali. Putuskan apakah layar membutuhkan snapshot saat tombol ditekan atau hasil terbaru pada setiap pembacaan.'],
            ['heading' => 'Periksa cakupan sebelum mengoptimalkan', 'body' => 'Contoh bekerja pada array di memori. Query EF Core dapat diterjemahkan ke SQL dan mempunyai kemampuan serta biaya yang berbeda; jangan menganggap setiap method C# bebas dimasukkan ke query database. Mulai dengan dataset kecil yang hasilnya diketahui. Tambahkan kode tanpa katalog, transaksi nol, dan produk tanpa penjualan untuk memeriksa definisi laporan. Produk tanpa penjualan tidak muncul pada inner join ini. Jika pemilik toko ingin semuanya tampil dengan nol, desain query perlu diubah secara sengaja.'],
        ],
        'analogy' => 'Bayangkan menyortir struk ke amplop berkode barang, menjumlahkan setiap amplop, lalu menempelkan nama dari katalog. Amplop tanpa nama tidak ikut laporan inner join. Ini bukan bukti amplopnya kosong; prosedur penggabungannya memang tidak menemukan pasangan.',
        'code' => <<<'CODE'
using System.Linq;

var katalog = new[]
{
    new Produk("BK", "Buku"), new Produk("PN", "Pensil")
};
var transaksi = new[]
{
    new Transaksi("BK", 2, 12000m),
    new Transaksi("PN", 2, 3000m),
    new Transaksi("BK", 1, 12000m)
};

var laporan = transaksi
    .GroupBy(t => t.Kode)
    .Select(g => new { Kode = g.Key, Total = g.Sum(t => t.Jumlah * t.Harga) })
    .Join(katalog, r => r.Kode, p => p.Kode,
        (r, p) => new { p.Nama, r.Total })
    .OrderByDescending(r => r.Total)
    .ThenBy(r => r.Nama)
    .ToList();

foreach (var baris in laporan)
    Console.WriteLine($"{baris.Nama}: {baris.Total:0}");

record Produk(string Kode, string Nama);
record Transaksi(string Kode, int Jumlah, decimal Harga);
CODE,
        'output' => "Buku: 36000\nPensil: 6000",
        'exercise' => 'Tambahkan produk Penghapus berkode PH dan satu transaksi 4 barang dengan harga 2000. Prediksi urutan laporan. Setelah benar, tambahkan kode XX yang tidak memiliki katalog dan amati apa yang hilang.',
        'solution' => 'Total PH adalah 8000, sehingga urutannya Buku 36000, Penghapus 8000, Pensil 6000. XX tidak muncul karena inner join memerlukan pasangan. Bandingkan transaksi dengan katalog menggunakan Any untuk menemukan kode tak dikenal sebelum membuat ringkasan.',
        'takeaways' => ['GroupBy mengelompokkan; Sum menghitung nilai anggota.', 'Inner join hanya menghasilkan pasangan yang cocok.', 'ToList menyimpan hasil evaluasi pada saat dipanggil.'],
        'mistakes' => [
            ['title' => 'Count disamakan dengan omzet', 'body' => 'Dua baris transaksi belum menyatakan jumlah unit atau uang. Sebutkan ukuran laporan dan rumusnya secara eksplisit.'],
            ['title' => 'Data hilang saat join dianggap nol', 'body' => 'Kode yang tidak cocok tidak menghasilkan baris. Periksa integritas kode agar laporan tidak terlihat lengkap padahal sebagian transaksi terbuang.'],
        ],
        'practice' => [
            ['title' => 'Penjualan per kategori', 'task' => 'Apa key GroupBy jika tujuan berubah menjadi total per kategori?', 'hint' => 'Kategori tersedia pada katalog, bukan pada transaksi contoh.', 'answer' => 'Gabungkan transaksi dengan katalog yang memiliki Kategori terlebih dahulu, lalu GroupBy kategori dan Sum jumlah kali harga. Perhatikan lagi kode katalog yang unik.'],
            ['title' => 'Dua barang tanpa penjualan', 'task' => 'Tambahkan dua produk ke katalog tanpa transaksi. Apakah jumlah baris laporan bertambah?', 'hint' => 'Urutan query dimulai dari transaksi dan memakai inner join.', 'answer' => 'Tidak. Hasil tetap hanya kelompok transaksi yang memiliki pasangan. Laporan semua produk memerlukan strategi yang mempertahankan katalog, termasuk ketika tidak ada transaksi.'],
        ],
        'walkthrough' => [
            ['title' => 'Kelompokkan baris', 'explanation' => 'Tiga transaksi menjadi kelompok BK berisi dua anggota dan PN berisi satu anggota. Key kelompok mempertahankan hubungan ke katalog.'],
            ['title' => 'Hitung dan beri nama', 'explanation' => 'BK menghasilkan 24000 + 12000, PN menghasilkan 6000. Join mengganti kode pada tampilan dengan Buku dan Pensil.'],
            ['title' => 'Urutkan lalu simpan hasil', 'explanation' => 'Total terbesar ditempatkan dahulu. ToList mengevaluasi pipeline, sehingga foreach membaca daftar ringkasan yang sudah dibuat.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/linq/standard-query-operators/grouping-data',
        'sources' => [
            ['label' => 'Microsoft Learn: pengelompokan LINQ', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/linq/standard-query-operators/grouping-data'],
            ['label' => 'Microsoft Learn: join LINQ', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/linq/standard-query-operators/join-operations'],
        ],
    ],
    [
        'id' => 'cancellation-token', 'stage' => 'lanjutan', 'title' => 'Async yang Bisa Dibatalkan',
        'summary' => 'Teruskan CancellationToken dan hentikan pekerjaan dengan hasil yang jelas.', 'minutes' => 60,
        'objectives' => ['Membedakan pemilik sumber pembatalan dan penerima token.', 'Meneruskan token ke operasi async.', 'Menangani pembatalan tanpa menyamarkannya sebagai keberhasilan.'],
        'sections' => [
            ['heading' => 'Prasyarat dan skenario latihan', 'body' => 'Pelajari async/await dan try/catch terlebih dahulu. Buat proyek console BatalkanBatch dengan target net10.0 lalu ganti Program.cs. Kita memproses tiga batch secara berurutan, tetapi mensimulasikan pengguna menekan Batal setelah batch pertama. Pembatalan sengaja dipicu dari kode agar hasil latihan dapat diprediksi tanpa bergantung pada kecepatan menekan tombol. Pada aplikasi nyata, sumber sinyal dapat berasal dari tombol, penghentian server, request yang ditutup, atau batas waktu.'],
            ['heading' => 'Pembatalan adalah kerja sama', 'body' => 'CancellationTokenSource adalah pemilik kemampuan meminta pembatalan. Token yang diambil darinya dibagikan kepada pekerjaan yang perlu mengamati permintaan tersebut. Memanggil Cancel tidak menghentikan paksa thread dan tidak otomatis menghapus pekerjaan yang sudah selesai. Kode harus memeriksa token atau menyerahkannya ke API yang mendukungnya. Karena itu sebuah proses dapat terus berjalan setelah tombol ditekan jika ia mengabaikan token, menjalankan operasi yang tak bisa dibatalkan, atau belum mencapai tempat pemeriksaan berikutnya.'],
            ['heading' => 'Teruskan sinyal sampai operasi yang menunggu', 'body' => 'Pada contoh, Task.Delay menerima token sehingga penantian dapat dibatalkan. Tanpa argumen itu, penundaan yang sedang berjalan akan selesai sesuai jadwal meskipun sumber telah dibatalkan. Pada kode produksi pola yang sama berlaku untuk pembacaan HTTP atau file yang menyediakan overload token. async tidak berarti setiap bagian otomatis berjalan paralel. Loop contoh menunggu satu batch sebelum lanjut; kata await melepaskan penantian secara asinkron, sementara urutan yang ditulis tetap berurutan.'],
            ['heading' => 'Letakkan batas pemeriksaan yang masuk akal', 'body' => 'ThrowIfCancellationRequested di awal loop mencegah batch berikutnya dimulai setelah permintaan pembatalan. Pemeriksaan terlalu jarang membuat respons lambat; memeriksa pada setiap operasi kecil yang sangat murah dapat membuat kode berisik. Pilih satuan kerja yang bermakna, misalnya setiap halaman unduhan atau kumpulan catatan. Untuk pekerjaan CPU yang panjang, pemeriksaan eksplisit penting karena tidak selalu ada API await yang menerima token. Ukur keterlambatan berhenti berdasarkan kebutuhan produk, bukan asumsi bahwa Cancel segera mengakhiri seluruh fungsi.'],
            ['heading' => 'Pisahkan selesai, gagal, dan dibatalkan', 'body' => 'OperationCanceledException ditangkap dengan filter yang memastikan sumber contoh memang meminta pembatalan. Pesan yang dicetak menyatakan dibatalkan, bukan semua batch selesai. Kesalahan lain tidak diam-diam diubah menjadi pesan pembatalan. Gunakan using untuk membuang sumber ketika lingkupnya berakhir. Pada method pustaka, biasanya teruskan exception pembatalan kepada pemanggil agar lapisan antarmuka menentukan pesan pengguna. Hindari catch umum yang mengembalikan data setengah jadi seolah hasilnya lengkap.'],
            ['heading' => 'Pikirkan efek yang sudah terjadi', 'body' => 'Jika batch pertama sudah menyimpan data, membatalkan batch kedua tidak membatalkan penyimpanan pertama. Tentukan apakah hasil sebagian diperbolehkan, perlu ditandai, atau harus dilindungi transaksi. Untuk latihan ekspor, menulis ke file sementara lalu memindahkan hasil setelah sukses dapat membantu membedakan hasil lengkap dari pekerjaan terputus. CancelAfter bisa menjadwalkan permintaan berdasarkan waktu, tetapi waktu aktual operasi berhenti tetap tergantung kerja sama kode. Jangan menjanjikan rollback hanya karena sebuah method menerima CancellationToken.'],
        ],
        'analogy' => 'Token seperti kartu pemberitahuan berhenti yang dibaca tiap petugas. Pengelola mengubah status kartu, lalu petugas berhenti pada titik aman. Barang yang sudah dikirim tidak kembali sendiri. Batas analoginya: program perlu menyediakan pemeriksaan secara eksplisit; ia tidak memahami niat pengguna dari tombol saja.',
        'code' => <<<'CODE'
using System.Threading;
using System.Threading.Tasks;

using var sumber = new CancellationTokenSource();
CancellationToken token = sumber.Token;

try
{
    for (int batch = 1; batch <= 3; batch++)
    {
        token.ThrowIfCancellationRequested();
        await Task.Delay(50, token);
        Console.WriteLine($"Batch {batch} selesai");

        if (batch == 1)
            sumber.Cancel(); // Simulasi tombol Batal.
    }
    Console.WriteLine("Semua batch selesai");
}
catch (OperationCanceledException) when (sumber.IsCancellationRequested)
{
    Console.WriteLine("Dibatalkan; batch berikutnya tidak dimulai.");
}
CODE,
        'output' => "Batch 1 selesai\nDibatalkan; batch berikutnya tidak dimulai.",
        'exercise' => 'Hapus pemanggilan Cancel dan prediksi hasil. Kemudian pulihkan pembatalan, tetapi pindahkan Cancel sebelum try. Jelaskan apakah batch pertama sempat menampilkan pesan.',
        'solution' => 'Tanpa Cancel, ketiga batch dicetak dan diikuti Semua batch selesai. Jika Cancel dipanggil sebelum try, pemeriksaan pertama langsung melempar exception pembatalan; tidak ada batch selesai. Pesan akhir hanya menyatakan pembatalan.',
        'takeaways' => ['Cancel meminta penghentian secara kooperatif.', 'Teruskan token kepada operasi yang mendukung pembatalan.', 'Pekerjaan selesai, gagal, dan dibatalkan memiliki arti berbeda.'],
        'mistakes' => [
            ['title' => 'Menyimpan token tanpa memakainya', 'body' => 'Parameter CancellationToken yang tidak pernah diperiksa atau diteruskan tidak membuat operasi dapat dibatalkan. Ikuti aliran token sampai operasi sebenarnya.'],
            ['title' => 'Menganggap pembatalan adalah rollback', 'body' => 'Perubahan yang sudah tersimpan tetap ada. Rancang transaksi atau penandaan hasil sebagian bila kebutuhan aplikasi mengharuskannya.'],
        ],
        'practice' => [
            ['title' => 'Batas waktu', 'task' => 'Bagaimana meminta pembatalan setelah dua detik?', 'hint' => 'Pemilik CancellationTokenSource dapat menjadwalkan sinyal.', 'answer' => 'Gunakan sumber.CancelAfter(TimeSpan.FromSeconds(2)) sebelum memulai. Operasi tetap perlu menerima atau memeriksa token; waktunya merupakan jadwal permintaan, bukan janji penghentian paksa.'],
            ['title' => 'Alur berlapis', 'task' => 'UnduhAsync memanggil BacaAsync yang memanggil GetAsync. Di mana token diberikan?', 'hint' => 'Sinyal perlu mencapai pekerjaan yang menunggu jaringan.', 'answer' => 'Terima token pada UnduhAsync dan BacaAsync, lalu teruskan token yang sama ke GetAsync. Jangan membuat sumber baru tanpa alasan karena dapat memutus hubungan dengan tombol pembatalan awal.'],
        ],
        'walkthrough' => [
            ['title' => 'Siapkan sinyal', 'explanation' => 'Sumber dibuat satu kali dan tokennya dibagikan kepada pemeriksaan serta Task.Delay. Token awal belum dibatalkan.'],
            ['title' => 'Selesaikan satu batch', 'explanation' => 'Batch pertama melewati pemeriksaan dan penantian, mencetak pesan, lalu memanggil Cancel untuk simulasi input pengguna.'],
            ['title' => 'Hentikan sebelum batch kedua', 'explanation' => 'Pemeriksaan berikutnya melempar OperationCanceledException. Catch memilih pesan pembatalan dan using membereskan sumber saat lingkup berakhir.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/standard/threading/cancellation-in-managed-threads',
        'sources' => [
            ['label' => 'Microsoft Learn: cooperative cancellation', 'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/threading/cancellation-in-managed-threads'],
            ['label' => 'Microsoft Learn: membatalkan berdasarkan waktu', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/asynchronous-programming/cancel-async-tasks-after-a-period-of-time'],
        ],
    ],
    [
        'id' => 'httpclient-api', 'stage' => 'lanjutan', 'title' => 'Membaca API dengan HttpClient',
        'summary' => 'Kirim request, periksa status HTTP, baca JSON, dan tangani layanan yang tidak tersedia.', 'minutes' => 75,
        'objectives' => ['Menjalankan server dan client sebagai dua proses.', 'Membedakan kegagalan transport, status HTTP, dan bentuk JSON.', 'Mengelola timeout serta masa hidup HttpClient.'],
        'sections' => [
            ['heading' => 'Siapkan dua proyek terpisah', 'body' => 'Prasyaratnya async, exception, JSON, dan Minimal API pada materi pilihan spesialisasi. Jalankan proyek HaloApi di terminal pertama pada http://localhost:5050. Pastikan Program.cs server memiliki app.MapGet("/api/buku", () => new[] { "Belajar C#", "Dasar .NET" }); sebelum app.Run(). Di terminal kedua buat dotnet new console -n PembacaApi -f net10.0, masuk ke foldernya, lalu ganti Program.cs dengan contoh. Server harus tetap hidup ketika client menjalankan dotnet run.'],
            ['heading' => 'Request memiliki tujuan dan kontrak', 'body' => 'HttpClient bertindak sebagai pemanggil layanan. BaseAddress menentukan alamat dasar, sedangkan GetAsync("api/buku") menambahkan rute relatif. Garis miring penutup pada alamat dasar sengaja dipakai agar penggabungan URL mudah dipahami. Kontrak endpoint latihan adalah GET yang menghasilkan array JSON berisi string. Bila endpoint server diubah menjadi objek dengan property data, model pembaca juga harus berubah. Kesamaan kata buku pada nama method tidak membuat kedua sisi otomatis menyepakati bentuk data.'],
            ['heading' => 'Periksa status sebelum membaca hasil', 'body' => 'Response HTTP mempunyai status, header, dan body. Status sukses berada dalam keluarga 2xx. EnsureSuccessStatusCode menolak respons di luar rentang itu melalui HttpRequestException. Respons 404 menunjukkan rute atau sumber tidak ditemukan; berbeda dengan kegagalan koneksi ketika server mati. Pada aplikasi yang perlu menangani 404 sebagai keadaan normal, periksa StatusCode dan pilih pesan sendiri sebelum memanggil pemeriksaan umum. Body kesalahan belum tentu memiliki bentuk yang sama dengan daftar buku.'],
            ['heading' => 'Deserialisasi juga memerlukan validasi', 'body' => 'ReadFromJsonAsync<string[]> menerjemahkan JSON menjadi array teks. JSON rusak dapat menimbulkan JsonException; JSON literal null dapat menghasilkan null tanpa berarti daftar kosong yang sah. Contoh menolak null agar kontrak yang rusak terlihat. Dalam produk nyata, validasi juga meliputi judul kosong, jumlah data yang wajar, dan field wajib. Berhasil menerima byte tidak sama dengan berhasil memperoleh data yang bisa dipakai. Pisahkan pesan jaringan, status, dan isi agar penyebab gangguan mudah ditelusuri.'],
            ['heading' => 'Batasi penantian dan gunakan kembali client', 'body' => 'Timeout pada contoh adalah lima detik supaya kesalahan tidak membuat latihan menunggu terlalu lama. OperationCanceledException menangkap penantian yang dibatalkan atau mencapai batas waktu. Program console membuat satu HttpClient untuk seluruh umur proses pendeknya. Pada aplikasi yang terus berjalan, gunakan client yang dipakai ulang dengan pengaturan handler yang sesuai atau IHttpClientFactory. Membuat serta membuang client pada setiap request berulang dapat mengganggu pengelolaan koneksi. Sesuaikan konfigurasi dengan cara aplikasi hidup, bukan hanya menyalin using ke setiap method.'],
            ['heading' => 'Latihan kegagalan lebih dari sekali', 'body' => 'Jalankan client saat server aktif untuk melihat dua judul. Hentikan server, jalankan client lagi, kemudian pulihkan server dan salahkan rutenya menjadi api/tidak-ada. Ketiga percobaan memberi informasi berbeda meskipun dua terakhir sama-sama tidak menghasilkan katalog. Jangan mencoba ulang semua request tanpa batas. Pengulangan GET perlu kebijakan jeda dan batas; mengulang operasi pembayaran atau penambahan data memerlukan rancangan idempotensi agar satu tindakan pengguna tidak menjadi beberapa perubahan. Contoh ini hanya membaca endpoint lokal.'],
        ],
        'analogy' => 'Client seperti pembaca yang menelepon meja informasi. Sambungan tersambung belum memastikan pertanyaannya dijawab; petugas dapat mengatakan raknya tidak ditemukan. Jawaban yang diterima juga harus memiliki bentuk yang dipahami. Berbeda dari percakapan manusia, aplikasi membutuhkan kontrak format dan kode status yang eksplisit.',
        'code' => <<<'CODE'
using System.Net.Http;
using System.Net.Http.Json;
using System.Text.Json;

using var client = new HttpClient
{
    BaseAddress = new Uri("http://localhost:5050/"),
    Timeout = TimeSpan.FromSeconds(5)
};

try
{
    using HttpResponseMessage respons = await client.GetAsync("api/buku");
    respons.EnsureSuccessStatusCode();
    string[] buku = await respons.Content.ReadFromJsonAsync<string[]>()
        ?? throw new JsonException("Daftar buku tidak boleh null.");

    Console.WriteLine($"Jumlah buku: {buku.Length}");
    foreach (string judul in buku)
        Console.WriteLine(judul);
}
catch (HttpRequestException)
{
    Console.WriteLine("Layanan gagal dihubungi atau status HTTP tidak sukses.");
}
catch (JsonException)
{
    Console.WriteLine("Bentuk data buku tidak sesuai kontrak.");
}
catch (OperationCanceledException)
{
    Console.WriteLine("Permintaan dibatalkan atau melewati batas waktu.");
}
CODE,
        'output' => "Dengan server dan endpoint sesuai petunjuk:\nJumlah buku: 2\nBelajar C#\nDasar .NET\nJika server mati, yang tampil adalah pesan kegagalan layanan, bukan daftar tersebut.",
        'exercise' => 'Ubah server agar mengembalikan tiga judul, lalu jalankan client ulang. Setelah berhasil, ubah respons menjadi new { data = new[] { "Buku" } }. Catat pesan yang terlihat tanpa mengubah model client.',
        'solution' => 'Array tiga judul menghasilkan Jumlah buku: 3 dan tiga baris judul. Ketika bentuk berubah menjadi objek, deserialisasi ke string[] tidak cocok dan masuk penanganan JsonException. Perbaiki kontrak pada kedua sisi atau buat model response yang memiliki property Data.',
        'takeaways' => ['HTTP sukses belum membuktikan JSON memenuhi kontrak.', 'Jalankan layanan dan pemanggil sebagai proses terpisah.', 'Umur HttpClient dan batas waktu perlu ditentukan dengan sengaja.'],
        'mistakes' => [
            ['title' => 'Mencetak sukses sebelum memeriksa status', 'body' => 'GetAsync bisa menghasilkan response 404 tanpa melempar pada saat pemanggilan. Periksa status sebelum memperlakukan body sebagai data sukses.'],
            ['title' => 'Membuat HttpClient di setiap putaran', 'body' => 'Pada proses yang melakukan banyak request, gunakan pengelolaan client yang sesuai. Menyalin konstruksi client ke loop bukan pola penggunaan ulang koneksi.'],
        ],
        'practice' => [
            ['title' => 'Data kosong yang sah', 'task' => 'Apa beda respons [] dengan null pada kontrak contoh?', 'hint' => 'Salah satunya tetap merupakan daftar.', 'answer' => '[] adalah array kosong yang menghasilkan jumlah nol. null ditolak karena server berjanji mengirim array; menyamakan keduanya akan menutupi pelanggaran kontrak.'],
            ['title' => 'Tambahkan tombol Batal', 'task' => 'Ke operasi mana token diteruskan jika client nanti memiliki pembatalan?', 'hint' => 'Ada pengiriman request dan pembacaan body.', 'answer' => 'Teruskan token ke overload GetAsync dan ReadFromJsonAsync yang menerima CancellationToken, lalu bedakan pembatalan pengguna dari timeout melalui status sumber yang dikelola aplikasi.'],
        ],
        'walkthrough' => [
            ['title' => 'Hubungi alamat lokal', 'explanation' => 'Client menggabungkan alamat dasar dengan api/buku dan menunggu response. Server menangani request pada proses terminal pertama.'],
            ['title' => 'Periksa dua lapisan', 'explanation' => 'Status HTTP diperiksa sebelum JSON diterjemahkan. Tipe string[] menyatakan bentuk body yang diminta oleh client.'],
            ['title' => 'Tampilkan atau jelaskan gangguan', 'explanation' => 'Data sah dicetak satu per satu; kesalahan transport, format JSON, atau pembatalan memilih pesan sesuai catch yang menangani penyebabnya.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/fundamentals/networking/http/httpclient',
        'sources' => [
            ['label' => 'Microsoft Learn: membuat request HTTP', 'url' => 'https://learn.microsoft.com/en-us/dotnet/fundamentals/networking/http/httpclient'],
            ['label' => 'Microsoft Learn: panduan masa hidup HttpClient', 'url' => 'https://learn.microsoft.com/en-us/dotnet/fundamentals/networking/http/httpclient-guidelines'],
        ],
    ],
    [
        'id' => 'proyek-pengeluaran', 'stage' => 'lanjutan', 'title' => 'Proyek: Pencatat Pengeluaran JSON',
        'summary' => 'Gabungkan validasi, penyimpanan, dan LINQ menjadi aplikasi console yang menyimpan data antarrun.', 'minutes' => 110,
        'objectives' => ['Membaca data sebelum menambahkan transaksi baru.', 'Menolak input serta file yang tidak valid.', 'Menyusun laporan kategori dan skenario penerimaan proyek.'],
        'sections' => [
            ['heading' => 'Bentuk proyek yang bisa diselesaikan', 'body' => 'Gunakan pengetahuan method, JSON, LINQ, dan exception. Buat dotnet new console -n CatatUang -f net10.0 lalu ganti Program.cs. Versi pertama mencatat kategori dan jumlah rupiah bulat dari argumen terminal, menyimpannya ke pengeluaran.json, dan menampilkan total kategori. Jalankan dotnet run tanpa argumen untuk melihat laporan. Jalankan dotnet run -- Makan 15000 untuk menambah satu catatan. Untuk kategori berisi spasi gunakan tanda kutip, misalnya "Transport Harian".'],
            ['heading' => 'Tuliskan aturan penerimaan', 'body' => 'Jumlah harus bilangan bulat positif; kategori tidak boleh kosong. Program menerima tepat dua argumen saat menambah, atau nol argumen saat membaca laporan. Angka nol tidak dianggap pengeluaran, sedangkan nilai negatif ditolak karena fitur pengembalian dana belum dirancang. Data uang menggunakan decimal agar penghitungan nominal tetap tepat untuk cakupan latihan. Penerimaan input sengaja memakai NumberStyles.None sehingga format seperti 15.000 atau 15,000 ditolak; masukkan 15000 tanpa pemisah. Petunjuk ini menghindari tafsir format yang berbeda antar komputer.'],
            ['heading' => 'Baca dahulu agar riwayat tidak terhapus', 'body' => 'Setiap eksekusi mencoba membaca file yang sudah ada. File yang belum ada berarti daftar baru, tetapi file rusak bukan daftar kosong. JSON yang tidak dapat dibaca, literal null, kategori kosong, dan jumlah tidak positif menghentikan alur. Program tidak menggantinya dengan daftar kosong lalu menyimpan ulang karena itu dapat menghapus riwayat yang sebenarnya masih dapat diperbaiki. Saat menemukan error, simpan salinan file dan periksa penyebabnya sebelum menjalankan alur penambahan kembali.'],
            ['heading' => 'Simpan hanya ketika ada perubahan', 'body' => 'Mode laporan tidak menulis file. Mode tambah memvalidasi argumen, menambahkan satu objek, lalu menulis daftar terbaru. Contoh menulis ke file sementara sebelum memindahkannya ke nama tujuan agar isi lama tidak langsung dibuka untuk penulisan bertahap. Langkah ini membantu pola latihan, tetapi bukan jaminan transaksi database atau perlindungan untuk banyak proses sekaligus. Jalankan hanya satu instance penulis. Untuk penggunaan bersama, identitas pengguna, konflik, backup, dan database perlu dirancang terpisah.'],
            ['heading' => 'Hitung laporan dari data yang tersimpan', 'body' => 'GroupBy mengumpulkan transaksi per kategori, kemudian Sum menghitung total tiap kelompok. StringComparer.OrdinalIgnoreCase menyatukan Makan dan makan tanpa mengubah seluruh nama yang dimasukkan pengguna. Spasi tepi dipangkas ketika input baru diterima. Urutan kategori dibuat eksplisit agar hasil mudah dibandingkan. Laporan bukan sumber data kedua: ia selalu dapat dihitung ulang dari transaksi. Dengan demikian memperbaiki satu transaksi nantinya cukup mengubah catatan asli, lalu membangun ulang ringkasan yang ditampilkan.'],
            ['heading' => 'Perluas dengan langkah yang terukur', 'body' => 'Setelah versi ini bekerja, tambahkan ID dan tanggal transaksi, perintah hapus berdasarkan ID, serta filter bulan. Jangan memakai posisi dalam list sebagai identitas permanen karena penghapusan menggeser indeks. Untuk laporan bulanan, tentukan bagaimana tanggal input ditafsirkan dan apa yang terjadi pada tanggal tidak valid. Skenario penerimaan harus mencakup penambahan, pembukaan ulang, input ditolak, dan file rusak. Dokumentasikan working directory karena path relatif mengikuti tempat proses dijalankan, bukan selalu lokasi file Program.cs.'],
        ],
        'analogy' => 'File transaksi seperti buku kas, sedangkan laporan kategori seperti menjumlahkan beberapa halaman dengan kalkulator. Buku kas rusak tidak boleh dianggap buku kosong. Namun file JSON tidak mempunyai petugas pengunci otomatis; dua penulis yang bekerja bersamaan dapat saling menimpa perubahan.',
        'code' => <<<'CODE'
using System.Globalization;
using System.Text.Json;

const string path = "pengeluaran.json";
try
{
    List<Pengeluaran> data = File.Exists(path)
        ? JsonSerializer.Deserialize<List<Pengeluaran>>(await File.ReadAllTextAsync(path))
            ?? throw new InvalidDataException("Isi file tidak boleh null.")
        : new List<Pengeluaran>();

    if (data.Any(p => p is null || string.IsNullOrWhiteSpace(p.Kategori) || p.Jumlah <= 0))
        throw new InvalidDataException("Ada transaksi yang tidak valid.");

    if (args.Length != 0)
    {
        if (args.Length != 2 || string.IsNullOrWhiteSpace(args[0]) ||
            !decimal.TryParse(args[1], NumberStyles.None, CultureInfo.InvariantCulture,
                out decimal jumlah) || jumlah <= 0)
        {
            Console.WriteLine("Gunakan: dotnet run -- Kategori 15000 (rupiah bulat positif)");
            return;
        }

        data.Add(new Pengeluaran(args[0].Trim(), jumlah));
        string json = JsonSerializer.Serialize(data, new JsonSerializerOptions { WriteIndented = true });
        await File.WriteAllTextAsync(path + ".tmp", json);
        File.Move(path + ".tmp", path, overwrite: true);
    }

    if (data.Count == 0)
        Console.WriteLine("Belum ada transaksi.");
    foreach (var kategori in data.GroupBy(p => p.Kategori, StringComparer.OrdinalIgnoreCase)
        .OrderBy(g => g.Key, StringComparer.OrdinalIgnoreCase))
        Console.WriteLine($"{kategori.Key}: {kategori.Sum(p => p.Jumlah):0}");
}
catch (Exception e) when (e is IOException or InvalidDataException or JsonException or UnauthorizedAccessException)
{
    Console.WriteLine($"Data tidak diproses: {e.Message}");
}

record Pengeluaran(string Kategori, decimal Jumlah);
CODE,
        'output' => "Pada folder tanpa data, dotnet run menampilkan: Belum ada transaksi.\nSetelah dotnet run -- Makan 15000: Makan: 15000\nKemudian dotnet run -- Makan 5000: Makan: 20000\nMenjalankan tanpa argumen lagi tetap menampilkan Makan: 20000.",
        'exercise' => 'Tambahkan Transport 10000 setelah dua transaksi contoh. Buka ulang laporan, lalu coba Makan -1000 dan pastikan total tidak berubah. Pada salinan folder latihan, rusakkan JSON dan pastikan program tidak mengganti isinya dengan daftar kosong.',
        'solution' => 'Laporan sah berisi Makan 20000 dan Transport 10000. Nilai negatif ditolak sebelum data ditambah. File rusak masuk penanganan JsonException dan alur berhenti; pulihkan salinan file yang benar sebelum menambah lagi. Jangan menguji kerusakan pada satu-satunya salinan data penting.',
        'takeaways' => ['Bedakan file belum ada dengan file tidak valid.', 'Tulis data hanya setelah semua input diterima.', 'File tunggal latihan memerlukan pembatasan satu penulis.'],
        'mistakes' => [
            ['title' => 'Selalu mengisi data contoh saat startup', 'body' => 'Menambahkan seed pada setiap run menggandakan transaksi. Startup harus membaca riwayat; penambahan perlu tindakan eksplisit pengguna.'],
            ['title' => 'Mengabaikan kesalahan baca', 'body' => 'Catch yang mengembalikan list kosong lalu menyimpannya dapat menghapus riwayat. Hentikan penulisan ketika sumber tidak dapat dipercaya.'],
        ],
        'practice' => [
            ['title' => 'Identitas transaksi', 'task' => 'Mengapa perintah hapus sebaiknya memakai ID, bukan nama kategori?', 'hint' => 'Banyak transaksi dapat memiliki kategori sama.', 'answer' => 'Kategori tidak unik. Tambahkan ID yang stabil pada tiap transaksi dan tampilkan ID saat membuat daftar detail agar pengguna memilih catatan yang tepat.'],
            ['title' => 'Laporan bulan tertentu', 'task' => 'Apa urutan operasi untuk laporan September 2026 setelah field Tanggal ditambah?', 'hint' => 'Kurangi cakupan sebelum merangkum.', 'answer' => 'Filter tanggal mulai 1 September sampai sebelum 1 Oktober 2026, lalu GroupBy kategori dan Sum jumlah. Data bulan lain tetap disimpan, hanya tidak disertakan dalam laporan tersebut.'],
        ],
        'walkthrough' => [
            ['title' => 'Pulihkan keadaan', 'explanation' => 'File dibaca menjadi list dan isinya diperiksa. Kegagalan pembacaan menghentikan proses sebelum perubahan data.'],
            ['title' => 'Terapkan satu perintah', 'explanation' => 'Nol argumen berarti laporan saja. Dua argumen valid berarti menambahkan satu transaksi dan menyimpan daftar terbaru.'],
            ['title' => 'Bangun laporan ulang', 'explanation' => 'Data dikelompokkan tanpa membedakan huruf besar kecil pada kategori, dijumlahkan, lalu diurutkan untuk tampilan yang dapat dibandingkan.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/standard/serialization/system-text-json/how-to',
        'sources' => [
            ['label' => 'Microsoft Learn: serialisasi System.Text.Json', 'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/serialization/system-text-json/how-to'],
            ['label' => 'Microsoft Learn: File.Move', 'url' => 'https://learn.microsoft.com/en-us/dotnet/api/system.io.file.move?view=net-10.0'],
            ['label' => 'Microsoft Learn: Decimal.TryParse', 'url' => 'https://learn.microsoft.com/en-us/dotnet/api/system.decimal.tryparse?view=net-10.0'],
        ],
    ],
    [
        'id' => 'sql-relasional', 'stage' => 'spesialisasi', 'title' => 'SQL, Relasi & Query Berparameter',
        'summary' => 'Kenali tabel, primary key, foreign key, dan parameter SQL melalui katalog buku SQLite.', 'minutes' => 80,
        'objectives' => ['Memodelkan hubungan kategori dengan banyak buku.', 'Membaca hasil join memakai Microsoft.Data.Sqlite.', 'Memisahkan teks perintah SQL dari nilai input.'],
        'sections' => [
            ['heading' => 'Prasyarat dan alat latihan', 'body' => 'Pahami class, koleksi, dan using untuk disposal. Buat dotnet new console -n RelasiBuku -f net10.0, masuk ke foldernya, lalu jalankan dotnet add package Microsoft.Data.Sqlite --version 10.0.12. Ganti Program.cs dengan contoh. Paket ini menyediakan akses SQLite dari C# tanpa harus menjalankan server database terpisah. Data Source=:memory: membuat database latihan di memori yang hanya hidup selama koneksi tetap terbuka. Setiap menjalankan ulang program, kita memulai database baru sehingga hasil contoh tidak bergantung pada percobaan sebelumnya.'],
            ['heading' => 'Pisahkan fakta berdasarkan pemiliknya', 'body' => 'Tabel Kategori menyimpan identitas kategori dan namanya. Tabel Buku menyimpan judul, harga, serta KategoriId. Satu kategori dapat dirujuk banyak buku, sehingga hubungan ini disebut satu-ke-banyak. Primary key mengenali satu baris secara unik. Foreign key menyatakan bahwa nilai KategoriId harus menunjuk kategori yang ada. Nama kategori disimpan sekali agar perbaikan ejaan tidak perlu dilakukan pada setiap buku. Pemisahan ini juga memaksa kita membedakan identitas yang stabil dari label yang dapat berubah.'],
            ['heading' => 'Constraint menjaga janji data', 'body' => 'NOT NULL melarang nilai yang tidak tersedia pada kolom tertentu, sementara CHECK(Harga >= 0) melarang harga negatif. Connection string contoh mengaktifkan pemeriksaan foreign key. Constraint database melengkapi validasi aplikasi karena data bisa masuk melalui lebih dari satu jalur. Namun NOT NULL tidak otomatis menolak judul berisi string kosong, sehingga aturan judul tetap perlu diperjelas. Jangan menganggap keberhasilan INSERT berarti semua aturan produk sudah terpenuhi; database hanya memeriksa aturan yang memang didefinisikan.'],
            ['heading' => 'Tulis query yang menjawab pertanyaan', 'body' => 'SELECT memilih kolom yang akan dibaca. JOIN menghubungkan Buku dan Kategori dengan kecocokan ID, WHERE membatasi harga minimum, sedangkan ORDER BY menentukan urutan. Alias b dan k membuat asal kolom mudah dikenali. Harga disimpan sebagai INTEGER rupiah bulat pada latihan ini, jadi pembacaan memakai GetInt64. Untuk pecahan mata uang atau database lain, tentukan representasi dan pembulatan dengan sengaja. Jangan menganggap semua provider menyimpan decimal C# memakai tipe database yang sama.'],
            ['heading' => 'Input adalah nilai, bukan potongan perintah', 'body' => 'Placeholder $minimum berada dalam SQL, sedangkan nilai 10000 dikirim lewat Parameters.AddWithValue. Database memperlakukan nilai parameter sebagai data. Hindari membentuk WHERE dari penggabungan string input pengguna, terutama untuk judul dan pencarian. Parameter tidak dapat dipakai untuk mengganti sembarang struktur SQL seperti nama tabel atau arah pengurutan. Jika pengguna memilih urutan, petakan pilihan yang dikenal ke beberapa teks SQL yang sudah ditentukan, bukan memasukkan nama kolom bebas ke query.'],
            ['heading' => 'Ketahui kapan membutuhkan transaksi', 'body' => 'Contoh hanya membuat data contoh lalu membaca. Ketika satu tindakan bisnis menulis beberapa perubahan yang harus berlaku bersama, gunakan transaksi: mulai transaksi, jalankan perintah dengan transaksi yang sama, lalu Commit setelah semua berhasil. Misalnya peminjaman harus membuat catatan dan memperbarui status buku; setengah perubahan dapat membuat keadaan membingungkan. Untuk proyek berkembang, rancang juga indeks sesuai pencarian dan perubahan skema yang dapat ditinjau. EF Core dapat membantu akses data, tetapi konsep relasi dan biaya query tetap diperlukan.'],
        ],
        'analogy' => 'Kategori seperti kartu rak dengan nomor tetap, dan setiap buku mencatat nomor rak itu. Mengubah nama rak tidak mengharuskan mengganti semua kartu buku. Batasnya, database tidak menebak hubungan dari kemiripan nama; key serta constraint harus ditulis dan diaktifkan dengan benar.',
        'code' => <<<'CODE'
using Microsoft.Data.Sqlite;

using var koneksi = new SqliteConnection("Data Source=:memory:;Foreign Keys=True");
koneksi.Open();

using (var siapkan = koneksi.CreateCommand())
{
    siapkan.CommandText = """
        CREATE TABLE Kategori (
            Id INTEGER PRIMARY KEY,
            Nama TEXT NOT NULL
        );
        CREATE TABLE Buku (
            Id INTEGER PRIMARY KEY,
            Judul TEXT NOT NULL,
            Harga INTEGER NOT NULL CHECK(Harga >= 0),
            KategoriId INTEGER NOT NULL REFERENCES Kategori(Id)
        );
        INSERT INTO Kategori (Id, Nama) VALUES (1, 'Pemrograman');
        INSERT INTO Buku (Id, Judul, Harga, KategoriId)
            VALUES (1, 'Belajar C#', 25000, 1), (2, 'Catatan SQL', 8000, 1);
        """;
    siapkan.ExecuteNonQuery();
}

using var query = koneksi.CreateCommand();
query.CommandText = """
    SELECT b.Judul, k.Nama, b.Harga
    FROM Buku AS b
    JOIN Kategori AS k ON k.Id = b.KategoriId
    WHERE b.Harga >= $minimum
    ORDER BY b.Harga DESC, b.Id;
    """;
query.Parameters.AddWithValue("$minimum", 10000);
using var hasil = query.ExecuteReader();
while (hasil.Read())
    Console.WriteLine($"{hasil.GetString(0)} | {hasil.GetString(1)} | {hasil.GetInt64(2)}");
CODE,
        'output' => 'Belajar C# | Pemrograman | 25000',
        'exercise' => 'Ubah parameter minimum menjadi 5000 dan prediksi dua baris keluarannya. Pada percobaan terpisah, ubah KategoriId salah satu INSERT menjadi 99. Jelaskan mengapa program ditolak ketika kategori itu belum dibuat.',
        'solution' => 'Dengan minimum 5000, Belajar C# 25000 tampil dahulu lalu Catatan SQL 8000, keduanya berkategori Pemrograman. KategoriId 99 melanggar foreign key dan menimbulkan SqliteException saat INSERT. Buat kategori yang sah atau tolak pilihan yang tidak terdaftar.',
        'takeaways' => ['Primary key mengenali baris; foreign key menyatakan hubungan.', 'Parameter memisahkan nilai input dari teks SQL.', 'Transaksi menjaga beberapa perubahan sebagai satu pekerjaan.'],
        'mistakes' => [
            ['title' => 'Menyimpan nama kategori berulang', 'body' => 'Nama yang disalin ke setiap buku mudah tidak konsisten ketika diperbarui. Gunakan ID untuk relasi jika kategori merupakan entitas yang dikelola sendiri.'],
            ['title' => 'Menggabungkan input langsung ke SQL', 'body' => 'Nilai pengguna sebaiknya dikirim sebagai parameter. Escape manual bukan pengganti pola parameter yang disediakan provider.'],
        ],
        'practice' => [
            ['title' => 'Jumlah buku per kategori', 'task' => 'Bagaimana menghitung kategori yang memiliki beberapa buku?', 'hint' => 'Gabungkan lalu kelompokkan menurut identitas kategori.', 'answer' => 'Gunakan JOIN, GROUP BY k.Id dan k.Nama, lalu COUNT untuk banyak buku. Jika kategori kosong juga harus tampil, gunakan LEFT JOIN dan COUNT(b.Id), bukan COUNT(*) tanpa memahami hasilnya.'],
            ['title' => 'Satu tindakan dua perubahan', 'task' => 'Mengapa menulis peminjaman dan mengurangi stok perlu dipertimbangkan dalam satu transaksi?', 'hint' => 'Bayangkan proses gagal setelah langkah pertama.', 'answer' => 'Tanpa satu kesatuan perubahan, catatan pinjam dapat ada sementara stok belum berubah. Transaksi memungkinkan seluruh perubahan disahkan bersama atau dibatalkan jika salah satunya gagal.'],
        ],
        'walkthrough' => [
            ['title' => 'Buat struktur', 'explanation' => 'Koneksi memori dibuka, dua tabel dibuat, lalu data kategori dan buku yang saling sesuai dimasukkan.'],
            ['title' => 'Jalankan pertanyaan berparameter', 'explanation' => 'Query menghubungkan ID kategori lalu menyaring harga mulai 10000. Nilai batas dikirim terpisah dari teks query.'],
            ['title' => 'Baca baris dan tutup sumber daya', 'explanation' => 'Reader maju satu baris per Read. Kolom dibaca sesuai urutan SELECT, kemudian using membuang reader, command, dan koneksi.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/standard/data/sqlite/',
        'sources' => [
            ['label' => 'Microsoft Learn: Microsoft.Data.Sqlite', 'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/data/sqlite/'],
            ['label' => 'Microsoft Learn: parameter SQLite', 'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/data/sqlite/parameters'],
            ['label' => 'Microsoft Learn: transaksi SQLite', 'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/data/sqlite/transactions'],
        ],
    ],
    [
        'id' => 'rest-crud', 'stage' => 'spesialisasi', 'title' => 'REST API: CRUD Katalog Buku',
        'summary' => 'Buat endpoint tambah, baca, ubah, dan hapus dengan validasi serta status HTTP yang sesuai.', 'minutes' => 100,
        'objectives' => ['Memetakan resource buku ke operasi HTTP.', 'Menangani 400, 404, 201, dan 204 secara sengaja.', 'Membedakan penyimpanan memori dengan API yang siap digunakan bersama.'],
        'sections' => [
            ['heading' => 'Siapkan server katalog', 'body' => 'Selesaikan materi Minimal API, Dictionary, dan record. Buat dotnet new web -n KatalogCrud -f net10.0, masuk ke foldernya, lalu ganti Program.cs dengan contoh. Jalankan dotnet run --urls http://localhost:5051. Port berbeda dari latihan HttpClient membantu mencegah benturan. Browser cukup untuk GET; gunakan terminal PowerShell dengan Invoke-RestMethod atau client HTTP untuk POST, PUT, dan DELETE. Katalog contoh dimulai dengan Buku Dasar pada ID 1 setiap kali proses server baru dijalankan.'],
            ['heading' => 'Resource memiliki identitas stabil', 'body' => 'Rute /api/buku mewakili koleksi, sedangkan /api/buku/1 mewakili satu buku. GET membaca tanpa sengaja mengubah data. POST ke koleksi membuat buku baru dan server memilih ID. PUT pada ID yang ada mengganti judul, sedangkan DELETE menghapus resource itu. Nama judul tidak dipakai sebagai ID karena dua buku bisa mempunyai judul sama dan judul dapat diperbaiki. Dengan identitas stabil, client tetap dapat menunjuk buku yang sama sesudah perubahan label.'],
            ['heading' => 'Buat arti setiap response jelas', 'body' => 'Penambahan sukses menghasilkan 201 Created, body buku baru, serta Location yang menunjuk alamatnya. GET dan PUT sukses memakai 200 dengan body. DELETE sukses memakai 204 tanpa body, sehingga client tidak boleh memaksa membaca JSON dari respons tersebut. ID yang tidak tersedia menghasilkan 404; judul kosong menghasilkan 400. Pemilihan kode ini membantu client menentukan tindakan berikutnya. Pesan detail untuk pengguna boleh dilokalkan, tetapi kontrak status dan bentuk body harus tetap konsisten.'],
            ['heading' => 'Validasi sebelum mengubah keadaan', 'body' => 'Record InputBuku hanya membawa Judul dari pengguna. Server memeriksa IsNullOrWhiteSpace dan memangkas spasi tepi sebelum menyimpan. Client tidak boleh memilih ID baru lewat payload ini. Route constraint :int memastikan jalur berbentuk angka untuk handler terkait, tetapi itu belum membuktikan ID ada. Validasi sisi browser dapat membuat pengalaman lebih nyaman; server tetap harus memeriksa karena request juga dapat dikirim dari terminal atau aplikasi lain. Input yang ditolak tidak boleh mengubah jumlah buku.'],
            ['heading' => 'Pahami state memori dan request bersamaan', 'body' => 'Dictionary digunakan agar contoh tidak memerlukan database, dan lock menjaga akses state bersama dalam satu proses. Penambahan ID serta penyimpanan dilakukan dalam blok yang sama. GET koleksi membuat array snapshot sebelum respons diserialisasi. Pola kecil ini bukan pengganti desain penyimpanan untuk aplikasi terdistribusi. Restart server menghilangkan perubahan, dua instance server memiliki katalog terpisah, dan lock tidak berfungsi sebagai transaksi lintas mesin. Gunakan database ketika kebutuhan mencakup persistensi atau banyak instance.'],
            ['heading' => 'Verifikasi kontrak dengan urutan nyata', 'body' => 'Baca daftar awal, tambahkan satu buku, baca ID hasil penambahan, ubah judul, hapus, lalu pastikan GET ID tersebut menjadi 404. Kirim judul spasi dan pastikan daftar tidak bertambah. Kirim DELETE kedua kali: respons boleh 404 pada kontrak ini karena resource sudah tidak ada. Idempotensi berkaitan dengan efek akhir pengulangan, bukan kewajiban semua respons identik. Sebelum memakai API untuk data pribadi, tambahkan autentikasi, otorisasi per resource, penyimpanan, logging yang sesuai, dan pengujian integrasi berdasarkan kebutuhan produk.'],
        ],
        'analogy' => 'API seperti meja perpustakaan dengan formulir berbeda untuk melihat, menambah, memperbaiki, dan menghapus kartu katalog. Nomor kartu tetap mengenali buku meskipun judul diperbaiki. Petugas tidak boleh menganggap setiap pengunjung berhak menghapus kartu; aturan akses merupakan bagian terpisah yang belum dibuat pada latihan lokal ini.',
        'code' => <<<'CODE'
var builder = WebApplication.CreateBuilder(args);
var app = builder.Build();
var data = new Dictionary<int, Buku> { [1] = new(1, "Buku Dasar") };
var gerbang = new object();
int nomorTerakhir = 1;

app.MapGet("/api/buku", () =>
{
    lock (gerbang) return Results.Ok(data.Values.OrderBy(b => b.Id).ToArray());
});
app.MapGet("/api/buku/{id:int}", (int id) =>
{
    lock (gerbang)
        return data.TryGetValue(id, out var buku) ? Results.Ok(buku) : Results.NotFound();
});
app.MapPost("/api/buku", (InputBuku input) =>
{
    if (string.IsNullOrWhiteSpace(input.Judul))
        return Results.BadRequest(new { pesan = "Judul wajib diisi." });
    lock (gerbang)
    {
        var buku = new Buku(++nomorTerakhir, input.Judul.Trim());
        data.Add(buku.Id, buku);
        return Results.Created($"/api/buku/{buku.Id}", buku);
    }
});
app.MapPut("/api/buku/{id:int}", (int id, InputBuku input) =>
{
    if (string.IsNullOrWhiteSpace(input.Judul))
        return Results.BadRequest(new { pesan = "Judul wajib diisi." });
    lock (gerbang)
    {
        if (!data.ContainsKey(id)) return Results.NotFound();
        var buku = new Buku(id, input.Judul.Trim());
        data[id] = buku;
        return Results.Ok(buku);
    }
});
app.MapDelete("/api/buku/{id:int}", (int id) =>
{
    lock (gerbang)
        return data.Remove(id) ? Results.NoContent() : Results.NotFound();
});
app.Run();

record Buku(int Id, string Judul);
record InputBuku(string? Judul);
CODE,
        'output' => 'Pada proses baru, GET http://localhost:5051/api/buku menghasilkan [{"id":1,"judul":"Buku Dasar"}]. POST body {"judul":"Belajar API"} dengan Content-Type application/json menghasilkan 201, Location /api/buku/2, dan body {"id":2,"judul":"Belajar API"}. Terminal server juga menampilkan log.',
        'exercise' => 'Di PowerShell, jalankan Invoke-RestMethod -Uri http://localhost:5051/api/buku -Method Post -ContentType application/json -Body \'{"judul":"Belajar API"}\'. Ubah buku hasilnya lewat PUT, lalu hapus melalui DELETE dan baca ID yang sama lagi.',
        'solution' => 'Ganti Method menjadi Put dan Uri menjadi /api/buku/2 dengan body judul baru. Untuk menghapus gunakan Method Delete ke URI yang sama tanpa body. GET berikutnya menghasilkan 404 dan PowerShell dapat menampilkannya sebagai error HTTP; itu hasil yang diharapkan untuk buku yang sudah dihapus.',
        'takeaways' => ['Rute dan metode HTTP bersama-sama menentukan operasi.', 'Status serta body adalah bagian kontrak client-server.', 'State memori hilang saat restart dan belum mendukung beberapa server.'],
        'mistakes' => [
            ['title' => 'GET dipakai untuk menghapus', 'body' => 'Pembacaan dapat diulang oleh browser atau perantara. Gunakan metode yang sesuai dan jangan memberi GET efek perubahan data yang tidak diharapkan.'],
            ['title' => 'Mengembalikan 200 untuk semua keadaan', 'body' => 'Client sulit membedakan input ditolak, resource hilang, dan sukses bila semua diberi status sama. Pilih kode sesuai kontrak dan uji setiap jalur.'],
        ],
        'practice' => [
            ['title' => 'Judul kosong', 'task' => 'Apa yang harus terjadi setelah POST dengan judul berisi tiga spasi?', 'hint' => 'Perhatikan letak validasi dibanding perubahan nomor.', 'answer' => 'Server mengembalikan 400 sebelum nomor bertambah atau data disimpan. GET daftar tetap menunjukkan isi sebelum request ditolak.'],
            ['title' => 'Restart server', 'task' => 'Apakah buku ID 2 yang ditambah masih ada setelah Ctrl+C lalu menjalankan ulang?', 'hint' => 'Tempat penyimpanannya adalah Dictionary proses.', 'answer' => 'Tidak. Program membuat ulang data awal dengan ID 1. Persistensi perlu database atau penyimpanan lain; keberhasilan POST tidak menjamin data bertahan sesudah proses berakhir.'],
        ],
        'walkthrough' => [
            ['title' => 'Cocokkan request', 'explanation' => 'Server memilih handler berdasarkan metode, rute, dan parameter. GET koleksi berbeda dari GET satu ID.'],
            ['title' => 'Validasi dan ubah keadaan', 'explanation' => 'POST serta PUT menolak judul tidak layak. Akses Dictionary dan nomor berikutnya dilindungi lock dalam proses contoh.'],
            ['title' => 'Kirim kontrak respons', 'explanation' => 'Handler mengembalikan Results sesuai hasil: Created, Ok, BadRequest, NotFound, atau NoContent. Client membaca status sebelum body.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/aspnet/core/fundamentals/minimal-apis/route-handlers?view=aspnetcore-10.0',
        'sources' => [
            ['label' => 'Microsoft Learn: route handler Minimal API', 'url' => 'https://learn.microsoft.com/en-us/aspnet/core/fundamentals/minimal-apis/route-handlers?view=aspnetcore-10.0'],
            ['label' => 'Microsoft Learn: respons Minimal API', 'url' => 'https://learn.microsoft.com/en-us/aspnet/core/fundamentals/minimal-apis/responses?view=aspnetcore-10.0'],
        ],
    ],
    [
        'id' => 'dependency-injection', 'stage' => 'spesialisasi', 'title' => 'DI Container & Service Lifetime',
        'summary' => 'Amati perbedaan singleton, scoped, dan transient melalui dua request API.', 'minutes' => 75,
        'objectives' => ['Mendaftarkan layanan pada container ASP.NET Core.', 'Menggunakan constructor injection pada layanan yang bergantung layanan lain.', 'Memilih lifetime sesuai state dan lingkup pemakaian.'],
        'sections' => [
            ['heading' => 'Lanjutkan dari constructor injection', 'body' => 'Baca materi design pattern dan Minimal API. Buat proyek baru dengan dotnet new web -n LatihanLifetime -f net10.0, lalu ganti Program.cs dan jalankan dotnet run --urls http://localhost:5052. Container membantu merakit objek beserta dependensinya setelah kita mendaftarkan aturan. Tujuan latihan adalah melihat identitas objek yang dibagikan, bukan menambah interface sebanyak mungkin. Buka /api/masa-hidup dua kali dan bandingkan nilai aplikasi serta permintaan pada kedua respons.'],
            ['heading' => 'Registrasi menyatakan cara memperoleh layanan', 'body' => 'builder.Services menerima pendaftaran sebelum builder.Build. AddScoped<Laporan> memberi tahu container bahwa Laporan dapat dibuat pada sebuah scope. Constructor Laporan meminta PenandaRequest; container mencari pendaftaran tipe itu, membuat atau menggunakan instance yang sesuai, kemudian menyerahkannya. Endpoint tidak perlu memanggil new Laporan dan merakit dependensinya sendiri. Jika ada dependensi yang belum terdaftar, perbaiki registrasinya di tempat penyusunan aplikasi. Jangan menyelesaikan error dengan membuat objek tersembunyi di dalam semua layanan.'],
            ['heading' => 'Singleton bertahan sepanjang container hidup', 'body' => 'PenandaAplikasi didaftarkan sebagai singleton. Identitasnya sama untuk request berbeda selama proses dan container yang sama masih hidup. Restart membuat identitas baru. State pada singleton dapat dipakai beberapa request secara bersamaan sehingga perubahan harus dirancang dengan aman. Jangan menyimpan pengguna yang sedang login atau data request pada singleton. Nilai tetap seperti konfigurasi yang aman dibagikan berbeda dari variabel sementara yang artinya hanya benar bagi satu permintaan. Satu instance bukan otomatis solusi performa yang tepat.'],
            ['heading' => 'Scoped mengikuti lingkup pekerjaan', 'body' => 'ASP.NET Core membuat scope untuk setiap request. PenandaRequest yang diterima langsung oleh endpoint sama dengan yang diterima Laporan melalui constructor karena keduanya diselesaikan dalam scope tersebut. Pada request berikutnya, identitasnya berbeda. Di aplikasi console, scope perlu dibuat dengan sengaja bila ingin memakai pola sejenis; istilah scoped tidak berarti otomatis satu pengguna atau satu sesi login. DbContext umumnya digunakan per unit kerja yang sesuai, dan tidak boleh dipakai bersamaan pada operasi paralel hanya karena ia tersedia lewat DI.'],
            ['heading' => 'Transient dibuat pada setiap resolusi', 'body' => 'Dua pemanggilan GetRequiredService<PenandaSementara> menghasilkan dua objek berbeda. Endpoint memakai IServiceProvider hanya untuk memperagakan resolusi berulang dan membandingkan referensi. Untuk aturan bisnis sehari-hari, constructor injection membuat kebutuhan objek lebih terlihat dibanding mengambil layanan sembarangan melalui provider. Transient bukan berarti objek langsung hilang setelah satu baris; pemanggil tetap dapat memegang referensinya. Lifetime menjelaskan kebijakan pembuatan dan pengelolaan, sedangkan jangkauan referensi dalam kode tetap memengaruhi berapa lama objek digunakan.'],
            ['heading' => 'Hindari dependensi yang hidup terlalu lama', 'body' => 'Singleton tidak boleh langsung menangkap layanan scoped lalu memakainya untuk semua request. Umur keduanya tidak cocok: sesuatu yang dirancang singkat dapat tertahan selama aplikasi. Jika pekerjaan latar perlu scope, buat scope eksplisit untuk satu unit pekerjaan dan buang setelah selesai. Serahkan disposal layanan yang dibuat container kepada container sesuai lifetimenya. Uji rancangan dengan dua request dan dua pengguna berbeda, bukan hanya satu respons berhasil. Nilai yang terus berubah atau justru tidak berubah sering memperlihatkan pilihan lifetime yang keliru.'],
        ],
        'analogy' => 'Singleton seperti papan informasi kantor, scoped seperti map untuk satu kunjungan, dan transient seperti lembar kerja baru setiap kali diminta. Menaruh map kunjungan di papan bersama membuat batas pemilik data kabur. Analogi ini tidak menjamin keamanan konkurensi; kode tetap harus mengatur akses state bersama.',
        'code' => <<<'CODE'
var builder = WebApplication.CreateBuilder(args);
builder.Services.AddSingleton<PenandaAplikasi>();
builder.Services.AddScoped<PenandaRequest>();
builder.Services.AddScoped<Laporan>();
builder.Services.AddTransient<PenandaSementara>();
var app = builder.Build();

app.MapGet("/api/masa-hidup", (PenandaAplikasi aplikasi,
    PenandaRequest permintaan, Laporan laporan, IServiceProvider layanan) =>
{
    var a = layanan.GetRequiredService<PenandaSementara>();
    var b = layanan.GetRequiredService<PenandaSementara>();
    return new
    {
        aplikasi = aplikasi.Id,
        permintaan = permintaan.Id,
        scopeSama = ReferenceEquals(permintaan, laporan.Penanda),
        transientSama = ReferenceEquals(a, b)
    };
});
app.Run();

class PenandaAplikasi { public Guid Id { get; } = Guid.NewGuid(); }
class PenandaRequest { public Guid Id { get; } = Guid.NewGuid(); }
class PenandaSementara { }
class Laporan
{
    public PenandaRequest Penanda { get; }
    public Laporan(PenandaRequest penanda) => Penanda = penanda;
}
CODE,
        'output' => 'GET http://localhost:5052/api/masa-hidup menghasilkan JSON dengan aplikasi dan permintaan berupa GUID, scopeSama: true, serta transientSama: false. Pada GET berikutnya dalam proses yang sama, aplikasi tetap dan permintaan berubah. Nilai GUID spesifik berbeda pada setiap proses.',
        'exercise' => 'Ubah PenandaRequest dari AddScoped menjadi AddTransient dan bandingkan scopeSama. Kembalikan scoped setelah memahami hasil. Lalu restart server dan periksa apakah GUID aplikasi masih sama.',
        'solution' => 'Dengan transient, endpoint dan constructor Laporan menerima instance PenandaRequest yang berbeda, sehingga scopeSama menjadi false. Setelah kembali scoped, keduanya sama per request. Restart membuat container baru dan GUID aplikasi baru walaupun lifetimenya singleton.',
        'takeaways' => ['Constructor menyatakan kebutuhan layanan.', 'Scoped ASP.NET Core biasanya satu instance per request.', 'Singleton tidak berarti satu objek untuk semua proses di dunia.'],
        'mistakes' => [
            ['title' => 'Scoped dianggap satu akun', 'body' => 'Dua request akun yang sama tetap memiliki scope berbeda. Sesi pengguna membutuhkan rancangan tersendiri dan tidak diwakili scoped secara otomatis.'],
            ['title' => 'Singleton menangkap state request', 'body' => 'Data sementara dapat tertahan dan dibagikan ke request lain. Pilih lifetime yang cocok dan jangan langsung menginjeksi scoped ke singleton.'],
        ],
        'practice' => [
            ['title' => 'Aturan harga tanpa state', 'task' => 'Apakah setiap class perhitungan harus memiliki interface dan lifetime khusus?', 'hint' => 'Mulai dari kebutuhan pengujian serta variasi nyata.', 'answer' => 'Tidak. Fungsi sederhana dapat tetap sederhana. DI bermanfaat ketika ada dependensi atau kebijakan pembuatan yang perlu dikelola; interface bukan kewajiban untuk semua class.'],
            ['title' => 'Dua server', 'task' => 'Apakah PenandaAplikasi pada dua proses server pasti sama?', 'hint' => 'Masing-masing proses membangun containernya sendiri.', 'answer' => 'Tidak. Singleton berlaku pada satu container. State yang harus dibagikan antarmesin memerlukan penyimpanan atau layanan bersama yang dirancang untuk itu.'],
        ],
        'walkthrough' => [
            ['title' => 'Daftarkan kebijakan', 'explanation' => 'Setiap tipe diberi lifetime sebelum aplikasi dibangun. Container mempunyai aturan untuk merakit Laporan dan dependensinya.'],
            ['title' => 'Buat scope request', 'explanation' => 'Request menerima satu PenandaRequest yang juga dipakai constructor Laporan. Dua resolusi transient tetap membuat objek baru.'],
            ['title' => 'Bandingkan lintas request', 'explanation' => 'ID aplikasi bertahan, ID request berubah, dan kedua nilai perbandingan menjelaskan pembagian instance dalam satu respons.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/overview',
        'sources' => [
            ['label' => 'Microsoft Learn: dependency injection', 'url' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/overview'],
            ['label' => 'Microsoft Learn: service lifetimes', 'url' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/service-lifetimes'],
        ],
    ],
    [
        'id' => 'blazor-pertama', 'stage' => 'spesialisasi', 'title' => 'Blazor: Komponen Target Belajar',
        'summary' => 'Buat halaman interaktif dengan state C#, event tombol, dan indikator target harian.', 'minutes' => 85,
        'objectives' => ['Membuat komponen Razor yang mempunyai rute.', 'Menghubungkan event pengguna dengan perubahan state.', 'Memahami perbedaan render statis dan Interactive Server.'],
        'sections' => [
            ['heading' => 'Siapkan proyek Blazor Web App', 'body' => 'Pelajari dasar C#, HTML, dan event. Jalankan dotnet new blazor -n BelajarBlazor -f net10.0 --interactivity Server lalu masuk ke foldernya. Buat file Components/Pages/Target.razor dan isi dengan contoh lengkap di bawah. Jalankan dotnet run lalu buka alamat yang ditampilkan terminal dengan tambahan /target. Jangan meletakkan kode Razor ke Program.cs. Template tersebut sudah menyiapkan layanan dan endpoint untuk mode interaktif server; komponen latihan memilih mode itu melalui directive @rendermode.'],
            ['heading' => 'Komponen menyatukan tampilan dan perilaku', 'body' => 'File .razor memuat markup yang dilihat pengguna serta blok @code berisi state dan method C#. Directive @page memberi alamat bagi komponen. Variabel selesai menyimpan jumlah sesi yang dicatat selama instance komponen hidup. Interpolasi @selesai menampilkan nilai tersebut dalam markup. Ketika angka berubah melalui event Blazor, framework memperbarui tampilan terkait. Kita tidak perlu mencari elemen DOM dan mengganti teks secara manual untuk setiap perubahan sederhana ini.'],
            ['heading' => 'Event adalah pintu perubahan state', 'body' => '@onclick menghubungkan klik ke method Tambah atau Reset. Tombol tambah dinonaktifkan ketika target tercapai, dan method Tambah tetap memeriksa batas sebelum menaikkan nilai. Pemeriksaan pada dua tempat memiliki tujuan berbeda: disabled memberi petunjuk antarmuka, sedangkan kondisi method menjaga aturan perhitungan. Coba tombol dengan keyboard memakai Tab dan Enter. Jangan mengandalkan gerakan atau warna saja untuk menyatakan selesai; teks dan progress element memberi hasil yang dapat dibaca secara jelas.'],
            ['heading' => 'Pilih mode render yang mendukung kebutuhan', 'body' => 'Markup statis dapat terlihat benar tanpa event C# yang aktif. InteractiveServer membuat interaksi komponen dijalankan di server melalui koneksi yang dikelola Blazor. Ini berbeda dari mengunduh seluruh runtime aplikasi ke browser dalam model WebAssembly. Pada latihan ini, server perlu tetap berjalan dan koneksi memengaruhi respons tombol. Mode render merupakan pilihan arsitektur yang berkaitan dengan lokasi eksekusi, koneksi, dan data; bukan sekadar cara membuat tombol mempunyai warna aktif.'],
            ['heading' => 'Bedakan state tampilan dan data permanen', 'body' => 'Nilai selesai berada di field komponen. Refresh halaman membuat instance baru dalam alur biasa, sehingga nilai kembali nol. Tombol Reset mengubah state yang sama tanpa menyimpan riwayat ke database. Untuk target belajar pribadi yang bertahan antarsesi, tentukan identitas pengguna, tanggal pencatatan, dan tempat penyimpanan. Jangan menjadikan satu layanan singleton sebagai tempat menyimpan progres semua pengguna. Mulailah dengan satu keputusan sederhana: progres ini hanya demonstrasi sementara atau catatan yang benar-benar ingin dipertahankan.'],
            ['heading' => 'Bangun komponen berikutnya dari kontrak kecil', 'body' => 'Setelah berhasil, pisahkan tampilan progress menjadi komponen anak yang menerima nilai selesai dan target sebagai parameter. Komponen induk dapat tetap memiliki state dan menangani perubahan. Untuk komunikasi balik, pelajari EventCallback agar kepemilikan data tidak tersebar tanpa aturan. Jika tombol nanti memanggil API async, gunakan handler yang mengembalikan Task, status sedang memuat, dan pesan kesalahan yang dapat ditindaklanjuti. Hindari async void untuk handler async biasa karena alur exception dan penyelesaiannya lebih sulit diikuti.'],
        ],
        'analogy' => 'Komponen seperti papan target di ruang belajar: angka di papan berasal dari catatan state, dan tombol menjadi tindakan yang mengubah catatan. Menghapus tampilan tidak otomatis menyimpan sejarah. Pada Interactive Server, petugas yang mengubah catatan berada di server, jadi hubungan ke server tetap diperlukan.',
        'code' => <<<'CODE'
@page "/target"
@rendermode InteractiveServer

<PageTitle>Target Belajar</PageTitle>
<h1>Target belajar hari ini</h1>
<p id="status-target" aria-live="polite">@selesai dari @BatasTarget sesi selesai.</p>
<progress value="@selesai" max="@BatasTarget" aria-label="Progres target belajar">
    @selesai dari @BatasTarget
</progress>
<div class="mt-3">
    <button class="btn btn-primary" @onclick="Tambah" disabled="@(selesai >= BatasTarget)">
        Selesaikan satu sesi
    </button>
    <button class="btn btn-outline-secondary" @onclick="Reset" disabled="@(selesai == 0)">
        Mulai ulang
    </button>
</div>
@if (selesai == BatasTarget)
{
    <p class="mt-3">Target tercapai. Catat satu hal baru yang kamu pahami.</p>
}

@code {
    private const int BatasTarget = 5;
    private int selesai;

    private void Tambah()
    {
        if (selesai < BatasTarget)
            selesai++;
    }

    private void Reset() => selesai = 0;
}
CODE,
        'output' => 'Halaman /target mula-mula menampilkan 0 dari 5 sesi selesai. Setiap klik menambah satu dan mengubah progress. Pada nilai 5 tombol tambah tidak aktif dan pesan target tercapai muncul. Mulai ulang mengembalikan nilai ke 0. Ini hasil antarmuka browser, bukan keluaran Console.WriteLine.',
        'exercise' => 'Tambahkan tombol Kurangi satu dengan batas minimum nol. Jalankan urutan tambah dua kali, kurangi tiga kali, lalu tambah sampai target. Pastikan state tidak keluar dari rentang 0 sampai 5.',
        'solution' => 'Buat method Kurangi yang menjalankan selesai-- hanya ketika selesai > 0. Hubungkan lewat @onclick dan nonaktifkan tombol ketika selesai == 0. Percobaan dua tambah lalu tiga kurangi berakhir di nol; klik pengurangan terakhir tidak mengubah nilai.',
        'takeaways' => ['Komponen Razor dapat memuat markup, state, dan event.', 'Interaktivitas memerlukan konfigurasi mode render yang sesuai.', 'Field komponen tidak otomatis menjadi penyimpanan permanen.'],
        'mistakes' => [
            ['title' => 'Tampilan ada tetapi klik tidak bekerja', 'body' => 'Periksa mode render serta layanan interaktif dari template. Komponen yang dirender statis dapat tampil benar tanpa menjalankan handler interaktif.'],
            ['title' => 'Progress dianggap tersimpan', 'body' => 'Nilai field sementara dapat hilang ketika komponen dibuat ulang. Tambahkan persistence secara sengaja jika pengguna berharap progres bertahan.'],
        ],
        'practice' => [
            ['title' => 'Cegah klik ganda saat menyimpan', 'task' => 'Jika Tambah nanti menyimpan lewat HTTP, state tambahan apa yang membantu?', 'hint' => 'Tindakan async dapat belum selesai ketika tombol ditekan lagi.', 'answer' => 'Gunakan bool sedangMenyimpan untuk menonaktifkan tindakan terkait dan tampilkan status. Handler mengembalikan Task, memakai try/finally untuk memulihkan state, serta memberi pesan bila penyimpanan gagal.'],
            ['title' => 'Komponen anak', 'task' => 'Siapa yang sebaiknya memiliki nilai utama jika dua komponen menampilkan progres yang sama?', 'hint' => 'Hindari dua salinan angka yang berubah sendiri-sendiri.', 'answer' => 'Letakkan state pada induk atau layanan dengan scope yang sesuai, teruskan nilai ke anak, dan kirim permintaan perubahan kembali melalui callback. Tentukan satu pemilik agar angka konsisten.'],
        ],
        'walkthrough' => [
            ['title' => 'Render nilai awal', 'explanation' => 'Route membuka Target.razor, selesai dimulai dari nol, dan markup menampilkan nilai awal bersama batas target lima.'],
            ['title' => 'Terima event', 'explanation' => 'Klik memanggil Tambah di sisi server pada mode yang dipilih. Method memeriksa batas lalu menaikkan state komponen.'],
            ['title' => 'Perbarui tampilan', 'explanation' => 'Blazor merender perubahan angka, progress, status disabled, dan pesan pencapaian berdasarkan state terbaru.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/aspnet/core/blazor/components/event-handling?view=aspnetcore-10.0',
        'sources' => [
            ['label' => 'Microsoft Learn: event Blazor', 'url' => 'https://learn.microsoft.com/en-us/aspnet/core/blazor/components/event-handling?view=aspnetcore-10.0'],
            ['label' => 'Microsoft Learn: render modes', 'url' => 'https://learn.microsoft.com/en-us/aspnet/core/blazor/components/render-modes?view=aspnetcore-10.0'],
            ['label' => 'Microsoft Learn: alat Blazor', 'url' => 'https://learn.microsoft.com/en-us/aspnet/core/blazor/tooling?view=aspnetcore-10.0'],
        ],
    ],
    [
        'id' => 'unity-pertama', 'stage' => 'spesialisasi', 'title' => 'Unity: Koin Berputar & Game Loop',
        'summary' => 'Pasang script C# pada objek 3D dan buat gerakan berdasarkan waktu, bukan banyaknya frame.', 'minutes' => 90,
        'objectives' => ['Membedakan GameObject, component, dan asset script.', 'Menggunakan Update dan Time.deltaTime untuk animasi transform.', 'Mengenali kapan simulasi physics memerlukan alur berbeda.'],
        'sections' => [
            ['heading' => 'Siapkan editor dan scene pertama', 'body' => 'Prasyaratnya class, field, method, dan bilangan pecahan. Pasang Unity Hub lalu editor Unity 6 yang sesuai panduan resmi, kemudian buat proyek 3D. Versi bahasa dan API C# Unity mengikuti dukungan editor tersebut; jangan menganggap semua fitur .NET 10 tersedia di dalam Unity. Contoh ini memakai API dasar Unity dan sintaks C# sederhana. Buat Cube melalui menu GameObject > 3D Object > Cube, beri nama Koin, dan letakkan pada posisi 0, 0, 0.'],
            ['heading' => 'Objek scene memperoleh perilaku dari component', 'body' => 'GameObject merupakan wadah component. Transform menyimpan posisi, rotasi, dan skala; Mesh Renderer membuat bentuknya terlihat. Asset script belum melakukan apa-apa hanya karena tersimpan di Project. Buat file KoinBerputar.cs, ganti seluruh isinya dengan kode di bawah, tunggu kompilasi selesai, lalu seret script ke objek Koin pada Hierarchy atau gunakan Add Component. Nama class dan nama file harus sesuai agar Unity dapat memasangkannya dengan benar. Periksa Inspector untuk memastikan component tampil pada objek yang dimaksud.'],
            ['heading' => 'Atur bentuk dan kamera agar hasil terlihat', 'body' => 'Ubah skala Koin menjadi 1, 1, 0.2 agar perubahan arah mudah terlihat seperti keping tipis. Pastikan ada kamera yang menghadap ke objek dan pencahayaan yang cukup; scene 3D baru biasanya menyediakan kamera serta lampu awal. Tekan Play dan amati tab Game, bukan hanya Scene. Jika objek tidak tampak, periksa posisinya terhadap kamera sebelum mengubah logika script. Error Console yang merah perlu diselesaikan karena kompilasi gagal dapat mencegah perilaku baru berjalan.'],
            ['heading' => 'Update mengikuti frame, kecepatan mengikuti waktu', 'body' => 'Unity memanggil Update tiap frame ketika component aktif. Banyaknya frame per detik dapat berbeda antar komputer dan berubah selama permainan. Jika kita memutar satu derajat setiap Update, komputer dengan lebih banyak frame akan memutar lebih cepat. derajatPerDetik dikalikan Time.deltaTime menghasilkan perkiraan sudut untuk durasi frame tersebut. Pada 90 derajat per detik, seperempat putaran membutuhkan sekitar satu detik selama waktu game berjalan normal. Pengukuran tidak perlu persis satu detik pada setiap frame untuk memahami prinsipnya.'],
            ['heading' => 'Bedakan gerakan visual dan simulasi physics', 'body' => 'Contoh hanya memutar Transform objek dekoratif, tanpa Rigidbody. Space.World memilih sumbu dunia sehingga Vector3.up berarti arah atas dunia. Bila nanti objek menggunakan Rigidbody untuk gaya dan tabrakan, pelajari pola physics dan FixedUpdate; jangan memindahkan semua kode ke FixedUpdate tanpa memahami tujuannya. FixedUpdate mengikuti langkah waktu simulasi dan dapat terjadi nol atau beberapa kali di antara frame tampilan. Memutar dekorasi serta menggerakkan benda yang harus mematuhi physics merupakan dua masalah yang perlu dirancang berbeda.'],
            ['heading' => 'Gunakan Inspector sebagai alat eksperimen', 'body' => 'SerializeField memperlihatkan field privat yang didukung serialisasi pada Inspector. Ubah Derajat Per Detik menjadi 45, 90, lalu 180 selama percobaan untuk membandingkan waktu satu putaran. Matikan Berputar untuk menghentikan animasi tanpa menghapus component. Perubahan scene biasa saat Play umumnya kembali ketika Play dihentikan; ubah nilai di luar Play jika ingin menyimpan pengaturan scene. Setelah latihan ini, proyek berikutnya dapat menambahkan pemain, collider koin, skor, dan reset scene dengan satu tanggung jawab yang jelas per component.'],
        ],
        'analogy' => 'GameObject seperti boneka panggung, component seperti mekanisme yang dipasang, dan Update seperti kesempatan memperbarui pose pada tiap bingkai. Waktu antarbingkai tidak selalu sama, sehingga langkah gerak perlu mengikuti waktu. Panggung nyata tidak memiliki callback otomatis; hubungan component dengan engine merupakan aturan Unity yang harus dipelajari.',
        'code' => <<<'CODE'
using UnityEngine;

public class KoinBerputar : MonoBehaviour
{
    [SerializeField] private float derajatPerDetik = 90f;
    [SerializeField] private bool berputar = true;

    private void Start()
    {
        Debug.Log("Koin siap berputar.");
    }

    private void Update()
    {
        if (!berputar)
            return;

        float sudutFrame = derajatPerDetik * Time.deltaTime;
        transform.Rotate(Vector3.up, sudutFrame, Space.World);
    }
}
CODE,
        'output' => 'Dalam Play Mode, Console Unity mencatat Koin siap berputar sekali saat component mulai berjalan. Objek berputar pada sumbu Y dunia sekitar 90 derajat per detik waktu game ketika Berputar aktif dan Time.timeScale normal. Tidak ada hasil console .NET; script dijalankan oleh Unity Editor.',
        'exercise' => 'Catat perkiraan waktu satu putaran pada 45, 90, dan 180 derajat per detik. Matikan Berputar di Inspector dan pastikan rotasi berhenti. Ubah arah dengan nilai negatif lalu jelaskan hasilnya tanpa mengganti sumbu rotasi.',
        'solution' => 'Satu putaran adalah 360 derajat, sehingga perkiraannya 8, 4, dan 2 detik pada waktu game normal. Berputar false membuat Update keluar sebelum rotasi. Kecepatan negatif memutar ke arah sebaliknya; sumbu tetap Y dunia.',
        'takeaways' => ['Script harus terpasang pada GameObject agar menjadi perilaku scene.', 'Kalikan kecepatan per detik dengan deltaTime untuk langkah tiap frame.', 'Gerakan Transform dekoratif berbeda dari simulasi Rigidbody.'],
        'mistakes' => [
            ['title' => 'Memutar dengan angka tetap tiap frame', 'body' => 'Kecepatan akan bergantung pada frame rate. Tulis kecepatan dalam satuan yang jelas, lalu gunakan durasi frame untuk menghitung langkah.'],
            ['title' => 'Menulis log pada setiap Update', 'body' => 'Console cepat penuh dan pesan penting sulit dilihat. Log startup, perubahan keadaan, atau kejadian tertentu yang memang sedang diperiksa.'],
        ],
        'practice' => [
            ['title' => 'Script tidak berjalan', 'task' => 'File sudah disimpan tetapi Koin diam. Apa tiga pemeriksaan awal?', 'hint' => 'Periksa pemasangan, keadaan scene, dan kompilasi.', 'answer' => 'Pastikan script terpasang pada Koin, objek serta component aktif dan sedang Play, kemudian periksa error Console. Sesudah itu periksa Berputar serta kecepatan, lalu sudut kamera.'],
            ['title' => 'Gerakan physics', 'task' => 'Apakah contoh Transform.Rotate ini cukup untuk pemain yang bergerak dengan gaya dan menabrak dinding?', 'hint' => 'Objek contoh tidak memakai Rigidbody.', 'answer' => 'Belum. Pelajari Rigidbody, collider, dan langkah physics yang sesuai. Tentukan siapa yang mengendalikan gerakan agar perubahan Transform tidak bertentangan dengan simulasi physics.'],
        ],
        'walkthrough' => [
            ['title' => 'Mulai component', 'explanation' => 'Unity menjalankan Start ketika component mulai aktif dalam alur permainan dan mencatat satu pesan kesiapan.'],
            ['title' => 'Hitung sudut frame', 'explanation' => 'Update memeriksa sakelar Berputar, lalu mengalikan derajat per detik dengan durasi frame saat ini.'],
            ['title' => 'Terapkan rotasi', 'explanation' => 'Transform.Rotate menambahkan sudut pada sumbu atas dunia. Pengulangan frame menghasilkan gerakan yang terlihat berkelanjutan.'],
        ],
        'source' => 'https://docs.unity3d.com/6000.0/Documentation/ScriptReference/MonoBehaviour.Update.html',
        'sources' => [
            ['label' => 'Unity Manual: MonoBehaviour.Update', 'url' => 'https://docs.unity3d.com/6000.0/Documentation/ScriptReference/MonoBehaviour.Update.html'],
            ['label' => 'Unity Manual: Time.deltaTime', 'url' => 'https://docs.unity3d.com/6000.0/Documentation/ScriptReference/Time-deltaTime.html'],
            ['label' => 'Unity Manual: Transform.Rotate', 'url' => 'https://docs.unity3d.com/6000.0/Documentation/ScriptReference/Transform.Rotate.html'],
            ['label' => 'Unity Manual: FixedUpdate', 'url' => 'https://docs.unity3d.com/6000.0/Documentation/ScriptReference/MonoBehaviour.FixedUpdate.html'],
        ],
    ],
    [
        'id' => 'wpf-pertama', 'stage' => 'spesialisasi', 'title' => 'WPF: Inventaris Desktop Pertama',
        'summary' => 'Bangun jendela Windows dengan input, event tombol, dan daftar yang mengikuti perubahan koleksi.', 'minutes' => 90,
        'objectives' => ['Menjalankan proyek WPF pada Windows.', 'Memisahkan input, validasi, dan perubahan koleksi.', 'Memahami hubungan ObservableCollection dengan ItemsSource.'],
        'sections' => [
            ['heading' => 'Siapkan proyek yang memang menargetkan Windows', 'body' => 'WPF ditujukan untuk aplikasi desktop Windows. Gunakan Windows dengan .NET 10 SDK; bila memakai Visual Studio, pasang dukungan pengembangan desktop .NET. Jalankan dotnet new wpf -n InventarisDesktop -f net10.0 lalu masuk ke foldernya. Pertahankan MainWindow.xaml bawaan template dan ganti seluruh MainWindow.xaml.cs dengan contoh. Namespace InventarisDesktop harus cocok dengan x:Class pada XAML. Jalankan dotnet run untuk membuka jendela. Kode ini bukan Program.cs console dan tidak dijalankan oleh browser.'],
            ['heading' => 'Jendela memiliki tampilan dan event', 'body' => 'Template WPF memisahkan markup XAML dari code-behind C#. InitializeComponent memuat komponen yang dihasilkan dari markup. Untuk membuat contoh dapat disalin sebagai satu file, kita membuat control melalui C# setelah inisialisasi dan menetapkannya sebagai Content jendela. Cara ini cocok untuk memperlihatkan hubungan objek dan event secara langsung. Pada proyek yang berkembang, layout biasanya ditulis di XAML agar tampilan mudah dikelola, sementara perilaku tetap berada pada batas yang jelas.'],
            ['heading' => 'Susun layout dari control yang sesuai', 'body' => 'StackPanel menempatkan anak secara berurutan, sehingga judul, kotak input, tombol, daftar, dan status mengikuti susunan penambahan. Margin memberi jarak dari tepi jendela. TextBox menerima teks, Button memicu tindakan, dan ListBox menampilkan koleksi. Atur ukuran minimum jendela agar area utama tetap terbaca. Layout berdasarkan posisi tetap untuk setiap elemen cepat menyulitkan ketika teks lebih panjang atau ukuran jendela berubah; pilih panel yang mencerminkan hubungan antarbagian tampilan.'],
            ['heading' => 'Event memeriksa input sebelum menambah', 'body' => 'Klik tombol menjalankan TambahBarang dengan RoutedEventArgs sebagai informasi event WPF. Method memangkas spasi tepi dan menolak teks kosong. Pada input sah, nama dimasukkan ke koleksi, kotak dikosongkan, fokus dikembalikan, dan status diperbarui. Urutan itu memberi pengguna umpan balik yang jelas serta siap menerima input berikutnya. Dua barang bernama sama diizinkan pada versi ini karena aturan keunikan belum dipilih. Jika inventaris nyata mempunyai kode unik, validasi sebaiknya berdasarkan kode tersebut, bukan tebakan dari label.'],
            ['heading' => 'Koleksi memberi tahu tampilan ketika berubah', 'body' => 'ItemsSource ListBox menunjuk ObservableCollection<string>. Ketika Add dipanggil, koleksi mengirim notifikasi perubahan ke kontrol sehingga daftar diperbarui. List<string> biasa tidak mengirim notifikasi penambahan seperti ini. Namun ObservableCollection tidak otomatis memberi notifikasi perubahan property di dalam objek anggotanya. Jika nanti barang mempunyai Nama dan Stok yang dapat diedit, model atau viewmodel perlu menerapkan mekanisme pemberitahuan property yang sesuai, misalnya INotifyPropertyChanged. Bedakan perubahan anggota koleksi dengan perubahan isi satu anggota.'],
            ['heading' => 'Lanjutkan ke penyimpanan dan MVVM', 'body' => 'Daftar hanya berada di memori selama jendela hidup. Menutup lalu membuka aplikasi membuat daftar kosong kembali. Tambahkan penyimpanan setelah alur input dan validasi benar, misalnya dengan layanan JSON dari proyek sebelumnya. Untuk aplikasi lebih besar, pelajari MVVM agar state dan perintah dapat diuji tanpa selalu membuka jendela. Operasi jaringan atau file yang lama sebaiknya memakai pola async yang menjaga UI responsif. Perubahan control WPF tetap harus mengikuti aturan thread UI; background task tidak bebas mengubah semua control secara langsung.'],
        ],
        'analogy' => 'Jendela inventaris seperti meja penerimaan barang. Kotak input adalah formulir, tombol adalah tindakan menerima, dan daftar adalah papan yang diberi tahu setiap ada catatan baru. Papan bukan gudang permanen; menutup aplikasi tanpa penyimpanan menghilangkan catatan memori.',
        'code' => <<<'CODE'
using System.Collections.ObjectModel;
using System.Windows;
using System.Windows.Controls;

namespace InventarisDesktop;

public partial class MainWindow : Window
{
    private readonly ObservableCollection<string> barang = new();
    private readonly TextBox nama = new() { Margin = new Thickness(0, 8, 0, 8) };
    private readonly TextBlock status = new() { Margin = new Thickness(0, 8, 0, 0) };

    public MainWindow()
    {
        InitializeComponent();
        Title = "Inventaris Belajar";
        Width = 440;
        Height = 380;
        MinWidth = 340;
        MinHeight = 350;

        var panel = new StackPanel { Margin = new Thickness(24) };
        var label = new Label { Content = "_Nama barang", Target = nama };
        var tambah = new Button { Content = "_Tambah barang", Padding = new Thickness(8) };
        tambah.Click += TambahBarang;
        var daftar = new ListBox
        {
            ItemsSource = barang,
            Height = 160,
            Margin = new Thickness(0, 12, 0, 0)
        };
        panel.Children.Add(label);
        panel.Children.Add(nama);
        panel.Children.Add(tambah);
        panel.Children.Add(daftar);
        panel.Children.Add(status);
        Content = panel;
    }

    private void TambahBarang(object sender, RoutedEventArgs e)
    {
        string nilai = nama.Text.Trim();
        if (nilai.Length == 0)
        {
            status.Text = "Nama barang wajib diisi.";
            nama.Focus();
            return;
        }
        barang.Add(nilai);
        nama.Clear();
        nama.Focus();
        status.Text = $"{barang.Count} barang tercatat.";
    }
}
CODE,
        'output' => 'Jendela Inventaris Belajar terbuka. Masukkan Buku lalu klik Tambah barang: Buku muncul pada daftar dan status menjadi 1 barang tercatat. Klik tombol saat kotak kosong menampilkan Nama barang wajib diisi tanpa menambah daftar. Hasil terlihat pada jendela Windows.',
        'exercise' => 'Tambahkan Buku dan Pensil, kemudian coba input tiga spasi. Pastikan hanya dua anggota tercatat. Tutup dan buka aplikasi untuk mengamati batas penyimpanan memori. Rancang tombol Hapus terpilih yang tidak menghapus ketika belum ada pilihan.',
        'solution' => 'Dua input sah menjadi dua anggota; input spasi ditolak setelah Trim. Pembukaan ulang memulai daftar kosong. Untuk hapus, simpan ListBox sebagai field, periksa SelectedItem is string pilihan, lalu barang.Remove(pilihan). Jika belum ada pilihan, tampilkan pesan dan jangan mengubah koleksi.',
        'takeaways' => ['WPF berjalan pada Windows dan memakai lifecycle aplikasi desktop.', 'ObservableCollection memberi notifikasi penambahan serta penghapusan anggota.', 'State tampilan, aturan bisnis, dan penyimpanan perlu batas yang jelas.'],
        'mistakes' => [
            ['title' => 'Mengubah namespace tanpa mengubah XAML', 'body' => 'x:Class dan partial class code-behind harus menunjuk tipe yang sama. Jika tidak, InitializeComponent atau hubungan event dapat gagal saat kompilasi.'],
            ['title' => 'List biasa diharapkan selalu memperbarui UI', 'body' => 'List<T> tidak mengirim notifikasi perubahan koleksi. Gunakan koleksi yang mendukung binding dinamis, lalu pelajari notifikasi property untuk model yang dapat diedit.'],
        ],
        'practice' => [
            ['title' => 'Barang berubah nama', 'task' => 'Jika string diganti class Barang, apakah ObservableCollection cukup untuk memperbarui Nama yang diedit?', 'hint' => 'Anggota koleksi tetap sama; hanya property objek berubah.', 'answer' => 'Belum tentu. Class atau viewmodel perlu memberi notifikasi perubahan property, biasanya melalui INotifyPropertyChanged, agar binding mengetahui nilai Nama perlu ditampilkan ulang.'],
            ['title' => 'Menyimpan tanpa membekukan jendela', 'task' => 'Apa yang terjadi bila tombol menjalankan Thread.Sleep selama lima detik di thread UI?', 'hint' => 'Thread yang sama juga memproses interaksi jendela.', 'answer' => 'UI tidak responsif selama menunggu. Gunakan API async untuk operasi I/O yang mendukungnya, tampilkan status pekerjaan, dan kembalikan perubahan control melalui konteks UI yang benar.'],
        ],
        'walkthrough' => [
            ['title' => 'Susun control', 'explanation' => 'Constructor memuat template lalu membuat panel. ListBox terhubung ke koleksi barang yang sama sepanjang instance jendela.'],
            ['title' => 'Terima satu input', 'explanation' => 'Event tombol membaca teks, memangkas spasi, dan memilih jalur penolakan atau penambahan sebelum mengubah koleksi.'],
            ['title' => 'Perbarui daftar dan fokus', 'explanation' => 'ObservableCollection memberi notifikasi kepada ListBox. Kotak dibersihkan dan fokus dikembalikan untuk mempercepat input berikutnya.'],
        ],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/desktop/wpf/overview/',
        'sources' => [
            ['label' => 'Microsoft Learn: WPF overview', 'url' => 'https://learn.microsoft.com/en-us/dotnet/desktop/wpf/overview/'],
            ['label' => 'Microsoft Learn: membuat aplikasi WPF', 'url' => 'https://learn.microsoft.com/en-us/dotnet/desktop/wpf/get-started/create-app-visual-studio'],
            ['label' => 'Microsoft Learn: data binding WPF', 'url' => 'https://learn.microsoft.com/en-us/dotnet/desktop/wpf/data/'],
        ],
    ],
];
