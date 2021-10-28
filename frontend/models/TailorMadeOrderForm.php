<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tailor_made_order".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $customer_name
 * @property string $customer_tel
 * @property string $customer_email
 * @property string|null $body_image
 * @property int $type 0 for top, 1 for trousers, 2 for set
 * @property float|null $height
 * @property float|null $weight
 * @property float|null $neck
 * @property float|null $shoulder
 * @property float|null $chest
 * @property float|null $arm
 * @property float|null $waist
 * @property float|null $wrist
 * @property float|null $waist_to_floor
 * @property float|null $waist_to_knee
 * @property float|null $ankle
 * @property float|null $hip
 * @property float|null $buttock
 * @property float|null $knee
 * @property float|null $thigh
 * @property float|null $biceps
 * @property string|null $notes
 * @property int|null $status 0 for inactive 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TailorMadeOrderForm extends TailorMadeOrder
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tailor_made_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'status', 'admin_id'], 'integer'],
            [['customer_name', 'customer_tel', 'customer_email', 'type', 'height', 'weight'], 'required'],
            [['height', 'weight', 'neck', 'shoulder', 'chest', 'arm', 'waist', 'wrist', 'waist_to_floor', 'waist_to_knee', 'ankle', 'hip', 'buttock', 'knee', 'thigh', 'biceps'], 'number'],
            [['notes'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['customer_name', 'customer_tel', 'customer_email', 'body_image'], 'string', 'max' => 255],
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
            ['customer_tel', 'validateTel'],
        ];
    }

    /**
     * @param $attribute
     * @param $params
     * @param $validator
     */
    public function validateTel($attribute, $params, $validator)
    {
        if (!preg_match('/^(84|0[1-9])+([0-9]{8})$/', $this->tel)) {
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
            'user_id' => Yii::t('app', 'User'),
            'customer_name' => Yii::t('app', 'Customer Name'),
            'customer_tel' => Yii::t('app', 'Customer Tel'),
            'customer_email' => Yii::t('app', 'Customer Email'),
            'body_image' => Yii::t('app', 'Body Image'),
            'type' => Yii::t('app', 'Type'),
            'height' => Yii::t('app', 'Height'),
            'weight' => Yii::t('app', 'Weight'),
            'neck' => Yii::t('app', 'Collar'),
            'shoulder' => Yii::t('app', 'Shoulder'),
            'chest' => Yii::t('app', 'Chest'),
            'arm' => Yii::t('app', 'Arm'),
            'waist' => Yii::t('app', 'Waist'),
            'wrist' => Yii::t('app', 'Wrist'),
            'waist_to_floor' => Yii::t('app', 'Waist To Floor'),
            'waist_to_knee' => Yii::t('app', 'Waist To Knee'),
            'ankle' => Yii::t('app', 'Ankle'),
            'hip' => Yii::t('app', 'Hip'),
            'buttock' => Yii::t('app', 'Buttock Size'),
            'knee' => Yii::t('app', 'Knee'),
            'thigh' => Yii::t('app', 'Thigh'),
            'biceps' => Yii::t('app', 'Biceps'),
            'notes' => Yii::t('app', 'Notes'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'file' => Yii::t('app', 'Body Image'),
        ];
    }
}
