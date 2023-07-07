
<?php
    session_start();
    if($_SESSION['R_Id']==null && $_SESSION['R_Name']==null){
        header("Location: ./SplashScreen.php");
    }
?>

<?php

        if(isset($_POST['upload'])){

            $size = sizeof($_FILES['file_doc']['name']);
            for($i=0 ; $i<$size ; $i++){
                 $extension = strtolower(pathinfo($_FILES['file_doc']['name'][$i],PATHINFO_EXTENSION));
                //  $filepath = "./Uploaded_Files/" . time() . "-" . $_FILES['file_doc']['name'];
                 $DocName =  time() . rand(150,15000). "-" . $_FILES['file_doc']['name'][$i];
                 $uploadfile = "./Docs/".$DocName;
                 if($extension=="pdf")  {
                    if(move_uploaded_file($_FILES['file_doc']['tmp_name'][$i],$uploadfile)){

                        $Robot_Id=$_SESSION['R_Id'];
                        $RName = $_SESSION['R_Name'];
                        $Ip=$_SERVER["REMOTE_ADDR"];
                        $conn = new PDO("mysql:host=localhost;dbname=robotics_php","root","");
                        $stat = $conn -> prepare("insert into robot_documents (Robot_Id,Rname,DocName,Ip)
                            values('$Robot_Id','$RName','$DocName','$Ip')");
                        $stat -> execute();
                        $conn = null;
                        echo "<script type='text/javascript'>
                        alert ('Successfully uploaded.');
                        window.location ='Documents.php';
                        </script>"; 
                    }
                    else
                        echo "<script type='text/javascript'>
                        alert ('Error in file uploading !!');
                        window.location ='Documents.php';
                        </script>"; 
                 }
            }
        } 
        else{
            header("Location: ./SplashScreen.php");
        }
                     
?>