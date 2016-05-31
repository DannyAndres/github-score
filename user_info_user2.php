
<?php 
	require 'vendor/autoload.php';

	use app\request;
	use app\user;


	// load .env
	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();

	// api request
	$request = new request();
	$user = $request->getUser($user1);
	//$user1 = $request->getUser($user1);

	$secondUser = new user(json_decode($user));

	//$secondUser = new user(json_decode($user1));
	
	//echo $firstUser->getUserlogin();

	