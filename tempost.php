<?php

const WRONG_NUMBER = 'Please enter your correct Mobile Number';
const WRONG_PWD = 'Please enter your correct Password';
const NUMBER_REQUIRED = 'Please enter your Mobile Number';
const PWD_REQUIRED = 'Please enter your Password';


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === "vote" || $_SESSION['loggedin']==="adm"|| $_SESSION['loggedin']!=="trialindex" ){
    header("location: error.php");
    exit;
  }



function checkVoterEligibility($link, $mobile_number, $selected_branch, $selected_year, $selected_pwd)
{

   


    $table_name = strtolower("{$selected_branch}{$selected_year}voters");
    
    $mquery = "SELECT MobileNumber FROM {$table_name} WHERE MobileNumber = ?";
    $mstmt = mysqli_prepare($link, $mquery);
    mysqli_stmt_bind_param($mstmt, "s", $mobile_number);
    mysqli_stmt_execute($mstmt);
    $mresult = mysqli_stmt_get_result($mstmt);
    $mresult1 = mysqli_fetch_assoc($mresult);

    if (mysqli_num_rows($mresult) > 0) 
    {
        $pquery = "SELECT pwd, VotedFlag FROM {$table_name} WHERE MobileNumber = ?";
        $pstmt = mysqli_prepare($link, $pquery);
        mysqli_stmt_bind_param($pstmt, "s", $mobile_number);
        mysqli_stmt_execute($pstmt);
        $presult = mysqli_stmt_get_result($pstmt);
        
        if (mysqli_num_rows($presult) > 0) 
        {
            $row = mysqli_fetch_assoc($presult);
            $stored_pwd = $row['pwd'];
            $votedFlag = $row['VotedFlag'];
            
            if ($stored_pwd === $selected_pwd) 
            {

                if ($votedFlag != 0) {
                    $_SESSION['loggedin']="already";

                require('alreadyvoted.php');
                    
                    exit();
                }

                $uquery = "UPDATE {$table_name} SET SignUpFlag = 1 WHERE MobileNumber = ?";
                $ustmt = mysqli_prepare($link, $uquery);
                mysqli_stmt_bind_param($ustmt, "s", $mobile_number);
                
                if (mysqli_stmt_execute($ustmt)) 
                {

                    $t = urlencode(base64_encode($mobile_number));
                    $value1 = urlencode(base64_encode($votedFlag));

                    $_SESSION['loggedin']=$table_name;
                    header("location: {$table_name}_votingpage.php?temp=$t&trialvf=$value1");
                    exit();
                } 
                else {
                    echo "Error updating SignUpFlag: " . mysqli_error($link);
                    exit();
                }
            } 
            else {
                $errors['pwd'] = "Incorrect  password.";
                require('trialget.php');
                exit();
            }
        } 
        else {
            header("Location: vote_form.php?error=otp_mismatch");

            exit();
        }
    }
    else {
        $errors['number'] = "Incorrect mobile number or password .";
        require('trialget.php');

        exit();
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile_number = isset($_POST['number']) ? $_POST['number'] : '';
    $selected_branch = isset($_POST['branch']) ? $_POST['branch'] : '';
    $selected_year = isset($_POST['year']) ? $_POST['year'] : '';
    $selected_pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';

    
    
    switch ($selected_branch) {
        case 'CE':
        case 'EC':
        case 'IT':
            checkVoterEligibility($link, $mobile_number, $selected_branch, $selected_year, $selected_pwd);
            break;
        default:
           
    }
}
?>
