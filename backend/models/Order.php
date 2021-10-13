<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string|null $color
 * @property string|null $size
 * @property int $quantity
 * @property int|null $is_order 0:no; 1:yes
 * @property int|null $is_shipping 0:no; 1:yes
 * @property int|null $is_delivered 0:no; 1:yes
 * @property int|null $is_cancelled 0:no; 1:yes
 * @property int|null $is_portpone 0:no; 1:yes
 * @property int|null $status 0 for inactive, 1 for active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'quantity'], 'required'],
            [['user_id', 'product_id', 'quantity', 'is_order', 'is_shipping', 'is_delivered', 'is_cancelled', 'is_portpone', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['color', 'size'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'color' => Yii::t('app', 'Color'),
            'size' => Yii::t('app', 'Size'),
            'quantity' => Yii::t('app', 'Quantity'),
            'is_order' => Yii::t('app', 'Is Order'),
            'is_shipping' => Yii::t('app', 'Is Shipping'),
            'is_delivered' => Yii::t('app', 'Is Delivered'),
            'is_cancelled' => Yii::t('app', 'Is Cancelled'),
            'is_portpone' => Yii::t('app', 'Is Portpone'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
