<?php
        $pswd = md5($_POST['pswd']);
        $re_pswd = md5($_POST['re_pswd']);
        $Rname=$_POST['Rname'];
        $Robot_Id=$_POST['Robot_Id'];
        $token=$_POST['token'];

        if($pswd!=$re_pswd){
            echo "<h3>Password not matched !!</h3>"; 
        }
        else{  
                    $Robot_Id = base64_decode($Robot_Id);
                    $Robot_Id = explode('$',$Robot_Id);
                
                    $Robot_Id = bindec(@hex2bin($Robot_Id[0])) - 2000;
                    
                    if($Robot_Id<=0){
                        echo "<!DOCTYPE html>
                        <html lang='en'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title></title>
                            <Style>
                                .error-message {
                                background-color: #fce4e4;
                                border: 2px solid #fcc2c3;
                                float: left;
                                padding: 20px 30px;
                                }
                                .error-text {
                                color: #cc0033;
                                font-family: Helvetica, Arial, sans-serif;
                                font-size: 14px;
                                font-weight: bold;
                                line-height: 20px;
                                text-shadow: 1px 1px rgba(250,250,250,.3);
                                }
                            </Style>
                        </head>
                        <body>
                            <!-- Basic Error Message -->
                        <div class='error-message'>
                        <span class='error-text'>&#128683; Link is invalid !!! Please, check the link.</span>
                        </div>
                        </body>
                        </html>";
                    }
                    else{
                        $conn = new PDO("mysql:host=localhost;dbname=robotics_php","root","");            
                        $query = "update robot_table set Pswd='$pswd' where Robot_Id='$Robot_Id'";
                        $stat = $conn->prepare($query);
                        $count=$stat->execute();
                        $conn=null;

                        if($count>0)
                            echo "<h2>Password reset successfully.</h2>
                                <h2><a href='RobotLoginForm.php' title=Login'>Login</a></h2>";
                        else
                            echo "Failed !! Try again later.";
                        }
                        
            }

?>