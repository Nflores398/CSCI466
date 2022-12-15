<html><head><title>USER LOGIN</title></head>
<style>
body{
		background:#7bd19c;
		font-family: serif;
	}
	.cool{
		clear:both;
		border: 5px solid black;
		background: #f5f4d7;
		padding: 20px;
		max-width: 1060px;
		margin: 2px auto;
		overflow: auto;
	}
	.button {
		background-color: #7bd19c;
  		border: 2px solid black;
 		color: black;
		padding: 5px 14px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 14px;
	  	margin: 4px 2px;
 		cursor: pointer;
	}
</style>
<body>

	<h1>KARAOKE LOGIN</h1>
	<div class = "cool">

<?php	
	$submission = $_POST['submission'];
	echo "<form action='song_submit.php' method='POST'/>";
		echo "<label for='isUser'>New User</label>";         
          	echo "<input type='radio' name='isUser' value='new'>";
         	echo "<label for='isUser'>Returning User</label>";
          	echo "<input type='radio' name='isUser' value='old'> <br>";

		echo "<br> <label for='user'>User Name:</label> <br>";
          	echo "<input type='text' name='user'><br>";

		echo "<label for='amtPay'>Amount to be paid:</label><br>";
          	echo "<input type='text' name='amtPay' value='0.00'><br>";
		
		echo "<input type='hidden' name='submission' value='$submission'>"; 
		
		echo "<input type='submit' class='button' value='Submit'/>";
	echo "</form></div>";
?>
<form action="landing_page.php"><input type=submit class=button name=return value="Main Menu"></form> </div>
</pre></body></html>
</body></html>