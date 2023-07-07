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
    <h1 style="margin-top: 50px; margin-left:50px;">Password Reset &#128272;</h1>
    <p style="margin-left:50px;">----------------------------------</p>
    
<form action="pswd_reset_mail.php" method="post">
  <div style="margin-left:50px;">
  <label for="Rname">Robot Unique Id : Rname &#x1F916;</label>
  <input style="margin-top: 20px;" type="text" name="Rname" placeholder="Enter unique id" required/>

  <button type="submit" name="pswd_reset">Send request &#9993;</button>
  </div>
</form>
</body>
</html>