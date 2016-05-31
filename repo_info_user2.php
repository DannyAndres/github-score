
<?php 
	require 'vendor/autoload.php';

	use app\request;
	use app\repos;


	// load .env
	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();

	// api request
	$request = new request();
	$user_repo = $request->getRepos($user1);
	

	$secondUser_repo = new repos(json_decode($user_repo));
	//echo $firstUser_repo->showStars();

	