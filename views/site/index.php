<?php include (ROOT . '/views/layouts/header.php'); ?>

        <div class="container noselect">
            <!-- AA: Breadcrumbs (not for start page) -->
            <div class="row hidden-phone hidden-print">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li class="active">
                            <a href="/">Главная</a>
                        </li>
               <!--             <span class="divider">/</span>
                        
                        <li class="active">Решения</li> -->
                    </ul>
                </div>
            </div>

            <!-- AA: 3-column standard -->
            <div class="row">
                <div class="span2 column-lead hidden-print">
                    <!-- aa-sub-menu -->
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
    <!-- AA: Sub-menu content area -->
                </div>
    <!-- AA: Main content area -->

                <div class="span8">
                    <h1>Решения для водителей с инвалидностью</h1>
                    <div class="row">
                        <div class="span8 clearfix">
                            <p class="lead">
                                Компания Хендикарс (Украина) является официальным дилером продукции Autoadapt AB, BraunAbility и Unwin на территории Украины. Наши специалисты помогут подобрать удобные и надежные решения.
                            </p>
                            

                                <!--slider-->
                                <ul class="rslides" id="rslides">
                                    <?php foreach ($solutionList as $solution) : ?>
                                    <li>
                                        <a href="/category/<?=$solution['category_id']?>"><img src="/uploads/images/slider/<?=$solution['image']?>" alt="">
                                            <div class="caption_slides">
                                                <h3><?=$solution['name']?></h3>
                                                <p><?=$solution['description']?></p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <!--slider-->
                        </div>
                    </div>
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
                        </div>
                        </div>
                        <div class="block forcenewrowblock span2  clearfix">
                            <div class="row-spacer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include (ROOT . '/views/layouts/footer.php'); ?>