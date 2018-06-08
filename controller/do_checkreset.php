<?php

    /** 
     * 邏輯
     * 重置密碼：驗證 resetToken 參數是否正確
     * http://localhost/example_db/do_checkreset/亂碼
     */

    // 檢查是否有帶 Token 
    $verify_array['resetToken'] = $route->getParameter(2);

    // 接收表單傳來的資料
    $gump = new GUMP();
    $verify_array = $gump->sanitize($verify_array); 

    // 驗證資料合法性
    $validation_rules_array = array(
        'resetToken' => 'required'
    );
    $gump->validation_rules($validation_rules_array);
    $filter_rules_array = array(
        'resetToken' => 'trim'
    );

    $gump->filter_rules($filter_rules_array);
    $validated_data = $gump->run($verify_array);

    // 判斷驗證結果
    if($validated_data === false) {
        // 驗證失敗
        // 沒有帶 Token 回來，直接踢回 login
        $msg->error('提供的令牌無效，請使用重置電子郵件中提供的鏈接.');
        header('Location: '.BASE_URL.'login');
        exit;
    } else {
        // 驗證成功
        foreach($validation_rules_array as $key => $val) {
            // 轉換為本地參數
            ${$key} = $verify_array[$key];
        }
        
        // 有帶 Token 回來的話，確認是否存在
        $table = 'members';
        $condition = 'resetToken = :resetToken';
        $order_by = '1';
        $fields = 'resetToken, resetComplete';
        $limit = 'LIMIT 1';
		$data_array = array(":resetToken" => $resetToken);
        $result = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
        
        if(!isset($result[0]['resetToken']) OR empty($result[0]['resetToken'])){
            $msg->error('提供的令牌無效，請使用重置電子郵件中提供的鏈接.');
            header('Location: '.BASE_URL.'login');
            exit;
        }else if(isset($result[0]['resetComplete']) AND $result[0]['resetComplete'] == 'Yes'){
            $msg->info('您的密碼已被更改!');
            header('Location: '.BASE_URL.'login');
            exit;
        }else{
            $_SESSION['resetToken'] = $result[0]['resetToken'];
            header('Location: '.BASE_URL.'reset');
            exit;
        }
    }

?>