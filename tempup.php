<?php

require('config.php'); 

$mobileNumbers = [];
$prefixes = ['6', '7', '8', '9'];

foreach ($prefixes as $prefix) {
    for ($i = 0; $i < 38; $i++) { 
        $randomNumber = mt_rand(100000000, 999999999); 
        $mobileNumbers[] = $prefix . $randomNumber;
    }
}

shuffle($mobileNumbers);


$stmt = $link->prepare("UPDATE ce1voters SET MobileNumber = ? WHERE Sr = ?");
if ($stmt) {
    $sr = 1; 
    foreach ($mobileNumbers as $mobileNumber) {
        $stmt->bind_param("ii", $mobileNumber, $sr);
        $stmt->execute();
        $sr++; 
    }
    echo "Mobile numbers updated successfully.";
} else {
    echo "Error preparing statement: " . $link->error;
}

$stmt->close();
$link->close();
?>
