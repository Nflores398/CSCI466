<html><head><title>Part Info</title></head>
<?php
include("library.php");
include("login.php");

try {
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$part = $_POST['Part'];

	echo "Here is information on your request for $part";
	$rs = $pdo->query("SELECT * FROM SP WHERE P = '$part';");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);	
	create_table($rows);
	//printing info on the part
	$rs = $pdo->query("SELECT * FROM P WHERE P = '$part';");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);	
	create_table($rows);

}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}
?>
</html>
