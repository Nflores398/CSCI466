<html><head><title>Purchase page</title></head>
<?php
include("login.php");
include("library.php");

try {
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$part = $_POST['part'];
	$supplier = $_POST['supplier'];
	$quantity = $_POST['quantity'];

	$rs = $pdo->query("SELECT QTY FROM SP WHERE P = '$part' AND S = '$supplier';");
	$rows = $rs->fetch();

	echo "Original quanity is ". $rows[0];
	echo "Desired quantity to purchase is ". $quantity;

	$new_quantity = $rows[0]-$quantity;

	echo "New quantity for the part is ". $new_quantity;

	$rs = $pdo->prepare("UPDATE SP SET QTY = '$new_quantity' WHERE P = '$part' AND S = '$supplier';");
	$rs->execute();

	echo "<p>Purchase completed!</p>";
	echo "<p>Updated database:</p>";
	$rs = $pdo->query("SELECT * FROM SP;");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	create_table($rows);

}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

?>
</html>
