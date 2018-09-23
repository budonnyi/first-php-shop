<?php

class Sitecommon
{
    public static function getNews() {

        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM news');

        $news = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $news[$i]['id']             = $row['id'];
            $news[$i]['date']           = $row['date'];
            $news[$i]['title']          = $row['title'];
            $news[$i]['image']          = $row['image'];
            $news[$i]['description']    = $row['description'];
            $news[$i]['new']            = $row['new'];
            $news[$i]['tag']            = $row['tag'];
            $news[$i]['autor']          = $row['autor'];
            $news[$i]['status']         = $row['status'];

            $i++;
        }

        return $news;
    }

    public static function getNewSolutionMenu() {

        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM new_solution_menu');
        $i = 0;

        while ($row = $result->fetch()) {
            $newSolutionsMenu[$i]['id']            = $row ['id'];
            $newSolutionsMenu[$i]['category_id']   = $row ['category_id'];
            $newSolutionsMenu[$i]['parent_id']     = $row ['parent_id'];
            $newSolutionsMenu[$i]['name']          = $row ['name'];
            $newSolutionsMenu[$i]['description']   = $row ['description'];
            $i++;
        }

        return $newSolutionsMenu;
    }

    public static function getVideo($tag)
    {

        $db = Db::getConnection();

        $videoList = array();

        $result = $db->query("SELECT * FROM video
                              WHERE status='1' AND tag LIKE '%$tag%' ORDER BY sort_order");
        $i = 0;

        while ($row = $result->fetch()) {
            $videoList[$i]['id'] = $row['id'];
            $videoList[$i]['title'] = $row['title'];
            $videoList[$i]['description'] = $row['description'];
            $videoList[$i]['link'] = $row['link'];
            $videoList[$i]['date'] = $row['date'];
            $videoList[$i]['tag'] = $row['tag'];
            $videoList[$i]['product_id'] = $row['product_id'];

            $i++;
        }

        return $videoList;
    }

    //получает прайс-лист
    public static function getPriceList()
    {
        $rate = new Currency();

        $rateUSDdata = $rate->getUSDrate();
        $rateSEKdata = $rate->getSEKrate();

        $USDrate = ($rateUSDdata->rate / $rateUSDdata->size);
        $SEKrate = ($rateSEKdata->rate / $rateSEKdata->size);

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM pricelist');

        //расчет стоимости в Гривне и запись в БД
        while ($row = $result->fetch()) 
        {
            //поиск вхождений SEK и USD в БД
            if (substr_count($row['curr'], "SEK")) $new_price = round ($row['price'] * $SEKrate, -1);
            if (substr_count($row['curr'], "USD")) $new_price = round ($row['price'] * $USDrate, -1);
            //запись в БД
            self::setProductPriceByCode($row['code'], $new_price);
        }
    
        return true;
    }

    //устанавливает прайс в Гривне (!!!) для товара с определенным кодом
    public static function setProductPriceByCode($code, $price)
    {
        $db = Db::getConnection();

        $sql = "UPDATE product SET price = :price WHERE code = :code";

        $result = $db->prepare($sql);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':code', $code, PDO::PARAM_INT);

        return $result->execute();
    }

    //записывает данные из csv файла в базу данных
    public static function setPriceListToDB ()
    {
        $csvPath = 'AA.csv';
        $delimiter = ';';
        $csvContent = file($csvPath);

        $db = Db::getConnection();

        //очистка базы данных перед очередным занесением значений
        $result = $db->prepare('TRUNCATE TABLE pricelist');
        $result->execute();

        foreach($csvContent as $row) {
            $row = explode($delimiter, $row);

            $sql = 'INSERT INTO pricelist (name, code, price, curr)
                    VALUES (:name, :code, :price, :curr)';
            $result = $db->prepare($sql);

            $result->bindParam(':code', $row[0], PDO::PARAM_INT);
            $result->bindParam(':name', $row[1], PDO::PARAM_STR);
            $result->bindParam(':price', $row[2], PDO::PARAM_INT);
            $result->bindParam(':curr', $row[3], PDO::PARAM_STR);

            $result->execute();
        }   
        return true;
    }

    public static function getSolutionsList() {

        $db = Db::getConnection();
        $solutionsList = array();
        $result = $db->query('SELECT * FROM solutions WHERE status=1 ORDER BY sort_order ASC');
        $i = 0;

        while ($row = $result->fetch()) {
            $solutionsList[$i]['id'] = $row ['id'];
            $solutionsList[$i]['category_id'] = $row ['category_id'];
            $solutionsList[$i]['name'] = $row ['name'];
            $solutionsList[$i]['image'] = $row ['image'];
            $solutionsList[$i]['description'] = $row ['description'];
            $solutionsList[$i]['description_short'] = $row ['description_short'];
            $solutionsList[$i]['status'] = $row ['status'];
            $i++;
        }
        return $solutionsList;
    }

    public static function getSolutionMenu() {

        $db = Db::getConnection();
        $solutionsMenu = array();
        $result = $db->query('SELECT * FROM solution_menu WHERE status=1 ORDER BY id ASC');
        $i = 0;

        while ($row = $result->fetch()) {
            $solutionsMenu[$i]['id'] = $row ['id'];
            $solutionsMenu[$i]['name'] = $row ['name'];
            $solutionsMenu[$i]['description'] = $row ['description'];
            $i++;
        }
        return $solutionsMenu;
    }

    public static function getSolutionMenuByID($solutionID) {

        $db = Db::getConnection();
        $solutionsMenu = array();
        $result = $db->query("SELECT * FROM solution_menu WHERE status=1 AND id = $solutionID ORDER BY id ASC");

        $row = $result->fetch();
            $Menu['id'] = $row ['id'];
            $Menu['name'] = $row ['name'];
            $Menu['description'] = $row ['description'];
            $Menu['meta_title'] = $row ['meta_title'];
            $Menu['meta_description'] = $row ['meta_description'];
            $Menu['meta_keywords'] = $row ['meta_keywords'];

        return $Menu;
    }

    public static function getCategoriesInSolution($solutionID) {

        $db = Db::getConnection();
        $category = array();
        
        $result = $db->query("SELECT category_id FROM solution_to_category WHERE solution_id = $solutionID");

        while ($row = $result->fetch()) {
            $category[] = $row['category_id'];
        }

        return $category;
    }

}