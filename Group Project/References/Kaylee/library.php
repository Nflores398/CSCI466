<?php
//function to create a table in webpage
function create_table($rows) {
	echo "<table border = 1 cell spacing = 1>";
	echo "<tr>";
	//loop makes headers for columns
	foreach($rows[0] as $key => $item) {
		echo "<th>$key</th>";//using key to make table headers
	}
	echo "/<tr>";
	//loop makes table data
	foreach($rows as $row) {
		echo "<tr>";
		foreach($row as $key => $item) {
			echo "<td>$item</td>";//table data 
		}
		echo "</td>";
	}
	echo "</table>";
}
?>
