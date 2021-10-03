<?php

namespace frontend\controllers\api;

use common\components\encrypt\CryptHelper;
use common\components\helpers\HeaderHelper;
use common\components\helpers\ParamHelper;
use common\components\SystemConstant;
use Yii;
use yii\rest\ActiveController;

class AjaxController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function init()
    {
        // Inherit innit
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
        return parent::afterAction($action, $result); // TODO: Change the autogenerated stub
    }

    /**
     *
     */
    public function actionTest()
    {
        $cate = CryptHelper::decryptAllElementInArray(ParamHelper::getParamValue('cate'));
        echo json_encode($cate);
        exit;
    }

    /**
     *
     *
     */
    public function actionProductFilterAjax()
    {
        $getCategory = ParamHelper::getParamValue('cate');
        $getCursor = ParamHelper::getParamValue('cursor');
        $getBigCategory = ParamHelper::getParamValue('bigCate');

        $rows = (new \yii\db\Query())->from('product');
        $rows->where(["status" => 1]);

        if (!empty($getBigCategory)) {
            $rows->andWhere(['like', 'product_category', $getBigCategory]);
        };

        if (!empty($getCategory)) {
            $rows->andWhere(['like', 'category_id', $getCategory]);
        };

        $count = count($rows->all());

        if (!empty($getCursor)) {
            $limit = SystemConstant::LIMIT_PER_PAGE;
            $offset = intval($getCursor) * $limit;
            $rows->limit($limit)->offset($offset);
        } else {
            $rows->limit(SystemConstant::LIMIT_PER_PAGE)->offset(0);
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
