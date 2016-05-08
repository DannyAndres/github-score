<?php

  	function valid_event($evento){
		$arrayevents=["PushEvent","CreateEvent","IssuesEvent","CommitCommentEvent"];
		for ($i=0; $i < count($arrayevents); $i++) { 
			if ($evento == $arrayevents[i]) {
				return true;
			}
		}
		return false;
	}


/*-----------------------OBTENER EL JSON DESDE LA URL Y ASIGNANDOLE UNA VARIABLE------------------------------------*/

  	$user=$_POST["user"];
  	$url="https://api.github.com/users/".$user."/events";
  	$url_profile="https://api.github.com/users/".$user;
  
  
  	$ch=curl_init();                                       //inicio el curl
	curl_setopt($ch, CURLOPT_URL, $url);                   //fijo la url
	curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');    //user, para acceder a github
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        //si el user existe te muestra info.
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);       //si no existe, tira un mensaje

	$curl_response=curl_exec($ch);                         /*curl exec ejecuta la peticion html asignandole una   
                                                           variable..... la peticion html es el json que obtenemos*/

	$json=json_decode($curl_response);                     //codifico el json(array) que antes nombramos curl response

	curl_close($ch);                                       //cierro el curl

?>
