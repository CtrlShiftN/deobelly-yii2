<?php

namespace frontend\controllers;

use backend\models\GeoLocation;
use common\components\encrypt\CryptHelper;
use frontend\models\Cart;
use frontend\models\OrderForm;
use http\Url;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class CheckoutController extends \yii\web\Controller
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
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $model = new OrderForm();
        $provinces = ArrayHelper::map(GeoLocation::getAllProvince(), 'id', 'name');
        $cart = Cart::getCartByUserId(Yii::$app->user->identity->getId());
        $modelOrder = new OrderForm();
        if ($modelOrder->load(Yii::$app->request->post()) && $modelOrder->validate()) {
            $order = Yii::$app->request->post('OrderForm');
            $getCartId = explode(',',$order['cart']);
            $arrCartId = CryptHelper::decryptAllElementInArray($getCartId);
            $count = count($arrCartId);
            $getProductId = explode(',',$order['product_id']);
            $arrProductId = CryptHelper::decryptAllElementInArray($getProductId);
            $arrQuantity = explode(',',$order['quantity']);
            $arrColorId = explode(',',$order['color_id']);
            $arrSizeId = explode(',',$order['product_id']);
            if($modelOrder->createOrder($count,$arrCartId,$arrProductId,$arrQuantity,$arrColorId,$arrSizeId)){
                Yii::$app->session->setFlash('creatOrderSuccess', 'Thank you for your feedback. We will reply to you soon.');
            } else {
                Yii::$app->session->setFlash('creatOrderError', 'Unable to submit a response. Please try again.');
            }
        }
//        if(count($cart) < 1) {
//            return $this->redirect(\yii\helpers\Url::toRoute('cart/index'));
//        } else {
            return $this->render('index',[
                'model' => $model,
                'provinces' => $provinces,
                'cart' => $cart
            ]);
//        }
    }

    /**
     * @return array|string[]
     */
    public function actionGetDistrict()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = GeoLocation::getDistrictByProvinceID($province_id);
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    /**
     * @return array|string[]
     */
    public function actionGetVillage()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $district_id = $parents[0];
                $out = GeoLocation::getDistrictByProvinceID($district_id);
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }
}