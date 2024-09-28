<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
<header>
    
    <div class="container">
        <a href="first.php"><img class="logo" src="logo.jpg"></a>
        <h1 class="hover-4">ICT Voting Portal</h1>
        <nav>
            <ul>
                <div class="flex">
                    <div>
                <li class="home"><a href="first.php">SignUp</a></li>
                </div>
                <div>
                <li><a href="about_page.html">About</a></li>
                </div>
            </li>
            <div>
            <li style="float:right" class="about"><a href="first.php">LogOut</a></li>
            </div>
            </div>
            </ul>
        </nav>
    </div>
</header>



 
<center>
    
    <form class="signup" style="margin-top: 300px;" method="post">
            
        <h2 class="votinghead">GIVE YOUR VOTE TO THE FOLLOWING CANDIDATES OF IT FOURTH YEAR</h2>
    
            <label for="vote">Ajay Sharma</label>
            <input type="radio" id="vote" name="ce1" value="67">
            <br><br>

            <label for="vote">Preeti Choudhary</label>
            <input type="radio" id="vote" name="ce1" value="68">
            <br><br>

            <label for="vote">Amit Verma</label>
            <input type="radio" id="vote" name="ce1" value="69">
            <br><br>

            <label for="vote">Kartik Singhania</label>
            <input type="radio" id="vote" name="ce1" value="70">
            <br><br>

            <label for="vote">Nisha Kapoor</label>
            <input type="radio" id="vote" name="ce1" value="71">
            <br><br>

            <label for="vote">Ravi Gupta</label>
            <input type="radio" id="vote" name="ce1" value="72">
            <br><br>
<br >

<input class="signup" type="submit" value="Vote" name="submit"><br><br>
            
          
          </form>
    </center>

<br><br>
<marquee class="marquee">The Election will be held only between the given time. So, hurry up and Represent Yourself!!!</marquee>
  
</body>
</html>

<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm" || $_SESSION['loggedin'] !== "it4voters" ){
    header("location: error.php");
    exit;
  }

$temp1 = base64_decode(urldecode($_GET['temp']));
$temp2 = base64_decode(urldecode($_GET['trialvf']));
$_SESSION['MobileNumber']=$temp1;

if($temp2==0){

    if(isset($_POST['submit'])){
        if(isset($_POST['ce1'])){
            $_SESSION['vp']=$_POST['ce1'];
        $param1 = urlencode(base64_encode($_SESSION['MobileNumber']));
        $param2=urlencode(base64_encode($_SESSION['vp']));

        $_SESSION['loggedin']="thankyou";

                header("Location:thankyou_page.php?temp2=$param1&vf=$param2");
    
    }
    
    }

}else{

}

?>