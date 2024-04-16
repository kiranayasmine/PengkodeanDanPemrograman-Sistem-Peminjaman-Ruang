<p align="center">
  <h1 align="center">Pinjam Ruang</h1>
  
  <p align="center">
    Pinjam Ruang Mudah dan Cepat!
    <br />
    <a href="http://pinjam-ruang.batam-jasa.online/">Lihat Demo</a>
    ·
    <a href="https://github.com/vonsogt/pinjam-ruang/issues">Laporkan Kesalahan</a>
    ·
    <a href="https://github.com/vonsogt/pinjam-ruang/issues">Ajukan Fitur Baru</a>
  </p>
</p>

## Tentang pinjam-ruang

Pinjam Ruang merupakan sebuah aplikasi berbasis website yang bertujuan untuk mempermudah peminjaman ruangan pada suatu universitas/kampus.

### Dibuat Menggunakan
* [Laravel](https://laravel.com/)

## Referensi GitHub

Tautan: https://github.com/vonsogt/pinjam-ruang

## Perbandingan

Sebelum diedit:
<img width="960" alt="Screenshot 2023-11-06 235553" src="https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/551d7229-8294-4cc0-8b5d-88418269f666">
![129230321-60cd0f5c-d4ce-450b-a96a-e16411b358df](https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/36b8b8f4-b657-4fa5-8817-a410620d9251)

Setelah diedit:
![Screenshot 2024-04-16 181437](https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/353bcc23-150f-401a-b09c-b574fe353fe9)
![Screenshot 2024-04-16 181445](https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/9b320617-8b45-4b18-b23a-959fad88423c)
![Screenshot 2024-04-16 181454](https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/bf9440e3-b020-441a-80dd-f0fb40c96172)
![Screenshot 2024-04-16 181521](https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/0d9be451-7a46-429b-aedc-e811a5e776d7)
![Screenshot 2024-04-16 181534](https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/c85a81f4-945b-4cf8-9bfc-4f89754f65fa)
![Screenshot 2024-04-16 181544](https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/29178c12-6768-4eeb-8cfc-092c521a8f08)
![Screenshot 2024-04-16 181321](https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/885f0710-0215-4789-b601-60a2aaa0ac74)


## ERD
<img width="305" alt="Screenshot 2023-12-05 100513" src="https://github.com/kiranayasmine/PengkodeanDanPemrograman-Sistem-Peminjaman-Ruang/assets/152698796/5c3465e8-c2a4-4733-a957-8c82af065a3a">

## Fitur

BACKEND
- [x] Autentikasi
- [x] Aktor & Izin akses
- [x] Mahasiswa dapat melihat semua aktivitas peminjaman atas nama sendiri
- [x] Disisi backend mengecek user apakah username dan password masih sama, jika iya akan mengeluarkan info untuk "Ganti Password"

FRONTEND
- [x] Halaman utama website menampilkan flowchart tata cara peminjaman
- [X] Halaman utama memiliki menu navigasi menampikan ruangan yang sudah dibooking beserta detail lainnya (nama, tgl booking)
- [x] Mahasiswa dapat meminjam ruangan dengan mengisi
  - Nama Lengkap
  - Tanggal Mulai Pinjam
  - Tanggal Selesai Pinjam
  - Ruangan yang akan dipinjam
  - Dosen yang akan diminta persetujuan
  - NIM
  - Prodi
- [x] Mahasiswa tidak dapat meminjam ruangan yang sudah di booking pada tanggal ruangan yang sudah dibooking
  - Mahasiswa tidak dapat meminjam lebih dari 1 kali, jika peminjaman sebelumnya belum terselesaikan
- [x] Menampilkan detail peminjam, tanggal mulai dan tanggal selesai disetiap list ruangan
- [x] TU Jurusan IF bisa melihat semua status ruangan baik yang kosong maupun yang sudah dibooking. Kemudian TU juga bisa menyetujui ruangan yang sudah disetujui terlebih dahulu oleh Dosen. Jadi TU tidak akan menyetujui apabila belum ada persetujuan dari Dosen. Dan TU bisa mengubah status ruangan.
- [x] Dosen bisa melihat ruangan yang sudah direquest oleh mahasiswanya dan menyetujui melalui menu di aplikasi.

### Instalasi

1. Unduh/Clone proyek ini
   ```git
   git clone https://github.com/vonsogt/pinjam-ruang.git
   ```
2. Lalu pindah ke direktori `pinjam-ruang`
   ```sh
   cd pinjam-ruang
   ```
3. Install komponen yang diperlukan menggunakan composer
   ```sh
   composer install
   ```
4. Copy file `.env.example` menjadi `.env`
   ```sh
   cp .env.example .env
   ```
5. Lalu generate `APP_KEY`
   ```sh
   php artisan key:generate
   ```
6. Lalu lakukan migrasi database dan query (isi database dari Polibatam)
   ```sh
   php artisan migrate:fresh --seed
   ```
7. Setelah berhasil, jalankan aplikasi
   ```sh
   php artisan serve
   ```
8. Lalu buka browser `127.0.0.1:8000` untuk menggunakan aplikasi
9. Selamat meminjam ruangan dengan mudah dan cepat 😊


## Petunjuk

Lihat [open issues](https://github.com/vonsogt/pinjam-ruang/issues) untuk daftar fitur yang diusulkan (dan masalah yang diketahui).

## Lisensi

`pinjam-ruang` berlisensi di bawah [MIT license](https://opensource.org/licenses/MIT).
