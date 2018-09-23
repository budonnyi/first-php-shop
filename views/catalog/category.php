<?php include (ROOT . '/views/layouts/header.php'); ?>

    <div class="container noselect">

<!-- AA: Breadcrumbs (not for start page) -->
        <div class="row hidden-phone hidden-print">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                        <span class="divider">/</span>
                    </li>
                    <li class="active">
                        <a href="/catalog">Каталог</a>
                        <span class="divider">/</span>
                    </li>
                    <!--Определение имени раздела и его описания (выбранная категория) -->
                    <?php
                        $name = $categoryData['name'];
                        $description_short = $categoryData['description_short'];
                        $description = $categoryData['description'];
                        $description_image = $categoryData['description_image'];
                    ?>
                    <li class="active">
                        <?= $name ?>
                    </li>
                </ul>
            </div>
        </div>

<!--Блок категорий с левой стороны-->
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 column-lead hidden-print">
                <div class="well well-small aa-as-container">
                    <ul class="nav nav-list aa-listbox">
                        <li class="nav-header aa-nav-sub-header aa-nav-sub-header-link">
                            <a href="/catalog">Продукция</a>
                        </li>
                    </ul>
                    <?php $activeID = 1;?>
                    <div class="menu">
                        <?= $menu ?>
                    </div>
                </div>
            </div>

<!-- заголовок описание категории-->
            <div class="col-xl-8 col-lg-7 col-md-8 ">
                <h1 class=""><?= $name;?></h1>
                <div class="">
                    <p class="animated zoomIn lead ">
                        <?= $description_short ?>
                    </p>
                    <?php if (($description_image)) : ?>
                        <div>
                            <img src="<?= '/uploads/images/catalog/' . $description_image;?>" width="800" alt="<?= $name ?>" />
                        </div>
                    <?php endif; ?>
                    <p class=" animated zoomIn">
                        <?= $description ?> 
                    </p>
                </div>
<!--Выводит список подкатегорий -->
                <div class=" block pagegalleryblock ">
                    <?php foreach ($subcategories as $subcategory) : ?>
                        <div class="media border-product-list">
                            <a href="/category/<?= $subcategory['id'];?>" target="_self">
                                <img class="img-responsive media-object product-list-image-width pull-left" src="<?= '/uploads/images/catalog/' . $subcategory ['image'] ?>" alt="<?= $subcategory['name'] ?>">
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">
                                    <a href="/category/<?= $subcategory['id'];?>" target="_self"><?= $subcategory ['name'];?></a>
                                </h3>
                                <p class=""><?= $subcategory ['description_short'];?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
<!--Products list-->
                <div class=" block pagegalleryblock">
                    <?php foreach ($categoryProduct as $product) : ?>
                        <div class="media border-product-list">
                            <a href="/product/<?= $product['id'];?>" target="_self">
                                <img class="img-responsive media-object product-list-image-width pull-left" src="<?= ('/uploads/images/product/' . $product['image']);?>">
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">
                                    <a href="/product/<?= $product['id'];?>" target="_self"><?= $product['name'];?></a>
                                </h3>
                                <p class=""><?= $product['description_short'];?></p>
                            </div>
                            <div class="list-button-right">
                                <a class="btn visible-desktop hidden-print" href="/product/<?= $product['id'];?>">Узнать больше</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

<!-- Related content area -->
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 column-lead hidden-print">
                <p class="text-center">
                    <a title="Каталог продукции Autoadapt" href="/uploads/download/product-catalogue_2015-10_en.pdf" target="_blank">
                        <img alt="Каталог продукции Autoadapt" src="/uploads/images/productcatalogue2015_thumb.png">
                    </a>
                </p>
                <p class="text-center brochures">
                    <small>Скачать каталог
                        <a href="/uploads/download/product-catalogue_2015-10_en.pdf" target="_blank">здесь</a>
                    </small>
                </p>
                <p class="text-center">
                    <a title="Коммерческие продукты" href="/uploads/download/professional_brochure_en.pdf" target="_blank">
                        <img alt="Коммерческие продукты" src="/uploads/images/proffesionalcatalogue_thumb.png">
                    </a>
                </p>
                <p class="text-center brochures">
                    <small>Скачать каталог
                        <a href="/uploads/download/professional_brochure_en.pdf" target="_blank">здесь</a>
                    </small>
                </p>
            </div>

        </div>
    </div>

<?php include (ROOT . '/views/layouts/footer.php'); ?>