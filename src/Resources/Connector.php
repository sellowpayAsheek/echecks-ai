<?php

namespace Ocw\Echeck\Resources;

use GuzzleHttp\Client;

class Connector
{
    protected $token;
    protected $enviroment;
    protected $baseUrl ;
    protected $client;

    public function __construct($token,$enviroment)
    {
        $this->token = $token ;
        $this->enviroment = $enviroment ;

        if($this->enviroment == "SANDBOX"){
            $this->baseUrl = "https://sandbox.onlinecheckwriter.com/api/v2" ;
        }else{
            $this->baseUrl = 'https://app.onlinecheckwriter.com/api/v2' ;
        }

        $this->client =  new Client(["base_uri" => $this->baseUrl]);
    }

    public function sendRequest($method,$uri,$query = [] , $body = null,$headers = null)
    {
        $options = $this->getOptions($body,$headers);
        try {
            $response = $this->client->request($method,$uri,$options);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    protected function getOptions($body,$headers): array
    {
        return [] ;
    }
}
