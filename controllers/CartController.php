<?php

class CartController
{

    public function actionAdd($id)
    {
        //adding product in cart
        Cart::addProduct($id);

        //replace user to needed page
        $referrer = $_SERVER['HTTP_REFERER']; //address page where from came user
        header("Location: $referrer");
    }

    public function actionIndex()
    {
        $Menucatalog = Category::getCategoriesMenu();
        $Menuproduct = Product::getProductsList();
        $menu = Menu::build_menu($Menucatalog, 0, $Menuproduct);
        
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {

            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        $title = "Корзина заказов для подготовки ценового предложения";

        require_once(ROOT . '/views/cart/index.php');

        return true;
    }

    public function actionDelete($id)
    {
        // Удаляем заданный товар из корзины
        Cart::deleteProduct($id);

        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

    public function actionCheckout()
    {
        $Menucatalog = Category::getCategoriesMenu();
        $Menuproduct = Product::getProductsList();
        $menu = Menu::build_menu($Menucatalog, 0, $Menuproduct);

        // Список категорий для левого меню
        $categories = array();
        $categories = Category::getCategoriesList();

        // Статус успешного оформления заказа
        $result = false;


        // Форма отправлена?
        if (isset($_POST['submit'])) {
            // Форма отправлена? - Да
            // Считываем данные формы
            $userName = htmlspecialchars($_POST['userName']);
            $userPhone = htmlspecialchars($_POST['userPhone']);
            $userEmail = htmlspecialchars($_POST['userEmail']);
            $userComment = htmlspecialchars($_POST['userComment']);

            // Валидация полей
            $errors = false;
            if (!User::checkName($userName))
                $errors[] = 'Неправильное имя';
            if (!User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';
            if (!User::checkEmail($userEmail))
                $errors[] = 'Неправильный e-mail';
            
            // Форма заполнена корректно?
            if ($errors == false) {
                // Форма заполнена корректно? - Да
                // Сохраняем заказ в базе данных
                // Собираем информацию о заказе
                $productsInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }

                // Сохраняем заказ в БД
                $result = Order::save($userName, $userPhone, $userEmail, $userComment, $userId, $productsInCart);

                if ($result) {
                    // Оповещаем администратора о новом заказе                
                    $adminEmail = 'budonnyi@gmail.com';
                    $message = 'http://handycars.com.ua/admin/orders';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);

                    // Очищаем корзину
                    Cart::clear();
                }
            } else {
                // Форма заполнена корректно? - Нет
                // Итоги: общая стоимость, количество товаров
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        } else {
            // Форма не отправлена
            // Получием данные из корзины      
            $productsInCart = Cart::getProducts();

            // В корзине есть товары?
            if ($productsInCart == false) {
                // В корзине нет товаров
                // Отправляем пользователя на главную искать товары
                header("Location: /");
            } else {
                // В корзине есть товары? - Да
                // Итоги: общая стоимость, количество товаров
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();


                $userName = false;
                $userPhone = false;
                $userComment = false;

                // Пользователь авторизирован?
                if (User::isGuest()) {
                    // Нет
                    // Значения для формы пустые
                } else {
                    // Да, авторизирован                    
                    // Получаем информацию о пользователе из БД по id
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    // Подставляем в форму
                    $userName = $user['name'];
                }
            }
        }
        $title = "Оформление заказа";

        require_once(ROOT . '/views/cart/checkout.php');

        return true;
    }
}