<?php

use Echeck\Echeck;

require_once __DIR__.'/vendor/autoload.php';

$echecks = new Echeck("EiZNSqeKYpMcIZbEn3KFLDyNGKtMa7b6orEKro013a7v9TFZ6KYiOmL6QWM7","SANDBOX");

$check_mail = $echeck->mailAcheck([
    "PayeeName"     => "Jhon doe" ,
    "PayorName"     => "Green Holding" ,
    "AccountNumber" => "123456789" ,
    "Amount"        => 100.00 ,
    "CheckNumber"   => "" ,
    "Memo"          => "Created using sdk" ,
    "Address1"      => "5007 richmond rd" ,
    "Address2"      => "" ,
    "City"          => "Tyler" ,
    "State"         => "TX" ,
    "Zip"           => "75703" ,
    "Country"       => "US" ,
    "BankAccountId" =>  "e4b7f0de-ab64-4575-9a43-asd54874532"   ,                                              
    "MailType"      => 1
]);

$mail_a_check_with_stub = $echeck->mailAcheck([
    "PayeeName"     => "Jhon doe" ,
    "PayorName"     => "Green Holding" ,
    "AccountNumber" => "123456789" ,
    "Amount"        => 100.00 ,
    "CheckNumber"   => "" ,
    "Memo"          => "Created using sdk" ,
    "Address1"      => "5007 richmond rd" ,
    "Address2"      => "" ,
    "City"          => "Tyler" ,
    "State"         => "TX" ,
    "Zip"           => "75703" ,
    "Country"       => "US" ,
    "BankAccountId" =>  "e4b7f0de-ab64-4575-9a43-asd54874532"   ,                                              
    "MailType"      => 1 ,
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

$mail_a_check_with_attachment = $echeck->mailAcheck([
    "PayeeName"     => "Jhon doe" ,
    "PayorName"     => "Green Holding" ,
    "AccountNumber" => "123456789" ,
    "Amount"        => 100.00 ,
    "CheckNumber"   => "" ,
    "Memo"          => "Created using sdk" ,
    "Address1"      => "5007 richmond rd" ,
    "Address2"      => "" ,
    "City"          => "Tyler" ,
    "State"         => "TX" ,
    "Zip"           => "75703" ,
    "Country"       => "US" ,
    "BankAccountId" =>  "e4b7f0de-ab64-4575-9a43-asd54874532"   ,                                              
    "MailType"      => 1 ,
    "AttachmentUrl" => "https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf"
]);