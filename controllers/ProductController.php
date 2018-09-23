<?php

class ProductController
{
	
	public function actionView ($id) {

        $Menucatalog = Category::getCategoriesMenu();
        $Menuproduct = Product::getProductsList();
        $menu = Menu::build_menu($Menucatalog, 0, $Menuproduct);

//получить список всех категорий
		$categories = Category::getCategoriesList();
//получить параметры продукта по его id
		$product = Product::getProductById ($id);
//получить категорию для выбранного продукта
		$categoryID = $product['category_id'];
		$catNAME = Category::getCategoryById($categoryID)['name'];
//получить список продуктов в категории
        $categoryProduct = Product::getProductsListByCategory($categoryID);
//получаем список продуктов для раздела Купить также и смотреть так же
		$Listproduct = Product::getProductsList();
//список файлов для скачивания
		$FilesToDownload = Product::getFilesListToDownload();

		$title = $product['name'] . ' - ' . $product['meta_title'];
		$meta_keywords = $product['meta_keyword'];
		$meta_description = $product['meta_description'];

//получить изображения для owl галереи
		$images = Product::getProductImagesById($id);


//		$files_to_download = Product::getFilesToDownload($id);

		require_once (ROOT . '/views/product/view.php');
		return true;
	}
}