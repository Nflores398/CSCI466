<html><head><title>Supplier Info</title></head>
<?php 
include("library.php");
include("login.php");
//setting up database connection
try {
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//run query to get supplier table
	$rs = $pdo->query("SELECT * FROM S;");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	echo "<p><b>SUPPLIER INFO</b></p>";
	//print entire S table
	create_table($rows);
}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

?>
</html>
