<?php


// $conn = null;
require_once("../config.php"); // Mengimpor file konfigurasi yang berisi koneksi ke database.
require_once("../function/matrik_posisi.php"); // Mengimpor file yang berisi fungsi untuk mengenkripsi dan mendekripsi kata sandi.
require_once("../function/transpose_karakter.php"); // Mengimpor file yang berisi fungsi lain untuk mendekripsi kata sandi (mungkin merupakan versi yang salinannya).

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"]; // Mengambil nilai username dari data POST.
    $password = $_POST["password"]; // Mengambil nilai password dari data POST.

    // Retrieve the stored hashed password from the database
    $sql = "SELECT * FROM pengguna WHERE username=?";
    $stmt = $conn->prepare($sql); // Mempersiapkan pernyataan SQL.
    $stmt->execute([$username]); // Menjalankan pernyataan SQL dengan parameter username.

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Mengambil hasil kueri sebagai array asosiatif.
        $storedPassword = $row["password"]; // Mengambil kata sandi terenkripsi dari hasil kueri.
        $key = "312"; // Kunci yang mungkin digunakan untuk dekripsi.
        $row = 3;
        // Decrypt and verify the password
        $decryptedPassword1 = transposeDecrypt($storedPassword, $key); // Tahap pertama pendekripsi.
        $decryptedPassword2 = decryptTransposition($decryptedPassword1, 3); // Tahap kedua pendekripsi.
?>

<?php
$conn = null; // Menutup koneksi database setelah selesai menggunakannya.



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
            max-width: 400px;
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
        if ($password == $decryptedPassword2) {
            echo "login berhasil<br>"; 
            echo "row matrik = $row<br>";
            echo "key transpose karakter = $key<br>";
            echo "password terdekripsi dengan transpose karakter = $decryptedPassword1<br>"; 
            echo "password terdekripsi dengan matrik tranpose = $decryptedPassword2<br>"; 
            
        } else {
            echo "login gagal"; 
        }
    } else {
        echo "Invalid username or password."; // Pesan jika username tidak ditemukan dalam database.
    }
}
?>
        </div>
        <div class="button-container">
            <a class="button" href="../index.php">Login</a>
            <a class="button" href="../tampilan_regis.php">Register</a>
        </div>
    </div>
</body>
</html>
