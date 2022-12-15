<html><head><title>DJ Interface</title>
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
</head><body><pre>
<h1><center><u>Welcome to the DJ Interface!</u></center></h1>
<div class = "cool">
<?php
//above is the CSS code to formate the page
//include files
include('library.php');
include('login.php');

try{
	//access mariadb
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//Create form THIS WILL NEED TO BE CHANGED
	echo "<form action=\"DJInterface.php\" method=\"POST\" \>";
	//Removes top person in free queue
	function freedeleteperson()
	{
		//gobal pdo
		global $pdo;
		//also need to reconnect to mariadb
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
		//Creates prepare statement to delete user from free queue
		$rs = $pdo->prepare("DELETE FROM FreeQueuedIn WHERE userID = :personid AND versionID = :songid;");
		if(!$rs){echo"ERROR in Free Queue"; die();}
		//execute the query
		$rs->execute(array(":personid"=> $_POST['freeperson'],":songid"=> $_POST['freesong']));
		//refresh the page after 2 seconds
		echo "<meta http-equiv=\"refresh\" content=\"2\">";

	}

	echo"\n <h2>Free Queue</h2>\n";
	//runs query to get the free queue
	$rs = $pdo->query("SELECT DISTINCT userName,KaraokeVersion.versionID,title,artistName,FreeQueuedIn.dateTime FROM User, KaraokeVersion, FreeQueuedIn,Artist,WorkedOn,Song WHERE FreeQueuedIn.userID = User.userID AND FreeQueuedIn.versionID = KaraokeVersion.versionID AND WorkedOn.songID = Song.songID AND Artist.artistID = WorkedOn.artistID AND WorkedOn.contribution = \"Performer\" AND KaraokeVersion.songID = Song.songID ORDER BY FreeQueuedIn.dateTime;");
	if(!$rs){echo"ERROR in Free Queue"; die();}
	$row = $rs->fetchALL(PDO::FETCH_ASSOC);
	//creates table for free queue
	echo " <table border=2 collspacing=1><tr><th> -USER- </th><th>-Version ID-</th><th>-Song-</th><th>-Artist-</th><th>-Date/Time-</th></tr>";
	create_table($row);
	echo "</table>";
	//used to display the next person from the free queue
	$rs = $pdo->query("SELECT userName FROM FreeQueuedIn, User WHERE User.userID = FreeQueuedIn.userID ORDER BY FreeQueuedIn.dateTime;");
	$row = $rs->fetch(PDO::FETCH_ASSOC);
	//if the free queue then move to paid queue
	if($row == NULL)
	{
		echo "<h3><b>Free Queue is empty!</b></h3>";
		
	}
	else
	{
		//turns array into string
		$name=implode($row);
		//display next person
		echo "<h3>The next person up in the free queue is $name!</h3>";
		//run query to get top free persons id
		$rs = $pdo->query("SELECT FreeQueuedIn.userID FROM FreeQueuedIn, User WHERE User.userID = FreeQueuedIn.userID ORDER BY FreeQueuedIn.dateTime;");
		$row = $rs->fetch(PDO::FETCH_ASSOC);
		$id=implode($row);
		$rs = $pdo->query("SELECT FreeQueuedIn.versionID FROM FreeQueuedIn, KaraokeVersion WHERE KaraokeVersion.versionID = FreeQueuedIn.versionID ORDER BY FreeQueuedIn.dateTime;");
		$row = $rs->fetch(PDO::FETCH_ASSOC);
		$idsong=implode($row);
		//Button so the DJ can delete the next person when they are done
		echo "<input type=\"submit\" class=button name=freesubmit id=freesubmit value=\"Remove $name\" />";
		//passes the id of the user to delete
		echo "<input type=\"hidden\" name=freeperson value=$id />";
		//Passes the song id to pervent removing the wrong postion
		echo "<input type=\"hidden\" name=freesong value=$idsong />";
	
		//when the removed button is pushed
		if(isset($_POST['freesubmit'])){
			echo "\nRemoving $name from the queue!";
			freedeleteperson();
		}
	}
	//always the Dj to sort by time OR amount paid
	echo "\n\n<h3>Sort paid queue</h3>";
	echo "<input type = radio name=\"sort\" value=\"PaidQueuedIn.dateTime\"/><b>Time</b>";
	echo "<input type = radio name=\"sort\" value=\"PaidQueuedIn.amountPaid DESC\" checked/><b>Paid</b>";
	echo "\n<input type = submit class=button name=Show value=Sort />"; 
	echo "</form>";
	echo"\n <h2>Paid Queue</h2>\n";
	if(isset($_POST['Show'])){
		//if user is sorting by amount
		if(isset($_POST['sort']) && $_POST['sort'] == "PaidQueuedIn.amountPaid DESC")
		{
			$temp = $_POST['sort'];
			echo "<b>Sorted by paid amount</b>";

		}
		//user sort by Time
		else
		{
			$temp = $_POST['sort'];	
			echo "<b>Sorted by time</b>";
		}
		//runs query to get the paid queue
		$rs = $pdo->query("SELECT DISTINCT userName,KaraokeVersion.versionID,title,artistName,PaidQueuedIn.dateTime,CONCAT('$',amountPaid) FROM User, KaraokeVersion, PaidQueuedIn,Artist,WorkedOn,Song WHERE PaidQueuedIn.userID = User.userID AND PaidQueuedIn.versionID = KaraokeVersion.versionID AND WorkedOn.songID = Song.songID AND Artist.artistID = WorkedOn.artistID AND WorkedOn.contribution = \"Performer\" AND KaraokeVersion.songID = Song.songID ORDER BY $temp");
		if(!$rs){echo"ERROR in Paid Queue"; die();}
		$row = $rs->fetchALL(PDO::FETCH_ASSOC);
		//creates table for paid queue
		echo " <table border=2 collspacing=1><tr><th> -USER- </th><th>-Version ID-</th><th>-Song-</th><th>-Artist-</th><th>-Date/Time-</th><th>-Paid Amount-</th></tr>";
		create_table($row);
		echo"</table>";
		//displays the next person in the paid queue
		$rs = $pdo->query("SELECT userName FROM PaidQueuedIn, User WHERE User.userID = PaidQueuedIn.userID ORDER BY $temp;");
		$row = $rs->fetch(PDO::FETCH_ASSOC);
		//if paid queue is empty kill code
		if($row == NULL)
		{
			echo "<h3><b>Paid Queue is empty!</b></h3>";
		}
		else
		{
			$name=implode($row);
			echo "<h3>The next person up in the paid queue is $name!</h3>";
			//Gets the ID of this paid person
			$rs = $pdo->query("SELECT PaidQueuedIn.userID FROM PaidQueuedIn, User WHERE User.userID = PaidQueuedIn.userID ORDER BY $temp;");
			$row = $rs->fetch(PDO::FETCH_ASSOC);
			$id=implode($row);
			$rs = $pdo->query("SELECT PaidQueuedIn.versionID FROM PaidQueuedIn, KaraokeVersion WHERE KaraokeVersion.versionID = PaidQueuedIn.versionID ORDER BY $temp;");
			$row = $rs->fetch(PDO::FETCH_ASSOC);
			$idsong=implode($row);
			//Redirects to page to remove people from paid queue
			echo "<form action=\"DJPaidQueueRemove.php\" method=\"POST\" \>";
			//button to delete the paid person from queue when they finish
			echo "<input type=\"submit\" class=button  name=paidsubmit id=paidsubmit value=\"Remove $name\" />";
			echo "<input type=\"hidden\" name=paidperson value=$id />";
			echo "<input type=\"hidden\" name=paidsong value=$idsong />";
			echo "</form>";

		}

	}	
}
catch(PDOexception $e)
{
	echo "Connection to database failed: ". $e->getMessage();
}
?>

<form action="landing_page.php"><input type=submit class=button name=return value="Main Menu"></form> </div>
</pre></body></html>
