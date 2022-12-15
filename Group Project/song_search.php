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
<div class=cool>
<?php

//including files that contain login information 
//and a function to make tables from result sets
include("library.php");
include("login.php");

//try catch block that sets up database connection
try {
	//setting up connection
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//getting song title that the user entered from the form
	$song_title = $_POST['song_title'];

	echo "<h3>Showing results for: $song_title</h3>";
	//sorting columns
	echo "<form method='POST'>";
	echo "<input type=radio name='sort' value='versionName'>Sort by version";
	echo "<input type=radio name='sort' value='contribution'>Sort by contribution";
	echo "<input type='hidden' name='song_title' value='$song_title'>";
	echo "<input type=submit class='button' name='Show' value='Re-sort'>";
	echo "</form>";

	if(isset($_POST['Show'])) {
		if(isset($_POST['sort'])) {
			$sortBy = $_POST['sort'];
		}
		$sql = "SELECT DISTINCT title, versionName, versionID FROM Song, KaraokeVersion, Artist, WorkedOn WHERE title='$song_title' AND Song.songID=KaraokeVersion.songID AND WorkedOn.artistID=Artist.artistID AND WorkedOn.songID=Song.songID ORDER BY " .$sortBy; //orders by the proper column

	}
	else {//primary query to get the song that the user entered from the database
		$sql = "SELECT DISTINCT title, versionName, versionID FROM Song, KaraokeVersion, Artist, WorkedOn WHERE title='$song_title' AND Song.songID=KaraokeVersion.songID AND WorkedOn.artistID=Artist.artistID AND WorkedOn.songID=Song.songID";
	}

	$rs = $pdo->prepare($sql);
	$rs->execute();
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	if($rows==NULL) { //checking if the return set is empty 
		echo "That song is not in the karaoke system";
		echo "<a href='search_homepage.php'><p>Click here to go back to search page</p></a>";
	}
	else {//if return set is not empty, then print the table
		//secondary query to get artist names (so that they print off in one box of the table)
		$rs2 = $pdo->prepare("SELECT DISTINCT artistName FROM Artist, Song, WorkedOn WHERE title='$song_title' AND WorkedOn.songID=Song.songID AND WorkedOn.artistID=Artist.artistID;");
		$rs2->execute();
		$rows2 = $rs2->fetchAll(PDO::FETCH_ASSOC);//getting all rows for this second return set

		//creating the table
		echo "<table border = 1 cell spacing = 1>";
		echo "<tr>";
		//makes headers for columns
		echo "<th>-Title-</th>";
		echo "<th>-Karaoke Version-</th>";
		echo "<th>-Version ID-</th>";
		echo "<th>-Contributors-</th>";
		echo "<th>-Select Song-</th>";
		echo "</tr>";
		//loop fills table data
		foreach($rows as $row) {
			echo "<tr>";
			foreach($row as $key => $item) {
				echo "<td>$item</td>";//table data 
			}
			echo "<td>";
			foreach($rows2 as $row2) {//filling rows for both queries 
				foreach($row2 as $key2 => $item2) {
					echo "$item2";
					echo "<br>";
				}
			}
			echo "</td>";
			echo "<td>";
			//form to submit song to queue
			echo "<form action='user_to_queue_submit.php' method='POST'>";
			echo "<input type=radio name='submission' value='$item'/>";//allows user to select the song they want to add to the queue. sends VersionID to the next page
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<input type=submit class='button' value='Select song'/>";
		echo "</form>";
		
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
</div></html>
