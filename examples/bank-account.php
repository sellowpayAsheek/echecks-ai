<?php

use Echeck\Echeck;

require_once __DIR__.'/vendor/autoload.php';

$echecks = new Echeck("<AUTH_TOKEN>","SANDBOX");

$bank_accounts = $echeck->retrieveBankAccounts();
