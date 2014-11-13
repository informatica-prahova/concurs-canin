<?php 
	$titlu_pagina = "CONCURS CANIN - Rezultate concurs";
	$sectiune='rezultate_concurs';
	include("inc/header.php"); 
?>		
		<div id="content">
			<h2>Rezultate concurs </h2>
			<?php
					
				for($i=1;$i<=10;$i++) //10 tabele cu rezultate
				{	
					echo '<h3>'; categoria_x($i); echo '</h3>'; //afisare categorie
					
					$query = "SELECT * FROM caini WHERE categorie=$i AND premiu IN (1,2,3) ORDER BY premiu DESC";
					$result = mysqli_query($link, $query);
					
					if (mysqli_num_rows($result) == 0) 
					{
						echo '<p>Nu exista caini inregistrati la aceasta categorie sau nu au fost stabilite premiile.</p>';
					} 
					else 
					{
				?>
					<table>
						<tr>
							<th>Nr_concurs</th>
							<th>Nume_caine</th>
							<th>Rasa</th>
							<th>Premiul</th>
							<th>Stapan</th>
						</tr>
				<?php
					while ($row = mysqli_fetch_assoc($result)) 
					{
						$query1 = "SELECT nume FROM stapani WHERE cnp='".$row['cnp_stapan']."'";
						$result1 = mysqli_query($link ,$query1);
						$row1 = mysqli_fetch_assoc($result1);		
				?>
						<tr>
							<td><?php echo $row['nr_concurs'];?></td>
							<td><?php echo $row['nume_caine'];?></td>
							<td><?php echo $row['rasa'];?></td>
							<td><?php echo $row['premiu'];?></td>
							<td><?php echo $row1['nume'];?></td>
						</tr>
			<?php   }  ?>	
					</table><br>
			<?php   }
				}  ?>						
		</div>

		<div id="left">
			<h3>Meniu comenzi rapide:</h3>
			<ul>
				<li></li>
				<li><h3><a href="rezultate_concurs.php">1. Rezultate concurs</a></h3></li>
				<li><h3><a href="cautare_avansata.php">2. Cautare avansata</a></h3></li>
			</ul>
			
		</div>

<?php include("inc/footer.php"); ?>