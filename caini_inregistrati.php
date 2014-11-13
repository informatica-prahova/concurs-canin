<?php 
	$titlu_pagina = "CONCURS CANIN - Caini participanti la concurs";
	$sectiune='caini_inregistrati';
	include("inc/header.php"); 
?>		
	<div id="content">
		<h2>Caini participanti la concurs in ordinea numarului de concurs </h2>
		<?php
			$query = "SELECT * FROM caini ORDER BY nr_concurs";
			$result = mysqli_query($link ,$query);
			
			if (mysqli_num_rows($result) == 0) {
					echo 'Nu exista catei inregistrati in concurs.';
			} else {
		?>
		<table>
			<tr>
				<th>Nr</th><th>Nume_caine</th><th>Rasa</th><th>Stapan</th><th>Categorie</th>
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
				<td><?php categoria_x($row['categorie']);?></td>
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
		<div id="left">
			<h3>Meniu comenzi rapide:</h3>
			<ul>
				<li></li>
				<li><h3><a href="caini_inregistrati.php">1. Caini participanti ordonati crescator dupa numar concurs.</a></h3></li>
				<li><h3><a href="caini_pe_categorii.php">2. Caini participanti ordonati pe categori in ordinea numarului de concurs.</a></h3></li>
			</ul>
			<br>
		</div>
<?php include("inc/footer.php"); ?>