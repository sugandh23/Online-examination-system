<?php
ob_start();
session_start();
include "connect.php";
?>
<!docktype html>
<html>
<head>
  <title> Login </title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script></head>
<body>
<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">HOME</a></li>
        <li><a href="signup.php">Sign UP</a></li>
      </ul>
    </div>
  </nav>
  <h5 style="margin-left: 47%!important; margin-top: 2%;"class="flow-text">SIGN IN</h5>
  </div>
  <?php 
  if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])){
  	$username=$_POST['username'];
  	$password=$_POST['password'];
    $who=$_POST['group1'];
  	$query= mysqli_query($connect,"SELECT * FROM student where username= '$username' and password='$password' ");
  	$xx = mysqli_fetch_array($query);
  	$user = $xx['username'];
  	$pass=$xx['password'];
    $whodb=$xx['type'];
  	if($username==$user && $password==$pass && $who==$whodb){
  		$_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $username;
        $_SESSION['group1'] = $whodb;
          header("Location:$who.php");
  	}
  	else{
      if($who!=$whodb){
        echo "<script>alert('checked wrond radio button!')</script>";
      }
      else{
  		echo "<script>alert('username or password is incorrect!')</script>";
    }
  	}
  }
  ?>
    <div class="row" style="width: 50%!important; margin-top: 2%;">
    <form class="col s12" action="login.php" method="post">
      <div class="row" >
        <div class="input-field col s6">
        <input class="with-gap" name="group1" type="radio" id="test1" value="teacher" required/>
        <label for="test1">Teacher</label>
      </div>
      <div class="input-field col s6">
      <input class="with-gap" name="group1" type="radio" id="test2" value="student"/>
      <label for="test2">Student</label>
    </div>
    </div>
    <br>
    <div class="row" >
      <div class="input-field col s12">
          <input id="username" type="text" class="validate" name="username" required>
          <label for="username">User Name</label>
        </div>
      </div>
      <br />
      <br>
      <div class="row">
        <div class="input-field col s12">
           <input id="password" type="password" class="validate" name="password" required>
          <label for="password">Password</label>
        </div>
    </div>
    <br>
    <button style=" margin-left: 44% !important;" class="btn waves-effect waves-light" type="submit" name="login">Login
  	</button>
    </form>
    <p style="margin-left: 2%!important;"class="flow-text">Doesn't have account? <a href="signup.php" class="blue-text text-darken-2">click here</a></p>
    </div>
  </body>
  </html>
