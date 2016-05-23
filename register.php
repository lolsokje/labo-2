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
</body>
</html>