<?php

	$created = substr($firstUser->getUsercreated(), 0, -10);
	$updated = substr($firstUser->getUserupdated(), 0, -10);

	echo "Nombre:"." ";
	echo $firstUser->getUsername()."<br>";
	echo "Usuario:"." ";
	echo $firstUser->getUserlogin()."<br>";
	echo "Seguidores:"." ";
	echo $firstUser->getUserfollowers()."<br>";
	echo "Siguiendo:"." ";
	echo $firstUser->getUserfollowing()."<br>";
	echo "Estrellas:"." ";
	echo $firstUser_repo->showStars()."<br>";
	echo "Creado en:"." ";
	echo $created."<br>";
	echo "Ultimo uso:"." ";
	echo $updated."<br>";