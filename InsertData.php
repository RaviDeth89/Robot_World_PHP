<?php
        if(isset($_POST["addbtn"])){
                session_start();
                $R_Id = $_SESSION['R_Id'];
                $Work = $_POST["Work"];
                $Date = $_POST["Date"];
                $Time = $_POST["Time"];
                $ToTime = $_POST["ToTime"];
                $Ip=$_SERVER["REMOTE_ADDR"];
                $Duration = (strtotime($ToTime) - strtotime($Time))/60;
                if($Duration<=0){
                    header("Location: ./LoginHome.php");
                }

                else{                  
                    //  Id	Robot_Id	Work	Date	Time	ToTime	Duration	Ip	Status  Time_Stamp
                    $conn = new PDO("mysql:host=localhost;dbname=robotics_php","root","");
                    $stat = $conn -> prepare("insert into work_schedule (Robot_Id,Work,Date,Time,ToTime,Ip,Status,Duration)
                         values('$R_Id','$Work','$Date','$Time','$ToTime','$Ip',1,'$Duration')");
                    $stat -> execute();
                    $conn = null;
                    header("Location: ./LoginHome.php");
            }
        }
        
        else
            header("Location: ./SplashScreen.php");
?>