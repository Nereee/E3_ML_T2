<?php
$servername = "localhost"; // Erabiliko dugun adibidean localhost
$username = "username"; // Datu-baseko ERABILTZAILEA adibidean username
$password = "password"; // Erabiltzailearen PASAHITZA adibidean password
// Konexioa sortu
$mysqli = new mysqli($servername, $username, $password);
// Konexioa egiaztatu
if ($mysqli->connect_error) {
  die("Konexioak errorea ematen du: " . $mysqli->connect_error);
}
// Datu basera konektatu
$retval = mysqli_select_db( $mysqli, 'db_name' );
// Datu baserako konexioa egiaztatu
if(! $retval ) {
     die('Ezin da datu basea hautatu: ' . mysqli_error($mysqli));
}
// Konexioa itxi
$mysqli->close();
?>
