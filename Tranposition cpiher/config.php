<?php



$host = "localhost"; // Host database, dalam contoh ini adalah server MySQL di localhost.
$username = "root"; // Nama pengguna database. Dalam kasus ini, pengguna bernama "root".
$password = ""; // Kata sandi pengguna database. Dalam contoh ini, kata sandi kosong.
$database = "db_transpose"; // Nama database yang akan digunakan.

try {
    // Mencoba membuat objek PDO untuk berkomunikasi dengan database MySQL.
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Mengatur mode kesalahan PDO untuk menghasilkan pengecualian ketika terjadi kesalahan.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tangani pengecualian jika koneksi ke database gagal.
    echo "Connection failed: " . $e->getMessage();
    die(); // Hentikan eksekusi skrip jika koneksi gagal.
}


?>
