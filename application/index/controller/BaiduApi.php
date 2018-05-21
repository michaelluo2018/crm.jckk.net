<?php


require_once ROOT_PATH .'/extend/baiduApi/AipImageCensor.php';



    const APP_ID = '11269860 ';
    const API_KEY = 'EW3nBvZ53hk4VWKZpteacIMt ';
    const SECRET_KEY = 'xnyQOw5arrcv5FSjG34Bs27MilSZlDOc';
    $client = new AipImageCensor(APP_ID, API_KEY, SECRET_KEY);
   $data = $client->antiSpam('抵制共产主义');
   // dump($data['result']['spam']) ;
    dump($data) ;