<?php 
	ob_start();
	$titlu_pagina = "CONCURS CANIN - Acces zona administrare (Login)";
	$sectiune='administrare';
	include("inc/header.php"); 
?>
		<div id="content">
			<h2>Acces zona administrare </h2>
			<p><img src="img/dog-training.jpg" alt="" width="500" height="366" />			
			<?php
				if (!empty($_POST)) {
					$utilizator   = $_POST['utilizator'];
					$parola       = $_POST['parola'];

					if($utilizator == "test" and $parola == "test") {
						$_SESSION["logat"] = "da";
						header("Location: administrare.php");
					}		
					echo '<h3>Utilizator sau parola gresita!</h3> <br> <i>DOAR, utilizatori autorizati POT accesa zona restrictionata! </i>';
				}
			?>
				<form action="logare.php" method="post">
					<table>
					<tr><th><label>Utilizator:</label></th>
						<td><input type="text" value="" name="utilizator" /></td>
					</tr>
					<tr><th><label>Parola:</label></th>
						<td><input type="password" value="" name="parola" /></td>
					</tr>
					<tr><td></td><td><input type="submit" value="Logare" /></td></tr>
				    </table>
				</form>		
			</p>
		</div>
		<div id="left">
			<h3>Meniu comenzi rapide:</h3>
			<ul>
				<li></li>
			</ul>
			<h3>DOAR, utilizatori autorizati POT accesa zona restrictionata folosind utilizatorul si parola cunoscuta! </h3>
			<p>Site-ul nu dispune de un sistem de inreigistrare si logare personalizata pentru diferite tipuri de utilizatori. 
			<br>Un astfel de instrument se poate dezvolta ulterior!</p>	
		</div>

<?php 
	include("inc/footer.php"); 
		 ob_end_flush();
?>