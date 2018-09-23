<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container-fluid">
        <div class="row col-md-12">

            <h3>Редактировать товар</h3><br>
            <a href="/admin/product" class="btn btn-default back"><i class="fa fa-plus"></i> Список товаров</a>
            <a href="/admin/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>

            <br/>

            <form action="#" method="post" enctype="multipart/form-data">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="form-group">
                    <div class="col-md-3">

                        <label for="name">Название товара</label>
                        <input class="form-control" type="text" name="name" placeholder="" value="<?= $product['name']; ?>">

                        <label for="code">Артикул</label>
                        <input class="form-control" type="text" name="code" placeholder="" value="<?= $product['code']; ?>">

                        <label for="price">Стоимость, $</label>
                        <input class="form-control" type="text" name="price" placeholder="" value="<?= $product['price']; ?>">

                        <label for="category">Категория</label>
                        <select class="form-control" name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?= $category['id']; ?>"
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?= $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <label for="manufacturer">Производитель</label>
                        <select class="form-control" name="manufacturer">
                            <option value="Autoadapt AB" <?php if ($product['manufacturer'] == 'Autoadapt AB') echo ' selected="selected"'; ?>>Autoadapt AB</option>
                            <option value="Braun Ability" <?php if ($product['manufacturer'] == 'Braun Ability') echo ' selected="selected"'; ?>>Braun Ability</option>
                            <option value="UNWIN" <?php if ($product['manufacturer'] == 'UNWIN') echo ' selected="selected"'; ?>>UNWIN</option>>UNWIN</option>
                            <option value="Q-Straight" <?php if ($product['manufacturer'] == 'Q-Straight') echo ' selected="selected"'; ?>>Q-Straight</option>>Q-Straight</option>
                            <option value="Mariani" <?php if ($product['manufacturer'] == 'Mariani') echo ' selected="selected"'; ?>>Mariani</option>>Mariani</option>
                            <option value="Fiorella" <?php if ($product['manufacturer'] == 'Fiorella') echo ' selected="selected"'; ?>>Fiorella</option>>Fiorella</option>
                        </select>

                        <label for="image">Изображение товара</label>
                        <input class="form-control" type="text" name="image" placeholder="" value="<?= $product['image']; ?>">

                        <label for="big_image">Большое изображение товара 770х320</label>
                        <input class="form-control" type="text" name="big_image" placeholder="" value="<?= $product['big_image']; ?>">

                        <label for="video1">Видео 1 товара</label>
                        <input class="form-control" type="text" name="video1" placeholder="" value="<?= $product['video1']; ?>">

                        <label for="video2">Видео2 товара</label>
                        <input class="form-control" type="text" name="video2" placeholder="" value="<?= $product['video2']; ?>">

                        <label for="availability">Наличие на складе</label>
                        <select class="form-control" name="availability">
                            <option value="1" <?php if ($product['availability'] == 1) echo 'selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['availability'] == 0) echo 'selected="selected"'; ?>>Нет</option>
                        </select>

                        <label for="status">Статус</label>
                        <select class="form-control" name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo 'selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo 'selected="selected"'; ?>>Скрыта</option>
                        </select>
                    </div>

                    <div class="col-md-6">

                        <label for="description_short">Короткое описание</label>
                        <textarea class="form-control" rows="4" name="description_short"><?= $product['description_short'] ?></textarea>

                        <label for="description">Детальное описание</label>
                        <textarea class="form-control" rows="4" name="description"><?= $product['description'] ?></textarea>

                        <label for="meta_title">meta_title</label>
                        <input class="form-control" type="text" name="meta_title" placeholder="" value="<?= $product['meta_title'] ?>">

                        <label for="meta_keyword">meta_keyword</label>
                        <textarea class="form-control" rows="4" name="meta_keyword"><?= $product['meta_keyword'] ?></textarea>

                        <label for="meta_description">meta_description</label>
                        <textarea class="form-control" rows="4" name="meta_description"><?= $product['meta_description'] ?></textarea>

                        <p></p>
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Сохранить">
                    </div>

                    <div class="col-md-3">

                        <label for="buyalso">Комплектующие</label>
                        <select class="form-control" name="buyalso[]" style="height: 170px" multiple>
                            <?php foreach ($productList as $key): ?>
                                <option value="<?=$key['id']?>" <?php if(($product['buy_also'])) {
                                    if(in_array($key['id'], explode(':', $product['buy_also']))) echo('selected');}?>>
                                    <?= $key['id'] . '&nbsp' . $key['name']; ?>
                                </option>
                            <?php endforeach ?>
                        </select>

                        <label for="seealso">Смотри также</label>
                        <select class="form-control" name="seealso[]" style="height: 170px" multiple>
                            <?php foreach ($productList as $key): ?>
                                <option value="<?=$key['id']?>" <?php if(($product['buy_also'])) {
                                    if(in_array($key['id'], explode(':', $product['see_also']))) echo('selected');}?>>
                                    <?= $key['id'] . '&nbsp' . $key['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label for="seealso">Файлы для скачивания</label>
                        <select class="form-control" name="filestodownload[]" style="height: 180px" multiple>
                            <?php foreach ($FilesToDownload as $key): ?>
                                <option value="<?=$key['id']?>" <?php if(($product['download_files'])) {
                                    if(in_array($key['id'], explode(':', $product['download_files']))) echo('selected');}?>>
                                    <?= $key['sort_order'] . '&nbsp' . $key['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                </div>
            </form>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

