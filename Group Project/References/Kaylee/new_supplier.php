<?php
include("library.php");
include("login.php");
//setting up database connection
try {
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$supplier_num = $_POST['supplier_num'];
	$supplier_name = $_POST['supplier_name'];
	$status = $_POST['status'];
	$city = $_POST['city'];

	$rs = $pdo->prepare("INSERT INTO S VALUES('$supplier_num', '$supplier_name', '$status', '$city');");
	$rs->execute();

	echo "<p>You have added a new supplier to the database</p>";
	echo "<p>Updated database: </p>";
	$rs = $pdo->query("SELECT * FROM S;");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	create_table($rows);
}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

?>
