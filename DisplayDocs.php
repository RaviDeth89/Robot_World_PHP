
<?php
    if($_SESSION['R_Id']==null && $_SESSION['R_Name']==null){
        header("Location: ./SplashScreen.php");
    }
?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <title>Display All Data</title>
    <style>
        
    </style>
</head>

<body>

    <?php
    if ($_SESSION["R_Name"]!=null) {
        $R_Id = $_SESSION['R_Id'];
        $conn = new PDO("mysql:host=localhost;dbname=robotics_php", "root", "");
        $query = "select * from robot_documents where Robot_Id='$R_Id'";
        $stat = $conn->prepare($query);
        $stat->execute();
        $result = $stat->fetchAll();
        $srno = 0;

        
        echo "<table align='center' class='table table-striped' id='mytable'>
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>R-Name</th>
                        <th>File Name</th>
                        <th>Open</th>
                        <th>Download</th>
                        <th>Time Stamp</th>
                    </tr>
                </thead>";

        foreach ($result as $re) {
            echo "<tbody><tr><td>" . ++$srno . "</td>
                        <td>" . $re['Rname'] . "</td>
                        <td>" . $re['DocName'] . "</td>
                        <td><a href='./Docs/" . $re['DocName'] ."' target='_blank' title='Open file' >Open</a></td>
                        <td><a href='./Docs/" . $re['DocName'] ."' title='Download file' download>Download</a></td>
                        <td>" . $re['TimeStamp'] . "</td>
                    </form></tr>";
        }
        echo "</tbody</table></div>";
        $conn = null;
        
    ?>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#mytable').DataTable();
            });
        </script>

     <?php
        } 
        else
            header("Location: ./SplashScreen.php");
    ?> 

</body>

</html>