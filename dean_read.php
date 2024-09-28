<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" ||$_SESSION['loggedin'] === "CE" ||$_SESSION['loggedin'] === "EC"||$_SESSION['loggedin'] === "IT"|| $_SESSION['loggedin']==="dean" || $_SESSION['loggedin']!=="read" ){
    header("location: error.php");
    exit;
  }

include "config.php";

$sql = "SELECT * FROM candidate";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Name</th>";
        echo "<th>Department</th>";
        echo "<th>Year</th>";
        echo "<th>Votes</th>";
        echo "<th></th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Sr'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Branch'] . "</td>";
            echo "<td>" . $row['Year'] . "</td>";
            echo "<td>" . $row['vote_count'] . "</td>";
            echo "&nbsp";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}


?>


<style>
    table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        overflow: hidden;
    }
    body{
        background-color: rgb(224, 202, 142);
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: rgb(252, 252,70);
    }

    tr:nth-child(even) {
        background-color: rgb(252, 252, 142);
    }

    tr:hover {
        background-color: rgb(252, 202, 142);
    }

    th, td:first-child {
        border-left: 1px solid #ddd;
    }

    th, td:last-child {
        border-right: 1px solid #ddd;
    }
    body{
    padding: 0;
    margin: 0;
    background-color: rgb(224, 202, 142);
    }

    tbody tr:last-child td {
        border-bottom: 0;
    }
    li {
    margin-bottom: 10px;
    line-height: 1.8;
    margin-left: 20px;
    }
    table{
        margin-top: 120px;
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
<body>
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
</body>
</html>
