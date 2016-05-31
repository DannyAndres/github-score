<?php
	echo "PushEvent:"." ";
	echo $eventos_user2->showEventsPush()."<br>";
	echo "CreateEvent:"." ";
	echo $eventos_user2->showEventsCreate()."<br>";
	echo "IssuesEvent:"." ";
	echo $eventos_user2->showEventsIssues()."<br>";
	echo "CommitCommentEvent:"." ";
	echo $eventos_user2->showEventsCommit()."<br>";
	echo "Otros:"." ";
	echo $eventos_user2->showEventsOther()."<br>";
