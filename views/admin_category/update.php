<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>

            <h4>Редактировать категорию "<?= $category['name']; ?>"</h4>

            <br/>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="category_id">Номер категории</label>
                            <input class="form-control" type="text" name="category_id" placeholder="" value="<?= $category['category_id']; ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="sort_order">Номер по порядку</label>
                            <input class="form-control" type="text" name="sort_order" placeholder="" value="<?= $category['sort_order']; ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="parent_id">Родительская категория</label>
                            <input class="form-control" type="text" name="parent_id" placeholder="" value="<?= $category['parent_id']; ?>">
                        </div>

                        <div class="col-md-12">
                            <label for="name">Название категории</label>
                            <input class="form-control" type="text" name="name" placeholder="" value="<?= $category['name']; ?>">
                        </div>

                        <div class="col-md-12">
                            <h5>Изображение категории в каталоге</h5>
                            <div class="col-md-4">
                                <img class="img-thumbnail" src="/uploads/images/catalog/<?= $category['image'] ?>">
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="image" placeholder="" value="<?= $category['image']; ?>">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="description_short">Короткое описание</label>
                            <textarea class="form-control" rows="2" name="description_short"><?= $category['description_short'] ?></textarea>
                        </div>

                        <div class="col-md-12">
                            <h5>Изображение категории в описании</h5>
                            <div class="col-md-6">
                                <img class="img-thumbnail" src="/uploads/images/catalog/<?= $category['description_image'] ?>">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="description_image" placeholder="" value="<?= $category['description_image']; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="description">Детальное описание</label>
                            <textarea class="form-control" rows="7" name="description"><?= $category['description']; ?></textarea>

                            <label for="meta_title">META-title</label>
                            <textarea class="form-control" rows="1" name="meta_title"><?= $category['meta_title']; ?></textarea>

                            <label for="meta_description">META-description</label>
                            <textarea class="form-control" rows="3" name="meta_description"><?= $category['meta_description']; ?></textarea>

                            <label for="meta_description">META-keywords</label>
                            <textarea class="form-control" rows="3" name="meta_keywords"><?= $category['meta_keywords']; ?></textarea>

                            <label for="status">Статус</label>
                            <select class="form-control" name="status">
                                <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                                <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
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

