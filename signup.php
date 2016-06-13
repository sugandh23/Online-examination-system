<!docktype html>
<html>
<head>
  <title> Sign UP </title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script></head>
<body>
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.html">HOME</a></li>
        <li><a href="index.html">About US</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>
  <div>
    <h5 style="margin-left: 47%!important; margin-top: 2%;"class="flow-text">SIGN UP</h5>
  </div>
  
    <div class="row" style="width: 50%!important; margin-top: 2%;">
    <form class="col s12" action="signup.php" onsubmit="return myFunction()" method="post">
    
      <div class="row">
        <div class="input-field col s6">
        <input class="with-gap" name="group1" type="radio" id="test1" value="teacher" required/>
        <label for="test1">Teacher</label>
      </div>
      <div class="input-field col s6">
      <input class="with-gap" name="group1" type="radio" id="test2" value="student"/>
      <label for="test2">Student</label>
    </div>
    </div>
      <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="name" required>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate"  name="l_name" required>
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s12">
          <input id="username" type="text" class="validate" name="username" required>
          <label for="username">User Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
           <input id="password" type="password" class="validate" autocomplete="off" id="password" name="password" required>
          <label for="password">Password</label>
        </div>
        <div class="input-field col s6">
    		<input id="password" type="password" class="validate" autocomplete="off" id="rpassword" name="rpassword" required>
          	<label for="password">Repeat Password</label>
        </div>
      </div>
      <script >
      function myFunction() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        alert("Passwords Match!!!");
    }
    return ok;
}
</script>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name="email" required>
          <label for="email">Email</label>
        </div>
      </div>
     <button style=" margin-left: 44% !important;" class="btn waves-effect waves-light" type="submit" value="submit" name="action">Submit
  	</button>
    </form>
    <p style="margin-left: 2%!important;"class="flow-text">Already have account? <a href="login.php" class="blue-text text-darken-2">click here</a></p>
    </div>
  </body>
  </html>
<?php
session_start();
include "connect.php" ;
if(isset($_POST['action'])){
$type=$_POST['group1'];
$name=$_POST['name'];
$lname=$_POST['l_name'];
$user=$_POST['username'];
$password=$_POST['password'];
$rpassword=$_POST['rpassword'];
$email=$_POST['email'];
$query = mysqli_query($connect,"SELECT username from student where username='$user'");
if(mysqli_num_rows($query)!=0){
  echo "<script>alert('username already exit!')</script>";
}
else{
if($password!=$rpassword){
  echo "<script>alert('password does not matched!')</script>";
}
else{ 
mysqli_query($connect," INSERT INTO student VALUES('$type','$name','$lname','$user','$password','$email')");
header("Location:login.php");
}
}
}
?>