<?php

namespace frontend\controllers\api;

use common\components\encrypt\CryptHelper;
use common\components\helpers\HeaderHelper;
use common\components\helpers\ParamHelper;
use common\components\SystemConstant;
use frontend\models\Product;
use frontend\models\ProductCategory;
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
        $getProductCategory = ParamHelper::getParamValue('cate');
        $getCursor = ParamHelper::getParamValue('cursor');
        $getProductType = CryptHelper::decryptString(ParamHelper::getParamValue('type'));
        $getSort = ParamHelper::getParamValue('sort');

        $rows = Product::getAllProduct($getProductType, $getProductCategory);

        $count = count($rows->all());

        if (intval($getProductType) !== 2) {
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
            ];
        }
        echo json_encode($response);
        exit;
    }
}
