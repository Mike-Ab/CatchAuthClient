<?php
namespace CatchAuthClient;



class CatchHttpParams
{
    /**
     * @var
     */
    protected static $uemail = null;
    /**
     * @var
     */
    protected static $uname = null;

    /**
     * @var
     */
    protected static $authKey = null;


    public function __construct($authKey)
    {
        self::$authKey = $authKey;
    }

    /**
     * Reset the instance
     */
    public static function reset()
    {
        $persistent = [];

        foreach (get_class_vars(self::class) as $name => $value){
            if (!in_array($name, $persistent)) {
                self::$$name = null;
            }
        }
    }

    /**
     * Generates prepared params for the call to Zoho
     *
     * @return array
     */
    public static function getParams()
    {
        $params = [];
        foreach (get_class_vars(self::class) as $name => $value){
            if (isset(self::$$name)) {
                $params[$name] = $value;
            }
        }
        return $params;
    }

    /**
     * @param mixed $uemail
     * @return $this
     */
    public function setUemail($uemail)
    {
        self::$uemail = $uemail;
        return $this;
    }

    /**
     * @param mixed $uname
     * @return $this
     */
    public function setUname($uname)
    {
        self::$uname = $uname;
        return $this;
    }

}
