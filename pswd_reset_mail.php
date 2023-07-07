<?php
if(isset($_POST['pswd_reset'])){
    $Rname=$_POST['Rname'];
    $conn = new PDO("mysql:host=localhost;dbname=robotics_php","root","");
                    $query = "select Robotemail,Robot_Id from robot_table where Rname='$Rname'";
                    $stat = $conn->prepare($query);
                    $stat->execute();
                    $result = $stat->fetchAll();
                    $conn = null;

                    foreach ($result as $re) {
                        $reid = base64_encode((bin2hex(decbin($re['Robot_Id']+2000))) . "$" . md5(rand(1,1000)));
                        $rec=$re['Robotemail'];
                    }
        date_default_timezone_set("Asia/Calcutta");    
        $real_date=date("y-m-d");
        $real_time= date("H:i:s");
        
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv1 = '1234567891077721';
        $encryption_key1 = "Php-Python";
        $encryption1 = openssl_encrypt($real_date, $ciphering,
			$encryption_key1, $options, $encryption_iv1);

        $encryption_iv2 = '1234567891011121';
        $encryption_key2 = "BMW-Ford";
        $encryption2 = openssl_encrypt($real_time, $ciphering,
            $encryption_key2, $options, $encryption_iv2);
  

    $sub = "Password reset link";
    $token = uniqid(md5(time()));
    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
        <h3>Link to reset your password for userid : $Rname</h3>
        <h4>&#128273; Click <a href='http://localhost/practicals/Robot_Project/reset.php?token=$token&Rname=$Rname&Robot_Id=$reid&rl_dt=$encryption1&rl_tm=$encryption2'>here</a> to
        reset your password</h4>

    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: Robot World' . "\r\n";
    $headers .= 'Cc: ' . "\r\n";

    $count =mail($rec,$sub,$message,$headers);
    if($count>0)
    echo "<h1 align='center'>&#9993;</h1>
        <h1 align='center'>Password reset link is sent to your registered e-mail id..</h1>
        <h2 align='center'><a href='RobotLoginForm.php' title=Login'>Login</a></h2>";
    else
    echo "<h1 align='center'>Sending failed!</h1>";
}
else
    header("Location: ./SplashScreen.php");
?>