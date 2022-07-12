<?php

namespace Echeck\Resources;

use Echeck\Exceptions\NetworkErrorException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ConnectException;


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

        $this->client =  new Client(["base_uri" => $this->baseUrl, 'timeout' => 300]);
    }

    public function sendRequest($method,$uri,$query = [] , $body = null,$headers = null)
    {
        $options = $this->getOptions($body,$headers);
        try {
            $response = $this->client->request($method,$uri,$options);
        } catch (ConnectException $e) {
            throw new NetworkErrorException($e->getMessage());

        } catch(GuzzleException $e){
            if (!$e->hasResponse()) {
                throw new NetworkErrorException("An Unexpected Error has occured:" .$e->getMessage());
            }

            $responseErrorBody = strval($e->getResponse()->getBody(true));
            $errorMessage = $this->sortResponseErrorBody($responseErrorBody);
            $statusCode = $e->getResponse()->getStatusCode();

            throw new NetworkErrorException($errorMessage,$statusCode);
        }

        return json_decode($response->getBody(), true);
    }

    protected function getOptions($body,$headers): array
    {

        $options = array(
            'headers' => array(
                "Content-Type" => "application/json" ,
                "Accept" => "application/json; charset=utf-8" ,
                "Authorization" => $this->getAuthToken()
            )
        );

        if($headers){
            $options['headers'] = array_merge($options['headers'],$headers);
        }

        if($body){
            $options['body'] = json_encode($body);
        }

        return $options ;
    }

    protected function getAuthToken()
    {
        return "Bearer ".$this->token ;
    }

    protected function sortResponseErrorBody($error)
    {
        $response = json_decode($error,true);
        if(is_array($response)){
            if(array_key_exists("error",$response)){
                return $response['error'];
            }else if(array_key_exists("message",$response)){
                return $response['message'];
            }
        }

        return 'An Internal Error has occurred';
    }
}
