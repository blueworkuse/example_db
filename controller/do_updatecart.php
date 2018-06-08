<?php

    /** 
     * 邏輯
     * 購物車：更新購物車
     * http://localhost/example_db/do_updatecart/數字/數字
     */ 

    $productID = $route->getParameter(2);
    $qty = $route->getParameter(3);

    $cart = new Cart($_SESSION['cartName'], $_SESSION['cartDesc'], $_SESSION['cartPrice'], $_SESSION['cartQty'], $_SESSION['cartImgPath']);
    
    $cart->updateOneFromCart($productID, $qty);


    $_SESSION['cartName'] = $cart->getCartName();
    $_SESSION['cartDesc'] = $cart->getCartDesc();
    $_SESSION['cartPrice'] = $cart->getCartPrice();
    $_SESSION['cartQty'] = $cart->getCartQty();
    $_SESSION['cartImgPath'] = $cart->getCartImgPath();

    echo number_format($cart->getCartTotalAmount());

?>