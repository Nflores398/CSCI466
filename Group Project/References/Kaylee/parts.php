<html><head><title>Parts Info</title></head>
<?php
//setting up database connection
//
	include("library.php");
	include("login.php");
try {
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "<p><b>PARTS INFO</b></p>";
	$rs = $pdo->query("SELECT * FROM P;");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	create_table($rows);
}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

?>
</html>
