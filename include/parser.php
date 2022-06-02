<?php

    $url = '';

    function parser($url) // парсит указанный адрес
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = curl_exec($ch);
        curl_close($ch);
        // echo $html; 
        return $html;
    }

    // парсим все новости музея
    $html = parser($url);
    $pq = phpQuery::newDocument($html);

    // получаем ссылки на все новости указанной страницы 
    $arrDataCard = array();
    $listLinks = $pq->find('.post-card .post-card__title a'); //ищем ссылку
    foreach ($listLinks as $link) {
        $arrDataCard[] = pq($link)->attr('href');
    }

    // парсим каждую страницу detail отдельно
    $arrListCard = array();
    foreach ($arrDataCard as $card) {
        $htmlCard = parser($card);
        $pq = phpQuery::newDocument($htmlCard);

        $arrListCard[] = [
            "id" => '123',
            "title" => $pq->find('h3')->text(),
            "url" => $card,
            "date" => preg_replace("/[^0-9.]/", '', $pq->find('#date')->text()),
            "content" => $pq->find('.blog-detail .container p')->html(),
        ];
    }

    // выводим результат
    function vardump($str){
        echo "<pre>";
        var_dump($str);
        echo "</pre>";
    }
    // vardump($arrListCard);

    ?>