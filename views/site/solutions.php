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
                        Решения
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 column-lead hidden-print">
                <div class="well well-small aa-as-container">
                    <ul class="nav nav-list aa-listbox">
                        <li class="nav-header aa-nav-sub-header aa-nav-sub-header-link">
                            <a href="/catalog">Продукция</a>
                        </li>
                    </ul>
                    <?php
                            $menuSolution = '<ul class="accordion menu nav nav-list aa-nav-sub" id="accordion">
                                            
                                                <li class="">
                                                    <a href="/solution/1">
                                                        Независимое вождение
                                                    </a>
                                                <ul>
                                                    <li>
                                                        <a href="/category/1">
                                                            Поворотные механизмы
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/category/2">
                                                            Ручное управление
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/category/4">
                                                            Помощники и аксесуары
                                                        </a>
                                                    </li>
                                                    </ul>
                                                </li>
                                                <li class="">
                                                    <a href="/solution/2">
                                                        Посадка в автомобиль
                                                    </a>
                                                    <ul>
                                                        <li class="">
                                                            <a href="/category/1">Поворотные механизмы</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="/category/3">Инвалидные коляски</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="/category/8">Автомобильные кресла</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="">
                                                    <a href="/solution/3">
                                                        Подъем и хранение
                                                    </a>
                                                    <ul>
                                                        <li class="">
                                                            <a href="/category/3">Инвалидные коляски</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="/category/6">Подъемники оборудования</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="/category/7">Портативные рампы</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="/category/14">Автомобильные рампы</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="">
                                                    <a href="/solution/4">
                                                        Лифты для коляски
                                                    </a>
                                                    <ul>
                                                        <li class="">
                                                            <a href="/category/25">Служебные</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="/category/27">Персональные</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>';
                        ?>

                        <div class="menu">
                            <?= $menuSolution ?>
                        </div>

                    <!-- <ul class="nav nav-list aa-nav-sub">
                        <?php foreach ($solutionMenu as $menu) : ?>
                            <li>
                                <a href="/solution/<?php echo $menu['id'];?>">
                                    <?php echo $menu['name']; ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul> -->
                </div>
            </div>

            <div class="col-xl-8 col-lg-7 col-md-8">
                <h1>Решения для водителей с инвалидностью</h1>
                <div class="">
                    <div class="">
                        <p  class="animated zoomIn lead">
                            C продукцией компании Autoadapt мы помогаем людям делать то, что для многих является абсолютно обыденными делами...
                        </p>

                        <!--slider-->
                        <ul class="rslides" id="rslides">
                            <?php foreach ($solutionList as $solution) : ?>
                            <li>
                                <a href="/category/<?=$solution['category_id']?>"><img src="/uploads/images/slider/<?=$solution['image']?>" alt="">
                                    <div class="caption_slides">
                                        <h4><?=$solution['name']?></h4>
                                        <p><?=$solution['description']?></p>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <!--slider-->

                        <p class="animated zoomIn noselect" style="margin-top: 20px;"> ...такими как поездка в авто на работу, внезапный поход в магазин или незапланированная встреча с друзьями. Autoadapt с большой гордостью занимается разработкой и производством решений, которым доверяют люди по всему миру. Компания Autoadapt была создана в 1996г. и с тех пор выросла в одного из мировых лидеров среди производителей адаптивных решений для людей с ограниченной подвижностью. На данный момент компания представлена в 50 странах по всему миру, в том числе и Украине, насчитывает более 300 обученных дилеров Autoadapt и более 700 субдилеров. Головной офис Autoadapt, центр разработок и производственная линия находятся в г.Стенкуллен, в юго-западной части Швеции. С апреля 2014 Autoadapt является единоличным владельцем британской компании Unwin. Вместе с партнерами, компаниями BraunAbility и Bruno Independent Living Aids, Autoadapt является мировым лидером в сфере решений автомобильной безопасности для людей с ограниченной подвижностью.
                        </p>
                
                    </div>
                </div>
            </div>

            <!-- AA: Related content area -->
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 column-lead hidden-print">
                <div class="block editorialblock">
                    <div class="row-spacer"></div>
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
                    <p class="text-center">
                        <a href="/uploads/download/independent-driving_brochure_RU.pdf" target="_blank">
                            <img src="/uploads/solutions/aoe_frontpages_350x152_independentdriving.jpg" alt="Независимое вождение" >
                            <p class="text-center brochures">
                                <small>
                                    Независимое вождение
                                </small>
                            </p>
                        </a>
                    </p>
                    <p class="text-center">
                        <a href="/uploads/download/getting-seated_brochure_RU.pdf" target="_blank">
                            <img src="/uploads/solutions/aoe_frontpages_350x152_gettingseated.jpg" alt="Посадка в автомобиль">
                            <p class="text-center brochures">
                                <small>
                                    Посадка в автомобиль
                                </small>
                            </p>
                        </a>
                    </p>
                    <p class="text-center">
                        <a href="/uploads/download/lifting-and-stowing_brochure_EN.pdf" target="_blank">
                            <img src="/uploads/solutions/aoe_frontpages_350x152_liftingandstowing.jpg" alt="Подъем и хранение коляски">
                            <p class="text-center brochures">
                                <small>
                                    Подъем и хранение коляски
                                </small>
                            </p>
                        </a>
                    </p>
                    <p class="text-center">
                        <a href="/uploads/download/wheelchair-lifts_brochure_EN.pdf" target="_blank">
                            <img src="/uploads/solutions/aoe_frontpages_350x152_wheelchairlifts.jpg" alt="Подъемники для колясок">
                            <p class="text-center brochures">
                                <small>
                                    Подъемники для колясок
                                </small>
                            </p>
                        </a>
                    </p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <?php if ($LatestProductList) : ?>
                    <h3 class="text-center">
                        Популярные решения:
                    </h3>
                <?php endif ?>
                <div id="owl-pictures" class="owl-carousel">
                    <?php foreach ($LatestProductList as $list) : ?>
                        <div class="item">
                               <a href="/product/<?= $list['id']?>">
                            <img src="/uploads/images/product/<?= $list['image']; ?>" alt="Owl Image">
                            <p style="font-size: 13px;" class="text-center"><?=$list['name'];?></p>
                            </a>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        </div>

            <script>
                $(document).ready(function() {
                    var owl = $('#owl-carousel');
                    $("#owl-pictures").owlCarousel({
                        loop: true,
                        autoplay: true,
                        smartSpeed: 1500,
                        items: 7,
                        itemsDesktop: [1199,3],
                        itemsDesktopSmall: [979,3],
                        pagination: false,
                    });
                });
            </script>

    </div> <!-- end container -->

<?php include(ROOT . '/views/layouts/footer.php'); ?>