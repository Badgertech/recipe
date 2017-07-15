<?php
include "login.inc.php";
$recipeid = $_GET['id'];
if(!isset($_SESSION['valid_recipe_user']))
{
	echo "<h2>Sorry, you have to be logged in to post a comment</h2><hr>";
	echo "<a href='index.php?content=login'>Please Login to Post</a> &nbsp; &nbsp; | &nbsp;&nbsp;";
	echo "<a href='index.php'>Home<a>";
}else{
	$userid = $_SESSION['valid_recipe_user'];

echo "<form action='index.php' method='post'>";
echo "<h2>Enter your comment</h2><hr>";
echo "<textarea rows='10' cols='50' name='comment'></textarea><br>";
echo "<input type='hidden' name='poster' value='$userid'><br>";
echo "<input type='hidden' name='recipeid' value='$recipeid'>";
echo "<input type='hidden' name='content' value='addcomment'>";
echo "<br><input type='submit' value='Post Comment'>";
echo "</form>";

}

?>