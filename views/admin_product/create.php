<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h3>Добавить товар</h3><br>
            <a href="/admin/product" class="btn btn-default back"><i class="fa fa-plus"></i> Список товаров</a>

            <h4></h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-3">


                        <label for="name">Название товара</label>
                        <input class="form-control" type="text" name="name" placeholder="" value="">

                        <label for="code">Артикул</label>
                        <input class="form-control" type="text" name="code" placeholder="" value="">

                        <label for="price">Стоимость, $</label>
                        <input class="form-control" type="text" name="price" placeholder="" value="">

                        <label for="category">Категория</label>
                        <select class="form-control" name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <label for="manufacturer">Производитель</label>
                        <select class="form-control" name="manufacturer">
                            <option value="Autoadapt AB" selected="selected">Autoadapt AB</option>
                            <option value="Braun Ability">Braun Ability</option>
                            <option value="UNWIN">UNWIN</option>
                            <option value="Q-Straight">Q-Straight</option>
                            <option value="Mariani">Mariani</option>
                            <option value="Fiorella">Fiorella</option>
                        </select>

                        <label for="image">Изображение товара в каталоге</label>
                        <input class="form-control" type="text" name="image" placeholder="" value="">

                        <label for="video1">Видео 1 товара</label>
                        <input class="form-control" type="text" name="video1" placeholder="" value="">

                        <label for="video2">Видео2 товара</label>
                        <input class="form-control" type="text" name="video2" placeholder="" value="">

                        <label for="availability">Наличие на складе</label>
                        <select class="form-control" name="availability">
                            <option value="1">Да</option>
                            <option value="0" selected="selected">Нет</option>
                        </select>

                        <label for="status">Статус</label>
                        <select class="form-control" name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>
                    </div>

                    <div class="col-md-5">

                        <label for="description_short">Короткое описание</label>
                        <textarea class="form-control" rows="4" name="description_short"></textarea>

                        <label for="big_image">Большое изображение товара 770х320</label>
                        <input class="form-control" type="text" name="big_image" placeholder="" value="">

                        <label for="description">Детальное описание</label>
                        <textarea class="form-control" rows="4" name="description"></textarea>

                        <label for="meta_title">meta_title</label>
                        <input class="form-control" type="text" name="meta_title" placeholder="" value="">

                        <label for="meta_keyword">meta_keyword</label>
                        <textarea class="form-control" rows="4" name="meta_keyword"></textarea>

                        <label for="meta_description">meta_description</label>
                        <textarea class="form-control" rows="4" name="meta_description"></textarea>

                        <p></p>
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Сохранить">
                    </div>

                    <div class="col-md-2">
                        <label for="buyalso">Комплектующие</label>
                        <select multiple class="form-control" name="buyalso[]" style="height: 700px" disabled>
                            <?php if (is_array($productList)): ?>
                                <?php foreach ($productList as $product): ?>
                                    <option value="<?php echo $product['code']; ?>">
                                        <?php echo $product['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <label for="seealso">Смотри также</label>
                        <select multiple class="form-control" name="seealso[]" style="height: 700px" disabled>
                            <?php if (is_array($productList)): ?>
                                <?php foreach ($productList as $product): ?>
                                    <option value="<?php echo $product['code']; ?>">
                                        <?php echo $product['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

