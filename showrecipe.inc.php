<?php

include "login.inc.php";
$recipeid = $_GET['id'];
$query = "SELECT title, poster, shortdesc, ingredients, directions FROM recipes WHERE recipeid = $recipeid";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('Could not find recipe'.mysqli_error());
$title = $row['title'];
$poster = $row['poster'];
$shortdesc = $row['shortdesc'];
$ingredients = $row['ingredients'];
$directions = $row['directions'];

$ingredients = nl2br($ingredients);

$directions = nl2br($directions);

echo "<h2>$title </h2><hr>";
echo "<small>By: $poster</small><br>";
echo "<em>$shortdesc</em><br><br>";
echo "<h3>Ingredients:</h3>";
echo $ingredients."<br><br>";
echo "<h3>Directions</h3>";
echo $directions."<br><br>";

$query = "SELECT count(commentid) FROM comments where recipeid = $recipeid";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);




if($row[0] == 0)
{
	echo "No comments posted &nbsp; &nbsp; &nbsp;";
	echo "<a href='index.php?content=newcomment&id=$recipeid>Add a comment</a>";
	echo "&nbsp; &nbsp; &nbsp;<a href='print.php?id=$recipeid' target='blank'>Print Recipe</a>";
	echo "<hr>";
} else
{
	$totrecords = $row[0];
	echo "$totrecords comments &nbsp;&nbsp;";
	echo "<a href='index.php?content=newcomment&id=$recipeid'>Add a comment</a>";
	echo "&nbsp;&nbsp;<a href='print.php?id=$recipeid' target='blank' >Print Recipe</a>";
	echo "<hr><h3>Comments:</h3>";
	if(!isset($_GET['page']))
		$thispage = 1;
	else
		$thispage = $_GET['page'];
	$recordsperpage = 5;
	$offset = ($thispage -1) * $recordsperpage;
	$totpages = ceil($totrecords / $recordsperpage);
	$query = "SELECT date,poster, comment FROM comments where recipeid = $recipeid ORDER BY commentid DESC limit $offset,$recordsperpage";
	$result = mysqli_query($dbc, $query) or die ('Could not retrieve comments: ');
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$date = $row['date'];
			$poster = $row['poster'];
			$comment = $row['comment'];
			$comment = nl2br($comment);
			echo $date." - posted by: &nbsp;".$poster;
			echo "<br>";
			echo $comment;
			echo "<br><br>";
		}
		if($thispage >1 )
		{
			$page = $thispage -1;
			$prevpage = "<a href='index.php?content=showrecipe&id=$recipeid&page=$page'>Prev</a>";
		} else
		{
			$prevpage = "";
		}
		$bar = '';
		if($totpages >1)
		{
			for($page =1; $page <= $totpages; $page++)
			{
				if($page == $thispage)
				{
					$bar .=" &nbsp; $page &nbsp;";
				}else{
					$bar .="&nbsp;<a href='index.php?content=showrecipe&id=$recipeid&page=$page'>$page</a>&nbsp;";
				}
			} 
		}
		if ($thispage < $totpages)
		{
			$page = $thispage +1;
			$nextpage = "&nbsp;<a href='index.php?content=showrecipe&id=$recipeid&page=$page'>Next</a>&nbsp;";
		} else
		{
			$nextpage = "&nbsp;";
		}
		echo "<span align='center'>GoTo: &nbsp;".$prevpage."&nbsp;&nbsp;<span style='font-weight:bold; color:#cc0000'>".$bar."</span>&nbsp;&nbsp;".$nextpage."</span>";
}







?>