<h1 class="sans">Puntaje Total</h1>
<div class="poiret">
	<?php

		foreach ($json_repo2 as $var) { 
			$suma2=$suma2+$var["stargazers_count"];	
		} 

		$push2=0;                      
		$create2=0;
		$issues2=0;
		$commit2=0;
		$otro2=0;
		$puntaje2=0;

		foreach ($json_events2 as $var2) {
			if($var2['type'] == "PushEvent"){
				$puntaje2 = $puntaje2 + 5;
				$push2=$push2+1;
			}
			elseif ($var2['type'] == "CreateEvent") {
				$puntaje2 = $puntaje2 + 4;
				$create2=$create2+1;
			}
			elseif ($var2['type'] == "IssuesEvent") {
				$puntaje2 = $puntaje2 + 3;
				$issues2=$issues2+1;
			}
			elseif ($var2['type'] == "CommitCommentEvent") {
				$puntaje2 = $puntaje2 + 2;
				$commit2=$commit2+1;
			}
			else {
				$puntaje2 = $puntaje2 + 1;
				$otro2=$otro2+1;
			}
		}

		if (is_null($json_profile2[login])) {
			$otro2=$otro2-2;
			$puntaje2=$puntaje2-2;
		}

		$final_score2= (0.4*$puntaje2)+(0.4*$suma2)+(0.2*$json_profile2["followers"]);

		echo "GitHub Score: "." ".$final_score2."<br>";

	?>
</div>

<h2 class="sans">Eventos</h2>

<div class="poiret">
	<?php
		echo "PushEvent:"." ".$push2."<br>";
		echo "CreateEvent:"." ".$create2."<br>";
		echo "IssuesEvent:"." ".$issues2."<br>";
		echo "CommitCommentEvent:"." ".$commit2."<br>";
		echo "Otros:"." ".$otro2."<br>";
	?>
</div>