<?php

    /**
     * 邏輯
     * 產品
     * http://localhost/example_db/do_product/數字
     */

    // 檢查是否有帶 Token 
    $verify_array['productPage'] = $route->getParameter(2);

    // 接收表單傳來的資料
    $gump = new GUMP();
    $verify_array = $gump->sanitize($verify_array); 

    // 驗證資料合法性
    $validation_rules_array = array(
        'productPage' => 'required|integer'
    );
    $gump->validation_rules($validation_rules_array);
    $filter_rules_array = array(
        'productPage' => 'trim'
    );

    $gump->filter_rules($filter_rules_array);
    $validated_data = $gump->run($verify_array);

    // 判斷驗證結果
    if($validated_data === false) {
        // 驗證失敗
        $_SESSION['productPage'] = 0;
    } else {
        // 驗證成功
        $_SESSION['productPage'] = $verify_array['productPage'];
    }

    header('Location: '.BASE_URL.'product');
    exit;

?>