<?php

namespace frontend\controllers;

use common\components\encrypt\CryptHelper;
use common\components\helpers\ParamHelper;
use common\components\helpers\SystemArrayHelper;
use frontend\models\MixAndMatch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class MixAndMatchController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->layout = 'main';
        if (!parent::beforeAction($action)) {
            return false;
        }
        return true; // or false to not run the action
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $mixID = ParamHelper::getParamValue('mix');
        $mixID = CryptHelper::decryptString($mixID);
        $arrMix = MixAndMatch::getAllCollections();
        $otherMixes = MixAndMatch::getOtherMix($mixID);
        if (!empty($mixID)) {
            $topMix = MixAndMatch::getCollectionByID($mixID);
        } else {
            $topMix = $arrMix[0];
        }
        $topMix['element_products'] = MixAndMatch::getAllCollectionElements($topMix['mixed_product_id']);
        return $this->render('index', [
            'topMix' => $topMix,
            'otherMixes' => $otherMixes
        ]);
    }

}
