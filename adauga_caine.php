<?php 
	$titlu_pagina = "CONCURS CANIN - 2. Inregistrare caine";
	$sectiune='inregistrare';
	include("inc/header.php"); 
?>
		<div id="content">
			<h2>Inregistrare caine in concurs </h2>
			<h3>Pas 2. Inregistrare caine</h3>

			<p><img src="img/dog-training.jpg" alt="" width="500" height="366" />
			
			<?php
				if (!empty($_POST)) {
					$cnp_stapan	= $_POST['cnp_stapan'];
					$nume_caine = $_POST['nume_caine'];
					$rasa    	= $_POST['rasa'];
					$categorie  = $_POST['categorie'];
                
					$sql = "INSERT INTO caini  (cnp_stapan, nume_caine, rasa, categorie) VALUES('$cnp_stapan', '$nume_caine', '$rasa', '$categorie')";
					mysqli_query($link,$sql);
					
					echo '<h3>Cainele a fost inregistrat cu suucces. Puteti sa reluati adugarea de stapan sau caine</h3>';
					echo '<br />';
					echo '<h4><a href="adauga_stapan.php"><b>Pas. 1</b> Inregistrare stapan</a></h4>';
					echo '<h4><a href="adauga_caine.php"><b>Pas. 2</b> Inregistrare caine</a></h4>';
				}
				else {
			?>
				<form action="adauga_caine.php" method="post">
					<table>
					<tr>
				    	<th><label>Nume caine</label></th>
						<td><input type="text" value="" name="nume_caine" /></td>
					</tr>
					
					<tr>
				    	<th><label>Rasa</label></th>
						<td><input type="text" value="" name="rasa" /></td>
					</tr>
					<tr>
				    	<th><label>Categorie</label></th>
						<td><select name="categorie">
						  <option value="1">Grupa I</option>
						  <option value="2">Grupa II</option>
						  <option value="3">Grupa III</option>
						  <option value="4">Grupa IV</option>
						  <option value="5">Grupa V</option>
						  <option value="6">Grupa VI</option>
						  <option value="7">Grupa VII</option>
						  <option value="8">Grupa VIII</option>
						  <option value="9">Grupa IX</option>
						  <option value="10">Grupa X</option>
						</select></td>
					</tr>
					<tr><th><label>Stapan</label></th><td>
						<select name="cnp_stapan">
							<?php
								$query1 = "SELECT cnp, nume FROM stapani";
							
								$result1 = mysqli_query($link ,$query1);
								while ($row1 = mysqli_fetch_assoc($result1))
								{
									echo '<option value="'.$row1['cnp'].'">'.$row1['nume'].'</option>';	
								}
							?>
						</select>
					</td></tr>
				    	<tr><td></td><td><input type="submit" value="Adauga caine" /></td></tr>
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