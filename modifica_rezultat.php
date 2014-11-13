<?php ob_start();
	$titlu_pagina = "CONCURS CANIN - Adaugare / Mofificare premiu";
	$sectiune='administrare';
	include("inc/header.php");

	if (empty($_POST)) {
            
            if (!$_GET['nr_concurs_caine']) {
                    die('Numar concurs caine nu este valid.');
            }
            
                $nr_concurs_caine = $_GET['nr_concurs_caine']; //se inlocuieste cu cheia primara din tabela T1
        
                $sql = "SELECT * FROM caini WHERE nr_concurs='$nr_concurs_caine'";
                $result = mysqli_query($link,$sql);
                $row = mysqli_fetch_assoc($result);

                //print_r($_GET);
        
        } else {     print_r($_POST);           
			$nr_concurs     = $_POST['nr_concurs'];
			$nume_caine     = $_POST['nume_caine'];
			$rasa    		= $_POST['rasa'];
	       	$premiu    		= $_POST['premiu'];
	       	$categorie    	= $_POST['categorie'];

		$sql = "UPDATE caini
	                SET nume_caine ='$nume_caine',
	                    rasa ='$rasa',
	                    categorie = $categorie,
	                    premiu = $premiu                        
	                WHERE nr_concurs = $nr_concurs";
	    echo $sql;
        mysqli_query($link,$sql);
		header("Location: administrare.php");
	} 
?>		
		<a class="fright" href="logout.php">Log Out</a>	
		<div id="content">
			<h2>Adaugare / Mofificare premiu</h2>

			<p><img src="img/dog-training.jpg" alt="" width="500" height="366" />
			
			<form action="modifica_rezultat.php" method="post">
				<table>
				<tr><th><label><b>Numar corcurs</b></label></th>
					<td>
						<?php echo $row['nr_concurs'];?>
						<input type="text" value="<?php echo $row['nr_concurs'];?>" name="nr_concurs" hidden />
					</td>
				</tr>
				<tr><th><label><b>Nume caine</b></label></th>
					<td><input type="text" value="<?php echo $row['nume_caine'];?>" name="nume_caine" /></td>
				</tr>
				<tr><th><label><b>Rasa</b></label></th>
					<td><input type="text" value="<?php echo $row['rasa'];?>" name="rasa" /></td>
				</tr>
				<tr><th><label><b>Premiul</b></label></th>
					<td><input type="text" value="<?php echo $row['premiu'];?>" name="premiu" /></td>
				</tr>
				<tr><th><label><b>Categorie</b></label></th>
					<td><input type="text" value="<?php echo $row['categorie'];?>" name="categorie" /></td>
				</tr>
				<tr><th><label><b>Stapan</b></label></th>
					<td>
						<?php
							$query1 = "SELECT nume FROM stapani WHERE cnp='".$row['cnp_stapan']."'";
						
							$result1 = mysqli_query($link ,$query1);
							$nume_stapan = mysqli_fetch_assoc($result1);
							echo $nume_stapan['nume'];	
						?>
					</td>
				</tr>
			    	<tr><th></th><td><input type="submit" value="Modificare" /></td></tr>
			    </table>
			</form>
		</div>
		<div id="left">
			<h3>Meniu comenzi rapide:</h3>
			<ul>
				<li></li>
				<li>Nu exista comenzi rapide</li>
			</ul>
		</div>

<?php include("inc/footer.php"); ob_end_flush(); ?>