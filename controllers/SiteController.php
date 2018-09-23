<?php

class SiteController {

	public function actionTest()
	{
		$newSolutionMenu = Sitecommon::getNewSolutionMenu();

		$SolutionMenu = Menu::build_menu($newSolutionMenu, 0, $Menuproduct);

		// $Menucatalog = Category::getCategoriesMenu();
  		// $Menuproduct = Product::getProductsList();
  		// $solutionMenu = Menu::build_menu($Menucatalog, 0, $Menuproduct);

		// $categories = Category::getCategoriesList();

		require_once(ROOT . '/views/site/test.php');

		return true;
	}

	public function actionIndex()
	{
		
		$Menucatalog = Category::getCategoriesMenu();
        $Menuproduct = Product::getProductsList();
        $menu = Menu::build_menu($Menucatalog, 0, $Menuproduct);
		//fill categories field
		$categories = array();
		$categories = Category::getCategoriesList();

		$LatestProductList = Product::getLatestProducts();
		
		$solutionList 	= Sitecommon::getSolutionsList();
		
		$solutionMenu 	= Sitecommon::getSolutionMenu();

		$latestProduct = array();
		$latestProduct = Product::getLatestProducts(16);

		$title = 'Решения для инвалида в автомобиле :: Сайт дилера Autoadapt в Украине :: ручное управление, поворотные механизмы :: Переоборудование автомобиля дял инвалида';
		$meta_description = 'Сайт дилера Autoadapt в Украине - компании Хендикарс. Ручное управление, поворотные механизмы, гидроподъемники для инвалидной коляски, пандусы';
		$meta_keywords = 'переоборудование автомобиля, переобладнання авто, handycars, хендикарс, ручное управление авто, поворотные механизмы, для инвалидов, подъемники для колясок, подъем оборудования, автомобильные рампы, портативные рампы, поворотно-выдвижной механизм';

		require_once(ROOT . '/views/site/index.php');

		return true;
	}

	//contact feedback to mail
	public function actionContacts()
	{
        $Menucatalog = Category::getCategoriesMenu();
        $Menuproduct = Product::getProductsList();
        $menu = Menu::build_menu($Menucatalog, 0, $Menuproduct);

		$categories = array();
		$categories = Category::getCategoriesList();

		$title = 'Контакты. Решения для инвалида в автомобиле :: Сайт дилера Autoadapt в Украине :: ручное управление, поворотные механизмы, адаптация в автомобиле людей с инвалидностью :: Переоборудование автомобиля';
		$meta_description = 'Контакты. Сайт дилера Autoadapt в Украине :: ручное управление, поворотные механизмы, адаптация в автомобиле людей с инвалидностью :: Переоборудование автомобиля ';
		$meta_keywords = 'переоборудование, переобладнання, автомобилей, handycars, handicars, хендикарс, handy, cars, хэндикарс, поворотные механизмы, ручное управление, педальями газа и тормоза, инвалидные коляски, помощники и аксесуары, подъемники для колясок, подъем оборудования, автомобильные рампы, портативные рампы, автомобильные кресла, поворотно-выдвижной механизм';

		require_once(ROOT . '/views/site/contacts.php');

		return true;
	}

	public function actionVideo($tag)
	{

		$videoList = Sitecommon::getVideo($tag);

		$title = 'Видеоматериалы. Решения для инвалида в автомобиле :: Сайт дилера Autoadapt в Украине :: ручное управление, поворотные механизмы, адаптация в автомобиле людей с инвалидностью :: Переоборудование автомобиля';
		$meta_description = 'Видеоматериалы для водителей с инвалидностью. Сайт официального дилера Autoadapt в Украине :: ручное управление, поворотные механизмы, адаптация в автомобиле людей с инвалидностью :: Переоборудование автомобиля';
		$meta_keywords = 'переоборудование, переобладнання, автомобилей, handycars, handicars, хендикарс, handy, cars, хэндикарс, поворотные механизмы, ручное управление, педальями газа и тормоза, инвалидные коляски, помощники и аксесуары, подъемники для колясок, подъем оборудования, автомобильные рампы, портативные рампы, автомобильные кресла, поворотно-выдвижной механизм';
		
		require_once(ROOT . '/views/site/video.php');

		return true;
	}

    public function actionInformation()
    {
        //fill categories field
        $categories = array();
        $categories = Category::getCategoriesList();

        $title = 'Информация. Решения для инвалида в автомобиле :: Сайт дилера Autoadapt в Украине :: ручное управление, поворотные механизмы, адаптация в автомобиле людей с инвалидностью :: Переоборудование автомобиля. Адаптация в автомобиле водителя с инвалидностью';
        $meta_description = 'Информация для водителей с инвалидностью. Сайт официального дилера Autoadapt в Украине :: ручное управление, поворотные механизмы, адаптация в автомобиле людей с инвалидностью :: Переоборудование автомобиля';
        $meta_keywords = 'переоборудование, переобладнання, автомобилей, handycars, handicars, хендикарс, handy, cars, хэндикарс, поворотные механизмы, ручное управление, педальями газа и тормоза, инвалидные коляски, помощники и аксесуары, подъемники для колясок, подъем оборудования, автомобильные рампы, портативные рампы, автомобильные кресла, поворотно-выдвижной механизм';

        require_once(ROOT . '/views/site/information.php');

        return true;
    }

    public function actionNews()
    {
        //fill news

        $news = Sitecommon::getNews();

        $title = 'Новости. Решения для инвалида в автомобиле.';
        $meta_description = 'Новости для водителей с инвалидностью.';
        $meta_keywords = 'переоборудование автомобилей, handycars, подъемники для колясок, подъем оборудования, автомобильные рампы, портативные рампы, автомобильные кресла';

        require_once(ROOT . '/views/site/news.php');

        return true;
    }

	public function actionSolutions()
	{
		//fill solutions field
		$solutionList 	= Sitecommon::getSolutionsList();
		$solutionMenu 	= Sitecommon::getSolutionMenu();

		$LatestProductList = Product::getLatestProducts(12);

		$title 			= 'Решения для инвалида в автомобиле :: Сайт дилера Autoadapt в Украине :: ручное управление, поворотные механизмы, адаптация в автомобиле людей с инвалидностью :: Переоборудование автомобиля';
		$meta_description = 'Решения для инвалида в автомобиле :: Сайт дилера Autoadapt в Украине :: ручное управление, поворотные механизмы, адаптация в автомобиле людей с инвалидностью :: Переоборудование автомобиля';
		$meta_keywords 	= 'переоборудование, переобладнання, автомобилей, handycars, handicars, хендикарс, handy, cars, хэндикарс, поворотные механизмы, ручное управление, педальями газа и тормоза, инвалидные коляски, помощники и аксесуары, подъемники для колясок, подъем оборудования, автомобильные рампы, портативные рампы, автомобильные кресла, поворотно-выдвижной механизм';

		require_once(ROOT . '/views/site/solutions.php');

		return true;
	}

	public function actionSolution($solutionID)
    {
        $solutionMenu 	= Sitecommon::getSolutionMenu();		//positions for left menu
		$solutionList 	= Sitecommon::getSolutionsList(); 		//items for slider
        
        $categoriesInSolution = Sitecommon::getCategoriesInSolution($solutionID); //categories ID list

        $categoriesList = Category::getCategoriesListByIds($categoriesInSolution);

        $datas = Sitecommon::getSolutionMenuByID($solutionID);

       	$title = $datas['meta_title'];
		$meta_description = $datas['meta_description'];
		$meta_keywords 	= $datas['meta_keywords'];

        require_once(ROOT . '/views/site/solution.php');

        return true;
    }

	public function actionPricelist()
	{
		Sitecommon::setPriceListToDB(); //- запись данных из файла в базу данных - перенести в админку (!!!)
		Sitecommon::getPriceList(); // - получить прайслист в базу данных

		return true;
	}
}