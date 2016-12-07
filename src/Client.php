<?php
/**
 * Created by PhpStorm.
 * User: mohammada
 * Date: 12/2/2016
 * Time: 1:23 PM
 */

namespace CatchAuthClient;



class Client
{
    public function addUser($email, $name)
    {
        $url = self::mAuth_addUser_URL;
        $parameters = '';
        $parameters = $this->utl->setParameter('uemail',$email,$parameters);
        $parameters = $this->utl->setParameter('uname',$real_name,$parameters);
        $mAuth_socket = $this->utl->sendCurlRequest($url, $parameters);
        $response = json_decode ($mAuth_socket,true);
        return $response;
    }
}