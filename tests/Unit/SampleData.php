<?php
namespace Echeck\Tests ; 

class SampleData
{
    public static function mailData()
    {
        return [
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
            "BankAccountId" =>  "f98f0c1f-f607-4d2d-8014-8cdc26cb8bee"   ,                                              
            "MailType"      => 1
        ];
    }
}