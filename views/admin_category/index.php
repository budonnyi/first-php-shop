<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление категориями</li>
                </ol>
            </div>

            <a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>
            
            <h4>Список категорий</h4>

            <br/>

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
                                        <th style="text-align: center">ID категории</th>
                                        <th style="text-align: center">Parent_ID</th>
                                        <th style="text-align: center">Название категории</th>
                                        <th style="text-align: center">Порядковый номер</th>
                                        <th style="text-align: center">Статус</th>
                                        <th style="text-align: center">Просмотров</th>
                                        <th>Ред</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($categoriesList as $category): ?>
                                        <tr>
                                            <td style="text-align: center"><?php echo $category['id']; ?></td>
                                            <td style="text-align: center"><?php echo $category['parent_id']; ?></td>
                                            <td><?php echo $category['name']; ?></td>
                                            <td style="text-align: center"><?php echo $category['sort_order']; ?></td>
                                            <td style="text-align: center"><?php echo Category::getStatusText($category['status']); ?></td>
                                            <td style="text-align: center"><?php echo $category['viewed']; ?></td>
                                            <td style="text-align: center"><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редактировать">Ред</a></td>
                                            <td style="text-align: center"><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить">x</a></td>
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
     
        <!-- /#page-wrapper -->

    </div>

</section>

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

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

