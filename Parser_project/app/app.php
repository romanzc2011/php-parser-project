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

    $transactions = array();
    while(!feof($fileHandler)){

        $transactions[] = fgetcsv($fileHandler);

    }
    // REMOVE HEADER INFO FROM ARRAY ############################
    array_shift($transactions);

    return $transactions;
}

function money_fmt($number){
    $fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
    intval($number);

    if($number > 0) {
        $number = '<span style="color: green;">' .
        $fmt->formatCurrency($number, 'USD'). '</span>';
    }elseif($number < 0){
        $number = '<span style="color: red;">' .$fmt->formatCurrency($number, 'USD').
            '</span>';
    }
    return $number;
}

function intConvert($number){
    $search = array('$', ',');
    $number = str_replace($search, '', $number);
    $intAmount = (double)$number;

    return $intAmount;
}
?>