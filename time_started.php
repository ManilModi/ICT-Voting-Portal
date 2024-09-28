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
    
<h2 class="fin"><pre>The Election process
has been started

You can track and manage the candidates during this period.

</pre></h2>
</div>
</body>
</html>


<?php

require('config.php');

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm"|| $_SESSION['loggedin']!=="started" ){
    header("location: error.php");
    exit;
  }

?>



