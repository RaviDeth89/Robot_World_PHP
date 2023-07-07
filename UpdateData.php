<?php
        if(isset($_POST["editbtn"])){
                $Id = $_POST['Id'];
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
                        $stat = $conn -> prepare("update work_schedule set Work='$Work',Date='$Date',Time='$Time',ToTime='$ToTime',Ip='$Ip',Duration='$Duration' where Id='$Id'");
                        $stat -> execute();
                        header("Location: ./LoginHome.php");
                }
                
        }  
        else
            header("Location: ./SplashScreen.php");
?>