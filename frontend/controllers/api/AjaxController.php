<?php

namespace frontend\controllers\api;

use common\components\encrypt\CryptHelper;
use common\components\helpers\HeaderHelper;
use common\components\helpers\ParamHelper;
use common\components\mail\MailServer;
use common\components\SystemConstant;
use common\models\Contact;
use common\models\Favorite;
use common\models\Order;
use frontend\models\Cart;
use frontend\models\ContactForm;
use frontend\models\GeoLocation;
use frontend\models\OrderForm;
use frontend\models\Product;
use Yii;
use yii\rest\ActiveController;

class AjaxController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function init()
    {
        parent::init();

        // Action để handle các lỗi phát sinh dưới dạng json
        Yii::$app->errorHandler->errorAction = 'api/error/print-json';

    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        // only allow some domain to access this
        HeaderHelper::getHeaderAccessControlAllowOrigin();
        return parent::beforeAction($action);
    }

    /**
     * @param \yii\base\Action $action
     * @param mixed $result
     * @return mixed
     */
    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result);
    }

    /**
     *
     */
    public function actionGetLinkAndTitle()
    {
        $response = [
            'status' => SystemConstant::API_UNSUCCESS_STATUS,
            'cdnUrl' => Yii::$app->params['frontend'],
            'imgUrl' => Yii::$app->params['common'] . "/media",
            'showPerPage' => \common\components\SystemConstant::LIMIT_PER_PAGE,
            'buyNow' => Yii::t('app', 'Buy now'),
            'outOfStock' => Yii::t('app', 'Out of stock'),
        ];
        echo json_encode($response);
        exit;
    }

    /**
     *
     *
     * @throws \yii\db\Exception
     */
    public function actionProductFilterAjax()
    {
        $getProductCategory = ParamHelper::getParamValue('cate');
        $getCursor = ParamHelper::getParamValue('cursor');
        $getProductType = CryptHelper::decryptString(ParamHelper::getParamValue('type'));
        $getSort = ParamHelper::getParamValue('sort');

        $rows = Product::getAllProduct($getProductType, $getProductCategory);

        $count = count($rows->all());

        if (intval($getProductType) !== SystemConstant::PRODUCT_TYPE_NEW) {
            if (!empty($getCursor)) {
                $limit = SystemConstant::LIMIT_PER_PAGE;
                $offset = intval($getCursor) * $limit;
                $rows->limit($limit)->offset($offset);
            } else {
                $rows->limit(SystemConstant::LIMIT_PER_PAGE)->offset(0);
            }
        }

        if (!empty($getSort)) {
            if ($getSort == 1) {
                $rows->orderBy("product.selling_price ASC");
            } else if ($getSort == 2) {
                $rows->orderBy('product.selling_price DESC');
            } else {
                $rows->orderBy("product.updated_at DESC");
            }
        }

        $result = $rows->all();

        $arrProduct = [];
        foreach ($result as $key => $value) {
            $arrProduct[$key] = $value;
            $arrProduct[$key]['id'] = CryptHelper::encryptString($value['id']);
        }

        if (empty($result)) {
            $response = [
                'status' => SystemConstant::API_UNSUCCESS_STATUS,
                'notify' => Yii::t('app','No products to display!'),
            ];
        } else {
            $response = [
                'status' => SystemConstant::API_SUCCESS_STATUS,
                'product' => $arrProduct,
                'count' => $count,
            ];
        }
        echo json_encode($response);
        exit;
    }

    /**
     *
     */
    public function actionUpdateOrCreateCart()
    {
        $user_id = Yii::$app->user->id;
        $id = intval(CryptHelper::decryptString(ParamHelper::getParamValue('id')));
        $productQuantity = Product::getProductQuantityById($id);
        $color = intval(CryptHelper::decryptString(ParamHelper::getParamValue('color')));
        $size = intval(CryptHelper::decryptString(ParamHelper::getParamValue('size')));
        $amount = intval(ParamHelper::getParamValue('amount'));
        $price = intval(ParamHelper::getParamValue('price'));
        $cart = \common\models\Cart::findOne([
            'user_id' => $user_id,
            'product_id' => $id,
            'color_id' => $color,
            'size_id' => $size,
            'status' => SystemConstant::STATUS_ACTIVE,
        ]);
        if (!empty($cart)) {
            if (($productQuantity - $cart->quantity) >= $amount) {
                $cart->quantity += $amount;
            } else {
                $cart->quantity = $productQuantity;
            }
            $cart->total_price = $cart->quantity * $price;
            $cart->updated_at = date('Y-m-d H:i:s');
            if ($cart->save()) {
                $response = [
                    'status' => SystemConstant::API_SUCCESS_STATUS,
                    'notify' => Yii::t('app', 'Add to cart successfully!'),
                    'count' => count(Cart::getCartByUserId(Yii::$app->user->identity->getId())),
                ];
            } else {
                $response = [
                    'status' => SystemConstant::API_UNSUCCESS_STATUS,
                    'notify' => Yii::t('app', 'Can not add this product to cart.'),
                ];
            }
        } else {
            $cartModel = new \common\models\Cart();
            $cartModel->user_id = $user_id;
            $cartModel->product_id = $id;
            $cartModel->color_id = $color;
            $cartModel->size_id = $size;
            $cartModel->quantity = $amount;
            $cartModel->total_price = $amount * $price;
            $cartModel->created_at = date('Y-m-d H:i:s');
            $cartModel->updated_at = date('Y-m-d H:i:s');
            if ($cartModel->save()) {
                $response = [
                    'status' => SystemConstant::API_SUCCESS_STATUS,
                    'notify' => Yii::t('app', 'Add to cart successfully!'),
                    'count' => count(Cart::getCartByUserId(Yii::$app->user->identity->getId())),
                ];
            } else {
                $response = [
                    'status' => SystemConstant::API_UNSUCCESS_STATUS,
                    'notify' => Yii::t('app', 'Can not add this product to cart.'),
                ];
            }
        }
        echo json_encode($response);
        exit;
    }

    /**
     *
     */
    public function actionUpdateAmountProductInCart()
    {
        $id = intval(CryptHelper::decryptString(ParamHelper::getParamValue('id')));
        $amount = intval(ParamHelper::getParamValue('amount'));
        $price = intval(ParamHelper::getParamValue('price'));
        $cartModel = \common\models\Cart::findOne($id);
        $cartModel->quantity = $amount;
        $cartModel->total_price = $amount * $price;
        if ($cartModel->save()) {
            $response = [
                'status' => SystemConstant::API_SUCCESS_STATUS,
            ];
        } else {
            $response = [
                'status' => SystemConstant::API_UNSUCCESS_STATUS,
                'notify' => Yii::t('app','An error has occurred! Try again.'),
            ];
        }
        echo json_encode($response);
        exit;
    }

    /**
     *
     */
    public function actionAddToFavorite()
    {
        $productID = intval(CryptHelper::decryptString(ParamHelper::getParamValue('id')));
        $model = Favorite::findOne([
            'product_id' => $productID,
            'user_id' => Yii::$app->user->identity->getId(),
            'status' => SystemConstant::STATUS_ACTIVE,
        ]);
        if (empty($model)) {
            $favor = new Favorite();
            $favor->user_id = Yii::$app->user->identity->getId();
            $favor->product_id = $productID;
            $favor->created_at = date('Y-m-d H:i:s');
            $favor->updated_at = date('Y-m-d H:i:s');
            if ($favor->save()) {
                $response = [
                    'status' => SystemConstant::API_SUCCESS_STATUS,
                    'message' => Yii::t('app', 'Add to favorite successfully!'),
                ];
            } else {
                $response = [
                    'status' => SystemConstant::API_UNSUCCESS_STATUS,
                    'message' => Yii::t('app', 'Can not add this product to favorite.'),
                ];
            }
        } else {
            $response = [
                'status' => SystemConstant::API_UNSUCCESS_STATUS,
                'message' => Yii::t('app', 'Can not add this product to favorite.'),
            ];
        }
        echo json_encode($response);
        exit;
    }

    public function actionCreateContact()
    {
        $model = new Contact();
        $data = Yii::$app->request->post();
        $model->name = $data['nameNewsLetter'];
        $model->email = $data['emailNewsLetter'];
        if ($model->save(false)) {
            Yii::$app->session->setFlash('creatNewsLetterSuccess', Yii::t('app', 'Submitted successfully!'));
        } else {
            Yii::$app->session->setFlash('creatNewsLetterError', Yii::t('app', 'Send failed.'));
        }
        return $this->redirect(\yii\helpers\Url::toRoute('site/'));
    }
}
