<?php
session_start();
require "core/init.php";
$query;
$results;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>
	<?php
	if(!isset($_SESSION['user'])) {
	?>
	<a href="login.php">Login</a> of <a href="register.php">registreer</a>.
	<?php } else { ?>
	<a href="logout.php">Log uit</a>
	<br>
	<a href="add_article.php">Artikel toevoegen</a>
	<?php } ?>

	<h1>Artikelen</h1>

	<?php
	if(isset($_SESSION['user'])) {
		$query = mysqli_query($con, "SELECT * FROM articles");
	} else {
		$query = mysqli_query($con, "SELECT * FROM articles WHERE private = 0");
	}
	$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

	if($results == null) {
		?>
		<h2>Er zijn geen artikelen beschikbaar op het moment</h2>
		<?php
	} else {
		foreach($results as $result) {
			?>
			<h2><?php echo $result["titel"];?></h2>
			<h5>Geschreven door <?php echo $result["author"];?> op <?php echo $result["time"];?></h5>
			<p><?php echo $result["text"];?></p>
			<?php
		}
	}

	?>
</body>
</html>