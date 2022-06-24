<?php

function getTransactionFiles($filePath): array {
    $files = scandir($filePath);
    $filesArr = array();
    foreach($files as $file){
       if(is_dir($file)){
           continue;
       }else{ $filesArr[] = $filePath . $file;}
    }
    return $filesArr;
}

function getTransactions($fileName): array {
    if(!file_exists($fileName)){
        trigger_error('File "'. $fileName . '" does not exist' . E_USER_ERROR);
    }

    $fileHandler = fopen($fileName, 'r');

    $transactions = [];
    while(!feof($fileHandler)){

        $transactions[] = fgetcsv($fileHandler);

    }
    // REMOVE HEADER INFO FROM ARRAY ############################
    array_shift($transactions);

    return $transactions;
}

function money_fmt($number){
    intval($number);
    number_format($number, 2, '.', ',');
    return '$'.$number;

}
?>