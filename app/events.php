<?php

namespace app;

class events
{
    private $user;
    public $score;
    public $push;
    public $create;
    public $issues;
    public $commit;
    public $other;

    public function __construct($json_events)
    {
        $this->events = $json_events;

        $this->score = 0;
        $this->push = 0;
        $this->create = 0;
        $this->issues = 0;
        $this->commit = 0;
        $this->other = 0;

        $this->setEvents();
    }

    public function setEvents()
    {
    	foreach ($this->events as $i) {
			if($i->type == "PushEvent"){
				$this->score = $this->score + 5;
				$this->push=$this->push+1;
			}
			elseif ($i->type == "CreateEvent") {
				$this->score = $this->score + 4;
				$this->create=$this->create+1;
			}
			elseif ($i->type == "IssuesEvent") {
				$this->score = $this->score + 3;
				$this->issues=$this->issues+1;
			}
			elseif ($i->type == "CommitCommentEvent") {
				$this->score = $this->score + 2;
				$this->commit=$this->commit+1;
			}
			else {
				$this->score = $this->score + 1;
				$this->other=$this->other+1;
			}
    	}
    }

    public function showEventsScore()
    {
    	return $this->score;	
    }

    public function showEventsPush()
    {
    	return $this->push;
    }

    public function showEventsCreate()
    {
    	return $this->create;
    }

    public function showEventsIssues()
    {
    	return $this->issues;
    }

    public function showEventsCommit()
    {
    	return $this->commit;
    }

    public function showEventsOther()
    {
    	return $this->other;
    }
}


    	
    	
    	
    	