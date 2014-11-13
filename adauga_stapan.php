<?php 
	$titlu_pagina = "CONCURS CANIN - 1. Inregistrare stapan";
	$sectiune='inregistrare';
	include("inc/header.php"); 
?>
		<div id="content">
			<h2>Inregistrare caine in concurs </h2>
			<h3>Pas 1. Inregistrare stapan</h3>

			<p><img src="img/dog-training.jpg" alt="" width="500" height="366" />
			
			<?php
				if (!empty($_POST)) {
					$cnp        = $_POST['cnp'];
					$nume       = $_POST['nume'];
					$adresa    	= $_POST['adresa'];
                
					$sql = "INSERT INTO stapani (cnp, nume, adresa) VALUES('$cnp', '$nume', '$adresa')";
					mysqli_query($link,$sql);
					
					echo '<h3>Stapanul a fost inregistrat cu suucces. Puteti sa inregistrati cainele</h3>';
					echo '<br />';
					echo '<h3><a href="adauga_caine.php"><b>Pas. 2</b> Inregistrare caine</a></h3>';
				}
				else {

			?>
				<form action="adauga_stapan.php" method="post">
					<table>
					<tr>
				    	<th><label>Cnp</label></th>
						<td><input type="text" value="" name="cnp" /></td>
					</tr>
					
					<tr>
				    	<th><label>Nume</label></th>
						<td><input type="text" value="" name="nume" /></td>
					</tr>
					<tr>
				    	<th><label>Adresa</label></th>
						<td><input type="text" value="" name="adresa" /></td>
					</tr>
					<tr>
				    	<td></td><td><input type="submit" value="Adauga stapan" /></td></tr>
				    </table>
				</form>
				<?php } ?>			
			</p>


			
		</div>
		<div id="left">
			<h3>Meniu comenzi rapide:</h3>
			<ul>
				<li><h3><a href="adauga_stapan.php"><b>Pas. 1</b> Inregistrare stapan</a></h3></li>
				<li><h3><a href="adauga_caine.php"><b>Pas. 2</b> Inregistrare caine</a></h3></li>
			</ul>
		</div>

<?php include("inc/footer.php"); ?>