<?php

class Newmenu {

    public static function getMenu() {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM new_solution_menu');

        $tree = array();

        $cats = array();
        //В цикле формируем массив разделов, ключом будет id родительской категории, а также массив разделов, ключом будет id категории
        while($cat =  $result->fetch()){
            $cats_ID[$cat['id']][] = $cat;
            $cats[$cat['parent_id']][$cat['id']] =  $cat;

            echo '<pre>';
            print_r($cats);
            echo '</pre>' . '<br><br><br><br>';

            print_r($cat);
            echo '<br>';
        }

        while ($row = $result->fetch()) {
//            print_r($row);
//            echo '<br>';

            $tree[$row['id']] = $row;
        }
die();
        return $tree;
    }
}