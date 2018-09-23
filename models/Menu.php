<?php

class Menu
{
    public static function build_menu($cats, $parent_id, $product) {
        //$catalog - полученынй список категорйи
        //$parent_id - значение родительской категории
        //$product - полученный список продуктов

        //получение списка всех категорий для товаров
        $categories = array();
        foreach ($product as $value) {
            $categories[] = $value['category_id'];
        }

        //проверка существования категории с переданной родительским IDv
        if (isset($cats[$parent_id])) {
            $tree = '<ul class="accordion menu nav nav-list aa-nav-sub" id="accordion">';
            foreach ($cats[$parent_id] as $cat) {

                $tree .= '<li><a href="/category/' . $cat['category_id'] . '">' . $cat['name'] . '</a>';
                $tree .= self::build_menu($cats, $cat['category_id'], $product);
                //выбор категории для показа товара
                if (in_array($cat['category_id'], $categories)) {
                    $tree .= '<ul>';
                    foreach ($product as $prod) {
                        if ($prod['category_id'] == $cat['category_id']) $tree .= '<li><a href="/product/' . $prod['id'] . '">' . $prod['name'] . '</a>';
                    }
                    $tree .= '</ul>';
                }
                $tree .= '</li>';
            }
            $tree .= '</ul>';
        }
        else return null;
        return $tree;
    }
}




