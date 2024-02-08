<?php
include 'conexion.php';

?>

<!--
<!DOCTYPE html>

KONPROBATZEKO ERABILTZAILEA EXISTITZEN DEN DATU BASEAN. JAVASCRIPT FUNTZIO BATEN BARRUAN,
PHP BIDEZ KONTSULTA BAT SORTUKO DUGU FORMULARIOKO DATUAK KONPARATUZ

	function konprobatu()
	{
		 <?php
		
	 			$usuario = $_POST["fname"];
	 			$password = $_POST["fpassword"];
	 			// Kontsulta prestatu. Literal bat sortzen dut
	 			$sql= " ";
	 			// kontsulta exekutatu
				$emaitza = $mysqli->query($sql);

	 			// Datuak berreskuratu
	 			if ($emaitza->num_rows > 0) {
					
				}

	 	
		
		 if (isset($emaitza['id'])) {?>
		 	// Kargatu behar da hurrengo dokumentua (tiketa.php) eta pasatu behar zaio erabiltzailearen id URL berdinean

		 <?php
	 	}  {
		 ?>
		 	//Mezu bat erakutsiko da web gunean (orri berean: login.php), erabiltzailea zuzena ez dela adieraziz.

		<?php 
		}  
		?>
	}
