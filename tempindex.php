<?php

include "config.php";

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== "vote" ||$_SESSION['loggedin'] === "CE" ||$_SESSION['loggedin'] === "EC"||$_SESSION['loggedin'] === "IT"|| $_SESSION['loggedin']==="dean" || $_SESSION['loggedin']==="adm" ){
    header("location: error.php");
    exit;
  }



$stmt1="SELECT start_time FROM admins WHERE Branch='Dean' ";
$stmt2="SELECT end_time FROM admins WHERE Branch='Dean' ";

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




if ($current_time >= $start_time && $current_time <= $end_time) {

    $_SESSION['loggedin']="trialindex";

    header("location:trialindex.php");

}else if($start_time==0){
    $_SESSION['loggedin']="before";

    header("location:beforetime.php");
}
else if($current_time<=$start_time){

    $_SESSION['loggedin']="before";

    header("location:beforetime.php");
}
else if($current_time >= $end_time){

    $_SESSION['loggedin']="result";

    header("location:resultcount.php");
    
}
} 


?>  