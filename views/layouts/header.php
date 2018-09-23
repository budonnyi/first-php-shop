<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel=”icon” href=”/uploads/images/favicon.ico” type=”image/x-icon”>
    <link rel="shortcut icon" href="/uploads/images/favicon.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $meta_description ?>">
    <meta name="keywords" content="<?= $meta_keywords ?>">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="/template/css/site.css" type="text/css">

    <link rel="stylesheet" href="/template/css/style.css" type="text/css">
    <link rel="stylesheet" href="/template/css/bootstrap-grid.css" type="text/css">
    <link rel="stylesheet" href="/template/css/responsiveslides.css" type="text/css">
    <link rel="stylesheet" href="/template/css/owl.carousel.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="/template/js/responsiveslides.min.js"></script>
    <script src="/template/js/owl.carousel.js"></script>

    <script type='text/javascript' src='/template/js/menu/jquery.cookie.js'></script>
    <script type='text/javascript' src='/template/js/menu/jquery.hoverIntent.minified.js'></script>
    <script type='text/javascript' src='/template/js/menu/jquery.dcjqaccordion.2.7.min.js'></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-72812778-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('set', {'user_id': 'USER_ID'}); // Задание идентификатора пользователя с помощью параметра user_id (текущий пользователь).
      gtag('config', 'UA-72812778-1');
    </script>
    <style type="text/css">
    /* Отключение возможности выделения в теге DIV */
    .noselect {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }
    </style>

</head>
<body>

    <div class="navbar">
        <div class="container aa-function-area hidden-print">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="aa-function-menu">

                        <?php if (User::isGuest()): ?>
                            <a id="" class="aa-function-left-distance" href="/user/login/">Вход</a>
                        <?php else: ?>
                            <a id="" class="aa-function-left-distance"
                               href="/cabinet">Аккаунт</a>
                            <a id="" class="aa-function-left-distance"
                               href="/user/logout/">Выход</a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-inner aa-main-navigation-print">
            <div class="container">
                <button type="button" class="navbar-toggle btn btn-navbar hidden-print " data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="brand">
                    <a href="/">
                        <img src="/uploads/images/logo.png" style="margin-top: 15px;">
                    </a>
                </div>

                <div class="visible-print">
                    <h4>тел: +380962010191</h4>
                    <h4>info@handycars.com.ua</h4>
                    <hr>
                </div>

                <div class="nav-collapse collapse hidden-print" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="/catalog">Продукция</a></li>
                        <li><a href="/solutions">Решения</a></li>
                        <li><a href="/video/handcontrol">Видео</a></li>
                        <li><a href="/contacts">Контакт</a></li>

                        <!-- <li style="<?php if(Cart::countItems() !== 0) echo 'background-color: #e4ebf2;';?>">
                            <a style="<?php if(Cart::countItems() == 0) echo'color: #ccc;';?>"
                               href="/cart" >
                                <img src="/uploads/images/cart.png">
                                Корзина
                                <span>(<?php echo Cart::countItems(); ?>)</span>
                            </a>
                        </li> -->

                    </ul>
                </div>

                <ul class="pull-right">
                    <li style="padding-top: 10px; list-style-type: none;">
                        <a class="nav-collapse pull-right" href="tel:+380962010191"
                           style="text-decoration: none; font-weight: 500; font-size: 15px; ">
                            <i class="fa fa-phone" aria-hidden="true"></i>+38 (096) 201-01-91
                        </a>
                    </li>
                    <li style="padding-top: 24px; list-style-type: none;"  >
                        <a class="nav-collapse pull-right" href="tel:+380660679771"
                           style=" text-decoration: none; font-weight: 500; font-size: 15px; ">
                            <i class="fa fa-phone" aria-hidden="true"></i>+38 (066) 067-97-71
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>