<?php

namespace frontend\controllers\api;

use common\components\encrypt\CryptHelper;
use common\components\helpers\HeaderHelper;
use common\components\helpers\ParamHelper;
use common\components\SystemConstant;
use frontend\models\Cart;
use frontend\models\Product;
use frontend\models\ProductCategory;
use http\Url;
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
        if (Yii::$app->user->isGuest) {
            $addLink = $buyLink = $favorLink = \yii\helpers\Url::toRoute('site/login');
        } else {
            $addLink = $favorLink = 'javascript:void(0)';
        }
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
                'notify' => 'Không có sản phẩm để hiển thị!'
            ];
        } else {
            $response = [
                'status' => SystemConstant::API_SUCCESS_STATUS,
                'product' => $arrProduct,
                'count' => $count,
                'addLink' => $addLink,
                'favorLink' => $favorLink,
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
        $color = intval(CryptHelper::decryptString(ParamHelper::getParamValue('color')));
        $size = intval(CryptHelper::decryptString(ParamHelper::getParamValue('size')));
        $amount = intval(ParamHelper::getParamValue('amount'));
        $price = intval(ParamHelper::getParamValue('price'));
        $model = new Cart();
        if ($model::addProductToCart($user_id, $id, $color, $size, $amount, $price)) {
            $response = [
                'status' => SystemConstant::API_SUCCESS_STATUS,
                'notify' => 'Đã thêm vào giỏ hàng!',
                'count' => count(Cart::getCartByUserId(Yii::$app->user->identity->getId())),
            ];
        } else {
            $response = [
                'status' => SystemConstant::API_UNSUCCESS_STATUS,
                'notify' => 'Thêm thất bại!',
            ];
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
        $model = new Cart();
        if ($model::updateAmountCart($id, $amount, $price)) {
            $response = [
                'status' => SystemConstant::API_SUCCESS_STATUS,
            ];
        } else {
            $response = [
                'status' => SystemConstant::API_UNSUCCESS_STATUS,
                'notify' => 'Đã có lỗi xảy ra! Hãy thử lại.',
            ];
        }
        echo json_encode($response);
        exit;
    }

    public function actionAddToCart()
    {
        $productID = intval(CryptHelper::decryptString(ParamHelper::getParamValue('id')));
        $pricePerProduct = \common\models\Product::find()->select('selling_price')->where([
            'id' => $productID,
            'status' => SystemConstant::STATUS_ACTIVE
        ])->asArray()->one()['selling_price'];
        $cartModel = new \common\models\Cart();
        $cartModel->user_id = Yii::$app->user->identity->getId();
        $cartModel->product_id = $productID;
        $cartModel->quantity = 1;
        $cartModel->total_price = intval($pricePerProduct);
        $cartModel->created_at = date('Y-m-d H:i:s');
        $cartModel->updated_at = date('Y-m-d H:i:s');
        if ($cartModel->save()) {
            $response = [
                'status' => SystemConstant::API_SUCCESS_STATUS,
                'message' => Yii::t('app', 'Add to cart successfully!'),
            ];
        } else {
            $response = [
                'status' => SystemConstant::API_UNSUCCESS_STATUS,
                'message' => Yii::t('app', 'Can not add this product to cart.'),
            ];
        }
        echo json_encode($response);
        exit;
    }

    public function actionAddToFavorite()
    {
        $productID = intval(CryptHelper::decryptString(ParamHelper::getParamValue('id')));
        if (1 == 1) { // TODO add this
            $response = [
                'status' => SystemConstant::API_SUCCESS_STATUS,
                'message' => Yii::t('app', 'Add to cart successfully!'),
            ];
        } else {
            $response = [
                'status' => SystemConstant::API_UNSUCCESS_STATUS,
                'message' => Yii::t('app', 'Can not add this product to cart.'),
            ];
        }
        echo json_encode($response);
        exit;
    }
}
