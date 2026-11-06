# Sumber materi lanjutan dan spesialisasi

Ditinjau 14 September 2026. Semua tautan di bawah benar-benar dibuka melalui alat browsing sebelum penulisan. Sumber utama: Microsoft Learn dan dokumentasi Unity 6. Materi, analogi, kasus toko/perpustakaan, latihan, serta penelusuran kode ditulis untuk kurikulum ini; tautan resmi dipakai untuk memeriksa kontrak API dan memperdalam topik.

## Ruang lingkup

- 11 modul baru; setiap modul memuat 6 bagian penjelasan, 2 kesalahan umum, 2 latihan dengan pembahasan, dan 3 langkah penelusuran.
- Narasi per modul sekitar 758–878 kata, dihitung tanpa kode dan tautan sumber.
- Contoh console, API, Blazor, dan WPF memakai .NET 10; Unity memakai API dasar engine yang tidak mengasumsikan dukungan semua fitur C#/.NET terbaru.
- WPF hanya untuk Windows. Data contoh CRUD dan progres Blazor berada di memori; batas persistence dijelaskan pada materi.

## Referensi per modul

### Null Safety & Nullable Reference

- [Microsoft Learn: nullable reference types](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/null-safety/nullable-reference-types)
- [Microsoft Learn: operator ?? dan ??=](https://learn.microsoft.com/en-us/dotnet/csharp/language-reference/operators/null-coalescing-operator)

### LINQ: GroupBy, Join & Laporan

- [Microsoft Learn: pengelompokan LINQ](https://learn.microsoft.com/en-us/dotnet/csharp/linq/standard-query-operators/grouping-data)
- [Microsoft Learn: join LINQ](https://learn.microsoft.com/en-us/dotnet/csharp/linq/standard-query-operators/join-operations)

### Async yang Bisa Dibatalkan

- [Microsoft Learn: cooperative cancellation](https://learn.microsoft.com/en-us/dotnet/standard/threading/cancellation-in-managed-threads)
- [Microsoft Learn: membatalkan berdasarkan waktu](https://learn.microsoft.com/en-us/dotnet/csharp/asynchronous-programming/cancel-async-tasks-after-a-period-of-time)

### Membaca API dengan HttpClient

- [Microsoft Learn: membuat request HTTP](https://learn.microsoft.com/en-us/dotnet/fundamentals/networking/http/httpclient)
- [Microsoft Learn: panduan masa hidup HttpClient](https://learn.microsoft.com/en-us/dotnet/fundamentals/networking/http/httpclient-guidelines)

### Proyek: Pencatat Pengeluaran JSON

- [Microsoft Learn: serialisasi System.Text.Json](https://learn.microsoft.com/en-us/dotnet/standard/serialization/system-text-json/how-to)
- [Microsoft Learn: File.Move](https://learn.microsoft.com/en-us/dotnet/api/system.io.file.move?view=net-10.0)
- [Microsoft Learn: Decimal.TryParse](https://learn.microsoft.com/en-us/dotnet/api/system.decimal.tryparse?view=net-10.0)

### SQL, Relasi & Query Berparameter

- [Microsoft Learn: Microsoft.Data.Sqlite](https://learn.microsoft.com/en-us/dotnet/standard/data/sqlite/)
- [Microsoft Learn: parameter SQLite](https://learn.microsoft.com/en-us/dotnet/standard/data/sqlite/parameters)
- [Microsoft Learn: transaksi SQLite](https://learn.microsoft.com/en-us/dotnet/standard/data/sqlite/transactions)

### REST API: CRUD Katalog Buku

- [Microsoft Learn: route handler Minimal API](https://learn.microsoft.com/en-us/aspnet/core/fundamentals/minimal-apis/route-handlers?view=aspnetcore-10.0)
- [Microsoft Learn: respons Minimal API](https://learn.microsoft.com/en-us/aspnet/core/fundamentals/minimal-apis/responses?view=aspnetcore-10.0)

### DI Container & Service Lifetime

- [Microsoft Learn: dependency injection](https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/overview)
- [Microsoft Learn: service lifetimes](https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection/service-lifetimes)

### Blazor: Komponen Target Belajar

- [Microsoft Learn: event Blazor](https://learn.microsoft.com/en-us/aspnet/core/blazor/components/event-handling?view=aspnetcore-10.0)
- [Microsoft Learn: render modes](https://learn.microsoft.com/en-us/aspnet/core/blazor/components/render-modes?view=aspnetcore-10.0)
- [Microsoft Learn: alat Blazor](https://learn.microsoft.com/en-us/aspnet/core/blazor/tooling?view=aspnetcore-10.0)

### Unity: Koin Berputar & Game Loop

- [Unity Manual: MonoBehaviour.Update](https://docs.unity3d.com/6000.0/Documentation/ScriptReference/MonoBehaviour.Update.html)
- [Unity Manual: Time.deltaTime](https://docs.unity3d.com/6000.0/Documentation/ScriptReference/Time-deltaTime.html)
- [Unity Manual: Transform.Rotate](https://docs.unity3d.com/6000.0/Documentation/ScriptReference/Transform.Rotate.html)
- [Unity Manual: FixedUpdate](https://docs.unity3d.com/6000.0/Documentation/ScriptReference/MonoBehaviour.FixedUpdate.html)

### WPF: Inventaris Desktop Pertama

- [Microsoft Learn: WPF overview](https://learn.microsoft.com/en-us/dotnet/desktop/wpf/overview/)
- [Microsoft Learn: membuat aplikasi WPF](https://learn.microsoft.com/en-us/dotnet/desktop/wpf/get-started/create-app-visual-studio)
- [Microsoft Learn: data binding WPF](https://learn.microsoft.com/en-us/dotnet/desktop/wpf/data/)

## Verifikasi kode

Pemeriksaan dilakukan memakai PHP lokal dan .NET SDK 10.0.302, dengan proyek pemeriksaan terpisah di direktori temporary.

| Contoh | Pemeriksaan | Hasil |
|---|---|---|
| File data PHP | php -l dan pembacaan array 11 modul | Lulus |
| Nullable reference | Build dan jalankan empat input | Lulus; keluaran sama dengan materi |
| LINQ lanjutan | Build dan jalankan ringkasan penjualan | Lulus; Buku 36000, Pensil 6000 |
| Cancellation | Build dan jalankan pembatalan deterministik | Lulus; hanya batch pertama selesai |
| HttpClient | Build; respons 200 array, 200 bentuk salah, 404 dari fixture HTTP lokal | Lulus; jalur sukses dan dua kegagalan sesuai materi |
| Pencatat pengeluaran | Build; tambah 15000 dan 5000, buka ulang, tolak negatif, JSON rusak, null, kategori kosong, anggota null | Lulus; file invalid tetap tidak berubah |
| SQLite | Restore Microsoft.Data.Sqlite 10.0.12 dan jalankan query | Lulus; buku yang memenuhi batas tampil |
| REST CRUD | Build; GET, POST, input kosong, PUT, DELETE, GET sesudah hapus | Lulus; status 200, 201, 400, 200, 204, 404 |
| Dependency injection | Build dan dua request HTTP | Lulus; singleton sama, scoped berbeda antarrequest, scoped sama dalam request, transient berbeda |
| Blazor | Template resmi, component Target.razor, dotnet build | Lulus tanpa warning; interaksi browser tidak diuji pada pemeriksaan submodul ini |
| WPF | Template resmi Windows dan dotnet build | Lulus tanpa warning; interaksi jendela tidak dijalankan pada pemeriksaan submodul ini |
| Unity | Tinjauan script, setup component, Update/deltaTime/Rotate terhadap dokumentasi resmi | Belum dijalankan dalam Unity Editor |

Hasil build tidak dianggap sebagai bukti pengujian interaksi UI. Contoh Unity memerlukan Unity Editor; WPF memerlukan Windows. Dalam contoh JSON, penulisan file sementara membantu alur satu proses namun tidak diklaim sebagai transaksi lintas proses atau jaminan pemulihan crash.
