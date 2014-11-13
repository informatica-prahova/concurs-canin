<?php
    $host = "localhost"; 	//adresa IP a host-ului
    $user = "root"; 		//nume utilizator
    $password = "root";		//parola utilizator 
    $db="concurs_canin";	//baza de date

	$link = mysqli_connect($host, $user, $password,$db);
	if(!$link) {
		die("Nu am putut stabili conexiunea ".mysqli_error());
	}
	
	session_start();
?>