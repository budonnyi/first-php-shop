<?php include (ROOT . '/views/layouts/header.php');?>

<section>
    <div class="container" style="min-height: 600px;">
        <div class="">
            <h2>Кабинет пользователя:</h2>
            
            <p>Вы вошли как: <?php echo $user['username'];?></p>
            
            <?php if ($user['username'] == 'admin') : ?>
                <p><a href="/admin">Перейти в административную панель</a></p>
            <?php endif; ?>
            
        </div>
    </div>
</section>

<?php include (ROOT . '/views/layouts/footer.php');?>



