<?php
/**
 * Created by PhpStorm.
 * User: mohammada
 * Date: 12/9/2016
 * Time: 1:19 PM
 */

namespace CatchAuthClient\CatchResponse;


class Response
{
    protected $response;
    protected $responseJson = null;
    protected $result = null;
    protected $reason = null;
    protected $token = null;
    protected $authCode = null;
    protected $details = null;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function handle()
    {
        if (debug_backtrace()[3]['function'] === 'listUsers'){

        }else {
            $this->responseJson = json_decode($this->response, true);
            $this->token = ($this->responseJson['token']) ?: null;
            $this->result = ($this->responseJson['result']) ?: null;
            $this->reason = ($this->responseJson['reason']) ?: null;
            $this->authCode = ($this->responseJson['authCode']) ?: null;
        }
        return $this;
    }

    public function getResponseJson()
    {
        return $this->responseJson;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
}
