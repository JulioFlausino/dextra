<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Marvel;
use app\models\Utils;
use Exception;
use yii\data\Pagination;
use yii\helpers\Json;

class SiteController extends Controller
{


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $mdlMarvel = new Marvel();
        $pagination = new Pagination();
        $diretorio = Yii::$app->basePath . '/public/ultimoregistro/';
        $nomeArquivo =  'registro.txt';
        $online = true;
        $paramGet = array(
            'offset' => 0,
            'limit' => 10
        );
        $page = Yii::$app->getRequest()->getQueryParam('page');
        if ($page > 1) {
            $paramGet['offset'] = $paramGet['limit'] * ($page - 1);
        }
        try{
            $caracters = $mdlMarvel->getApiMarvel('/v1/public/characters',  $paramGet);
            if(empty($caracters['data'])){
                $caracters = Json::decode(file_get_contents($diretorio . $nomeArquivo));
                $online = false;
            }else{
                Utils::gravarUltimmoConsumo($diretorio, $nomeArquivo, Json::encode($caracters));
            }

        }catch(Exception $e){
            
        }        
        $pagination->defaultPageSize = $paramGet['limit'];
        $pagination->totalCount = $caracters['data']['total'];
        return $this->render(
            'index',
            [
                'herois' => empty($caracters['data']['results']) ? array() : $caracters['data']['results'],
                'pagination' => $pagination,
                'online' => $online
            ]
        );
    }

    public function actionDetalhe($id)
    {
        $mdlMarvel = new Marvel();
        $id = base64_decode($id);
        $paramGet = array(
        );        
        $caracters = $mdlMarvel->getApiMarvel('/v1/public/characters/' . $id,  $paramGet);   
        //$comicsDados = $mdlMarvel->getApiMarvel('/v1/public/characters/' . $id . '/comics',  $paramGet);     
        $seriesDados = $mdlMarvel->getApiMarvel('/v1/public/characters/' . $id . '/series',  $paramGet);     
        
        return $this->render(
            'detalhe',
            [
                'heroi' => empty($caracters['data']['results'][0]) ? array() : $caracters['data']['results'][0],
                //'comicsdados' => $comicsDados,
                'seriesDados' => $seriesDados,
                'idheroi' => $id
            ]
        );
    }

    public function actionEventos()
    {
        $this->layout = false;
        $mdlMarvel = new Marvel();
        $paramGet = array(
        );
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if($post['evento'] ==  'comics'){
                $dados = $mdlMarvel->getApiMarvel('/v1/public/characters/' . $post['id'] . '/comics',  $paramGet);    
            }
            if($post['evento'] ==  'series'){
                $dados = $mdlMarvel->getApiMarvel('/v1/public/characters/' .  $post['id'] . '/series',  $paramGet);     
            }
            if($post['evento'] ==  'stories'){
                $dados = $mdlMarvel->getApiMarvel('/v1/public/characters/' .  $post['id'] . '/stories',  $paramGet);  
            }
            if($post['evento'] ==  'events'){
                $dados = $mdlMarvel->getApiMarvel('/v1/public/characters/' .  $post['id'] . '/events',  $paramGet);  
            }

            return $this->render(
                $post['evento'],
                [                   
                    'dados' => $dados,                   
                ]
            );
        }  
       
        
    }
}
