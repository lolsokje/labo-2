<?php
session_start();
if(isset($_SESSION['user'])) {
	echo "Je bent al ingelogd, je hoort niet op deze pagina te kijken.";
	header("refresh:5;url=index.php");
} else {
	require "core/init.php";

	// Opmerking: normaliter zou ik het wachtwoord encrypten met password_hash(), maar aangezien dit een simpele opdracht is, heb ik dit achterwege gelaten

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$type = $_POST['type'];

	if($type == "login") {
		$result = mysqli_query($con, "SELECT username, password FROM users WHERE username = '$username';");
		$results = mysqli_fetch_assoc($result);
		$db_password = $results['password'];

		if($result == null) {
			echo "Deze gebruiker bestaat niet";
			header("refresh:5;url=login.php");
		} else {
			if($password == $db_password) {
				$_SESSION['user'] = $username;
				header("location: index.php");
			} else {
				unset($_SESSION['user']);
				echo "Het ingevoerde wachtwoord komt niet overeen, probeer het a.u.b. opnieuw";
				header("refresh:5;url=login.php");
			}
		}

	} else if ($type == "register") {
		$password_again = trim($_POST['password_again']);
		if($password != $password_again) {
			echo "De wachtwoorden komen niet overeen, probeer het a.u.b. opnieuw";
		} else {
			$result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username';");
			$results = mysqli_fetch_assoc($result);
			if($results != null) {
				echo "Deze gebruikersnaam bestaat al, probeer het a.u.b. opnieuw";
				header("refresh:5;register.php");
			} else {
				$query = mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$username', '$password');");
				echo "Succesvol geregistreerd, je kan nu inloggen";
				header("refresh:5;url=login.php");
			}
		}
	}
}