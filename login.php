<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<form action="action.php" method="post">
		<label for="username">Gebruikersnaam</label>
		<input type="text" name="username" id="username">
		<br>
		<label for="password">Wachtwoord</label>
		<input type="password" name="password" id="password">

		<input type="hidden" name="type" value="login">
		<br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>