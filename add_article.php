<?php
session_start();
if(!isset($_SESSION['user'])) {
	echo "Je bent niet ingelogd en hoort niet op deze pagina te kijken. Je wordt nu teruggestuurd.";
	header("refresh:5;index.php");
} else {
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Artikel toevoegen</title>
	</head>
	<body>
		<form action="articles.php" method="post">
			<label for="titel">Titel</label>
			<input type="text" name="titel" id="titel">
			<br>
			<label for="text">Text</label>
			<textarea name="text" id="text" cols="40" rows="15"></textarea>
			<br>
			<label for="private">Privé</label>
			<select name="private" id="private">
				<option value="0">Nee</option>
				<option value="1">Ja</option>
			</select>
			<br>
			<input type="hidden" value="add" name="type">
			<input type="submit" value="Toevoegen">
		</form>
	</body>
	</html>
<?php } ?>