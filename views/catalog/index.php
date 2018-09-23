<?php include (ROOT . '/views/layouts/header.php'); ?>

    <div class="container noselect">
        <!-- AA: Breadcrumbs (not for start page) -->
        <div class="row hidden-phone hidden-print">
            <div class="col-lg-12 col-md-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                        <span class="divider">/</span>
                    </li>
                    <li class="active">
                        Каталог
                    </li>
                </ul>
            </div>
        </div>
<!--Меню категорий слева-->
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 column-lead hidden-print">
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

            <div class="col-xl-8 col-lg-7 col-md-8">
                <h1>Продукция</h1>
                <p class="lead "><!-- animated zoomInUp -->
                    Безопасные и надежные решения для адаптации в автомобиле.
                </p>
                <p class="">C продукцией компании Autoadapt мы помогаем людям делать то, что для многих является абсолютно обыденными делами,
                    такими как поездка в авто на работу, внезапный поход в магазин или незапланированная встреча с друзьями. Autoadapt
                    с большой гордостью занимается разработкой и производством решений, которым доверяют люди по всему миру. Компания
                    Autoadapt была создана в 1996г. и с тех пор выросла в одного из мировых лидеров среди производителей адаптивных
                    решений для людей с ограниченной подвижностью. На данный момент компания представлена в 50 странах по всему миру,
                    в том числе и Украине, насчитывает более 300 обученных дилеров Autoadapt и более 700 субдилеров. Головной офис
                    Autoadapt, центр разработок и производственная линия находятся в г.Стенкюлен, в юго-западной части Швеции. С
                    апреля 2014 Autoadapt является единоличным владельцем британской компании Unwin.<br>
                    Вместе с партнерами, компаниями BraunAbility и Bruno Independent Living Aids, Autoadapt является мировым лидером в сфере решений автомобильной
                    безопасности для людей с ограниченной подвижностью.
                </p>
                <?php foreach ($categories as $category) : ?>
                    <?php if ($category['status'] == 1) : ?>
                        <div class="media border-product-list">
                            <a href="/category/<?= $category['id'];?>" target="_self">
                                <img class="img-responsive media-object product-list-image-width pull-left" src="<?= '/uploads/images/catalog/' . $category ['image'] ?>" alt="<?= $category['name'] ?>">
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">
                                    <a href="/category/<?php echo $category['id'];?>" target="_self"><?= $category ['name'];?></a>
                                </h3>
                                <p class=""><?= $category ['description_short'];?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <!-- правая часть страницы + каталог -->
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 column-lead hidden-print clearfix">
                <p class="text-center">
                    <a title="Каталог продукции Autoadapt" href="/uploads/download/product-catalogue_2015-10_en.pdf" target="_blank">
                        <img alt="Каталог продукции Autoadapt" src="/uploads/images/productcatalogue2015_thumb.png" class="img-responsive">
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