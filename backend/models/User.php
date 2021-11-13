<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string|null $tel
 * @property string|null $address
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $verified_at
 * @property string $referral_code
 * @property int $status 0 for inactive, 1 for active
 * @property int $role 0 for customer, >= 1 for admins and sales
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $verification_token
 * @property string|null $source
 * @property string|null $source_id
 */
class User extends \common\models\User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'auth_key', 'password_hash', 'email', 'referral_code', 'created_at', 'updated_at'], 'required'],
            [['verified_at', 'created_at', 'updated_at'], 'safe'],
            [['status', 'role'], 'integer'],
            [['username', 'address', 'password_hash', 'password_reset_token', 'email', 'referral_code', 'verification_token', 'source', 'source_id'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 12],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['referral_code'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'name' => Yii::t('app', 'Name'),
            'tel' => Yii::t('app', 'Tel'),
            'address' => Yii::t('app', 'Address'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'verified_at' => Yii::t('app', 'Verified At'),
            'referral_code' => Yii::t('app', 'Referral Code'),
            'status' => Yii::t('app', 'Status'),
            'role' => Yii::t('app', 'Role'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'source' => Yii::t('app', 'Source'),
            'source_id' => Yii::t('app', 'Source ID'),
        ];
    }
}
