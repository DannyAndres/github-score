<?php

namespace app;

class user
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function getUsername()
    {
        return $this->user->name;
    }

    public function getUserlogin()
    {
        return $this->user->login;
    }

    public function getUserfollowers()
    {
        return $this->user->followers;
    }

    public function getUserfollowing()
    {
        return $this->user->following;
    }

    public function getUsercreated()
    {
        return $this->user->created_at;
    }

    public function getUserupdated()
    {
        return $this->user->updated_at;
    }

    public function getUseravatar()
    {
        return $this->user->avatar_url;
    }
}
