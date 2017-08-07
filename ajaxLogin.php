<?php
session_start();
include("db.php");

if(isset($_POST['username']) && isset($_POST['password']))
{
// username and password sent from Form
$username = $_POST['username'];
//Here converting passsword into MD5 encryption. 
$password=md5(mysqli_real_escape_string($conn,$_POST['password']));
// print_r($password); exit;
$qry = "SELECT id FROM login WHERE username='$username' and password='$password'";

$result=mysqli_query($conn, $qry);
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

// If result matched $username and $password, table row  must be 1 row
if($count == 1)
{
	$_SESSION['login_user'] = $row['id']; //Storing user session value.
	echo $row['id'];
}
}
?>