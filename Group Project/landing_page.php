<!--    
    Team B
	Professor Lehuta
    CSCI 466-OPE1 Database 
    Due 4/21/2021
	Group Assignment
-->
<html>
    <head>
        <title>Karaoke Landing Page</title>
    </head>

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
        <h1> Welcome to Karaoke Night! <h1>
        <h1> Please Log in <h1>
        <h2> DJ Login Here<h2>
        <form action = "http://students.cs.niu.edu/~z1816398/DJInterface.php" method="GET">
		<input type = "Submit" name = "Submit" value = "Login"/>
        </form>
        <h2> Customers sign up for Karaoke Here <h2>
        <form action = "http://students.cs.niu.edu/~z1816398/search_homepage.php" method="GET">
		<input type = "Submit" name = "Submit" value = "Search songs"/>
        </form>
        </body>

</html>
