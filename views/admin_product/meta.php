<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>

    <div class="container">
        <div class="row">
            <h3>настройка метатегов</h3><br>
            <?php echo $_SERVER['HTTP_REFERER'];?>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <table width="100%" class="table table-striped table-bordered table-hover" id="-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название товара</th>
                            <th>Title</th>
                            <th>Keywords</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productsList as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td style="<?php if(mb_strlen($product['meta_title']) > 65) echo('color: red;') ?>"><?php echo mb_strlen($product['meta_title']) . ' ' . $product['meta_title'] ?></td>
                                <td style="<?php if(mb_strlen($product['meta_keyword']) > 70) echo('color: red;') ?>"><?php echo mb_strlen($product['meta_keyword']) . ' ' . $product['meta_keyword'] ?></td>
                                <td style="<?php if(mb_strlen($product['meta_description']) > 190) echo('color: red;') ?>"><?php echo mb_strlen($product['meta_description']) . ' ' . $product['meta_description'] ?></td>
                                <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать">Ред</a></td>

                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
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

