<?php

// WHICH EVER DIRECTORY THE CURRENT FILE RESIDES########################
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require(APP_PATH . 'app.php');

$files = getTransactionFiles(FILES_PATH);
print_r($files);

$transactions = [];
foreach($files as $file){
    $transactions  = array_merge($transactions, getTransactions($file));
}

require VIEWS_PATH . 'transactions.php';

// Clases and Objects
require_once ''
$transaction = new Transaction();
?>