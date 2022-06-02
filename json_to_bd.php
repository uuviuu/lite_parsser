<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $jsonData = file_get_contents(__DIR__ . '/json_data.txt');
    $arrDataCards = json_decode($jsonData, true);
    var_dump($arrDataCards);


    require __DIR__ . "/vendor/autoload.php";

    use Krugozor\Database\Mysql;

    // Соединение с СУБД и получение объекта-"обертки" над "родным" mysqli
    $db = Mysql::create("localhost", "root", "")
        // Выбор базы данных
        ->setDatabaseName("parser")
        // Выбор кодировки
        ->setCharset("utf8");

    foreach ($arrDataCards as $card) {
        $db->query('INSERT INTO `parser` SET ?As', $card);
    }


    ?>

</body>

</html>

