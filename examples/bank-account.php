<?php

use Echeck\Echeck;

require_once __DIR__.'/vendor/autoload.php';

$echecks = new Echeck("EiZNSqeKYpMcIZbEn3KFLDyNGKtMa7b6orEKro013a7v9TFZ6KYiOmL6QWM7","SANDBOX");

$bank_accounts = $echeck->retrieveBankAccounts();