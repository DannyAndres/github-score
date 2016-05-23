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
							