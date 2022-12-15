<html><head><title>Paid Queue Remove</title><head><body><pre>
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
</style>
<div class = "cool">
<?php
	include('login.php');
	echo "<form action=\"http://students.cs.niu.edu/~z1816398/DJInterface.php\" method=\"POST\" \>";	
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//Removes Person from paid queue
	$rs = $pdo->prepare("DELETE FROM PaidQueuedIn WHERE userID = :personid AND versionID = :songid;");
		if(!$rs){echo"ERROR in Free Queue"; die();}
		$rs->execute(array(":personid"=> $_POST['paidperson'],":songid"=> $_POST['paidsong']));
	//refresh page after 2 sec and redirects back to DJInterface
	echo"<h2>Person have been removed!</h2>";
	echo"<b>PLEASE STAND BY as Payment is Processed.....</b>";
	echo "<meta http-equiv=\"refresh\" content=\"2; URL=http://students.cs.niu.edu/~z1816398/DJInterface.php\">";

?>
</div>
</pre></body></html>
