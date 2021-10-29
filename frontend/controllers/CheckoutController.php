<?php

namespace frontend\controllers;

use common\components\SystemConstant;
use frontend\models\GeoLocation;
use common\components\encrypt\CryptHelper;
use common\models\Order;
use frontend\models\Cart;
use frontend\models\OrderForm;
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
        $provinces = ArrayHelper::map(\backend\models\GeoLocation::getAllProvince(), 'id', 'name');
        $cart = Cart::getCartByUserId(Yii::$app->user->identity->getId());
        if (count($cart) < 1) {
            return $this->redirect(\yii\helpers\Url::toRoute('cart/index'));
        } else {
            if ($model->load(Yii::$app->request->post())) {
                $order = Yii::$app->request->post('OrderForm');
                $getCartId = explode(',', $order['cart']);
                $arrCartId = CryptHelper::decryptAllElementInArray($getCartId);
                $getProductId = explode(',', $order['product_id']);
                $arrProductId = CryptHelper::decryptAllElementInArray($getProductId);
                $arrQuantity = explode(',', $order['quantity']);
                $arrColorId = explode(',', $order['color_id']);
                $arrSizeId = explode(',', $order['size_id']);
                $count = 0;
                foreach ($arrCartId as $key => $cartId) {
                    $orderModel = new Order();
                    $orderModel->user_id = Yii::$app->user->identity->getId();
                    $orderModel->product_id = intval($arrProductId[$key]);
                    $orderModel->color_id = intval($arrColorId[$key]);
                    $orderModel->size_id = intval($arrSizeId[$key]);
                    $orderModel->quantity = intval($arrQuantity[$key]);
                    if (intval($order['logistic_method']) == 1) {
                        $orderModel->province_id = $orderModel->district_id = $orderModel->village_id = null;
                        $orderModel->specific_address = $orderModel->address = ' ';
                    } else {
                        $orderModel->province_id = intval($order['province_id']);
                        $orderModel->district_id = intval($order['district_id']);
                        $orderModel->village_id = intval($order['village_id']);
                        $orderModel->specific_address = $order['specific_address'];
                        $orderModel->address = $order['name'] . ' (' . $order['email'] . '), ' . $order['specific_address'] . ', ' . GeoLocation::getNameGeoLocationById(intval($order['village_id'])) . ', ' . GeoLocation::getNameGeoLocationById(intval($order['district_id'])) . ', ' . GeoLocation::getNameGeoLocationById(intval($order['province_id']));
                    }
                    $orderModel->tel = $order['tel'];
                    $orderModel->admin_id = 1;
                    $orderModel->logistic_method = $order['logistic_method'];
                    $orderModel->created_at = date('Y-m-d H:i:s');
                    $orderModel->updated_at = date('Y-m-d H:i:s');
                    if ($orderModel->save(false)) {
                        $cartModel = \common\models\Cart::findOne($cartId);
                        $cartModel->status = SystemConstant::STATUS_INACTIVE;
                        if (!$cartModel->save()) {
                            var_dump($cartModel->errors);
                            die;
                        };
                        $count++;
                    } else {
                        var_dump($orderModel->errors);
                        die;
                    }
                }
                if ($count == count($cart)) {
                    Yii::$app->session->setFlash('creatOrderSuccess', Yii::t('app','Order Success! Please continue to order the product.'));
                    return $this->redirect(\yii\helpers\Url::toRoute('cart/index'));
                } else {
                    Yii::$app->session->setFlash('creatOrderError', Yii::t('app','Order failed! Please try again.'));
                }
            }
            return $this->render('index', [
                'model' => $model,
                'provinces' => $provinces,
                'cart' => $cart
            ]);
        }
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
                $out = \backend\models\GeoLocation::getDistrictByProvinceID($province_id);
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
                $out = \backend\models\GeoLocation::getDistrictByProvinceID($district_id);
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }
}