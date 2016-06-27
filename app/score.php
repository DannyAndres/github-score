<?php

namespace app;

class score
{
    protected $username;
    protected $score;
    protected $login;

    public function getUsername()
    {
        return $this->username;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getUserlogin()
    {
        return $this->login;
    }
}
