<html><head><title>New part</title></head>
<?php

include("library.php");
include("login.php");
//setting up database connection
try {
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//declaring variables so its easier
	$part_num = $_POST['part_num'];
	$name = $_POST['name'];
	$color = $_POST['color'];
	$weight = $_POST['weight'];

	$rs = $pdo->prepare("INSERT INTO P VALUES('$part_num', '$name', '$color', '$weight');");
	$rs->execute();

	echo "<p>You have added a new part to the database</p>";
	echo "<p>Updated database: </p>";
	$rs = $pdo->query("SELECT * FROM P;");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);//saves result set 
	create_table($rows);

}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

?>
</html>
