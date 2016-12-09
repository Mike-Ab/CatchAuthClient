<?php

namespace CatchAuthClient;



class Client
{
    private $authKey = false;
    private $serviceKey = false;

    public function __construct($authKey, $serviceKey = false)
    {
        if ($serviceKey){
            $this->serviceKey = $serviceKey;
        }

        $this->authKey = $authKey;
    }

    public function addUser($email, $name)
    {
        return CatchHttpService::execute(
            (new CatchHttpParams($this->authKey))->setUemail($email)->setUname($name)
        );
    }

    public function listUsers()
    {
        return CatchHttpService::execute((new CatchHttpParams($this->authKey)));
    }

}