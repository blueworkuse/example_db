<?php

    /**
     * 邏輯
     * 驗證後開通帳號
     * http://localhost/example_db/do_activate/數字/亂碼
     */

    // 取得網址參數
    $data_array = array();
    $data_array['memberID'] = $route->getParameter(2);    
    $data_array['active'] = $route->getParameter(3); 

    // 接收表單傳來的資料
    $gump = new GUMP();
    $data_array = $gump->sanitize($data_array); 
    
    // 驗證資料合法性
    $validation_rules_array = array(
        'memberID' => 'required|integer',
        'active' => 'required|exact_len,32'
    );
    $gump->validation_rules($validation_rules_array);

    $filter_rules_array = array(
        'memberID' => 'trim|sanitize_string',
        'active' => 'trim',
    );
    $gump->filter_rules($filter_rules_array);
    $validated_data = $gump->run($data_array);

    // 判斷驗證結果
    if($validated_data === false) {
        // 驗證失敗
        $error = $gump->get_readable_errors(false);
        $msg->error("您的帳戶無法啟動!");
        header('Location: '.BASE_URL.'login');
        exit;
    }else{
        // 驗證成功
        foreach($validation_rules_array as $key => $val) {
            // 轉換為本地參數
            ${$key} = $data_array[$key];
        }
        
        // 驗證使用者在資料庫裡的資料
        $userVeridator = new UserVeridator();
        if($userVeridator->isReady2Active($memberID, $active)){
            $data_array = array();
            $data_array['active'] = "Yes";
            Database::get()->update("members", $data_array, "memberID", $memberID); 
            $msg->success("您的帳戶現在處於活動狀態，您現在可以登錄.");
            header('Location: '.BASE_URL.'login');
            exit;
        }else{
            $msg->error("您的帳戶無法啟動!");
            header('Location: '.BASE_URL.'login');
            exit;
        }
    }

?>