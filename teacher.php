<?php
session_start();
include "connect.php" ;
if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
else{
  if($_SESSION['group1']!="teacher"){
    header("Location: student.php");
  }
}
$name= $_SESSION['username'];
?>
<?php
if(isset($_POST['action'])){
  include "connect.php";
  $ques=$_POST['question'];
  $option_A=$_POST['option_A'];
  $option_B=$_POST['option_B'];
  $option_C=$_POST['option_C'];
  $option_D=$_POST['option_D'];
  $ans=$_POST['answer'];
  $sub=$_POST['sub'];
  mysqli_query($connect," INSERT INTO questions(`question`,`option_A`,`option_B`,`option_C`,`option_D`,`answer`,`username`,`subject`)
    VALUES('$ques','$option_A','$option_B','$option_C','$option_D','$ans','$name','$sub')" );

}
?>
<!docktype html>
<html>
<head>
  <title> Teacher </title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script></head>
<body>
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="teacher.php">Your profile</a></li>
  <li><a href="activity.php">Activity</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<nav>
  <div class="navbar-fixed">
  <div class="nav-wrapper" style="color: #f3f4f5;">
    <a href="#!" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="index.php">Home</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Hi  <?php echo $_SESSION['username']; ?>
        <i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
  </div>
</nav>
<div class="row">
  <div class="input-field col s6">
    <div class="col s12 m12">
<ul class="collection with-header" style=" overflow-x: scroll;">
        <li class="collection-header"><h4>Added Questions</h4></li>
      <?php
      if(isset($_POST['action'])){
        if (empty($_SESSION['count'])) {
     $_SESSION['count'] = 1;
  }else {
     $_SESSION['count']++;
  }
$i=$_SESSION['count'];
$xyz=mysqli_query($connect,"SELECT *  from questions where username='$name' ORDER BY id DESC");
$x=1;
while($i--){
  $xxx=mysqli_fetch_array($xyz);
  $quess=$xxx['question'];
  $option_A=$xxx['option_A'];
  $option_B=$xxx['option_B'];
  $option_C=$xxx['option_C'];
  $option_D=$xxx['option_D'];
  $id=$xxx['id'];
        echo "<"."li "."class"."=".'"'."collection-item".'"'.">";
  echo "$x".".)"." $quess"."<br>";
  echo "a.)"." $option_A"."     b.)"." $option_B"."     c.)"." $option_C"."     d.)"." $option_D"."<br>";
    echo "<"."/"."li".">";
$x++;

      }
    }
      ?>
    </ul>
      </div>
    </div>
      <div class="input-field col s6">
    <h5>Add question</h5>
    <form action="teacher.php" method="post">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="question" required></textarea>
          <label for="textarea1">Question</label>
      </div>
      <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="option_A" required>
          <label for="first_name">Option A</label>
        </div>
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="option_B" required>
          <label for="first_name">Option B</label>
        </div>
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="option_C" required>
          <label for="first_name">Option C</label>
        </div>
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="option_D" required>
          <label for="first_name">Option D</label>
        </div>
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="answer" placeholder="A or B or C or D" required>
          <label for="first_name">Correct Option</label>
        </div>
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="sub" required>
          <label for="first_name">Subject</label>
        </div>
        <div class="row">
        <div class="input-field col s12">
        <button class="btn waves-effect waves-light" type="submit" value="submit" name="action">Submit
      </button>
    </div>
    </div>
    </form>
  </div>
  </div>
</body>
</html>
