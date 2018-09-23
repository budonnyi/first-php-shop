<?php include (ROOT . '/views/layouts/header.php'); ?>

    <div class="container noselect">
<!-- хлебные крошки -->
        <div class="row hidden-phone hidden-print">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                        <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="/catalog/">Каталог</a>
                        <span class="divider">/</span>
                    </li>

                    <li class="">
						<a href="/category/<?= $categoryID;?>"><?= $catNAME;?></a>
						<span class="divider">/</span>
					</li>
                    <li class="active">
                    	<?= $product['name'];?>
                    </li>
                </ul>
            </div>
        </div>

        <!-- показывает список категорий -->
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-3 column-lead hidden-print">
                <div class="well well-small aa-as-container">
                    <ul class="nav nav-list aa-listbox">
                        <li class="nav-header aa-nav-sub-header aa-nav-sub-header-link">
                            <a href="/catalog">Продукция</a>
                        </li>
                    </ul>
                    <div class="menu">
                        <?= $menu ?>
                    </div>
                </div>
            </div>
    <!-- Основная колонка -->
            <div class="col-xl-8 col-lg-6 col-md-9">
                <h1 class=""><?= $product['name'];?></h1>
                <p class="lead "><?= $product['description_short'];?></p>

                <!-- показывает большое изображение товара если есть-->

                <?php if($product['big_image']) : ?>
                    <div>
                        <img src="<?= '/uploads/images/product/' . $product['big_image'] ?>" width="800" alt="<?= $name ?>" />
                    </div>
                <?php endif; ?>

                <!-- показывает изображения товара -->
                <?php if(isset($images)) :?>
                    <div id="owl-pictures" class="owl-carousel">
                        <?php foreach ($images as $img) : ?>
                            <div class="item">
                                <img src="/uploads/images/product/<?= $img ?>" alt="<?= $product['name'] ?>">
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

<!-- конец показа изображений товара -->
<!-- показ видео товара -->
                <?= $product['description'] ?>
                <br>
                <div class="row">
                    <?php if ($product['video1']) :?>
                        <div class="block videoembedpage <?php if($product['video2']) echo "col-md-6"; else echo "col-md-12";?> clearfix">
                            <div class="border ">
                                <div class="videoWrapper videoWideScreen chrome_25">
                                    <iframe src="<?= $product['video1'];?>" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="720" frameborder="0" height="420">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                        <?php if ($product['video2']) :?>
                            <div class="block videoembedpage <?php if($product['video1']) echo "col-md-6"; else echo "col-md-12";?> clearfix">
                                <div class="border ">
                                    <div class="videoWrapper videoWideScreen chrome_25">
                                        <iframe src="<?= $product['video2'];?>" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="720" frameborder="0" height="420">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
<!-- конец показа видео товара -->
<!-- files to download-->

                </div>
            </div>

<!-- Правая колонка -->
            <div class="col-xl-2 col-lg-3 col-md-12 column-lead hidden-print">
                <div class="well well-small aa-as-container">
                    <ul class="nav nav-list aa-listbox">
                        <li class="nav-header aa-listbox-header">О товаре</li>
                        <li><p>Произв.: <?= $product['manufacturer'];?></p></li>
                        <li><p>Код товара: <?= $product['code'];?></p></li>
                        <li><p>Наличие:
                        <?php
                        if ($product['availability'] != 0) {
                            echo "на складе</p>";
                        } else {
                            echo "под заказ</p>";
                        }

//if ($product['price'] > 0) {
//echo "<p> Цена: " . number_format($product['price'], 2, ',', "'") . " грн</b><///p>";
                                    ?>
                        </li>
                    </ul>
                        <!-- <a href="/cart/add/<?= $product['product_id'];?>">
                            <div style="margin: 0;">
                                <button type="button" class="btn btn-block btn-primary">В корзину</button>
                            </div>
                        </a> -->
                </div>

<!-- Раздел BUY ALSO -->

                <?php if($product['buy_also']) : ?>
                    <div class="block pageselectionboxblock ">
                        <div class="well well-small aa-as-container">
                            <ul class="nav nav-list aa-listbox">
                                <li class="nav-header aa-listbox-header">
                                    Купить также
                                </li>
                                <?php foreach ($Listproduct as $buyalsoPr): ?>
                                    <?php if(in_array($buyalsoPr['id'], explode(':', $product['buy_also']))) echo
                                        '<li>
                                            <a href="/cart/add/' . $buyalsoPr['id'] . '">' . $buyalsoPr['name'] . '</a>
                                        </li>';?>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?> 

<!-- Раздел SEE ALSO -->
                <?php if ($product['see_also']) : ;?>
                    <div class="block pageselectionboxblock">
                        <div class="well well-small aa-as-container">
                            <ul class="nav nav-list aa-listbox">
                                <li class="nav-header aa-listbox-header" >
                                    Смотри также
                                </li>
                                <?php foreach ($Listproduct as $seealsoPr): ?>
                                    <?php if(in_array($seealsoPr['id'], explode(':', $product['see_also']))) echo
                                        '<li>
                                            <a href="/product/' . $seealsoPr['id'] . '">' . $seealsoPr['name'] . '</a>
                                        </li>';?>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>


                <?php if ($product['download_files']) : ?>
                    <div class="">
                        <?php foreach ($FilesToDownload as $downloadlist): ?>
                            <?php if(in_array($downloadlist['id'], explode(':', $product['download_files']))) : ?>
                                <?php $bookName = $downloadlist['type'] . '<br>' . '<b>' . $downloadlist['name'] . '</b>';
                                echo ('<a href="/uploads/download/' . $downloadlist['link'] . '" target="blank">' ); ?>
                                <div id="booklistDiv">
                                    <i id="booklistI" class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    <p id="booklist" >
                                        <?= $bookName ?>
                                    </p>
                                </div>
                                <?= '</a>' ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php include (ROOT . '/views/layouts/footer.php'); ?>