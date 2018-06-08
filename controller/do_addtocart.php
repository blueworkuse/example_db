<?php

    /** 
     * 邏輯
     * 購物車：加到購物車
     * http://localhost/example_db/do_addtocart/數字/數字
     */ 

    $productID = $route->getParameter(2);
    $qty = $route->getParameter(3);

    $cart = new Cart($_SESSION['cartName'], $_SESSION['cartDesc'], $_SESSION['cartPrice'], $_SESSION['cartQty'], $_SESSION['cartImgPath']);

    // 查詢產品
    $table = 'products';
    $condition = 'productID = :productID';
    $order_by = 'name desc';
    $fields = 'productID, name, description, price, imgPath';
    $limit = 'LIMIT 1';
	$data_array = array(":productID" => $productID);
    $result = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
    
    $cart->addToCart($result[0]['productID'], $result[0]['name'], $result[0]['description'], $result[0]['price'], $qty, $result[0]['imgPath']);


    $_SESSION['cartName'] = $cart->getCartName();
    $_SESSION['cartDesc'] = $cart->getCartDesc();
    $_SESSION['cartPrice'] = $cart->getCartPrice();
    $_SESSION['cartQty'] = $cart->getCartQty();
    $_SESSION['cartImgPath'] = $cart->getCartImgPath();

    $_SESSION['cartNum'] = count($_SESSION["cartName"]);
    
    echo $_SESSION['cartNum'];
    
?>