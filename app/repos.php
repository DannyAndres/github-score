<?php

namespace app;

class repos
{
    private $stars;
    public $star_count;

    public function __construct($json_stars)
    {
        $this->stars = $json_stars;

        $this->getStars();
    }

    public function getStars()
    {
        foreach ($this->stars as $i) { 
		$this->star_count = $this->star_count + $i->stargazers_count;	
		} 
    }

    public function showStars()
    {
    	return $this->star_count;
    }
}

