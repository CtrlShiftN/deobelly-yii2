<?php

namespace frontend\controllers;

use common\components\encrypt\CryptHelper;
use common\components\helpers\ParamHelper;
use frontend\models\Product;
use frontend\models\ProductCategory;
use frontend\models\ProductType;
use frontend\models\Slider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class ShopController extends Controller
{
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
        $type = ArrayHelper::index(ProductType::getProductType(), 'slug');
        return $this->render('index', [
            'slider' => $slider,
            'type' => $type,
        ]);
    }

    /**
     * @return string
     */
    public function actionProduct()
    {
        $getProductType = ProductType::getProductType();
        return $this->render('product', [
            'productType' => $getProductType,
        ]);
    }

    public function actionProductDetail()
    {
        if(isset($_REQUEST['detail'])) {
            $detailID = CryptHelper::decryptString($_REQUEST['detail']);
            $productDetail = Product::getProductById($detailID);
            $otherProductDetail = Product::getProductOther($detailID);
            $bestSellers = Product::getBestSellingProduct();
            $bestSellersMb = Product::getBestSellingProductMb();
            $onSale = Product::getOnSaleProduct();
            $onSaleMb = Product::getOnSaleProductMb();
            if(!empty($productDetail)) {
                return $this->render('product-detail',[
                    'detail' => $productDetail,
                    'other' => $otherProductDetail,
                    'bestSellers' => $bestSellers,
                    'bestSellersMb' => $bestSellersMb,
                    'onSale' => $onSale,
                    'onSaleMb' => $onSaleMb
                ]);
            } else {
                return $this->render('index');
            }
        } else {
            return $this->render('index');
        }

    }
}