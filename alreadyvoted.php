<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank you!!</title>
<link rel="stylesheet" href="thankyou_page.css">
</head>
<body class="bg">
<div class="c1">
<h2 class="fin"><pre>You have Already voted 

Thank You for giving you valuable time for valuable voting

The results will be declared soon.
</pre></h2>
</div>
</body>
</html>

<?php


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm"||  $_SESSION['loggedin']!=="already" ){
    header("location: error.php");
    exit;
  }

?>