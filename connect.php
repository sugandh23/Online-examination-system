<?php
$connect=mysqli_connect('localhost','root','','register');

if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}

?>