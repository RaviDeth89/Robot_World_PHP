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
    
    <title>Documents</title>
    <link rel="stylesheet" href="./NavbarStyle.css">
    <link rel="stylesheet" href="./Modal.css">
    
    <style>  
            
            .btnupld {
                display: inline-block;
                margin: .5rem .5rem 1rem .5rem;
                clear: both;
                font-family: inherit;
                font-weight: 700;
                font-size: 14px;
                border-radius: .3rem;
                padding: 0 1rem;
                height: 36px;
                line-height: 36px;
                transition: all 0.2s ease-in-out;
                box-sizing: border-box;
                cursor: pointer;
            }
            .btnupld:hover{
                color: darkblue;
                background-color: darkgray;
            }
    </style>
</head>
<body>
    <?php
        $R_Id =$_SESSION['R_Id'];
        $conn = new PDO("mysql:host=localhost;dbname=robotics_php","root","");
        $query = "select Photograph from robot_table where Robot_Id='$R_Id'";
        $stat = $conn->prepare($query);
        $stat->execute();
        $result = $stat->fetchAll();
        $conn = null;
                foreach ($result as $re) {
    ?>            

    <header>
        <div class="brand"><img id="myImg" src="<?php echo $re['Photograph']; ?>" style="width: 70px;height: 60px;border-radius:50%;"><a href="LoginHome.php">    Welcome, <?php echo $_SESSION['R_Name']; ?></a> </div>
        <?php } ?>
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
    
    <h2 align="center">Upload Documents</h2>
    <hr>
    <!-- Upload  -->
    <form align="center" action="Documentphp.php" method="post" enctype="multipart/form-data">
    
    <div>
        <input id="file-upload" type="file" name="file_doc[]" accept=".pdf" multiple required/>
    </div>
    <label for="file-upload" id="file-drag">
        <img id="file-image" src="./images/file-upload.webp" alt="Preview" width="250" height="120" class="hidden">
    </label>
    <br>
    <button class="btnupld" type="submit" name="upload" title="Upload files">Upload</button>
    </form>
    <hr>

    
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

    <?php
        include 'DisplayDocs.php';
    ?> 

</body>
</html>