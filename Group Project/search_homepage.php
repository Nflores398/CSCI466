<html><head><title>SONG/ARTIST SEARCH PAGE</title></head>
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
	<h1>KARAOKE SONG SEARCH</h1>
	<div class = "cool">
	<p><b>Search by artist or contributor name:</b></p>
	<form action="artist_search.php" method="POST">
		<input type="text" name="artist_name"/> Artist/Contributor Name &nbsp;
		<input type="submit" class = "button"  value="Search"/>	
	</form>

	<p><b>Search by song title:</b></p>	
	<form action="song_search.php" method="POST"/>
		<input type="text" name="song_title"/> Song Title &nbsp;
		<input type="submit" class = "button" value="Search"/> 
	</form>

	<form action="landing_page.php"><input type=submit class=button name=return value="Main Menu"></form>
</div>

</body></html>
