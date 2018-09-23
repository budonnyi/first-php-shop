<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>

    <div class="container">
        <div class="row">
            <h3>Список товаров</h3><br>
            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>

            <a href="/admin/site/pricelist" class="btn btn-default back"><i class="fa fa-plus"></i> Обновить прайс</a>
        </div>
    </div>

    <div id="wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID товара</th>
                                        <th>Артикул</th>
                                        <th>Название товара</th>
                                        <th>Категория</th>
                                        <th>Цена</th>
                                        <th>Просмотры</th>
                                        <th>Title</th>
                                        <th>Keywords</th>
                                        <th>Description</th>
                                        <th>Buy_also</th>
                                        <th>See_also</th>
                                        <th>Скачать</th>
                                        <th>Видимость</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productsList as $product): ?>
                                        <tr>
                                            <td><?php echo $product['id']; ?></td>
                                            <td><?php echo $product['code']; ?></td>
                                            <td><?php echo $product['name']; ?></td>
                                            <td><?php echo $product['category_id']; ?></td>
                                            <td><?php echo $product['price']; ?></td>
                                            <td><?php echo $product['viewed']; ?></td>
                                            <td><?php echo substr($product['meta_title'], 0, 100) . '..'; ?></td>
                                            <td><?php echo substr($product['meta_keyword'], 0, 100) . '..'; ?></td>
                                            <td><?php echo substr($product['meta_description'], 0, 100) . '..'; ?></td>
                                            <td><?php echo $product['buy_also']; ?></td>
                                            <td><?php echo $product['see_also']; ?></td>
                                            <td><?php echo $product['download_files']; ?></td>
                                            <td><?php if ($product['status'] == '1') echo ('+'); else echo ('---'); ?></td>
                                            <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать">Ред</a></td>
                                            <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить">x</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/template/js/jquery.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="/template/js/jquery.dataTables.min.js"></script>    

    <script src="/template/js/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

