<?php

    /**
     * 頁面
     * 會員中心-訂單查詢
     * http://localhost/example_db/memberorder/數字
     */

    if(!UserVeridator::isLogin(isset($_SESSION['memberID'])?$_SESSION['memberID']:'')){
        header('Location: '.BASE_URL);
        exit;
    }

    // 回傳結果
    $result = array();
    
    // 查詢訂單
    $table = 'orders, ordersdetail, products';
    $condition = 'orders.orderID = ordersdetail.orderID AND products.productID = ordersdetail.productID AND memberID = :memberID';
    $order_by = 'orderDate DESC';
    $fields = 'DISTINCT orders.orderID, orders.orderDate, orders.orderTotal';
    $limit = 'LIMIT 10';
	$data_array = array(":memberID" => $_SESSION['memberID']);
    $resultTemp = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);

    // 查詢訂單明細
    foreach ($resultTemp as $row) { 
        $table = 'ordersdetail, products';
        $condition = 'ordersdetail.productID = products.productID AND ordersdetail.orderID = :orderID';
        $order_by = 'ordersdetail.orderDetailID';
        $fields = 'ordersdetail.orderdetailID, products.imgPath, products.name, products.description, ordersdetail.price, ordersdetail.num, ordersdetail.total';
        $limit = 'LIMIT 50';
		$data_array = array(":orderID" => $row['orderID']);
        $resultDetailTemp = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
        
        // 組合
        $temp = array(
            'orderID' => $row['orderID'],
            'orderDate' => $row['orderDate'],
            'orderTotal' => $row['orderTotal'],
            'detail' => $resultDetailTemp
        );

        array_push($result, $temp);
    }


    //define page title
    $title = 'MemberOrder';

    // 顯示忘記密碼頁面
    include('view/header/header.php');
    include('view/body/memberorder.php');
    include('view/footer/footer.php');

?>