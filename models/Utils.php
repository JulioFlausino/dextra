<?php

namespace app\models;

use Exception;
use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;

class Utils
{

    public static function retMktimeSoma($data, $sub)
    {
        $explode = explode("-", $data);
        list($ano, $mes, $dia) = $explode;
        $mktime = mktime(0, 0, 0, $mes, $dia + $sub, $ano);

        return $mktime;
    }

    public static function paramGet($array)
    {       
        $stringGet = '';
        foreach($array as $a => $valor){
            $stringGet .= "&{$a}={$valor}";
        }
        return $stringGet;
    }

    public static function formatDateToDb($datetime) {
        $date = \DateTime::createFromFormat('d/m/Y', $datetime);
        return empty($date) ? $datetime : $date->format('Y-m-d');
    }

    public static function formatDateToView($date)
    {
        $tmp = strtotime($date);
        return date('d/m/Y', $tmp);
    }

    public static function gravarUltimmoConsumo($local, $nameFile, $conteudo){

        try{
            if(!is_dir($local)){
                mkdir($local, '7777');
            }
            file_put_contents($local . $nameFile, $conteudo);
        }catch(Exception $e){
            echo "<pre>"; print_r($e->getMessage()); exit('s');

        }
        return true;        
    }
}