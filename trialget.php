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
                <li class="home"><a href="first.php">Sign Up</a></li>
                <li><a href="about_page.html">About</a></li>
            </li>
            <li style="float:right" class="about"><a href="first.php">Log Out</a></li>

            </ul>
        </nav>
    </div>
</header>



<center>    
    <div class="flex">
    <div class="slider">
        <div class="rotator">
          <div class="items">
            <img src="img4.jpeg"  >
          </div>
          <div class="items">
            <img src="img1.jpeg" >
          </div>
          <div class="items">
            <img src="img3.jpeg"  >
          </div>
          <div class="items">
            <img src="img4.jpeg" >
          </div>
        </div>
      </div>

      <div class="sloganarea">
        <h2 class="text">
            <img src="slogan2.jpeg" alt="">
        </h2>
      </div>
      <div>
        <img style="height: 350px;" src="slogan1.jpg">
      </div>

      </div>

      


  <div class="reg_form">

    <h2  style="font-family:Arial, Helvetica, sans-serif; font-size: xx-large;padding-top: 50px;">Login Form</h2>

    <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

        <label for="mobile">Mobile No.:</label>
        <input type="text" id="mobile" name="number" required placeholder="enter your registered number" pattern="\d{10}">
        <small style="color:red;"><?php echo $errors['number'] ?? '' ?></small><br><br><br>
        Select your Department:

        <input type="radio" id="CE" name="branch" value="CE" required>
        <label for="ce">CE</label>
        <input type="radio" id="EC" name="branch" value="EC">
        <label for="ec">EC</label>
        <input type="radio" id="IT" name="branch" value="IT">
        <label for="it">IT</label><br><br><br>

        Select your Academic Year:

        <input type="radio" id="1" name="year" value="1" required>
        <label for="1">First</label>
        <input type="radio" id="2" name="year" value="2">
        <label for="2">Second</label>
        <input type="radio" id="3" name="year" value="3">
        <label for="3">Third</label>
        <input type="radio" id="4" name="year" value="4">
        <label for="4">Fourth</label><br><br><br>

        <label for="kay">Password:</label>
        <input type="text" id="kay" name="pwd" required placeholder="enter your college-profile password" pattern="[A-Za-z0-9]{8}">
        <small style="color:red;"><?php echo $errors['pwd'] ?? '' ?></small><br><br><br>

        <a href="#" <input class="signup" type="submit" value="Send OTP"><button class="signup">Log In</button></a><br><br>

       
        
        
    

  </div>

</center>

<marquee class="marquee">The Election will be held only between the given time. So, hurry up and Represent Yourself!!!</marquee>
  
</body>
</html>

<?php


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm"|| $_SESSION['loggedin']!=="trialindex" ){
  header("location: error.php");
  exit;
}



?>