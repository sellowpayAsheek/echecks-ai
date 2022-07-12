<?php

namespace Echeck;

use Echeck\Exceptions\EcheckTokenException;
use Echeck\Resources\Connector;
use InvalidArgumentException;


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
            throw new InvalidArgumentException('Invalid Token');
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
        return $this->connector->sendRequest('post','checkmail',$data);
    }

    public function emailAcheck(array $data): array
    {
        return $this->connector->sendRequest('post','checkemail',$data);
    }

    public function resendemailCheck(string $id): array
    {
        return $this->connector->sendRequest('post','checkemail/'.$id.'/resend');
    }


    public function viewCheckPdf(string $id): array
    {
        return $this->connector->sendRequest("get",'check/'.$id.'/view');
    }

    public function voidCheck(string $id): array
    {
        return $this->connector->sendRequest("get",'check/'.$id.'/void');
    }

    public function viewCheckStatement(string $id): array
    {
        return $this->connector->sendRequest("get",'check/'.$id.'/statement');
    }

    public function viewCheckDetails(string $id): array
    {
        return $this->connector->sendRequest("get",'check/'.$id.'/details');
    }
}
