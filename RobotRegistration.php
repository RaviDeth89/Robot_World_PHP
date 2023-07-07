<?php
        if(isset($_POST["signupbtn"])){
            $Rname = $_POST["Rname"];
            $conn = new PDO("mysql:host=localhost;dbname=robotics_php","root","");
                $query = "select Rname from robot_table";
                $stat = $conn->prepare($query);
                $stat->execute();
                $result = $stat->fetchAll();
                $conn = null;
                foreach ($result as $re) 
                    $re['Rname'];            

            if($Rname == $re['Rname']){
                echo "<script type='text/javascript'>
                    alert ('This unique Rname is already exist !!');
                    window.location ='RobotLoginForm.php';
                    </script>"; 
            }
            else{

                $extension = strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION));
                if($extension == "jpg" || $extension == "webp" || $extension == "png" || $extension == "jpeg"){         
                    
                    $Robotname = $_POST["Robotname"];
                    $Robotmobno = $_POST["Robotmobno"];
                    $Robotemail = $_POST["Robotemail"];
                    $RobotType = $_POST["RobotType"];
                    $Robot_OS = $_POST["Robot_OS"];
                    $Payload = $_POST["Payload"];
                    $DegreesOfFreedom = $_POST["DegreesOfFreedom"];
                    $BodyColor = $_POST["BodyColor"];
                    $Speed = $_POST["Speed"]; 
                    $Pswd = md5($_POST["Pswd"]);
                    $Ip=$_SERVER["REMOTE_ADDR"];
                // Robot_Id	Robotname	Robotmobno	Robotemail	RobotType	Robot_OS	Payload	DegreesOfFreedom	BodyColor	Speed	Rname	Pswd	Ip	Time_Stamp	Status  Photograph
                    $filepath = "./Uploaded_Files/" . time() . "-" . $_FILES['img']['name'];
                    move_uploaded_file($_FILES['img']['tmp_name'],$filepath);

                    $conn = new PDO("mysql:host=localhost;dbname=robotics_php","root","");
                    $stat = $conn -> prepare("insert into robot_table (Robotname,Robotmobno,Robotemail,RobotType,Robot_OS,Payload,DegreesOfFreedom,BodyColor,Speed,Rname,Pswd,Ip,Status,Photograph)
                    values('$Robotname','$Robotmobno','$Robotemail','$RobotType','$Robot_OS','$Payload','$DegreesOfFreedom','$BodyColor','$Speed','$Rname','$Pswd','$Ip',1,'$filepath')");
                    $count = $stat -> execute();
                    $conn =null;
                    
                    if($count>0){
                                                    
                            $to = $Robotemail;
                            $subject = "Registration Successful.";
                            $img = "https://static1.colliderimages.com/wordpress/wp-content/uploads/2022/12/m3gan-social-featured.jpg";
                            $message = "
                            <html>
                            <head>
                            <title>Registration Successful</title>
                            </head>
                            <body>
                            <p>Welcome, $Robotname. You are a $RobotType. You have registered the account successfully. Congratulations, You have became a family member of Robotics World.</p>
                            <table border='1pt' align='center'>
                            <tr>
                            <th>Your Unique ID </th>
                            </tr>
                            <tr>
                            <td>$Rname</td>
                            </tr>
                            </table>
                            <br>
                            <img src='$img' alt='Image loading'><br>
                            <br>
                            From : Robot World (India)
                            </body>
                            </html>
                            ";

                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            // More headers
                            $headers .= 'From: Robots Arround the World' . "\r\n";
                            $headers .= 'Cc: '."\r\n";

                            $count = mail($to,$subject,$message,$headers);

                        echo "<script type='text/javascript'>
                            alert ('Registration is completed successfully as $Rname.');
                            window.location ='RobotLoginForm.php';
                            </script>"; 
                    }
                    else{
                        echo "<script type='text/javascript'>
                            alert ('Registration Failed !!!');
                            window.location ='RobotLoginForm.php';
                            </script>"; 
                    }
                }
                else{
                    echo "<script type='text/javascript'>
                        alert ('Only image file is allowed !!!');
                        window.location ='RobotLoginForm.php';
                        </script>";
                }
            }
            
        }
        else
            header("Location: ./RobotLoginForm.php");
?>