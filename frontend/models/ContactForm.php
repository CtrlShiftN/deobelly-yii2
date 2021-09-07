<?php

namespace frontend\models;

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
            ['name', 'required', 'message' => 'Tên là bắt buộc'],
            [['status', 'user_id'], 'integer'],

            ['content', 'required', 'message' => 'Nội dung là bắt buộc'],
            [['content'], 'string'],

            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],

            ['email', 'required', 'message' => 'Mail là bắt buộc'],
            [['email'], 'email', 'message' => 'Email không đúng định dạng'],

            ['tel', 'integer', 'message' => 'Số điện thoại không hợp lệ'],
            ['tel', 'required', 'message' => 'Số điện thoại là bắt buộc'],
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
            'name' => 'Tên',
            'email' => 'Email',
            'tel' => 'Số điện thoại',
            'content' => 'Nội dung',
            'status' => 'Status',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function sendReplyContact() {
        return Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['supportEmail'])
            ->setTo($this->email)
            ->setSubject('Thông báo về việc gửi phản hồi')
            ->setTextBody('Cảm ơn quý khách đã gửi phản hồi. Chúng tôi sẽ sớm hồi âm lại với quý khách.')
            ->setHtmlBody('<b>HTML content <i>Vuvuvuvvv</i></b>')
            ->send();
    }
}
