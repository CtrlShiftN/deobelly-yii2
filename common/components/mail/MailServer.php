<?php

namespace common\components\mail;

use Yii;

class MailServer
{
    public static function sendMail($title,$htmlContent,$receiver=null)
    {
        $mail =  Yii::$app->mailer->compose()->setFrom(Yii::$app->params['senderEmail']);
            if(!empty($receiver)){
                $mail->setTo($receiver);
            } else {
                $mail->setTo(Yii::$app->params['adminEmail']);
            }
            $mail->setSubject($title)
            ->setHtmlBody($htmlContent)
            ->send();
    }
}