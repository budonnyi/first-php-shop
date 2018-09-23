<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container" style="min-height: 600px;">
            
            <!-- AA: Breadcrumbs (not for start page) -->
            <div class="row hidden-phone hidden-print">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="/">Главная</a>
                            <span class="divider">/</span>
                        </li>
                        <li class="active">Вход</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <div class="offset4 span4" style="margin-top: 20px;">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!--sign up form-->
                    <div class="offset4 span4 signup-form text-center">
                        <h2>Вход</h2>
                        <form action="#" method="post">
                            <input class="input-xlarge" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/> <br>
                            <input class="input-xlarge" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/> <br>
                            <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Вход" />
                        </form>
                    </div>
                    <!--/sign up form-->

                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>