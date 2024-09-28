<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm"||  $_SESSION['loggedin']!=="resultpage" ){
    header("location: error.php");
    exit;
  }

$winners = explode(',', urldecode($_GET['winners']));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">

<center>    

        <h2>~:The Results of Voting are out. Follow up the Winners below:~</h2 >
        <div class="container">

            <div class="flex">


                <div class="signup">
                   <h2> CE First Year CR</h2>
                    <h3><?php echo $winners[0]; ?></h3>


                </div>


            </div>

            <div class="flex">


                <div class="signup">
                    <h2> EC First Year CR</h2>
                    <h3><?php echo $winners[1]; ?></h3>
                </div>

            </div>

            <div class="flex">


                <div class="signup">
                    <h2> IT First Year CR</h2>
                    <h3><?php echo $winners[2]; ?></h3>
                </div>

            </div>

        </div>
        <div class="container">

            <div class="flex">


                <div class="signup">
                    <h2> CE Second Year CR</h2>
                    <h3><?php echo $winners[3]; ?></h3>
                </div>

            </div>

            <div class="flex">


                <div class="signup">
                    <h2> EC Second Year CR</h2>
                    <h3><?php echo $winners[4]; ?></h3>
                </div>

            </div>

            <div class="flex">


                <div class="signup">
                    <h2> IT Second Year CR</h2>
                    <h3><?php echo $winners[5]; ?></h3>
                </div>

            </div>


        </div>
        <div class="container">

            <div class="flex">


                <div class="signup">
                    <h2> CE Third Year CR</h2>
                    <h3><?php echo $winners[6]; ?></h3>
                </div>

            </div>

            <div class="flex">


                <div class="signup">
                    <h2> EC Third Year CR</h2>
                    <h3><?php echo $winners[7]; ?></h3>
                </div>

            </div>

            <div class="flex">

                <div class="signup">
                    <h2> IT Third Year CR</h2>
                    <h3><?php echo $winners[8]; ?></h3>
                </div>

            </div>


        </div>

        <div class="container">

            <div class="flex">


                <div class="signup">
                    <h2> CE Fourth Year CR</h2>
                    <h3><?php echo $winners[9]; ?></h3>
                </div>

 

            </div>

            <div class="flex">


                <div class="signup">
                    <h2> EC Fourth Year CR</h2>
                    <h3><?php echo $winners[10]; ?></h3>
                </div>

            </div>

            <div class="flex">


                <div class="signup">
                    <h2> IT Fourth Year CR</h2>
                    <h3><?php echo $winners[11]; ?></h3>
                </div>

            </div>


        </div>



</center>


  
</body>
</html>
