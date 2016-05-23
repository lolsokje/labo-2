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
<?php 
if(isset($_SESSION['user'])) {
	echo "Je bent al ingelogd, je hoort niet op deze pagina te kijken";
	header("refresh:5;url=index.php");
} else { ?>
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
<?php } ?>
</body>
</html>