<?php include (ROOT . '/views/layouts/header.php'); ?>

<div class="container" style="min-height: 600px;">
    <!-- AA: Breadcrumbs (not for start page) -->
    <div class="row hidden-phone hidden-print">
        <div class="span12">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Главная</a>
                    <span class="divider">/</span>
                </li>
                <li class="active">Корзина</li>
            </ul>
        </div>
    </div>
    <!-- category navigation-->
    <div class="row">
        <div class="span2 column-lead hidden-print">
            <div class="well well-small aa-as-container">
                <ul class="nav nav-list aa-listbox">
                    <li class="nav-header aa-nav-sub-header aa-nav-sub-header-link"><a href="#">Продукция</a></li>
                </ul>
                <ul class="nav nav-list aa-nav-sub" style="padding-left:0px; padding-right:0px; margin-left:0px; margin-right:0px;">
                    <?php foreach ($categories as $category) : ?>
                        <?php if ($category['sub_categories'] == 0) : ?>
                            <li class="<?php if ($category['id'] == $categoryID) echo('aa-sub-menu-selected');?>"><a href="/category/<?php echo $category['id'];?>"> <?php echo $category ['name']; ?> </a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="span8">
            <h1>Корзина</h1>

            <?php if ($productsInCart): ?>
                <p>Выбранные товары:</p>
                <table class="table-bordered table-striped table-hover table">
                    <tr>
                        <th style="text-align: center;">Код товара</th>
                        <th style="text-align: center;">Название</th>
                        <th style="text-align: center;">Количество, шт</th>
                        <th style="text-align: center;">Цена, грн</th>
                        <th style="text-align: center;">Стоимость, грн</th>
                        <th style="text-align: center;" class="hidden-print">Удалить</th>
                    </tr>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $product['code'];?></td>
                            <td>
                                <a href="/product/<?php echo $product['id']; ?>">
                                    <?php echo $product['name']; ?>
                                </a>
                            </td>
                            <td style="text-align: center;"><?php echo $productsInCart[$product['id']];?></td>
                            <td style="text-align: right;"><?php echo number_format($product['price'], 2, ',', ' ');?></td>
                            <td style="text-align: right;"><?php echo number_format(($product['price']*$productsInCart[$product['id']]), 2, ',', ' ');?></td>
                            <td style="text-align: center;" class="hidden-print"><a href="/cart/delete/<?php echo $product['id'];?>">x</a></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4">Общая стоимость:</td>
                        <td style="text-align: right;"><?php echo number_format($totalPrice, 2, ',', ' ');?></td>
                        <td></td>
                    </tr>
                </table>

                <p><b>Обратите внимание, что приведенная стоимость является приблизительной и может измениться в зависимости от количества выбранных товаров.
                    Окочательная стоимость (чаще всего ниже) будет указана в счете на оплату</b></p>
                <p><b>Счет на оплату формируется после получения предложения от завода-производителя Autoadapt</b></p>
                <p><b>Цена на товар обновляется каждый день автоматически и зависит от курса Шведской кроны НБУ</b></p>

                <a class="btn btn-primary checkout hidden-print" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                <!--<a class="btn btn-primary checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Отправить на почту</a> -->

                <?php else: ?>
                    <p>Корзина пуста</p>
                    <a class="btn btn-primary checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
            <?php endif; ?>
        </div>
    </div>
</div>




<?php include (ROOT . '/views/layouts/footer.php'); ?>