<?php include (ROOT . '/views/layouts/header.php'); ?>
<div class="container noselect">
    <!-- Хлебные крошки -->
    <div class="row hidden-phone hidden-print">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Главная</a>
                    <span class="divider">/</span>
                </li>
                <li class="active">
                    Видео
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 column-lead hidden-print">
            <div class="well well-small aa-as-container">
                <ul class="nav nav-list aa-listbox">
                    <li class="nav-header aa-nav-sub-header aa-nav-sub-header-link">
                        <a href="#">Видео</a>
                    </li>
                </ul>

                <ul class="nav nav-list aa-nav-sub">
                    <li class="<?php if ($tag == 'handcontrol') echo('aa-sub-menu-selected');?>"><a href="/video/handcontrol">Ручное управление</a></li>
                    <li class="<?php if ($tag == 'swivel') echo('aa-sub-menu-selected');?>"><a href="/video/swivel">Поворотные механизмы</a></li>
                    <li class="<?php if ($tag == 'lifts') echo('aa-sub-menu-selected');?>"><a href="/video/lifts">Подъемники коляски</a></li>
                    <li class="<?php if ($tag == 'wheelchair') echo('aa-sub-menu-selected');?>"><a href="/video/wheelchair">Инвалидные коляски</a></li>
                    <li class="<?php if ($tag == 'other') echo('aa-sub-menu-selected');?>"><a href="/video/other">Аксесуары</a></li>
                </ul>
            </div>
        </div>

        <!-- AA: Main content area -->
        <div class="col-xl-10 col-lg-9 col-md-8">
            <h1>Видео.
                <?php 
                    if ($tag == 'handcontrol') echo 'Ручное управление';
                    if ($tag == 'swivel') echo 'Поворотные механизмы';
                    if ($tag == 'lifts') echo('Подъемники коляски');
                    if ($tag == 'wheelchair') echo('Инвалидные коляски');
                    if ($tag == 'other') echo('Аксесуары');
                ?>
            </h1>
            <div class="block">
                <?php foreach ($videoList as $list): ?>
                    <div class="media border-product-list">
                        <div class="pull-left col-xl-7 col-lg-7 col-md-7">
                            <div class="border videomargin">
                                <div class="videoWrapper videoWideScreen">
                                    <iframe src="<?= $list['link'];?>" webkitallowfullscreen="" autoplay="0" mozallowfullscreen="" allowfullscreen="" width="720" frameborder="0" height="420">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="/product/<?= $list['product_id']; ?>" target="_self"><?php echo $list['title'];?></a>
                            </h3>
                            <p><?= substr($list['description'], 0, strpos($list['description'], ' ', min(400, strlen($list['description'])))) . '...'; ?></p>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

<?php include (ROOT . '/views/layouts/footer.php'); ?>
