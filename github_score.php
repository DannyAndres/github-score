<!DOCTYPE html>
<html>
<head>
	<title>GithubScore</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>
<body background="img/fondo-2.jpg">
<div class="col-md-3 espacio-arriba text-color text-center texto">
	<?php 
				$user=$_POST["user"];
				$url_profile="https://api.github.com/users/".$user;

				$ch=curl_init();                                       //inicio el curl
				curl_setopt($ch, CURLOPT_URL, $url_profile);                   //fijo la url
				curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');    //user, para acceder a github
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        //si el user existe te muestra info.
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);       //si no existe, tira un mensaje

				$curl_profile=curl_exec($ch);                          /*curl exec ejecuta la peticion html 
				                                                       asignandole una variable..... la peticion html es el json que obtenemos*/

				$json2=json_decode($curl_profile, true);              /*codifico el json(array) que antes nombramos 
				                                                      curl response*/

				curl_close($ch);
				$json2=json_decode($curl_profile, true);

		if (($json2[followers]==0)and($json2[name]==!"")) {
			?>
			<h1>Tus Seguidores son:</h1> 
			<br>
			<h1>CERO!</h1>
			<?php } ?>
	<?php 
		if ($json2[name]=="") {
	?>
		<img width="246" heigth="184" src='img/lol.png'> 
	<?php } ?>
</div>
<div class="col-md-6 center-block quitar-float text-color">

	<div class="col-md-6 espacio-arriba-imagen">
		<div>
			<?php
				
				$user=$_POST["user"];
				$url_profile="https://api.github.com/users/".$user;

				$ch=curl_init();                                       //inicio el curl
				curl_setopt($ch, CURLOPT_URL, $url_profile);                   //fijo la url
				curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');    //user, para acceder a github
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        //si el user existe te muestra info.
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);       //si no existe, tira un mensaje

				$curl_profile=curl_exec($ch);                          /*curl exec ejecuta la peticion html 
				                                                       asignandole una variable..... la peticion html es el json que obtenemos*/

				$json2=json_decode($curl_profile, true);              /*codifico el json(array) que antes nombramos 
				                                                      curl response*/

				curl_close($ch);
			?>

			<img class="img-rounded" width="246" heigth="184" src='<?php echo $json2[avatar_url]; ?>' alt='<?php $json2[name]?>' >
			<br><br>

		</div>
		<div>
		
			<?php



				$user=$_POST["user"];
				$url_profile="https://api.github.com/users/".$user;

				$ch=curl_init();                                       //inicio el curl
				curl_setopt($ch, CURLOPT_URL, $url_profile);                   //fijo la url
				curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');    //user, para acceder a github
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        //si el user existe te muestra info.
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);       //si no existe, tira un mensaje

				$curl_profile=curl_exec($ch);                         /*curl exec ejecuta la peticion html 
				                                                      asignandole una variable..... la peticion html es el json que obtenemos*/

				$json2=json_decode($curl_profile, true);              /*codifico el json(array) que antes nombramos
				                                                      curl response*/

				curl_close($ch);  
			
				if ($json2[name]=="") {
					echo "<h2>Este usuario<h2/>";
					echo "<h2>no existe<h2/>";
					echo "<p>porfavor intentelo nuevamente</p>";
				}
				else{
					echo "Nombre:"." ".$json2[name]."<br>";
					echo "Usuario:"." ".$json2[login]."<br>";
					echo "Seguidores:"." ".$json2[followers]."<br>";
					echo "Siguiendo:"." ".$json2[following]."<br>";
					echo "Creado en:"." ".$json2[created_at]."<br>";
					echo "Ultima uso:"." ".$json2[updated_at]."<br>";
				}
			?>
			<nav>
		
				<a href="/GithubScore/index.html">Volver</a>

			</nav>
		</div>
	</div>
	<br>
	<div class="col-md-6 espacio-arriba">

		<h1 class="texto">Puntaje Total</h1>
		
		<?php

 			/*-------------OBTENER EL JSON DESDE LA URL Y ASIGNANDOLE UNA VARIABLE-------------------------*/

 			$user=$_POST["user"];
			$url="https://api.github.com/users/".$user."/events";

			$ch=curl_init();                                       //inicio el curl
			curl_setopt($ch, CURLOPT_URL, $url);                   //fijo la url
			curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');    //user, para acceder a github
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        //si el user existe te muestra info.
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);       //si no existe, tira un mensaje

			$curl_response=curl_exec($ch);                         /*curl exec ejecuta la peticion html asignandole una   
                                                           variable..... la peticion html es el json que obtenemos*/

			$json=json_decode($curl_response, true);                     //codifico el json(array) que antes nombramos curl response

			curl_close($ch);                                       //cierro el curl

			/*---------------------------------------------------------------------------------------------*/

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

			/*---------------------------------------------------------------------------------------------*/

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

			if ($json2[name]=="") {
				$otro=$otro-2;
				$puntaje=$puntaje-2;
				/*estos ajustes de variable estan hechos debido a que el programa toma dos otros los cuales son
				desconocidos..... 
				cuando coloco un nombre que no existe toma dos otros y automaticamente empieza con dos puntos
				extras, por lo que para arreglar ese error le e de restar los puntos al puntaje total y al
				evento otros*/

			}
			
			echo "GitHub Score: "." ".$puntaje."<br>";
			?>
			<h2 class="texto">Eventos</h2><br>
			<?php
			echo "PushEvent:"." ".$push."<br>";
			echo "CreateEvent:"." ".$create."<br>";
			echo "IssuesEvent:"." ".$issues."<br>";
			echo "CommitCommentEvent:"." ".$commit."<br>";
			echo "Otros:"." ".$otro."<br>";

		?>


	</div>
	
</div>
<div class="col-md-3 espacio-arriba">
	<?php 
		if (($json2[followers]==0)and($json2[name]==!"")) {
	?>
		<img width="246" heigth="184" src='img/foreveralone.png'> 
	<?php } ?>
	<?php 
		if ($json2[name]=="") {
	?>
		<img width="246" heigth="184" src='img/trollface.png'> 
	<?php } ?>

</div>


</body>
</html>
