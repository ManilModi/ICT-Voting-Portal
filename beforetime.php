<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank you!!</title>
<!-- <link rel="stylesheet" href="thankyou_page.css"> -->
</head>
<style>
  .c1 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-size: cover;
    
    text-align: center;
    text-decoration: underline;
    background-color: rgb(243, 232, 232);
    }
    h2 {
    font-weight: bold;
    opacity: 1;
    animation: fin 2.5s ;
    font-family:'Courier New', Courier, monospace ;
    font-size: 25px;
    }
    @keyframes fin {
    from {
    opacity: 0;
    }
    to {
    opacity: 1;
    }
    }

    li {
    margin-bottom: 10px;
    line-height: 1.8;
    margin-left: 20px;
    }
    body{
      background-color: 
    }
    header {
  background-color:blanchedalmond;
  color: white;
  padding: 20px 0;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
}
.home {
  background-color: rgb(255, 255, 255);
  padding: 20px 10px;
}

.home:hover,
nav ul li a:hover {
  background-color: rgb(233, 229, 156);
  color: rgb(0, 0, 0);
  transition: 0.5s;
  padding: 20px 10px;
}
.logo {
  height: 50px;
  width: 50px;
}
.container {
  width: 80%;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;

}
nav ul {
  list-style-type: none;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-left: 20px;
}

nav ul li a {
  color: rgb(0, 0, 0);
  text-decoration: none;
}

h1 {
  margin: 0;
  color: #000000;
  font-family: 'Times New Roman', Times, serif;
}
</style>

<body class="bg">
<header>
    <div class="container">
        <a href="first.php"><img class="logo" src="logo.jpg"></a>
        <h1 class="hover-4">ICT Voting Portal</h1>
        <nav>
            <ul>
                <li class="home"><a href="first.php">Sign Up</a></li>
                <li><a href="about_page.html">About</a></li>
            </li>
            <li style="float:right" class="about"><a href="first.php">Log Out</a></li>

            </ul>
        </nav>
    </div>
</header>
<div class="c1">
<h2 class="fin"><pre>The Voting has not started yet
Please come in the given time.

</pre></h2>
</div>
</body>
</html>

<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm"||  $_SESSION['loggedin']!=="before" ){
    header("location: error.php");
    exit;
  }

?>