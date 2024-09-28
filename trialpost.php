<?php
require('config.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
session_start();
$mobile_number = isset($_POST['number']) ? $_POST['number'] : '';
$selected_branch = isset($_POST['branch']) ? $_POST['branch'] : '';
$selected_year = isset($_POST['year']) ? $_POST['year'] : '';
$selected_pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';

$_SESSION['MobileNumber']=$mobile_number;

function repeat1($stmt2,$m_number)
{
    mysqli_stmt_bind_param($stmt2, "s", $m_number);
    mysqli_stmt_execute($stmt2);
    $sresult2 = mysqli_stmt_get_result($stmt2);
    $row2 = mysqli_fetch_assoc($sresult2);
    $vfv = $row2['VotedFlag'];

    return $vfv;
}
function repeat2($quer,$m)
{
        
        mysqli_stmt_bind_param($quer, "s", $m);
        mysqli_stmt_execute($quer);
        $result1 = mysqli_stmt_get_result($quer);
        $row1 = mysqli_fetch_assoc($result1);
        $spv = $row1['pwd'];
        return $spv;
}
if ($selected_branch == 'CE' && $selected_year == '2') 
{
    $query = "SELECT MobileNumber FROM ce2voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM ce2voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE ce2voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM ce2voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM ce2voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:ce2_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'ce2voters' table.";
    }
} 
else if ($selected_branch == 'CE' && $selected_year == '1') 
{
    $query = "SELECT MobileNumber FROM ce1voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM ce1voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE ce1voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM ce1voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM ce1voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:ce1_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'ce1voters' table.";
    }
}


else if ($selected_branch == 'CE' && $selected_year == '3') 
{
    $query = "SELECT MobileNumber FROM ce3voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM ce3voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE ce3voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM ce3voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM ce3voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:ce3_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'ce3voters' table.";
    }
}
else if ($selected_branch == 'CE' && $selected_year == '4') 
{
    $query = "SELECT MobileNumber FROM ce4voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM ce4voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE ce4voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM ce4voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM ce4voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:ce4_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'ce4voters' table.";
    }
}
else if ($selected_branch == 'EC' && $selected_year == '1') 
{
    $query = "SELECT MobileNumber FROM ec1voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM ec1voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE ec1voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM ec1voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM ec1voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:ec1_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'ec1voters' table.";
    }
}
else if ($selected_branch == 'EC' && $selected_year == '2') 
{
    $query = "SELECT MobileNumber FROM ec2voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM ec2voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE ec2voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM ec2voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;
 
            $query1 = "SELECT pwd FROM ec2voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:ec2_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'ec2voters' table.";
    }
}
else if ($selected_branch == 'EC' && $selected_year == '3') 
{
    $query = "SELECT MobileNumber FROM ec3voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM ec3voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE ec3voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM ec3voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM ec3voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:ec3_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'ec3voters' table.";
    }
}
else if ($selected_branch == 'EC' && $selected_year == '4') 
{
    $query = "SELECT MobileNumber FROM ec4voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM ec4voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE ec4voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM ec4voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM ec4voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:ec4_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'ec4voters' table.";
    }
}

else if ($selected_branch == 'IT' && $selected_year == '1') 
{
    $query = "SELECT MobileNumber FROM it1voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM it1voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE it1voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM it1voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM it1voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:it1_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'it1voters' table.";
    }
}
else if ($selected_branch == 'IT' && $selected_year == '2') 
{
    $query = "SELECT MobileNumber FROM it2voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM it2voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE it2voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM it2voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM it2voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:it2_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'it2voters' table.";
    }
}
else if ($selected_branch == 'IT' && $selected_year == '3') 
{
    $query = "SELECT MobileNumber FROM it3voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM it3voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE it3voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM it3voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM it3voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:it3_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'it3voters' table.";
    }
}
else if ($selected_branch == 'IT' && $selected_year == '4') 
{
    $query = "SELECT MobileNumber FROM it4voters WHERE MobileNumber = '$mobile_number'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $query1 = "SELECT pwd FROM it4voters WHERE MobileNumber = '$mobile_number'";
        $result1=mysqli_query($link, $query1);
        if(mysqli_num_rows($result1)>0) 
        {
            $sql2 = "UPDATE it4voters SET SignUpFlag = 1 WHERE MobileNumber = ?";

            $votedflag2 = "SELECT VotedFlag FROM it4voters WHERE MobileNumber = ?";
            $stmt2 = mysqli_prepare($link, $votedflag2);

            $value1=repeat1($stmt2,$mobile_number);

            $_SESSION['VotedFlag']=$value1;

            $query1 = "SELECT pwd FROM it4voters WHERE MobileNumber = ?";
            $stmt1 = mysqli_prepare($link, $query1);
    
            $value2=repeat2($stmt1,$mobile_number);
            if (($stmt2 = $link->prepare($sql2))&& $value2==$selected_pwd  )
            {   
                if($value1==0) 
                {
                $stmt2->bind_param("s", $mobile_number);
                
                if ($stmt2->execute()) 
                {
                    
                    $t=urlencode(base64_encode($_SESSION['MobileNumber']));
                    $value1=urlencode(base64_encode($_SESSION['VotedFlag']));
                    header("location:it4_votingpage.php?temp=$t&trialvf=$value1");

                    exit();
                } 
                else 
                {
                    echo "Error updating SignUpFlag: " . $stmt2->error;
                    exit();
                }
                }
            else 
                {
                echo "You have already successfully voted, kindly come next time!! " ;
                }
                
                $stmt2->close();
            } 
            
        else
                {
                    echo "Please enter a correct password" ;
                }
        } 
        else 
        {
            header("Location: vote_form.php?error=otp_mismatch");
            exit();
        }
    } 
    else 
    {
        echo "Mobile number not found in the 'it4voters' table.";
    }
}

}
?>