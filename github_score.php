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


?>
