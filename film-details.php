<?php
require_once("includes/config.php");
//check for querystring
$getFilmID = $_GET[ 'filmID' ] ?? null;
// query to get film by filmID
$stmt = $mysqli->prepare( "SELECT * FROM Films WHERE filmID = ?" );
$stmt->bind_param( 'i', $getFilmID );
$stmt->execute();
$result = $stmt->get_result();
//
$obj = $result -> fetch_object();
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
             
    		echo "<h3>{$obj->filmTitle}</h3>";
			?>
			
		</main>
		
	
	</div>
	
		<footer>
	
		</footer>
	
</body>
</html>