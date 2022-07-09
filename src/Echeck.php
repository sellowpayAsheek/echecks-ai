<?php

namespace Ocw\Echeck;

use InvalidArgumentException;
use Ocw\Echeck\Exceptions\EcheckTokenException;
use Ocw\Echeck\Resources\Connector;

class Echeck
{
    private static $token;
    private static $enviroment;
    private $connector;

    public function __construct($token = null,$enviroment = "LIVE")
    {
        if($token === null){
            if(self::$token === null){
                $msg = 'No token Provided. Please provide token globally or use Echeck::setToken' ;
                throw new EcheckTokenException($msg);
            }
        }else{
            self::validateToken($token);
            self::$token = $token ;
        }

        self::setEnviroment($enviroment);
        $this->connector = new Connector(self::$token,self::$enviroment);
    }

    public static function setToken($token)
    {
        self::validateToken($token);
        self::$token = $token ;
    }

    private static function validateToken($token)
    {
        if (!is_string($token) || strlen($token) < 10) {
            throw new \InvalidArgumentException('Invalid Token');
        }

        return true;
    }
    
    public static function setEnviroment($enviroment = "LIVE")
    {
        if(empty(self::$enviroment)){
            self::$enviroment = $enviroment ;
        }

    }

    public function mailAcheck(array $data): array
    {
        return $this->connector->sendRequest('post','check/mail',$data);
    }
}
