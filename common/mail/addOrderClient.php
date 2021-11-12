<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
?>
<div class="password-reset">
    Kính chào quý khách,<br/>
    Chúc mừng quý khách hàng đã đặt hàng thành công tại De Obelly!<br/>
    Đơn hàng của bạn gồm có:<br/><br/>
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
            <td style="padding: 10px;width:120px;">
                <a href="<?= Yii::$app->params['frontend'] . "/shop/product-detail?detail=" . \common\components\encrypt\CryptHelper::encryptString($order['product_id']) ?>">
                    <img src="<?= Yii::$app->params['common'] . '/media/' . $order['product_image'] ?>"
                         alt="<?= \common\models\Product::findOne($order['product_id'])['name'] ?>" style="width: 100%">
                </a></td>
            <td style="padding-left: 10px"><?= \common\models\Product::findOne($order['product_id'])['name'] ?></td>
            <td style="text-align: center"><?= \common\models\Color::findOne($order['color_id'])['name'] ?></td>
            <td style="text-align: center"><?= \common\models\Size::findOne($order['size_id'])['name'] ?></td>
            <td style="text-align: center"><?= $order['quantity'] ?></td>
            <td style="text-align: center"><?= number_format($order['quantity'] * $order['product_price'], 0, ',', '.') ?>
                đ
            </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br/>
    <b>*Lưu ý:</b> Chi phí trên chưa bao gồm phí ship, VAT,...
    <p>Xin chân thành cám ơn!</p>
</div>
