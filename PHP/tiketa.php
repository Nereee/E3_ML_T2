<?php
include 'conexion.php';
session_start();
?>

<!--
	HTML Dokumentu osoa

	<script>

	PHP kodea erabili DATUAK BILATZEKO: zinema, pelikula, saioak .
	<?php

	$usuario = $_POST['fname'];
	$zinema = " ";
	$pelikula = " ";
	$saioak = " ";
	$eguna = " ";
	?>

  aretoak berreskuratu mysqli_query funtzioa erabiliz
  pelikulak berreskuratu mysqli_query funtzioa erabiliz baldin eta $zinema aldagaiak datuak dituen: 	if(isset($_GET['fzinema']))
  saioak berreskuratu mysqli_query funtzioa erabiliz baldin eta $zinema, $pelikula, $eguna aldagaiek datuak dituzten. isset($_GET['fpelikula'], isset($_GET['feguna'])



	function datuakLortu()
	{
  /*
  Zein datu kargatu behar ditugu?  Aretoak, pelikulak, saioak
  a) Berreskuratu diren aretoak JS DOM metodoen bidez select option egituran txertatu
  b) Baldin eta pelikulak kargatu diren, eta hori izango da bakarrik aretoa aukeratuta dagoen, JS DOM erabili eta select option desberdinetan txertatu
  c) Idem saioekin
  */

	}
	function aretoaURL()
	{
  //Begiratu beheko azalpenak
	}
	
	function pelikulaDataURL(){
  //Begiratu beheko azalpenak

	}


	</script>

<!--  HTML formularioa

  1) Aretoen zerrenda kargatu behar da  (onload gertaerak deitu beharko du datuakLortu())

  2) Aretoa aukeratzen denean beste gertaera batek aretoaURL() funtzioa exekutatuko du.
  Helburua bada URL-ri GET parametroak pasatuko bagenizkio moduan lan egitea. HOrretarako:
  window.location elementuan zinema parametroari bere balioa atxikitu behar diogu: + "?zine="+opcion

  Garrantzitsua: window.location-ek balio berria hartzean, berriz ere exekutatuko da datuakLortu()

  3) Pelikula aukeratzean, eta data ere aukeratuta baldin badago (edo alderantziz?)
  2. puntuan egin den antzekoa egingo da : peliDataURL()
  window.location  + "&peli="+opcion +"&eguna="+fecha.value;

  Garrantzitsua: window.location-ek balio berria hartzean, berriz ere exekutatuko da datuakLortu()

  4) Konprobatuko dugu EROSI klikatzen denean aukeratu dela pelikularen saioa.
  Oharra, HTML formularioan datuak POST bidez bidali daitezke.
-->
