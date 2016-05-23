<?php

	function curl($p1)
	{
		$ch=curl_init();
		$all=[CURLOPT_URL=>$p1, CURLOPT_USERAGENT=>'DannyAndres', CURLOPT_RETURNTRANSFER=>true, CURLOPT_SSL_VERIFYPEER=>false];
		curl_setopt_array($ch, $all);
		$curl_final=curl_exec($ch);
		$json=json_decode($curl_final, true);
		curl_close($ch);

		return $json;
	}

/*____________________________________________________________________*/

	$user0=$_POST["user0"];

	$user1=$_POST["user1"];

	$user2=$_POST["user2"];

	$url_profile0="https://api.github.com/users/".$user0;

	$url_profile1="https://api.github.com/users/".$user1;

	$url_profile2="https://api.github.com/users/".$user2;

	$url_repo0="https://api.github.com/users/".$user0."/repos";

	$url_repo1="https://api.github.com/users/".$user1."/repos";

	$url_repo2="https://api.github.com/users/".$user2."/repos";

	$url_events0="https://api.github.com/users/".$user0."/events";

	$url_events1="https://api.github.com/users/".$user1."/events";

	$url_events2="https://api.github.com/users/".$user2."/events";

/*____________________________________________________________________*/

	$json_profile0 = curl($url_profile0);
	$json_repo0 = curl($url_repo0);
	$json_events0 = curl($url_events0);

	$json_profile1 = curl($url_profile1);
	$json_repo1 = curl($url_repo1);
	$json_events1 = curl($url_events1);

	$json_profile2 = curl($url_profile2);
	$json_repo2 = curl($url_repo2);
	$json_events2 = curl($url_events2);


