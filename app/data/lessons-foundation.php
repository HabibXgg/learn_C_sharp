<?php
declare(strict_types=1);

// Materi tambahan: setiap contoh adalah satu Program.cs pada proyek console .NET 10.
return [
    [
        'id' => 'cara-kerja-program', 'stage' => 'fondasi', 'title' => 'Cara Kerja Program & Berpikir Algoritmis',
        'summary' => 'Ubah persoalan sehari-hari menjadi input, langkah terurut, dan hasil yang bisa diperiksa.', 'minutes' => 35,
        'objectives' => ['Memisahkan masukan, proses, dan keluaran sebuah masalah.', 'Menelusuri perubahan nilai tanpa menebak hasil program.', 'Membedakan kode sumber, proses build, dan program yang sedang berjalan.'],
        'sections' => [
            ['heading' => 'Mulai dari pertanyaan yang jelas', 'body' => 'Sebelum menulis C#, tentukan hasil yang ingin diperoleh. Bayangkan koperasi mempunyai tiga kotak pensil, setiap kotak berisi empat pensil, lalu dua pensil dipinjam. Pertanyaannya adalah berapa pensil tersisa, bukan sekadar membuat aplikasi koperasi. Persoalan yang kecil memudahkan kita menentukan apakah program benar. Tuliskan jawaban manual: tiga kali empat dikurangi dua adalah sepuluh. Angka ini menjadi pembanding ketika kode dijalankan.'],
            ['heading' => 'Masukan, proses, dan keluaran', 'body' => 'Masukan contoh adalah jumlah kotak, isi setiap kotak, dan jumlah yang dipinjam. Prosesnya menghitung stok awal lalu mengurangi peminjaman. Keluarannya adalah laporan stok. Masukan tidak selalu datang dari keyboard; nilai yang ditulis langsung dalam kode juga merupakan data awal perhitungan. Kelak data bisa berasal dari formulir, file, atau database. Rumusnya dapat tetap sama meskipun cara mengambil dan menampilkan data berubah.'],
            ['heading' => 'Algoritma adalah urutan yang dapat dilakukan', 'body' => 'Tulis langkah dengan bahasa biasa: siapkan tiga angka, kalikan dua angka pertama, kurangi hasilnya dengan angka ketiga, kemudian tampilkan hasil akhir. Langkah seperti hitung dengan benar terlalu samar karena tidak menyebut operasi. Untuk latihan ini urutan penting: mengurangi jumlah kotak dengan pensil yang dipinjam mencampurkan dua satuan berbeda. Nama variabel yang menyebut arti dan satuannya membantu mencegah salah tafsir sebelum compiler ikut memeriksa.'],
            ['heading' => 'Dari tulisan menjadi eksekusi', 'body' => 'Kode sumber adalah teks yang kita edit. Proses build memeriksa kode dan membentuk aplikasi yang dapat dijalankan oleh lingkungan .NET. Kesalahan penulisan seperti nama yang tidak dikenal biasanya ditemukan saat build. Ketika aplikasi berjalan, instruksi contoh dieksekusi sesuai urutannya dan nilai tersimpan selama proses itu hidup. Menjalankan kembali program ini memulai perhitungan baru; hasil pada layar bukan penyimpanan permanen untuk sesi berikutnya.'],
            ['heading' => 'Baca satu langkah setiap kali', 'body' => 'Pada contoh, int menyatakan bilangan bulat. Tanda = memberikan nilai kepada nama di sebelah kirinya, sedangkan * dan - melakukan perkalian serta pengurangan. Console.WriteLine menampilkan hasil; bentuk $ memungkinkan nilai di dalam kurung kurawal disisipkan ke teks. Jangan berusaha menghafal seluruh tanda sekarang. Fokus pada perubahan stokAwal dari belum tersedia menjadi 12, kemudian sisa menjadi 10. Materi variabel akan menjelaskan tipe secara lebih rinci.'],
            ['heading' => 'Periksa aturan di luar rumus', 'body' => 'Rumus benar belum tentu menghasilkan keadaan yang masuk akal. Jika dipinjam menjadi 20, hasilnya negatif. Apakah koperasi mengizinkan utang barang, atau peminjaman harus ditolak? Itu keputusan kebutuhan aplikasi, bukan sesuatu yang diketahui C#. Catat aturan bahwa peminjaman tidak boleh melebihi stok. Kita belum menerapkannya pada contoh pertama agar alurnya terbaca; nanti percabangan dan validasi akan menerjemahkan aturan tersebut menjadi tindakan yang eksplisit.'],
        ],
        'analogy' => 'Program mirip daftar instruksi merakit paket alat tulis: isi awal disebutkan, pekerjaan mempunyai urutan, dan paket akhir dapat dihitung. Batas analoginya, manusia mungkin menebak langkah yang terlupa dari kebiasaan; komputer mengikuti instruksi yang tersedia dan tidak otomatis memahami maksud pemilik koperasi.',
        'code' => <<<'CODE'
int jumlahKotak = 3;
int isiPerKotak = 4;
int dipinjam = 2;

int stokAwal = jumlahKotak * isiPerKotak;
int sisa = stokAwal - dipinjam;

Console.WriteLine($"Stok awal: {stokAwal} pensil");
Console.WriteLine($"Sisa: {sisa} pensil");
CODE,
        'output' => "Stok awal: 12 pensil\nSisa: 10 pensil",
        'walkthrough' => [
            ['title' => 'Tetapkan data awal', 'explanation' => 'Tiga deklarasi pertama membedakan kotak, isi kotak, dan peminjaman. Mengganti dipinjam tidak mengubah dua data awal lainnya.'],
            ['title' => 'Buat hasil antara', 'explanation' => 'stokAwal menyimpan hasil 3 × 4. Hasil antara ini membuat rumus akhir dapat dibaca dan diperiksa tanpa menghitung semuanya sekaligus.'],
            ['title' => 'Laporkan hasil', 'explanation' => 'sisa dihitung dari stokAwal dikurangi dipinjam. Dua WriteLine menampilkan nilai yang sudah ada; menampilkan nilai tidak mengurangi stok lagi.'],
        ],
        'mistakes' => [
            ['title' => 'Mengira layar menyimpan keadaan aplikasi', 'body' => 'Tulisan lama tetap terlihat di terminal, tetapi eksekusi berikutnya mulai lagi dari angka dalam kode. Penyimpanan membutuhkan langkah tersendiri.'],
            ['title' => 'Menguji hanya satu contoh', 'body' => 'Hasil sepuluh membuktikan satu kasus. Periksa pula nol peminjaman, stok habis, dan permintaan melebihi stok sebelum menyatakan aturannya lengkap.'],
        ],
        'practice' => [
            ['title' => 'Prediksi sebelum Run', 'task' => 'Ubah jumlahKotak menjadi 5 dan dipinjam menjadi 7. Tuliskan dua baris hasil sebelum menjalankan.', 'hint' => 'Pisahkan perhitungan stok awal dari pengurangan.', 'answer' => 'Stok awal menjadi 20 pensil dan sisa menjadi 13. Jika prediksi berbeda, telusuri masing-masing operasi terlebih dahulu.'],
            ['title' => 'Tulis spesifikasi kecil', 'task' => 'Tuliskan masukan, proses, keluaran, dan satu aturan untuk program menghitung kursi kosong dalam kelas.', 'hint' => 'Kapasitas dan jumlah peserta mempunyai peran berbeda.', 'answer' => 'Masukan kapasitas dan peserta; proses kapasitas dikurangi peserta; keluaran kursi kosong; aturan peserta tidak boleh negatif atau melebihi kapasitas.'],
        ],
        'exercise' => 'Tambahkan jumlah pensil rusak sebanyak satu. Hitung stok yang dapat dipinjam setelah mengurangi pensil rusak dan peminjaman. Tuliskan tiga kasus pemeriksaan dengan hasil manual.',
        'solution' => 'Buat int rusak = 1 dan hitung sisa = stokAwal - rusak - dipinjam. Data awal menghasilkan 9. Dengan rusak 0 hasilnya 10; dengan dipinjam 0 dan rusak 1 hasilnya 11. Kasus rusak melebihi stok membutuhkan aturan penolakan yang akan dipelajari pada percabangan.',
        'takeaways' => ['Tuliskan hasil yang diharapkan sebelum membuat rumus.', 'Nama dan satuan data membantu menilai langkah perhitungan.', 'Build yang berhasil belum membuktikan kebutuhan aplikasi terpenuhi.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/program-structure/',
        'sources' => [
            ['label' => 'Microsoft Learn: struktur dan eksekusi program C#', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/program-structure/'],
            ['label' => 'Microsoft Learn: pengantar bahasa C#', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/tour-of-csharp/overview'],
        ],
    ],
    [
        'id' => 'input-output', 'stage' => 'fondasi', 'title' => 'Input & Output: Program yang Bisa Diajak Bicara',
        'summary' => 'Terima masukan dari terminal, tangani input kosong, dan tampilkan pesan yang membantu pengguna.', 'minutes' => 35,
        'objectives' => ['Menggunakan Write, WriteLine, dan ReadLine sesuai kebutuhan.', 'Membedakan string kosong, spasi, dan null.', 'Memisahkan pesan permintaan dari data yang dibaca.'],
        'sections' => [
            ['heading' => 'Percakapan mempunyai urutan', 'body' => 'Aplikasi interaktif perlu menjelaskan apa yang diminta sebelum menunggu jawaban. Untuk kartu peserta, tampilkan permintaan nama, baca satu baris, kemudian cetak sapaan. Nama variabel inputNama memberi petunjuk bahwa isinya masih data mentah dari luar aplikasi. Jangan mencetak instruksi setelah ReadLine karena pengguna sudah terlanjur melihat terminal diam. Susun percakapan seperti formulir singkat dengan label yang langsung menyebut data yang diperlukan.'],
            ['heading' => 'Write dan WriteLine berbeda tampilan', 'body' => 'Console.Write menampilkan teks tanpa menambahkan perpindahan baris. Ini cocok untuk prompt Nama peserta: karena jawaban bisa diketik di sebelahnya. Console.WriteLine menambahkan akhir baris sehingga cocok untuk hasil atau paragraf berikutnya. Keduanya menampilkan data, bukan mengembalikan jawaban pengguna. Uji dengan mengganti Write menjadi WriteLine dan perhatikan posisi kursor. Perubahan ini memengaruhi kenyamanan percakapan, tetapi tidak mengubah isi nama yang dibaca.'],
            ['heading' => 'ReadLine memberikan teks atau akhir input', 'body' => 'Console.ReadLine membaca satu baris dari input standar. Saat membaca keyboard terminal, biasanya aplikasi menunggu sampai Enter ditekan. Nilainya berupa string, sehingga mengetik 25 masih menghasilkan teks sampai kita melakukan parsing. Bentuk string? menyatakan bahwa hasilnya juga boleh null, yaitu tidak ada lagi baris tersedia. Menekan Enter pada baris kosong menghasilkan string kosong, bukan null. Pembedaan ini berguna ketika input berasal dari file atau pipeline.'],
            ['heading' => 'Tentukan kebijakan untuk input kosong', 'body' => 'Contoh menggunakan (inputNama ?? "").Trim(). Operator ?? memilih teks kosong hanya jika hasil pembacaan null. Trim membuat teks tanpa spasi awal dan akhir; hasilnya ditampung karena string asal tidak diubah. Setelah itu, nama.Length == 0 mendeteksi nama yang kosong. Untuk kartu peserta latihan, kita memilih nama Tamu. Untuk registrasi sungguhan, mungkin lebih tepat meminta ulang karena nama wajib tersedia. Kebijakan mengikuti kebutuhan, bukan kebetulan sintaks.'],
            ['heading' => 'Pesan yang baik menunjukkan tindakan berikutnya', 'body' => 'Pesan Input salah tidak memberi tahu cara memperbaikinya. Pesan Nama belum diisi; kartu memakai Tamu menjelaskan keputusan aplikasi dengan jelas. Hindari menyuruh pengguna menekan tombol apa saja ketika kode sebenarnya memakai ReadLine dan memerlukan Enter. Dalam latihan, hasil sapaan juga mengonfirmasi nama yang diterima. Konfirmasi seperti ini membuat spasi yang tidak diinginkan, salah ketik, atau urutan pembacaan yang keliru lebih mudah diketahui.'],
            ['heading' => 'Uji percakapan sebagai rangkaian kejadian', 'body' => 'Jalankan contoh beberapa kali: masukkan Habib, tekan Enter tanpa teks, lalu masukkan beberapa spasi. Catat apa yang tampil sebelum dan sesudah Enter. Untuk dua pertanyaan, masing-masing memerlukan ReadLine sendiri; satu panggilan tidak membaca seluruh percakapan sekaligus. Contoh ini memakai if dan operator ?? sebagai pengantar. Materi percabangan akan menguraikan if, sementara materi nullability membahas alasan compiler mengingatkan kemungkinan data yang tidak tersedia.'],
        ],
        'analogy' => 'Console seperti loket: petugas menanyakan nama, menerima jawaban, lalu mengeluarkan kartu. ReadLine membaca satu jawaban tertulis sampai akhir baris. Batas analoginya, console tidak memahami bahasa bebas; jika ditanya nama tetapi dijawab angka, aplikasi tetap menerima teks itu kecuali kita menulis aturan pemeriksaannya.',
        'code' => <<<'CODE'
Console.Write("Nama peserta: ");
string? inputNama = Console.ReadLine();
string nama = (inputNama ?? "").Trim();

if (nama.Length == 0)
{
    nama = "Tamu";
    Console.WriteLine("Nama belum diisi; kartu memakai Tamu.");
}

Console.WriteLine($"Halo, {nama}!");
Console.WriteLine("Kartu belajarmu siap.");
CODE,
        'output' => "Contoh interaksi saat mengetik Habib lalu Enter:\nNama peserta: Habib\nHalo, Habib!\nKartu belajarmu siap.",
        'walkthrough' => [
            ['title' => 'Minta sebelum menunggu', 'explanation' => 'Write menampilkan label, lalu ReadLine menunggu satu baris. Teks yang diketik pengguna merupakan input, bukan hasil WriteLine dari aplikasi.'],
            ['title' => 'Normalisasi sederhana', 'explanation' => '?? menangani akhir input; Trim menghapus spasi di ujung. Nama dengan spasi di tengah, seperti Siti Aminah, tetap mempunyai spasi di tengah.'],
            ['title' => 'Pilih nama dan tampilkan kartu', 'explanation' => 'Blok if hanya berjalan saat panjang nama nol. Setelah blok selesai, dua baris keluaran selalu memakai nama yang sudah dipilih.'],
        ],
        'mistakes' => [
            ['title' => 'Memakai Trim tanpa menyimpan hasil', 'body' => 'Memanggil input.Trim() saja tidak memperbarui variabel input. Simpan string yang dikembalikan method tersebut.'],
            ['title' => 'Menganggap Enter sama dengan akhir input', 'body' => 'Baris kosong masih sebuah baris. null berarti pembaca tidak mendapatkan baris berikutnya; jangan menyamakan keduanya tanpa kebijakan yang sengaja dipilih.'],
        ],
        'practice' => [
            ['title' => 'Dua pertanyaan', 'task' => 'Tanyakan nama dan kota, lalu tampilkan satu kalimat perkenalan.', 'hint' => 'Gunakan pasangan Write dan ReadLine untuk masing-masing data.', 'answer' => 'Baca nama lebih dahulu, kemudian kota ke variabel terpisah. Interpolasikan keduanya menjadi Halo, Habib dari Bandung. Periksa nilai kosong pada setiap pertanyaan.'],
            ['title' => 'Amati spasi', 'task' => 'Masukkan dua spasi, Siti Aminah, lalu dua spasi. Prediksi hasil Trim.', 'hint' => 'Trim bekerja pada kedua ujung string.', 'answer' => 'Hasilnya Siti Aminah. Spasi di antara kedua kata dipertahankan karena bukan spasi pada awal atau akhir string.'],
        ],
        'exercise' => 'Buat kartu belajar yang meminta nama serta target belajar hari ini. Bila target kosong, gunakan Membaca satu materi. Cetak dua informasi itu pada baris terpisah.',
        'solution' => 'Baca target dengan ReadLine, gunakan ?? dan Trim seperti nama, lalu periksa target.Length == 0. Berikan nilai pengganti hanya ketika kosong. Cetak Nama: dan Target: menggunakan dua WriteLine agar pengguna dapat memeriksa dua informasi secara terpisah.',
        'takeaways' => ['Tampilkan prompt sebelum membaca masukan.', 'Input angka dari ReadLine tetap berupa teks.', 'Pilih penanganan kosong secara sengaja dan sampaikan hasilnya.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/api/system.console.readline?view=net-10.0',
        'sources' => [
            ['label' => 'Microsoft Learn: Console.ReadLine', 'url' => 'https://learn.microsoft.com/en-us/dotnet/api/system.console.readline?view=net-10.0'],
            ['label' => 'Microsoft Learn: operasi string', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/strings/'],
        ],
    ],
    [
        'id' => 'string-formatting', 'stage' => 'fondasi', 'title' => 'String, Format Angka & Teks yang Rapi',
        'summary' => 'Olah teks tanpa merusak nilai asal dan susun struk dengan format angka yang konsisten.', 'minutes' => 40,
        'objectives' => ['Menggunakan interpolasi, Trim, Replace, dan perbandingan teks.', 'Memisahkan angka untuk perhitungan dari teks untuk tampilan.', 'Memilih budaya pemformatan secara eksplisit.'],
        'sections' => [
            ['heading' => 'Teks juga mempunyai struktur', 'body' => 'Nama produk, kode anggota, dan isi pesan sama-sama string, tetapi aturannya berbeda. Nama mungkin mempertahankan huruf besar kecil, sedangkan kode barang dapat disepakati selalu kapital. Pada struk latihan, kita menerima nama dengan spasi di kedua ujung lalu membersihkannya. Jangan langsung mengubah semua masukan menjadi huruf kapital: kata sandi, teks kutipan, dan nama yang ingin ditampilkan persis mempunyai kebutuhan berbeda dari kode produk.'],
            ['heading' => 'Operasi string menghasilkan nilai baru', 'body' => 'Saat Trim atau Replace dipanggil, simpan nilai hasilnya ke variabel yang sesuai. Menjaga namaMentah terpisah dari nama membuat proses normalisasi mudah diamati. Replace berguna untuk penggantian yang aturannya sudah jelas, misalnya mengganti tanda garis bawah pada label. Ia bukan alat untuk memahami arti kalimat. Jika sebuah aturan pembersihan mengubah data terlalu jauh, pengguna bisa kehilangan informasi yang sebenarnya diperlukan oleh aplikasi.'],
            ['heading' => 'Interpolasi menjaga hubungan label dan nilai', 'body' => 'String yang diawali $ dapat memuat ekspresi di dalam kurung kurawal, misalnya $"Jumlah: {jumlah}". Bentuk ini lebih mudah dibaca daripada menyambung banyak potongan teks dengan +. Untuk menampilkan kurung kurawal literal dalam string interpolasi biasa, gandakan tanda tersebut. Escape seperti \n membuat baris baru dan \" menampilkan tanda kutip dalam string biasa. Gunakan WriteLine terpisah ketika itu membuat urutan laporan lebih jelas.'],
            ['heading' => 'Nilai angka berbeda dari cara menulisnya', 'body' => 'total tetap decimal dengan nilai 37500; format hanya mengubah representasinya. Jangan menambahkan Rp ke variabel yang nantinya masih akan dikalikan atau dijumlahkan. Lakukan perhitungan dengan tipe angka, lalu ubah menjadi teks pada batas tampilan. Dalam contoh, N0 menampilkan pengelompokan ribuan tanpa angka desimal. Pembulatan untuk tampilan tidak otomatis mengubah nilai total yang tersimpan, sehingga aturan pembulatan transaksi perlu ditentukan secara terpisah.'],
            ['heading' => 'Budaya membuat pemisah bermakna', 'body' => 'Budaya id-ID memakai kebiasaan penulisan angka Indonesia. Contoh menggunakan CultureInfo.GetCultureInfo supaya hasil struk tidak mengikuti pengaturan komputer secara tidak sengaja. Format C dapat menambahkan simbol mata uang, tetapi contoh menulis Rp sendiri agar label latihan sederhana dan konsisten. Jangan memakai hasil format tampilan sebagai format pertukaran data tanpa kesepakatan. Format yang nyaman dibaca manusia belum tentu cocok untuk parsing oleh aplikasi lain.'],
            ['heading' => 'Perbandingan harus sesuai maksud', 'body' => 'Untuk kode promo latihan, StringComparison.OrdinalIgnoreCase memungkinkan hemat dan HEMAT dianggap sama tanpa mengubah string asli. Pilihan ini cocok ketika kita membandingkan kode teknis yang tidak bergantung pada aturan bahasa manusia. Untuk pengurutan nama di antarmuka, kebutuhan budaya bisa berbeda. Tentukan lebih dahulu apakah perbedaan kapital memang berarti perbedaan identitas. Mengabaikan kapital pada semua jenis data dapat menyembunyikan kesalahan yang seharusnya terlihat.'],
        ],
        'analogy' => 'Angka adalah barang di gudang, sedangkan format adalah label yang ditempel pada laporan. Barang berjumlah sama dapat ditulis 37.500 atau 37,500 mengikuti kebiasaan pembaca. Batas analoginya, kedua tulisan bisa bermakna berbeda saat dibaca kembali sebagai angka; format tampilan harus mempunyai konteks budaya yang jelas.',
        'code' => <<<'CODE'
using System.Globalization;

string namaMentah = "  Buku Catatan  ";
string nama = namaMentah.Trim();
int jumlah = 3;
decimal harga = 12500m;
decimal total = harga * jumlah;
CultureInfo indonesia = CultureInfo.GetCultureInfo("id-ID");
string totalTeks = total.ToString("N0", indonesia);
bool promoDikenal = string.Equals("hemat", "HEMAT", StringComparison.OrdinalIgnoreCase);

Console.WriteLine($"Produk: {nama}");
Console.WriteLine($"Jumlah: {jumlah}");
Console.WriteLine($"Total: Rp {totalTeks}");
Console.WriteLine($"Promo dikenal: {promoDikenal}");
CODE,
        'output' => "Produk: Buku Catatan\nJumlah: 3\nTotal: Rp 37.500\nPromo dikenal: True",
        'walkthrough' => [
            ['title' => 'Simpan mentah dan bersih', 'explanation' => 'namaMentah mempertahankan input contoh. nama menerima hasil Trim sehingga keluaran tidak mempunyai spasi tambahan setelah label atau di ujung baris.'],
            ['title' => 'Hitung sebelum memformat', 'explanation' => 'harga dikali jumlah menghasilkan decimal 37500. ToString N0 dengan id-ID kemudian menghasilkan teks 37.500 untuk pembaca.'],
            ['title' => 'Bandingkan kode secara sengaja', 'explanation' => 'StringComparison.OrdinalIgnoreCase membuat dua kode berbeda kapital cocok. Nilai bool hanya dilaporkan; contoh belum menerapkan potongan harga.'],
        ],
        'mistakes' => [
            ['title' => 'Menjumlahkan string harga', 'body' => 'Teks "100" + "200" menjadi "100200". Pertahankan harga sebagai angka sampai tahap tampilan agar + berarti penjumlahan.'],
            ['title' => 'Mengira format memberi diskon', 'body' => 'Menampilkan harga tanpa desimal atau menandai promo True tidak mengubah harga. Perubahan bisnis membutuhkan operasi angka yang jelas.'],
        ],
        'practice' => [
            ['title' => 'Tambahkan harga satuan', 'task' => 'Cetak Harga satuan: Rp 12.500 dengan budaya yang sama.', 'hint' => 'Panggil ToString pada harga, bukan pada totalTeks.', 'answer' => 'Gunakan harga.ToString("N0", indonesia) pada interpolasi baru. totalTeks tetap hanya mewakili total pesanan.'],
            ['title' => 'Bersihkan label', 'task' => 'Ubah teks "  buku_catatan  " menjadi "buku catatan" tanpa mengubah variabel asal.', 'hint' => 'Rangkai hasil Trim dengan Replace.', 'answer' => 'Buat string label = asal.Trim().Replace("_", " ");. Kedua operasi memberikan string hasil dan nilai asal tetap dapat diperiksa.'],
        ],
        'exercise' => 'Buat struk yang menampilkan subtotal, potongan 10%, dan total bayar. Semua perhitungan memakai decimal dan semua jumlah uang diformat N0 dengan id-ID.',
        'solution' => 'Hitung potongan = total * 0.10m dan bayar = total - potongan sebelum ToString. Untuk data contoh, subtotal 37.500, potongan 3.750, dan bayar 33.750. Buat label berbeda agar pembaca tidak mengira potongan adalah total setelah diskon.',
        'takeaways' => ['Normalisasi teks harus mengikuti jenis datanya.', 'Format tampilan tidak mengubah angka sumber.', 'Budaya dan aturan perbandingan perlu dipilih sesuai kebutuhan.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/tutorials/string-interpolation',
        'sources' => [
            ['label' => 'Microsoft Learn: interpolasi string', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/tutorials/string-interpolation'],
            ['label' => 'Microsoft Learn: string dan operasi teks', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/strings/'],
        ],
    ],
    [
        'id' => 'konversi-validasi', 'stage' => 'fondasi', 'title' => 'Konversi Tipe & Validasi Input',
        'summary' => 'Bedakan teks yang dapat dibaca sebagai angka dari angka yang memenuhi aturan aplikasi.', 'minutes' => 45,
        'objectives' => ['Memakai TryParse untuk masukan yang bisa salah.', 'Memisahkan validasi format dan validasi rentang.', 'Mengenali kehilangan informasi saat mengubah tipe angka.'],
        'sections' => [
            ['heading' => 'Bisa dibaca belum berarti boleh dipakai', 'body' => 'Formulir pemesanan kursi menerima teks, tetapi perhitungan memerlukan int. Teks 3 dapat dibaca sebagai bilangan bulat, sedangkan tiga tidak. Sesudah parsing berhasil, aturan pemesanan tetap perlu diperiksa: misalnya minimal satu dan maksimal sepuluh kursi. Angka -2 valid sebagai int tetapi tidak valid sebagai pesanan. Dua pemeriksaan ini menjawab pertanyaan berbeda sehingga pesan kegagalannya juga sebaiknya dibedakan.'],
            ['heading' => 'TryParse memberi sinyal keberhasilan', 'body' => 'int.TryParse menerima teks, menghasilkan bool, dan menempatkan angka hasil pada parameter out ketika berhasil. Dalam contoh, out int jumlah mendeklarasikan nama hasil langsung pada pemanggilan. Jika gagal, jangan melanjutkan perhitungan memakai jumlah seolah-olah masukan sah. TryParse cocok untuk kesalahan masukan yang memang mungkin terjadi sehari-hari. Parse mempunyai kegunaan ketika kegagalan ditangani sebagai exception, tetapi kita tidak memerlukannya untuk percakapan pemesanan sederhana ini.'],
            ['heading' => 'Keluar lebih awal agar alur terbaca', 'body' => 'Contoh membaca satu pesanan lalu selesai. Ketika parsing gagal, aplikasi menampilkan petunjuk dan return mengakhiri eksekusi top-level. Jika format benar tetapi jumlah di luar rentang, jalur kedua juga mengakhiri program. Karena itu baris perhitungan di bawah kedua pemeriksaan hanya dijalankan untuk jumlah yang diterima. Ini disebut pemeriksaan awal atau guard clause. Setelah memahami loop, kamu dapat mengganti keputusan selesai menjadi meminta input lagi.'],
            ['heading' => 'Konversi angka mempunyai konsekuensi', 'body' => 'Mengubah int menjadi decimal dapat dilakukan langsung untuk perhitungan harga contoh. Sebaliknya, memaksa decimal menjadi int dengan cast membuang bagian pecahan menuju nol, bukan otomatis mengikuti aturan pembulatan harga. Mengubah angka besar ke tipe lebih kecil juga mempunyai batas. Jangan memilih cast sekadar agar pesan compiler hilang. Tanyakan informasi apa yang hilang dan apakah kehilangan itu diperbolehkan oleh kebutuhan aplikasi yang sedang dibuat.'],
            ['heading' => 'Tuliskan kebijakan tanda pemisah', 'body' => 'Untuk jumlah kursi, kita meminta bilangan bulat tanpa pemisah ribuan. Untuk harga desimal, format input perlu menjelaskan apakah pengguna menulis koma atau titik. API parsing menyediakan overload dengan NumberStyles dan CultureInfo ketika aturan harus eksplisit. Hindari mengganti semua titik menjadi koma secara membabi buta karena 1.500 dapat berarti seribu lima ratus atau satu setengah dalam konteks berbeda. Lebih baik menjelaskan format dan memvalidasinya dengan aturan yang konsisten.'],
            ['heading' => 'Uji kelompok masukan yang berbeda', 'body' => 'Susun daftar uji sebelum mengembangkan menu: teks biasa, string kosong, angka negatif, nol, batas minimum, batas maksimum, dan angka di atas maksimum. Tambahkan angka sangat panjang untuk membuktikan batas int ditangani tanpa aplikasi berhenti karena parsing. Catat keluaran yang diharapkan untuk setiap kelompok. Pendekatan ini lebih kuat daripada mencoba tiga angka acak karena setiap contoh mewakili aturan atau jalur program yang berbeda.'],
        ],
        'analogy' => 'Parsing seperti memastikan formulir berisi angka yang bisa dibaca, sementara validasi bisnis seperti memeriksa apakah jumlah kursi tersedia untuk dipesan. Batas analoginya, TryParse tidak mengenal kapasitas acara atau kebijakan penjualan; kita harus menulis pemeriksaan rentang sesudah angka berhasil dibaca.',
        'code' => <<<'CODE'
Console.Write("Jumlah kursi (1-10): ");
string? input = Console.ReadLine();

if (!int.TryParse(input, out int jumlah))
{
    Console.WriteLine("Masukkan bilangan bulat, contoh: 3.");
    return;
}

if (jumlah < 1 || jumlah > 10)
{
    Console.WriteLine("Pesanan harus antara 1 dan 10 kursi.");
    return;
}

decimal harga = 25000m;
decimal total = jumlah * harga;
Console.WriteLine($"Diterima: {jumlah} kursi. Total: {total:0}");
CODE,
        'output' => "Contoh interaksi:\nJumlah kursi (1-10): 3\nDiterima: 3 kursi. Total: 75000",
        'walkthrough' => [
            ['title' => 'Periksa bentuk data', 'explanation' => 'Tanda ! membalik hasil bool. Jika TryParse false, kondisi menjadi true, petunjuk tampil, lalu return menghentikan program.'],
            ['title' => 'Periksa kebijakan pemesanan', 'explanation' => 'Operator || berarti salah satu kondisi cukup: kurang dari satu atau lebih dari sepuluh. Nilai satu dan sepuluh sendiri diperbolehkan.'],
            ['title' => 'Hitung setelah lolos', 'explanation' => 'jumlah yang mencapai baris perkalian sudah berada dalam rentang yang disepakati. decimal harga dipakai agar tahap harga dapat dikembangkan tanpa menjadikan uang sebagai string.'],
        ],
        'mistakes' => [
            ['title' => 'Mengabaikan bool dari TryParse', 'body' => 'Nilai out saja tidak memberi bukti masukan diterima. Gunakan hasil bool untuk memilih jalur sebelum memakai jumlah.'],
            ['title' => 'Batas salah satu langkah', 'body' => 'jumlah <= 1 akan menolak satu kursi padahal aturan memperbolehkannya. Periksa nilai tepat pada kedua batas, bukan hanya nilai di tengah.'],
        ],
        'practice' => [
            ['title' => 'Petakan jalur', 'task' => 'Prediksi pesan untuk tiga, 0, 10, dan 11 tanpa menjalankan.', 'hint' => 'Pemeriksaan format terjadi sebelum rentang.', 'answer' => 'tiga gagal format; 0 gagal rentang; 10 diterima dengan total 250000; 11 gagal rentang. Pesan harus sesuai alasan pertama yang ditemukan.'],
            ['title' => 'Selidiki cast', 'task' => 'Jalankan Console.WriteLine((int)7.9m) dan bandingkan dengan perkiraanmu.', 'hint' => 'Cast ini memotong pecahan menuju nol.', 'answer' => 'Hasilnya 7, bukan 8. Jika kebutuhan meminta pembulatan, tentukan aturannya lalu gunakan operasi pembulatan secara eksplisit.'],
        ],
        'exercise' => 'Ubah aplikasi menjadi pemesanan sesi belajar dengan jumlah 1 sampai 5. Biaya per sesi 40000. Buat tabel uji untuk input kosong, abc, -1, 1, 5, dan 6.',
        'solution' => 'Ubah batas atas menjadi 5 dan harga menjadi 40000m, termasuk teks prompt. Kosong dan abc gagal format, -1 dan 6 gagal rentang, 1 menghasilkan 40000, dan 5 menghasilkan 200000. Pastikan pesan dan aturan kode diperbarui bersama.',
        'takeaways' => ['Parsing dan aturan bisnis adalah dua lapis pemeriksaan.', 'Periksa bool sebelum memakai hasil TryParse.', 'Konversi tipe dapat membuang informasi; tentukan aturan sebelum mengubahnya.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/types/how-to-convert-a-string-to-a-number',
        'sources' => [
            ['label' => 'Microsoft Learn: konversi string menjadi angka', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/types/how-to-convert-a-string-to-a-number'],
            ['label' => 'Microsoft Learn: operator aritmetika', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/operators/arithmetic-operators'],
        ],
    ],
    [
        'id' => 'debugging-dasar', 'stage' => 'fondasi', 'title' => 'Debugging: Temukan Penyebab, Bukan Tebak Perbaikan',
        'summary' => 'Gunakan prediksi, jejak nilai, breakpoint, dan kasus batas untuk memperbaiki bug secara terarah.', 'minutes' => 45,
        'objectives' => ['Membedakan kesalahan build, exception, dan kesalahan logika.', 'Mengikuti nilai variabel selama loop.', 'Memakai bukti reproduksi untuk memeriksa sebuah perbaikan.'],
        'sections' => [
            ['heading' => 'Tiga bentuk kegagalan', 'body' => 'Kesalahan build muncul sebelum aplikasi berhasil dijalankan, misalnya nama variabel salah ketik. Exception muncul ketika eksekusi menemui keadaan yang tidak dapat ditangani jalur tersebut, seperti mengakses indeks di luar array. Bug logika lebih licin: program berjalan tetapi hasilnya salah. Kalkulator rata-rata yang menampilkan 7 untuk data 7 dan 8 bisa saja tidak melempar exception. Karena itu keberhasilan build hanyalah langkah pertama pemeriksaan.'],
            ['heading' => 'Buat masalah dapat diulang', 'body' => 'Catat data masukan, langkah menjalankan, hasil aktual, dan hasil yang diharapkan. Contoh kita menghitung rata-rata tiga nilai: 70, 80, dan 95. Jumlahnya 245 dan rata-rata sekitar 81,67. Angka tertentu ini dipilih karena pembagiannya tidak bulat, sehingga kesalahan pembagian integer akan terlihat. Hindari mengubah input, rumus, dan format sekaligus; perubahan serentak menyulitkan kita mengetahui penyebab yang sebenarnya.'],
            ['heading' => 'Jejak nilai adalah bukti sederhana', 'body' => 'Sebelum memasang debugger, tambahkan WriteLine pada titik yang ingin diamati. Dalam loop contoh, cetak indeks, nilai yang dibaca, dan jumlah sementara setelah penambahan. Jejak seharusnya menunjukkan 70, lalu 150, lalu 245. Jika sudah berbeda pada putaran kedua, cari masalah di jalur penjumlahan, bukan di format akhir. Hapus atau atur keluaran diagnostik ketika aplikasi selesai agar laporan untuk pengguna tidak penuh detail internal.'],
            ['heading' => 'Breakpoint menghentikan waktu untuk diperiksa', 'body' => 'Debugger dapat berhenti pada breakpoint sehingga kita melihat variabel saat eksekusi mencapai baris itu. Step Over menjalankan langkah berikutnya tanpa mengikuti isi pemanggilan method, sedangkan Step Into berguna ketika isi method perlu ditelusuri. Lihat nilai i, nilai[i], dan total ketika loop berjalan. Nama tombol atau pintasan bergantung editor; fokus pada kemampuan berhenti, mengamati, melangkah, dan melanjutkan. Jangan mengubah nilai melalui debugger lalu menganggap kode sudah diperbaiki.'],
            ['heading' => 'Uji hipotesis tentang tipe', 'body' => 'Hipotesis bug pertama adalah pembagian integer. total dan nilai.Length sama-sama int; total / nilai.Length menghasilkan int sebelum hasil ditugaskan ke variabel lain. Menulis double rata = total / nilai.Length tetap terlambat untuk mempertahankan pecahan. Pada kode yang benar, (double)total mengubah operand sebelum pembagian. Gunakan jejak untuk membuktikan total sudah benar, lalu bandingkan pembagian dengan dan tanpa cast agar pengaruh tipe terlihat jelas.'],
            ['heading' => 'Perbaikan harus bertahan pada variasi', 'body' => 'Setelah contoh utama benar, periksa satu nilai, dua nilai berbeda, dan array kosong. Rata-rata kumpulan kosong belum mempunyai makna yang kita pilih, sehingga contoh menampilkan pesan khusus dan berhenti. Coba pula semua nilai sama agar rata-ratanya mudah diperiksa manual. Catat kasus yang pernah gagal supaya kelak dapat dijadikan pengujian otomatis. Tujuannya bukan mencari semua input di dunia, tetapi mencakup batas dan jalur yang relevan.'],
        ],
        'analogy' => 'Debugging seperti melacak paket yang salah tujuan melalui catatan tiap pos pemeriksaan. Bukti terakhir yang benar membantu mempersempit lokasi kesalahan. Batas analoginya, debugger memperlihatkan satu eksekusi dengan input tertentu; ia tidak menjamin semua kemungkinan program sudah diperiksa.',
        'code' => <<<'CODE'
int[] nilai = [70, 80, 95];
if (nilai.Length == 0)
{
    Console.WriteLine("Belum ada nilai.");
    return;
}

int total = 0;
for (int i = 0; i < nilai.Length; i++)
{
    total += nilai[i];
    Console.WriteLine($"Jejak i={i}, nilai={nilai[i]}, total={total}");
}

double rata = (double)total / nilai.Length;
Console.WriteLine(FormattableString.Invariant($"Rata-rata: {rata:F2}"));
CODE,
        'output' => "Jejak i=0, nilai=70, total=70\nJejak i=1, nilai=80, total=150\nJejak i=2, nilai=95, total=245\nRata-rata: 81.67",
        'walkthrough' => [
            ['title' => 'Tangani kumpulan kosong', 'explanation' => 'Guard pertama mencegah perhitungan rata-rata ketika tidak ada data. Ini merupakan keputusan kebutuhan: tampilkan pesan alih-alih angka yang menyesatkan.'],
            ['title' => 'Telusuri setiap penambahan', 'explanation' => 'i dimulai nol dan berhenti sebelum Length. Jejak dicetak setelah += sehingga setiap baris menunjukkan total sesudah nilai saat itu dimasukkan.'],
            ['title' => 'Pertahankan pecahan', 'explanation' => 'Cast dilakukan pada total sebelum pembagian. FormattableString.Invariant membuat titik desimal keluaran latihan konsisten; F2 membatasi tampilan menjadi dua angka desimal.'],
        ],
        'mistakes' => [
            ['title' => 'Mengganti kode tanpa reproduksi', 'body' => 'Jika langkah yang gagal belum dicatat, kamu sulit membuktikan perubahan menyelesaikan masalah yang sama. Simpan contoh input terkecil yang menunjukkan bug.'],
            ['title' => 'Menaruh total di dalam loop', 'body' => 'Deklarasi int total = 0 di setiap putaran menghapus jumlah sebelumnya. Variabel akumulasi harus hidup sepanjang keseluruhan pengulangan.'],
        ],
        'practice' => [
            ['title' => 'Ciptakan bug terkontrol', 'task' => 'Hilangkan cast (double), jalankan, lalu jelaskan mengapa hasil menjadi 81.00.', 'hint' => 'Perhatikan tipe kedua operand ketika / dievaluasi.', 'answer' => '245 / 3 dilakukan sebagai pembagian int dan menghasilkan 81. Mengubah hasil itu menjadi double tidak memulihkan pecahan yang sudah dibuang.'],
            ['title' => 'Periksa batas indeks', 'task' => 'Ubah i < nilai.Length menjadi i <= nilai.Length dan amati titik gagalnya.', 'hint' => 'Array tiga elemen tidak mempunyai indeks tiga.', 'answer' => 'Tiga putaran pertama selesai, lalu akses nilai[3] melempar IndexOutOfRangeException. Kembalikan operator < setelah observasi selesai.'],
        ],
        'exercise' => 'Buat laporan rata-rata untuk [60], [60, 80], dan []. Untuk setiap kasus, tuliskan hasil yang diharapkan lalu jalankan kode yang sama dengan data berbeda.',
        'solution' => 'Satu nilai menghasilkan 60.00, dua nilai menghasilkan 70.00, dan array kosong menghasilkan Belum ada nilai. Jejak membantu memeriksa penjumlahan, sementara pemeriksaan hasil akhir membuktikan pembagi memakai jumlah elemen yang benar.',
        'takeaways' => ['Reproduksi dan prediksi memberi ukuran keberhasilan perbaikan.', 'Amati titik terakhir yang benar sebelum mengubah kode.', 'Periksa tipe operand, lingkup variabel, dan batas loop.'],
        'source' => 'https://learn.microsoft.com/en-us/visualstudio/debugger/debugger-feature-tour?view=visualstudio',
        'sources' => [
            ['label' => 'Microsoft Learn: kemampuan debugger', 'url' => 'https://learn.microsoft.com/en-us/visualstudio/debugger/debugger-feature-tour?view=visualstudio'],
            ['label' => 'Microsoft Learn: aturan pembagian angka', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/operators/arithmetic-operators'],
        ],
    ],
    [
        'id' => 'properties-encapsulation', 'stage' => 'oop', 'title' => 'Property & Encapsulation: Jaga Keadaan Objek',
        'summary' => 'Berikan akses yang diperlukan sambil melindungi aturan saldo dan perubahan keadaan.', 'minutes' => 50,
        'objectives' => ['Membedakan field, property, dan method.', 'Memakai get serta private set untuk menjaga aturan objek.', 'Memastikan operasi yang ditolak tidak mengubah keadaan.'],
        'sections' => [
            ['heading' => 'Objek menyimpan janji, bukan hanya data', 'body' => 'Dompet latihan mempunyai aturan saldo tidak boleh negatif. Jika Saldo mempunyai setter public tanpa pemeriksaan, setiap pemanggil dapat menulis dompet.Saldo = -5000. Masalahnya bukan angka itu gagal menjadi decimal, melainkan keadaan objek melanggar janji aplikasinya. Encapsulation menempatkan keadaan dan operasi yang menjaganya pada batas yang sama. Kita ingin semua perubahan saldo melewati aturan yang dapat ditemukan dan diperiksa di satu tempat.'],
            ['heading' => 'Field dan property mempunyai peran berbeda', 'body' => 'Field menyimpan data langsung di dalam tipe. Property menyediakan anggota dengan accessor get untuk membaca dan set untuk mengubah. Auto-property seperti Saldo { get; private set; } meminta compiler menyediakan penyimpanan di baliknya. Kode luar dapat membaca Saldo, tetapi hanya kode dalam class yang dapat mengisinya. Pembatasan ini tidak otomatis membuat aturan benar; method class masih harus memeriksa setiap perubahan yang diperbolehkan.'],
            ['heading' => 'Keadaan awal harus sah', 'body' => 'Constructor contoh menerima nama pemilik, menolak nama kosong, dan memulai saldo dari nol. Parameter wajib membuat kebutuhan objek terlihat pada saat new dipanggil. ArgumentException untuk nama tidak sah menunjukkan bahwa pemanggil melanggar kontrak constructor; jalur contoh memberikan nama valid sehingga berjalan normal. Materi exception menjelaskan cara penanganannya. Hindari membuat objek setengah siap yang baru menjadi valid setelah pemanggil mengingat beberapa setter tambahan.'],
            ['heading' => 'Method menyatakan maksud perubahan', 'body' => 'TrySetor dan TryTarik lebih bermakna daripada menyediakan SetSaldo untuk semua kebutuhan. TrySetor menolak nominal nol atau negatif. TryTarik juga menolak nominal yang melebihi saldo. Nilai bool menjelaskan apakah operasi diterima; saldo hanya berubah setelah pemeriksaan lolos. Dengan desain ini, pemanggil tidak perlu menyalin rumus validasi yang sama di setiap layar. Ia meminta tindakan dan kemudian memilih pesan untuk pengguna berdasarkan hasilnya.'],
            ['heading' => 'Pilih bentuk akses berdasarkan kebutuhan', 'body' => 'Property Pemilik memakai get saja dan diisi constructor; Saldo dapat berubah dari dalam class. init adalah pilihan lain ketika pemanggil boleh memberi nilai saat inisialisasi tetapi tidak mengatur ulang property setelahnya. Namun get saja atau init tidak selalu membuat seluruh grafik objek kebal perubahan: bila sebuah property memberikan List yang bisa diubah, isi list masih mungkin berubah. Pelindungan perlu dinilai pada data yang benar-benar diekspos, bukan hanya kata kuncinya.'],
            ['heading' => 'Periksa perubahan dan ketiadaan perubahan', 'body' => 'Uji dompet dari saldo nol, setor 50000, tarik 15000, lalu coba tarik 40000. Operasi terakhir harus gagal dan saldo tetap 35000. Banyak bug terjadi karena saldo dikurangi sebelum aturan diperiksa. Jangan hanya menguji pesan gagal; periksa keadaan setelah kegagalan. Untuk latihan ini angka sangat besar dan pembulatan bukan kebutuhan utama. Jika dompet berkembang menjadi produk nyata, kontrak batas nominal juga perlu dirancang secara eksplisit.'],
        ],
        'analogy' => 'Encapsulation seperti meja layanan perpustakaan: pengunjung boleh melihat status buku dan meminta peminjaman, tetapi perubahan catatan dilakukan melalui prosedur petugas. Batas analoginya, private adalah pembatas akses dalam program, bukan sistem keamanan akun atau pengganti izin pengguna di aplikasi web.',
        'code' => <<<'CODE'
var dompet = new Dompet("Habib");
Console.WriteLine($"Setor diterima: {dompet.TrySetor(50000m)}");
Console.WriteLine($"Tarik diterima: {dompet.TryTarik(15000m)}");
Console.WriteLine($"Tarik berlebih: {dompet.TryTarik(40000m)}");
Console.WriteLine($"Saldo {dompet.Pemilik}: {dompet.Saldo:0}");

class Dompet
{
    public string Pemilik { get; }
    public decimal Saldo { get; private set; }

    public Dompet(string pemilik)
    {
        if (string.IsNullOrWhiteSpace(pemilik))
            throw new ArgumentException("Pemilik wajib diisi.", nameof(pemilik));
        Pemilik = pemilik.Trim();
    }

    public bool TrySetor(decimal nominal)
    {
        if (nominal <= 0) return false;
        Saldo += nominal;
        return true;
    }

    public bool TryTarik(decimal nominal)
    {
        if (nominal <= 0 || nominal > Saldo) return false;
        Saldo -= nominal;
        return true;
    }
}
CODE,
        'output' => "Setor diterima: True\nTarik diterima: True\nTarik berlebih: False\nSaldo Habib: 35000",
        'walkthrough' => [
            ['title' => 'Bentuk objek yang siap dipakai', 'explanation' => 'Constructor memastikan nama tersedia. Saldo decimal mendapatkan nilai awal nol sehingga penyetoran pertama dimulai dari keadaan yang jelas.'],
            ['title' => 'Periksa sebelum mutasi', 'explanation' => 'Kedua method mengembalikan false sebelum menyentuh Saldo ketika nominal tidak diterima. Ini menjaga saldo tetap sama pada jalur gagal.'],
            ['title' => 'Pisahkan aturan dari pesan', 'explanation' => 'Dompet mengembalikan bool dan menyimpan saldo. Console.WriteLine berada di pemanggil sehingga class tidak terikat pada tampilan terminal.'],
        ],
        'mistakes' => [
            ['title' => 'Setter public membuka jalan memintas aturan', 'body' => 'Jika Saldo dapat diisi sembarang dari luar, TryTarik bukan lagi satu-satunya jalur perubahan. Aturan mudah terlewati oleh pemanggil lain.'],
            ['title' => 'Mengubah saldo sebelum validasi', 'body' => 'Mengurangi saldo lalu mengembalikan false sudah merusak keadaan. Tempatkan pemeriksaan sebelum operasi, lalu uji saldo sesudah penolakan.'],
        ],
        'practice' => [
            ['title' => 'Kasus nominal nol', 'task' => 'Panggil TrySetor(0m) dan TryTarik(-100m) setelah data contoh.', 'hint' => 'Keduanya masuk guard yang sama tentang nominal positif.', 'answer' => 'Kedua hasil false dan saldo tetap 35000. Penarikan negatif tidak boleh berubah menjadi penambahan saldo.'],
            ['title' => 'Tarik sampai habis', 'task' => 'Tarik persis 35000 sesudah contoh, lalu tarik satu lagi.', 'hint' => 'Kondisi penolakan memakai > Saldo, bukan >= Saldo.', 'answer' => 'Penarikan pertama true dan saldo nol. Penarikan kedua false dan saldo tetap nol karena dana sudah habis.'],
        ],
        'exercise' => 'Tambahkan property JumlahTransaksi yang hanya bisa diubah class. Naikkan hitungannya hanya setelah penyetoran atau penarikan berhasil, lalu tampilkan sesudah contoh.',
        'solution' => 'Buat public int JumlahTransaksi { get; private set; }. Tambahkan JumlahTransaksi++ setelah perubahan saldo pada masing-masing method, sebelum return true. Contoh menghasilkan dua transaksi; percobaan penarikan berlebih tidak dihitung sebagai transaksi berhasil.',
        'takeaways' => ['Property membentuk pintu akses terhadap keadaan.', 'Nama method sebaiknya menunjukkan maksud bisnis.', 'Penolakan operasi harus menjaga keadaan tetap sah.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/properties',
        'sources' => [
            ['label' => 'Microsoft Learn: properties', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/properties'],
            ['label' => 'Microsoft Learn: access modifiers', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/access-modifiers'],
            ['label' => 'Microsoft Learn: init accessor', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/keywords/init'],
        ],
    ],
    [
        'id' => 'struct-enum-record', 'stage' => 'oop', 'title' => 'Struct, Enum & Record: Pilih Bentuk Data',
        'summary' => 'Modelkan kategori, nilai kecil, dan data yang dibandingkan berdasarkan isinya dengan tepat.', 'minutes' => 55,
        'objectives' => ['Menggunakan enum untuk nama kategori yang jelas.', 'Membedakan penyalinan value type dari referensi class.', 'Memahami equality record dan batas salinan with.'],
        'sections' => [
            ['heading' => 'Model mengikuti arti data', 'body' => 'Satu aplikasi peminjaman memerlukan beberapa bentuk data. Status buku hanya mempunyai sejumlah pilihan yang dikenal. Letak rak dapat dinyatakan oleh lorong dan nomor rak. Sebuah permintaan pinjam membawa kode buku dan durasi. Tidak semua data harus menjadi class dengan setter bebas. Pertanyaan awalnya adalah apakah data mempunyai identitas yang hidup dan berubah, atau lebih tepat dipahami sebagai sebuah nilai yang dapat disalin serta dibandingkan.'],
            ['heading' => 'Enum memberi nama pada pilihan', 'body' => 'enum StatusBuku membuat Tersedia dan Dipinjam lebih jelas daripada angka 0 dan 1 yang tersebar. Anggota enum mempunyai nilai dasar integer, sehingga konversi angka dari luar tetap memerlukan pemeriksaan. Cast dari angka sembarang tidak otomatis menjamin angka tersebut merupakan anggota yang didefinisikan. Untuk contoh internal, kita memakai nama anggota langsung. Bila status datang dari API atau file, validasi pada batas masukan tetap diperlukan.'],
            ['heading' => 'Struct mempunyai semantik nilai', 'body' => 'Struct adalah value type. Penugasan biasa menyalin nilainya, bukan sekadar membuat dua nama untuk instance struct yang sama. Ini sesuai untuk data kecil seperti koordinat atau pasangan angka. Namun bila struct memuat referensi ke objek yang dapat berubah, penyalinan referensi itu tidak menggandakan objek di belakangnya. Karena itu semantik nilai bukan janji salinan mendalam. Hindari memilih struct hanya berdasarkan dugaan lebih cepat; arti dan perilaku data lebih penting pada tahap ini.'],
            ['heading' => 'Record membantu perbandingan data', 'body' => 'record class menambahkan perilaku seperti kesetaraan berdasarkan anggota data yang dihasilkan compiler. Dua PermintaanPinjam dengan kode dan durasi sama pada contoh dibandingkan setara walau dibuat dengan new terpisah. Ini berguna untuk objek pembawa data. Untuk objek entitas yang dibedakan oleh identitas dan perjalanan hidupnya, seperti satu eksemplar buku fisik, class biasa sering lebih mudah menjelaskan perubahan status serta aturan operasinya.'],
            ['heading' => 'With membuat variasi, bukan perubahan asal', 'body' => 'Ekspresi permintaan with { Hari = 14 } membuat salinan dengan durasi berbeda; permintaan asal tetap mempunyai Hari 7. Namun with melakukan salinan dangkal. Jika record mempunyai List di dalamnya, asal dan salinan dapat masih menunjuk list yang sama. Record juga dapat dideklarasikan dengan property yang bisa diubah, sehingga menyebut semua record immutable adalah keliru. Nilailah accessor dan seluruh data yang dapat dijangkau oleh property tersebut.'],
            ['heading' => 'Gabungkan pilihan secara sederhana', 'body' => 'Contoh memakai readonly record struct untuk PosisiRak yang berisi dua int. Data kecil ini mempunyai semantik nilai dan perbandingan yang praktis. PermintaanPinjam memakai record class positional dengan string dan int. Status memakai enum. Jalankan empat observasi: perbandingan dua permintaan, durasi sebelum dan sesudah with, letak rak, serta nama status. Dengan mengamati hasil itu, pemilihan tipe dikaitkan dengan perilaku nyata, bukan menghafal tiga definisi terpisah.'],
        ],
        'analogy' => 'Enum seperti daftar status pada kartu, struct seperti koordinat yang ditulis ulang pada kertas lain, dan record seperti formulir yang dibandingkan isian pentingnya. Batas analoginya, salinan formulir digital bisa tetap berbagi objek rujukan seperti daftar lampiran; menyalin wadah tidak selalu menyalin seluruh isinya.',
        'code' => <<<'CODE'
StatusBuku status = StatusBuku.Tersedia;
var lokasi = new PosisiRak(2, 5);
var pertama = new PermintaanPinjam("BK-01", 7);
var kedua = new PermintaanPinjam("BK-01", 7);
var diperpanjang = pertama with { Hari = 14 };

Console.WriteLine($"Permintaan setara: {pertama == kedua}");
Console.WriteLine($"Durasi: {pertama.Hari} -> {diperpanjang.Hari}");
Console.WriteLine($"Lokasi: lorong {lokasi.Lorong}, rak {lokasi.Rak}");
Console.WriteLine($"Status: {status}");

enum StatusBuku { Tersedia, Dipinjam }
readonly record struct PosisiRak(int Lorong, int Rak);
record PermintaanPinjam(string KodeBuku, int Hari);
CODE,
        'output' => "Permintaan setara: True\nDurasi: 7 -> 14\nLokasi: lorong 2, rak 5\nStatus: Tersedia",
        'walkthrough' => [
            ['title' => 'Pilih nama kategori', 'explanation' => 'StatusBuku.Tersedia menyatakan maksud tanpa angka ajaib. Menampilkan enum ini memberi nama anggota yang digunakan dalam contoh.'],
            ['title' => 'Bandingkan isian permintaan', 'explanation' => 'pertama dan kedua dibuat secara terpisah, tetapi kode dan Hari keduanya sama. Equality record membuat perbandingan == menghasilkan true untuk data ini.'],
            ['title' => 'Buat permintaan lain', 'explanation' => 'with menghasilkan diperpanjang dengan Hari 14. Baris keluaran membuktikan pertama.Hari tetap 7 sehingga variasi tidak mengganti property asal.'],
        ],
        'mistakes' => [
            ['title' => 'Menganggap enum memvalidasi angka dari luar', 'body' => 'Nilai (StatusBuku)99 dapat dibuat walau tidak ada anggota bernama 99. Gunakan pemeriksaan seperti Enum.IsDefined untuk batas input yang memerlukannya.'],
            ['title' => 'Menyamakan with dengan salinan mendalam', 'body' => 'Property yang menunjuk objek lain dapat tetap berbagi referensi setelah with. Tentukan kepemilikan dan mutabilitas data anggota sebelum mengandalkan salinan.'],
        ],
        'practice' => [
            ['title' => 'Ubah satu anggota', 'task' => 'Bandingkan pertama dengan diperpanjang, lalu jelaskan hasilnya.', 'hint' => 'Durasi merupakan salah satu anggota data record.', 'answer' => 'Hasilnya false karena Hari berbeda, walaupun KodeBuku sama. Kesamaan satu property saja tidak cukup untuk equality record ini.'],
            ['title' => 'Status tambahan', 'task' => 'Tambahkan anggota Perbaikan dan tampilkan status baru tersebut.', 'hint' => 'Tambahkan nama pada deklarasi enum lalu gunakan nama lengkap tipenya.', 'answer' => 'Tambahkan Perbaikan setelah Dipinjam, kemudian isi status = StatusBuku.Perbaikan. Keluaran nama status berubah menjadi Perbaikan.'],
        ],
        'exercise' => 'Buat readonly record struct Ukuran(int Lebar, int Tinggi). Buat dua ukuran 10 × 20 serta satu variasi dengan Tinggi 30. Tampilkan equality dan tinggi kedua versi.',
        'solution' => 'Dua new Ukuran(10, 20) dibandingkan setara. Bentuk awal with { Tinggi = 30 } menghasilkan nilai baru yang tidak setara dengan awal. Tinggi awal tetap 20 dan tinggi variasi 30. Contoh memakai int sehingga tidak mempunyai objek mutable yang dibagikan.',
        'takeaways' => ['Enum memberi nama kategori, tetapi data eksternal tetap perlu validasi.', 'Struct menyalin nilai; anggota referensi tetap perlu perhatian.', 'Record membantu equality dan salinan variasi, bukan jaminan immutability mendalam.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/builtin-types/record',
        'sources' => [
            ['label' => 'Microsoft Learn: records', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/builtin-types/record'],
            ['label' => 'Microsoft Learn: struct', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/builtin-types/struct'],
            ['label' => 'Microsoft Learn: enum', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/builtin-types/enum'],
        ],
    ],
    [
        'id' => 'komposisi-objek', 'stage' => 'oop', 'title' => 'Komposisi: Merakit Perilaku dari Objek Kecil',
        'summary' => 'Bangun layanan yang memakai komponen lain sehingga aturan dapat diganti tanpa hierarki turunan yang rumit.', 'minutes' => 50,
        'objectives' => ['Membedakan hubungan mempunyai dari hubungan merupakan.', 'Mengirim dependency melalui constructor.', 'Mengganti kebijakan perhitungan melalui interface kecil.'],
        'sections' => [
            ['heading' => 'Objek dapat bekerja sama', 'body' => 'Sebuah layanan peminjaman tidak harus mengerjakan semua hal sendiri. Ia dapat memakai komponen penghitung biaya, sementara komponen itu fokus pada aturan tarif. Hubungan ini disebut komposisi dalam pembahasan desain perangkat lunak: perilaku yang lebih besar dirakit dari objek yang bekerja sama. Pada contoh, LayananSewa mempunyai akses ke IAturanTarif. LayananSewa bukan jenis tarif, sehingga menjadikannya turunan TarifHarian akan menyatakan hubungan yang membingungkan.'],
            ['heading' => 'Kontrak menyebut kemampuan yang dibutuhkan', 'body' => 'IAturanTarif hanya meminta method Hitung dengan input jumlah hari dan keluaran decimal. Layanan tidak perlu mengetahui rumus setiap tarif, selama kontraknya dipenuhi. Sebelum menulis interface, tetapkan juga aturan yang tidak terlihat dari tanda tangan saja: hari tidak boleh negatif, hasil memakai satuan rupiah, dan nol hari menghasilkan nol biaya. Tipe method membantu compiler, sedangkan kesepakatan perilaku membantu manusia membuat implementasi yang dapat dipertukarkan.'],
            ['heading' => 'Constructor memperlihatkan ketergantungan', 'body' => 'LayananSewa menerima IAturanTarif pada constructor lalu menyimpannya dalam field readonly. Pemanggil bertanggung jawab merakit pilihan tarif. Ini adalah dependency injection melalui constructor tanpa membutuhkan pustaka atau container tambahan. Dependency berarti komponen yang diperlukan untuk menjalankan pekerjaan. Bentuk readonly melindungi field agar rujukannya tidak diatur ulang setelah konstruksi; itu tidak menjamin objek yang dirujuk tidak mempunyai keadaan yang bisa berubah.'],
            ['heading' => 'Dua kebijakan, satu cara memanggil', 'body' => 'TarifHarian menghitung semua hari, sedangkan TarifGratisSehari memberikan satu hari pertama gratis. Keduanya dapat digunakan layanan yang sama tanpa if yang memeriksa nama class. Layanan tetap memanggil Hitung dan mengembalikan hasilnya. Keuntungan baru terasa ketika variasi memang ada. Jangan membuat interface untuk setiap class secara otomatis; jika belum ada perbedaan perilaku atau batas yang perlu dipisahkan, kelas sederhana bisa lebih mudah dipahami dan dirawat.'],
            ['heading' => 'Jaga tanggung jawab pemeriksaan', 'body' => 'Validasi hari ditempatkan di HitungBiaya pada layanan karena itulah pintu yang digunakan pemanggil aplikasi contoh. Implementasi tarif pada latihan juga menolak hari negatif agar kontraknya konsisten bila dipakai langsung. Duplikasi kecil pemeriksaan prasyarat bisa masuk akal pada batas publik yang berbeda. Yang perlu dihindari adalah menyalin seluruh aturan bisnis ke banyak lokasi tanpa tahu mana yang menjadi sumber kebenarannya ketika kebijakan berubah.'],
            ['heading' => 'Buktikan kemudahan mengganti komponen', 'body' => 'Untuk tiga hari dengan tarif harian 5000, layanan normal menghasilkan 15000 dan layanan promosi 10000. Sekarang bayangkan aturan akhir pekan; kita dapat menambah implementasi yang sesuai kebutuhan tanpa menyisipkan logika promosi ke layanan. Namun kontrak mungkin perlu berkembang jika tanggal mulai dibutuhkan. Komposisi memudahkan perubahan yang cocok dengan batas awal, tetapi tidak menghapus kebutuhan merancang ulang ketika informasi masukan bisnis berubah.'],
        ],
        'analogy' => 'Komposisi seperti mesin kopi yang menggunakan penggiling: mesin memakai kemampuan komponen, bukan menjadi jenis penggiling. Penggiling dapat diganti selama sambungannya cocok. Batas analoginya, interface yang cocok secara sintaks belum menjamin perilaku dan satuan sama; kontrak tarif juga perlu menyatakan makna hasilnya.',
        'code' => <<<'CODE'
var normal = new LayananSewa(new TarifHarian());
var promo = new LayananSewa(new TarifGratisSehari());
Console.WriteLine($"Normal 3 hari: {normal.HitungBiaya(3):0}");
Console.WriteLine($"Promo 3 hari: {promo.HitungBiaya(3):0}");

interface IAturanTarif
{
    decimal Hitung(int hari);
}

class TarifHarian : IAturanTarif
{
    public decimal Hitung(int hari)
    {
        ArgumentOutOfRangeException.ThrowIfNegative(hari);
        return hari * 5000m;
    }
}

class TarifGratisSehari : IAturanTarif
{
    public decimal Hitung(int hari)
    {
        ArgumentOutOfRangeException.ThrowIfNegative(hari);
        return Math.Max(0, hari - 1) * 5000m;
    }
}

class LayananSewa
{
    private readonly IAturanTarif _tarif;
    public LayananSewa(IAturanTarif tarif)
    {
        ArgumentNullException.ThrowIfNull(tarif);
        _tarif = tarif;
    }

    public decimal HitungBiaya(int hari)
    {
        ArgumentOutOfRangeException.ThrowIfNegative(hari);
        return _tarif.Hitung(hari);
    }
}
CODE,
        'output' => "Normal 3 hari: 15000\nPromo 3 hari: 10000",
        'walkthrough' => [
            ['title' => 'Rakit dua layanan', 'explanation' => 'Dua pemanggilan constructor LayananSewa menerima implementasi berbeda. Pilihan kebijakan terjadi di titik perakitan, bukan tersembunyi di method hitung.'],
            ['title' => 'Terapkan rumus promosi', 'explanation' => 'Math.Max menjaga hari berbayar minimal nol. Untuk tiga hari, tiga dikurangi satu menghasilkan dua hari berbayar.'],
            ['title' => 'Delegasikan pekerjaan', 'explanation' => 'HitungBiaya memastikan argumen sah kemudian menyerahkan perhitungan kepada _tarif. Nilai decimal dikembalikan agar pemanggil dapat menentukan format tampilannya.'],
        ],
        'mistakes' => [
            ['title' => 'Membuat dependency sendiri di layanan', 'body' => 'Menulis new TarifHarian di dalam HitungBiaya mengunci pilihan kebijakan. Constructor injection membuat pilihan itu terlihat dan dapat diganti.'],
            ['title' => 'Memakai inheritance hanya agar bisa memanggil method', 'body' => 'Kemampuan memakai objek lain tidak mensyaratkan menjadi turunannya. Pilih komposisi ketika hubungan yang dimaksud adalah menggunakan atau mempunyai.'],
        ],
        'practice' => [
            ['title' => 'Hari pertama gratis', 'task' => 'Prediksi biaya promo untuk nol, satu, dan dua hari.', 'hint' => 'Hitung jumlah hari berbayar sebelum mengalikannya.', 'answer' => 'Nol hari menghasilkan 0, satu hari 0, dan dua hari 5000. Nilai negatif ditolak oleh prasyarat method.'],
            ['title' => 'Tarif anggota', 'task' => 'Buat TarifAnggota yang mengenakan 3000 per hari.', 'hint' => 'Implementasikan kontrak yang sama, lalu berikan pada constructor layanan.', 'answer' => 'Class baru mengimplementasikan IAturanTarif, memvalidasi hari, dan mengembalikan hari * 3000m. Untuk tiga hari hasilnya 9000 tanpa mengubah LayananSewa.'],
        ],
        'exercise' => 'Buat TarifMaksimalHarian dengan biaya 5000 per hari tetapi total maksimal 20000. Uji satu, empat, dan tujuh hari menggunakan LayananSewa yang sama.',
        'solution' => 'Setelah menolak hari negatif, kembalikan Math.Min(hari * 5000m, 20000m). Hasilnya 5000, 20000, dan 20000. Tarif baru cukup diberikan melalui constructor; method layanan tidak perlu mengetahui alasan batas tersebut.',
        'takeaways' => ['Komposisi menyatakan kerja sama antarobjek.', 'Constructor injection bisa digunakan tanpa container.', 'Kontrak harus menjelaskan perilaku dan satuan selain tipe.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/overview',
        'sources' => [
            ['label' => 'Microsoft Learn: dependency injection', 'url' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/overview'],
            ['label' => 'Microsoft Learn: interface sebagai kontrak perilaku', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/interfaces'],
        ],
    ],
    [
        'id' => 'prinsip-solid', 'stage' => 'oop', 'title' => 'SOLID dengan Contoh yang Masuk Akal',
        'summary' => 'Gunakan lima pertanyaan desain untuk mengurangi perubahan yang menyebar, tanpa memperbanyak class secara asal.', 'minutes' => 55,
        'objectives' => ['Mengenali alasan memisahkan perhitungan dan tampilan.', 'Menjelaskan S, O, L, I, dan D melalui kontrak kecil.', 'Menilai manfaat abstraksi dibanding biaya kerumitannya.'],
        'sections' => [
            ['heading' => 'Mulai dari perubahan yang terasa sakit', 'body' => 'Bayangkan satu class menangani hitung ongkir, cetak struk, baca keyboard, dan simpan file. Saat desain struk berubah, kita harus membuka class yang juga memuat aturan ongkir. Kesalahan edit bisa memengaruhi pekerjaan lain. SOLID adalah lima prinsip untuk menilai pembagian tanggung jawab serta ketergantungan. Ia membantu mengajukan pertanyaan, bukan mewajibkan lima lapisan pada program sepuluh baris. Gunakan persoalan nyata sebagai alasan setiap pemisahan.'],
            ['heading' => 'S: satu alasan perubahan yang kohesif', 'body' => 'Single Responsibility Principle mendorong satu tanggung jawab yang jelas. KalkulatorPesanan menghitung total, sementara Console.WriteLine menentukan tampilan. Mengganti label menjadi bahasa lain tidak memerlukan perubahan rumus. Satu tanggung jawab tidak berarti satu method per class; beberapa method dapat melayani tujuan yang sama. Uji dengan bertanya siapa yang meminta perubahan dan mengapa. Bila perubahan tampilan dan kebijakan harga selalu bercampur, batas tanggung jawab mungkin terlalu lebar.'],
            ['heading' => 'O: perluas pada titik variasi yang diketahui', 'body' => 'Open/Closed Principle mendorong penambahan perilaku melalui titik perluasan yang stabil. IAturanOngkir memungkinkan OngkirTetap dan OngkirGratisBatas digunakan kalkulator yang sama. Kita menambah aturan baru tanpa menambah if untuk setiap nama class pada kalkulator. Namun prinsip ini tidak berarti file lama tidak pernah boleh diedit. Saat kebutuhan input berubah, kontrak juga mungkin perlu diperbaiki. Rancang untuk variasi yang masuk akal, bukan seluruh kemungkinan imajiner.'],
            ['heading' => 'L: pengganti harus menepati janji', 'body' => 'Liskov Substitution Principle menanyakan apakah implementasi pengganti tetap memenuhi harapan pemanggil. Semua IAturanOngkir contoh menerima subtotal nonnegatif, menghasilkan ongkir nonnegatif, dan memakai satuan yang sama. Implementasi yang diam-diam mengembalikan persentase atau menolak subtotal nol akan mengejutkan pemanggil walaupun tanda tangan method cocok. Compiler memeriksa tipe; kita memeriksa kontrak perilaku. Pengujian kasus yang sama terhadap setiap implementasi membantu menemukan perbedaan yang melanggar janji.'],
            ['heading' => 'I dan D: kontrak kecil, arah ketergantungan jelas', 'body' => 'Interface Segregation Principle menghindari kontrak gemuk yang memaksa pemakai bergantung pada kemampuan tak diperlukan. Penghitung ongkir tidak perlu sekaligus mempunyai CetakPdf dan KirimEmail. Dependency Inversion Principle membuat kebijakan perhitungan bergantung pada abstraksi kemampuan yang diperlukan, bukan detail pengiriman tertentu. Pada contoh, constructor KalkulatorPesanan menerima IAturanOngkir. Merakit implementasi tetap diperlukan di luar kalkulator; dependency inversion tidak menghilangkan semua pemakaian new dari aplikasi.'],
            ['heading' => 'Refactor sambil mempertahankan perilaku', 'body' => 'Catat hasil total sebelum mengubah struktur, lakukan satu pemisahan, lalu jalankan kembali kasus yang sama. Untuk subtotal 120000, ongkir tetap 10000 menghasilkan 130000; promo gratis di batas 100000 menghasilkan 120000. Uji pula tepat di bawah dan tepat pada batas promosi. Jika struktur menjadi jauh lebih panjang tanpa perubahan yang terbantu, sederhanakan. Desain yang baik memudahkan penjelasan dan perubahan berikutnya, bukan sekadar memakai banyak nama prinsip.'],
        ],
        'analogy' => 'SOLID seperti pembagian tugas dapur: bagian memasak tidak perlu berubah ketika desain nota diganti, dan pemasok pengganti harus memberikan bahan sesuai spesifikasi. Batas analoginya, tim nyata dapat bernegosiasi langsung; komponen perangkat lunak memerlukan kontrak yang tertulis serta diperiksa lewat kode dan pengujian.',
        'code' => <<<'CODE'
var reguler = new KalkulatorPesanan(new OngkirTetap());
var promo = new KalkulatorPesanan(new OngkirGratisBatas());
Console.WriteLine($"Reguler: {reguler.HitungTotal(120000m):0}");
Console.WriteLine($"Promo: {promo.HitungTotal(120000m):0}");

interface IAturanOngkir
{
    decimal Hitung(decimal subtotal);
}

class OngkirTetap : IAturanOngkir
{
    public decimal Hitung(decimal subtotal)
    {
        ArgumentOutOfRangeException.ThrowIfNegative(subtotal);
        return 10000m;
    }
}

class OngkirGratisBatas : IAturanOngkir
{
    public decimal Hitung(decimal subtotal)
    {
        ArgumentOutOfRangeException.ThrowIfNegative(subtotal);
        return subtotal >= 100000m ? 0m : 10000m;
    }
}

class KalkulatorPesanan
{
    private readonly IAturanOngkir _ongkir;
    public KalkulatorPesanan(IAturanOngkir ongkir)
    {
        ArgumentNullException.ThrowIfNull(ongkir);
        _ongkir = ongkir;
    }

    public decimal HitungTotal(decimal subtotal)
    {
        ArgumentOutOfRangeException.ThrowIfNegative(subtotal);
        return subtotal + _ongkir.Hitung(subtotal);
    }
}
CODE,
        'output' => "Reguler: 130000\nPromo: 120000",
        'walkthrough' => [
            ['title' => 'Pisahkan keluaran', 'explanation' => 'Console.WriteLine hanya berada pada program pemanggil. KalkulatorPesanan menghasilkan angka yang juga bisa dipakai antarmuka web atau pengujian.'],
            ['title' => 'Tetapkan titik variasi', 'explanation' => 'IAturanOngkir mempunyai satu kemampuan yang dibutuhkan kalkulator. Kedua implementasi memakai argumen serta satuan keluaran yang sama.'],
            ['title' => 'Gunakan kontrak di kalkulator', 'explanation' => 'HitungTotal tidak mengenal nama OngkirTetap atau OngkirGratisBatas. Ia menambahkan hasil kontrak ke subtotal setelah memeriksa prasyarat.'],
        ],
        'mistakes' => [
            ['title' => 'Interface untuk setiap class tanpa alasan', 'body' => 'Abstraksi menambah nama dan hubungan yang harus dipahami. Buat ketika ada batas atau variasi yang nyata, bukan sebagai syarat agar kode terlihat profesional.'],
            ['title' => 'Hanya mencocokkan tanda tangan', 'body' => 'Implementasi yang menghasilkan nilai negatif tetap dapat memenuhi tipe decimal. Kontrak perilaku memerlukan dokumentasi dan pemeriksaan tersendiri.'],
        ],
        'practice' => [
            ['title' => 'Uji batas promosi', 'task' => 'Hitung total promo untuk subtotal 99999 dan 100000.', 'hint' => 'Satu nilai tepat di bawah batas, satu tepat pada batas.', 'answer' => '99999 dikenai ongkir 10000 sehingga total 109999. Subtotal 100000 sudah gratis ongkir sehingga totalnya 100000.'],
            ['title' => 'Temukan tanggung jawab campuran', 'task' => 'Apakah menyimpan riwayat ke file perlu dimasukkan ke IAturanOngkir?', 'hint' => 'Pikirkan pemakai yang hanya perlu menghitung biaya.', 'answer' => 'Tidak perlu pada kontrak ini. Riwayat merupakan kemampuan lain yang dapat dikoordinasikan layanan terpisah tanpa membebani setiap penghitung ongkir.'],
        ],
        'exercise' => 'Tambahkan OngkirAnggota yang selalu menghasilkan 5000 untuk subtotal nonnegatif. Gunakan kalkulator yang sama, lalu jelaskan prinsip yang tampak dari perubahanmu.',
        'solution' => 'Implementasi baru memvalidasi subtotal lalu mengembalikan 5000m. Berikan melalui constructor KalkulatorPesanan; subtotal 120000 menjadi 125000. Perubahan menunjukkan titik perluasan O dan ketergantungan pada abstraksi D, sementara kontrak input serta satuan yang sama menjaga L.',
        'takeaways' => ['Gunakan prinsip untuk menjawab masalah perubahan yang konkret.', 'Kontrak perilaku sama penting dengan tanda tangan method.', 'Tambahkan abstraksi ketika manfaatnya lebih besar daripada kerumitannya.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/architecture/modern-web-apps-azure/architectural-principles',
        'sources' => [
            ['label' => 'Microsoft Learn: prinsip arsitektur', 'url' => 'https://learn.microsoft.com/en-us/dotnet/architecture/modern-web-apps-azure/architectural-principles'],
            ['label' => 'Microsoft Learn: dependency injection', 'url' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/overview'],
            ['label' => 'Microsoft Learn: pedoman desain interface', 'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/design-guidelines/interface'],
        ],
    ],
    [
        'id' => 'proyek-perpustakaan', 'stage' => 'oop', 'title' => 'Proyek: Perpustakaan Console dengan Aturan Peminjaman',
        'summary' => 'Satukan koleksi, objek, validasi, dan perubahan status menjadi proyek yang dapat diperiksa dari ujung ke ujung.', 'minutes' => 90,
        'objectives' => ['Memodelkan satu eksemplar buku dengan kode unik.', 'Membedakan kode tidak ditemukan dari buku yang sedang dipinjam.', 'Membuat skenario penerimaan dan pengembangan proyek bertahap.'],
        'sections' => [
            ['heading' => 'Tetapkan ruang lingkup yang dapat selesai', 'body' => 'Versi pertama mempunyai katalog dua eksemplar buku, pencarian berdasarkan kode, peminjaman, dan pengembalian. Setiap kode mewakili satu eksemplar fisik; dua buku dengan judul sama harus mempunyai kode berbeda. Data berada di memori dan kembali ke keadaan awal ketika aplikasi dijalankan ulang. Kita sengaja memulai dari operasi domain yang dapat diperiksa sebelum menambahkan menu, anggota, atau penyimpanan. Daftar kebutuhan kecil ini membuat hasil proyek bisa dinilai secara konkret.'],
            ['heading' => 'Buku menjaga perubahan statusnya', 'body' => 'Class Buku mempunyai Judul yang dibaca dari luar dan Dipinjam dengan private set. TryPinjam menolak bila sudah dipinjam; TryKembalikan menolak bila sudah tersedia. Keduanya mengembalikan bool dan tidak mencetak pesan. Pemisahan itu membuat aturan yang sama dapat digunakan menu console maupun antarmuka lain. Perubahan status hanya dilakukan setelah pemeriksaan berhasil, sehingga percobaan kedua tidak membalik status secara tidak sengaja.'],
            ['heading' => 'Katalog menghubungkan kode dengan eksemplar', 'body' => 'Dictionary<string, Buku> memetakan kode unik ke objek. StringComparer.OrdinalIgnoreCase dipilih agar BK-01 dan bk-01 dianggap kode yang sama pada latihan. TryGetValue memeriksa apakah kode ada sambil mengambil referensi bukunya. Buku tidak ditemukan berbeda dari buku ditemukan tetapi tidak tersedia; pengguna membutuhkan pesan yang berbeda untuk kedua kejadian. Jangan memakai indeks dictionary secara langsung jika keberadaan kode belum dipastikan oleh alur program.'],
            ['heading' => 'Pemanggil menerjemahkan hasil menjadi pesan', 'body' => 'Local function Pinjam menerima kode, mencari buku, lalu meminta TryPinjam. Local function adalah fungsi yang dideklarasikan di dalam lingkup lain; pada program top-level ini ia dapat memakai katalog dari lingkup program. Pola ini cukup untuk proyek kecil. Saat program tumbuh, pindahkan koordinasi katalog ke layanan dengan ketergantungan yang eksplisit. Jangan memindahkan semua kode ke banyak file sebelum batas tugasnya dapat dijelaskan dengan kalimat sederhana.'],
            ['heading' => 'Buat skenario penerimaan sebelum menu', 'body' => 'Urutannya: pinjam BK-01, pinjam lagi kode yang sama dengan kapital berbeda, coba kode yang tidak ada, kembalikan BK-01, kemudian pinjam kembali. Hasil yang diharapkan adalah berhasil, ditolak karena sudah dipinjam, tidak ditemukan, berhasil kembali, lalu berhasil pinjam. Skenario ini memeriksa perubahan keadaan lintas beberapa operasi. Satu pemanggilan berhasil saja belum menguji aturan penolakan maupun kemampuan kembali ke keadaan yang tersedia.'],
            ['heading' => 'Kembangkan dari inti yang sudah bekerja', 'body' => 'Sesudah skenario lulus, tambahkan loop menu dengan pilihan lihat katalog, pinjam, kembalikan, dan keluar. Gunakan ReadLine serta validasi pilihan. Berikutnya tambahkan kode anggota dan tanggal pinjam sebagai kebutuhan baru, bukan sekadar property tanpa aturan. Penyimpanan JSON dapat datang pada tahap lanjutan agar data bertahan setelah restart. Untuk penggunaan banyak pengguna sekaligus, penyimpanan dan pemeriksaan atomik memerlukan rancangan tambahan; dictionary dalam satu proses latihan belum menyelesaikan kebutuhan itu.'],
        ],
        'analogy' => 'Katalog seperti kartu lokasi buku: kode mengarah ke satu eksemplar dan petugas menjalankan prosedur pinjam atau kembali. Batas analoginya, objek di memori tidak otomatis dibagikan kepada komputer petugas lain dan tidak menyimpan perubahan setelah program berhenti; itu memerlukan lapisan penyimpanan tersendiri.',
        'code' => <<<'CODE'
var katalog = new Dictionary<string, Buku>(StringComparer.OrdinalIgnoreCase)
{
    ["BK-01"] = new Buku("Mulai C#"),
    ["BK-02"] = new Buku("Berpikir dengan Objek")
};

Pinjam("BK-01");
Pinjam("bk-01");
Pinjam("BK-99");
Kembalikan("BK-01");
Pinjam("BK-01");

void Pinjam(string kode)
{
    if (!katalog.TryGetValue(kode, out Buku? buku))
    {
        Console.WriteLine($"{kode}: buku tidak ditemukan.");
        return;
    }
    Console.WriteLine(buku.TryPinjam()
        ? $"{buku.Judul}: berhasil dipinjam."
        : $"{buku.Judul}: sedang dipinjam.");
}

void Kembalikan(string kode)
{
    if (!katalog.TryGetValue(kode, out Buku? buku))
    {
        Console.WriteLine($"{kode}: buku tidak ditemukan.");
        return;
    }
    Console.WriteLine(buku.TryKembalikan()
        ? $"{buku.Judul}: berhasil dikembalikan."
        : $"{buku.Judul}: belum dipinjam.");
}

class Buku
{
    public string Judul { get; }
    public bool Dipinjam { get; private set; }

    public Buku(string judul)
    {
        if (string.IsNullOrWhiteSpace(judul))
            throw new ArgumentException("Judul wajib diisi.", nameof(judul));
        Judul = judul.Trim();
    }

    public bool TryPinjam()
    {
        if (Dipinjam) return false;
        Dipinjam = true;
        return true;
    }

    public bool TryKembalikan()
    {
        if (!Dipinjam) return false;
        Dipinjam = false;
        return true;
    }
}
CODE,
        'output' => "Mulai C#: berhasil dipinjam.\nMulai C#: sedang dipinjam.\nBK-99: buku tidak ditemukan.\nMulai C#: berhasil dikembalikan.\nMulai C#: berhasil dipinjam.",
        'walkthrough' => [
            ['title' => 'Buat identitas katalog', 'explanation' => 'Dua key menyimpan dua objek berbeda. Comparer pada dictionary membuat variasi kapital kode tetap mengarah ke eksemplar yang sama.'],
            ['title' => 'Cari sebelum mengubah', 'explanation' => 'TryGetValue membedakan kegagalan pencarian dari hasil operasi buku. Pada kode tidak dikenal, return mencegah akses ke buku yang tidak didapat.'],
            ['title' => 'Lindungi transisi status', 'explanation' => 'TryPinjam hanya mengubah false menjadi true. TryKembalikan hanya mengubah true menjadi false. Penolakan mempertahankan status sebelumnya.'],
            ['title' => 'Periksa seluruh urutan', 'explanation' => 'Lima pemanggilan awal membentuk skenario lengkap. Peminjaman terakhir membuktikan pengembalian membuat eksemplar kembali tersedia untuk operasi berikutnya.'],
        ],
        'mistakes' => [
            ['title' => 'Judul dipakai sebagai identitas eksemplar', 'body' => 'Perpustakaan dapat mempunyai dua buku dengan judul sama. Kode unik memisahkan identitas eksemplar dari nama yang ditampilkan.'],
            ['title' => 'Membalik status tanpa memeriksa tindakan', 'body' => 'Dipinjam = !Dipinjam akan membuat pinjaman kedua justru mengembalikan buku. Gunakan operasi spesifik dengan prasyarat yang sesuai.'],
        ],
        'practice' => [
            ['title' => 'Pengembalian ganda', 'task' => 'Panggil Kembalikan dua kali berturut-turut setelah skenario contoh.', 'hint' => 'Periksa status setelah pengembalian pertama.', 'answer' => 'Pengembalian pertama berhasil, pengembalian kedua melaporkan belum dipinjam. Status akhir tetap tersedia dan tidak berubah menjadi dipinjam lagi.'],
            ['title' => 'Dua eksemplar', 'task' => 'Tambahkan BK-03 dengan judul Mulai C#, lalu pinjam BK-01 dan BK-03.', 'hint' => 'Gunakan new Buku terpisah untuk setiap key.', 'answer' => 'Keduanya memiliki keadaan sendiri. Meminjam BK-01 tidak membuat BK-03 ikut dipinjam meskipun judulnya identik.'],
        ],
        'exercise' => 'Tambahkan fungsi LihatKatalog yang mencetak kode, judul, dan status setiap buku. Panggil sebelum serta sesudah skenario, kemudian cocokkan status akhir dengan urutan operasi.',
        'solution' => 'Gunakan foreach pada katalog dan baca pasangan Key serta Value. Tampilkan status berdasarkan Value.Dipinjam. Sebelum skenario kedua buku tersedia; sesudah skenario BK-01 dipinjam dan BK-02 tetap tersedia. Jangan mengubah property ketika hanya menampilkan laporan.',
        'takeaways' => ['Identitas eksemplar berbeda dari judul.', 'Pisahkan pencarian, aturan perubahan, dan pesan tampilan.', 'Uji rangkaian berhasil, ditolak, kembali, lalu berhasil lagi.'],
        'source' => 'https://learn.microsoft.com/en-us/dotnet/api/system.collections.generic.dictionary-2.trygetvalue?view=net-10.0',
        'sources' => [
            ['label' => 'Microsoft Learn: Dictionary.TryGetValue', 'url' => 'https://learn.microsoft.com/en-us/dotnet/api/system.collections.generic.dictionary-2.trygetvalue?view=net-10.0'],
            ['label' => 'Microsoft Learn: model objek C#', 'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/object-oriented/'],
            ['label' => 'Microsoft Learn: praktik pengujian perilaku', 'url' => 'https://learn.microsoft.com/en-us/dotnet/core/testing/unit-testing-best-practices'],
        ],
    ],
];
