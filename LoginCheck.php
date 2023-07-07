<?php

    if(isset($_POST['loginbtn']))
    {
        $Captcha = $_POST['Captcha'];
        $TxtCaptcha = $_POST['TxtCaptcha'];
        if($Captcha != $TxtCaptcha){
            echo "<script type='text/javascript'>
            alert ('Captcha not matched !!');
            window.location ='RobotLoginForm.php';
            </script>"; 
        }

        else{
            $Rname = $_POST['Rname'];
            $Pswd = md5($_POST['Pswd']);

            //Database Connection
            $dbConn = mysqli_connect("localhost","root","","robotics_php");
            $query = "select * from robot_table where Rname='$Rname' and Pswd='$Pswd'";
            $result = mysqli_query($dbConn,$query);
            $count = mysqli_num_rows($result);
            mysqli_close($dbConn);
            if($count == 0){
                echo "<script type='text/javascript'>
                    alert ('Rname or Password is incorrect !!');
                    window.location ='RobotLoginForm.php';
                    </script>"; 
            }
            else{
                session_start();
                $row = mysqli_fetch_array($result);
                $_SESSION['R_Id'] = $row['Robot_Id'];
                $_SESSION['R_Name'] = $row['Rname'];
                header("Location: ./LoginHome.php");
            }
        }    

    }
    else
        header("Location: ./SplashScreen.php");

?>