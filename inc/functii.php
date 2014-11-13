<?php

	function categoria_x($x)
	{
		$cat = array(1 => 'Câini ciobăneşti, de turmă şi de cireadă (fără ciobăneştii elvetieni', 
					 2 => 'Câini de tip Pinscher şi Schnauzer - Molossoizi – Câini de munte şi Câini de cireadă elvetieni şi alte rase', 
					 3 => 'Terrieri',
					 4 => 'Teckeli',
					 5 => 'Câini de tip Spitz şi de tip primitiv',
					 6 => 'Copoi, limieri şi rase înrudite',
					 7 => 'Câini de Aret',
					 8 => 'Câini aportori - Câini scotocitori - Câini de apă',
					 9 => 'Câini de agrement şi de companie',
					 10 => 'Ogari'
			   );
		echo $x.'. '.$cat[$x];
	}
?>