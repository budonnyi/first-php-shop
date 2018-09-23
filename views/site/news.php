<?php include (ROOT . '/views/layouts/header.php'); ?>

    <div class="container">
    <!-- AA: Breadcrumbs (not for start page) -->
    <div class="row hidden-phone hidden-print">
        <div class="span12">
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

        <div class="span2 column-lead hidden-print">
            <!-- aa-sub-menu -->
            <div class="well well-small aa-as-container">
                <ul class="nav nav-list aa-listbox">
                    <li class="nav-header aa-nav-sub-header aa-nav-sub-header-link"><a href="https://www.autoadapt.com/en/information/">Новости</a></li>
                </ul>
                <ul class="nav nav-list aa-nav-sub">
                    <li><a href="#">Новость первая</a></li>
                    <li><a href="#">Новость вторая</a></li>
                    <li><a href="#">Новость третья</a></li>
                    <li><a href="#">Новость четвертая</a></li>
                    <li><a href="#">Новость пятая</a></li>
                </ul>
            </div>
            <!-- AA: Sub-menu content area -->
        </div>

        <div class="span8">
            <!--каталог продукции-->
            <h1>Новости</h1>
            <div class="row equal-height">
                <div class="block pagegalleryblock span8 wide clearfix">
                    <p class="lead">
                        Короткое описание раздела. Новости бывают разные. Разные новости от Яны Буденной только на нашем сайте
                    </p>
                    <p>Описание раздела с новостями</p>

                    <!--Выводит список новостей -->
                    <?php foreach ($news as $new) : ?>

                            <div class="media border-product-list">
                                <a href="/news/<?= $new['id'];?>" target="_self">
                                    <img style="width: 100%; max-width: 340px; height: auto;" class="media-object product-list-image-width pull-left" src="<?= '/uploads/images/news/' . $new ['image'] ?>" alt="<?= $new['title'] ?>">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="/news/<?= $new['id'];?>" target="_self"><?= $new ['title'];?></a>
                                    </h3>
                                    <p style="line-height: 1.1;"><?= $new ['description'];?></p>
                                </div>

                            </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <!-- правая часть страницы + каталог -->

        <div class="span2 column-lead hidden-print">

            <div class="row">

            </div>

            <div class="row equal-height">
                <div class="block pagelistboxblock span2  clearfix">
                    <div class="well well-small aa-as-container">
                        <ul class="nav nav-list aa-listbox">
                            <li class="nav-header aa-listbox-header">Анонс</li>
                            <li>
                                <a href="#">
                                    Новость 1
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Новость 2
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Новость 3
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php include (ROOT . '/views/layouts/footer.php'); ?>