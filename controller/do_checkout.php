<?php

    if(!UserVeridator::isLogin(isset($_SESSION['memberID'])?$_SESSION['memberID']:'')){
        $msg->info('請先 <a href="'.BASE_URL.'login">登入</a> 再做結帳，謝謝!');
        header('Location: '.BASE_URL."cart");
        exit;
    }

    $order = new Order();
	
    $cart = new Cart($_SESSION['cartName'], $_SESSION['cartDesc'], $_SESSION['cartPrice'], $_SESSION['cartQty'], $_SESSION['cartImgPath']);

    if($order->orderTotal == 0){

        $order->setOrderComplete();
        $order->save();
        $_SESSION['order'] = base64_encode(serialize($order));
        
        header('Location: '.BASE_URL."thankyou");
        exit;

    }else{

        $_SESSION['order'] = base64_encode(serialize($order));
        
        try {
            $obj = new ECPay_AllInOne();
            $obj->ServiceURL  = ECPAY_API_URL;
            $obj->HashKey     = ECPAY_HASH_KEY;
            $obj->HashIV      = ECPAY_HASH_IV;
            $obj->MerchantID  = ECPAY_MERCHANT_ID;
            // 付款完成通知回傳的網址
            $obj->Send['ReturnURL'] = ECPAY_CALLBACK_URL;       
            $obj->Send['MerchantTradeNo']   = $order->getOrderID();
            // 交易時間
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');  
            // 交易金額
            $obj->Send['TotalAmount']       = (int)$order->orderTotal;
            $obj->Send['TradeDesc']         = $cart->toString();
            // 額外的付款資訊(消費者信用卡末四碼)
            $obj->Send['NeedExtraPaidInfo'] = 'Y'; 
            // 付款完成導回平台的網址
            $obj->Send['OrderResultURL']    = ECPAY_CALLBACK_URL; 
            $obj->Send['ChoosePayment'] = ECPay_PaymentMethod::Credit;
            $obj->Send['EncryptType'] = 1;
        
            //訂單的商品資料
            $productIdArray = $cart->getAllProductID();
            foreach($productIdArray as $productID) {
                array_push($obj->Send['Items'], array(
                    'Name'  => $cart->getProductNameInCart($productID),
                    'Price'  => (int)$cart->getProductPriceInCart($productID),
                    'Currency'  => "元",
                    'Quantity'  => (int) $cart->getProductQtyInCart($productID),
                    'URL'  => ""));
            }
      
            // 產生訂單(auto submit至ECPay)
            $obj->CheckOut();
      
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        exit;

    }

?>

  

  