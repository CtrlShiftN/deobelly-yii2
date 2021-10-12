<?php

namespace frontend\models;

use common\components\SystemConstant;
use Yii;
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
 * @property int|null $is_luxury 0 for basic, 1 for luxury
 * @property string|null $related_product
 * @property int|null $gender 0 for both, 1 for male, 2 for female
 * @property int|null $trademark_id
 * @property int|null $viewed +1 each click to view
 * @property int|null $fake_sold client see this amount if sold < 1k
 * @property int|null $sold
 * @property int|null $amount
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
            [['quantity', 'is_luxury', 'gender', 'trademark_id', 'viewed', 'fake_sold', 'sold', 'amount', 'status', 'admin_id'], 'integer'],
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
            'is_luxury' => Yii::t('app', 'Is Luxury'),
            'related_product' => Yii::t('app', 'Related Product'),
            'gender' => Yii::t('app', 'Gender'),
            'trademark_id' => Yii::t('app', 'Trademark ID'),
            'viewed' => Yii::t('app', 'Viewed'),
            'fake_sold' => Yii::t('app', 'Fake Sold'),
            'sold' => Yii::t('app', 'Sold'),
            'amount' => Yii::t('app', 'Amount'),
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
            if (intval($productType) == SystemConstant::PRODUCT_TYPE_LUXURY) {
                $query->andWhere(['product.is_luxury' => intval($productType)]);
            } elseif (intval($productType) == SystemConstant::PRODUCT_TYPE_NEW) {
                $query->orderBy('product.updated_at DESC')->limit(SystemConstant::LIMIT_PER_PAGE);
            } elseif (intval($productType) == SystemConstant::PRODUCT_TYPE_MEN) {
                $query->andWhere(['product.gender' => [SystemConstant::GENDER_MALE,SystemConstant::GENDER_BOTH]]);
            } elseif (intval($productType) == SystemConstant::PRODUCT_TYPE_WOMEN) {
                $query->andWhere(['product.gender' => [SystemConstant::GENDER_FEMALE,SystemConstant::GENDER_BOTH]]);
            } else {
                $query->andWhere(['like', 'product_assoc.type_id', $productType]);
            }
        }
        if (!empty($productCategory)) {
            $query->andWhere(['product_assoc.category_id' => $productCategory]);
        }
        return $query;
    }

    public static function getProductById($id)
    {
        $query = (new Query())->from('product as pr')
            ->leftJoin('product_assoc as pr-a', 'pr-a.product_id = pr.id')
            ->leftJoin('');
    }
}
