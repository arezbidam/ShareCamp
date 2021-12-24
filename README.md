# ShareCamp
- Tugas Akhir Capstone Dicoding
- Team ID: CSD-003
- Selected theme: Resource sharing & user generated content
- Member :     
  1. F237R7205 – Adji Putra Nugraha
  2. F351R6376 – Aris Setiana

## Panduan Instalasi
1. Download File ShareCamp
2. Extract Folder pada folder htdocs (apabila menggunakan xampp)
3. Jalankan xampp (Apache dan MySQL)
4. buka localhost/phpmyadmin pada browser anda dan buat database baru bernama db_sharecamp
5. kemudian import db_sharecamp.sql dari folder sharecamp.
6. Jalankan Visual Studio Code
7. Buka Folder ShareCamp dari Visual Studio Code
8. tekan ctrl + t maka terminal VsCode akan tampil dan ketik php spark serve
9. lalu buka browser (google chrome) ketik link http://localhost:8080/
10. berikut gambar homepage jika berhasil : https://drive.google.com/file/d/1wvLvm1FrcAbcaLlfUzIlFegVUWqWN12A/view?usp=sharing

### Panduan Penggunaan Web/Aplikasi
1.  http://localhost:8080/ (halaman awal)
2.  lakukan pendaftaran / registrasi pada url http://localhost:8080/sign-up
3.  setelah berhasil silahkan login pada url http://localhost:8080/login
4.  setelah berhasil login bisa cari produk yang ingin di sewa pada url http://localhost:8080/shop/produk
5.  jika sudah menemukan produk yang sesuai, user bisa menambahkan ke keranjang dengan menekan button dengan icon keranjang belanja
6.  user bisa tentukan jumlah produk yang ingin disewa dan memilih tgl mulai dan berakhir penyewaan.
7.  jika sudah user bisa liat keranjang pada url http://localhost:8080/keranjang
8.  user hanya dapat meng checkout produk dari toko yang sama
9.  setelah checkout user dapat mencetak nota dan menghubungi toko untuk konfirmasi pesanan atau konfirmasi pembayaran dp pada url http://localhost:8080/pesanan
10. selain cari produk yang ingin disewa aplikasi ini juga dapat mencari teman camping atau join ke rencana camping dari user lainnya pada url http://localhost:8080/cari-teman
11. selain cari produk dan cari teman camping user juga bisa membuka toko apabila ingin menyewakan produk outdoor yang dimiliki nya pada url http://localhost:8080/toko bisa di  akses dari halaman profile.
12. setelah mengisi form pendaftaran toko, user harus menunggu konfirmasi dari admin sebelum bisa menambahkan atau mengelola produk yang ingin disewakan pada toko.
13. untuk menyetujui pendaftaran toko anda harus login sebagai admin pada url http://localhost:8080/admin (email : admin@gmail.com)(password : admin) lalu buka halaman data master -> toko, maka akan tampil data toko yang telah daftar sebelumnya dan anda bisa klik button dengan icon checklist untuk menyetujui pendaftaran toko baru tersebut.
14. setelah toko disetujui kemudian logout dan login kembali sebagai user pada url http://localhost:8080/login kemudian anda bisa kelola produk yang ingin anda sewakan pada url http://localhost:8080/toko/produk dan anda dapat kelola pesanan yang masuk ke toko anda pada url http://localhost:8080/toko/pesanan
15. kurang lebihnya seperti itu untuk panduan penggunaan aplikasi, supaya lebih jelas silahkan dicoba saja.

#### Skema User untuk Testing
- (sebagai user yang sudah memiliki toko dan produk)
- Email : clarence@gmail.com
- password : 12345

- (sebagai user yang menyewa produk)
- Email : adji@gmail.com
- password : 123

- (sebagai admin yang dapat menyetujui pendaftaran toko)
- Email : admin@gmail.com
- password : admin

