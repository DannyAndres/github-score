<?php

	foreach ($json_repo0 as $var) { 
		$suma=$suma+$var["stargazers_count"];	
	} 

	$created = substr("Creado en:"." ".$json_profile0["created_at"], 0, -10);
	$updated = substr("Ultimo uso:"." ".$json_profile0["updated_at"], 0, -10);



	if (is_null($json_profile0["login"])) {
		echo "<br>";
		echo "<h2>Este usuario<h2/>";
		echo "<h2>no existe<h2/>";
		echo "<p>porfavor<p>";
		echo "<p>intentelo nuevamente</p>";
		echo "<br>";
	}
	elseif (is_null($json_profile0["name"])) {
		echo "Nombre:"." "."Sin Nombre"."<br>";
		echo "Usuario:"." ".$json_profile0["login"]."<br>";
		echo "Seguidores:"." ".$json_profile0["followers"]."<br>";
		echo "Siguiendo:"." ".$json_profile0["following"]."<br>";
		echo "Estrellas Totales: ".$suma."<br>";
		echo $created."<br>";
		echo $updated."<br>";
	}
	else{
		echo "Nombre:"." ".$json_profile0["name"]."<br>";
		echo "Usuario:"." ".$json_profile0["login"]."<br>";
		echo "Seguidores:"." ".$json_profile0["followers"]."<br>";
		echo "Siguiendo:"." ".$json_profile0["following"]."<br>";
		echo "Estrellas Totales: ".$suma."<br>";
		echo $created."<br>";
		echo $updated."<br>";
	}
							