<?php
/**
 * Created by PhpStorm.
 * User: giaphv
 * Date: 21/08/2018
 * Time: 10:00 SA
 */

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class AccessController extends Controller
{
    public $successUrl = 'success';

    /**
     * @return array[]
     */
    public function actions()
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }

    /**
     * @param $client
     */
    public function successCallback($client)
    {
        $attributes = $client->getUserAttributes();
        var_dump($attributes);die;
        $user = User::findOne([
            'email' => $attributes['email']
        ]);
        if ($user) {
            \Yii::$app->user->login($user, 5);
        } else {
            $session = \Yii::$app->session;
            $session['attributes'] = $attributes;
            $this->redirect(['site/signup']);
        }
    }

}