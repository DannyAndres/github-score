<?php

	$created2 = substr("Creado en:"." ".$json_profile2["created_at"], 0, -10);
	$updated2 = substr("Ultimo uso:"." ".$json_profile2["updated_at"], 0, -10);



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
		echo $created2."<br>";
		echo $updated2."<br>";
	}
	else{
		echo "Nombre:"." ".$json_profile2["name"]."<br>";
		echo "Usuario:"." ".$json_profile2["login"]."<br>";
		echo "Seguidores:"." ".$json_profile2["followers"]."<br>";
		echo "Siguiendo:"." ".$json_profile2["following"]."<br>";
		echo "Estrellas Totales: ".$suma2."<br>";
		echo $created2."<br>";
		echo $updated2."<br>";
	}
							