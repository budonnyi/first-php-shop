<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container" style="min-height: 600px;">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if ($result): ?>
                        <div class="offset4 span4 alert alert-success" style="margin-top: 20px;">
                            <strong>Вы зарегистрированы!</strong>
                        </div>
                    <?php else: ?>
                    
                    <div class="offset4 span4 alert alert-danger" style="margin-top: 20px;">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!--sign up form-->
                    <div class="offset4 span4 signup-form text-center">
                        <h2>Регистрация</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/> <br>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/> <br>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/> <br>
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                        </form>
                    </div>
                    <!--/sign up form-->

                    <?php endif; ?>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>