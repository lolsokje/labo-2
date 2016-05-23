<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registreer</title>
</head>
<body>
<?php 
if(isset($_SESSION['user'])) {
	echo "Je bent al ingelogd, je hoort niet op deze pagina te kijken";
	header("refresh:5;url=index.php");
} else { ?>
	<form action="action.php" method="post">
		<label for="username">Gebruikersnaam</label>
		<input type="text" id="username" name="username">
		<br>
		<label for="password">Wachtwoord</label>
		<input type="password" id="password" name="password">
		<br>
		<label for="password_again">Wachtwoord opnieuw</label>
		<input type="password" id="password_again" name="password_again">
		<br>
	
		<input type="hidden" name="type" id="type" value="register">

		<input type="submit" value="Register">
	</form>
<?php } ?>
</body>
</html>