<?php 
	$titlu_pagina = "CONCURS CANIN - Cautare avansata";
	$sectiune='rezultate_concurs';
	include("inc/header.php"); 
?>		
		<div id="content">
			<h2>Cautare avansata </h2>
			<p>-Criteriile sunt cumulative daca sunt indeplinite toate clauzele in acelasi timp;<br>
			   -Criteriile nu sunt cumulative daca este indeplinit cel putin o clauza dintre cele precizate;</p>

			<form action="cautare_avansata.php" method="post">
			   <table>
				<tr>
					<th>Nr</th>
					<th>Nume_caine</th>
					<th>Rasa</th>
					<th>Premiul</th>
					<th>Categorie</th>
				</tr>
				<tr>
					<td><input type="text" value="" name="nr_concurs" size="3" /></td>
					<td><input type="text" value="" name="nume_caine"  /></td>
					<td><input type="text" value="" name="rasa" /></td>
					<td><select name="premiu" size="3">
						  <option value="1">Premiul I</option>
						  <option value="2">Premiul II</option>
						  <option value="3">Premiul III</option>
						</select></td>
					<td><select name="categorie">
						  <option value=""></option>
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
				<tr>
					<th colspan="2">Criteriile sunt cumulative?</th>
					<td colspan="2">
						<input type="radio" name="op" value="1" checked> Da
						<input type="radio" name="op" value="2"> Nu
					</td>
					<td><input type="submit" value="Cautare avansata" /></td>
				</tr>
			</table>
		</form>
			<br>
			<h3>Daca nu este precizat nici un criteriu vor fi afisati toti cateii care participa la concurs</h3>
			<table>
				<tr>
					<th>Nr_concurs</th>
					<th>Nume_caine</th>
					<th>Rasa</th>
					<th>Premiul</th>
					<th>Stapan_caine</th>
					<th>Categorie_concurs(1,2,3,...,10)</th>
				</tr>
				<?php

					$query = "SELECT * FROM caini ";

					if(!empty($_POST)){
						if( !empty($_POST['nr_concurs']) || !empty($_POST['nume_caine']) ||
						    !empty($_POST['rasa']) || !empty($_POST['premiu']) || !empty($_POST['categorie']))
						    $query = $query ." WHERE ";
						if($_POST['op']==1) $operator=" AND ";
							else $operator=" OR ";
						$criterii=0;
						if( !empty($_POST['nr_concurs']) ) { 
							$criterii++;
							if($criterii==1) $query = $query."nr_concurs=".$_POST['nr_concurs'];
						}
						if( !empty($_POST['nume_caine']) ){ 
							$criterii++;
							if($criterii==1) $query = $query." nume_caine LIKE '%".$_POST['nume_caine']."%'";
								else $query = $query.$operator." nume_caine LIKE '%".$_POST['nume_caine']."%'";
						}
						if( !empty($_POST['rasa']) ){ 
							$criterii++;
							if($criterii==1) $query = $query."rasa LIKE '%".$_POST['rasa']."%'";
								else $query = $query.$operator." rasa LIKE '%".$_POST['rasa']."%'";
						}
						if( !empty($_POST['premiu']) ){ 
							$criterii++;
							if($criterii==1) $query = $query."premiu=".$_POST['premiu'];
								else $query = $query.$operator." premiu=".$_POST['premiu'];
						}
						if( !empty($_POST['categorie'])){ 
							$criterii++;
							if($criterii==1) $query = $query."categorie=".$_POST['categorie'];
								else $query = $query.$operator." categorie=".$_POST['categorie'];
						}					    						    						    					
					}

					$result = mysqli_query($link, $query);
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
							<td><?php echo categoria_x($row['categorie']);?></td>
						</tr>
			<?php   }  ?>	
					</table>			
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