<?php
    if($_GET['Robot_Id']){
        date_default_timezone_set("Asia/Calcutta");    
        $real_date=date("y-m-d");
        $real_time= date("H:i:s");

        $rl_dt=@$_GET['rl_dt'];
        $rl_tm=@$_GET['rl_tm'];

        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $decryption_iv1 = '1234567891077721';
        $decryption_key1 = "Php-Python";
        $rl_dt_dec=openssl_decrypt ($rl_dt, $ciphering,
		$decryption_key1, $options, $decryption_iv1);

        // echo $rl_dt_dec."<br><br>";

        $decryption_iv2 = '1234567891011121';
        $decryption_key2 = "BMW-Ford";
        $rl_tm_dec=openssl_decrypt ($rl_tm, $ciphering,
		$decryption_key2, $options, $decryption_iv2);

        // echo $rl_tm_dec."<br><br>";

        $date1=date_create($rl_dt_dec);
        $date2=date_create($real_date);
        $interval=date_diff($date1,$date2);

        $valid_time = strtotime($rl_tm_dec);
        $real_time = strtotime($real_time);
        $time_interval= ($real_time - $valid_time)/60;

        // echo $interval->format('%a');
        // echo $interval->format('%a')."<br>$time_interval<br><br>";

        if($interval->format('%a') == 0 && $time_interval<=30){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Link</title>
    <style>
        button,
        input {
            display: block;
            margin-bottom: 20px;
            }
    </style>
</head>
<body>
    <?php
        $Rname=$_GET['Rname'];
        $token=$_GET['token'];
        $Robot_Id = $_GET['Robot_Id'];
    ?>
    
    <h1>&#x1F916; <?php echo $Rname; ?></h1><hr>
    <h2 style="margin-top: 30px; margin-left:50px;">Password Reset</h2>
    <p style="margin-left:50px;">----------------------------------</p>

<form action="reset_password.php" method="post">
  <div style="margin-left:50px;">
  <input type="hidden" name='Rname' value="<?php echo $Rname; ?>"/>
  <input type="hidden" name='Robot_Id' value="<?php echo $Robot_Id; ?>"/>
<input type="hidden" name='token' value="<?php echo $token; ?>"/>

  <label for="password">Password &#128272;</label>
  <input type="password" id="password" name="pswd" required/>

  <label for="password-verify">Re-type Password &#128272;</label>
  <input type="password" id="password-verify" name="re_pswd" required/>

  <button type="submit">Reset password</button>
  </div>
</form>
</body>
</html>

<?php
        }
        else{
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
              <span class='error-text'>&#128683; Link is expired !!!</span>
            </div>
            </body>
            </html>";
        }
    }
    else
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
?>