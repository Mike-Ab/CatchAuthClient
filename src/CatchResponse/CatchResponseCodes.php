<?php
/**
 * Created by PhpStorm.
 * User: mohammada
 * Date: 12/9/2016
 * Time: 1:20 PM
 */

namespace CatchResponse;


class CatchResponseCodes
{
    public static $responseCodes = [

        '205' => 'AUTHENTICATED',
        '405' => 'MISSING INPUT',
        '605' => 'INVALID USERNAME AND-OR PASSWORD',
        '606' => 'ACCOUNT DELETED',
        '607' => 'ACCOUNT INACTIVE',
        '705' => 'UNKNOWN REQUEST',
        '706' => 'UNKNOWN REQUEST METHOD',
        '805' => 'DATABASE ERROR',
        '806' => 'QUERY STRING ERROR',
        '905' => 'UNTRUSTED CONNECTION',

    ];

    public static function getMessage($code)
    {
        return self::$responseCodes[$code];
    }
}