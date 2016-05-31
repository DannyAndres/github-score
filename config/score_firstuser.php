<?php
	echo "PushEvent:"." ";
	echo $eventos->showEventsPush()."<br>";
	echo "CreateEvent:"." ";
	echo $eventos->showEventsCreate()."<br>";
	echo "IssuesEvent:"." ";
	echo $eventos->showEventsIssues()."<br>";
	echo "CommitCommentEvent:"." ";
	echo $eventos->showEventsCommit()."<br>";
	echo "Otros:"." ";
	echo $eventos->showEventsOther()."<br>";
