<?php include(ROOT . '/views/layouts/header.php'); ?>

<?php


echo '<pre>';
print_r($newSolutionMenu);
echo '</pre>';

echo $SolutionMenu;



// $mysqli = Db::getConnection();
// $categoryList = array();

// //Получаем массив нашего меню из БД в виде массива
// function getCat($mysqli){
//     $sql = 'SELECT * FROM category';
//     $res = $mysqli->query($sql);

//     //Создаем масив где ключ массива является ID меню
//     $cat = array();
//     while($row = $res->fetch()){
//         $cat[$row['category_id']] = $row['name'];
//     }

//     return $cat;
// }

// function getProducts($mysqli) {
//     $sql = 'SELECT * FROM product';
//     $res = $mysqli->query($sql);

//     //Создаем масив где ключ массива является ID меню
//     $product = array();
//     while($row = $res->fetch()){
//         $product[$row['product_id']] = $row;
//     }

//     return $product;
// }

// //Функция построения дерева из массива от Tommy Lacroix
// function getTree($dataset) {
//     $tree = array();

//     foreach ($dataset as $id => &$node) {
//         //Если нет вложений
//         if (!$node['parent']){
//             $tree[$id] = &$node;
//         } else {
//             //Если есть потомки то перебераем массив
//             $dataset[$node['parent']]['childs'][$id] = &$node;
//         }
//     }

//     return $tree;
// }

// function getMenu($category, $product) {
//     $tree = array();

//     foreach ($category as $cat) {
//         $tree[i] = $cat;
//     }
// }


//Получаем подготовленный массив с данными
// $cat  = getCat($mysqli);
// $prod = getProducts($mysqli);

// $tree = getTree($cat);

// echo '<pre>';
// print_r($tree);
// echo '</pre>';


// foreach ($prod as $value) {
//     echo $value['name'] . '<br>';
// }


//Создаем древовидное меню
// $tree = getTree($cat);

// //Шаблон для вывода меню в виде дерева
// function tplMenu($category){
//     $menu = '<li>
// 		<a href="#" title="'. $category['name'] .'">' .
//         $category['name'].'</a>';

//     if(isset($category['childs'])){
//         $menu .= '<ul>'. showCat($category['childs']) . '</ul>';
//     }
//     $menu .= '</li>';

//     return $menu;
// }

/**
 * Рекурсивно считываем наш шаблон
 **/
// function showCat($data){
//     $string = '';
//     foreach($data as $item){
//         $string .= tplMenu($item);
//     }
//     return $string;
// }

//Получаем HTML разметку
// $cat_menu = showCat($tree);
// echo $cat_menu;

?>

    <!-- <div class="span2 column-lead hidden-print">
        <di v class="well well-small aa-as-container">
            <ul class="nav nav-list aa-listbox">
                <li class="nav-header aa-nav-sub-header aa-nav-sub-header-link"><a href="#">Продукция</a></li>
            </ul>-->

<!--             <ul class="menu_vert nav nav-list aa-nav-sub">
                <?= $cat_menu ?>
            </ul>
        </div>
    </div> -->
