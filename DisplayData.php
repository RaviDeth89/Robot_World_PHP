<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <title>Display All Data</title>
    <style>
        .btn1:hover {
            color: #fff;
            background-color: seagreen;
        }

        .btn2:hover {
            color: #fff;
            background-color: brown;
        }
        .btn {
            margin-left: 93%;
            position: absolute;
            background-color: #0a0a23;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: large; 
        }

        .btn:hover {
            color: black;
            background-color: lightblue;
        }
    </style>
</head>

<body>

    <?php
    if ($_SESSION["R_Name"]!=null) {
        $R_Id = $_SESSION['R_Id'];
        $conn = new PDO("mysql:host=localhost;dbname=robotics_php", "root", "");
        $query = "select * from work_schedule where status=1 and Robot_Id='$R_Id'";
        
        $stat = $conn->prepare($query);
        $stat->execute();
        $result = $stat->fetchAll();
        $srno = 0;
        foreach ($result as $re) {

    ?>
        

    <?php
                
        echo "<table align='center' class='table table-striped' id='mytable'>
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Work</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>To Time</th>
                            <th>Duration (minutes)</th>
                            <th>Record Time</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr></thead><tbody>";

            $reid = base64_encode((bin2hex(decbin($re['Id']+2000))) . "$" . md5(rand(1,1000)));
            echo "<tr><td>" . ++$srno . "</td>
                        <td>" . $re['Work'] . "</td>
                        <td>" . $re['Date'] . "</td>
                        <td>" . $re['Time'] . "</td>
                        <td>" . $re['ToTime'] . "</td>
                        <td>" . $re['Duration'] . " min</td>
                        <td>" . $re['Time_Stamp'] . "</td>
                        
                        <td>
                        <form action='EditForm.php' method='post' align='center'>
                            <input type='hidden' name='Id' value='$reid'> 
                            <button class='btn1' name='updbtn' type='submit'>
                                Update
                            </button>
                        </form>
                        </td>
                        <td><form action='DeleteData.php' method='post' align='center'>
                        <input type='hidden' name='Id' value='$reid'> 
                        <button class='btn2' name='delbtn' type='submit'>
                            Delete
                        </button>
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