<!DOCTYPE html>
<html>
	<head>
		<title>Battle</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/battle.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

		<style>
			body{
				background-color: #3d3d43;
			}
			#particles-js{
			width: 100%;
			height: 100%;
			position: fixed;
			}
		</style>
	</head>
	<body>
		<div id="particles-js"></div>

		<div class="inicio" style="margin-right: 4px;">
			<a href="../index.html">
				<img src="../img_battle/home.png" alt="imagen" width="80" heigth="10"/>
			</a>
		</div>

		<div class="text-color">
			
			<?php

				function curl($p1)
				{
					$ch=curl_init();
					$all=[CURLOPT_URL=>$p1, CURLOPT_USERAGENT=>'DannyAndres', CURLOPT_RETURNTRANSFER=>true, CURLOPT_SSL_VERIFYPEER=>false];
					curl_setopt_array($ch, $all);
					$curl_final=curl_exec($ch);
					$json=json_decode($curl_final, true);
					curl_close($ch);

					return $json;
				}

				$user1=$_POST["user1"];
				$user2=$_POST["user2"];
				$url_profile1="https://api.github.com/users/".$user1;
				$url_profile2="https://api.github.com/users/".$user2;
				$url_repo1="https://api.github.com/users/".$user1."/repos";
				$url_repo2="https://api.github.com/users/".$user2."/repos";
				$url1="https://api.github.com/users/".$user1."/events";
				$url2="https://api.github.com/users/".$user2."/events";
			?>

			<div> <!--Usuario numero 1-->

				<div class="izquierda-battle-php">
					<?php
						$json_profile1= curl($url_profile1);
						$json_repo1= curl($url_repo1);
					?>
					<img class="imagen-usuario" width="246" heigth="184" src='<?php echo $json_profile1["avatar_url"]; ?>' alt='<?php $json_profile1["name"]?>'>
					<br>
					<?php

						foreach ($json_repo1 as $var) { 

							$suma=$suma+$var["stargazers_count"];
								
						} 

						$created = substr("Creado en:"." ".$json_profile1["created_at"], 0, -10);
						$updated = substr("Ultimo uso:"." ".$json_profile1["updated_at"], 0, -10);



						if ($json_profile1["login"]==null) {
							echo "<br>";
							echo "<h2>Este usuario<h2/>";
							echo "<h2>no existe<h2/>";
							echo "<p>porfavor<p>";
							echo "<p>intentelo nuevamente</p>";
							echo "<br>";
						}
						elseif ($json_profile1["name"]==null) {
							echo "Nombre:"." "."Sin Nombre"."<br>";
							echo "Usuario:"." ".$json_profile1["login"]."<br>";
							echo "Seguidores:"." ".$json_profile1["followers"]."<br>";
							echo "Siguiendo:"." ".$json_profile1["following"]."<br>";
							echo "Estrellas Totales: ".$suma."<br>";
							echo $created."<br>";
							echo $updated."<br>";
						}
						else{
							echo "Nombre:"." ".$json_profile1["name"]."<br>";
							echo "Usuario:"." ".$json_profile1["login"]."<br>";
							echo "Seguidores:"." ".$json_profile1["followers"]."<br>";
							echo "Siguiendo:"." ".$json_profile1["following"]."<br>";
							echo "Estrellas Totales: ".$suma."<br>";
							echo $created."<br>";
							echo $updated."<br>";
						}

					?>

					<nav style="font-size: 18px;">
						<a href="stars.php" style="color: grey;">Estrellas totales<br>por repositorio</a>
					</nav>
					
				</div>

				<div class="centro-izquierda-battle-php">

					<h1 class="texto">Puntaje Total</h1>
					<?php

						$json_events1= curl($url1);

						$push=0; 
						$create=0;
						$issues=0;
						$commit=0;
						$otro=0;
						$puntaje=0; 

						foreach ($json_events1 as $var) {
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

						if ($json_profile1[login]=="") {
							$otro=$otro-2;
							$puntaje=$puntaje-2;
						}

						$final_score= (0.4*$puntaje)+(0.4*$suma)+(0.2*$json_profile1["followers"]);
					
						echo "GitHub Score: "." ".$final_score."<br>";
					?>
					<h2 class="texto">Eventos</h2>
					<?php
						echo "PushEvent:"." ".$push."<br>";
						echo "CreateEvent:"." ".$create."<br>";
						echo "IssuesEvent:"." ".$issues."<br>";
						echo "CommitCommentEvent:"." ".$commit."<br>";
						echo "Otros:"." ".$otro."<br>";

					?>

				</div>
			</div>

			<div> <!--Usuario numero 2-->

				<div class="centro-derecha-battle-php">
					<?php
						$json_profile2= curl($url_profile2);
						$json_repo2= curl($url_repo2);
					?>
					<img class="imagen-usuario" width="246" heigth="184" src='<?php echo $json_profile2["avatar_url"]; ?>' alt='<?php $json_profile2["name"]?>'>
					<br>
					<?php

						foreach ($json_repo2 as $var2) { 

							$suma2=$suma2+$var2["stargazers_count"];
								
						} 

						$created = substr("Creado en:"." ".$json_profile2["created_at"], 0, -10);
						$updated = substr("Ultimo uso:"." ".$json_profile2["updated_at"], 0, -10);



						if ($json_profile2["login"]==null) {
							echo "<br>";
							echo "<h2>Este usuario<h2/>";
							echo "<h2>no existe<h2/>";
							echo "<p>porfavor<p>";
							echo "<p>intentelo nuevamente</p>";
							echo "<br>";
						}
						elseif ($json_profile2["name"]==null) {
							echo "Nombre:"." "."Sin Nombre"."<br>";
							echo "Usuario:"." ".$json_profile2["login"]."<br>";
							echo "Seguidores:"." ".$json_profile2["followers"]."<br>";
							echo "Siguiendo:"." ".$json_profile2["following"]."<br>";
							echo "Estrellas Totales: ".$suma2."<br>";
							echo $created."<br>";
							echo $updated."<br>";
						}
						else{
							echo "Nombre:"." ".$json_profile2["name"]."<br>";
							echo "Usuario:"." ".$json_profile2["login"]."<br>";
							echo "Seguidores:"." ".$json_profile2["followers"]."<br>";
							echo "Siguiendo:"." ".$json_profile2["following"]."<br>";
							echo "Estrellas Totales: ".$suma2."<br>";
							echo $created."<br>";
							echo $updated."<br>";
						}

					?>

					<nav style="font-size: 18px;">
						<a href="stars.php" style="color: grey;">Estrellas totales<br>por repositorio</a>
					</nav>
					
				</div>

				<div class="derecha-battle-php">

					<h1 class="texto">Puntaje Total</h1>
					<?php

						$json_events2= curl($url2);

						$push2=0; 
						$create2=0;
						$issues2=0;
						$commit2=0;
						$otro2=0;
						$puntaje2=0; 

						foreach ($json_events2 as $var) {
							if($var['type'] == "PushEvent"){
								$puntaje2 = $puntaje2 + 5;
								$push2=$push2+1;
							}
							elseif ($var['type'] == "CreateEvent") {
								$puntaje2 = $puntaje2 + 4;
								$create2=$create2+1;
							}
							elseif ($var['type'] == "IssuesEvent") {
								$puntaje2 = $puntaje2 + 3;
								$issues2=$issues2+1;
							}
							elseif ($var['type'] == "CommitCommentEvent") {
								$puntaje2 = $puntaje2 + 2;
								$commit2=$commit2+1;
							}
							else {
								$puntaje2 = $puntaje2 + 1;
								$otro2=$otro2+1;
							}
						}

						if ($json_profile2[login]=="") {
							$otro2=$otro2-2;
							$puntaje2=$puntaje2-2;
						}

						$final_score2= (0.4*$puntaje2)+(0.4*$suma2)+(0.2*$json_profile2["followers"]);
					
						echo "GitHub Score: "." ".$final_score2."<br>";
					?>
					<h2 class="texto">Eventos</h2>
					<?php
						echo "PushEvent:"." ".$push2."<br>";
						echo "CreateEvent:"." ".$create2."<br>";
						echo "IssuesEvent:"." ".$issues2."<br>";
						echo "CommitCommentEvent:"." ".$commit2."<br>";
						echo "Otros:"." ".$otro2."<br>";

					?>

				</div>
			</div>


		    <div>
		    	<?php
		    		if (!(is_null($json_profile1["login"])) or !(is_null($json_profile1["login"]))) {
		    			?>
							<div class="win-user1">
								<?php

									if ($final_score>$final_score2) {
										?>
										<img src='../img_battle/win.png'>
									<?php } ?> <!--NO DEJAR JUNTO, DA ERROR-->
							</div>



							<div class="win-user2">
								<?php

									if ($final_score2>$final_score) {
										?>
										<img src='../img_battle/win.png'>
									<?php } ?> <!--NO DEJAR JUNTO, DA ERROR-->
							</div>



							<div class="winner">
								<?php

									if (($final_score>$final_score2)or($final_score2>$final_score)) {
										?>
										<img style="border-radius: 25px;" width="150" heigth="70" src='../img_battle/winner2.jpg'>

								<?php } ?>
							</div>



							<div class="winner2">
								<?php
									if ($final_score>$final_score2) {
										?>
										<p style='font-size: 40px;' class='pacifico img-winner'>
											<?php
											echo $user1;
											?>
										</p>
									 	
								<?php } ?>
							</div>



							<div class="winner2">
								<?php
									if ($final_score2>$final_score) {
										?>
										<p style='font-size: 40px;' class='pacifico img-winner'>
											<?php
											echo $user2;
											?>
										</p>
									 	
								<?php } ?>
							</div>


							<div class="winner2">
								<?php
									if ($final_score2==$final_score) {
										?>
										<p style='font-size: 40px; margin-top: -70px;' class='pacifico img-winner'>
											Empate!!!
										</p>
									 	
								<?php } ?>

							</div>
				<?php } ?>		
			</div>
		</div>

		<script src="../js/particles.js"></script>
		<script src="../js/app.js"></script>


	</body>
</html>