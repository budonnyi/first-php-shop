<?php

class CatalogController {

    public function actionIndex() //список продукции
    {
        $Menucatalog = Category::getCategoriesMenu();
        $Menuproduct = Product::getProductsList();
        $menu = Menu::build_menu($Menucatalog, 0, $Menuproduct);

        //fill categories field
        $categories = array();
        $categories = Category::getCategoriesList();

        $title = 'Адаптация инвалида в автомобиле';
        $meta_keywords = 'ручное управление для инвалида, поворотно-выдвижной механизм, гидроподъемник для инвалидноЙ коляски, рампа для инвалидной коляски, подъемник для оборудования инвалидам';
        $meta_description = 'Безопасные и надежные решения для адаптации водителя с инвалидностью в автомобиле';

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryID)
    {
        $Menucatalog = Category::getCategoriesMenu();
        $Menuproduct = Product::getProductsList();
        $menu = Menu::build_menu($Menucatalog, 0, $Menuproduct);

        preg_match ('%\d+%', $categoryID, $categoryValidate);
        $categoryID = $categoryValidate[0]; //номер категории

        //fill categories field
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryData = Category::getCategoryById($categoryID);

        //show latest product on page
        $categoryProduct = array();
        $categoryProduct = Product::getProductsListByCategory($categoryID);

        //выводит список подкатегорий
        $subcategories = array();
        $subcategories = Category::getSubcategoryById($categoryID);

        $title = $categoryData['meta_title'] . ' - Адаптация инвалида в автомобиле';
        $meta_keywords = $categoryData['meta_keywords'];
        $meta_description = $categoryData['meta_description'];

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

}