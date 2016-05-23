<h1 class="sans">Puntaje Total</h1>
<div class="poiret">
	<?php

		$push=0;                      
		$create=0;
		$issues=0;
		$commit=0;
		$otro=0;
		$puntaje=0;

		foreach ($json_events0 as $var) {
			if($var['type'] == "PushEvent"){
				$puntaje = $puntaje + 5;
				$push=$push+1;
			}
			elseif ($var['type'] == "CreateEvent") {
				$puntaje = $puntaje + 4;
				$create=$create+1;
			}
			elseif ($var['type'] == "IssuesEvent") {
				$puntaje = $puntaje + 3;
				$issues=$issues+1;
			}
			elseif ($var['type'] == "CommitCommentEvent") {
				$puntaje = $puntaje + 2;
				$commit=$commit+1;
			}
			else {
				$puntaje = $puntaje + 1;
				$otro=$otro+1;
			}
		}

		if ($json_profile0[login]=="") {
			$otro=$otro-2;
			$puntaje=$puntaje-2;
		}

		$final_score= (0.4*$puntaje)+(0.4*$suma)+(0.2*$json_profile0["followers"]);

		echo "GitHub Score: "." ".$final_score."<br>";

	?>
</div>

<h2 class="sans">Eventos</h2>

<div class="poiret">
	<?php
		echo "PushEvent:"." ".$push."<br>";
		echo "CreateEvent:"." ".$create."<br>";
		echo "IssuesEvent:"." ".$issues."<br>";
		echo "CommitCommentEvent:"." ".$commit."<br>";
		echo "Otros:"." ".$otro."<br>";
	?>
</div>