<?php
/**
 * Created by PhpStorm.
 * User: mohammada
 * Date: 12/7/2016
 * Time: 4:18 PM
 */

namespace CatchAuthClient;


class CatchHttpService
{
    const Auth_URL = mAuth_URL;
    const Auth_check = mAuth_check_URL;
    const Auth_addUser = mAuth_addUser_URL;
    const Auth_listUsers = mAuth_listUsers_URL;
    const Auth_setPass = mAuth_setPass_URL;
    const Auth_operations = mAuth_operations_URL;

    public static function execute(CatchHttpParams $params, $method = 'GET')
    {
        try {
            $http = new Client(['verify' => false]);
            $attempt = $http->request($method, self::generateURL($params::getRecordType()), [
                'form_params' => $params::getParams()
            ]);
            $return = (new ZohoResponse($attempt->getBody(), $params::getRecordType(), $params::getVersion()))
                ->handleResponse();
            $params::reset();
            return $return;
        } catch (ClientException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}