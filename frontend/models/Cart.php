<?php

namespace frontend\models;

use common\components\SystemConstant;
use Yii;
use yii\db\Query;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int|null $color_id
 * @property int|null $size_id
 * @property int $quantity
 * @property int $total_price
 * @property int|null $status 0 for inactive, 1 for active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Cart extends \common\models\Cart
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'quantity', 'total_price'], 'required'],
            [['user_id', 'product_id', 'color_id', 'size_id', 'quantity', 'total_price', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
            'color_id' => Yii::t('app', 'Color ID'),
            'size_id' => Yii::t('app', 'Size ID'),
            'quantity' => Yii::t('app', 'Quantity'),
            'total_price' => Yii::t('app', 'Total Price'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function getCartByUserId($id)
    {
        return (new Query())->select(
            [
                'c.id',
                'c.quantity',
                'c.total_price',
                'c.color_id',
                'c.size_id',
                'p.name as p-name',
                'p.image as p-img',
                'p.quantity as p-quantity',
                'p.selling_price as p-price',
                'pa.color_id as pa-color',
                'pa.size_id as pa-size',
                's.name as s-name',
                'co.name as co-name',
            ]
        )->from('cart as c')
            ->leftJoin('product as p', 'p.id = c.product_id')
            ->leftJoin('product_assoc as pa', 'pa.product_id = c.product_id')
            ->leftJoin('color as co', 'co.id = c.color_id')
            ->leftJoin('size as s', 's.id = c.size_id')
            ->where(['c.status' => 1,'c.user_id' => $id])->all();
    }

    /**
     * @param $user_id
     * @param $id
     * @param $color
     * @param $size
     * @param $amount
     * @param $price
     * @return bool
     */
    public static function addProductToCart($user_id,$id,$color,$size,$amount,$price)
    {
        $availableCart = Cart::find()->where([
            'user_id' => $user_id,
            'product_id' => $id,
            'color_id' => $color,
            'size_id' => $size,
            'status' => SystemConstant::STATUS_ACTIVE
        ])->scalar();
        if(empty($availableCart)) {
            $cartModel = new \common\models\Cart();
            $cartModel->user_id = $user_id;
            $cartModel->product_id = $id;
            $cartModel->color_id = $color;
            $cartModel->size_id = $size;
            $cartModel->quantity = $amount;
            $cartModel->total_price = $amount * $price;
            $cartModel->created_at = date('Y-m-d H:i:s');
            $cartModel->updated_at = date('Y-m-d H:i:s');
            return $cartModel->save();
        } else {
            $cart = \common\models\Cart::findOne($id);
            $cart->quantity += $amount;
            $cart->total_price = $cart->quantity * $price;
            return $cart->save();
        }
    }
}
