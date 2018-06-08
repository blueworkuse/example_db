<?php

	/**
     * 邏輯
	 * 登出：清除 session
     * http://localhost/example_db/do_logout
	 */

	// 清除登入資料
	unset($_SESSION['memberID']);
	unset($_SESSION['username']);

    // 清除resetToken資料
    unset($_SESSION['resetToken']);
    
    // 清除購物車資料
    unset($_SESSION['cartName']);
    unset($_SESSION['cartDesc']);
    unset($_SESSION['cartPrice']);
    unset($_SESSION['cartQty']);
    unset($_SESSION['cartImgPath']);
    unset($_SESSION['cartNum']);
    
	// 導向登入頁
	header('Location: '.BASE_URL);
	exit;

?>