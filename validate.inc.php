<?php
	$host = "localhost";
	$svc = "test";
	$pwd ="test";
	$data = "recipe";

$dbc = mysqli_connect("$host", "$svc", "$pwd", "$data") or die (mysqi_error());
	$userid = $_POST['userid'];
	$password = $_POST['password'];
	$query = "SELECT userid FROM users WHERE userid = '$userid' and password = PASSWORD('$password')";
	$result = mysqli_query($dbc, $query);

	if(mysqli_num_rows($result) == 0)
	{
		echo "<h2>Sorry, user account not validated</h2><hr>";
		echo "<a href='index.php?content=signin'>Try Again</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href='index.php'>Home</a>";
	}else{
		$_SESSION['valid_recipe_user'] = $userid;
		echo "<h2>Your user account has been validated, welcome back!</h2><hr>";
		echo "<a href='index.php'>Home</a>";
	}


?>