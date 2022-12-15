<html><head><title>SUBMITTING TO QUEUE</title></head>
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

<body>
<div class = "cool">
<?php
	
//include login
include("login.php");

try {
	//connect to db
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//get vars from submissions
	$submission = $_POST['submission'];
	$isUser = $_POST['isUser'];
	$amtPay = $_POST['amtPay'];

	//process "isUser"
	if($isUser == "new"){ 
		//user is new, insert new User
		$n = $pdo->prepare("INSERT INTO User (userName, timesSung) VALUES (:user, '1');");
		$n->execute(array(":user"=> $_POST['user']));	

		//get user ID of new user, save as userNUM
		$rs = $pdo->prepare("SELECT userID FROM User WHERE userName = :name;");
		$rs->execute(array(':name'=>$_POST['user']));
		$row = $rs->fetch(PDO::FETCH_BOTH);
		$userNUM = $row[0];


	}
	else {
		//get userID, save as userNUM	
		$rs2 = $pdo->prepare("SELECT userID FROM User WHERE userName = :name;");
		$rs2->execute(array(':name'=>$_POST['user']));
		$row2 = $rs2->fetch(PDO::FETCH_BOTH);
		$userNUM = $row2[0];
	}

	//add to queue
	if($amtPay == "0.00") {
		//insert to free queue
		$q = $pdo->prepare("INSERT INTO FreeQueuedIn (versionID,userID) VALUES (:versid, :userkey);");
		$q->execute(array(':versid'=> $_POST['submission'],':userkey'=> $userNUM));
		$qName = "Free Queue";	

	}
	else{
		//insert to paid queue
		$q2 = $pdo->prepare("INSERT INTO PaidQueuedIn (versionID,userID,amountPaid) VALUES (:versid, :userkey, :paid);");
		$q2->execute(array(':versid'=> $_POST['submission'],':userkey'=> $userNUM, ':paid'=> $amtPay));
		$qName = "Paid Queue";		
	}
	
	
	echo "Adding Song ";
	echo $submission; 
	echo " to the ";
	echo $qName;
	echo " for ";
	echo $_POST['user'];

	
}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

?>
<form action="landing_page.php"><input type=submit class=button name=return value="Main Menu"></form> </div>
</pre></body></html>
</body></html>


