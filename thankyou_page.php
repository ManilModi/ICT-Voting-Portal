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
    
<h2 class="fin"><pre>Thank you
for giving your
valuable time to valuable voting

The results will be declared soon.
</pre></h2>
</div>
</body>
</html>


<?php

require('config.php');

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm"|| $_SESSION['loggedin']!=="thankyou" ){
    header("location: error.php");
    exit;
  }

$stmt1="SELECT start_time FROM admins WHERE Branch='Dean' ";
$stmt2="SELECT end_time FROM admins WHERE Branch='Dean' ";

 if($stmt1===0){
    $_SESSION['loggedin']="before";

    header("location:beforetime.php");
}

$pstmt1 = mysqli_prepare($link, $stmt1);
mysqli_stmt_execute($pstmt1);
$presult1 = mysqli_stmt_get_result($pstmt1);
        
$pstmt2 = mysqli_prepare($link, $stmt2);
mysqli_stmt_execute($pstmt2);
$presult2 = mysqli_stmt_get_result($pstmt2);  

if ((mysqli_num_rows($presult1) && (mysqli_num_rows($presult2)) > 0)){
    $row1 = mysqli_fetch_assoc($presult1);
    $row2 = mysqli_fetch_assoc($presult2);

            $start_time=$row1['start_time'];
            $end_time=$row2['end_time'];

            $current_time=time();

    


$temp3 = base64_decode(urldecode($_GET["temp2"]));
$_SESSION['MobileNumber'] = $temp3;

$vf1 = base64_decode(urldecode($_GET["vf"]));



if(isset($_SESSION['MobileNumber'])){

    $m = $_SESSION['MobileNumber'];


    if($vf1>=1 && $vf1<=6){

    $sql1 = "UPDATE ce1voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {
 
        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {

        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }
    

    mysqli_close($link);
}else if($vf1>=7 && $vf1<=12){

    $sql1 = "UPDATE ec1voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);
        
        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {

        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }
    

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }

    mysqli_close($link);
}else if($vf1>=13 && $vf1<=18){

    $sql1 = "UPDATE it1voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);
        

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {
 

        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }
    
        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }
    
    mysqli_close($link);
}else if($vf1>=19 && $vf1<=24){

    $sql1 = "UPDATE ce2voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);
        

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {



        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }
    

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }

    mysqli_close($link);
}else if($vf1>=25 && $vf1<=30){

    $sql1 = "UPDATE ec2voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);
        

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {
   

        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }
    

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }

    mysqli_close($link);
}else if($vf1>=30 && $vf1<=36){

    $sql1 = "UPDATE it2voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);
        

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {

        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }
    
        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }
    

    mysqli_close($link);
}else if($vf1>=37 && $vf1<=42){

    $sql1 = "UPDATE ce3voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);
        

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {

        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }
    

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }
    

    mysqli_close($link);
}else if($vf1>=43 && $vf1<=48){

    $sql1 = "UPDATE ec3voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);
        

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {
   

        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }
    

    mysqli_close($link);
}else if($vf1>=49 && $vf1<=54){

    $sql1 = "UPDATE it3voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);
        

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {
 
        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }
    

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }
    

    mysqli_close($link);
}else if($vf1>=55 && $vf1<=60){

    $sql1 = "UPDATE ce4voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {


        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }
    

    mysqli_close($link);
}else if($vf1>=61 && $vf1<=66){

    $sql1 = "UPDATE ec4voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {


        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }
    

    mysqli_close($link);
}else if($vf1>=67 && $vf1<=72){

    $sql1 = "UPDATE it4voters SET VotedFlag=1, vp=? WHERE MobileNumber=?";
    $stmt1 = mysqli_prepare($link, $sql1);

    $sql2 = "UPDATE candidate SET vote_count=vote_count+1 WHERE Sr=?";
    $stmt2 = mysqli_prepare($link, $sql2);

    if ($stmt1 && $stmt2) {

        mysqli_stmt_bind_param($stmt1, "is", $vf1, $m);
        mysqli_stmt_bind_param($stmt2, "i", $vf1);

        if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {


        } else {
            echo "Error executing statements: " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        
    } else {
        echo "Error preparing statements: " . mysqli_error($link);
    }

    mysqli_close($link);
}
} else {
    echo "MobileNumber not set in session.";
}
}else if($current_time<$start_time){
    header("location:beforetime.php");
} 
else if($current_time > $end_time){
    header("location:resultcount.php");
    
}

?>



