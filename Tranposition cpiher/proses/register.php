    <?php

require_once("../config.php"); // Mengimpor file konfigurasi yang berisi koneksi ke database.
require_once("../function/matrik_posisi.php"); // Mengimpor file yang mungkin berisi definisi fungsi atau variabel terkait matriks posisi.
require_once("../function/transpose_karakter.php"); // Mengimpor file yang mungkin berisi definisi fungsi atau variabel terkait transposisi karakter.

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Memeriksa apakah permintaan HTTP adalah metode POST (dalam konteks registrasi).
    $username = $_POST["username_reg"]; // Mengambil nilai username dari data POST.
    $password = $_POST["password_reg"]; // Mengambil nilai password dari data POST.
    $key = "312"; // Kunci yang mungkin digunakan untuk enkripsi.
    $row = "3";
    // Encrypt the password before storing it in the database
    $encryptedPassword1 = encryptTransposition($password, $row); // Mengenkripsi kata sandi dengan metode transposisi.
    $encryptedPassword2 = transposeEncrypt($encryptedPassword1, $key); // Melakukan operasi transposisi pada kata sandi terenkripsi.

    // Insert user data into the database
    $sql = "INSERT INTO pengguna (username, password) VALUES (?, ?)"; // Kueri SQL untuk memasukkan data pengguna ke dalam tabel pengguna.
    $stmt = $conn->prepare($sql); // Persiapkan kueri untuk dieksekusi.
    $stmt->execute([$username, $encryptedPassword2]); // Eksekusi kueri dengan nilai username dan kata sandi terenkripsi.

    // echo "<a href=>login</a>" ;// Pesan sukses jika registrasi berhasil maka akan langsung di arahkan ke menu login


$conn = null; // Menutup koneksi database setelah selesai menggunakannya.
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
        }

        .message {
            font-size: 16px;
            margin-top: 20px;
            text-align: left;
        }

        .success {
            color: #009900;
        }

        .error {
            color: #FF0000;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
            
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dekripsi</h1>
        
        <div class="message">
        <?php
            echo "Registrasi Berhasil<br><br>"; 
            echo "row matrik = $row<br>";
            echo "key transpose karakter = $key<br>";
            echo "password terenkripsi dengan transpose karakter = $encryptedPassword1<br>"; 
            echo "password terenkripsi dengan matrik tranpose = $encryptedPassword2<br>"; 
            
            
?>
        </div>
        <div class="button-container">
            <a class="button" href="../index.php">Login</a>
            <a class="button" href="../tampilan_regis.php">Register</a>
        </div>
    </div>
</body>
</html>