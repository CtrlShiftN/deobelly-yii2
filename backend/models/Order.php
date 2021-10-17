<?php

namespace backend\models;

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
 * @property string $province
 * @property string $district
 * @property string $village
 * @property string $specific_address
 * @property string $address
 * @property string|null $notes
 * @property string $tel
 * @property int $admin_id
 * @property int|null $status 0 - new,1 - processing,2 - approved,3 - shipping,4 - finished,5- cancelled,6 - expired,7 - returned,8 - postpone,9 - rejected,10 - failed,11 - fake
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Order extends \common\models\Order
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
            [['user_id', 'product_id', 'quantity', 'province', 'district', 'village', 'specific_address', 'address', 'tel', 'admin_id'], 'required'],
            [['user_id', 'product_id', 'color_id', 'size_id', 'quantity', 'admin_id', 'status'], 'integer'],
            [['address', 'notes'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['province', 'district', 'village', 'specific_address', 'tel'], 'string', 'max' => 255],
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
            'province' => Yii::t('app', 'Province'),
            'district' => Yii::t('app', 'District'),
            'village' => Yii::t('app', 'Village'),
            'specific_address' => Yii::t('app', 'Specific Address'),
            'address' => Yii::t('app', 'Address'),
            'notes' => Yii::t('app', 'Notes'),
            'tel' => Yii::t('app', 'Tel'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return bool|void
     */
    public static function updateOrderNotes($id, $attribute, $value)
    {
        $updateStatus = \common\models\Order::updateAll([
            $attribute => $value,
            'updated_at' => date('Y-m-d H:i:s'),
            'admin_id' => Yii::$app->user->identity->getId()
        ], ['id' => $id]);
        $model = \common\models\Order::findOne($id);
        if (!empty($model)) {
            $status = $model->status;
            $adminID = $model->admin_id;
            return self::updateOrCreateOrderTrackingNote($id, $adminID, $status, $value);
        }
    }

    /**
     * @param $orderID
     * @param $adminID
     * @param $actionID
     * @param $note
     * @return bool
     */
    private static function updateOrCreateOrderTrackingNote($orderID, $adminID, $actionID, $note){
        $model = \common\models\OrderTracking::findOne([
            'order_id' => $orderID,
            'admin_id' => $adminID,
            'action' => $actionID
        ]);
        if (!empty($model)){
            $model->notes = $note;
            $model->updated_at = date('Y-m-d H:i:s');
            return $model->save();
        }else{
            $orderTrackingModel = new \common\models\OrderTracking();
            $orderTrackingModel->order_id = $orderID;
            $orderTrackingModel->admin_id = $adminID;
            $orderTrackingModel->action = $actionID;
            $orderTrackingModel->notes = $note;
            $orderTrackingModel->created_at = date('Y-m-d H:i:s');
            $orderTrackingModel->updated_at = date('Y-m-d H:i:s');
            return $orderTrackingModel->save();
        }
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int|void
     */
    public static function updateOrderStatus($id, $attribute, $value)
    {
        $model = new \common\models\OrderTracking();
        $model->admin_id = Yii::$app->user->identity->getId();
        $model->order_id = $id;
        $model->action = $value;
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->save()) {
            return \common\models\Order::updateAll([
                $attribute => $value,
                'updated_at' => date('Y-m-d H:i:s'),
                'admin_id' => Yii::$app->user->identity->getId()
            ], ['id' => $id]);
        }
    }
}
