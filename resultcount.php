<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm"||  $_SESSION['loggedin']!=="result" ){
    header("location: error.php");
    exit;
  }

require('config.php');


$counts = [];
$winners = [];

for ($j = 1; $j <= 12; $j++) {
    $t=0;
    for ($i = ($j-1)*6+1; $i <= $j * 6; $i++) {
        $stmt = mysqli_prepare($link, "SELECT vote_count FROM candidate WHERE Sr=?");
        mysqli_stmt_bind_param($stmt, "i", $i);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $count = mysqli_fetch_assoc($result)['vote_count'];

        $counts[$j-1][$t] = $count;
        $t++;
    }
    rsort($counts[$j-1]);
}

for($i=0;$i<12;$i++)
{   
    
    if($i==0 || $i==3 ||$i==6 || $i==9){$branch="CE";}
    else if($i==1 || $i== 4|| $i==7||$i==10){$branch="EC";}  
    else if($i==2|| $i==5 || $i==8||$i==11){$branch="IT";}
    
    if($i==0 || $i==1 ||$i==2){$k=1;}
    else if($i==3 || $i==4 || $i==5){$k=2;}
    else if($i==6|| $i==7 || $i==8){$k=3;}
    else if($i==9|| $i==10 || $i==11){$k=4;}

    $stmt = mysqli_prepare($link, "SELECT Name FROM candidate WHERE vote_count=? AND Year=? AND Branch=? ");
    
    mysqli_stmt_bind_param($stmt, "iis", $counts[$i][0],$k , $branch);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $winner = mysqli_fetch_assoc($result)['Name'];


    $winners[] = $winner;


}

$winnersEncoded = urlencode(implode(',', $winners));
$_SESSION['loggedin']="resultpage";
header("location:resultpage.php?winners=$winnersEncoded");
exit;

?>

