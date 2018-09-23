<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
                        
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление заказами</li>
                </ol>
            </div>

            <h4>Список заказов</h4>

            <br/>

            
            <table class="table-bordered table-striped table">
                <tr>
                    <th style="text-align: center">ID заказа</th>
                    <th style="text-align: center">Имя покупателя</th>
                    <th style="text-align: center">Телефон покупателя</th>
                    <th style="text-align: center">Дата оформления</th>
                    <th style="text-align: center">Статус</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td style="text-align: center">
                            <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                <?php echo $order['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td style="text-align: center"><?php echo $order['date']; ?></td>
                        <td><?php echo Order::getStatusText($order['status']); ?></td>    
                        <td style="text-align: center"><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть">См</a></td>
                        <td style="text-align: center"><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать">Ред</i></a></td>
                        <td style="text-align: center"><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить">х</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

