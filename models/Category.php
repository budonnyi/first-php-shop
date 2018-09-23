<?php

class Category {

    public static function getCategoriesMenu() {

        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT category_id, name, parent_id FROM category WHERE status = 1 ORDER BY sort_order ASC');
        $cats = array();

        while($row =  $result->fetch()) {
            $cats_ID[$row['category_id']][] = $row;
            $cats[$row['parent_id']][$row['category_id']] =  $row;
        }

        return $cats;
    }

    public static function getCategoriesList() {

        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT * FROM category WHERE status = 1 AND parent_id = 0 ORDER BY sort_order ASC');
        $i = 0;

        while ($row = $result->fetch()) {
            $categoryList[$i]['id']                 = $row ['category_id'];
            $categoryList[$i]['name']               = $row ['name'];
            $categoryList[$i]['image']              = $row ['image'];
            $categoryList[$i]['description_image']  = $row ['description_image'];
            $categoryList[$i]['description_short']  = $row ['description_short'];
            $categoryList[$i]['description']        = $row ['description'];
            $categoryList[$i]['status']             = $row ['status'];
            $i++;
        }

        return $categoryList;
    }

    //Возвращает список подкатегорий по указанному id
    public static function getSubcategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        $subcategoryList = array();

        // Текст запроса к БД
        $sql = 'SELECT * FROM category WHERE parent_id =' . $id . ' ORDER BY sort_order ASC';

        $result = $db->query($sql);
        $i = 0;

        while ($row = $result->fetch()) {
            $subcategoryList[$i]['id']                  = $row ['category_id'];
            $subcategoryList[$i]['name']                = $row ['name'];
            $subcategoryList[$i]['image']               = $row ['image'];
            $subcategoryList[$i]['description_short']   = $row ['description_short'];
            $subcategoryList[$i]['description']         = $row ['description'];
            $i++;
        }

        return $subcategoryList;
    }

    //Возвращает массив категорий для списка в админпанели (при этом в результат попадают и включенные и выключенные категории)
    public static function getCategoriesListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT category_id, name, parent_id, sort_order, status, viewed, meta_title, meta_description, meta_keywords FROM category ORDER BY viewed DESC');

        // Получение и возврат результатов
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id']                 = $row['category_id'];
            $categoryList[$i]['parent_id']          = $row['parent_id'];
            $categoryList[$i]['name']               = $row['name'];
            $categoryList[$i]['sort_order']         = $row['sort_order'];
            $categoryList[$i]['status']             = $row['status'];
            $categoryList[$i]['viewed']             = $row['viewed'];
            $categoryList[$i]['meta_title']         = $row['meta_title'];
            $categoryList[$i]['meta_description']   = $row['meta_description'];
            $categoryList[$i]['meta_keywords']      = $row['meta_keywords'];
            $i++;
        }
        return $categoryList;
    }

    //Удаляет категорию с заданным id
    public static function deleteCategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM category WHERE category_id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    //Редактирование категории с заданным id
    public static function updateCategoryById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();



        // Текст запроса к БД
        $sql = "UPDATE category
            SET
                name                = :name,
                sort_order          = :sort_order,
                parent_id           = :parent_id,
                status              = :status,
                description         = :description,
                description_short   = :description_short,
                image               = :image,
                description_image   = :description_image,
                meta_title          = :meta_title,
                meta_description    = :meta_description,
                meta_keywords       = :meta_keywords
            WHERE category_id       = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id',               $id,                            PDO::PARAM_INT);
        $result->bindParam(':parent_id',        $options['parent_id'],          PDO::PARAM_INT);
        $result->bindParam(':name',             $options['name'],               PDO::PARAM_STR);
        $result->bindParam(':sort_order',       $options['sort_order'],         PDO::PARAM_INT);
        $result->bindParam(':status',           $options['status'],             PDO::PARAM_INT);
        $result->bindParam(':description',      $options['description'],        PDO::PARAM_STR);
        $result->bindParam(':description_short', $options['description_short'], PDO::PARAM_STR);
        $result->bindParam(':image',            $options['image'],              PDO::PARAM_STR);
        $result->bindParam(':description_image', $options['description_image'], PDO::PARAM_STR);
        $result->bindParam(':meta_title',       $options['meta_title'],         PDO::PARAM_STR);
        $result->bindParam(':meta_description', $options['meta_description'],   PDO::PARAM_STR);
        $result->bindParam(':meta_keywords',    $options['meta_keywords'],      PDO::PARAM_STR);
        
        $result->execute();

        return true;
    }

    //Добавляет новую категорию
    public static function createCategory($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД

        $sql = 'INSERT INTO category (name, 
                                        sort_order,
                                        parent_id,
                                        status, 
                                        description, 
                                        description_short, 
                                        image, 
                                        description_image, 
                                        meta_title, 
                                        meta_description, 
                                        meta_keywords) 
                                        
                                        VALUES (
                                        :name,
                                        :sort_order,
                                        :parent_id,
                                        :status,
                                        :description,
                                        :description_short,
                                        :image,
                                        :description_image,
                                        :meta_title,
                                        :meta_description,
                                        :meta_keywords
                                        )';
        
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);

        $result->bindParam(':parent_id',        $options['parent_id'],          PDO::PARAM_INT);
        $result->bindParam(':name',             $options['name'],               PDO::PARAM_STR);
        $result->bindParam(':sort_order',       $options['sort_order'],         PDO::PARAM_INT);
        $result->bindParam(':status',           $options['status'],             PDO::PARAM_INT);
        $result->bindParam(':description',      $options['description'],        PDO::PARAM_STR);
        $result->bindParam(':description_short', $options['description_short'], PDO::PARAM_STR);
        $result->bindParam(':image',            $options['image'],              PDO::PARAM_STR);
        $result->bindParam(':description_image', $options['description_image'], PDO::PARAM_STR);
        $result->bindParam(':meta_title',       $options['meta_title'],         PDO::PARAM_STR);
        $result->bindParam(':meta_description', $options['meta_description'],   PDO::PARAM_STR);
        $result->bindParam(':meta_keywords',    $options['meta_keywords'],      PDO::PARAM_STR);

        return $result->execute();
    }

    //Возвращает категорию с указанным id
    public static function getCategoryById($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM category WHERE category_id = :id";
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    //Возвращает текстое пояснение статуса для категории :<br/>
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }
    
    //Возвращает список категорий с указанными индентификторами
    public static function getCategoriesListByIds($idsArray) 
    {
        $db = Db::getConnection();
        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);

        $result = $db->query("SELECT * FROM category WHERE category_id IN ($idsString)");


        // Получение и возврат результатов
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id']                 = $row ['category_id'];
            $categoryList[$i]['name']               = $row ['name'];
            $categoryList[$i]['image']              = $row ['image'];
            $categoryList[$i]['description_image']  = $row ['description_image'];
            $categoryList[$i]['description_short']  = $row ['description_short'];
            $categoryList[$i]['description']        = $row ['description'];
            $categoryList[$i]['status']             = $row ['status'];
            $i++;
        }

        return $categoryList;
    }
}
