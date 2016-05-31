<?php

	$created2 = substr($secondUser->getUsercreated(), 0, -10);
	$updated2 = substr($secondUser->getUserupdated(), 0, -10);

	echo "Nombre:"." ";
	echo $secondUser->getUsername()."<br>";
	echo "Usuario:"." ";
	echo $secondUser->getUserlogin()."<br>";
	echo "Seguidores:"." ";
	echo $secondUser->getUserfollowers()."<br>";
	echo "Siguiendo:"." ";
	echo $secondUser->getUserfollowing()."<br>";
	echo "Estrellas:"." ";
	echo $secondUser_repo->showStars()."<br>";
	echo "Creado en:"." ";
	echo $created2."<br>";
	echo "Ultimo uso:"." ";
	echo $updated2."<br>";