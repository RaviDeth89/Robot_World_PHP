<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robots Arround the World</title>
    <style>
        .splash{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: black;
            z-index: 200;
            color: white;
            text-align: center;
            line-height: 90vh;
        }

        @keyframes fadeIn {
            to{
                opacity: 1;
            }
        }
        .fade-in{
            opacity: 0;
            animation: fadeIn 2s ease-in forwards;
        }
    </style>
    <script>
        var myVar=setInterval(function () {myTimer()}, 3000);
        function myTimer() {
            window.location="RobotLoginForm.php";
        }
    </script>
</head>
<body>
    <div class="splash">
        <img src="./images/RobotsWorld.png" class="fade-in"/>
    </div>

</body>
</html>