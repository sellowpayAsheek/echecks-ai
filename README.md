# echecks-ai PHP Client Library

Echecks-ai, the simple solution for check mailing and check e-mailing (e-check). To signup for an account please contact support@onlinecheckwriter.com.


# Installation 
**Requirements** <br />
  PHP 7.4 and later. <br /> 
  
```
# Install via Composer
composer require ocw/echecks-ai-php
``` 
# Usage
A simple mailing a check example.

```
$echecks = new Echeck(getenv('ECHECKS_API_KEY'),getenv('ENVIROMENT')); <br />

# Alternate Way
\Echeck\Echeck::setToken(getenv('ECHECKS_API_KEY'));  
\Echeck\Echeck::setEnviroment(getenv('ENVIROMENT')); 
#echecks = new Echeck(); 

$check_mail = $echeck->mailAcheck([
    "PayeeName"     => "Jhon doe" ,
    "PayorName"     => "Green Holding" ,
    "AccountNumber" => "123456789" ,
    "Amount"        => 100.00 ,
    "CheckNumber"   => "" ,
    "Memo"          => "Created using echecks php client library" ,
    "Address1"      => "5007 richmond rd" ,
    "Address2"      => "" ,
    "City"          => "Tyler" ,
    "State"         => "TX" ,
    "Zip"           => "75703" ,
    "Country"       => "US" ,
    "BankAccountId" =>  "e4b7f0de-ab64-4575-9a43-asd54874532"   ,                                              
    "MailType"      => 1
])

echo $check_mail;

```

# Documentation
API Documentation can be found [here](https://documenter.getpostman.com/view/18604937/UzXKWz15)

