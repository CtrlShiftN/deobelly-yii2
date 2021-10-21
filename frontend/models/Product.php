<?php

namespace frontend\models;

use common\components\SystemConstant;
use Yii;
use yii\db\Expression;
use yii\db\Query;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $short_description
 * @property string $description
 * @property float $cost_price
 * @property float $regular_price
 * @property float|null $sale_price
 * @property float $selling_price
 * @property string|null $SKU
 * @property int $quantity
 * @property string $image
 * @property string|null $images
 * @property string|null $related_product
 * @property int|null $trademark_id
 * @property int|null $hide 0 for hide, 1 for show
 * @property int|null $is_feature 0 for no, 1 for yes
 * @property int|null $viewed +1 each click to view
 * @property int|null $fake_sold client see this amount if sold < 1k
 * @property int|null $sold
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Product extends \common\models\Product
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'description', 'cost_price', 'regular_price', 'selling_price', 'image'], 'required'],
            [['description', 'images'], 'string'],
            [['cost_price', 'regular_price', 'sale_price', 'selling_price'], 'number'],
            [['quantity', 'trademark_id', 'hide', 'is_feature', 'viewed', 'fake_sold', 'sold', 'status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'short_description', 'SKU', 'image', 'related_product'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'short_description' => Yii::t('app', 'Short Description'),
            'description' => Yii::t('app', 'Description'),
            'cost_price' => Yii::t('app', 'Cost Price'),
            'regular_price' => Yii::t('app', 'Regular Price'),
            'sale_price' => Yii::t('app', 'Sale Price'),
            'selling_price' => Yii::t('app', 'Selling Price'),
            'SKU' => Yii::t('app', 'Sku'),
            'quantity' => Yii::t('app', 'Quantity'),
            'image' => Yii::t('app', 'Image'),
            'images' => Yii::t('app', 'Images'),
            'related_product' => Yii::t('app', 'Related Product'),
            'trademark_id' => Yii::t('app', 'Trademark ID'),
            'hide' => Yii::t('app', 'Hide'),
            'is_feature' => Yii::t('app', 'Is Feature'),
            'viewed' => Yii::t('app', 'Viewed'),
            'fake_sold' => Yii::t('app', 'Fake Sold'),
            'sold' => Yii::t('app', 'Sold'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return Query
     */
    public static function getAllProduct($productType, $productCategory)
    {
        $query = (new Query())->from('product')
            ->leftJoin('product_assoc', 'product_assoc.product_id = product.id')
            ->where(['product.status' => 1]);
        if (!empty($productType)) {
            if (intval($productType) == SystemConstant::PRODUCT_TYPE_NEW) {
                $query->andWhere(['product.hide' => SystemConstant::PRODUCT_HIDE])->orderBy('product.updated_at DESC')->limit(SystemConstant::LIMIT_PER_PAGE);
            } else {
                $query->andWhere(['product.hide' => SystemConstant::PRODUCT_SHOW])->andWhere(['like', 'product_assoc.type_id', $productType]);
            }
        } else {
            $query->andWhere(['product.hide' => SystemConstant::PRODUCT_SHOW]);
        }
        if (!empty($productCategory)) {
            $query->andWhere(['product_assoc.category_id' => $productCategory]);
        }
        return $query;
    }

    /**
     * @param $id
     * @return array
     */
    public static function getProductById($id)
    {
        $query = (new Query())->select(
            [
                'product.*',
                'product_assoc.type_id as assoc_type_id',
                'product_assoc.color_id as assoc_color_id',
                'product_assoc.size_id as assoc_size_id',
            ]
        )->from('product')
            ->leftJoin('product_assoc', 'product_assoc.product_id = product.id')
            ->where(['product.status' => 1, 'product.id' => $id]);
        return $query->one();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getBestSellingProduct($otherId, $limit)
    {
        return Product::find()->where(['status' => 1])->andWhere(['not', ['id' => $otherId]])->orderBy(['sold DESC'])->orderBy(new Expression('rand()'))->limit($limit)->all();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getOnSaleProduct($otherId, $limit)
    {
        return Product::find()->where(['status' => 1])->andWhere(['not', ['id' => $otherId]])->andWhere(['not', ['sale_price' => null]])->orderBy(new Expression('rand()'))->limit($limit)->all();
    }

    /**
     * @param $id
     * @return false|int|string|null
     */
    public static function getPriceProductById($id)
    {
        return Product::find()->select('selling_price')->where(['status' => SystemConstant::STATUS_ACTIVE, 'id' => $id])->asArray()->scalar();
    }
}
