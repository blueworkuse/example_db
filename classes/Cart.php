<?php

    class Cart {

        private $cartName;
        private $cartDesc;
        private $cartPrice;
        private $cartQty;
        private $cartImgPath;

        function __construct($cartName, $cartDesc, $cartPrice, $cartQty, $cartImgPath ) {
            if(is_array($cartQty) AND is_array($cartPrice) AND is_array($cartName)){
                $this->cartName  = $cartName;
                $this->cartDesc  = $cartDesc;
                $this->cartPrice = $cartPrice;
                $this->cartQty   = $cartQty;
                $this->cartImgPath = $cartImgPath;
            }else{
                $this->cartName   = array();
                $this->cartDesc   = array();
                $this->cartPrice = array();
                $this->cartQty   = array();
                $this->cartImgPath  = array();
            }
        }

        function getCartName(){
            return $this->cartName;
        }

        function getCartDesc(){
            return $this->cartDesc;
        }

        function getCartPrice(){
            return $this->cartPrice;
        }

        function getCartQty(){
            return $this->cartQty;
        }

        function getCartImgPath(){
            return $this->cartImgPath;
        }

        function toString(){
            $temp = '';
            foreach($this->getAllProductID() as $productID){
                $temp .= $this->getProductNameInCart($productID)." $".$this->getProductPriceInCart($productID)." x ".$this->getProductQtyInCart($productID).", ";
            }
            return substr_replace($temp, "", -2);
        }

        function getTotalQty(){
            $count = 0;
            foreach($this->cartQty as $qty){
                $count += $qty;
            }
            return $count;
        }

        function getCartTotalAmount(){
            $amount = 0;
            foreach($this->cartQty as $productID => $qty){
                $amount += $this->cartPrice[$productID] * $qty;
            }
            return $amount;
        }

        function addToCart($productID, $name, $desc, $price, $qty, $imgPath)
        {
            if(is_numeric($productID) AND is_numeric($qty) AND !empty($productID) AND !empty($name) AND !empty($qty) AND !empty($price)){
                if(array_key_exists($productID, $this->cartQty)) {
                    $this->cartQty[$productID] += $qty;
                }else{
                    $this->cartName[$productID] = $name;
                    $this->cartDesc[$productID] = $desc;
                    $this->cartPrice[$productID] = $price;
                    $this->cartQty[$productID] = $qty;
                    $this->cartImgPath[$productID] = $imgPath;
                } 
                return true;
            }
            return false;
        }

        function addToCartIfNotExist($productID, $name, $desc, $qty, $price, $imgPath)
        {
            if(is_numeric($productID) AND is_numeric($qty) AND !empty($productID)){
                if(array_key_exists($productID, $this->cartQty)) {
                    return false;
                }else{
                    $this->cartName[$productID] = $name;
                    $this->cartDesc[$productID] = $desc;
                    $this->cartPrice[$productID] = $price;
                    $this->cartQty[$productID] = $qty;
                    $this->cartImgPath[$productID] = $imgPath;
                    return true;
                }
            }
            return false;
        }

        function updateOneFromCart($productID,$qty)
        {
            if(is_numeric($productID) AND is_numeric($qty) AND !empty($productID) AND !empty($qty)){
                if(array_key_exists($productID, $this->cartQty)) {
                    $this->cartQty[$productID] = $qty;
                }
                return true;
            }
            return false;
        }

        function removeOneFromCart($productID)
        {
            if(is_numeric($productID) AND !empty($productID)){
                if(array_key_exists($productID, $this->cartQty)) {
                    if($this->cartQty[$productID] >= 1){
                        $this->cartQty[$productID]--;
                    }
                    if($this->cartQty[$productID] <= 0){
                        unset($this->cartName[$productID]);
                        unset($this->cartDesc[$productID]);
                        unset($this->cartPrice[$productID]);
                        unset($this->cartQty[$productID]);
                        unset($this->cartImgPath[$productID]);
                    }
                    return true;
                }
            }
            return false;
        }

        function removeProductFromCart($productID){
            if(is_numeric($productID)){
                if(array_key_exists($productID, $this->cartQty)) {
                    unset($this->cartName[$productID]);
                    unset($this->cartDesc[$productID]);
                    unset($this->cartPrice[$productID]);
                    unset($this->cartQty[$productID]);
                    unset($this->cartImgPath[$productID]);
                    return true;
                }
            }
            return false;
        }

        function getProductNameInCart($productID){
            if(is_numeric($productID)){
                if(array_key_exists($productID, $this->cartQty)) {
                    return $this->cartName[$productID];
                }
            }
        }

        function getProductDescInCart($productID){
            if(is_numeric($productID)){
                if(array_key_exists($productID, $this->cartQty)) {
                    return $this->cartDesc[$productID];
                }
            }
        }

        function getProductPriceInCart($productID){
            if(is_numeric($productID)){
                if(array_key_exists($productID, $this->cartQty)) {
                    return $this->cartPrice[$productID];
                }
            }
        }

        function getProductQtyInCart($productID){
            if(is_numeric($productID)){
                if(array_key_exists($productID, $this->cartQty)) {
                    return $this->cartQty[$productID];
                }
            }
        }

        function getProductImgPathInCart($productID){
            if(is_numeric($productID)){
                if(array_key_exists($productID, $this->cartQty)) {
                    return $this->cartImgPath[$productID];
                }
            }
        }

        function getAllProductID(){
            return array_keys($this->cartName);
        }
    }

?>