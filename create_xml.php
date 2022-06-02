<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/lib/phpQuery-onefile.php';

header('Content-type: text/html; charset-utf-8');
setlocale(LC_ALL, 'ru_RU.UTF-8');

include('include\parser.php');

// создаем XML
$dom = new DOMDocument('1.0', 'utf-8');
// создаем внутренний элемент <offers>
$root = $dom->createElement('offers');
$dom->appendChild($root);

foreach($arrListCard as $valueParam) {
	// Создаём узел <offer>
	$offer = $dom->createElement('offer');
	// Добавляем дочерний элемент для <offers>
	$root->appendChild($offer);
	// Устанавливаем атрибут id для узла <offer>
    $offer->setAttribute('id', $valueParam['id']);
 

    // заполняем оффер для каждой страницы
	foreach($valueParam as $key=>$val) {
		$params = $dom->createElement($key, $val);
		$offer->appendChild($params);
	}
}

// сохранение полученного XML-документа в файл
$dom->save('offers.xml');

?>
