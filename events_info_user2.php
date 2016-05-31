<?php  

	require 'vendor/autoload.php';

	use app\request;
	use app\events;

	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();

	$request = new request();
	$events = $request->getEvents($user1);
	//$events1 = $request->getEvents($user1);

	$eventos_user2 = new events(json_decode($events));
	//$eventos_secondUser = new events($events1);
	//echo $eventos->showEventsPush();
	//$eventos->showEventsScore();

	//$eventos->showEventsScore();  -> para sacar el score
	