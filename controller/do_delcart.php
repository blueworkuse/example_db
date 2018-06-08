<?php 

    /**
     * 邏輯
     * 購物車：從購物車中刪除
     * http://localhost/example_db/do_delcart/數字
     */ 

    $productID = $route->getParameter(2);

    $cart = new Cart($_SESSION['cartName'], $_SESSION['cartDesc'], $_SESSION['cartPrice'], $_SESSION['cartQty'], $_SESSION['cartImgPath']);

	$cart->removeProductFromCart($productID);


    $_SESSION['cartName'] = $cart->getCartName();
    $_SESSION['cartDesc'] = $cart->getCartDesc();
    $_SESSION['cartPrice'] = $cart->getCartPrice();
    $_SESSION['cartQty'] = $cart->getCartQty();
    $_SESSION['cartImgPath'] = $cart->getCartImgPath();

    $_SESSION['cartNum'] = count($_SESSION["cartName"]);
        
    header('Location: '.BASE_URL.'cart');
    exit;

?>