<?php include(ROOT . '/views/layouts/header.php'); ?>

<!-- Получение имени категории и описания для заполнения страницы -->
    <?php foreach ($solutionMenu as $menu) : ?>
        <?php 
            if ($menu['id'] == $solutionID) {
                $description = $menu['description'];
                $name = $menu['name'];
            }
        ?>
    <?php endforeach ?>

    <div class="container noselect">
<!-- Хлебные крошки -->
        <div class="row hidden-phone hidden-print">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                        <span class="divider">/</span>
                    <li>
                        <a href="/solutions/">Решения</a>
                    </li>
                        <span class="divider">/</span>
                    <li class="active"><?=$name?></li>
                </ul>
            </div>
        </div> 
<!-- Конец хлебных крошек -->
        <!-- 2-column standard -->
        <div class="row">
            <!-- solutions menu -->
            <div class="span2 column-lead hidden-print">
                <!-- sub-menu -->
                
                <div class="well well-small aa-as-container">
                    <ul class="nav nav-list aa-listbox">
                        <li class="nav-header aa-nav-sub-header aa-nav-sub-header-link"><a href="/solutions/">Решения</a></li>
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

                        <script type="text/javascript">
                            $(document).ready(function ($) {
                                $('#accordion').dcAccordion({
                                    eventType: 'click',
                                    disableLink: false,
                                    speed: 0,
                                });
                            });
                        </script>

                </div>
                <!-- Sub-menu content area -->
            </div>

            <!-- Main content area -->
            <div class="span8">
                <h1>Решения для водителей с инвалидностью</h1>
                <div class="row">
                    <div class="span8 clearfix">
                        <p class="animated zoomIn lead">
                            <?= $description ?>
                        </p>

                        <!--slider-->
                        <ul class="rslides" id="rslides">
                            <?php foreach ($solutionList as $solution) : ?>
                            <li>
                                <a href="/category/<?=$solution['category_id']?>"><img src="/uploads/images/slider/<?=$solution['image']?>" alt="">
                                    <div class="caption_slides">
                                        <h4><?=$solution['name']?></h4>
                                        <p class="animated zoomIn"><?=$solution['description']?></p>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <!--slider-->

                    </div>
                </div>
                
<!-- вывод списка категорий для указанного решения -->

                <?php foreach ($categoriesList as $category) : ?>
                    <div class="animated bounceIn media border-product-list" STYLE="margin-left: 5px;">
                        <a href="/category/<?= $category['id'];?>" target="_self">
                            <img class="media-object product-list-image-width pull-left" src="<?= '/uploads/images/catalog/' . $category ['image'];?>">
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="/category/<?= $category['id'];?>" target="_self"><?php echo $category ['name'];?></a>
                            </h3>
                            <p><?= $category['description_short'] . '...';?></p>
                        </div>
                        <div class="list-button-right">
                            <a class="btn visible-desktop hidden-print" href="#">Узнать больше</a>
                        </div>
                    </div>
                <?php endforeach; ?>

<!-- конец вывода подходящего списка категорий -->

            </div>

            <!-- AA: Related content area -->
            <div class="span2 column-lead hidden-print">
                <div class="row equal-height">
                    <div class="block editorialblock span2  clearfix">
                        <div class="clearfix">
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
                                </small></p>
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
            </div>
        </div>
    </div> <!-- end container -->

<?php include(ROOT . '/views/layouts/footer.php'); ?>