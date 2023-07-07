<?php

    if (isset($_POST["delbtn"])) {
        session_start();
        $Id = $_POST['Id'];
        $Id = base64_decode($Id);
        $Id = explode('$',$Id);
        $Id = bindec(hex2bin($Id[0])) - 2000;
        $conn = new PDO("mysql:host=localhost;dbname=robotics_php", "root", "");
        $query = "update work_schedule set status=0 where Id=$Id";
        $stat = $conn->prepare($query);
        $stat->execute();
        $conn = null;
        header("Location: ./LoginHome.php");
    } 
    else
        header("Location: ./SplashScreen.php");
?>