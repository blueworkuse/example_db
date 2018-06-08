<?php

    class Order {

        private $orderID;
        public $orderDate;
        public $memberID;
        public $description;
        public $serviceFee = 0;
        public $shippingFee = 0;
        public $cartTotal = 0;
        public $orderTotal = 0;
        public $status = 0;

        function __construct() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $this->orderID = COUNTRY_CODE.SHOP_CODE.microtime(true)*10000;
            $this->orderDate = date("Y-m-d h:i:s");
            $this->memberID = $_SESSION['memberID'];
			
			$cart = new Cart($_SESSION['cartName'], $_SESSION['cartDesc'], $_SESSION['cartPrice'], $_SESSION['cartQty'], $_SESSION['cartImgPath']);
			
            $this->description = $cart->toString();
            $this->serviceFee = 0;
            $this->shippingFee = 0;
            $this->cartTotal = $cart->getCartTotalAmount();
            $this->orderTotal = $cart->getCartTotalAmount();
        }

        function setOrderComplete(){
            $this->status = 1;
        }

        function setOrderFail(){
            $this->status = -1;
        }

        function getOrderID(){
            return $this->orderID;
        }

        function save(){
            if(!empty($this->orderID)){

                $cart = new Cart($_SESSION['cartName'], $_SESSION['cartDesc'], $_SESSION['cartPrice'], $_SESSION['cartQty'], $_SESSION['cartImgPath']);

                if(OrderVeridator::isOrderIDExist($this->orderID)){
                    // 主檔
                    $table = 'orders';
                    $data_array = array(
                        'memberID' => $this->memberID,
                        'order' => $this->orderDate,
                        'description' => $this->description,
                        'serviceFee' => $this->serviceFee,
                        'shippingFee' => $this->shippingFee,
                        'cartTotal' => $this->cartTotal,
                        'orderTotal' => $this->orderTotal,
                        'status' => $this->status
                    );
                    Database::get()->update($table, $data_array, "orderID", $this->orderID);

                    // 明細檔
                    $table = 'ordersdetail';
                    Database::get()->delete($table, $orderID, $this->orderID);

                    $seq = 1;
                    $productIdArray = $cart->getAllProductID();
                    foreach($productIdArray as $productID) {
                        $num = (int)$cart->getProductQtyInCart($productID);
                        $price = (int)$cart->getProductPriceInCart($productID);
                        $total = $num * $price;

                        $table = 'ordersdetail';
                        $data_array = array(
                            'orderDetailID' => $seq,
                            'orderID' => $this->orderID,
                            'productID' => $productID,
                            'num' => $num,
                            'price' => $price,
                            'total' => $total,
                        );
                        Database::get()->insert($table, $data_array);
                        $seq = $seq + 1;
                        
                        // 庫存量減少
                        $sql = "UPDATE products SET storage = storage-:num WHERE productID = :productID";
                        $data_array = array(
                            'num' => $num,
                            'productID' => $productID
                        );
                        Database::get()->execute($sql,$data_array);
                    }
                }else{
                    // 主檔
                    $table = 'orders';
                    $data_array = array(
                        'orderID' => $this->orderID,
                        'orderDate' => $this->orderDate,
                        'memberID' => $this->memberID,
                        'description' => $this->description,
                        'serviceFee' => $this->serviceFee,
                        'shippingFee' => $this->shippingFee,
                        'cartTotal' => $this->cartTotal,
                        'orderTotal' => $this->orderTotal,
                        'status' => $this->status
                    );
                    Database::get()->insert($table, $data_array);

                    // 明細檔 
                    $seq = 1;
                    $productIdArray = $cart->getAllProductID();
                    foreach($productIdArray as $productID) {
                        $num = (int)$cart->getProductQtyInCart($productID);
                        $price = (int)$cart->getProductPriceInCart($productID);
                        $total = $num * $price;

                        $table = 'ordersdetail';
                        $data_array = array(
                            'orderDetailID' => $seq,
                            'orderID' => $this->orderID,
                            'productID' => $productID,
                            'num' => $num,
                            'price' => $price,
                            'total' => $total,
                        );
                        Database::get()->insert($table, $data_array);
                        $seq = $seq + 1;

                        // 庫存量減少
                        $sql = "UPDATE products SET storage = storage-:num WHERE productID = :productID";
                        $data_array = array(
                            'num' => $num,
                            'productID' => $productID
                        );
                        Database::get()->execute($sql,$data_array);
                    }
                }
            }
        }
    }

?>