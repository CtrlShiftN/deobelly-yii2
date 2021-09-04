<?php

namespace frontend\models;

use common\components\SystemConstant;
use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $tel
 * @property string $content
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class ContactForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'tel', 'content'], 'required', 'message' => 'Trường nhập không được bỏ trống'],
            [['tel', 'status', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
            [['email'], 'email', 'message' => 'Email không đúng định dạng'],
            [['tel'], 'match', 'pattern' => '/^(84|0)+([0-9]{9})$/', 'message' => 'Bao gồm 10 chữ số bắt đầu từ 0 hoặc 11 bắt đầu từ 84'],
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
            'email' => 'Email',
            'tel' => 'Tel',
            'content' => 'Content',
            'status' => 'Status',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return bool
     */
    public function saveContactData()
    {
        $contactModel = new ContactForm();
        $contactModel->name = $this->name;
        $contactModel->email = $this->email;
        $contactModel->tel = $this->tel;
        $contactModel->content = $this->content;
        if (!Yii::$app->user->isGuest) {
            $contactModel->user_id = Yii::$app->user->identity->id;
        } else {
            $contactModel->user_id = null;
        }
        $contactModel->status = SystemConstant::STATUS_ACTIVE;
        $contactModel->created_at = date('Y-m-d H:i:s');
        $contactModel->updated_at = date('Y-m-d H:i:s');
        return $contactModel->save();
    }
}
