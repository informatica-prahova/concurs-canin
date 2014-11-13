<?php 
	include("inc/conectare_la_bd.php"); 
	include('inc/functii.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title><?php echo $titlu_pagina; ?> </title>
	<link rel="stylesheet" href="../css/normalize.css" type="text/css">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
	<div id="container"> <!-- inceput container -->
		<div id="header"> <!-- inceput header -->
			<div id="logo"> <!-- inceput logo -->
				<h1>CAMPIONAT NATIONAL CANIN </h1>
			</div> <!-- sfarsit logo -->
			<div id="navbar"> <!-- inceput navbar -->
				<ul>
					<li <?php if($sectiune=='administrare') echo 'class="active"';?> ><a href="administrare.php">Administrare</a></li>
					<li <?php if($sectiune=='rezultate_concurs') echo 'class="active"';?>><a href="rezultate_concurs.php">Rezultate</a></li>
					<li <?php if($sectiune=='caini_inregistrati') echo 'class="active"';?>><a href="caini_inregistrati.php">Concurenti</a></li>
					<li <?php if($sectiune=='inregistrare') echo 'class="active"';?>><a href="inregistrare.php">Inregistrare</a></li>
					<li <?php if($sectiune=='index') echo 'class="active"';?>><a href="index.php"><span>Acasa</span></a></li>

				</ul>
			</div> <!-- inceput navbar -->
		</div> <!-- sfarsit header -->

		<div id="in-header"> <!-- inceput inheader -->
			<h2>Catelul meu este campion!</h2>
		</div> <!-- sfarsit inheader -->
		<div id="wrapper"> <!-- inceput wrapper -->
			<div class="inner_copy"></div>