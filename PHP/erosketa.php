<?php
include 'conexion.php';
session_start();
?>



<!--<!DOCTYPE html>
	HTML Dokumentu osoa.

	PHP kodea erabili INSERTATZEKO tiketa.

	 <?php
	 // Formularioko (input datuak)
	 $iderabiltzailea =  $_POST['fname'];
	 $zinema =  $_POST['fzinema'];
	 $idpelikula = $_POST['fpelikula'];
	 $data =  $_POST['fdata'];
	 $idsaioa = $_POST['fsaioa'];
	 // SQL Kontsulta tiketa erregistratzeko
	 $sql = " ...";

	 // Egiaztatu tiketa ondo erregistratu den
	//Tiketa ondo erregistratu bada, HTML dokumentua irudikatu 
		// Baina Tiketa ez bada ondo erreigstratu, mezua erakutsi errorea egon dela, web dokumentuan.
 		//Erregistroaren errorea ikusteko:

  				<?php
            echo "ERROR: $sql. ". mysqli_error($konexioa);
					?>
