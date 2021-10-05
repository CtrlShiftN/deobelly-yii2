<?php

namespace frontend\controllers;

use common\components\encrypt\CryptHelper;
use common\components\helpers\ParamHelper;
use frontend\models\ProductCategory;
use frontend\models\Slider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class ShopController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $slider = Slider::getSliderFromSite('index');
        return $this->render('index', [
            'slider' => $slider
        ]);
    }

    /**
     * @return string
     */
    public function actionProduct()
    {
        $slider = Slider::getSliderFromSite('index');
        $getParamCategory = CryptHelper::decryptString(ParamHelper::getParamValue('product_category'));
        $getBigCategory = ProductCategory::getBigCategory();
        return $this->render('product', [
            'paramCate' => $getParamCategory,
            'bigCategory' => $getBigCategory,
            'slider' => $slider
        ]);
    }
}