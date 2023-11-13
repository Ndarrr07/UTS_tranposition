# Tranposition cpiher



### Nama    :Muhammad Iskandar 
### NIM     :312110035
### Kelas   :TI.21.A1


### Pengenalan transposition Cipher

Metode yang diberikan dalam kode PHP di atas adalah metode enkripsi dan dekripsi yang menggunakan teknik "Transposition Matrix" atau "Matrix Transposition." Ini adalah salah satu varian dari Transposition Cipher yang mengatur karakter-karakter pesan dalam sebuah matriks (atau tabel) dan kemudian menggabungkan karakter-karakter tersebut kembali dalam urutan yang berbeda untuk menghasilkan teks terenkripsi. Berikut penjelasan lebih rinci tentang Transposition Matrix:

### Enkrpsi

Yang akan di enkripsi adalah password yang anda masukan di form registrasi 

Enkripsi pertama [matrik_posisi](matrik_posisi)
 :

1. Pertama, spasi dihapus dari teks plaintext agar dapat diatur dengan baik dalam matriks.
2. Matriks dengan jumlah baris dan kolom yang sesuai diinisialisasi berdasarkan panjang plaintext dan jumlah baris yang ditentukan.
3. Karakter-karakter dari plaintext diisi ke dalam matriks dengan mengikuti urutan baris dan kolom.
4. Matriks diubah menjadi teks terenkripsi dengan mengambil karakter-karakter dari tiap kolom dan menggabungkannya dalam urutan yang berbeda.

Enkripsi kedua (tranpose_karakter)
1. Pengaturan Baris (Row Shifting): Dalam algoritma ini, pesan asli dipecah menjadi baris-baris dan karakter-karakter pada tiap baris dipindahkan atau diubah urutannya. Dalam kode yang diberikan, jumlah baris yang digunakan untuk mengatur karakter-karakter dalam pesan asli ditentukan oleh variabel $numRows.
2. Pesan asli dipecah menjadi baris-baris, dan karakter-karakter diambil berdasarkan urutan baris yang sesuai.
3. Karakter-karakter ini kemudian digabungkan kembali menjadi teks terenkripsi.
4. Karakter yang tidak muat dalam baris-baris awal tetap diambil sesuai urutan aslinya.

Hasil Entripsi tersebut lalu di kirim ke database 

### Dekripsi

Password yang telah di enkripsi di ambil dari databse lalu di dekripsi agar bisa di gunakan untuk login

Dekripsi pertama (transpose_karakter):
1. Teks terenkripsi dipecah menjadi baris-baris, seperti yang dilakukan saat enkripsi.
2. Indeks-indeks yang digunakan untuk mengurutkan karakter-karakter dalam baris diketahui.
3. Karakter-karakter dalam tiap baris diurutkan kembali sesuai dengan indeks yang telah ditentukan, sehingga teks kembali ke urutan aslinya.
4. Karakter yang tidak muat dalam baris-baris awal tetap diambil sesuai urutan aslinya.

Dekripsi Kedua (matrik_posisi)
1. Spasi dihapus dari teks terenkripsi untuk membersihkannya.
2. Jumlah kolom dihitung berdasarkan panjang teks terenkripsi dan jumlah baris.
3. Matriks dibentuk dengan mengisi karakter-karakter dari teks terenkripsi sesuai dengan urutan kolom dan baris.
4. Karakter-karakter dari matriks diambil dalam urutan yang sesuai untuk menghasilkan teks plaintext yang asli.

### Form Regis

![Teks Alternatif](foto/regis.png)

### Enkripsi

![Teks Alternatif](foto/enkripsi.png)

### Form Login

![Teks Alternatif](foto/login.png)

### Dekripsi

![Teks Alternatif](foto/dekripsi.png)
