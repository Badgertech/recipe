<?php 
include "login.inc.php";
$userid  = $_POST['userid'];
$password = $_POST['password'];

$query = "SELECT userid FROM users WHERE userid = '$userid' AND password = PASSWORD('$password')";
$result = mysqli_query($dbc, $query);
if(mysqli_num_rows($result) == 0)
{
	echo "<h2>Sorry, your user account was not validated</h2><hr>";
	echo "<a href='index.php?content=login>Try Again </a>&nbsp;&nbsp; | &nbsp;&nbsp;";
	echo "<a href='index.php'>Home</a>";
}else{
	$_SESSION['valid_recipe_user'] == $userid;
	echo "<h2>Welcome $userid, you can now post comments &amp; recipes</h2><hr>";
	echo "<a href='index.php'>Home</a>";
}



?>