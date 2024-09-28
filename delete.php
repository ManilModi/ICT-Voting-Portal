<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" ||$_SESSION['loggedin'] === "CE" ||$_SESSION['loggedin'] === "EC"||$_SESSION['loggedin'] === "IT"|| $_SESSION['loggedin']==="dean" || $_SESSION['loggedin']!=="read" ){
    header("location: error.php");
    exit;
  }

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    require_once "config.php";
    $sql = "DELETE FROM candidate WHERE Sr = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
        if (mysqli_stmt_execute($stmt)) {
            header("location: dean_read.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    if (empty(trim($_GET["id"]))) {
        echo $link->error;
        exit();
    }
}
?>

<h1>Disqualifing Candidate</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
    <?php
        
        
    ?>
    <p>Are you sure you want to disqualify 
        <?php
            include "config.php";
            $id=$_GET['id'];
            $q1="SELECT Name,Branch,Year FROM candidate WHERE Sr=$id";
            $q2=mysqli_query($link,$q1);
            if(mysqli_num_rows($q2) > 0)
            {   
                $row = mysqli_fetch_assoc($q2);
                $name=$row['Name'];
                $branch=$row['Branch'];
                $year=$row['Year'];
            }
            else
            {
                echo $link->error;
            } 
            echo "<b>$name from $branch($year year)</b>"; 
        ?>? </p><br/>
        <p>
            <input type="submit" value="Yes">
            <a href="dean_read.php">No</a>
        </p>
</form>
