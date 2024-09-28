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
            
        <h2 class="votinghead">GIVE YOUR VOTE TO THE FOLLOWING CANDIDATES OF EC FIRST YEAR</h2>
    
            <label for="vote">Anjali Desai</label>
            <input type="radio" id="vote" name="ce1" value="7">
            <br><br>

            <label for="vote">Vivek Reddy</label>
            <input type="radio" id="vote" name="ce1" value="8">
            <br><br>

            <label for="vote">Shreya Mishra</label>
            <input type="radio" id="vote" name="ce1" value="9">
            <br><br>

            <label for="vote">Ravi Tiwari</label>
            <input type="radio" id="vote" name="ce1" value="10">
            <br><br>

            <label for="vote">Sneha Jain</label>
            <input type="radio" id="vote" name="ce1" value="11">
            <br><br>

            <label for="vote">Karthik Srinivasan</label>
            <input type="radio" id="vote" name="ce1" value="12">
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

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm" || $_SESSION['loggedin'] !== "ec1voters" ){
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