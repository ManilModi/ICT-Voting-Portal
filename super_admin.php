<?php

include "config.php";

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" ||$_SESSION['loggedin'] === "CE" ||$_SESSION['loggedin'] === "EC"||$_SESSION['loggedin'] === "IT"|| $_SESSION['loggedin']!=="dean" ){
  header("location: error.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $select=$_POST['dean'];
  $dura1=$_POST['durH'];
  $dura2=$_POST['durM'];

  if ((isset($_POST["dean"]) && ($_POST["durH"])>=0 && ($_POST["durM"])>0)) {


    if($select=="start"){
      $current_time = time();

      

    $stmt="UPDATE  admins SET start_time=$current_time, end_time=($current_time+($dura1*3600)+($dura2*60)) WHERE Branch='Dean' ";
    $stmt1 = mysqli_prepare($link, $stmt);

    
      if (mysqli_stmt_execute($stmt1)){

      }else {
            echo "Error executing statements: " . mysqli_error($link);
        }
    
       $_SESSION['loggedin']="started";
    header("location:time_started.php");
    
  }
  
  
}
else if($select=="disqualify"){
  $_SESSION['loggedin']="read";
    header("location: dean_read.php");
  }
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction Website</title>
   
    <style>
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



.nav ul {
  list-style-type: none;
  padding: 0;
  margin: 0; 
}

.nav ul li {
  display: inline;
  margin-left: 10px; 
}


  .nav ul {
    margin-top: 10px; 
  }





.body{
  background-color: rgb(224, 202, 142);
}

.container {
  width: 80%;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;

}

h1 {
  margin: 0;
  color: #000000;
  font-family: 'Times New Roman', Times, serif;
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

.logo {
  height: 50px;
  width: 50px;
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

@media only screen and (max-width: 600px) {
  .container {
    flex-direction: column;
    text-align: center;
  }

  nav ul li {
    display: block;
    margin: 10px 0;
  }

  .profile {
    height: 200px;
    width: 200px;
  }

  .main-content {
    padding: 50px; 
  }

  .content-section h2 {
    font-size: 1.5em; 
  }

  .content-section p {
    font-size: 0.8em; 
  }
}

.main-content {
  padding: 100px;
  background-image: url('bodyback.jpg'); 
  background-repeat: no-repeat; 
  background-size: cover; 
  background-position: center; 
}

.content-section {
  margin-bottom: 30px;
}

.content-section h2 {
  color: #000000;
}

.content-section p {
  color: #000000;
}

@media only screen and (max-width: 768px) {
  .main-content {
    padding: 10px;
  }
}

.flex{
  display: flex;
  justify-content: space-between; 
  align-items: center; 
  font-size:larger;
  font-family:monospace;
  margin-top:100px;
  margin-right:50px;
  margin-left:-20px;
}

.flex div {
  flex: 1; 
  padding: 10px;
}

.logo{
  height:70px;
  width: 70px;
}

.logout{
  float: right;
}



.register{
  border-color: burlywood;
  background-color: antiquewhite;
  border-radius: 20px;
  margin-left: 300px;
  margin-right: 300px;
}

.reg_form{
  border-color: burlywood;
  background-color: blanchedalmond;
  height: 400px;
  border-radius: 20px;
  margin-left: 400px;
  margin-right: 400px;
}

.form{
  float: left;
}

.signup{
  border-color:brown;
  background-color:coral;
  border-radius: 30px;
  margin-top: 50px;

}

.win{
  padding-bottom: 50px;
}

.marquee{
  font-size: xx-large;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  font-style: oblique;
  color:red;
}


.sloganarea{
  margin-top: 110px;

  height:400px ;
  color: aliceblue;
}
.text{
  color: aliceblue;
  font-size: xx-large;
  align-items: center;
}

.votinghead{
  font-family: 'Times New Roman', Times, serif;
}
</style>

</head>
<body class="body">
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



<center>    
  <div class="container">
    <div class="flex">
          <div class="items">
            <img src="img4.jpeg" >
          </div>
        </div>
        <div class="flex">
          <div class="items">
          <img src="slogan2.jpeg" alt="">
            
          </div>
        </div>
        <div class="flex">
          <div class="items">
        <img style="height: 350px;" src="slogan1.jpg">
            
          </div>
        </div>
        
      
</div>

      


  <div class="reg_form">

    <h2  style="font-family:Arial, Helvetica, sans-serif; font-size: xx-large;padding-top: 50px;">Accessories</h2>

    <form method="post">

       

        <input type="radio" id="CE" name="dean" value="start" required>
        <label for="ce">Start Voting Process</label><br><br>
        <label>Duration: Hours</label>
        <input type="number" id="dur1" name="durH" min=0 cols="50" placeholder="Hours">
        <label> Minutes</label>
        <input type="number" id="dur2" name="durM" min=1 cols="50" placeholder="Minutes"><br><br>
        <input type="radio" id="EC" name="dean" value="disqualify">
        <label for="ec">Manage the candidates</label><br><br>
        


        <a href="#" <input class="signup" type="submit" value="Send OTP"><button class="signup">Access</button></a><br><br>

       
        
        
    

  </div>

</center>

<marquee class="marquee">The Election will be held only between the given time. So, hurry up and Represent Yourself!!!</marquee>
  
</body>
</html>


