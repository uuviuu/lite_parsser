<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/lib/phpQuery-onefile.php';

//парсим данные и преобразуем их в json
include('include\parser.php');


// сохраняем полученные данные
$jsonData = json_encode($arrListCard);
file_put_contents('json_data.txt', $jsonData);

?>