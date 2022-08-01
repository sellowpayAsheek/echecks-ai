<?php

use Echeck\Echeck;

require_once __DIR__.'/vendor/autoload.php';

Echeck::setToken('<AUTH_TOKEN>');     
Echeck::setEnviroment("SANDBOX");
$echeck = new Echeck();

$send_echeck = $echeck->emailAcheck([
    "PayeeName"     => "jhon doe" ,
    "PayorName"     => "Green Holding" ,
    "AccountNumber" => "123456789" ,
    "Amount"        => 1000.00 ,
    "CheckNumber"   => "" ,
    "Memo"          => "emailing a check Created using sdk" ,
    "Address1"      => "5007 richmond rd" ,
    "Address2"      => "" ,
    "City"          => "Tyler" ,
    "State"         => "TX" ,
    "Zip"           => "75703" ,
    "Country"       => "US" ,
    "BankAccountId" =>  "e4b7f0de-ab64-4575-9a43-sadas4565444"   ,                                                
    "EmailAddress"  => "test@gmail.com" ,
    "UniqId"        => "uniqueId"
]);

$send_echeck_with_stub = $echeck->emailAcheck([
    "PayeeName"     => "jhon doe" ,
    "PayorName"     => "Green Holding" ,
    "AccountNumber" => "123456789" ,
    "Amount"        => 1000.00 ,
    "CheckNumber"   => "" ,
    "Memo"          => "emailing a check Created using sdk" ,
    "Address1"      => "5007 richmond rd" ,
    "Address2"      => "" ,
    "City"          => "Tyler" ,
    "State"         => "TX" ,
    "Zip"           => "75703" ,
    "Country"       => "US" ,
    "BankAccountId" =>  "e4b7f0de-ab64-4575-9a43-sadas4565444"   ,                                                
    "EmailAddress"  => "test@gmail.com" ,
    "Stub1"         => [

        "row1"      => [
            "id"    => 1 ,
            "name"  => "random" ,
            "phone" => "000-xxx-00xx"
        ],
        "row2"      => [
            "id"    => 2 ,
            "name"  => "name" ,
            "phone" => "000-xxx-00xx"
        ]

    ]
]);

$resend_echeck = $echeck->resendemailCheck("<checkId>");
