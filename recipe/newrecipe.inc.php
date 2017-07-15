<?php
if(!isset($_SESSION['valid_recipe_user'])){
	echo "<h2>Sorry, you have to be logged in to post</h2><hr>";
	echo "<a href='index.php?content=signin'>Please login to post</a>";
}else{

$userid = $_SESSION['valid_recipe_user'];

echo "<form action='index.php' method='post' >";
echo "<h2>Enter your recipe</h2><hr>";
echo "<label>Title:</label><br>";
echo "<input type='text' name='title' size='40'><br>";
echo "<label>Short Description:</label><br>";
echo "<textarea rows='5' cols='50' name='shortdesc'></textarea><br>";
echo "<label><h3>Ingredients <small>(one item per line)</small></h3><label><br>";
echo "<textarea rows='5' cols='50' name='ingredients'></textarea><br>";
echo "<label><h3>Directions:</label><br>";
echo "<textarea rows='5' cols='50' name='directions'></textarea><br>";
echo "<input type='submit' value='Submit'>";
echo "<input type='hidden' name='poster' value='$userid'>";
echo "<input type='hidden' name='content' value='addrecipe'>";
echo "</form>";
}
?>