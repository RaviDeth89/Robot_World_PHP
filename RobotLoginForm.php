<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Robot Login Form</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

a{
  color:black;
}

input[type=text],input[type=email], input[type=password] {
  width: 22%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 15%;
  border-radius: 50%;
}

.container {
  align-items: center;
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
body, h1, h2, h3, h4, h5, h6  {
  font-family: "Times New Roman", Times, serif;
}

* {box-sizing: border-box;}

/* Add a background color when the inputs get focus */
input[type=text]:focus,input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

.inputsignup[type=text],.inputsignup[type=number],.inputsignup[type=email],.inputsignup[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.inputsignup[type=text]:focus,.inputsignup[type=number]:focus,.inputsignup[type=email]:focus, .inputsignup[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn1 {
  padding: 14px 20px;
  background-color:darkred;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn1, .signupbtn {
  float: left;
  width: 20%;
}

.container2{
    margin-left: 93%;
}
/* Add padding to container elements */
.container1 {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
a{
  font-size:x-large;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

</style>
</head>
<body>

<div>    
    <input type="radio" name="r" value="white" checked>Light
    <input type="radio" name="r" value="#8a8a8a" >Dark
  </div>

<h1 align="center">&#x1F916; Login Form &#x1F916;
  <div style="margin-right: 100%;">
    <a href="./Docs/RobotsAbout.pdf" target="_blank" title="About">About</a>
  </div>
<div class="container2">
  <!-- Sinup button -->
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button> 
</div>
</h1> 

<!-- Login form -->

<form action="LoginCheck.php" method="post" align='center'>
  
  <div class="imgcontainer">
    <img src="images/OIP.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="Rname"><b>Robot Name</b></label>
    <input type="text" placeholder="Enter Rname" name="Rname" required>

    <label for="Pswd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Pswd" required>
        
    <label for="TxtCaptcha"><b>Captcha : <?php $val1 = rand(1000,9999); echo $val1; ?>   </b></label>
    <input type="hidden" name="Captcha" value="<?php echo $val1; ?>">
    <input type="text" placeholder="Enter Captcha" name="TxtCaptcha" required>

    <br><br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <button type="submit" name="loginbtn">Login</button>

  </div>
  <!-- <span class="psw"><a </span> -->
    <span class="psw"><a href="pswd_reset_request.php">Forgot password?</a></span>
</form>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
 
  <!-- Sinup form -->
 
  <form action="RobotRegistration.php" class="modal-content" method="post" enctype="multipart/form-data">
    <div class="container1">
      <h1 align="center">&#x1F916; Sign Up &#x1F916;</h1>
          <div class="imgcontainer">
            <img src="images/Robots-Square.jpg" alt="Avatar" class="avatar">
          </div>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="Robotname"><b>Full Robot Name</b></label>
      <input type="text" placeholder="Enter Full Robot Name" name="Robotname" class="inputsignup" required>

      <label for="Robotmobno"><b>Robot No. (10 digit)</b></label>
      <input type="text" placeholder="Enter Mobile Number" name="Robotmobno" class="inputsignup" required>

      <label for="Robotemail"><b>Email &#9993;</b></label>
      <input type="email" placeholder="Enter Email" name="Robotemail" class="inputsignup" required>
 
      <br><br><br>
      <label for="RobotType"><b>Robot Type : </b></label>
          <select name="RobotType">
              <option selected>Other</option>
              <option>Humanoid Robot</option>
              <option>Dog Robot / Animal Robot</option>
              <option>Mobile Robot</option>
              <option>Industrial Robot</option>
              <option>Service Robot</option>
          </select>
      <br><br><br>

      <label for="Robot_OS"><b>Robot Operating System : </b></label>
          <select name="Robot_OS">
              <option selected>Other</option>
              <option>Python</option>
              <option>C++</option>
              <option>Matlab</option>
              <option>Java</option>
              <option>PHP</option>
              <option>Scilab</option>
              <option>C</option>
          </select>
      <br><br><br>

      <label for="Payload"><b>Payload (Capacity) (Kg)</b></label>
      <input type="text" placeholder="Enter Payload Capacity" name="Payload" class="inputsignup" required>

      <label for="DeggreesOfFreedom"><b>Degrees Of Freedom</b></label>
      <input type="number" placeholder="Enter Degrees of Freedom" name="DegreesOfFreedom" class="inputsignup" required>

      <br><br>
      <label for="BodyColor"><b>Body Color</b></label>
      <input type="color" name="BodyColor" value="#ffffff" class="inputsignup" required>
      <br><br><br>

      <label for="Speed"><b>Speed (Km/h)</b></label>
      <input type="text" placeholder="Enter Speed (km/h)" name="Speed" class="inputsignup" required>

      <label for="Rname"><b>Robot Unique Name</b></label>
      <input type="text" placeholder="Choose Unique Robot Name" name="Rname" class="inputsignup" required>

      <label for="Pswd"><b>Password &#128272;</b></label>
      <input type="password" placeholder="Enter Password" name="Pswd" id="Pswd" class="inputsignup" required>

      <br>
      <div>
        <img id="input" src="choose.png" height="500">
      </div>
      <label for="img"><b>Upload Image</b></label>
      <input type="file" name="img" id="img" class="inputsignup" accept="image/*" required>
      <br><br><br>
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px" class="inputsignup"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn1">Cancel</button>
        <button type="submit" class="signupbtn" name="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

const btns=document.getElementsByName("r");
        for (const btn of btns){
            btn.onclick = changeBg;
        }
        function changeBg(){
            document.body.style.background = this.value;
        }

        let input = document.getElementById('input');
        let img = document.getElementById('img');

        input.onchange = (e)=> {
          if(img.files[0])
          input.src = URL.createObjectURL(img.files[0]);
        };
</script>


</body>
</html>

