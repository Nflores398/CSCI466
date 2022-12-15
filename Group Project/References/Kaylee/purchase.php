<?php
echo "<p>Welcome to the purchase page</p>";

include("login.php");
include("library.php");

try {
	$dsn = "mysql:host=courses;dbname=z1816398";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$rs = $pdo->query("SELECT * FROM P;");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	create_table($rows);

	$rs = $pdo->query("SELECT * FROM SP;");
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	create_table($rows);

	echo "<p>Select which part you want to purchase</p>";
	echo "<form action='purchase_from.php' method='POST'>";
	echo "<input type='radio' name='part' value='P1'/> P1";
	echo "<input type='radio' name='part' value='P2'/> P2";
	echo "<input type='radio' name='part' value='P3'/> P3";
	echo "<input type='radio' name='part' value='P4'/> P4";
	echo "<input type='radio' name='part' value='P5'/> P5";
	echo "<input type='radio' name='part' value='P6'/> P6 &nbsp";

	echo "<p>Select which supplier to purchase the part from, from the table above</p>";
	echo "<input type='radio' name='supplier' value='S1'/> S1";
	echo "<input type='radio' name='supplier' value='S2'/> S2";
	echo "<input type='radio' name='supplier' value='S3'/> S3";
	echo "<input type='radio' name='supplier' value='S4'/> S4 &nbsp";

	echo "<p>Enter the quantity</p>";
	echo "<input type='textbox' name='quantity'/> QTY &nbsp";

	echo "<input type='submit' value='Submit'/>";
	echo "</form>";

}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

?>
