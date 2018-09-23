<?php

class Product {

     const SHOW_BY_DEFAULT = 16; // количество последних товаров

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {

        $count = intval($count);

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query("SELECT * FROM product
                              ORDER BY viewed DESC LIMIT $count");
        $i = 0;

        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['product_id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['description_short'] = $row['description_short'];
            $i++;
        }

        return $productList;
    }

    public static function getProductsListByCategory($categoryID = false) {

        if ($categoryID) {

            $db = Db::getConnection();

            $productList = array();

            $result = $db->query('SELECT product_id, name, price, description_short, image FROM product
                              WHERE status="1" AND category_id=' .$categoryID . ' ORDER BY sort_order');
     //                         LIMIT ' . self::SHOW_BY_DEFAULT );
            $i = 0;

            while ($row = $result->fetch()) {
                $productList[$i]['id']      = $row['product_id'];
                $productList[$i]['name']    = $row['name'];
                $productList[$i]['price']   = $row['price'];
                $productList[$i]['image']   = $row['image'];
                $productList[$i]['description_short'] = $row['description_short'];
                $i++;
            }

            $category = $db->query('SELECT viewed FROM category WHERE category_id=' .$categoryID);
            $row1 = $category->fetch();
            $viewed = $row1['viewed'];

            $viewed++;
            $sql = "UPDATE category SET viewed = :viewed WHERE category_id = :id";
            $res = $db->prepare($sql);
            $res->bindParam(':id', $categoryID, PDO::PARAM_INT);
            $res->bindParam(':viewed', $viewed, PDO::PARAM_INT);
            $res->execute();
        }
        return $productList;
    }

    //Возвращает продукт с указанным id
    public static function getProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product WHERE product_id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение команды
        $result->execute();

        $row = $result->fetch();
        $viewed = $row['viewed'];
        $viewed++;
        $sql = "UPDATE product SET viewed = :viewed WHERE product_id = :id";
        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':viewed', $viewed, PDO::PARAM_INT);
        $res->execute();

        return $row;
    }

    //Возвращаем количество товаров в указанной категории
    public static function getTotalProductsInCategory($categoryId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    //Возвращает список товаров с указанными индентификторами
    public static function getProductsByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);

        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE status='1' AND product_id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id']     = $row['product_id'];
            $products[$i]['code']   = $row['code'];
            $products[$i]['name']   = $row['name'];
            $products[$i]['price']  = $row['price'];
            $i++;
        }
        return $products;
    }

    public static function pastePriceFromPricelist()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM pricelist');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();
        $code = $row['code'];
    }

    //Возвращает список товаров
    public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Получение и возврат результатов
        $result = $db->query('SELECT * FROM product ORDER BY name ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['product_id'];
            $productsList[$i]['category_id'] = $row['category_id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['buy_also'] = $row['buy_also'];
            $productsList[$i]['see_also'] = $row['see_also'];
            $productsList[$i]['download_files'] = $row['download_files'];
            $productsList[$i]['viewed'] = $row['viewed'];
            $productsList[$i]['status'] = $row['status'];
            $productsList[$i]['meta_title'] = $row['meta_title'];
            $productsList[$i]['meta_keyword'] = $row['meta_keyword'];
            $productsList[$i]['meta_description'] = $row['meta_description'];
            $i++;
        }
        return $productsList;
    }

    //Удаляет товар с указанным id
    public static function deleteProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product WHERE product_id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    //Редактирует товар с заданным id
    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product
            SET
                name            = :name,
                code            = :code,
                price           = :price,
                category_id     = :category_id,
                manufacturer    = :manufacturer,
                availability    = :availability,
                description_short = :description_short,
                description     = :description,
                image           = :image,
                big_image       = :big_image,
                video1          = :video1,
                video2          = :video2,
                see_also        = :seealso,
                buy_also        = :buyalso,
                download_files  = :download_files,
                meta_title      = :meta_title,
                meta_keyword    = :meta_keyword,
                meta_description = :meta_description,
                status          = :status
            WHERE product_id = :id";

        $seeAlsojson = ($options['seealso'])?implode(':', $options['seealso']):'';
        $buyAlsojson = ($options['buyalso'])?implode(':', $options['buyalso']):'';
        $Downloadjson = ($options['filestodownload'])?implode(':', $options['filestodownload']):'';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id',           $id,                    PDO::PARAM_INT);
        $result->bindParam(':name',         $options['name'],       PDO::PARAM_STR);
        $result->bindParam(':code',         $options['code'],       PDO::PARAM_STR);
        $result->bindParam(':price',        $options['price'],      PDO::PARAM_INT);
        $result->bindParam(':category_id',  $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':manufacturer', $options['manufacturer'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description_short', $options['description_short'], PDO::PARAM_STR);
        $result->bindParam(':description',  $options['description'], PDO::PARAM_STR);
        $result->bindParam(':image',        $options['image'],      PDO::PARAM_STR);
        $result->bindParam(':big_image',    $options['big_image'],  PDO::PARAM_STR);
        $result->bindParam(':video1',       $options['video1'],     PDO::PARAM_STR);
        $result->bindParam(':video2',       $options['video2'],     PDO::PARAM_STR);
        $result->bindParam(':seealso',      $seeAlsojson,           PDO::PARAM_STR);
        $result->bindParam(':buyalso',      $buyAlsojson,           PDO::PARAM_STR);
        $result->bindParam(':download_files', $Downloadjson,        PDO::PARAM_STR);
        $result->bindParam(':meta_title',   $options['meta_title'], PDO::PARAM_STR);
        $result->bindParam(':meta_keyword', $options['meta_keyword'], PDO::PARAM_STR);
        $result->bindParam(':meta_description', $options['meta_description'], PDO::PARAM_STR);
        $result->bindParam(':status',       $options['status'],     PDO::PARAM_INT);

        $result->execute();

        return true;
    }

    //Добавляет новый товар
    public static function createProduct($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO product (
                name,
                code,
                price,
                category_id,
                manufacturer,
                availability,
                description_short,
                description,
                image,
                big_image,
                video1,
                video2,
                meta_title,
                meta_keyword,
                meta_description,
                status)'
            . 'VALUES '
            . '(:name,
                :code,
                :price,
                :category_id,
                :manufacturer,
                :availability,
                :description_short,
                :description,
                :image,
                :big_image,
                :video1,
                :video2,
                :meta_title,
                :meta_keyword,
                :meta_description,
                :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);

        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':manufacturer', $options['manufacturer'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description_short', $options['description_short'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':big_image', $options['big_image'], PDO::PARAM_STR);
        $result->bindParam(':video1', $options['video1'], PDO::PARAM_STR);
        $result->bindParam(':video2', $options['video2'], PDO::PARAM_STR);
        $result->bindParam(':meta_title', $options['meta_title'], PDO::PARAM_STR);
        $result->bindParam(':meta_keyword', $options['meta_keyword'], PDO::PARAM_STR);
        $result->bindParam(':meta_description', $options['meta_description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        $result->execute();

        return true;

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    //Возвращает текстое пояснение наличия товара:<br/>
    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    //Возвращает путь к изображению
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/products/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    //получить ссылки на изображения по id товара
    public static function getProductImagesById($id) {

        $id = intval($id);

        $images = array();

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM  product_images WHERE product_id=' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $images[] = $row['image_path'];
        }

        return $images;
    }

    //получить список файлов для скачивания
    public static function getFilesListToDownload() {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM files_to_download ORDER BY sort_order');
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $files_to_download[$i]['id']    = $row['id'];
            $files_to_download[$i]['name']  = $row['name'];
            $files_to_download[$i]['type']  = $row['type'];
            $files_to_download[$i]['link']  = $row['link'];
            $files_to_download[$i]['sort_order'] = $row['sort_order'];
            $i ++;
        }
        return $files_to_download;
    }

    public static function getProductNameById($id) {

        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT name FROM product WHERE product_id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

    }

}