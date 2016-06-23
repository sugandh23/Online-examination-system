<?php
session_start();
session_destroy();
?>
<!docktype html>
<html>
<head>
  <title> Session Expired </title>
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
        <li><a href="signup.php">Sign UP</a></li>
      </ul>
    </div>
  </nav>
  <div>
    <h5 style="margin-left: 42%!important; margin-top: 15%;"class="flow-text">Your session is expired!!</h5>
    <h6 style="margin-left: 45%!important; "class="flow-text">Please <a class="blue-text text-darken-2" href="login.php" >login here</a></h6>
  </div>
</body>
</html>