<?php include (ROOT . '/views/layouts/header.php'); ?>

<!-- Google Code for &#1055;&#1086;&#1082;&#1091;&#1087;&#1082;&#1072; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 945329242;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "MjQvCJbtr3AQ2qjiwgM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/945329242/?label=MjQvCJbtr3AQ2qjiwgM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>



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
                <div class="menu">
                    <?= $menu ?>
                </div>

            </div>
        </div>
        <div class="span8 offspan2 padding-right">
            <div class="features_items">
                <h2 class="title text-center">Оформление заказа</h2>

                <?php if ($result) : ?>
                    <div class="span4 alert alert-success" style="margin-top: 20px;">
                        <strong>Заказ оформлен. Мы Вам перезвоним.</strong>
                    </div>
                <?php else: ?>

                <div class="span6">
                    <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?> грн.</p><br/>
                    
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <strong>
                                        <li><?php echo $error; ?></li>
                                    </strong>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                    <div class="login-form">
                        <form action="#" method="post">

                            <p>Ваше имя</p>
                            <input type="text" name="userName" placeholder="Имя" value="<?php echo $userName; ?>"/>

                            <p>Номер телефона</p>
                            <input type="text" name="userPhone" placeholder="Телефон" value="<?php echo $userPhone; ?>"/>

                            <p>E-mail</p>
                            <input type="text" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>

                            <p>Комментарий к заказу</p>
                            <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>

                            <br>
                            <input type="submit" name="submit" class="btn btn-primary" value="Оформить" />
                        </form>
                    </div>
                </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<?php include (ROOT . '/views/layouts/footer.php'); ?>