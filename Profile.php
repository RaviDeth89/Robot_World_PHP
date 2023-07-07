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
    <title>Profile</title>
    <link rel="stylesheet" href="./NavbarStyle.css">
    <link rel="stylesheet" href="./Modal.css">
    <style>
        .div45{
            counter-reset: xml_error_string;
        }
        td {
            vertical-align: baseline;
        }
    </style>
</head>
<body>
    <header>
        <div class="brand"><a href="LoginHome.php">Welcome, <?php echo $_SESSION['R_Name']; ?></a></div>

        <nav>
            <ul>
                <li><a href="LoginHome.php">Home</a></li>
                <li><a href="Profile.php">Profile</a></li>
                <li><a href="Documents.php">Documents</a></li>
                <li><a href="javascript:myFunction()">Log Out</a></li>                
            </ul> 
        </nav>
    </header>

<?php
    $R_Id =$_SESSION['R_Id'];
    $conn = new PDO("mysql:host=localhost;dbname=robotics_php","root","");
                $query = "select * from robot_table where Robot_Id='$R_Id'";
                $stat = $conn->prepare($query);
                $stat->execute();
                $result = $stat->fetchAll();
                $conn = null;

                foreach ($result as $re) {
    ?>            


<h1 align="center">Profile</h1>
                        <hr><br><br>
<table>
    <tr>
        <td>
            <img align="top" id="myImg" src="<?php echo $_SESSION['DP']; ?>" style="width: 400px;height: 320px;margin-left:25%;">
            
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
        </td>
        <td>

            <div class="containerx2">
                    <label><b>Robot Name</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['Robotname']; ?>
                    </div>
                    
                    <label><b>Robot Mobile Number</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                       <?php echo $re['Robotmobno']; ?>
                    </div>
                    
                    <label><b>Robot Email</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['Robotemail']; ?>
                    </div>
                    
                    <label><b>Robot Type</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['RobotType']; ?>
                    </div>
                    
                    <label><b>Robot Operating System</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['Robot_OS']; ?>
                    </div>
                    
                    <label><b>Payload (Capacity)</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['Payload']; ?> Kg
                    </div>
                    
                    <label><b>Degrees Of Freedom</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['DegreesOfFreedom']; ?>
                    </div>
                    
                    <label><b>Body Color</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['BodyColor']; ?>
                        <input type="color" value="<?php echo $re['BodyColor']; ?>"/>
                    </div>
                    
                    <label><b>Speed</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['Speed']; ?> Km/h
                    </div>
                    
                    <label><b>Registration Date & Time</b></label>
                    <div style="width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        display: inline-block;
                        border: none;
                        background: #f1f1f1;">
                        <?php echo $re['Time_Stamp']; ?>
                    </div>
            </div>
        </td>
    </tr>
</table>
      
    <?php
        }
    ?>     
        <script>
        function myFunction() {
            if (confirm("Are you sure, Do you want to Logout?")) {
                window.location ='LogOut.php';
            }
        }

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