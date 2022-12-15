<html><head><title>SONG/ARTIST SEARCH</title></head>
<style>

body{
		background:#7bd19c;
		font-family: serif;
	}
	.cool{
		clear:both;
		border: 5px solid black;
		background: #f5f4d7;
		padding: 20px;
		max-width: 1060px;
		margin: 2px auto;
		overflow: auto;
	}
	.button {
		background-color: #7bd19c;
  		border: 2px solid black;
 		color: black;
		padding: 5px 14px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 14px;
	  	margin: 4px 2px;
 		cursor: pointer;
	}
</style>
<div class = "cool">
<table border=1 cell spacing=1>
<tr>
<th>-Title-</th>
<th>-Karaoke Version-</th>
<th>-Artist-</th>
<th>-Contribution-</th>
<th>-Version ID-</th>
<th>-Select Song-</th>
</tr>
<?php

//including files that contain login information 
//and a function to make tables from result sets
include("library.php");
include("login.php");
//try catch block that sets up database connection
try {
	//set up db connection
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//getting value from user input from form
	$artist_name = $_POST['artist_name'];
	echo "<h3>Showing songs by: $artist_name</h3>";
	
	//sorting columns
	echo "<form method='POST'>";
	echo "<input type=radio name='sort' value='title'>Sort by title";
	echo "<input type=radio name='sort' value='versionName'>Sort by version";
	echo "<input type=radio name='sort' value='contribution'>Sort by contribution";
	echo "<input type='hidden' name='artist_name' value='$artist_name'>";
	echo "<input type=submit name='Show' class='button'  value='Re-sort'>";
	echo "</form>";

	if(isset($_POST['Show'])) {
		if(isset($_POST['sort'])) {
			$sortBy = $_POST['sort'];
		}
		$sql = "SELECT title, versionName, artistName, contribution, versionID FROM Song, KaraokeVersion, Artist, WorkedOn WHERE artistName='$artist_name' AND WorkedOn.songID=Song.songID AND Artist.artistID=WorkedOn.artistID AND Song.songID=KaraokeVersion.songID ORDER BY ".$sortBy; //sorts by the proper value
	}
	else {
		$sql = "SELECT title, versionName, artistName, contribution, versionID FROM Song, KaraokeVersion, Artist, WorkedOn WHERE artistName='$artist_name' AND WorkedOn.songID=Song.songID AND Artist.artistID=WorkedOn.artistID AND Song.songID=KaraokeVersion.songID";
	}
	//running the sql statement using prepare and execute
	$rs = $pdo->prepare($sql);
	$rs->execute();
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);

	if($rows==NULL) {
		echo "That artist is not in the karaoke system";
		echo "<a href='search_homepage.php'><p>Click here to go back to the search page</p></a>";
	}
	else {
		//loop makes table data
		foreach($rows as $row) {
			echo "<tr>";
			foreach($row as $key => $item) {
				echo "<td>$item</td>";//table data 
			}
			echo "<td>";
			echo "<form action='user_to_queue_submit.php' method='POST'>";
			echo "<input type=radio name='submission' value='$item'/>";//sends value of versionID to the next page to be added to the queue 
			echo "</td>";
			echo "</tr>";
		}	
		echo "</table>";//end table
		//submit song selection button
		echo "<input type=submit class = 'button' value='Submit song to queue'/>";
		echo "</form>";//end form
		
		//link back to search page
		echo "<form action='search_homepage.php'><input type=submit class=button name=return value='Search again'></form>";

		//link to main page
		echo "<form action='landing_page.php'><input type=submit class=button name=return value='Main Menu'></form>";

	}
}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}
?>
</div>
</html>
