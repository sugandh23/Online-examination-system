<?php
session_start();
include "connect.php";
if(!$_SESSION['username'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
else{
  if($_SESSION['group1']!="student"){
    header("Location: teacher.php");
  }
}

?>
<?php
    if(isset($_POST['submit'])){
              $sub=$_POST['user'];
              $_SESSION['sub']=$sub;
              $_SESSION['ref']=1;
              $_SESSION['aa']=$sub;
              $xyz=mysqli_query($connect,"SELECT *  from questions where subject='$sub' ORDER BY id DESC");
              $i=mysqli_num_rows($xyz);
              $_SESSION['i']=$i;
              $_SESSION['r']=1;
                $xxx=mysqli_fetch_array($xyz);
                $id=$xxx['id'];
                $_SESSION['id']=$id;
                $ans=$xxx['answer'];
                $_SESSION['ans']=$ans;
                $ques=$xxx['question'];
                $option_A=$xxx['option_A'];
                $option_B=$xxx['option_B'];
                $option_C=$xxx['option_C'];
                $option_D=$xxx['option_D'];

              }

?>
<?php
if(isset($_POST['finish'])){
  $_SESSION['finish']=$_POST['finish'];
  if(isset($_POST['group1'])){
    $userans=$_POST['group1'];
  }
  else{
    $userans="e";
  }
    $ans=$_SESSION['ans'];
    $username=$_SESSION['username'];
    $sub=$_SESSION['sub'];
    $iddd=$_SESSION['count'];
    mysqli_query($connect,"INSERT INTO quiz VALUES('$userans','$ans','$username','$sub','$iddd')");
  header("Location:result.php");
}
else{
  if(isset($_POST['next'])){
    $i=$_SESSION['i'];
    if(isset($_POST['group1'])){
    $userans=$_POST['group1'];
  }
  else{
    $userans="e";
  }
    $ans=$_SESSION['ans'];
    $username=$_SESSION['username'];
    $sub=$_SESSION['sub'];
    $iddd=$_SESSION['count'];
    mysqli_query($connect,"INSERT INTO quiz VALUES('$userans','$ans','$username','$sub','$iddd')");
    $sub=$_SESSION['aa'];
    $idd=$_SESSION['id'];
    $idd--;
    $_SESSION['id']=$idd;
    $xyz=mysqli_query($connect,"SELECT *  from questions where subject='$sub' AND id<='$idd' ORDER BY id DESC");
    $xxx=mysqli_fetch_array($xyz);
    $ques=$xxx['question'];
    $id=$xxx['id'];
    $option_A=$xxx['option_A'];
    $option_B=$xxx['option_B'];
    $option_C=$xxx['option_C'];
    $option_D=$xxx['option_D'];
    $_SESSION['ans']=$xxx['answer'];
  }
}
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
  <li><a href="session_expired.php">Your profile</a></li>
  <li><a href="session_expired.php">Achievement</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="navbar-fixed">
<nav>
  <div class="nav-wrapper">
    <a href="session_expired.php" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="session_expired.php">Home</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Hi  <?php echo $_SESSION['username']; ?>
        <i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
</div>
<div class="row" style="font-family: GillSans, Calibri, Trebuchet, sans-serif;">
  <div class="input-field col s6" style="padding-left: 5%!important;">
    <h5>Jump direct to another question</h5><br>
    <ul class="pagination">
   <?php
   /*if(isset($_POST['submit'])){
    $m=$_SESSION['i'];
    $h=1;
    $z=5;
    while($m--){
        echo '<li class="active" style="margin-left: 10px!important;"><a href="#!">2</a></li>';
      if($h % $z === 0){
        echo "<br>"."<br>";
      }
      $h++;
    }
  }*/
    ?>
  </ul>
</div>

<form action="quiz.php" method="post">
<div class="input-field col s6">
  <div class="input-field col s12" >
    <h5> Question No. <?php if (empty($_SESSION['count'])) {
     $_SESSION['count'] = 1;
  }else {
    if(isset($_POST['next'])){
      $_SESSION['count']++;
   }
  }
  echo $_SESSION['count']; ?></h5>
  </div>
  <div class="input-field col s12" >
     <?php echo '<p>'.$_SESSION['count'].".) $ques".'</p>';  ?>
  </div>
  <br>
  <div class="input-field col s12">
    <input class="with-gap" name="group1" type="radio" id="test1" value="A" />
    <label for="test1"><?php echo "$option_A"; ?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="group1" type="radio" id="test2" value="B"/>
    <label for="test2"><?php echo "$option_B";?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="group1" type="radio" id="test3" value="C"/>
    <label for="test3" ><?php echo "$option_C";?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="group1" type="radio" id="test4" value="D"/>
    <label for="test4"><?php echo "$option_D" ?></label>
  </div>
  <div class="input-field col s12">
    <br>
  </div>
  <div class="row">
    <div class="input-field col s6">
    <button class="btn waves-effect waves-light" type="submit" value="submit" name="finish" >Finish Test
    </button>
  </div>
  <div class="input-field col s6">
    <?php 
     if($i==$_SESSION['r']){
      echo '<a class="btn disabled" >Next question
    <i class="material-icons right">send</i></a>';
    } 
    else{
    $_SESSION['r']++;
    echo '<button name="next"'." ".'type="submit"'." ".'class="btn waves-effect waves-light" >Next question
    <i class="material-icons right">send</i>
  </button>';
  }
    ?>
  <div>
  </div>
</div>
</div>
              
</form>
</body>
</html>

