<?php
require_once("includes/config.php");
// query to get the latest 6 films
$queryFilms = "SELECT * FROM Films ORDER BY releaseDate DESC LIMIT 0,6";
$resultFilms = $mysqli->query( $queryFilms );
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Basic Films Demo</title>
</head>

<body>
	
	<div class="container">
	
<?php include("includes/header.php")?>
	
		<main>
		
			<h2>Latest Films</h2>
		
			<?php
             while ($obj = $resultFilms -> fetch_object()) {
    			echo "<h3>{$obj->filmTitle}</h3>";
  			}
			?>
			
		</main>
		
	
	</div>
	
		<footer>
	
		</footer>
	
</body>
</html>