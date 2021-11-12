<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="password-reset">
    Kính chào quý khách,<br/>
    Chúc mừng quý khách hàng đã đặt hàng thành công tại De Obelly, đơn hàng của bạn gồm có:<br/>
    <table cellpadding="0" cellspacing="0" width="100%" border="1px solid #C0C0C0">
        <tr>
            <th style="text-align: center">Tên sản phẩm</th>
            <th style="text-align: center">Màu sắc</th>
            <th style="text-align: center">Kích cỡ</th>
            <th style="text-align: center">Số lượng</th>
        </tr>
        <?php foreach (array_values($orderModel) as $key => $order): ?>
            <?php if ($key % 2 == 0): ?>
                <tr style="background-color: #dddddd">
            <?php else: ?>
                <tr>
            <?php endif; ?>
            <td style="padding-left: 10px"><?= \common\models\Product::findOne($order['product_id'])['name'] ?></td>
            <td style="text-align: center"><?= \common\models\Color::findOne($order['color_id'])['name'] ?></td>
            <td style="text-align: center"><?= \common\models\Size::findOne($order['size_id'])['name'] ?></td>
            <td style="text-align: center"><?= $order['quantity'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h4>Xin chân thành cám ơn!</h4>
</div>
