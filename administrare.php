<?php
	ob_start();
	$titlu_pagina = "CONCURS CANIN - Administrare caini participanti la concurs ";
	$sectiune='administrare';
	include("inc/header.php"); 
	
	if($_SESSION["logat"] != 'da') { 
		header("Location:logare.php"); 
	}
?>	
	<a class="fright" href="logout.php">Log Out</a>	
	<div id="content">
		<h2>Administrare caini participanti la concurs </h2>

		<?php
			$query = "SELECT * FROM caini";
			$result = mysqli_query($link ,$query);
			
			if (mysqli_num_rows($result) == 0) {
					echo 'Nu exista catei inregistrati in concurs.';
			} else {
		?>
		<table>
			<tr>
				<th>NR</th><th>Nume_caine</th><th>Rasa</th><th>Stapan</th><th>Categorie</th>
				<th>Premiu</th><th>Mod_rezultat</th><th>Sterg_caine</th>
			</tr>	
			<?php
				while ($row = mysqli_fetch_assoc($result)) {
					$query1 = "SELECT nume FROM stapani WHERE cnp='".$row['cnp_stapan']."'";
					$result1 = mysqli_query($link ,$query1);
					$row1 = mysqli_fetch_assoc($result1);	
			?>
			<tr>
				<td><?php echo $row['nr_concurs'];?></td>
				<td><?php echo $row['nume_caine'];?></td>
				<td><?php echo $row['rasa'];?></td>
				<td><?php echo $row1['nume'];?></td>
				<td><?php echo $row['categorie'];?></td>
				<td><?php echo $row['premiu'];?></td>
				<td><a href="modifica_rezultat.php?nr_concurs_caine=<?php echo $row['nr_concurs'];?>"><img src="img/edit.png" class="img2"></a></td>
				<td><a href="stergere_caine.php?nr_concurs_caine=<?php echo $row['nr_concurs'];?>"><img src="img/del.png" class="img2"></a></td>
			</tr>
			
			<?php
				}
			?>	
		</table>
			<?php
				}
			?>						
			</p>
		</div>
<?php 
	include("inc/footer.php"); 
	ob_end_flush();
?>