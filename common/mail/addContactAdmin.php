<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$backendUrl = Yii::$app->params['backend']
?>
<div class="password-reset">
    <p>Have good day!</p>

    <p>You have a new contact! Check now</p>

    <p><a href="<?= $backendUrl.'/contact/' ?>">Go to Contact manager >></a></p>
</div>
