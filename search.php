<?php
require_once("includes/config.php");
//check for search value
$searchQuery = $_GET[ 'q' ] ?? null;
if(is_null($searchQuery) || empty($searchQuery)){
	$validSearch = false;
}else{
	$validSearch = true;
	$searchQuery = "%".$searchQuery."%";
	// query to get film by filmID
	$stmt = $mysqli->prepare( "SELECT * FROM Films WHERE filmTitle LIKE ?" );
	$stmt->bind_param( 's', $searchQuery );
	$stmt->execute();
	// get number of results
	//$stmt->store_result();
	//$numRows = $stmt->num_rows;
	$result = $stmt->get_result();

}
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
		
			<h2>Search Films</h2>
		
			<div class="searchForm">
			<form>
			<div>
				<label for="q">Search:</label>
				<input type="text" name="q">
			</div>
				<div>
				<input type="submit" value="Search for a Film">
				</div>
				
			</form>
			</div>
			
			<?php
			if($validSearch){
				 echo "<p>Your search found {$result->num_rows} result(s)";
				 while ($obj = $result -> fetch_object()) {
					echo "<h3>{$obj->filmTitle}</h3>";
					echo "<p><a href=\"film-details.php?filmID={$obj->filmID}\">More Details</a></p>";
				}
			}else{
				echo "<p>Search for a film.</p>";
			}
			?>
			
		</main>
		
	
	</div>
	
		<footer>
	
		</footer>
	
</body>
</html>