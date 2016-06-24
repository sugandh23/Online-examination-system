<?php
session_start();
include "connect.php";
$user=$_SESSION['username'];
$query=mysqli_query($connect,"SELECT * FROM result where username='$user'");
$i=mysqli_num_rows($query);

$xyz=mysqli_fetch_array($query);
$percent=$xyz['percentage'];
$sub=$xyz['subject'];
$total=$xyz['total_marks'];
$obtain=$xyz['marks_obtained'];
$result=$xyz['result'];

?>
<!docktype html>
<html>
<head>
  <title> student </title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</head>
<body>
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="student.php">Your profile</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="navbar-fixed">
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="index.php">Home</a></li>
      <li><a href="subject.php">Give quiz</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Hi  <?php echo $_SESSION['username']; ?>
        <i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
</div>
<table class="striped">
        <thead>
          <tr>
              <th data-field="subject">Subject</th>
              <th data-field="subject">Marks Obtained</th>
              <th data-field="subject">Total Marks</th>
              <th data-field="subject">Percentage</th>
              <th data-field="subject">Result</th>
          </tr>
        </thead>

        <tbody>
        	<?php
        	while($i--){
         echo '<tr>
            <td>'."$sub".'</td>
            <td>'."$obtain".'</td>
            <td>'."$total".'</td>
            <td>'."$percent".'</td>
            <td>'."$result".'</td>
          </tr>';
      	}
      	?>
        </tbody>
      </table>
</body>
</html>