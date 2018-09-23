<?php

class Currency
{
    // URL, за яким лежить курс валют НБУ (у форматі XML)
    public $exchange_url = 'http://bank-ua.com/export/currrate.xml';
    public $xml;

    function __construct(){
        // інтерпретуємо XML-файл в об'єкт
        return $this->xml = simplexml_load_file($this->exchange_url);
    }

    public function getSEKrate(){
        if ($this->xml !== FALSE) {
            // в XML-даних нема помилки
            foreach($this->xml->children() as $item){
                $row = simplexml_load_string($item->asXML());
                // виконуємо XPath-запит до XML-даних
                // (в SimpleXML включена підтримка запитів XPath)
                $v = $row->xpath('char3[. = "SEK" ]');

                if ($v) {
                    $result = $item;
                    break;
                }
            }
        }
        return $result;
    }

    public function getUSDrate(){
        if ($this->xml !== FALSE) {
            // в XML-даних нема помилки
            foreach($this->xml->children() as $item){
                $row = simplexml_load_string($item->asXML());
                // виконуємо XPath-запит до XML-даних
                // (в SimpleXML включена підтримка запитів XPath)
                $v = $row->xpath('char3[. = "USD" ]');

                if ($v) {
                    $result = $item;
                    break;
                }
            } 
        }
        return $result;
    }
}
