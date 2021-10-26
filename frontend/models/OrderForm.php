<?php

namespace frontend\models;

use common\models\Order;
use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int|null $color_id
 * @property int|null $size_id
 * @property int $quantity
 * @property int $province_id
 * @property int $district_id
 * @property int $village_id
 * @property string $specific_address
 * @property string $address
 * @property string|null $notes
 * @property string $tel
 * @property int $admin_id
 * @property int|null $status 0 - new,1 - processing,2 - approved,3 - shipping,4 - finished,5- cancelled,6 - expired,7 - returned,8 - postpone,9 - rejected,10 - failed,11 - fake
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class OrderForm extends Order
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
            [['user_id', 'product_id', 'quantity', 'province_id', 'district_id', 'village_id', 'specific_address', 'address', 'admin_id'], 'required'],
            [['user_id', 'product_id', 'color_id', 'size_id', 'quantity', 'province_id', 'district_id', 'village_id', 'admin_id', 'status'], 'integer'],
            [['address', 'notes'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['specific_address', 'tel'], 'string', 'max' => 255],
            ['tel', 'required', 'message' => Yii::t('app', 'Phone number can not be blank.')],
            [['tel'], 'match', 'pattern' => '/^(84|0)+([0-9]{9})$/', 'message' => Yii::t('app', 'Includes 10 digits starting with 0 or 84.')],
        ];
    }

    /**
     * @param $attribute
     * @param $params
     * @param $validator
     */
    public function validateTel($attribute, $params, $validator)
    {
        if (!preg_match('/^(84|0)+([0-9]{9})$/', $this->tel)) {
            $this->addError($attribute, Yii::t('app', 'Invalid phone number.'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'product_id' => Yii::t('app', 'Product'),
            'color_id' => Yii::t('app', 'Color'),
            'size_id' => Yii::t('app', 'Size'),
            'quantity' => Yii::t('app', 'Quantity'),
            'province_id' => Yii::t('app', 'Province'),
            'district_id' => Yii::t('app', 'District'),
            'village_id' => Yii::t('app', 'Village'),
            'specific_address' => Yii::t('app', 'Address'),
            'address' => Yii::t('app', 'Address'),
            'notes' => Yii::t('app', 'Notes'),
            'tel' => Yii::t('app', 'Tel'),
            'admin_id' => Yii::t('app', 'Admin'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
