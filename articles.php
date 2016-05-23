<?php
session_start();
$type = $_POST['type'];
if(!isset($_SESSION['user'])) {
	echo "Je bent niet ingelogd, wat doe je hier?";
	header("refresh:5;url=index.php");
} else {
	require "core/init.php";
	if($type == "add") {
		$author = $_SESSION['user'];
		$title = trim($_POST['titel']);
		$text = trim($_POST['text']);
		$private = $_POST['private'];
		if($title == "" || $text == "") {
			echo "Een van de velden is leeg, probeer het a.u.b. opnieuw";
			header("refresh:5;url=add_article.php");
		} else {
			$query = mysqli_query($con, "INSERT INTO articles (titel, text, author, private) VALUES ('$title', '$text', '$author', '$private');");
			echo "Artikel succesvol toegevoegd";
			header("refresh:2;url=index.php");
		}
	}
}