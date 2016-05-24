<?php

	require '../composer/vendor/autoload.php';

	$client = new GuzzleHttp\Client();
	
	$res = $client->request('GET', 'https://api.github.com/user', [
	    'auth' => ['DannyAndres','danny12345']
	]);
	
	echo $res->getBody();



	