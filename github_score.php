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



  $user=$_POST["user"];
  $url="https://api.github.com/users/".$user."/events";
  $url_profile="https://api.github.com/users/".$user;


?>
