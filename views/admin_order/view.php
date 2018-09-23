<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Просмотр заказа</li>
                </ol>
            </div>

            <h4>Просмотр заказа #<?php echo $order['id']; ?></h4>
            <br/>

            <h5>Информация о заказе</h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Номер заказа</td>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td><?php echo $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <td>E-mail клиента</td>
                    <td><?php echo $order['user_email']; ?></td>
                </tr>
                <tr>
                    <td>Комментарий клиента</td>
                    <td><?php echo $order['user_comment']; ?></td>
                </tr>
                <?php if ($order['user_id'] != 0): ?>
                    <tr>
                        <td>ID клиента</td>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Статус заказа</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>

            <h5>Товары в заказе</h5>

            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th style="text-align: center">ID товара</th>
                    <th style="text-align: center">Артикул товара</th>
                    <th style="text-align: center">Название</th>
                    <th style="text-align: center">Цена</th>
                    <th style="text-align: center">Количество</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td style="text-align: center"><?php echo $product['id']; ?></td>
                        <td style="text-align: center"><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td style="text-align: right"><?php echo number_format($product['price'],2,',',' '); ?></td>
                        <td style="text-align: center"><?php echo $productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/admin/order/" class="btn btn-primary back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>

</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

