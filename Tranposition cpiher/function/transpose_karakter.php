<?php

function transposeEncrypt($password, $numRows) {
    $encryptedPassword = '';
    $keyLength = $numRows;

    for ($i = 0; $i < $keyLength; $i++) {
        $newIndex = $i;

        if ($newIndex < strlen($password)) {
            $encryptedPassword .= $password[$newIndex];
        }
    }

    // Add the remaining characters of the password to the result.
    $encryptedPassword .= substr($password, $keyLength);

    return $encryptedPassword;
}

function transposeDecrypt($encryptedPassword, $numRows) {
    $originalPassword = '';
    $keyLength = $numRows;

    // Create an array of indices to be used for character reordering.
    $indices = range(0, $keyLength - 1);

    // Create an array to store characters from the encrypted text in the correct order.
    $encryptedChars = [];
    for ($i = 0; $i < $keyLength; $i++) {
        if ($i < strlen($encryptedPassword)) {
            $encryptedChars[] = $encryptedPassword[$i];
        }
    }

    // Reorder characters according to the indices.
    foreach ($indices as $index) {
        $originalPassword .= $encryptedChars[$index] ?? '';
    }

    // Add the remaining characters from the encrypted text to the result.
    $originalPassword .= substr($encryptedPassword, $keyLength);

    return $originalPassword;
}


?>
