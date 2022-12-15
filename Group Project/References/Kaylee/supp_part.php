<html><head><title>Parts Depo</title><head>
<body>

<?php
	//include("login.php");
	//include("library.php");
	//include("suppliers.php");
	//include("parts.php");
		
	echo "<p><b><u>WELCOME TO PARTS DEPO</u></b></p>";
	//adding an image for aesthetics ~~
	echo "<img src='screws.jpg' width=500 alt='image of some nuts, bolts, 'n screws'/>";
	
	//this is a paragraph with a link to another page containing info for all suppliers
	echo "<a href='suppliers.php'><p><b>GENERAL SUPPLIER INFO</b></p></a>";
	//this is a paragraph with a link to another page containing info for all parts
	echo "<a href='parts.php'><p><b>GENERAL PARTS INFO</b></p></a>";

	//creating form to select which part user wants to view info on
	echo "<p><b>SELECT A PART TO VIEW AVAILABLE STOCK</b></p>";
	echo "<form action='parts_available.php' method='POST'>";
	echo "<input type='radio' name='Part' value='P1'/> P1";
	echo "<input type='radio' name='Part' value='P2'/> P2";
	echo "<input type='radio' name='Part' value='P3'/> P3";
	echo "<input type='radio' name='Part' value='P4'/> P4"; 
	echo "<input type='radio' name='Part' value='P5'/> P5";
	echo "<input type='radio' name='Part' value='P6'/> P6 &nbsp";
	echo "<input type='submit' value='Submit'/>";
	echo "</form>";

	//creating form for user to select a supplier
	echo "<p><b>SELECT A SUPPLIER TO VIEW THEIR INFORMATION AND PARTS</b></p>";
	echo "<form action='supplier_available.php' method='POST'>";
	echo "<input type='radio' name='Supplier' value='S1'/> S1";
	echo "<input type='radio' name='Supplier' value='S2'/> S2";
	echo "<input type='radio' name='Supplier' value='S3'/> S3";
	echo "<input type='radio' name='Supplier' value='S4'/> S4";
	echo "<input type='radio' name='Supplier' value='S5'/> S5 &nbsp";
	echo "<input type='submit' value='Submit'/>";
	echo "</form>";

	echo "<a href='purchase.php'><p><b>PURCHASE PARTS HERE</b></p></a>";

	echo "<p><b>ADD A NEW PART TO THE DATABASE</b></p>";
	echo "<p>Enter the part information here:</p>";
	echo "<form action='new_part.php' method=POST>";
	echo "<input type='textbox' name='part_num'/> P (part number) &nbsp";
	echo "<input type='textbox' name='name'/> PNAME (part name) &nbsp";
	echo "<input type='textboc' name='color'/> COLOR &nbsp";
	echo "<input type='textbox' name='weight'/> WEIGHT";
	echo "<input type='submit' value='Submit'/>";
	echo "</form>";

	echo "<p><b>ADD A NEW SUPPLIER TO THE DATABASE</b></p>";
	echo "<p>Enter the supplier information here</p>";
	echo "<form action='new_supplier.php' method='POST'>";
	echo "<input type='textbox' name='supplier_num'/> S (supplier number) &nbsp";
	echo "<input type='textbox' name='supplier_name'/> SNAME (supp. name) &nbsp";
	echo "<input type='textbox' name='status'/> STATUS &nbsp";
	echo "<input type='textbox' name='city'/> CITY";
	echo "<input type='submit' value='Submit'/>";
	echo "</form>";

?>
</body></html>
