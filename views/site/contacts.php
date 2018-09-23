<?php include (ROOT . '/views/layouts/header.php'); ?>

<div class="container">
<!-- хлебные крошки -->
    <div class="row hidden-phone hidden-print">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Главная</a>
                    <span class="divider">/</span>
                </li>
                <li class="active">
                    Контакты
                </li>
            </ul>
        </div>
    </div>
        <!-- показывает список категорий -->
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

        <div class="col-xl-10 col-lg-9 col-md-9">
            <h1>Контакты</h1>
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2543.050139975499!2d30.53460195117705!3d50.40290315428939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cf4fbdc6389d%3A0x13c01e8484e8193a!2z0LLRg9C70LjRhtGPINCh0LDQv9C10YDQvdC-LdCh0LvQvtCx0ZbQtNGB0YzQutCwLCAyMiwg0JrQuNGX0LIsINCj0LrRgNCw0LjQvdCw!5e0!3m2!1sru!2s!4v1474354050508" width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <p >03028, г. Киев, ул.Саперно-Слободская, 22<br>
                            <a href="tel:+380962010191">тел. +38 096 2010191</a><br>
                            <a href="tel:+380503342220">тел. +38 066 0679771</a><br>
                            <a href="mailto:info@handycars.com.ua">info@handycars.com.ua</a>
                        </p>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="control-group">
                            <p class="lead">Напишите нам сообщение:</p>
                            <form id="form" action="#" method="post">
                                    <input class="form-control" type="text" name="name" placeholder="Имя" required value="<?php if(isset($name)) echo $name ?>"/> <br>
                                    <input class="form-control" type="text" name="phone" placeholder="Номер телефона" required value="<?php if(isset($phone)) echo $phone ?>"/> <br>
                                    <input class="form-control" type="email" name="email" placeholder="E-mail" required value="<?php if(isset($email)) echo $email ?>"/> <br>
                                    <textarea rows="5" class="form-control" name="message" placeholder="Сообщение" required value="<?php if(isset($message)) echo $message ?>"></textarea> <br>
                                <button class="btn btn-primary">Отправить</button> 
                            </form>
                            <!-- <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script> -->
                            <script src="mail/common.js"></script>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php include (ROOT . '/views/layouts/footer.php'); ?>