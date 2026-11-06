<?php
declare(strict_types=1);

// Pendalaman asli Bahasa Indonesia. Referensi diperiksa 14 September 2026.
return [
    'instalasi-dotnet' => [
        'minutes_extra' => 20,
        'extra_sections' => [
            [
                'heading' => 'Kenali isi folder proyek sebelum mulai',
                'body' => 'Setelah proyek dibuat, jangan langsung menganggap setiap file harus diedit. Program.cs berisi instruksi latihan, sedangkan HaloCSharp.csproj berisi identitas proyek dan target framework. Folder bin menampung hasil build, dan obj menampung data perantara. Untuk percobaan pertama, fokus pada dua file sumber tadi. Bayangkan satu folder proyek seperti satu map tugas sekolah: naskah berada di Program.cs, ketentuan pengumpulan berada di csproj, dan salinan hasil cetaknya berada di bin. Catat folder yang sedang aktif di terminal agar kamu tidak menjalankan map tugas lain. Ketika hasil di layar tidak berubah sesudah mengedit, periksa apakah file sudah tersimpan dan terminal memang menunjuk proyek yang sama. Kebiasaan kecil ini mencegah debugging pada program yang ternyata berbeda.',
            ],
            [
                'heading' => 'Baca pesan gagal secara bertahap',
                'body' => 'Pesan error pertama sering lebih berguna daripada sepuluh pesan berikutnya. Misalnya kamu menghapus tanda kutip penutup dari teks salam. Compiler dapat mengira baris selanjutnya masih bagian dari string, sehingga muncul beberapa keluhan tambahan. Mulailah dari lokasi file dan nomor baris pertama, periksa juga baris tepat sebelumnya, lalu perbaiki satu penyebab dan jalankan ulang. Pisahkan kegagalan alat dari kegagalan kode: perintah dotnet yang tidak dikenali terjadi sebelum source dibaca, sedangkan kesalahan titik koma muncul ketika kompilasi. Buat catatan dengan tiga kolom sederhana: pesan, penyebab, dan perbaikan. Catatan dari percobaan sendiri menjadi kamus pribadi yang lebih mudah diingat. Jangan mengubah banyak hal sekaligus karena kamu akan kehilangan hubungan antara perubahan dan hasilnya.',
            ],
            [
                'heading' => 'Bangun siklus latihan yang bisa diulang',
                'body' => 'Gunakan pola prediksi, ubah, jalankan, dan jelaskan. Sebelum mengganti satu WriteLine menjadi dua, tulis prediksi berapa baris yang akan muncul. Setelah menjalankan, cocokkan hasil dengan prediksi dan jelaskan setiap perbedaan. Buat proyek terpisah untuk eksperimen yang sangat berbeda agar contoh lama tetap bisa dipakai sebagai pembanding. Nama folder seperti Latihan01Salam lebih jelas daripada BaruFinalDua. Tambahkan komentar singkat tentang tujuan percobaan, bukan terjemahan setiap karakter kode. Jika kamu belajar bersama teman, saling tukar folder sumber beserta perintah menjalankannya; keberhasilan di komputer lain menguji apakah petunjukmu lengkap. Di akhir sesi, simpan satu variasi yang berhasil dan satu pertanyaan yang belum terjawab. Target awalnya membangun kebiasaan mengamati, bukan menghafal seluruh perintah terminal.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Periksa alat yang dipanggil',
                'explanation' => 'dotnet --version menampilkan versi SDK yang dipilih oleh dotnet pada lokasi kerja itu. Ini memeriksa alat pengembangan; belum menjalankan Program.cs.',
            ],
            [
                'title' => 'Buat proyek bernama HaloCSharp',
                'explanation' => 'dotnet new console memilih template console. -n HaloCSharp memberi nama proyek dan -f net10.0 menentukan target framework; SDK terpasang harus mendukung target tersebut.',
            ],
            [
                'title' => 'Pindah ke proyek lalu jalankan',
                'explanation' => 'cd HaloCSharp mengubah folder aktif. dotnet run menggunakan proyek di folder itu, membangun kode yang diperlukan, lalu menjalankannya sehingga salam dari Program.cs muncul.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Menempelkan perintah terminal ke Program.cs',
                'body' => 'dotnet new dan cd adalah perintah shell, bukan sintaks C#. Jalankan di terminal. Hanya instruksi C# seperti Console.WriteLine yang ditulis dalam Program.cs.',
            ],
            [
                'title' => 'Mengedit file yang berbeda dari proyek aktif',
                'body' => 'Dua folder bisa sama-sama mempunyai Program.cs. Pastikan judul folder editor dan lokasi terminal sesuai; gunakan dotnet run --project dengan path csproj bila perlu memperjelas target.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Dua bentuk keluaran',
                'task' => 'Buat keluaran persis dua baris: baris pertama Halo, Habib! dan baris kedua Mulai belajar. Gunakan satu Write dan dua WriteLine.',
                'hint' => 'Write tidak menambahkan pergantian baris; WriteLine menambahkannya setelah teks.',
                'answer' => 'Console.Write("Halo, "); Console.WriteLine("Habib!"); Console.WriteLine("Mulai belajar");. Panggilan pertama dan kedua berbagi baris, sedangkan yang ketiga mulai pada baris berikutnya.',
            ],
            [
                'title' => 'Latihan 2 · Temukan proyek tanpa berpindah',
                'task' => 'Dari folder induk HaloCSharp, jalankan program dengan menunjuk file proyek secara eksplisit. Jelaskan bagian yang memilih proyek.',
                'hint' => 'Gunakan opsi --project pada dotnet run.',
                'answer' => 'Jalankan dotnet run --project HaloCSharp/HaloCSharp.csproj. Opsi --project menunjuk proyek yang hendak dibangun dan dijalankan meskipun shell masih berada di folder induk.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Perintah dotnet new',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/core/tools/dotnet-new',
            ],
            [
                'label' => 'Microsoft Learn · Perintah dotnet run',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/core/tools/dotnet-run',
            ],
        ],
    ],
    'variabel-tipe-data' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Bedakan nilai, satuan, dan tampilan',
                'body' => 'Angka 12000 belum menjelaskan apakah itu rupiah, gram, atau jumlah penonton. Nama seperti hargaRupiah dan beratGram mengurangi salah tafsir ketika beberapa hitungan bertemu. Untuk warung kecil, jumlah barang dapat memakai int dan harga memakai decimal, tetapi aturan jumlah harus positif tetap perlu ditulis terpisah. Menampilkan harga dengan format tertentu tidak mengubah nilai yang tersimpan. Misalnya total masih 36000 meskipun kelak kamu menampilkannya dengan pemisah ribuan. Pisahkan perhitungan dari teks struk supaya angka tetap dapat dipakai untuk diskon, pajak, dan pengujian. Jangan menyimpan harga sebagai string hanya karena di layar perlu awalan Rp. Awalan itu tugas tampilan, sementara nilai numeriknya adalah bahan perhitungan. Kejelasan satuan sering mencegah bug yang tidak bisa ditemukan compiler.',
            ],
            [
                'heading' => 'Hitung di kertas untuk menguji operator',
                'body' => 'Gunakan contoh kecil ketika mempelajari urutan operator. Tiga buku seharga dua belas ribu ditambah ongkir lima ribu berarti harga dikali jumlah, kemudian ongkir ditambahkan sekali. Jika kamu menulis harga dikali jumlah ditambah ongkir di dalam tanda kurung, hasilnya berubah karena ongkir ikut dikalikan. Pembagian juga bergantung pada tipe operand: lima dibagi dua dengan int menghasilkan dua, bukan dua setengah. Mengubah hasil itu ke decimal setelah pembagian tidak mengembalikan pecahan yang sudah hilang. Salah satu operand harus bertipe pecahan sebelum pembagian dilakukan. Untuk latihan, tulis arti bisnis pada kalimat pertama, ekspresi matematis pada kalimat kedua, lalu sintaks C# pada kalimat ketiga. Bandingkan ketiganya sebelum percaya pada angka yang dicetak program.',
            ],
            [
                'heading' => 'Nilai turunan tidak memperbarui dirinya',
                'body' => 'Ketika total diisi dari harga dikali jumlah, program menghitung nilai saat baris tersebut dijalankan. total bukan rumus spreadsheet yang terus terhubung ke dua variabel asal. Jika jumlah berubah sesudahnya, total tetap memegang hasil lama sampai kamu menghitungnya kembali. Hal serupa berlaku untuk dapatDiskon: bool tersebut menyimpan keputusan pada saat perbandingan dilakukan. Bayangkan kasir mencatat subtotal pada kertas; menambah satu barang ke keranjang tidak otomatis menghapus dan menulis ulang angka di kertas itu. Kamu perlu menentukan kapan semua hitungan diperbarui. Pada program kecil, urutkan pembacaan input, validasi, perhitungan, lalu tampilan. Pada materi objek nanti, kamu akan belajar cara menyatukan aturan supaya perubahan data tidak meninggalkan hasil turunan yang sudah kedaluwarsa.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Siapkan tiga input berbeda',
                'explanation' => 'barang memuat "Buku", jumlah memuat 3, dan harga memuat 12000m. Huruf m membuat literal harga bertipe decimal.',
            ],
            [
                'title' => 'Hitung subtotal dan keputusan',
                'explanation' => 'harga * jumlah menghasilkan 36000 pada total. Perbandingan total >= 30000m menghasilkan true yang disimpan ke dapatDiskon; ini belum mengurangi harga.',
            ],
            [
                'title' => 'Bentuk struk',
                'explanation' => 'Interpolasi memasukkan nilai barang dan jumlah ke teks. Format :0 menampilkan total tanpa digit pecahan. Mencetak dapatDiskon menghasilkan True sesuai nilai bool.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Mengira bool diskon sudah memotong harga',
                'body' => 'dapatDiskon hanya mencatat kelayakan. Perlu ekspresi terpisah untuk nominal diskon dan total bayar.',
            ],
            [
                'title' => 'Kehilangan pecahan sebelum konversi',
                'body' => 'decimal hasil = 5 / 2; menyimpan 2 karena kedua operand int. Gunakan 5m / 2 agar pembagian decimal menghasilkan 2,5.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Pecahan yang hilang',
                'task' => 'Prediksi hasil 7 / 2 dan 7m / 2, lalu terangkan kapan tipe hasil dipilih.',
                'hint' => 'Lihat tipe operand saat operator / dijalankan, bukan hanya tipe variabel tujuan.',
                'answer' => '7 / 2 menghasilkan int 3; 7m / 2 menghasilkan decimal 3,5. Pada pembagian kedua, operand decimal membuat pembagian mempertahankan pecahan.',
            ],
            [
                'title' => 'Latihan 2 · Tambah barang ke keranjang',
                'task' => 'Setelah total dan dapatDiskon dihitung pada contoh, ubah jumlah menjadi 1. Hitung ulang keduanya dan tentukan hasil baru.',
                'hint' => 'Penugasan sebelumnya tidak menjadi hubungan rumus otomatis.',
                'answer' => 'jumlah = 1; total = harga * jumlah; dapatDiskon = total >= 30000m;. Nilai total baru 12000 dan dapatDiskon false. Tanpa dua penugasan ulang, nilai lama tetap 36000 dan true.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Value types',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/builtin-types/value-types',
            ],
            [
                'label' => 'Microsoft Learn · Operator aritmetika',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/operators/arithmetic-operators',
            ],
        ],
    ],
    'percabangan-perulangan' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Ubah aturan sehari-hari menjadi kondisi',
                'body' => 'Mulai dari kalimat yang tidak ambigu. Aturan diskon untuk anggota dengan belanja minimal lima puluh ribu berarti dua syarat harus benar bersama: status anggota dan batas belanja. Operator && sesuai untuk kebutuhan tersebut, sementara || cocok ketika salah satu syarat sudah cukup. Tambahkan tanda kurung untuk memperjelas kelompok aturan, terutama ketika dua operator bercampur. Buat tabel beberapa calon pembeli: anggota di bawah batas, anggota tepat batas, serta bukan anggota di atas batas. Tabel ini menjadi prediksi sebelum kode dijalankan. Perhatikan kata minimal dan lebih dari karena keduanya menghasilkan operator berbeda. Program akan mematuhi kondisi yang kamu tulis, bahkan ketika kalimat bisnis yang kamu maksud berbeda. Membuat contoh tandingan adalah cara cepat menemukan aturan yang masih kabur.',
            ],
            [
                'heading' => 'Cari keadaan yang harus tetap benar pada loop',
                'body' => 'Saat menjumlahkan bilangan genap, tentukan arti variabel total dengan kalimat: total berisi jumlah bilangan genap yang sudah diproses. Sebelum putaran pertama nilainya nol karena belum ada angka yang diproses. Pada setiap putaran, angka ganjil tidak mengubah total dan angka genap menambah total tepat sekali. Setelah loop berhenti, semua angka dalam batas sudah diperiksa sehingga total menjadi jawaban akhir. Penjelasan semacam ini membantu memilih lokasi inisialisasi; jika total dibuat ulang di dalam loop, hasil lama hilang pada setiap putaran. Bayangkan petugas parkir menghitung kendaraan dengan alat klik. Ia mereset alat sebelum membuka giliran, bukan sebelum setiap kendaraan lewat. Gunakan jejak tabel angka, kondisi, dan total untuk membuktikan program pada tiga putaran pertama.',
            ],
            [
                'heading' => 'Pilih cara berhenti yang dapat dijelaskan',
                'body' => 'Loop menu biasanya belum tahu berapa kali pengguna akan mencoba. while cocok jika kondisi kelanjutannya jelas, misalnya pilihan belum sama dengan keluar. do-while berguna ketika isi perlu dijalankan setidaknya sekali sebelum diperiksa. break menghentikan loop terdekat, sedangkan continue melewati sisa putaran dan lanjut ke putaran berikutnya. Pada while, letak perubahan penghitung harus diperhatikan karena continue dapat melewatinya jika ditulis keliru. Buat aturan sederhana untuk diri sendiri: setiap jalur dalam loop harus mendekatkan program ke kondisi berhenti atau menunggu input baru yang memang diperlukan. Uji juga kondisi tanpa pekerjaan, satu pekerjaan, dan batas maksimum kecil. Jika suatu loop tidak selesai, hentikan eksekusi lalu telusuri variabel pengendalinya, bukan menambahkan break secara acak.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Mulai dan periksa batas',
                'explanation' => 'angka dimulai dari 1. Sebelum setiap putaran, angka <= 5 diperiksa; nilai 5 tetap diproses, sedangkan 6 membuat loop berhenti.',
            ],
            [
                'title' => 'Tentukan paritas',
                'explanation' => 'angka % 2 menghitung sisa pembagian dengan dua. Sisa nol memilih blok genap, sedangkan angka 1, 3, dan 5 memilih blok ganjil.',
            ],
            [
                'title' => 'Perbarui lalu ulangi',
                'explanation' => 'angka++ terjadi setelah salah satu pesan dicetak. Karena kenaikannya satu dan batasnya inklusif, ada lima putaran dengan satu baris keluaran pada setiap putaran.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Titik koma setelah for',
                'body' => 'for (...); membuat badan loop kosong. Blok sesudahnya menjadi blok terpisah dan variabel angka dari loop tidak tersedia di sana.',
            ],
            [
                'title' => 'Mengulang inisialisasi penjumlahan',
                'body' => 'Menulis int total = 0 di dalam badan loop membuat akumulasi terhapus pada setiap putaran. Tempatkan sebelum loop, kemudian tampilkan hasil sesudahnya.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Kelipatan tiga',
                'task' => 'Cetak hanya kelipatan tiga dari 1 sampai 12 tanpa mencetak angka lainnya.',
                'hint' => 'Gunakan sisa pembagian dengan tiga dan satu if dalam loop.',
                'answer' => 'for (int angka = 1; angka <= 12; angka++) { if (angka % 3 == 0) Console.WriteLine(angka); } menghasilkan 3, 6, 9, dan 12.',
            ],
            [
                'title' => 'Latihan 2 · Uji aturan masuk',
                'task' => 'Pengunjung boleh masuk jika sudah punya tiket dan umur minimal 12. Tulis kondisi dan hasil untuk tiket true umur 11, tiket true umur 12, serta tiket false umur 20.',
                'hint' => 'Kedua syarat harus dipenuhi sekaligus.',
                'answer' => 'bool bolehMasuk = punyaTiket && umur >= 12;. Hasil tiga kasus berurutan adalah false, true, dan false. Menggunakan || keliru karena tiket saja atau umur saja akan meloloskan pengunjung.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Pernyataan perulangan',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/statements/iteration-statements',
            ],
            [
                'label' => 'Microsoft Learn · Operator logika boolean',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/operators/boolean-logical-operators',
            ],
        ],
    ],
    'array-koleksi' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Pilih koleksi dari pertanyaan yang paling sering muncul',
                'body' => 'Daftar jadwal tujuh hari mempunyai jumlah posisi yang tetap, sehingga array mudah dipahami. Daftar belanja berubah ketika pengguna menambah barang, sehingga List lebih alami. Persediaan yang selalu dicari berdasarkan kode barang cocok dimodelkan sebagai Dictionary. Tidak ada satu koleksi yang paling baik untuk semua kebutuhan. Tuliskan operasi utamanya: membaca berdasarkan posisi, menambah anggota, mencari berdasarkan identitas, atau menghitung seluruh nilai. Untuk toko, kode seperti BRG001 biasanya lebih stabil daripada nama tampilan Beras Premium yang dapat diganti. Kamu dapat menyimpan beberapa koleksi jika masing-masing melayani kebutuhan yang jelas, tetapi hindari menggandakan sumber kebenaran tanpa aturan sinkronisasi. Jika stok dicatat di dua tempat, tentukan mana yang berwenang dan kapan salinannya diperbarui. Kesalahan desain data sering tampak sebagai bug perulangan padahal sumbernya duplikasi.',
            ],
            [
                'heading' => 'Tidak ditemukan berbeda dari stok nol',
                'body' => 'TryGetValue mengembalikan informasi keberadaan melalui bool dan informasi isi melalui parameter out. Pada Dictionary dengan value int, pencarian gagal mengisi hasil out dengan nol. Namun nol itu bukan bukti bahwa barang tercatat dan habis. Karena itu baca bool dahulu sebelum menafsirkan jumlah. Bayangkan buku inventaris koperasi: baris Telur dengan angka nol berarti barang dikenal tetapi kosong, sedangkan Susu yang belum punya baris berarti belum dicatat. Kedua keadaan memerlukan tindakan berbeda. Yang pertama dapat memicu pemesanan ulang; yang kedua memerlukan pendaftaran barang. Jangan menyederhanakan keduanya menjadi satu pesan habis. Buat tiga kasus uji: barang tersedia, barang tercatat dengan nol, dan key tidak ada. Ketiga kasus membantu menjaga makna data ketika antarmuka mulai menampilkan indikator stok.',
            ],
            [
                'heading' => 'Pisahkan membaca koleksi dari mengubah strukturnya',
                'body' => 'foreach nyaman untuk mengamati setiap anggota, tetapi menambah atau menghapus anggota List yang sedang diiterasi dapat mengganggu enumerasi dan memicu exception. Untuk menghapus semua barang tertentu, pilih operasi yang memang dirancang untuk itu seperti RemoveAll, atau kumpulkan dahulu daftar perubahan kemudian terapkan setelah iterasi. Mengubah koleksi bukan sekadar mengubah angka Count; urutan dan posisi anggota lain bisa ikut bergeser. Misalnya menghapus indeks nol membuat elemen kedua menjadi elemen pertama. Jika memakai for untuk menghapus beberapa indeks, strategi mundur sering lebih mudah ditelusuri, tetapi harus tetap dijelaskan alasannya. Di tahap awal, lakukan satu jenis pekerjaan dalam satu lintasan: membaca untuk laporan atau menerapkan perubahan yang sudah diputuskan. Ini membuat jejak eksekusi lebih pendek dan hasil latihan lebih mudah dibandingkan.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Daftar belanja bertambah',
                'explanation' => 'belanja mula-mula berisi Beras dan Telur. Add("Susu") menambah anggota ketiga sehingga belanja.Count bernilai 3.',
            ],
            [
                'title' => 'Persediaan mempunyai dua key',
                'explanation' => 'stok memetakan Beras ke 8 dan Telur ke 12. Daftar belanja dan Dictionary stok adalah dua objek terpisah; menambah Susu ke belanja tidak otomatis mencatat stoknya.',
            ],
            [
                'title' => 'Cari setiap kebutuhan',
                'explanation' => 'foreach mengambil barang sesuai urutan belanja. TryGetValue berhasil untuk Beras dan Telur; untuk Susu mengembalikan false sehingga pesan belum tercatat dicetak.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Menganggap key sama dengan posisi',
                'body' => 'stok["Beras"] mengakses identitas barang, bukan indeks urutan. Sementara belanja[0] mengakses anggota pertama. Keduanya sama-sama memakai kurung siku tetapi artinya berbeda.',
            ],
            [
                'title' => 'Membaca jumlah tanpa bool keberadaan',
                'body' => 'Nilai out nol dapat muncul saat pencarian gagal maupun saat stok memang nol. Gunakan hasil bool TryGetValue untuk membedakan kedua keadaan.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Persediaan habis',
                'task' => 'Ubah stok Telur menjadi nol lalu tampilkan pesan habis untuk barang yang tercatat dengan nol. Susu harus tetap tampil belum tercatat.',
                'hint' => 'Di dalam cabang TryGetValue berhasil, tambahkan pemeriksaan jumlah == 0.',
                'answer' => 'Gunakan if (stok.TryGetValue(barang, out int jumlah)) { Console.WriteLine(jumlah == 0 ? $"{barang}: habis" : $"{barang}: {jumlah}"); } else Console.WriteLine($"{barang}: belum tercatat");. Telur habis, Susu belum tercatat.',
            ],
            [
                'title' => 'Latihan 2 · Hapus kebutuhan ganda',
                'task' => 'Buat List<string> berisi "Beras", "Telur", "Telur", lalu hapus semua "Telur" dan tentukan Count akhirnya.',
                'hint' => 'Remove menghapus satu kemunculan; RemoveAll menerima aturan pencocokan.',
                'answer' => 'var daftar = new List<string> { "Beras", "Telur", "Telur" }; daftar.RemoveAll(barang => barang == "Telur");. Count menjadi 1 dan anggota yang tersisa Beras.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · List<T>',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/api/system.collections.generic.list-1?view=net-10.0',
            ],
            [
                'label' => 'Microsoft Learn · Dictionary.TryGetValue',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/api/system.collections.generic.dictionary-2.trygetvalue?view=net-10.0',
            ],
        ],
    ],
    'method-parameter' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Tulis kontrak sebelum isi method',
                'body' => 'Sebelum menulis badan method, jelaskan input, hasil, dan kondisi yang dianggap sah. Untuk HitungTotal, harga menggunakan satuan rupiah dan jumlah menghitung barang, sedangkan hasil adalah subtotal sebelum ongkir. Dengan kontrak ini, pemanggil tidak perlu menebak apakah diskon sudah termasuk. Tentukan pula apa arti jumlah nol dan apakah harga negatif diizinkan. Tidak semua keputusan harus diselesaikan dengan exception; pada antarmuka pengguna, validasi dapat dilakukan sebelum method dipanggil. Kontrak yang eksplisit membantu ketika perhitungan dipakai ulang pada web dan console. Bayangkan formulir pemesanan yang mencantumkan bahan wajib dan hasil yang akan diterima. Jika definisinya jelas, orang lain dapat memakai layanan itu tanpa melihat dapur. Nama dan tipe parameter adalah bagian dari formulir tersebut, sementara dokumentasi singkat menjelaskan aturan yang tidak tertangkap oleh tipe.',
            ],
            [
                'heading' => 'Parameter biasa menerima salinan nilai',
                'body' => 'Pada contoh harga dan jumlah adalah value type. Ketika method dipanggil, nilai argumen disalin ke parameter sehingga perubahan parameter lokal tidak mengubah variabel asal pemanggil. Coba bayangkan memberikan fotokopi angka pesanan kepada petugas penghitung. Ia boleh mencoret fotokopinya, tetapi kertas asli tetap sama. Untuk parameter bertipe class, yang disalin adalah referensinya; akibatnya method dapat mengubah objek yang sama melalui referensi itu. Perbedaan tersebut akan makin jelas pada materi class. Jangan menambahkan ref hanya supaya perubahan terlihat oleh pemanggil tanpa memikirkan kontraknya. Untuk satu hasil perhitungan, return biasanya paling mudah dipahami. Ketika membaca sebuah pemanggilan, tanyakan apakah method hanya menghitung hasil atau juga mengubah data di luar dirinya. Pertanyaan ini penting untuk menelusuri bug urutan pemanggilan.',
            ],
            [
                'heading' => 'Pisahkan fungsi inti dari cara berinteraksi',
                'body' => 'Kalkulator yang membaca Console.ReadLine di dalam setiap method sulit diuji karena semua percobaan harus menyediakan input terminal. Sebaliknya, method yang menerima harga dan jumlah dapat dipanggil langsung dengan data kecil, tanpa keyboard dan tanpa layar. Biarkan lapisan luar membaca input, mengonversinya, dan menampilkan hasil; biarkan fungsi inti memproses nilai yang sudah jelas. Ini bukan kewajiban membuat banyak file pada latihan pendek. Tujuannya menjaga batas tanggung jawab agar perubahan pesan struk tidak mengubah logika hitungan. Jika satu method mulai memuat pembacaan file, perhitungan pajak, dan pencetakan laporan, uraikan langkahnya menjadi beberapa pekerjaan bernama. Pemisahan yang berguna mengikuti tujuan, bukan sekadar memotong kode setiap lima baris. Dengan demikian, nama method juga menjadi ringkasan alur program yang bisa dibaca dari atas.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Panggilan pertama mengirim dua argumen',
                'explanation' => 'Kalkulator.HitungTotal(12000m, 3) mengisi parameter harga dengan 12000 dan jumlah dengan 3. Nilai return 36000 kemudian disimpan pada variabel total milik pemanggil.',
            ],
            [
                'title' => 'Perhitungan dipakai di dua lokasi',
                'explanation' => 'WriteLine pertama membaca total yang sudah disimpan. WriteLine kedua memanggil HitungTotal lagi dengan 5000m dan 2 sehingga menghasilkan 10000.',
            ],
            [
                'title' => 'Static method punya kontrak decimal',
                'explanation' => 'public static decimal menyatakan method dapat dipanggil melalui class dan mengembalikan decimal. return harga * jumlah menyelesaikan pekerjaan tanpa mencetak apa pun.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Mengira WriteLine adalah return',
                'body' => 'WriteLine hanya menampilkan teks. Method decimal tetap harus mengembalikan nilai decimal melalui return pada jalur yang selesai normal.',
            ],
            [
                'title' => 'Menganggap nama parameter memilih argumen otomatis',
                'body' => 'Pada argumen posisional, urutan menentukan pasangan parameter. Compiler tidak memahami arti bisnis dua argumen decimal yang tertukar; gunakan nama parameter pada pemanggilan jika membantu.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Hitung dari parameter bernama',
                'task' => 'Panggil HitungTotal dengan jumlah 4 dan harga 7500m menggunakan named arguments, lalu prediksi hasil.',
                'hint' => 'Sintaks argumen bernama adalah namaParameter: nilai.',
                'answer' => 'decimal hasil = Kalkulator.HitungTotal(jumlah: 4, harga: 7500m); menghasilkan 30000. Nama parameter membuat maksud tetap terbaca walaupun urutan penulisannya dibalik.',
            ],
            [
                'title' => 'Latihan 2 · Satu tugas tambahan',
                'task' => 'Tambahkan static method HitungDenganOngkir(decimal harga, int jumlah, decimal ongkir) yang menggunakan HitungTotal, kemudian uji harga 10000m, jumlah 2, ongkir 5000m.',
                'hint' => 'Gunakan hasil method pertama sebagai bagian ekspresi return method baru.',
                'answer' => 'public static decimal HitungDenganOngkir(decimal harga, int jumlah, decimal ongkir) => HitungTotal(harga, jumlah) + ongkir;. Pemanggilan dengan data latihan menghasilkan 25000; ongkir ditambahkan sekali.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Method dan argumen',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/methods',
            ],
            [
                'label' => 'Microsoft Learn · Local functions',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/local-functions',
            ],
        ],
    ],
    'class-object' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Pisahkan identitas buku dari judulnya',
                'body' => 'Dua eksemplar buku dapat memiliki judul yang sama tetapi status peminjaman berbeda. Karena itu judul saja belum cukup menjadi identitas dalam aplikasi perpustakaan. Untuk latihan sekarang, setiap new Buku membuat satu objek tersendiri. Saat proyek berkembang, tambahkan kode inventaris seperti BK001 agar petugas dapat memilih eksemplar yang benar. Pikirkan keadaan objek sebagai kumpulan jawaban pada satu saat: judul apa, sedang dipinjam atau tersedia, dan siapa pemegangnya bila fitur tersebut sudah ada. Tidak semua informasi harus langsung ditambahkan. Mulai dengan keadaan minimum yang dibutuhkan satu alur nyata, yaitu meminjam dan mengembalikan satu buku. Model kecil yang konsisten lebih bermanfaat daripada class dengan banyak property yang belum memiliki aturan. Setiap penambahan property sebaiknya menjawab kebutuhan pengguna yang dapat kamu demonstrasikan.',
            ],
            [
                'heading' => 'Jaga perubahan keadaan melalui perilaku',
                'body' => 'Property Dipinjam dengan private set membatasi siapa yang dapat menulis status, tetapi belum menentukan kapan perubahan itu masuk akal. Method Pinjam pada contoh selalu mengubah status menjadi true; memanggilnya dua kali tidak melaporkan bahwa buku sudah dipinjam. Untuk perpustakaan nyata, tentukan janji method dengan lebih jelas: apakah percobaan kedua ditolak, diabaikan, atau menghasilkan status tertentu. Salah satu latihan yang mudah adalah TryPinjam yang mengembalikan bool keberhasilan. Panggilan pertama mengubah false menjadi true, sedangkan panggilan berikutnya mengembalikan false tanpa perubahan. Bayangkan tombol pada mesin peminjaman: pengguna perlu mengetahui apakah tindakannya diterima. Dengan menjaga aturan di dalam objek, semua pemanggil mendapat keputusan yang sama. Antarmuka kemudian cukup menerjemahkan hasilnya menjadi pesan yang ramah.',
            ],
            [
                'heading' => 'Pelajari referensi dengan menggambar panah',
                'body' => 'Gambarlah variabel buku sebagai kotak kecil dan objek Buku sebagai kotak besar berisi Judul serta Dipinjam. Hubungkan keduanya dengan panah. Ketika menulis var salinan = buku, tambahkan kotak variabel baru dengan panah menuju objek besar yang sama. Memanggil salinan.Pinjam akan terlihat melalui buku karena keadaan yang diubah berada pada objek bersama. Sebaliknya, new Buku membuat kotak objek baru, sehingga dua panah dapat menuju keadaan yang berbeda. Cara menggambar ini lebih membantu daripada menghafal bahwa class adalah reference type. Coba juga mengganti nilai variabel salinan dengan objek baru; panah salinan berpindah tetapi panah buku tetap menuju objek lama. Bedakan operasi memindahkan referensi dari operasi mengubah isi objek. Perbedaan itu penting ketika beberapa bagian aplikasi memegang buku yang sama.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Buat satu instance',
                'explanation' => 'new Buku("Petualangan C#") memanggil constructor Buku dan mengisi Judul dari parameter judul. Dipinjam belum diubah sehingga nilai awal bool-nya false.',
            ],
            [
                'title' => 'Baca lalu ubah keadaan',
                'explanation' => 'WriteLine pertama membaca Judul dan Dipinjam. buku.Pinjam() menjalankan method pada instance yang sama dan menugaskan true ke Dipinjam.',
            ],
            [
                'title' => 'Amati perubahan dari luar',
                'explanation' => 'WriteLine kedua membaca property yang sama setelah perubahan, sehingga status menjadi True. private set mengizinkan Pinjam mengubah status tetapi menolak penugasan langsung dari kode luar class.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Mengira penyalinan variabel menggandakan buku',
                'body' => 'var kedua = buku menyalin referensi. Gunakan new Buku(...) untuk instance terpisah; menyalin seluruh objek memerlukan kebijakan tersendiri, terutama jika punya anggota referensi lain.',
            ],
            [
                'title' => 'Constructor diberi return type',
                'body' => 'public void Buku(...) adalah method bernama Buku, bukan constructor. Constructor harus bernama sama dengan class dan tidak menuliskan tipe return.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Dua panah satu buku',
                'task' => 'Setelah membuat buku, tulis var teman = buku; lalu teman.Pinjam();. Prediksi nilai buku.Dipinjam dan jelaskan jumlah objek yang dibuat.',
                'hint' => 'Hitung jumlah pemanggilan new, bukan jumlah variabel.',
                'answer' => 'buku.Dipinjam bernilai true. Hanya satu objek Buku dibuat; teman dan buku menunjuk instance yang sama.',
            ],
            [
                'title' => 'Latihan 2 · Peminjaman yang memberi hasil',
                'task' => 'Tambahkan TryPinjam yang menolak peminjaman kedua tanpa exception. Panggil dua kali pada buku baru dan prediksi hasil.',
                'hint' => 'Periksa Dipinjam sebelum mengubahnya, lalu gunakan return bool.',
                'answer' => 'public bool TryPinjam() { if (Dipinjam) return false; Dipinjam = true; return true; }. Pada buku baru, hasil pertama true dan kedua false. Status akhirnya tetap true.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Class dan referensi',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/classes',
            ],
            [
                'label' => 'Microsoft Learn · Constructor',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/constructors',
            ],
        ],
    ],
    'prinsip-oop' => [
        'minutes_extra' => 30,
        'extra_sections' => [
            [
                'heading' => 'Uji pewarisan dari sudut pandang pemakai',
                'body' => 'Hubungan pewarisan perlu masuk akal ketika dilihat oleh kode yang memakai tipe dasar. Jika suatu fungsi menerima Kendaraan dan memanggil Gerak, semua turunannya seharusnya memenuhi janji gerak yang telah disepakati. Jangan membuat turunan hanya karena dua class mempunyai property bernama sama. Sepeda dan Buku sama-sama punya nama, tetapi buku bukan kendaraan. Bayangkan petugas parkir yang melayani semua kendaraan melalui aturan umum; ia tidak seharusnya menerima benda yang menolak seluruh layanan dasar tersebut. Untuk latihan, tulis satu fungsi yang menerima Kendaraan dan tampilkan Nama serta Gerak. Jika kamu harus menambahkan banyak pemeriksaan jenis sebelum bisa memakainya, lihat kembali apakah abstraksi tipe dasarnya sudah tepat. Pewarisan bermanfaat ketika pemakai dapat mengandalkan perilaku bersama yang konsisten.',
            ],
            [
                'heading' => 'Komposisi menyusun kemampuan tanpa silsilah panjang',
                'body' => 'Misalkan aplikasi ingin menambahkan sistem pembayaran ke sepeda sewaan dan bus pariwisata. Tidak perlu membuat rantai class seperti KendaraanBerbayarDenganDiskonDenganNotifikasi. Susun class dari komponen yang dimilikinya: layanan pembayaran, aturan tarif, atau pemberitahuan. Hubungan memiliki membuat setiap komponen dapat berubah dengan lingkup lebih kecil. Sebuah bus dapat memiliki mesin tanpa harus mewarisi Mesin, karena bus bukan sejenis mesin dalam model layanan perjalanan. Komposisi tidak menghapus kebutuhan inheritance; keduanya menjawab hubungan yang berbeda. Pada latihan sederhana, gambarkan dua jenis garis: adalah sejenis untuk pewarisan dan memiliki untuk komposisi. Jika satu hubungan membuat kalimat yang terdengar janggal, periksa lagi tujuan modelmu. Desain yang baik ditentukan kebutuhan program, sehingga model transportasi untuk bengkel bisa berbeda dari model untuk tiket perjalanan.',
            ],
            [
                'heading' => 'Bedakan bentuk akses dari implementasi runtime',
                'body' => 'Variabel kendaraan pada contoh bertipe Kendaraan, tetapi objek nyatanya Sepeda. Tipe variabel menentukan anggota yang boleh dipanggil pada saat kompilasi; mekanisme virtual memilih implementasi Gerak berdasarkan objek saat berjalan. Dengan demikian, pemanggil memakai kontrak umum dan tetap mendapat perilaku khusus. Menambahkan method khusus Sepeda tidak otomatis membuatnya tersedia melalui semua variabel Kendaraan. Hindari cast hanya untuk mengakses setiap ciri khusus, karena itu sering menunjukkan bahwa pemanggil meminta kontrak yang kurang tepat. Kata override menyatakan penggantian dalam rantai virtual yang sama, sedangkan new dapat menyembunyikan anggota dan mempunyai perilaku pemilihan berbeda. Untuk pemula, tetap gunakan virtual dan override ketika tujuanmu memang variasi perilaku lewat tipe dasar. Jelaskan hasil dengan dua label terpisah: tipe referensi dan tipe objek.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Referensi umum menunjuk objek khusus',
                'explanation' => 'Kendaraan kendaraan = new Sepeda("Sepeda kota") membuat objek Sepeda lalu menyimpannya melalui referensi bertipe Kendaraan.',
            ],
            [
                'title' => 'Constructor meneruskan nama',
                'explanation' => 'Constructor Sepeda memakai base(nama) agar constructor Kendaraan menerima nama dan mengisi property Nama.',
            ],
            [
                'title' => 'Override dipilih saat Gerak dipanggil',
                'explanation' => 'kendaraan.Gerak() memakai slot virtual yang dideklarasikan di Kendaraan. Karena objek nyatanya Sepeda, hasil berasal dari override Sepeda: Bergerak dengan kayuhan.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Menggunakan new untuk maksud override',
                'body' => 'Menyembunyikan anggota dengan new bukan penggantian virtual yang sama. Untuk perilaku turunan melalui referensi Kendaraan, gunakan override pada method virtual yang sesuai.',
            ],
            [
                'title' => 'Membuat inheritance untuk berbagi satu property',
                'body' => 'Kesamaan Nama belum membuktikan hubungan tipe. Jika dua model hanya berbagi data atau layanan kecil, komposisi atau class terpisah sering lebih jelas.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Turunan memakai perilaku dasar',
                'task' => 'Buat class Kereta : Kendaraan tanpa override Gerak, tetapi teruskan nama melalui constructor. Prediksi Kereta bernama Kereta pagi ketika Gerak dipanggil.',
                'hint' => 'Method virtual menyediakan implementasi dasar yang tetap dapat dipakai turunan.',
                'answer' => 'class Kereta : Kendaraan { public Kereta(string nama) : base(nama) { } }. Gerak menghasilkan "Kendaraan bergerak" karena Kereta tidak menggantinya; Nama tetap "Kereta pagi".',
            ],
            [
                'title' => 'Latihan 2 · Pemakai satu kontrak',
                'task' => 'Buat method CetakGerak(Kendaraan item) yang menampilkan Gerak. Panggil dengan Sepeda dan Kendaraan biasa tanpa if jenis.',
                'hint' => 'Biarkan virtual dispatch memilih implementasi.',
                'answer' => 'static void CetakGerak(Kendaraan item) => Console.WriteLine(item.Gerak());. Sepeda menghasilkan "Bergerak dengan kayuhan", sedangkan instance Kendaraan biasa menghasilkan "Kendaraan bergerak".',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Inheritance',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/object-oriented/inheritance',
            ],
            [
                'label' => 'Microsoft Learn · Polymorphism',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/object-oriented/polymorphism',
            ],
        ],
    ],
    'interface-abstract' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Kontrak yang kecil lebih mudah dipenuhi',
                'body' => 'Bayangkan aplikasi perpustakaan membutuhkan satu kemampuan memberi kabar setelah buku dipinjam. Kontrak Kirim sudah cukup untuk kebutuhan itu. Jika interface yang sama mewajibkan membuat laporan, menghapus anggota, dan menyimpan stok, implementasi pesan console akan terpaksa membawa kemampuan yang tidak dipakainya. Mulailah dengan pertanyaan dari sisi pemanggil: pekerjaan minimum apa yang perlu tersedia agar alur ini berjalan. Nama interface membantu menyatakan peran, bukan teknologi. IPemberitahuan memberi ruang untuk console, catatan uji, atau kanal lain. Kontrak juga perlu menjelaskan perilaku yang tidak tertulis pada signature, misalnya apakah pesan kosong diterima. Dua class yang mempunyai method bernama sama belum otomatis mengikuti kesepakatan yang sama. Membuat interface adalah keputusan tentang janji bersama, sehingga contoh pemakaian sama pentingnya dengan deklarasi anggotanya.',
            ],
            [
                'heading' => 'Abstract class untuk alur dengan bagian yang berubah',
                'body' => 'Ada situasi ketika beberapa jenis laporan berbagi langkah pembukaan dan penutup, tetapi isi laporannya berbeda. Abstract class dapat menyimpan alur bersama dalam method biasa dan menyerahkan satu bagian kepada method abstract. Misalnya Cetak memanggil JudulLaporan lalu IsiLaporan, sementara turunan menentukan isi. Ini mengurangi duplikasi ketika hubungan fondasinya memang kuat. Namun turunan ikut terikat pada keputusan class dasar, sehingga perubahan fondasi dapat memengaruhi semuanya. Sebelum memilihnya, pastikan bagian bersama benar-benar memiliki arti sama dan bukan hanya kebetulan mirip pada versi pertama. Gambar urutan langkah laporan dan tandai mana yang tetap serta mana yang bervariasi. Jika yang sama hanya kemampuan menerima panggilan, interface mungkin lebih sederhana. Jika ada keadaan dan alur dasar yang perlu dijaga bersama, abstract class layak dipertimbangkan.',
            ],
            [
                'heading' => 'Ganti implementasi untuk menguji pemanggil',
                'body' => 'Keuntungan interface menjadi nyata ketika kamu mengganti PesanConsole dengan objek pencatat. Pemanggil tetap mengirim pesan yang sama, tetapi implementasi pencatat menyimpannya pada property untuk diperiksa. Kamu tidak perlu membaca terminal untuk mengetahui apakah pesan sesuai. Ini berguna pada pengujian alur peminjaman: fokusnya membuktikan bahwa layanan menghasilkan pemberitahuan yang benar, bukan membuktikan kemampuan console menampilkan teks. Simpan objek pencatat dalam variabel sebelum menyerahkannya sebagai interface supaya hasil catatannya dapat diakses sesudah pemanggilan. Bedakan objek uji semacam ini dari simulasi seluruh infrastruktur. Untuk satu perilaku, class kecil dengan satu property sudah cukup. Interface tidak membuat program otomatis mudah diuji; manfaatnya muncul ketika batas tersebut memisahkan aturan yang ingin diperiksa dari efek samping di luar aturan itu.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Pilih pelaksana kontrak',
                'explanation' => 'pemberitahuan mempunyai tipe IPemberitahuan, sedangkan new PesanConsole membuat implementasi yang akan mengerjakan Kirim.',
            ],
            [
                'title' => 'Panggil anggota yang dijanjikan',
                'explanation' => 'pemberitahuan.Kirim("Buku berhasil dipinjam.") sah karena Kirim(string pesan) terdapat dalam interface. Pemanggil tidak perlu mengetahui format console.',
            ],
            [
                'title' => 'Implementasi membentuk tampilan',
                'explanation' => 'PesanConsole.Kirim menambahkan awalan "Info: " saat mencetak. Teks lengkap di output berasal dari keputusan class tersebut, bukan dari deklarasi interface.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Membuat instance dari kontrak',
                'body' => 'new IPemberitahuan() tidak bisa digunakan untuk interface ini. Buat class implementasi seperti PesanConsole kemudian simpan referensinya sebagai interface.',
            ],
            [
                'title' => 'Mengira semua anggota implementasi terlihat',
                'body' => 'Variabel IPemberitahuan hanya memberi akses langsung ke kontrak interface. Property tambahan di PesanConsole tidak menjadi bagian interface hanya karena objeknya mempunyai property itu.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Catat jumlah pemanggilan',
                'task' => 'Buat PesanHitung yang mengimplementasikan IPemberitahuan dan menaikkan property Jumlah setiap Kirim. Panggil dua kali.',
                'hint' => 'Property boleh dibaca dari luar dengan get dan diubah dari dalam dengan private set.',
                'answer' => 'class PesanHitung : IPemberitahuan { public int Jumlah { get; private set; } public void Kirim(string pesan) { Jumlah++; } }. Simpan instance sebagai variabel, panggil Kirim dua kali, lalu Jumlah bernilai 2.',
            ],
            [
                'title' => 'Latihan 2 · Kerangka laporan',
                'task' => 'Buat abstract class Laporan dengan abstract string Isi(), lalu LaporanStok yang mengembalikan teks Stok: 3. Panggil melalui variabel Laporan.',
                'hint' => 'Abstract method tidak memiliki badan di class dasar dan wajib di-override oleh turunan konkret.',
                'answer' => 'abstract class Laporan { public abstract string Isi(); } class LaporanStok : Laporan { public override string Isi() => "Stok: 3"; }. Laporan laporan = new LaporanStok(); Console.WriteLine(laporan.Isi()); mencetak Stok: 3.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Interface',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/interfaces',
            ],
            [
                'label' => 'Microsoft Learn · Abstract class dan anggota',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/keywords/abstract',
            ],
        ],
    ],
    'exception-handling' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Bedakan pesan pengguna dan informasi diagnosis',
                'body' => 'Pengguna pembagi konsumsi perlu tahu bahwa jumlah peserta harus lebih dari nol. Pengembang juga membutuhkan konteks operasi yang gagal, lokasi kode, dan jenis exception ketika masalah tak terduga muncul. Satu pesan tidak harus melayani kedua tujuan tersebut. Pada aplikasi kecil, tampilkan instruksi perbaikan yang konkret, misalnya masukkan angka bulat positif, lalu simpan detail teknis melalui mekanisme log ketika aplikasi berkembang. Hindari pesan umum terjadi kesalahan pada semua situasi karena pengguna tidak tahu tindakan selanjutnya. Sebaliknya, jangan menampilkan seluruh detail internal pada halaman publik hanya karena exception mempunyai pesan panjang. Tentukan informasi yang membantu penerima pesan mengambil langkah berikutnya. Untuk latihan, tulis versi pesan untuk peserta acara dan versi catatan untuk pengembang; perbedaan kebutuhan keduanya akan terlihat jelas.',
            ],
            [
                'heading' => 'Tangkap kegagalan pada tempat yang bisa merespons',
                'body' => 'Tidak setiap method membutuhkan try dan catch. Jika method tidak mempunyai cara memulihkan keadaan atau menambahkan konteks yang bermakna, membiarkan exception menuju pemanggil dapat lebih jelas. Contohnya pembaca file tidak tahu apakah pengguna ingin memilih file lain, sedangkan layar pemilihan file mengetahui interaksi tersebut. Menangkap semua exception lalu mengembalikan nol akan mengaburkan perbedaan antara hasil hitungan sah dan operasi gagal. Buat keputusan eksplisit: ulangi dengan input baru, gunakan cadangan yang memang dibenarkan, atau hentikan alur dengan informasi yang tepat. Bila perlu melempar kembali exception yang sama dari catch, gunakan throw; untuk mempertahankan jejak aslinya. Bayangkan petugas loket yang meneruskan laporan kepada bagian yang berwenang, bukan mencap semua permintaan berhasil hanya agar antrean terlihat lancar. Keberhasilan palsu membuat masalah berikutnya lebih sulit ditemukan.',
            ],
            [
                'heading' => 'Validasi sintaks input dan aturan nilainya',
                'body' => 'Teks dapat berhasil dikonversi menjadi angka tetapi tetap tidak memenuhi aturan. Misalnya nol dan minus tiga sah sebagai int, namun tidak sah sebagai jumlah peserta untuk pembagian makanan. Karena itu lakukan dua pemeriksaan: TryParse untuk bentuk bilangan, lalu batas bisnis untuk maknanya. Input yang terlalu besar bagi int juga gagal dikonversi; pesan pengguna sebaiknya tidak mengklaim bahwa semua digit pasti diterima. Untuk latihan, buat tabel input empat, nol, negatif, dan positif. Tentukan apakah konversi berhasil, apakah aturan terpenuhi, dan apakah pembagian dijalankan. Dengan memisahkan tahap ini, kamu tidak perlu memakai exception sebagai mekanisme percobaan pada setiap input biasa. Jangan lupa bahwa pembagian int membuang bagian pecahan: dua belas makanan untuk lima peserta menghasilkan dua bagian utuh, dengan sisa yang perlu dijelaskan jika model acaranya membutuhkannya.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Siapkan nilai yang memicu kegagalan',
                'explanation' => 'jumlahPeserta diisi 0. Ekspresi 12 / jumlahPeserta merupakan pembagian int saat runtime dan tidak dapat menghasilkan bagian.',
            ],
            [
                'title' => 'Lompat ke catch yang sesuai',
                'explanation' => 'DivideByZeroException membuat WriteLine(bagian) dilewati. Catch dengan tipe yang sesuai menangani keadaan itu dan mencetak pesan jumlah peserta tidak boleh nol.',
            ],
            [
                'title' => 'Jalankan penutup',
                'explanation' => 'Setelah catch, finally mencetak Perhitungan selesai diperiksa. Pesan itu menyatakan pemeriksaan selesai, bukan bahwa pembagian berhasil.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Catch kosong menyembunyikan kegagalan',
                'body' => 'catch tanpa tindakan membuat pemanggil mungkin meneruskan pekerjaan seolah berhasil. Tangani dengan keputusan yang bermakna atau biarkan exception menuju lapisan yang bisa merespons.',
            ],
            [
                'title' => 'TryParse dianggap validasi lengkap',
                'body' => 'TryParse dapat menerima angka negatif dan nol. Tambahkan aturan peserta > 0 sebelum menghitung pembagian.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Jejak jalur berhasil',
                'task' => 'Ubah jumlahPeserta pada contoh menjadi 4. Prediksi semua baris output dan blok mana yang dilewati.',
                'hint' => 'Tidak ada pembagian nol, tetapi finally tetap menjadi bagian alur keluar.',
                'answer' => 'Output pertama 3, lalu Perhitungan selesai diperiksa. Badan try selesai normal, catch dilewati, dan finally dijalankan.',
            ],
            [
                'title' => 'Latihan 2 · Konversi dan sisa',
                'task' => 'Validasi input "5" sebagai jumlah peserta positif, lalu hitung pembagian 12 makanan dan sisanya tanpa exception sebagai alur utama.',
                'hint' => 'Gunakan TryParse, pemeriksaan > 0, operator /, dan operator %.',
                'answer' => 'if (int.TryParse("5", out int peserta) && peserta > 0) { Console.WriteLine(12 / peserta); Console.WriteLine(12 % peserta); }. Hasilnya 2 makanan utuh per orang dan sisa 2.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Praktik exception',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/exceptions/best-practices-for-exceptions',
            ],
            [
                'label' => 'Microsoft Learn · Int32.TryParse',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/api/system.int32.tryparse?view=net-10.0',
            ],
        ],
    ],
    'generics' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Generics menjaga hubungan input dan hasil',
                'body' => 'Bayangkan loket penitipan yang mengembalikan barang dengan jenis sesuai tiket. Kotak<string> menjanjikan Isi berupa string, sedangkan Kotak<int> menjanjikan int. Informasi ini dipertahankan pada seluruh pemakaian komponen, sehingga pemanggil dapat langsung melakukan operasi yang cocok tanpa menebak jenisnya. Generics paling bermanfaat ketika struktur pekerjaannya sama tetapi tipe data bervariasi. Menyimpan dan mengembalikan satu nilai adalah contoh sederhana; antrean, koleksi, dan hasil operasi merupakan contoh yang lebih nyata. Jangan mengubah semua class menjadi generic hanya agar terlihat fleksibel. Jika logika khusus menghitung harga rupiah, tipe decimal yang eksplisit justru menjelaskan maksudnya. Cari pengulangan struktur terlebih dahulu, kemudian tentukan bagian yang benar-benar bervariasi. Dengan pendekatan ini, parameter tipe muncul sebagai jawaban kebutuhan, bukan dekorasi pada nama class.',
            ],
            [
                'heading' => 'Constraint menyatakan kemampuan minimum',
                'body' => 'Tanpa constraint, compiler tidak boleh menganggap T mempunyai property Judul atau method Kirim. Nama parameter tipe tidak membuat kemampuan itu ada. Jika implementasi memang perlu mengirim pemberitahuan, constraint where T : IPemberitahuan memberi jaminan kontrak tersebut. Jika perlu membuat instance melalui new T(), constraint new() mensyaratkan constructor publik tanpa parameter pada tipe konkret yang dipakai. Jangan memakai constraint lebih ketat daripada kebutuhan, karena itu menolak tipe yang sebenarnya dapat bekerja dengan benar. Bayangkan persyaratan pekerjaan yang hanya meminta kemampuan mengemudi; mewajibkan calon pekerja memiliki warna sepeda tertentu tidak membantu tugasnya. Tuliskan satu operasi yang diperlukan di dalam class, kemudian hubungkan dengan constraint yang menjaminnya. Bila class hanya menyimpan nilai seperti Kotak, tidak ada kemampuan tambahan yang perlu dipaksakan pada T.',
            ],
            [
                'heading' => 'Readonly property belum membekukan isi objek',
                'body' => 'Kotak<T> pada contoh memiliki property Isi dengan get saja. Artinya referensi atau nilai property ditetapkan saat constructor dan tidak dapat diganti dari luar melalui setter. Namun jika T adalah List<string>, daftar yang dipegang tetap dapat ditambah atau dikurangi melalui method List. Pembatasan penggantian property berbeda dari pembatasan perubahan objek yang dirujuk. Gambarkan Kotak sebagai lemari dengan label alamat daftar; labelnya tidak bisa diganti, tetapi daftar pada alamat tersebut masih dapat ditulis. Untuk T berupa int, nilainya sendiri tidak menyediakan operasi mutasi objek seperti List, sehingga perilakunya tampak lebih sederhana. Pemahaman ini menghubungkan generics dengan materi referensi. Jangan menyimpulkan suatu struktur sepenuhnya immutable hanya karena semua property memakai get. Periksa juga kemampuan nilai yang disimpan dan apakah referensi itu dibagikan kepada pihak lain.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Pilih dua tipe konkret',
                'explanation' => 'new Kotak<string>("Belajar C#") mengganti T dengan string. new Kotak<int>(3) mengganti T dengan int pada pemakaian lainnya.',
            ],
            [
                'title' => 'Constructor mengikuti tipe',
                'explanation' => 'Parameter T isi harus sesuai tipe kotak, lalu disimpan ke Isi yang juga bertipe T. Tidak ada cast ke object maupun pemeriksaan jenis manual di contoh.',
            ],
            [
                'title' => 'Gunakan hasil yang sudah bertipe',
                'explanation' => 'judul.Isi dicetak sebagai teks. jumlah.Isi + 2 adalah penjumlahan int 3 dan 2 sehingga hasilnya 5; informasi tipe tersedia pada pemanggil.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'T dianggap tipe dinamis',
                'body' => 'T disubstitusi oleh tipe konkret pada penggunaan generic. Kotak<int> tidak bebas menerima string pada pemanggilan berikutnya.',
            ],
            [
                'title' => 'Memanggil anggota yang tidak dijamin',
                'body' => 'Menulis Isi.Kirim() dalam Kotak<T> tanpa constraint yang sesuai gagal dikompilasi. Nyatakan kontrak minimum atau pindahkan perilaku khusus ke pemanggil.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Generic method sederhana',
                'task' => 'Buat method Identitas<T>(T nilai) yang mengembalikan inputnya. Panggil dengan 12 dan teks Halo.',
                'hint' => 'Parameter tipe dapat berada pada method, tidak hanya pada class.',
                'answer' => 'static T Identitas<T>(T nilai) => nilai;. Identitas(12) menghasilkan int 12 dan Identitas("Halo") menghasilkan string Halo; compiler dapat menyimpulkan T dari argumen.',
            ],
            [
                'title' => 'Latihan 2 · Isi yang tetap bisa berubah',
                'task' => 'Buat Kotak<List<string>> dari daftar berisi "Beras", lalu tambahkan "Telur" melalui Isi. Tentukan Count dan jelaskan mengapa get saja tidak menolaknya.',
                'hint' => 'Add mengubah objek List, bukan menugaskan ulang property Isi.',
                'answer' => 'var kotak = new Kotak<List<string>>(new List<string> { "Beras" }); kotak.Isi.Add("Telur");. Count menjadi 2. Referensi Isi tetap sama, sementara isi List berubah.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Generic types dan methods',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/generics',
            ],
            [
                'label' => 'Microsoft Learn · Generic constraints',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/generics/constraints-on-type-parameters',
            ],
        ],
    ],
    'delegates-events-lambda' => [
        'minutes_extra' => 30,
        'extra_sections' => [
            [
                'heading' => 'Baca lambda sebagai fungsi kecil',
                'body' => 'Ekspresi nama => Console.WriteLine(...) bukan teks perintah yang dijalankan ketika dideklarasikan. Itu mendefinisikan perilaku yang dapat dipanggil kemudian dengan satu argumen nama. Sebelah kiri panah menyatakan parameter, sedangkan sebelah kanan menyatakan pekerjaan. Untuk memastikan pemahaman, tulis versi method biasa yang menerima string lalu mencetak pesan yang sama. Sesudah itu bandingkan keduanya: kontrak input dan output tetap sama, hanya bentuk penulisannya yang berbeda. Action cocok untuk pekerjaan tanpa hasil kembali, sedangkan Func cocok untuk perhitungan yang menghasilkan nilai. Misalnya pemformatan label pesanan lebih cocok menghasilkan string agar pemanggil memilih apakah akan mencetak atau menyimpannya. Lambda singkat membantu ketika maksudnya mudah dibaca; jika badan tumbuh panjang dan bercabang banyak, method bernama dapat menjelaskan tujuan dengan lebih baik.',
            ],
            [
                'heading' => 'Kelola masa berlangganan dengan sengaja',
                'body' => 'Pada event, publisher menyimpan referensi ke delegate subscriber. Jika publisher hidup lama dan subscriber seharusnya sudah selesai digunakan, langganan yang tertinggal dapat membuat hubungan itu tetap hidup. Dalam aplikasi berjendela, misalnya sebuah layar mendaftar pada layanan pesanan lalu ditutup, langganannya perlu mengikuti masa pakai layar. Simpan delegate ketika nanti perlu melepasnya; menulis lambda baru yang tampak sama bukan cara yang jelas untuk merujuk langganan lama. Uji urutan tambah subscriber, buat pesanan, lepas subscriber, lalu buat pesanan lagi. Hasil kedua harus mencerminkan langganan yang masih aktif. Bayangkan daftar penerima pengumuman kelas: murid yang pindah kelas perlu dihapus dari daftar agar pengumuman berikutnya tidak terus dikirim kepadanya. Tanggung jawab berhenti berlangganan sebaiknya ditentukan saat merancang tempat mulai berlangganan.',
            ],
            [
                'heading' => 'Event biasa bukan antrean pekerjaan',
                'body' => 'Ketika BuatPesanan memicu event, handler biasa dipanggil sebagai bagian alur pemanggilan tersebut. Handler yang lambat dapat menunda selesainya BuatPesanan, dan exception yang tidak ditangani pada handler dapat keluar melalui pemanggilan event. Karena itu jangan menganggap semua subscriber pasti selesai hanya karena event mempunyai beberapa penerima. Untuk latihan, pakai handler kecil dengan efek yang mudah diamati, seperti mencatat atau menampilkan pesan. Jika pekerjaan sudah melibatkan jaringan, kebutuhan retry, atau pengiriman yang bertahan setelah proses mati, kamu membutuhkan rancangan lain di luar event lokal sederhana. Bedakan pemberitahuan di dalam satu proses dari sistem antrean yang menyimpan pekerjaan. Mengetahui batas ini membantu memilih alat tanpa membebani latihan pertama dengan infrastruktur besar. Mulai dengan kontrak kejadian yang jelas: kapan diumumkan, data apa yang dibawa, dan apa arti kegagalan respons.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Siapkan publisher',
                'explanation' => 'new Toko() membuat objek yang memiliki event PesananDibuat. Sebelum +=, event belum mempunyai handler dari kode pemanggil ini.',
            ],
            [
                'title' => 'Daftarkan reaksi',
                'explanation' => '+= menambahkan lambda dengan parameter nama. Lambda ini akan mencetak "Siapkan: " diikuti argumen ketika dipanggil; mendaftarkannya belum membuat pesanan.',
            ],
            [
                'title' => 'Terbitkan kejadian',
                'explanation' => 'BuatPesanan("Nasi goreng") meneruskan nama melalui PesananDibuat?.Invoke(nama). Handler menerima Nasi goreng dan mencetak satu baris Siapkan: Nasi goreng.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Mengira += langsung memanggil lambda',
                'body' => '+= berlangganan pada event. Perilaku terjadi ketika publisher memanggil event, dalam contoh melalui BuatPesanan.',
            ],
            [
                'title' => 'Melepas dengan lambda baru',
                'body' => 'Simpan delegate yang didaftarkan jika nantinya perlu -=. Lambda baru dengan teks badan yang sama tidak menjadi cara andal untuk menunjuk delegate langganan sebelumnya.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Tanpa subscriber',
                'task' => 'Hapus baris += dari contoh lalu buat satu pesanan. Prediksi keluaran dan apakah pemanggilan Invoke memicu null error.',
                'hint' => 'Perhatikan operator ?. sebelum Invoke.',
                'answer' => 'Tidak ada pesan yang dicetak. Operator ?. melewati pemanggilan Invoke ketika event bernilai null, sehingga ketiadaan subscriber tidak menimbulkan NullReferenceException pada contoh ini.',
            ],
            [
                'title' => 'Latihan 2 · Fungsi pemformat',
                'task' => 'Buat Func<string, string> yang mengubah nama menu menjadi teks Pesanan: diikuti nama. Panggil dengan Soto dan cetak hasilnya.',
                'hint' => 'Func<string, string> menerima satu string dan mengembalikan string.',
                'answer' => 'Func<string, string> format = nama => $"Pesanan: {nama}"; string label = format("Soto"); Console.WriteLine(label); menghasilkan Pesanan: Soto. Lambda menghasilkan teks; WriteLine terpisah yang mencetaknya.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Events',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/programming-guide/events/',
            ],
            [
                'label' => 'Microsoft Learn · Lambda expressions',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/operators/lambda-expressions',
            ],
        ],
    ],
    'linq' => [
        'minutes_extra' => 30,
        'extra_sections' => [
            [
                'heading' => 'Ikuti bentuk data di setiap langkah',
                'body' => 'Rantai LINQ lebih mudah dibaca jika kamu menuliskan bentuk elemen setelah setiap operasi. Pada contoh, sumber berupa angka, setelah Where tetap angka tetapi jumlah anggotanya berkurang, setelah OrderBy tetap angka dengan urutan baru, dan setelah Select elemennya menjadi string berlabel. Jika ingin menghitung rata-rata, lakukan pada rangkaian angka sebelum label tampilan ditambahkan. Kebiasaan memisahkan data hitungan dan teks tampilan menghindari kebutuhan mengubah string kembali menjadi angka. Bayangkan proses pengolahan nilai di sekolah: pilih murid yang lulus, urutkan nilainya, baru cetak sertifikat. Sertifikat merupakan produk tampilan, bukan sumber ideal untuk menghitung statistik. Ketika suatu operasi LINQ terasa sulit disambungkan, periksa apakah bentuk elemen sebelumnya masih sesuai dengan kebutuhan berikutnya. Tipe membantu membaca aliran data selain memeriksa kesalahan sintaks.',
            ],
            [
                'heading' => 'Bedakan instruksi query dan snapshot hasil',
                'body' => 'Query yang belum dimaterialisasi dapat dibayangkan sebagai resep penyaringan, sedangkan ToList membuat daftar hasil pada waktu tertentu. Jika sumber berubah sebelum resep dijalankan, hasil mengikuti data yang dibaca saat enumerasi. Namun snapshot List juga bukan salinan mendalam semua objek. Bila elemennya class, daftar baru masih dapat memegang referensi ke objek yang sama. Pada contoh elemen akhir berupa string yang dibentuk dari angka, sehingga hasil label yang tersimpan tidak menghitung ulang nilai sumber secara otomatis. Untuk latihan, bandingkan query Where tanpa ToList dengan hasil yang telah memakai ToList, lalu ubah satu angka dalam array sebelum foreach. Jelaskan perbedaan kapan seleksi dikerjakan. Pemahaman waktu eksekusi penting ketika query dipakai ulang, terutama bila pembacaan sumber mempunyai biaya atau efek yang dapat diamati.',
            ],
            [
                'heading' => 'Pikirkan data kosong dan urutan yang disengaja',
                'body' => 'Laporan nilai dapat tidak mempunyai satu pun peserta yang lulus. Where pada keadaan ini menghasilkan rangkaian kosong, dan foreach cukup tidak mencetak anggota. Namun operasi agregasi tertentu seperti Average pada rangkaian int kosong tidak mempunyai jawaban dan melempar exception. Tentukan pesan untuk keadaan kosong sebelum melakukan hitungan yang memerlukan anggota. Urutan juga perlu didefinisikan jika kamu mengambil beberapa hasil teratas. Take membatasi jumlah dari urutan yang diterimanya; tanpa pengurutan yang tepat, dua hasil pertama bukan berarti dua terbesar. Untuk data dengan nilai sama, pikirkan kriteria tambahan ketika identitas peserta sudah tersedia. Kebiasaan ini membuat query mencerminkan maksud laporan, bukan kebetulan urutan input. Coba selalu tiga bentuk data latihan: semua memenuhi syarat, sebagian memenuhi, dan tidak ada yang memenuhi.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Saring nilai yang memenuhi batas',
                'explanation' => 'nilai berisi 90, 60, 75, dan 80. Where dengan angka >= 75 mengeluarkan 60 dari rangkaian hasil.',
            ],
            [
                'title' => 'Urutkan angka sebelum memberi label',
                'explanation' => 'OrderBy menghasilkan urutan 75, 80, 90. Select kemudian membentuk teks "Lulus: " untuk setiap angka; tipe elemen hasil berubah menjadi string.',
            ],
            [
                'title' => 'Simpan dan cetak hasil',
                'explanation' => 'ToList menjalankan rangkaian query dan menyimpannya pada lulus. foreach membaca tiga string yang sudah terbentuk dan mencetaknya sesuai urutan daftar.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Take sebelum menentukan peringkat',
                'body' => 'Take(2).OrderByDescending(...) hanya mengurutkan dua anggota yang lebih dahulu dipilih. Untuk dua terbesar, lakukan OrderByDescending dahulu lalu Take(2).',
            ],
            [
                'title' => 'Menghitung rata-rata setelah membuat label',
                'body' => 'Setelah Select menghasilkan string, data bukan lagi angka untuk Average. Simpan query angka atau hitung agregat sebelum membentuk teks tampilan.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Hitung yang belum lulus',
                'task' => 'Gunakan array contoh untuk menghitung jumlah nilai di bawah 75 dan jumlah seluruh nilainya.',
                'hint' => 'Count dapat menerima predicate, sedangkan Sum menghitung total elemen numerik.',
                'answer' => 'nilai.Count(n => n < 75) menghasilkan 1. nilai.Sum() menghasilkan 305. Jumlah anggota berbeda dari total nilai.',
            ],
            [
                'title' => 'Latihan 2 · Laporan yang mungkin kosong',
                'task' => 'Ambil nilai minimal 100 dari array contoh. Tampilkan Belum ada nilai jika kosong; hanya hitung rata-rata jika ada anggota.',
                'hint' => 'Materialisasikan sekali lalu periksa Count.',
                'answer' => 'var tinggi = nilai.Where(n => n >= 100).ToList(); if (tinggi.Count == 0) Console.WriteLine("Belum ada nilai"); else Console.WriteLine(tinggi.Average());. Data contoh menampilkan Belum ada nilai tanpa memanggil Average pada rangkaian kosong.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Operator query LINQ',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/linq/standard-query-operators/',
            ],
            [
                'label' => 'Microsoft Learn · Deferred execution',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/linq/deferred-execution-lazy-evaluation',
            ],
        ],
    ],
    'async-await' => [
        'minutes_extra' => 30,
        'extra_sections' => [
            [
                'heading' => 'Gambar waktu mulai dan waktu menunggu',
                'body' => 'Dua pekerjaan independen dapat dimulai sebelum salah satunya ditunggu. Misalnya aplikasi mengambil menu dan jam buka restoran dari dua sumber terpisah. Jika kamu langsung await permintaan pertama sebelum memulai kedua, waktu tunggunya cenderung berurutan. Jika keduanya dimulai dahulu lalu ditunggu bersama, waktu tunggu dapat bertumpang tindih. Ini tidak berarti jaringan menjadi lebih cepat atau jumlah pekerjaan berkurang. Gambar garis waktu dengan penanda mulai dan selesai untuk melihat perbedaannya. Sebaliknya, pekerjaan yang membutuhkan hasil pertama tidak dapat sembarang dimulai bersamaan, seperti mengambil detail pesanan setelah memperoleh nomor pesanan yang dibuat server. Tentukan dependensi data sebelum memilih WhenAll. Untuk latihan, gunakan Delay dengan durasi berbeda dan catat urutan pesan, tetapi jangan menganggap pengukuran milidetik kecil selalu persis sama karena penjadwalan sistem dapat bervariasi.',
            ],
            [
                'heading' => 'Pembatalan adalah permintaan kooperatif',
                'body' => 'Pengguna dapat meninggalkan layar sebelum pencarian selesai. CancellationToken memungkinkan kode menyampaikan bahwa hasil pekerjaan tersebut sudah tidak diperlukan, tetapi operasi perlu meneruskan dan menghormati token itu. Token bukan tombol yang mematikan thread secara paksa. Untuk latihan, tambahkan parameter CancellationToken pada method yang menunggu Delay dan berikan token ke overload Delay yang sesuai. Ketika pembatalan diminta sebelum penantian selesai, await dapat berakhir melalui exception pembatalan sehingga jalur hasil normal dilewati. Bedakan status dibatalkan dari gagal karena masalah jaringan, karena pengguna mengambil tindakan yang berbeda. Bayangkan pesanan dapur yang dibatalkan: pemberitahuan harus sampai kepada bagian yang masih bekerja, dan ada tahap yang mungkin sudah terlanjur selesai. Karena itu pikirkan juga efek samping yang telah terjadi sebelum token diperiksa, terutama ketika pekerjaan menulis data.',
            ],
            [
                'heading' => 'Amati kegagalan lewat task yang ditunggu',
                'body' => 'Method async yang mengembalikan Task menyampaikan penyelesaian maupun kegagalannya melalui task tersebut. Menjalankan operasi lalu mengabaikan task membuat pemanggil kehilangan tempat yang jelas untuk mengetahui apakah pekerjaan berhasil. Untuk alur biasa, tunggu dengan await dan letakkan try/catch pada lapisan yang mampu menentukan respons. Hindari memakai async void untuk method pekerjaan umum karena pemanggil tidak menerima task untuk ditunggu; bentuk itu terutama digunakan ketika signature event handler memang menuntut void. Ketika beberapa task ditunggu bersama, rencanakan apa yang dilakukan bila satu atau lebih gagal, tanpa menganggap pekerjaan lainnya otomatis berhenti. Untuk pemula, mulai dari operasi tanpa efek samping agar percobaan mudah diulang. Setelah memahami urutan, baru tambahkan penanganan kegagalan dan pembatalan sebagai bagian kontrak method, bukan tambalan di akhir program.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Pemanggilan menghasilkan task',
                'explanation' => 'AmbilPesananAsync mulai berjalan dan menemui await Task.Delay(300). Task<string> yang dikembalikan disimpan pada pesanan untuk mewakili penyelesaiannya.',
            ],
            [
                'title' => 'Pemanggil melakukan langkah berikutnya',
                'explanation' => 'Console.WriteLine tentang menyiapkan meja berada sebelum await pesanan. Karena itu pesan meja dicetak sebelum program menampilkan hasil pesanan.',
            ],
            [
                'title' => 'Tunggu hasil, lalu gunakan string',
                'explanation' => 'await pesanan menghasilkan string setelah method menyelesaikan Delay dan return "Pesanan siap.". String itu disimpan dalam hasil dan kemudian dicetak.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Await pertama membuat permintaan berikutnya terlambat dimulai',
                'body' => 'Jika dua operasi independen hendak bertumpang tindih, simpan kedua task sebelum await WhenAll. Await berurutan menyatakan alur tunggu yang berbeda.',
            ],
            [
                'title' => 'Membungkus I/O async dengan blokir',
                'body' => '.Result atau .Wait() memblokir thread yang menunggu. Pertahankan alur await untuk operasi yang memang menyediakan API async.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Tiga langkah yang bisa diprediksi',
                'task' => 'Tambahkan Console.WriteLine("Mulai") sebelum membuat task dan Console.WriteLine("Selesai") setelah mencetak hasil. Tentukan urutan empat pesan.',
                'hint' => 'Bedakan langkah sebelum await dan sesudah task selesai.',
                'answer' => 'Urutannya Mulai; Sambil menunggu, siapkan meja.; Pesanan siap.; Selesai. Pesan sesudah await dijalankan setelah task menghasilkan string.',
            ],
            [
                'title' => 'Latihan 2 · Dua hasil sesuai urutan input',
                'task' => 'Buat Task<string> pertama yang menghasilkan A setelah 300 ms dan kedua B setelah 50 ms. Mulai keduanya lalu await Task.WhenAll(pertama, kedua). Tentukan urutan array hasil.',
                'hint' => 'Urutan hasil WhenAll<T> mengikuti urutan task yang diberikan, bukan urutan selesai.',
                'answer' => 'Gunakan method async Task<string> Tunggu(string nama, int ms) { await Task.Delay(ms); return nama; }. Buat pertama = Tunggu("A", 300) dan kedua = Tunggu("B", 50), lalu await Task.WhenAll(pertama, kedua). Array hasil berisi A kemudian B walaupun B biasanya selesai lebih dahulu.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Pemrograman asynchronous',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/csharp/asynchronous-programming/',
            ],
            [
                'label' => 'Microsoft Learn · Task.WhenAll',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/api/system.threading.tasks.task.whenall?view=net-10.0',
            ],
        ],
    ],
    'file-json' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Pisahkan bentuk penyimpanan dari makna aplikasi',
                'body' => 'JSON dapat menyatakan teks, angka, array, objek, boolean, dan null, tetapi keberhasilan membacanya belum menjamin data masuk akal bagi aplikasi. Array string berisi nama kosong tetap mempunyai bentuk yang cocok dengan string[], namun nama kosong mungkin dilarang pada daftar belanja. Karena itu validasi dilakukan setelah deserialisasi sesuai aturan model. Saat struktur berkembang dari daftar nama menjadi barang dengan nama dan jumlah, pertimbangkan bagaimana membaca file versi lama. Menambahkan struktur baru tanpa rencana membuat pengguna lama terlihat kehilangan data hanya karena formatnya berubah. Untuk latihan, simpan contoh file kecil di samping penjelasan bentuk yang diharapkan. Bayangkan label isi kardus: format label membantu membacanya, tetapi kamu masih perlu memeriksa apakah barang di dalamnya sesuai kebutuhan. Kontrak data memuat bentuk sekaligus aturan makna.',
            ],
            [
                'heading' => 'Tentukan lokasi file sebagai bagian perilaku',
                'body' => 'Path relatif mengikuti working directory proses, sehingga nama belanja.json dapat menunjuk lokasi berbeda ketika cara menjalankan aplikasi berubah. Untuk memahami ini, cetak Path.GetFullPath dari nama file sebelum menulis dan cocokkan dengan folder yang kamu buka di pengelola file. Jangan menganggap lokasi source selalu sama dengan lokasi kerja aplikasi yang sudah dipublish. Untuk proyek latihan, pilih satu direktori data yang jelas dan dokumentasikan siapa yang boleh menulis ke sana. Saat aplikasi berkembang, pisahkan file data pengguna dari file program yang dapat diganti ketika rilis. Bayangkan warung yang menyimpan buku kas di laci tetap, bukan di kardus pengiriman mesin kasir. Kebiasaan menamai lokasi dengan jelas membantu backup, pencarian file, dan penanganan pesan gagal ketika folder atau izin tidak sesuai dengan harapan.',
            ],
            [
                'heading' => 'Menulis file perlu memikirkan keadaan gagal',
                'body' => 'WriteAllTextAsync mengganti isi file tujuan, sehingga menjalankan contoh akan menulis ulang daftar dari awal. Untuk belajar pembacaan data yang bertahan, pisahkan mode membuat data contoh dan mode membaca data tersimpan. Jika keduanya selalu dijalankan berurutan, perubahan manual di file akan tertimpa sebelum sempat terlihat. Pada aplikasi nyata, penulisan dapat gagal karena disk penuh, izin, atau gangguan lain; karena itu keputusan menyatakan berhasil harus dilakukan sesudah operasi selesai. Untuk data penting, pola menyimpan ke file sementara lalu mengganti file tujuan dapat membantu, tetapi jaminan penggantian bergantung pada API dan sistem berkas yang digunakan. Jangan mengklaim file tunggal aman untuk banyak penulis sekaligus. Mulai dari satu proses dan satu alur penyimpanan yang mudah diamati, kemudian pilih database ketika kebutuhan koordinasi atau query menjadi lebih besar.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Ubah array menjadi teks',
                'explanation' => 'belanja berisi Beras dan Telur. Serialize menghasilkan string json yang merepresentasikan array tersebut; langkah ini belum membuat file.',
            ],
            [
                'title' => 'Tulis lalu baca dari penyimpanan',
                'explanation' => 'WriteAllTextAsync menyimpan json ke "belanja.json". Setelah selesai ditunggu, ReadAllTextAsync membaca file dan menyimpan teksnya pada tersimpan.',
            ],
            [
                'title' => 'Bangun nilai bertipe tujuan',
                'explanation' => 'Deserialize<string[]>(tersimpan) mencoba membaca array string. Operator ?? memilih Array.Empty<string>() bila hasil null, tetapi tidak menangkap JsonException untuk teks rusak.',
            ],
            [
                'title' => 'Periksa teks dan jumlah anggota',
                'explanation' => 'WriteLine pertama menampilkan teks file, sedangkan baris kedua membaca dibaca.Length. Keduanya menunjukkan bentuk tersimpan dan hasil rekonstruksi dalam memori.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Fallback null dianggap penanganan JSON rusak',
                'body' => '?? menangani nilai null, bukan exception. JSON yang tidak valid atau bentuk yang tidak cocok tetap perlu ditangani melalui JsonException pada lapisan yang sesuai.',
            ],
            [
                'title' => 'File latihan selalu menimpa perubahan',
                'body' => 'Contoh menulis data awal sebelum membaca. Pisahkan langkah penulisan jika ingin melihat data dari eksekusi sebelumnya atau perubahan yang dilakukan di editor.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Null bukan array kosong literal',
                'task' => 'Deserialisasikan teks "null" ke string[] dengan fallback Array.Empty<string>(). Tentukan Length hasilnya.',
                'hint' => 'Literal JSON null dapat menghasilkan nilai null sebelum operator ?? bekerja.',
                'answer' => 'string[] data = JsonSerializer.Deserialize<string[]>("null") ?? Array.Empty<string>();. data.Length adalah 0 karena fallback dipilih. Teks JSON [] juga menghasilkan panjang nol, tetapi lewat hasil array kosong dari deserialisasi.',
            ],
            [
                'title' => 'Latihan 2 · Simpan JSON yang mudah dibaca',
                'task' => 'Serialisasikan daftar belanja dengan indentasi dan tunjukkan path absolut yang akan digunakan sebelum penulisan.',
                'hint' => 'Gunakan JsonSerializerOptions.WriteIndented dan Path.GetFullPath.',
                'answer' => 'string json = JsonSerializer.Serialize(belanja, new JsonSerializerOptions { WriteIndented = true }); Console.WriteLine(Path.GetFullPath("belanja.json")); await File.WriteAllTextAsync("belanja.json", json);. Indentasi mengubah tampilan teks tanpa mengubah jumlah elemen array.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · System.Text.Json',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/serialization/system-text-json/how-to',
            ],
            [
                'label' => 'Microsoft Learn · File dan stream I/O',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/standard/io/',
            ],
        ],
    ],
    'pilih-spesialisasi' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Batasi proyek lewat satu alur pengguna',
                'body' => 'Memilih web, desktop, atau game lebih mudah ketika kamu menuliskan satu alur yang ingin dialami pengguna. Untuk perpustakaan web, alurnya dapat berupa membuka daftar buku dan melihat detail satu buku. Untuk inventaris desktop, pengguna mengisi nama barang, menekan tambah, lalu melihat baris baru. Untuk game sederhana, pemain bergerak menuju koin dan skor bertambah. Setiap alur punya input, perubahan keadaan, dan hasil yang dapat diamati. Jangan memulai dengan daftar fitur yang belum saling terhubung karena kamu akan sulit menentukan kapan proyek selesai. Buat versi kecil yang dapat didemonstrasikan dalam satu menit, kemudian tambah satu kemampuan setelah alur pertama bekerja. Fondasi C# seperti validasi, koleksi, dan method tetap dipakai, tetapi cara menerima input serta memperlihatkan hasil mengikuti platform yang kamu pilih.',
            ],
            [
                'heading' => 'Request dan response membentuk percakapan HTTP',
                'body' => 'Saat browser membuka alamat /api/salam, browser mengirim request ke server yang sedang berjalan. Server memilih endpoint yang sesuai lalu mengirim response. Pada contoh, response berupa data JSON sehingga browser menampilkan teks data, bukan otomatis menyusun halaman dengan kartu dan tombol. Antarmuka web yang menarik membutuhkan langkah lain untuk merender data menjadi elemen halaman. Bayangkan petugas informasi yang mengembalikan formulir berisi jawaban; desain papan informasi adalah tanggung jawab terpisah. Metode HTTP juga memiliki arti: GET digunakan untuk meminta representasi data, sehingga alur membaca sebaiknya tidak dipakai sembarangan untuk melakukan perubahan penting. Untuk latihan, perhatikan alamat, metode, status response, dan body secara terpisah. Keempat bagian membantu menemukan apakah masalah berada pada routing, pemrosesan, atau penafsiran hasil oleh klien.',
            ],
            [
                'heading' => 'Tentukan batas data dan antarmuka sejak awal',
                'body' => 'Satu aturan seperti stok tidak boleh negatif dapat dipakai pada console, web, atau desktop. Jika aturan itu ditulis langsung di handler klik dan disalin ke endpoint, perbaikan berikutnya harus dilakukan di banyak tempat. Pisahkan logika aturan ke komponen C# yang menerima input jelas dan menghasilkan keputusan, kemudian biarkan platform menangani tampilan serta interaksi. Pada game, beberapa aturan sangat terikat pada engine, tetapi perhitungan skor atau syarat hadiah sering tetap dapat diuji terpisah. Tidak perlu langsung membangun arsitektur berlapis besar. Mulai dengan satu method kecil yang tidak membaca kontrol UI secara langsung. Saat memilih jalur, tanyakan juga cara menyimpan data, menguji perilaku, dan menjalankan proyek pada perangkat tujuan. Jawaban praktis tersebut memberi arah latihan setelah program pertama berhasil muncul di layar.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Bangun host aplikasi',
                'explanation' => 'WebApplication.CreateBuilder(args) menyiapkan builder dengan konfigurasi aplikasi. builder.Build() menghasilkan app yang akan menerima konfigurasi endpoint.',
            ],
            [
                'title' => 'Daftarkan satu rute GET',
                'explanation' => 'app.MapGet("/api/salam", ...) memasangkan permintaan GET pada path itu dengan lambda. Lambda membentuk objek anonim berisi pesan dan topik yang dikembalikan sebagai JSON.',
            ],
            [
                'title' => 'Jalankan server',
                'explanation' => 'app.Run() memulai aplikasi dan menunggu sampai dihentikan. Membuka endpoint memerlukan proses ini tetap berjalan pada alamat yang diberikan saat dotnet run.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'JSON dianggap halaman web yang sudah dirancang',
                'body' => 'Endpoint contoh mengembalikan data JSON. Tampilan berupa HTML, CSS, dan interaksi pengguna perlu dibuat tersendiri jika produk memerlukan halaman.',
            ],
            [
                'title' => 'Menguji port yang berbeda',
                'body' => 'Alamat localhost:5050 harus sesuai proses server yang berjalan. Baca log alamat server dan gunakan path /api/salam; membuka root / tidak otomatis memanggil endpoint itu.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Endpoint parameter sederhana',
                'task' => 'Tambahkan /api/salam/{nama} yang mengembalikan property pesan berisi Halo diikuti nama. Coba /api/salam/Habib.',
                'hint' => 'Nama parameter lambda dapat diikat dari segmen route yang sesuai.',
                'answer' => 'app.MapGet("/api/salam/{nama}", (string nama) => new { pesan = $"Halo, {nama}!" }); sebelum app.Run(). Permintaan /api/salam/Habib menghasilkan JSON dengan pesan Halo, Habib!.',
            ],
            [
                'title' => 'Latihan 2 · Kriteria penerimaan proyek',
                'task' => 'Untuk inventaris desktop kecil, tulis satu kasus input valid, satu kasus invalid, dan satu hasil yang harus tetap benar setelah penolakan.',
                'hint' => 'Gunakan aturan nama tidak kosong dan jumlah positif tanpa menambah fitur yang belum diperlukan.',
                'answer' => 'Kasus valid: nama Buku dan jumlah 3 menambah satu baris. Kasus invalid: nama kosong menampilkan pesan koreksi. Setelah penolakan, jumlah baris dan total stok tetap seperti sebelumnya; input gagal tidak menambah data sebagian.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Minimal APIs',
                'url' => 'https://learn.microsoft.com/en-us/aspnet/core/fundamentals/minimal-apis?view=aspnetcore-10.0',
            ],
            [
                'label' => 'Microsoft Learn · Gambaran WPF',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/desktop/wpf/overview/',
            ],
        ],
    ],
    'design-pattern' => [
        'minutes_extra' => 30,
        'extra_sections' => [
            [
                'heading' => 'Gunakan pola ketika perubahan sudah punya arah',
                'body' => 'Nama Factory, Repository, atau Strategy membantu tim membicarakan bentuk solusi yang dikenal, tetapi nama itu belum membuktikan bahwa aplikasi membutuhkannya. Mulai dari perubahan konkret yang sulit dilakukan. Jika cara pemberitahuan harus dapat diganti tanpa menyentuh proses checkout, interface kecil dan constructor injection langsung menjawab kebutuhan tersebut. Jika hanya ada satu perhitungan sederhana yang stabil, menambahkan beberapa lapisan abstraksi dapat membuat pembaca melewati terlalu banyak file untuk memahami satu hasil. Bayangkan menyusun peralatan bengkel: lemari khusus berguna ketika jenis alat sudah memerlukan pengelompokan, tetapi satu obeng tidak membutuhkan sistem gudang. Tulis alasan setiap batas baru dalam satu kalimat yang menyebut perubahan atau pengujian yang dimudahkannya. Jika alasannya hanya agar memakai pola populer, tunda dan lihat kebutuhan yang benar-benar muncul.',
            ],
            [
                'heading' => 'Pisahkan perakitan objek dari pekerjaan objek',
                'body' => 'Baris yang membuat NotifikasiConsole lalu memberikannya ke LayananCheckout adalah tempat perakitan hubungan objek. Sesudah dirakit, checkout cukup memakai kontrak INotifikasi. Tempat perakitan ini dapat berada di bagian awal program kecil; ketika aplikasi membesar, container DI dapat membantu membangun hubungan berdasarkan registrasi. Namun container bukan sumber manfaat utama dari pemisahan tersebut. Manfaat sudah terlihat saat satu objek pengganti dapat diserahkan melalui constructor tanpa mengedit LayananCheckout. Bayangkan mandor memberikan alat kepada teknisi sebelum pekerjaan dimulai; teknisi fokus memakai alat sesuai kontraknya. Hindari membuat objek dependensi baru lagi di dalam method Selesaikan karena itu melewati pilihan yang sudah diberikan pemanggil. Ketika suatu class sulit dibuat tanpa banyak konfigurasi tersembunyi, lihat apakah constructor sudah menyatakan kebutuhan sebenarnya atau masih menyembunyikannya di tempat lain.',
            ],
            [
                'heading' => 'Lifetime menentukan siapa yang berbagi keadaan',
                'body' => 'Dalam container DI, transient biasanya membuat instance saat layanan diminta, scoped berbagi instance dalam satu scope, dan singleton berbagi instance untuk masa hidup container. Pada aplikasi web, scope umumnya mengikuti satu request. Pilihan ini memengaruhi state yang tersimpan dalam objek. Pencatat pesan terakhir yang digunakan sebagai singleton dapat mencampur data beberapa pengguna jika tidak dirancang untuk keadaan bersama. Sebaliknya, layanan tanpa state yang aman untuk akses bersamaan dapat memiliki kebutuhan berbeda. Jangan memilih singleton hanya karena ingin mengurangi kata new atau menganggap semuanya pasti lebih cepat. Tanyakan siapa yang boleh berbagi data dan kapan sumber daya harus dilepas. Khusus dependensi scoped, hindari menyimpannya di singleton tanpa pengelolaan scope yang benar. Mulai dari kebutuhan perilaku, kemudian pilih lifetime yang menjaga batas tersebut tetap sesuai selama aplikasi berjalan.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Rakit dependensi secara eksplisit',
                'explanation' => 'new LayananCheckout(new NotifikasiConsole()) membuat implementasi notifikasi dan memberikannya ke constructor checkout. Contoh ini menggunakan DI manual tanpa container.',
            ],
            [
                'title' => 'Simpan kontrak yang dibutuhkan',
                'explanation' => 'Constructor menerima INotifikasi dan menyimpannya pada field readonly _notifikasi. LayananCheckout bergantung pada kemampuan Kirim, bukan detail console.',
            ],
            [
                'title' => 'Pekerjaan menghasilkan pemberitahuan',
                'explanation' => 'Selesaikan("INV-001") membentuk pesan Pesanan INV-001 selesai. dan meneruskannya ke _notifikasi.Kirim. NotifikasiConsole menentukan bagaimana pesan itu ditampilkan.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Membuat ulang dependensi di dalam method',
                'body' => 'Jika Selesaikan membuat new NotifikasiConsole sendiri, implementasi yang diberikan constructor diabaikan. Gunakan field _notifikasi agar pilihan pemanggil berlaku.',
            ],
            [
                'title' => 'Readonly disamakan dengan thread-safe',
                'body' => 'readonly mencegah field referensi ditugaskan ulang di luar tempat yang diizinkan. Itu tidak otomatis membuat objek dependensinya aman diakses bersamaan atau tidak dapat berubah.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Pencatat lebih dari satu pesan',
                'task' => 'Buat NotifikasiDaftar yang menyimpan semua pesan pada List<string>. Jalankan checkout untuk INV-001 dan INV-002, lalu tentukan jumlah catatan.',
                'hint' => 'Implementasikan Kirim dengan Add pada daftar yang dimiliki instance.',
                'answer' => 'class NotifikasiDaftar : INotifikasi { public List<string> Pesan { get; } = new(); public void Kirim(string pesan) => Pesan.Add(pesan); }. Berikan satu instance ke checkout lalu panggil Selesaikan dua kali. Pesan.Count adalah 2 dengan urutan sesuai pemanggilan.',
            ],
            [
                'title' => 'Latihan 2 · Temukan alasan abstraksi',
                'task' => 'Sebuah method HitungPajak(decimal total) murni hanya memiliki satu aturan yang sudah ditetapkan. Apakah harus langsung dibuat interface, factory, dan singleton? Jelaskan pemicu perubahan yang dapat membenarkannya kelak.',
                'hint' => 'Hubungkan pola dengan kebutuhan variasi, efek samping, atau batas pengujian.',
                'answer' => 'Belum harus. Method sederhana cukup selama kebutuhannya terpenuhi. Abstraksi dapat masuk akal ketika aturan pajak perlu dipilih berdasarkan wilayah atau sumber eksternal, sehingga pemilihan dan pengujian variasinya menjadi kebutuhan nyata.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Dependency injection',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/overview',
            ],
            [
                'label' => 'Microsoft Learn · Pedoman dependency injection',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/guidelines',
            ],
        ],
    ],
    'unit-testing-clean-code' => [
        'minutes_extra' => 30,
        'extra_sections' => [
            [
                'heading' => 'Pilih contoh yang membedakan benar dan hampir benar',
                'body' => 'Sebuah test berguna jika dapat membedakan implementasi yang memenuhi aturan dari implementasi yang terlihat mirip tetapi salah. Untuk diskon mulai seratus ribu, menguji hanya belanja dua ratus ribu tidak membedakan operator lebih besar dari dan lebih besar atau sama dengan. Kasus tepat bataslah yang menangkap perbedaan tersebut. Tambahkan kasus di bawah batas untuk memastikan diskon tidak diberikan terlalu dini, lalu satu kasus di atas batas untuk memastikan jalur biasa bekerja. Tidak perlu memakai ratusan angka acak ketika tiga contoh sudah menjelaskan batas penting. Bayangkan menguji penggaris potong: bahan jauh di bawah dan jauh di atas ukuran tidak membuktikan ketepatan garis potongnya. Tulis alasan pemilihan setiap data uji agar test menjadi dokumentasi aturan, bukan sekadar daftar angka yang membuat persentase cakupan naik.',
            ],
            [
                'heading' => 'Hasil harapan berasal dari aturan, bukan kode produksi',
                'body' => 'Jika test menghitung hasil harapan dengan ekspresi yang sama persis seperti implementasi, kesalahan logika dapat tersalin ke kedua tempat. Tentukan hasil secara independen dari contoh bisnis. Untuk total seratus ribu pada aturan diskon tetap sepuluh ribu, angka harapan adalah sepuluh ribu karena itulah kebijakan, bukan karena test menjalankan rumus produksi sekali lagi. Perhatikan juga apa yang kamu periksa: hasil method, perubahan keadaan, atau pesan yang dikirim ke dependensi. Pilih observasi yang sesuai janji publik agar perapian isi method tidak merusak test tanpa perubahan perilaku. Jika satu test membutuhkan banyak data yang tidak relevan, pertimbangkan apakah unit yang diuji mempunyai terlalu banyak tanggung jawab. Test yang ringkas dengan alasan jelas sering mengungkap desain yang lebih mudah dipahami oleh pemakai berikutnya.',
            ],
            [
                'heading' => 'Bangun siklus gagal, perbaiki, rapikan',
                'body' => 'Untuk aturan baru, mulai dengan test yang akan gagal karena perilaku tersebut belum tersedia. Pastikan kegagalan benar-benar berasal dari aturan yang hilang, bukan proyek yang tidak dapat dikompilasi atau assertion yang salah. Tambahkan implementasi secukupnya agar test lulus, kemudian rapikan penamaan dan pengulangan tanpa mengubah hasil. Menjalankan test sesudah perapian memberi umpan balik cepat tentang perubahan yang tidak disengaja. Namun unit test tidak membuktikan konfigurasi HTTP, query database, atau paket rilis sudah benar. Buat pemeriksaan integrasi ketika dua komponen perlu bekerja bersama. Bayangkan merakit sepeda: menguji rem sebagai komponen berbeda dari mencoba sepeda yang sudah dirakit di jalan. Keduanya berguna pada batas berbeda. Jangan memaksa semua pemeriksaan menjadi unit test dengan tiruan yang justru menghilangkan perilaku integrasi yang ingin dibuktikan.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Nyatakan satu aturan diskon',
                'explanation' => 'AturanDiskon.Hitung mengembalikan 10000 untuk total minimal 100000 dan 0 untuk nilai di bawah batas itu.',
            ],
            [
                'title' => 'Berikan tiga contoh perilaku',
                'explanation' => 'Theory membaca setiap InlineData sebagai pemanggilan terpisah. Data 99999 menguji bawah batas, 100000 menguji tepat batas, dan 150000 menguji atas batas.',
            ],
            [
                'title' => 'Jalankan lalu bandingkan',
                'explanation' => 'Method test memanggil AturanDiskon.Hitung(total), menyimpan hasil, lalu Assert.Equal membandingkannya dengan diharapkan. Ketidaksamaan membuat kasus terkait gagal.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Test hanya memeriksa bahwa tidak ada exception',
                'body' => 'Untuk method penghitungan, tidak melempar exception belum membuktikan nominal diskon benar. Periksa nilai sesuai kebijakan.',
            ],
            [
                'title' => 'Menyalin rumus ke hasil harapan',
                'body' => 'Jika test dan produksi menyalin operator yang salah, keduanya dapat cocok. Gunakan contoh yang hasilnya ditentukan dari aturan secara independen.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Temukan test yang menangkap regresi',
                'task' => 'Jika implementasi selalu mengembalikan 10000, tentukan InlineData mana yang gagal pada contoh.',
                'hint' => 'Periksa kasus yang mengharapkan tanpa diskon.',
                'answer' => 'InlineData(99999, 0) gagal karena hasil aktual 10000. Dua kasus lain tetap lulus, sehingga adanya kasus di bawah batas menjadi penting.',
            ],
            [
                'title' => 'Latihan 2 · Aturan dua tingkat',
                'task' => 'Ubah aturan menjadi diskon 10000 mulai 100000 dan 25000 mulai 200000. Tentukan empat data batas dan implementasinya.',
                'hint' => 'Periksa batas tertinggi lebih dahulu agar tidak tertangkap cabang tingkat pertama.',
                'answer' => 'Data: (99999, 0), (100000, 10000), (199999, 10000), (200000, 25000). Implementasi: total >= 200000 ? 25000 : total >= 100000 ? 10000 : 0. Tambahkan data Theory sesuai aturan dan pastikan semuanya lulus.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Unit test C# dengan xUnit',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/core/testing/unit-testing-csharp-with-xunit',
            ],
            [
                'label' => 'Microsoft Learn · Praktik unit testing',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/core/testing/unit-testing-best-practices',
            ],
        ],
    ],
    'entity-framework' => [
        'minutes_extra' => 35,
        'extra_sections' => [
            [
                'heading' => 'Ikuti siklus hidup satu perubahan',
                'body' => 'Ketika sebuah Buku diambil melalui query biasa, context dapat melacak entity itu. Mengubah property Judul mengubah objek dalam memori, sedangkan SaveChangesAsync mengirim perubahan yang terdeteksi ke database. Bedakan tiga momen: data dibaca, keadaan objek berubah, dan perubahan disimpan. Jika aplikasi berhenti sebelum penyimpanan, perubahan pada objek saja tidak menjadi catatan permanen. Bayangkan petugas perpustakaan mengoreksi formulir di meja sebelum mengesahkannya pada buku induk. Penjelasan ini membantu ketika pemula merasa data sudah diubah tetapi hilang setelah aplikasi dibuka ulang. Untuk latihan, cetak judul sebelum perubahan, setelah perubahan lokal, dan setelah dibaca menggunakan context baru sesudah penyimpanan. Context baru penting sebagai pembanding agar kamu tidak hanya melihat objek yang masih disimpan context lama. Dengan begitu pengujian benar-benar memeriksa penyimpanan yang bertahan.',
            ],
            [
                'heading' => 'Query yang nyaman tetap mempunyai biaya',
                'body' => 'DbSet memberi titik awal untuk menyusun query, tetapi data akhirnya mungkin dibaca dari penyimpanan yang jauh lebih besar daripada array latihan. Jika hanya membutuhkan lima buku, tentukan penyaringan dan batas hasil sebelum mematerialisasi semuanya dengan ToListAsync. Jika hanya perlu judul, proyeksi dapat menghindari mengambil kolom yang tidak dipakai. Jangan langsung menganggap setiap lambda dapat diterjemahkan oleh provider database; fungsi C# khusus mungkin membutuhkan pendekatan lain. Untuk memahami biaya, mulai dari pertanyaan pengguna dan tulis bentuk data minimum yang harus kembali. Laporan nama buku tidak memerlukan seluruh objek besar dengan semua hubungan. Pada tahap berikutnya, periksa SQL yang dihasilkan dan desain indeks sesuai pola akses. ORM membantu menulis akses data, tetapi tanggung jawab memilih query yang masuk akal tetap berada pada pengembang.',
            ],
            [
                'heading' => 'Skema dan data mempunyai jalur perubahan berbeda',
                'body' => 'Mengubah nilai Judul adalah perubahan data, sedangkan menambah property TahunTerbit pada model dapat menuntut perubahan skema tabel. EnsureCreated cocok untuk memulai database latihan baru, tetapi bukan sistem untuk menerapkan serangkaian perubahan skema pada database yang sudah dipakai. Ketika proyek perlu berkembang dengan data yang dipertahankan, gunakan alur migrations yang ditinjau. Jangan sekadar menghapus file database setiap kali model berubah jika di dalamnya sudah ada data pengguna. Selain itu satu DbContext bukan objek bersama untuk semua pekerjaan paralel; buat lingkup kerja yang jelas dan tunggu operasi async sebelum memakai context yang sama untuk operasi berikutnya. Bayangkan satu meja pencatatan untuk satu rangkaian pekerjaan. Menyerahkan meja itu kepada beberapa petugas bersamaan tanpa koordinasi dapat mencampurkan keadaan dan hasil yang mereka anggap sedang dikerjakan.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Buka context dan siapkan database latihan',
                'explanation' => 'using var db membuat PerpustakaanDb dan memastikan context dilepas di akhir lingkup. EnsureCreatedAsync menyiapkan database serta skema awal ketika diperlukan untuk contoh ini.',
            ],
            [
                'title' => 'Tambahkan data hanya ketika kosong',
                'explanation' => 'AnyAsync memeriksa apakah tabel Buku memiliki anggota. Jika kosong, Add menandai Buku baru berjudul Belajar C# dan SaveChangesAsync menyimpannya.',
            ],
            [
                'title' => 'Query lalu tampilkan',
                'explanation' => 'OrderBy(b => b.Id).ToListAsync mengambil buku dengan urutan Id. foreach kemudian membaca hasil yang sudah dimaterialisasi dan mencetak Id serta Judul.',
            ],
            [
                'title' => 'Petakan provider dan sumber data',
                'explanation' => 'PerpustakaanDb mewarisi DbContext; property Buku mengembalikan Set<Buku>(). OnConfiguring memilih SQLite melalui UseSqlite dengan file perpustakaan.db.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Add dianggap sudah menulis database',
                'body' => 'Add menandai entity sebagai tambahan dalam context. Panggil dan tunggu SaveChangesAsync untuk mengirim perubahan tersebut.',
            ],
            [
                'title' => 'Memakai satu context secara paralel',
                'body' => 'DbContext tidak thread-safe. Jangan memulai beberapa operasi yang tumpang tindih pada instance yang sama; tunggu operasi selesai atau gunakan context terpisah dengan lingkup yang sesuai.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Query judul saja',
                'task' => 'Baca maksimal lima judul buku yang diurutkan berdasarkan Id tanpa memuat daftar seluruh entity ke memori terlebih dahulu.',
                'hint' => 'Letakkan OrderBy, Take, dan Select sebelum ToListAsync.',
                'answer' => 'var judul = await db.Buku.OrderBy(b => b.Id).Take(5).Select(b => b.Judul).ToListAsync();. Hasil berupa daftar string dengan maksimal lima anggota.',
            ],
            [
                'title' => 'Latihan 2 · Bedakan perubahan lokal dan permanen',
                'task' => 'Ambil satu Buku, ubah Judul tetapi jangan panggil SaveChangesAsync. Tutup context lalu baca dengan context baru. Prediksi judul yang dibaca.',
                'hint' => 'Change tracker berada pada context; database baru berubah melalui operasi penyimpanan.',
                'answer' => 'Context baru membaca judul lama yang terakhir tersimpan. Penugasan property hanya mengubah objek lokal. Jika SaveChangesAsync dipanggil dan berhasil sebelum context ditutup, context baru membaca judul yang telah diperbarui.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · EF Core change tracking',
                'url' => 'https://learn.microsoft.com/en-us/ef/core/change-tracking/',
            ],
            [
                'label' => 'Microsoft Learn · EnsureCreated dan skema',
                'url' => 'https://learn.microsoft.com/en-us/ef/core/managing-schemas/ensure-created',
            ],
            [
                'label' => 'Microsoft Learn · Masa hidup DbContext',
                'url' => 'https://learn.microsoft.com/en-us/ef/core/dbcontext-configuration/',
            ],
        ],
    ],
    'deployment' => [
        'minutes_extra' => 25,
        'extra_sections' => [
            [
                'heading' => 'Uji paket yang benar-benar akan dibagikan',
                'body' => 'Menjalankan source dari editor menggunakan lingkungan pengembangan yang sudah lengkap. Mesin penerima paket mungkin tidak memiliki SDK, jalur folder yang sama, atau file konfigurasi pribadimu. Karena itu uji keluaran publish sebagai produk tersendiri. Jalankan perintah yang akan kamu tulis di README, gunakan input kecil yang hasilnya diketahui, lalu periksa lokasi data. Jika memungkinkan, lakukan percobaan pada direktori terpisah yang tidak bergantung pada folder source. Jangan hanya menguji bahwa proses terbuka; periksa satu alur utama sampai selesai. Bayangkan mengirim permainan papan: pembeli membutuhkan komponen dan petunjuk dalam kotak, bukan catatan yang masih tertinggal di meja pembuatnya. Daftar langkah yang kamu lakukan sendiri menjadi bahan README, dan setiap ketergantungan tersembunyi yang ditemukan perlu dibuat eksplisit sebelum paket dibagikan.',
            ],
            [
                'heading' => 'Pilih target berdasarkan mesin penerima',
                'body' => 'Framework-dependent mengandalkan runtime yang sesuai di lingkungan tujuan, sedangkan self-contained membawa runtime untuk target yang dipilih. Pilihan kedua tidak berarti satu paket otomatis berjalan pada semua sistem operasi dan arsitektur. Tentukan Windows atau Linux, serta arsitektur seperti x64 atau arm64 sesuai perangkat yang akan menjalankan. Ukuran paket, pembaruan runtime, dan dukungan hosting menjadi pertimbangan praktis. Untuk program latihan yang kamu kirim ke teman, catat prasyarat dengan jelas agar teman tidak perlu menebak mengapa aplikasi gagal dibuka. Untuk layanan web, keberhasilan menjalankan DLL juga belum mengatur proses sebagai layanan yang selalu hidup, alamat publik, atau konfigurasi HTTPS. Pisahkan keputusan format paket dari keputusan lingkungan operasional. Dengan begitu petunjuk rilis menjawab siapa yang menjalankan, di mana dijalankan, dan komponen apa yang harus tersedia.',
            ],
            [
                'heading' => 'Buat rilis yang dapat diidentifikasi dan dipulihkan',
                'body' => 'Beri paket penanda versi atau tanggal yang jelas supaya kamu dapat menghubungkan laporan masalah dengan source yang menghasilkan paket tersebut. Simpan petunjuk konfigurasi, lokasi data, dan pemeriksaan keberhasilan bersama catatan rilis. Ketika mengganti versi, jangan menyamakan folder aplikasi dengan tempat data pengguna yang harus tetap bertahan. Jika aplikasi baru mengubah skema database, kembali ke file program lama saja belum tentu memulihkan keadaan karena data mungkin sudah berubah bentuk. Untuk proyek awal, lakukan latihan rollback pada salinan data dan dokumentasikan langkahnya dengan urutan yang bisa diikuti. Bayangkan mengganti mesin kasir sambil menjaga buku transaksi tetap utuh. Tujuannya bukan membuat proses rilis rumit, melainkan memastikan kamu tahu perubahan apa yang dilakukan dan bukti apa yang menunjukkan sistem tetap bekerja sesudah perubahan tersebut.',
            ],
        ],
        'walkthrough' => [
            [
                'title' => 'Periksa kompilasi Release',
                'explanation' => 'dotnet build -c Release membangun proyek dengan konfigurasi Release. Keberhasilannya memeriksa kompilasi, bukan seluruh perilaku aplikasi.',
            ],
            [
                'title' => 'Siapkan folder keluaran',
                'explanation' => 'dotnet publish -c Release --self-contained false -o hasil-publish menyiapkan paket framework-dependent di folder hasil-publish. Runtime yang cocok tetap diperlukan pada mesin tujuan.',
            ],
            [
                'title' => 'Jalankan DLL hasil publish',
                'explanation' => 'dotnet hasil-publish/HaloCSharp.dll menjalankan assembly hasil paket. Nama DLL mengikuti proyek HaloCSharp, sehingga perlu disesuaikan jika proyekmu bernama lain.',
            ],
        ],
        'mistakes' => [
            [
                'title' => 'Mengirim satu DLL dan mengabaikan keluaran lain',
                'body' => 'Paket dapat memerlukan file konfigurasi runtime dan dependensi lain dalam keluaran publish. Bagikan keluaran yang diperlukan sebagai satu paket, bukan menebak satu file saja.',
            ],
            [
                'title' => 'Self-contained dianggap lintas semua platform',
                'body' => 'Paket self-contained menargetkan runtime identifier tertentu. Sistem operasi dan arsitektur tujuan tetap harus cocok.',
            ],
        ],
        'practice' => [
            [
                'title' => 'Latihan 1 · Periksa kebutuhan penerima',
                'task' => 'Kamu membagikan paket framework-dependent console kepada teman yang belum pernah memasang .NET. Tulis dua pemeriksaan sebelum menyimpulkan program rusak.',
                'hint' => 'Periksa prasyarat runtime dan cara menjalankan paket.',
                'answer' => 'Pastikan runtime .NET yang sesuai dengan target aplikasi tersedia, lalu pastikan teman menjalankan DLL atau executable dari keluaran publish yang lengkap menggunakan perintah README. SDK diperlukan untuk pengembangan, tetapi paket framework-dependent terutama memerlukan runtime yang cocok.',
            ],
            [
                'title' => 'Latihan 2 · Susun pemeriksaan rilis',
                'task' => 'Untuk pencatat belanja JSON, susun tiga pemeriksaan pada paket publish yang membuktikan alur utama, input invalid, dan data yang bertahan.',
                'hint' => 'Hasil harus dapat diamati; menulis hanya aplikasi berjalan belum cukup.',
                'answer' => 'Tambahkan Beras jumlah 2 dan periksa hasil tersimpan; masukkan jumlah negatif dan pastikan data tidak bertambah; tutup lalu buka ulang paket dan pastikan Beras jumlah 2 masih terbaca dari lokasi data yang didokumentasikan.',
            ],
        ],
        'sources' => [
            [
                'label' => 'Microsoft Learn · Model deployment .NET',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/core/deploying/',
            ],
            [
                'label' => 'Microsoft Learn · Perintah dotnet publish',
                'url' => 'https://learn.microsoft.com/en-us/dotnet/core/tools/dotnet-publish',
            ],
        ],
    ],
];

