<?php

require 'vendor/autoload.php';

use app\request;
use app\user;
use app\events;
use app\repos;
use app\database;
use app\score;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$objDatabase = new database();
$score = new score();

Flight::route('GET /', function () {
    return view('form.html');
});

$request = new request();

Flight::route('POST /', function () use ($request, $objDatabase, $score) {

    $username = Flight::request()->data->username;
    $username2 = Flight::request()->data->username2;

    try {
        $user = $request->getUser($username);
        $User = new user(json_decode($user));

        $events = $request->getEvents($username);
        $eventos = new events(json_decode($events));

        $user_repo = $request->getRepos($username);
        $User_repo = new repos(json_decode($user_repo));

        $user2 = $request->getUser($username2);
        $User2 = new user(json_decode($user2));

        $events2 = $request->getEvents($username2);
        $eventos2 = new events(json_decode($events2));

        $user_repo2 = $request->getRepos($username2);
        $User_repo2 = new repos(json_decode($user_repo2));

        $finalScore=(0.4*$eventos->showEventsScore())+(0.4*$User_repo->showStars())+(0.2*$User->getUserfollowers());

        $finalScore2=(0.4*$eventos2->showEventsScore())+(0.4*$User_repo2->showStars())+(0.2*$User2->getUserfollowers());
        $error = false;

        $objDatabase->insertUser($User->getUserlogin(), $User->getUsername(), $finalScore);
        $objDatabase->insertUser($User2->getUserlogin(), $User2->getUsername(), $finalScore2);
    } catch (Exception $e) {
        return view('form.html', ['error' => true]);
        $error = true;
    }

    if (!$error) {
        return view('home.html', [
            'user1' => $User,
            'user2' => $User2,
            'events' => $eventos,
            'events2' => $eventos2,
            'repo' => $User_repo,
            'repo2' => $User_repo2,
            'finalScore1' => $finalScore,
            'finalScore2' => $finalScore2
        ]);
    }

});

Flight::route('/Ranking', function () use ($objDatabase, $score) {

    $ranking = 1;
    $scoreData = $objDatabase->getRanking('score');

    $inf = [
        'scoreData' => $scoreData,
        'ranking' => $ranking
    ];
    return view('table.html', $inf);
});

Flight::start();
