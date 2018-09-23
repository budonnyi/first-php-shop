<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>

            <h4>Добавить новую категорию</h4>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="form-group">


                        <div class="col-md-6">
                            <label for="sort_order">Порядок сортировки</label>
                            <input class="form-control" type="text" name="sort_order" placeholder="" value="">
                        </div>

                        <div class="col-md-6">
                            <label for="parent_id">Родительская категория</label>
                            <input class="form-control" type="text" name="parent_id" placeholder="" value="">
                        </div>

                        <div class="col-md-12">
                            <label for="name">Название категории</label>
                            <input class="form-control" type="text" name="name" placeholder="" value="">
                        </div>

                        <div class="col-md-12">
                            <h5>Изображение категории в каталоге 554x416</h5>

                            <div class="col-md-8">
                                <input class="form-control" type="text" name="image" placeholder="" value="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="description_short">Короткое описание</label>
                            <textarea class="form-control" rows="2" name="description_short"></textarea>
                        </div>

                        <div class="col-md-12">
                            <h5>Изображение категории в описании 770x320</h5>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="description_image" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="description">Детальное описание</label>
                            <textarea class="form-control" rows="7" name="description"></textarea>

                            <label for="meta_title">META-title</label>
                            <textarea class="form-control" rows="1" name="meta_title"></textarea>

                            <label for="meta_description">META-description</label>
                            <textarea class="form-control" rows="3" name="meta_description"></textarea>

                            <label for="meta_description">META-keywords</label>
                            <textarea class="form-control" rows="3" name="meta_keywords"></textarea>

                            <label for="status">Статус</label>
                            <select class="form-control" name="status">
                                <option value="1" selected="selected">Отображается</option>
                                <option value="0">Скрыт</option>
                            </select>

                            <br>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Сохранить">
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

