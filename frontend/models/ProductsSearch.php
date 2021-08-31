<?php

namespace frontend\models;

use common\models\Posts;
use common\models\Products;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $short_description
 * @property string $description
 * @property float $cost_price
 * @property float $regular_price
 * @property float|null $sale_price
 * @property string|null $SKU
 * @property int $quantity
 * @property string $image
 * @property string|null $images
 * @property int $category_id
 * @property int|null $trademark_id
 * @property int|null $viewed +1 each click to view
 * @property int|null $fake_sold client see this amount if sold < 1k
 * @property int|null $sold
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class ProductsSearch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'cost_price', 'regular_price', 'image', 'category_id'], 'required'],
            [['description', 'images'], 'string'],
            [['cost_price', 'regular_price', 'sale_price'], 'number'],
            [['quantity', 'category_id', 'trademark_id', 'viewed', 'fake_sold', 'sold', 'status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'short_description', 'SKU', 'image'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'cost_price' => 'Cost Price',
            'regular_price' => 'Regular Price',
            'sale_price' => 'Sale Price',
            'SKU' => 'Sku',
            'quantity' => 'Quantity',
            'image' => 'Image',
            'images' => 'Images',
            'category_id' => 'Category ID',
            'trademark_id' => 'Trademark ID',
            'viewed' => 'Viewed',
            'fake_sold' => 'Fake Sold',
            'sold' => 'Sold',
            'status' => 'Status',
            'admin_id' => 'Admin ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getProductIntro()
    {
        return Products::find()->where(['status'=>1])->orderBy("updated DESC")->limit(4)->asArray()->all();
    }
}
