<?php
session_start();
	include "connect.php";
  $_SESSION['count']=0;
  $username=$_SESSION['username'];
  $sub=$_SESSION['sub'];
  $total=mysqli_query($connect,"SELECT * FROM quiz where username='$username' AND subject='$sub'");
  $quesno=mysqli_num_rows($total);
	$query=mysqli_query($connect,"SELECT * FROM quiz where username='$username' AND subject='$sub' AND userans=ans");
  $correct_ans=mysqli_num_rows($query);
  $qu=mysqli_query($connect,"SELECT * FROM quiz where username='$username' AND subject='$sub' AND userans='e'");
  $not_attempted=mysqli_num_rows($qu);
  $attempt=$quesno-$not_attempted;
  $wrong_ans=$quesno-$correct_ans-$not_attempted;
  $user=$_SESSION['username'];
  $percent=($correct_ans/$quesno)*100;
  
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
  <li><a href="acheivement.php">Acheivemnet</a></li>
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
<div style="width: 60%; margin-left: 20%; margin-top: 5%; ">
<table class="striped">
        <thead>
          <tr>
              <th data-field="subject" style="padding-left: 45%; background-color: #64b5f6;"><?php echo $_SESSION['username']; ?></th>
              <th data-field="subject" style="padding-left: 45%; background-color: #64b5f6;"></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><b>Subject</b></td>
            <td><?php echo $_SESSION['sub']; ?></td>
          </tr>
          <tr>
            <td>Marks Obtained</td>
            <td><?php echo $correct_ans; ?></td>
          </tr>
          <tr>
            <td>Total Marks</td>
            <td><?php echo $quesno ; ?></td>
          </tr>
          <tr>
            <td>Attempted Questions</td>
            <td><?php echo $attempt ; ?></td>
          </tr>
          <tr>
            <td>Total Questions</td>
            <td><?php echo $quesno ; ?></td>
          </tr>
          <tr>
            <td>Percentage</td>
            <td><?php echo $percent."%" ; ?></td>
          </tr>
          <tr>
            <td>Result</td>
            <td><?php 
            if($percent<40){
              echo "FAIL";
              $result="FAIL";
            }
            else{
              if($percent>90){
                echo "EXCELLENT";
                $result="EXCELLENT";
              }
              else{
                if($percent>80){
                  echo "VERY GOOD";
                  $result="VERY GOOD";
                }
                else{
                  if($percent>70){
                    echo "GOOD";
                    $result="GOOD";
                  }
                  else{
                    if($percent>60){
                      echo "AVERAGE";
                      $result="AVERAGE";
                    }
                    else{
                      if($percent>40){
                        echo "BELOW AVERAGE";
                        $result="BELOW AVERAGE";
                      }
                    }
                  }
                }
              }
            }
            ?>
              </td>
          </tr>
        </tbody>
      </table>
    </div>
</body>
</html>
<?php
if(isset($_SESSION['finish'])){
  mysqli_query($connect,"INSERT INTO result VALUES('$percent','$user','$sub','$quesno','$correct_ans','$result')");
}
?>