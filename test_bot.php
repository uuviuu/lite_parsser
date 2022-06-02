<?php

$token = "токен бота";
$array = array(
    'chat_id' => id_чата,
    'text' => 'Тестовое сообщение',
    'parse_mode' => 'html'
);

$ch = curl_init("https://api.telegram.org/bot".$token."/sendMessage");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array, '', '&'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$result = curl_exec($ch);
curl_close($ch);

echo "<pre>";
var_dump(json_decode($result, true));
echo "</pre>";

?>