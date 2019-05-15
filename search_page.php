


<?php

include_once('server.php');
if(isset($_POST['search'])){
	$q = $_POST['q'];
	$query = mysqli_query($conn,"SELECT * FROM `main` WHERE `Message` LIKE '%$qname%'");
//Replace table_name with your table name and `thing_to_search` with the column you want to search
	$count = mysqli_num_rows($query);
	if($count == "0"){
		$output = '<h2>No result found!</h2>';
	}else{
		while($row = mysqli_fetch_array($query)){
		$s = $row['Message']; // Replace column_to_display with the column you want the results from
				$output .= '<h2>'.$s.'</h2><br>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Search Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
	<body>
        <a href="index.php">Click here to go back to the form.</a>
        <br>
        <a href="search_page.php">Click here for the search page.</a>
        <hr>

		<form method="POST" action="search_page.php">
			<input type="text" name="q" placeholder="Search Criteria">
			<input type="submit" name="search" value="Search">
		</form>
		<?php echo $output; ?>

	</body>
</html>

