<?php

use Echeck\Echeck;

require_once __DIR__.'/vendor/autoload.php';

$echecks = new Echeck("<AUTH_TOKEN>","SANDBOX");

$check_pdf = $echeck->viewCheckPdf('<checkId>');

$void_a_check = $echeck->voidCheck("<checkId>");

$check_statements = $echeck->viewCheckStatement("<checkId>");

$check_details = $echeck->viewCheckDetails("<checkId>");

$all_checks = $echeck->getCheckList([
    "checkId" => "<checkId>" 
]);
