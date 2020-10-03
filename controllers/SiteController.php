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
use yii\data\Pagination;

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
        $paramGet = array(
            'offset' => 0,
            'limit' => 10
        );
        $page = Yii::$app->getRequest()->getQueryParam('page');
        if ($page > 1) {
            $paramGet['offset'] = $paramGet['limit'] * ($page - 1);
        }
        $caracters = $mdlMarvel->getApiMarvel('/v1/public/characters',  $paramGet);
        $pagination->defaultPageSize = $paramGet['limit'];
        $pagination->totalCount = $caracters['data']['total'];
        return $this->render(
            'index',
            [
                'herois' => empty($caracters['data']['results']) ? array() : $caracters['data']['results'],
                'pagination' => $pagination,
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
        $comicsDados = $mdlMarvel->getApiMarvel('/v1/public/characters/' . $id . '/comics',  $paramGet);     
        $seriesDados = $mdlMarvel->getApiMarvel('/v1/public/characters/' . $id . '/series',  $paramGet);     
        

        return $this->render(
            'detalhe',
            [
                'heroi' => empty($caracters['data']['results'][0]) ? array() : $caracters['data']['results'][0],
                'comicsdados' => $comicsDados,
                'seriesDados' => $seriesDados,
            ]
        );
    }

    public function actionComic($id)
    {
        $mdlMarvel = new Marvel();
        $pagination = new Pagination();
        $id = base64_decode($id);
        $paramGet = array(
        );        
        $caracters = $mdlMarvel->getApiMarvel('/v1/public/characters/' . $id . '/comics',  $paramGet);       
        

        return $this->render(
            'detalhe',
            [
                'heroi' => empty($caracters['data']['results'][0]) ? array() : $caracters['data']['results'][0],
                'pagination' => $pagination,
            ]
        );
    }
}
