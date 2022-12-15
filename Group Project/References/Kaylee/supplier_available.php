<html><head><title>Supplier availability</title></head>

<?php
include("login.php");
include("library.php");

try {
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$supplier = $_POST['Supplier'];

	echo "Here is information on your request for $supplier";
	$rs = $pdo->query("SELECT * FROM SP WHERE S = '$supplier';");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);	
	if(!empty($rows)) {
		create_table($rows);
	}
	//printing info on the part
	$rs = $pdo->query("SELECT * FROM S WHERE S = '$supplier';");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);	
	create_table($rows);

}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

?>

</html>
