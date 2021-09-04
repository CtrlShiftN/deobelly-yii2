<?php

namespace frontend\models;

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
 */
class User extends \yii\db\ActiveRecord
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
            [['username', 'address', 'password_hash', 'password_reset_token', 'email', 'referral_code', 'verification_token'], 'string', 'max' => 255],
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
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'tel' => 'Tel',
            'address' => 'Address',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'verified_at' => 'Verified At',
            'referral_code' => 'Referral Code',
            'status' => 'Status',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    public static function getNameUserById($id)
    {
        return User::find()->select('name')->where(['status' => 1, 'id' => $id])->asArray()->one();
    }
}