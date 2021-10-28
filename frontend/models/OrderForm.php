<?php

namespace frontend\models;

use common\components\encrypt\CryptHelper;
use common\components\SystemConstant;
use common\models\Order;
use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $color_id
 * @property int $size_id
 * @property int $quantity
 * @property int $province_id
 * @property int $district_id
 * @property int $village_id
 * @property string $specific_address
 * @property string $address
 * @property string|null $notes
 * @property string $tel
 * @property int $admin_id
 * @property int $logistic_method 0:home delivery, 1:receive at store
 * @property int|null $status 0 - new,1 - processing,2 - approved,3 - shipping,4 - finished,5- cancelled,6 - expired,7 - returned,8 - postpone,9 - rejected,10 - failed,11 - fake
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class OrderForm extends Order
{
    public $name;
    public $email;
    public $cart;
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
            ['email', 'required', 'message'=>'{attribute}' . Yii::t('app',' can not be blank.')],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['cart', 'string', 'max' => 255],
            ['name', 'required', 'message'=>'{attribute}' . Yii::t('app',' can not be blank.')],
            ['name', 'string', 'max' => 100],
            [['user_id', 'admin_id', 'logistic_method'], 'required'],
            [['user_id', 'province_id', 'district_id', 'village_id', 'admin_id', 'logistic_method', 'status'], 'integer'],
            [['province_id', 'district_id', 'village_id', 'specific_address', 'address'], 'required', 'when' => function($model) {return $model->logistic_method == 0;}, 'whenClient' => "function (attribute, value) {return $('#sm-home-delivery').prop('checked');}"],
            ['logistic_method', 'checkLogisticMethod'],
            [['address', 'notes'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['specific_address', 'tel'], 'string', 'max' => 255],
            ['tel', 'required', 'message' => Yii::t('app', 'Phone number can not be blank.')],
            [['tel'], 'match', 'pattern' => '/^(84|0)+([0-9]{9})$/', 'message' => Yii::t('app', 'Includes 10 digits starting with 0 or 84.')],
        ];
    }

    public function checkLogisticMethod()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cart' => Yii::t('app', 'Cart'),
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', "Consignee's name"),
            'email' => Yii::t('app', 'Email'),
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
            'logistic_method' => Yii::t('app', 'Logistic method'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function createOrder($count,$arrCartId,$arrProductId,$arrQuantity,$arrColorId,$arrSizeId)
    {
        for($i = 0; $i<$count;$i++) {
            $model = new OrderForm();
            $model->user_id = Yii::$app->user->identity->getId();
            $model->product_id = $arrProductId[$i];
            $model->color_id = $arrColorId[$i];
            $model->size_id = $arrSizeId[$i];
            $model->quantity = $arrQuantity[$i];
            $model->province_id = $this->province_id;
            $model->district_id = $this->district_id;
            $model->village_id = $this->village_id;
            $model->specific_address = $this->specific_address;
            if ($this->logistic_method == 1) {
                $model->address = $this->name . ' (' . $this->email . '), ' . $this->specific_address . ', ' . GeoLocation::getNameGeoLocationById($this->village_id) . ', ' . GeoLocation::getNameGeoLocationById($this->district_id) . ', ' . GeoLocation::getNameGeoLocationById($this->province_id);
            } else {
                $model->address = null;
            }
            $model->tel = $this->tel;
            $model->admin_id = 1;
            $model->logistic_method = $this->logistic_method;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            if($model->save(false)){
                $cart = \common\models\Cart::findOne($arrCartId[$i]);
                $cart->status = SystemConstant::STATUS_INACTIVE;
                $cart->save();
            }
        }
//        if($countOrder = $count - 1) {
            return true;
//        } else {
//            return false;
//        }
    }
}
