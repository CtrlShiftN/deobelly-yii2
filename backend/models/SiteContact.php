<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "site_contact".
 *
 * @property int $id
 * @property string $gps_link
 * @property string $logo_link
 * @property string $company_address
 * @property int $tel
 * @property string $email
 * @property int $admin_id
 * @property int|null $status 0 for inactive 1 for active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class SiteContact extends \common\models\SiteContact
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gps_link', 'logo_link', 'company_address', 'tel', 'email', 'admin_id'], 'required'],
            [['gps_link'], 'string'],
            [['tel', 'admin_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['logo_link', 'company_address', 'email'], 'string', 'max' => 255],
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'on' => 'create'],
            ['file', 'required', 'on' => 'create'],

            ['email', 'required', 'message' => Yii::t('app', "Email can't be blank.")],
            [['email'], 'email', 'message' => Yii::t('app', 'Invalid email.')],

            ['tel', 'integer'],
            ['tel', 'required', 'message' => Yii::t('app', 'Phone number can not be blank.')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'gps_link' => Yii::t('app', 'Gps Link'),
            'logo_link' => Yii::t('app', 'Logo Link'),
            'company_address' => Yii::t('app', 'Company Address'),
            'tel' => Yii::t('app', 'Tel'),
            'email' => Yii::t('app', 'Email'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'file' => Yii::t('app', 'File'),
        ];
    }

    public static function updateSiteContact($id, $attribute, $value)
    {
        return \common\models\SiteContact::updateAll([
            $attribute => $value,
            'updated_at' => date('Y-m-d H:i:s'),
            'admin_id' => Yii::$app->user->identity->getId()
        ], ['id' => $id]);
    }
}
