<?php

    /**
     * 頁面
     * 產品
     * http://localhost/example_db/product
     */

    // 每頁顯示項目數量
    $per = 6; 
    // 頁數
    if(isset($_SESSION['productPage'])) {
    }else{
        $_SESSION['productPage'] = 1;
    }
    $productPage = $_SESSION['productPage'];
    // 每一頁開始的資料序號
    $start = ($productPage-1)*$per; 

    // 查詢產品
    $table = 'products';
    $condition = 'name != :name';
    $order_by = 'name desc';
    $fields = 'productID, name, description, price, 99 AS storage, imgPath, refUrl';
    $limit = 'LIMIT '.$start.','.$per;
	$data_array = array(":name" => '');
    $result = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);

    // 查詢產品筆數
    $table = 'products';
    $condition = 'name != :name';
    $order_by = '1';
    $fields = 'name';
    $limit = '';
    $data_array = array(":name" => '');
    $temp = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
    $productPageCount = ceil(count($temp)/$per);


    //define page title
    $title = 'Product';

    // 顯示銷售頁面
    include('view/header/header.php'); 
    include('view/body/product.php');   
    include('view/footer/footer.php');

?>