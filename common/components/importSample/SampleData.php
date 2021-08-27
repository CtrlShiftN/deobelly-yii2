<?php

namespace common\components\importSample;

use common\models\User;
use yii\base\BaseObject;

class SampleData
{
    protected static $userInfoArr = [
        [
            'password_hash' => 'Iamadmin@1234',
            'email' => 'admin.deobelly@gmail.com',
            'name' => "I'm Admin",
            'tel' => '0333333333',
            'username' => 'admin',
            'role' => User::ROLE_ADMIN,
        ],
        [
            'email' => 'customer.deobelly@gmail.com',
            'password_hash' => 'Iamcustomer@1234',
            'name' => "I'm Customer",
            'tel' => '0333333333',
            'username' => 'customer',
            'role' => User::ROLE_USER,
        ]
    ];

    public static function insertSampleUser()
    {
        $count = 0;
        foreach (self::$userInfoArr as $key => $values)
        {
            $user = new User();
            $user->email = $values['email'];
            $user->setPassword($values['password_hash']);
            $user->name = $values['name'];
            $user->tel = $values['tel'];
            $user->generateAuthKey();
            $user->generatePasswordResetToken();
            $user->username = $values['username'];
            $user->referral_code = strstr($values['email'], '@', true);
            $user->role = $values['role'];
            $user->created_at = date('Y-m-d H:m:s');
            $user->updated_at = date('Y-m-d H:m:s');
            $user->status = $user::STATUS_ACTIVE;
            if ($user->save()){
                $count++;
            }
        }
        return "Inserted ".$count.'/'.count(self::$userInfoArr).' records ';
    }
}