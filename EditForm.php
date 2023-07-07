<?php

    session_start();
    if($_SESSION['R_Id']==null && $_SESSION['R_Name']==null){
        header("Location: ./SplashScreen.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="./NavbarStyle.css">
    <link rel="stylesheet" href="./Modal.css">
    
    <style>
            
            * {box-sizing: border-box}

            /* Add padding to containers */
            .containerlh {
            padding: 16px;
            }

            /* Full-width input fields */
            input[type=text]{
            width: 20%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            }

            input[type=text]:focus{
            background-color: #ddd;
            outline: none;
            }

            /* Overwrite default styles of hr */
            hr {
            border: 3px solid #f1f1f1;
            margin-bottom: 25px;
            }

            /* Set a style for the submit/register button */
            .editbtn {
            background-color:cadetblue;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            width: 7%;
            opacity: 0.9;
            }

            .editbtn:hover {
            opacity:1;
            }

    </style>

</head>
<body>

<?php
    if (isset($_POST["updbtn"])) {
        $Id = $_POST['Id'];
        $Id = base64_decode($Id);
        $Id = explode('$',$Id);
        $Id = bindec(hex2bin($Id[0])) - 2000;
        $conn = new PDO("mysql:host=localhost;dbname=robotics_php", "root", "");
        $query = "select * from work_schedule where Id=$Id";
        $stat = $conn->prepare($query);
        $stat->execute();
        $result = $stat->fetchAll();
        $re = $result[0];
    ?>



<header>
        <div class="brand"><a href="LoginHome.php">    Welcome, <?php echo $_SESSION['R_Name']; ?></a> </div>

            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
        <nav>
            <ul>
                <li><a href="LoginHome.php">Home</a></li>
                <li><a href="Profile.php">Profile</a></li>
                <li><a href="Documents.php">Documents</a></li>
                <li><a href="javascript:myFunction()">Log Out</a></li>                
            </ul> 
        </nav>
    </header>
    <form action="UpdateData.php" align='center' method="post">
        <div class="containerlh">
            <h1>Schedule Table</h1>
            <hr>

            <input type="hidden" name="Id" value="<?php echo $Id ?>">
            
            <label for="Work"><b>Work</b></label>
            <input type="text" placeholder="Work info" name="Work" value="<?php echo $re['Work'] ?>" required>

            <label for="Date"><b>Date</b></label>
            <input type="date" name="Date" value="<?php echo $re['Date'] ?>" required>

            <label for="Time"><b>Time</b></label>
            <input type="time" name="Time" value="<?php echo $re['Time'] ?>" required>

            <label for="ToTime"><b>To Time</b></label>
            <input type="time" name="ToTime" value="<?php echo $re['ToTime'] ?>" required>

            <button type="submit" class="editbtn" name="editbtn">Update</button>
            <hr>
        </div>

    </form>

    <?php
    } else
        header("Location: ./SplashScreen.php");
    ?>

    
    <script>
        function myFunction() {
            if (confirm("Are you sure, Do you want to Logout?")) {
                window.location ='LogOut.php';
            }
        }
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    </script>
</body>
</html>
