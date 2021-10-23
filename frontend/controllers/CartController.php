<?php

namespace frontend\controllers;

use common\components\encrypt\CryptHelper;
use frontend\models\Cart;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class CartController extends \yii\web\Controller
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
     * @return string
     */
    public function actionIndex()
    {
        $cart = Cart::getCartByUserId(\Yii::$app->user->id);
        return $this->render('index',[
            'cart' => $cart,
        ]);
    }

    public function actionDeleteCart($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = new \common\models\Cart();
        $model->findOne($id)->delete();
        return $this->redirect(['index']);
    }
}
