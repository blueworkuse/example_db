<?php

	session_start();

	// 載入 composer
	require('vendor/autoload.php'); 

	// 初始化，實作必須物件
	require('init.php');    

	// 路由: 決定要去哪一頁，讀取該頁面需要的資料組合介面
	require('route.php');   

?>