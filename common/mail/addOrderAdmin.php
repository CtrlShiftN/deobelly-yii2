<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
$backendUrl = Yii::$app->params['backend'];
$imgUrl = Yii::$app->params['common'] . "/media";
?>
<div class="password-reset">
    Kính chào quý khách,<br/>
    Một đơn hàng mới vừa được tạo bởi người dùng có Username: <b><?= Yii::$app->user->identity->username ?></b><br/>
    Đơn hàng bao gồm:<br/><br/>
    <table cellpadding="0" cellspacing="0" width="100%" border="1px solid #C0C0C0">
        <tr>
            <th style="text-align: center">Mã SKU</th>
            <th style="text-align: center;width:120px;height:auto">Ảnh</th>
            <th style="text-align: center">Tên sản phẩm</th>
            <th style="text-align: center">Màu sắc</th>
            <th style="text-align: center">Kích cỡ</th>
            <th style="text-align: center">Số lượng</th>
            <th style="text-align: center">Đơn giá</th>
        </tr>
        <?php foreach (array_values($orderModel) as $key => $order): ?>
            <?php if ($key % 2 == 0): ?>
                <tr style="background-color: #dddddd">
            <?php else: ?>
                <tr>
            <?php endif; ?>
            <td style="padding-left: 10px"><?= $order['SKU'] ?></td>
            <td style="padding-left: 10px;width:120px;height:auto"><img src="<?= $imgUrl.'/'.$order['product_image'] ?>" style="width:100%"></td>
            <td style="padding-left: 10px"><?= \common\models\Product::findOne($order['product_id'])['name'] ?></td>
            <td style="text-align: center"><?= \common\models\Color::findOne($order['color_id'])['name'] ?></td>
            <td style="text-align: center"><?= \common\models\Size::findOne($order['size_id'])['name'] ?></td>
            <td style="text-align: center"><?= $order['quantity'] ?></td>
            <td style="text-align: center"><?= $order['quantity']*$order['product_price'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table><br/>
    Kiểm tra ngay: <a href="<?= $backendUrl.'/order/' ?>">Go to Order manager.</a><br/>
    <b>Xin chân thành cám ơn!</b>
</div>
