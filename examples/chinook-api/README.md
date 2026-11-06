# Latihan Chinook API

Proyek belajar mandiri yang mengikuti alur `presentation → services → db/domain → dto` pada contoh di `D:\api-sample\api-samples\chinook`, disederhanakan menjadi satu `.csproj`. Tidak memakai paket `Opx.*` milik contoh asal.

1. Siapkan MySQL lokal. Skrip tersedia di `../../database/Chinook_MySql.sql` setelah repository website ini di-clone. **Periksa dulu:** baris awalnya `DROP DATABASE IF EXISTS Chinook`. Impor melalui HeidiSQL atau klien MySQL hanya pada database latihan yang boleh dihapus. Jangan jalankan ke server produksi.
2. Atur `ConnectionStrings:Chinook` melalui environment variable `ConnectionStrings__Chinook` atau `appsettings.json`. Jangan simpan kata sandi sungguhan ke repository.
3. Dari folder ini jalankan `dotnet run --urls http://127.0.0.1:5099`.
4. Di Postman atau Bruno kirim `GET http://127.0.0.1:5099/api/artists`, lalu `GET http://127.0.0.1:5099/api/artists/1` dan `GET http://127.0.0.1:5099/api/artists/999999`.

Daftar membatasi 50 artist pertama. Detail artist mengembalikan album miliknya. ID yang tidak ada menghasilkan HTTP 404. Kesalahan koneksi database menghasilkan kegagalan server; periksa proses API dan konfigurasi MySQL. Website pembelajaran tidak menjalankan proyek .NET ini secara otomatis.
