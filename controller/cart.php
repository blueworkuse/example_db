<?php 

	/** 
	 * 頁面
     * 購物車
     * http://localhost/example_db/cart
     */

	$total = 0;
	$result = array();
		
    $cart = new Cart($_SESSION['cartName'], $_SESSION['cartDesc'], $_SESSION['cartPrice'], $_SESSION['cartQty'], $_SESSION['cartImgPath']);

    $i = 0;
    $productIdArray = $cart->getAllProductID();
    foreach($productIdArray as $productID) {
    	array_push($result, array(
            'seq' => $i,
    		'productID' => $productID,
            'name' => $cart->getProductNameInCart($productID),
            'description' => $cart->getProductDescInCart($productID),
            'qty' => (int)$cart->getProductQtyInCart($productID),
            'price' => (int)$cart->getProductPriceInCart($productID),
            'imgPath' => $cart->getProductImgPathInCart($productID)
        ));
        $i = $i+1;
    }

	$total = number_format($cart->getCartTotalAmount());


    //define page title
    $title = 'Cart';

	// 顯示首頁頁面
    include('view/header/header.php'); 
    include('view/body/cart.php');
    include('view/footer/footer.php');
?>