<?php
require_once("includes/config.php");
// query to get all films
$queryFilms = "SELECT * FROM Films";
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
		
			<h2>All Films</h2>
		
			<?php
             while ($obj = $resultFilms -> fetch_object()) {
    			echo "<h3>{$obj->filmTitle}</h3>";
				echo "<p><a href=\"film-details.php?filmID={$obj->filmID}\">More Details</a></p>";
  			}
			?>
			
		</main>
		
	
	</div>
	
		<footer>
	
		</footer>
	
</body>
</html>