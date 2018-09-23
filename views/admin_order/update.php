<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Редактировать заказ</li>
                </ol>
            </div>


            <h4>Редактировать заказ #<?php echo $id; ?></h4>

            <br/>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-4">

                        <label for="userName">Имя клиента</label>
                        <input class="form-control" type="text" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>">

                        <label for="userPhone">Телефон клиента</label>
                        <input class="form-control" type="text" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>">

                        <label for="userEmail">E-mail клиента</label>
                        <input class="form-control" type="text" name="userEmail" placeholder="" value="<?php echo $order['user_email']; ?>">

                        <label for="userComment">Комментарий клиента</label>
                        <input class="form-control" type="text" name="userComment" placeholder="" value="<?php echo $order['user_comment']; ?>">

                        <label for="date">Дата оформления заказа</label>
                        <input class="form-control" type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

                        <label for="status">Статус</label>
                        <select class="form-control" name="status">
                            <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                            <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                            <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                            <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                        </select>
                        <br>
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

