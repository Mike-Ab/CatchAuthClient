<?php
namespace CatchAuthClient;

use CatchAuthClient\CatchResponse\Response;
use CatchResponse\CatchResponse;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;

class CatchHttpService
{

    private static $urls = [
        'authenticate' => 'http://127.0.0.1/catchsolutions/catchAuth/legacy/index.php', // http://auth.catchsolutions.com.au/
        'check' => 'http://127.0.0.1/catchsolutions/catchAuth/legacy/check/index.php', // http://auth.catchsolutions.com.au/
        'addUser' => 'http://127.0.0.1/catchsolutions/catchAuth/legacy/addUser/index.php', // http://auth.catchsolutions.com.au/
        'listUsers' => 'http://127.0.0.1/catchsolutions/catchAuth/legacy/listUsers/index.php', // http://auth.catchsolutions.com.au/
        'setPass' => 'http://127.0.0.1/catchsolutions/catchAuth/legacy/setPass/index.php', // http://auth.catchsolutions.com.au/
    ];

    private static $defaultOperationUrl = 'http://127.0.0.1/catchsolutions/catchAuth/legacy/operations/index.php'; // http://auth.catchsolutions.com.au/

    public static function execute(CatchHttpParams $params, $method = 'GET')
    {
        try {
            $http = new Guzzle(['verify' => false]);
            $attempt = $http->request($method, self::getUrl(debug_backtrace()[1]['function']), [
                'query' => $params::getParams()
            ]);
            $return = (new Response($attempt->getBody()))->handle();
            $params::reset();
            return $return;
        } catch (ClientException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    public static function getUrl($operation)
    {
        return array_key_exists($operation, self::$urls) ? self::$urls[$operation] : self::$defaultOperationUrl;
    }
}