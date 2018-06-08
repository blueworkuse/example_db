<?php

	/**
     * 頁面
	 * 主頁
	 * http://localhost/example_db
	 */
	
	// 查詢文章
    $table = 'article';
    $condition = 'title != :title';
    $order_by = 'createDate desc';
    $fields = 'title, content, imgPath, refUrl, createDate, updateDate';
    $limit = 'LIMIT 10';
	$data_array = array(":title" => '');
    $result = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);


    //define page title
    $title = '毛小孩';

	// 顯示主頁頁面
	include('view/header/header.php'); 
	include('view/body/index.php');
	include('view/footer/footer.php'); 
			
?>