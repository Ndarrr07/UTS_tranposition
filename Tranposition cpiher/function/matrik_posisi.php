<?php


function decryptTransposition($ciphertext, $numRows) {
    $plaintext = '';
    $ciphertext = preg_replace('/\s+/', '', $ciphertext); // Menghapus spasi dari cipherteks

    // Menghitung jumlah kolom berdasarkan panjang cipherteks dan jumlah baris
    $numColumns = ceil(strlen($ciphertext) / $numRows);
    $matrix = array();

    // Mengisi matriks dengan karakter cipherteks
    $index = 0;
    for ($column = 0; $column < $numColumns; $column++) {
        for ($row = 0; $row < $numRows; $row++) {
            if ($index < strlen($ciphertext)) {
                $matrix[$row][$column] = $ciphertext[$index];
                $index++;
            }
        }
    }

    // Mengonversi matriks kembali ke plainteks
    for ($row = 0; $row < $numRows; $row++) {
        for ($column = 0; $column < $numColumns; $column++) {
            if (isset($matrix[$row][$column])) {
                $plaintext .= $matrix[$row][$column];
            }
        }
    }

    return $plaintext;
}


function encryptTransposition($plaintext, $numRows) {
    $ciphertext = '';
    $plaintext = preg_replace('/\s+/', '', $plaintext); // Menghapus spasi dari plainteks

    // Inisialisasi matriks
    $numColumns = ceil(strlen($plaintext) / $numRows);
    $matrix = array();

    // Mengisi matriks dengan karakter
    $index = 0;
    for ($row = 0; $row < $numRows; $row++) {
        for ($column = 0; $column < $numColumns; $column++) {
            if ($index < strlen($plaintext)) {
                $matrix[$row][$column] = $plaintext[$index];
                $index++;
            } else {
                $matrix[$row][$column] = ''; // Karakter kosong untuk padding
            }
        }
    }

    // Mengonversi matriks ke cipherteks
    for ($column = 0; $column < $numColumns; $column++) {
        for ($row = 0; $row < $numRows; $row++) {
            $ciphertext .= $matrix[$row][$column];
        }
    }

    return $ciphertext;
}

?>
