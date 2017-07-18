<?php
include "login.inc.php";
error_reporting(0);

if(!$dbc){
	echo "<h2>Unable to connect</h2><hr>";
	echo "<a href='index.php?content=register'>Try Again</a>";
}else{
$userid = $_POST['userid'];
$firstn = $_POST['firstn'];
$lastn = $_POST['lastn'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$baduser = 0;



//check if userid was entered.
if(trim($userid) == '')
{
	echo "<h2>Sorry, you must enter a username.</h2><hr>";
	echo "<a href='index.php?content=register'>Try Again</a>  &nbsp;&nbsp; | &nbsp; &nbsp;";
	echo "<a href='index.php'>Home</a>";
	$baduser = 1;
}

//check if password was entered
if(trim($password) == '')
{
	echo "<h2>Sorry, you must enter a password.</h2><hr>";
	echo "<a href='index.php?content=register'>Try Again</a>  &nbsp;&nbsp; | &nbsp; &nbsp;";
	echo "<a href='index.php'>Home</a>";
	$baduser = 1;
}
//check if password and password2 matches
if($password != $password2)
{
	echo "<h2>Sorry, the passwords do not match</h2>";
		echo "<a href='index.php?content=register'>Try Again</a> &nbsp;&nbsp;|&nbsp;&nbsp;";
	echo "<a href='index.php'>Home</a>";
	$baduser = 1;

}

//check if user id is already in db

$query = "SELECT userid FROM users WHERE userid = '$userid'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


if ($row['userid'] == $userid)
{
	echo "<h2>Sorry, that user name is taken.</h2><hr>";
		echo "<a href='index.php?content=register'>Try Again</a> &nbsp;&nbsp;|&nbsp;&nbsp;";
	echo "<a href='index.php'>Home</a>";
	$baduser = 1;

}

if($baduser != 1)
{
	//enter user info in database
	$query  = "INSERT INTO users VALUES ('$userid', PASSWORD('$password'), '$firstn', '$lastn', '$email')";
	$result = mysqli_query($dbc, $query) or die ('Sorry, unable to process your request');
	if($result){
		$_SESSION['valid_recipe_user'] = $userid;
		echo "<h2>Your registration request has been approved and you are now logged in!</h2><hr>";
		echo "<a href='index.php'>Home</a>";
	
	}else{
		echo "<h2>Sorry, their was a problem with your request</h2><hr>";
			echo "<a href='index.php?content=register'>Try Again</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
	echo "<a href='index.php'>Home</a>";

	}
}
}
?>
