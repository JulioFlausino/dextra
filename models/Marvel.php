<?php

namespace app\models;

use Exception;
use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;
use yii\helpers\Json;

class Marvel
{
    private $apikey = 'e838c91a8c7878fc98aae844c948d85b';
    private $privateKey = 'b06fe572cdad67e1ee584ac6ae1d3763d3ab9611';
   
    public  function getApiMarvel($url, $gets = array())
    {
        $paramsGet = Utils::paramGet($gets);        
        $parametros = $this->getHash();       
        $ch = curl_init();
        // define options
        $optArray = array(
            CURLOPT_URL => 'https://gateway.marvel.com/' . $url . '?apikey=' . $this->apikey . '&ts=' . 
            $parametros['ts'] . '&hash=' 
            . $parametros['hash'] . $paramsGet,
            CURLOPT_RETURNTRANSFER => true
        );        
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);        
        return Json::decode($result);
    }

    private function getHash()
    {
        $time = Utils::retMktimeSoma(date('Y-m-d'), 0);
        return array(
            'ts' => $time,
            'hash' => md5($time . $this->privateKey . $this->apikey)
        );
    }
}