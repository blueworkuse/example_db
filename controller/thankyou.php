<?php

    /**
     * 頁面
     * 謝謝
     * http://localhost/example_db/thankyou
     */

    if(!UserVeridator::isLogin(isset($_SESSION['memberID'])?$_SESSION['memberID']:'')){
        header('Location: '.BASE_URL);
        exit;
    }

    $_SESSION['cartNum'] = 0;
    $order = unserialize(base64_decode($_SESSION['order']));

    if($order->status == 1){
        //define page title
        $title = 'Thankyou';

        // 顯示謝謝頁面
        include('view/header/header.php'); 
        include('view/body/thankyou.php');
        include('view/footer/footer.php');
    }else{
        header('Location: '.BASE_URL);
        exit;
    }
    
    // 清除購物車資料
    unset($_SESSION['cartName']);
    unset($_SESSION['cartDesc']);
    unset($_SESSION['cartPrice']);
    unset($_SESSION['cartQty']);
    unset($_SESSION['cartImgPath']);
    unset($_SESSION['cartNum']);

    // 清除訂單資料
    unset($_SESSION['order']);

?>

  