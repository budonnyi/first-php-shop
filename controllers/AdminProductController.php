<?php

/**
 * Контроллер AdminProductController
 * Управление товарами в админпанели
 */
class AdminProductController extends AdminBase
{
    /**
     * Action для страницы "Управление товарами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $productsList = Product::getProductsList();

        // Подключаем вид
        $title = "Административная панель. Управление товарами";

        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }    

    public function actionMeta()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $productsList = Product::getProductsList();

        // Подключаем вид
        $title = "Административная панель. Управление товарами";

        require_once(ROOT . '/views/admin_product/meta.php');
        return true;
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        $productList = Product::getProductsList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['manufacturer'] = $_POST['manufacturer'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['description_short'] = $_POST['description_short'];
            $options['image'] = $_POST['image'];
            $options['big_image'] = $_POST['big_image'];
            $options['video1'] = $_POST['video1'];
            $options['video2'] = $_POST['video2'];
            $options['status'] = $_POST['status'];
            $options['meta_title'] = $_POST['meta_title'];
            $options['meta_keyword'] = $_POST['meta_keyword'];
            $options['meta_description'] = $_POST['meta_description'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Product::createProduct($options);

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
            }
        }

        // Подключаем вид
        $title = "Административная панель. Управление товарами";

        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа администратора
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // получаем полный список товаров для списка купить вместе и смотреть также
        $productList = Product::getProductsList();

        //список файлов для скачивания
        $FilesToDownload = Product::getFilesListToDownload();

        // Получаем данные о конкретном товаре по id
        $product = Product::getProductById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name']                = $_POST['name'];
            $options['code']                = $_POST['code'];
            $options['price']               = $_POST['price'];
            $options['category_id']         = $_POST['category_id'];
            $options['manufacturer']        = $_POST['manufacturer'];
            $options['availability']        = $_POST['availability'];
            $options['description']         = $_POST['description'];
            $options['description_short']   = $_POST['description_short'];
            $options['image']               = $_POST['image'];
            $options['big_image']           = $_POST['big_image'];
            $options['video1']              = $_POST['video1'];
            $options['video2']              = $_POST['video2'];
            $options['status']              = $_POST['status'];
            $options['meta_title']          = $_POST['meta_title'];
            $options['meta_keyword']        = $_POST['meta_keyword'];
            $options['meta_description']    = $_POST['meta_description'];
            $options['viewed']              = 0;
            $options['sort_order']          = 0;
            $options['buyalso']             = isset($_POST['buyalso'])?$_POST['buyalso']:'';
            $options['seealso']             = isset($_POST['seealso'])?$_POST['seealso']:'';
            $options['filestodownload']     = isset($_POST['filestodownload'])?$_POST['filestodownload']:'';

            // Сохраняем изменения
            Product::updateProductById($id, $options);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        $title = "Административная панель. Управление товарами";

        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Product::deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        $title = "Административная панель. Управление товарами";

        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }

}
