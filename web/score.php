<!DOCTYPE html>
<html>
	<head>
		<title>Puntaje</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/main.css">
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

		<div class="text-color" id="particles-js">
	<!--____________________________________________________________________________________________________________-->
			<div class="izquierda">

				<div>	
					<?php
					
						/*declaramos el curl para poder codificar el json con los datos*/
						/*el curl se repite varias veces en el codigo ya que necesito las variables codificadas mas 
						de una vez, en futuras ediciones se editara para hacerlo mas eficaz*/


						$user=$_POST["user"];
						$url_profile="https://api.github.com/users/".$user;
						
						$ch=curl_init();                                       
						curl_setopt($ch, CURLOPT_URL, $url_profile);   
						curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');                    
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);       
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      

						$curl_profile=curl_exec($ch);                         
						$json2=json_decode($curl_profile, true);              

						curl_close($ch);

					?>
					<img class="imagen-usuario" width="246" heigth="184" src='<?php echo $json2["avatar_url"]; ?>' alt='<?php $json2["name"]?>' >
				</div>

			<!--_______________________________________________________________________________________________________-->

			
				<div>
			
					<?php



						$user=$_POST["user"];
						$url_profile="https://api.github.com/users/".$user;
						$url_repo="https://api.github.com/users/".$user."/repos";

						$ch=curl_init();                                       //inicio el curl
						curl_setopt($ch, CURLOPT_URL, $url_profile);                   //fijo la url
						curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');   
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        //si el user existe te muestra info.
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);       //si no existe, tira un mensaje
						$curl_profile=curl_exec($ch);   
						$json2=json_decode($curl_profile, true);              
						curl_close($ch);  

						$ch=curl_init();                                       
						curl_setopt($ch, CURLOPT_URL, $url_repo); 
						curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');                   
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);       
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      
						$curl_repo=curl_exec($ch);                    
						$json_repo=json_decode($curl_repo, true);          
						curl_close($ch);  

						foreach ($json_repo as $var) { 

							$suma=$suma+$var["stargazers_count"];
						
						} 

						$created = substr("Creado en:"." ".$json2["created_at"], 0, -10);
						$updated = substr("Ultimo uso:"." ".$json2["updated_at"], 0, -10);



						if ($json2["login"]==null) {
							echo "<br>";
							echo "<h2>Este usuario<h2/>";
							echo "<h2>no existe<h2/>";
							echo "<p>porfavor<p>";
							echo "<p>intentelo nuevamente</p>";
							echo "<br>";
						}
						elseif ($json2["name"]==null) {
							echo "Nombre:"." "."Sin Nombre"."<br>";
							echo "Usuario:"." ".$json2["login"]."<br>";
							echo "Seguidores:"." ".$json2["followers"]."<br>";
							echo "Siguiendo:"." ".$json2["following"]."<br>";
							echo "Estrellas Totales: ".$suma."<br>";
							echo $created."<br>";
							echo $updated."<br>";
						}
						else{
							echo "Nombre:"." ".$json2["name"]."<br>";
							echo "Usuario:"." ".$json2["login"]."<br>";
							echo "Seguidores:"." ".$json2["followers"]."<br>";
							echo "Siguiendo:"." ".$json2["following"]."<br>";
							echo "Estrellas Totales: ".$suma."<br>";
							echo $created."<br>";
							echo $updated."<br>";
						}
					?>
					<nav style="font-size: 18px;">
						<a href="stars.php" style="color: grey;">Estrellas totales<br>
						 por repositorio</a>
						<br>
						<br>
						<a href="../index.html" style="color: grey;">Volver</a>
					</nav>
				</div>

			</div>
	<!--____________________________________________________________________________________________________________-->
			<div class="al-medio">

				<div>

					<h1 class="texto">Puntaje Total</h1>
			
					<?php

	 					/*-------------OBTENER EL JSON DESDE LA URL Y ASIGNANDOLE UNA VARIABLE-----------------*/

	 					$user=$_POST["user"];
						$url="https://api.github.com/users/".$user."/events";

						$ch=curl_init();                                       //inicio el curl
						curl_setopt($ch, CURLOPT_URL, $url);                   //fijo la url
						curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres'); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        //si el user existe te muestra info.
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);       //si no existe, tira un mensaje

						$curl_response=curl_exec($ch);                         /*curl exec ejecuta la peticion html asignandole una variable..... la peticion html es el json que obtenemos*/

						$json=json_decode($curl_response, true);                     //codifico el json(array) que antes nombramos curl response

						curl_close($ch);                                       //cierro el curl

						/*-------------------------------------------------------------------------------------*/

							$push=0;                       //numero de eventos por separado
							$create=0;
							$issues=0;
							$commit=0;
							$otro=0;

							$puntaje=0;                    //puntaje total

							/*
							PushEvent: Otorga 5
							CreateEvent: Otorga 4
							IssuesEvent: Otorga 3
							CommitCommentEvent: Otorga 2
							otro: Otorga 1
							*/

						/*-------------------------------------------------------------------------------------*/

						foreach ($json as $var) {
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

						if ($json2[login]=="") {
							$otro=$otro-2;
							$puntaje=$puntaje-2;
							/*estos ajustes de variable estan hechos debido a que el programa toma dos otros los cuales son desconocidos..... cuando coloco un usuario que no existe toma dos otros y automaticamente empieza con dos puntos extras, por lo que para arreglar ese error le e de restar los puntos al puntaje total y al evento otros*/
						}

						$final_score= (0.4*$puntaje)+(0.4*$suma)+(0.2*$json2["followers"]);
				
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
	<!--____________________________________________________________________________________________________________-->
			<div class="derecha" style="margin-right: -50px; margin-top: 130px;">

				<div><h2 class="texto">El calculo final del puntaje</h2></div>
				<div><h2 class="texto">se calcula ponderando</h2></div>
				<div><h2 class="texto">los puntajes totales</h2></div>
				<div><h2 class="texto">de la siguiente forma: </h2></div>
				<div style=" background-color: #750a16; border-radius: 10px;"><p>&nbsp&nbsp40% de Puntaje por los Eventos +</p></div>
				<div style=" background-color: #750a16; border-radius: 10px;"><p>&nbsp&nbsp40% de Estrellas Totales +</p></div>
				<div style=" background-color: #750a16; border-radius: 10px;"><p>&nbsp&nbsp20% de Numero de seguidores</p></div>

			</div>
	<!--____________________________________________________________________________________________________________-->
		</div>

		<script src="../js/particles.js"></script>
		<script src="../js/app.js"></script>

	</body>
</html>