<?php
// Database connection details
require('config.php');

// Create connection
// $link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Function to generate random alphanumeric password of length 8
function generateRandomPassword() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    $length = 8;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $password;
}

// Generate random passwords and update the database
for ($i = 1; $i <= 150; $i++) {
    $newPassword = generateRandomPassword();

    $updateSql = "UPDATE it4voters SET pwd = '$newPassword' WHERE Sr = $i";
    if ($link->query($updateSql) === TRUE) {
        echo "Password updated for voter with ID: $i<br>";
    } else {
        echo "Error updating password: " . $link->error;
    }
}

// Close connection
$link->close();
?>