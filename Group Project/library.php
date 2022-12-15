<?php
//function to create a table in webpage
function create_table($rows) {
	//loop makes table data
	foreach($rows as $row) {
		echo "<tr>";
		foreach($row as $key => $item) {
			echo "<td>$item</td>";//table data 
		}
		echo "</td>";
	}
}
?>
