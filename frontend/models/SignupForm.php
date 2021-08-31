<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $password_confirm;
    public $name;
    public $tel;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required', 'message'=>"Email không được để trống"],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Địa chỉ email này đã được sử dụng'],

            ['password', 'required', 'message'=>"Mật khẩu không được để trống"],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['password_confirm', 'required', 'message'=>"Nhập lại mật khẩu không được để trống"],
            ['password_confirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Mật khẩu không khớp" ],

            ['name', 'required', 'message'=>"Tên không được để trống"],
            ['name', 'trim'],
            ['name', 'string', 'max' => 100],

            ['tel', 'trim'],
            ['tel', 'required', 'message'=>"Số điện thoại không được để trống"],
            ['tel', 'string', 'max' => 12, 'min' => Yii::$app->params['user.telMinLength']],

        ];
    }

    public function validateTel($attribute, $params, $validator){
        if (!preg_match('/^(84|0[1-9])+([0-9]{8})$/', $this->tel)){
            $this->addError($attribute, 'Số điện thoại không hợp lệ');
        }
    }

    /**
     * @return bool|null
     * @throws \yii\base\Exception
     */
    public function signup(): ?bool
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->name = $this->name;
        $user->tel = $this->tel;
        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        $user->username = strstr($this->email, '@', true);
        $user->referral_code = strstr($this->email, '@', true);
        $user->role = $user::ROLE_USER;
        $user->created_at = date('Y-m-d H:m:s');
        $user->updated_at = date('Y-m-d H:m:s');
        $user->status = $user::STATUS_ACTIVE;
        return $user->save();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail(User $user): bool
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
