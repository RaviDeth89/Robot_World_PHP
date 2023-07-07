<?php
    session_start();
    $_SESSION['R_Id']=null;
    $_SESSION['R_Name']=null;
    $_SESSION['DP']=null;
    session_destroy();
    header("Location: ./RobotLoginForm.php");
?>