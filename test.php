<!doctype html>
<html>
<head>
<title>This is a dynamic page</title>
<style>
body{
	width:100%;
	margin:0px;
	background-color:#444;
	background-image:url(../images/CarbonFiber.jpg);
	background-repeat:repeat-x;
}
#wrapper{
	background-color:white;
	max-width: 900px;
    margin: auto;
    border:1px solid #444;
    border-radius:5px;
    box-shadow:3px 5px 4px 5px #223850;
}
#test{
	padding-left:10px;
}

</style>
</head>
<body>
<div id="wrapper">

<h2>Test Page</h2>
<input type="submit" value="submit">
<div style="max-width:75% margin:auto; border:1px solid #444; background-color:white">
<?php 
include "login.inc.php";
$date = date("Y-m-d");

$title = "title goes here";
$article = "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>";
$query= "INSERT INTO news (date, title, article) VALUES ($date, $title, $article)";
$result = mysqli_query($dbc, $query);
echo "$result";




?>




</div>

</div>
</body>
</html>