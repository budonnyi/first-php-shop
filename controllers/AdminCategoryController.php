<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями товаров в админпанели
 */
class AdminCategoryController extends AdminBase
{

    /**
     * Action для страницы "Управление категориями"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $categoriesList = Category::getCategoriesListAdmin();

        // Подключаем вид
        $title = "Административная панель. Управление категориями";
        require_once(ROOT . '/views/admin_category/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить категорию"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name']               = $_POST['name'];
            $options['parent_id']          = $_POST['parent_id'];
            $options['sort_order']         = $_POST['sort_order'];
            $options['status']             = $_POST['status'];
            $options['description']        = $_POST['description'];
            $options['description_short']  = $_POST['description_short'];
            $options['image']              = $_POST['image'];
            $options['description_image']  = $_POST['description_image'];
            $options['meta_title']         = $_POST['meta_title'];
            $options['meta_description']   = $_POST['meta_description'];
            $options['meta_keywords']      = $_POST['meta_keywords'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Category::createCategory($options);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }

        $title = "Административная панель. Управление категориями";

        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать категорию"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $options['name']               = $_POST['name'];
            $options['parent_id']          = $_POST['parent_id'];
            $options['sort_order']         = $_POST['sort_order'];
            $options['status']             = $_POST['status'];
            $options['description']        = $_POST['description'];
            $options['description_short']  = $_POST['description_short'];
            $options['image']              = $_POST['image'];
            $options['description_image']  = $_POST['description_image'];
            $options['meta_title']         = $_POST['meta_title'];
            $options['meta_description']   = $_POST['meta_description'];
            $options['meta_keywords']      = $_POST['meta_keywords'];

            // Сохраняем изменения
            Category::updateCategoryById($id, $options);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }

        // Подключаем вид
        $title = "Административная панель. Управление категориями";

        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить категорию"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Category::deleteCategoryById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }

        // Подключаем вид
        $title = "Административная панель. Управление категориями";

        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }

}
