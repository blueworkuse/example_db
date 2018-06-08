<?php
    
    /**
     * 邏輯
     * 重置密碼：驗證密碼
     * http://localhost/example_db/do_reset
     */ 

    // if form has been submitted process it
    if(isset($_POST['submit']))
    {
        // 接收表單傳來的資料
        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); 

        // 驗證資料合法性
        $validation_rules_array = array(
            'password' => 'required|max_len,20|min_len,3',
            'resetToken' => 'required',
            'passwordConfirm' => 'required'
        );
        $gump->validation_rules($validation_rules_array);

        $filter_rules_array = array(
            'resetToken' => 'trim',
            'password' => 'trim',
            'passwordConfirm' => 'trim'
        );
        $gump->filter_rules($filter_rules_array);

        $validated_data = $gump->run($_POST);

        // 判斷驗證結果
        if($validated_data === false) {
            // 驗證失敗
            $error = $gump->get_readable_errors(false);
            foreach( $error as $e) {
                $msg->error($e);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            // 驗證成功
            foreach($validation_rules_array as $key => $val) {
                // 轉換為本地參數
                ${$key} = $_POST[$key];
            }

            // 驗證使用者在資料庫裡的資料
            $userVeridator = new UserVeridator();
            $userVeridator->isPasswordMatch($password, $passwordConfirm);
            $error = $userVeridator->getErrorArray();
        } 
        
        // if no errors have been created carry on
        if(count($error) == 0)
        {
            // 確認 resetToken
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
                $msg->info('您的密碼已被更改！');
                header('Location: '.BASE_URL.'login');
                exit;
            }

            // 都正確就變更密碼 hash the password
            /*
            $passwordObject = new Password();
            $hashedpassword = $passwordObject->password_hash($password, PASSWORD_BCRYPT);
            */

            try {
                $data_array = array();
                $table = 'members';
                $data_array['password'] = md5($password);
                $data_array['resetComplete'] = 'Yes';
                $key = "resetToken";
                $memberID = $resetToken;
                Database::get()->update($table, $data_array, $key, $memberID);
                
                // redirect to index page
                $msg->success('密碼已更改，您現在可以登錄.');
                header('Location: '.BASE_URL.'login');
                exit;

            // else catch the exception and show the error.
            } catch(PDOException $e) {
                $error[] = $e->getMessage();
            }
        }
        if(isset($error) AND count($error) > 0){
            foreach( $error as $e) {
                $msg->error($e);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }else{
        header('Location: ' . BASE_URL);
        exit;
    }

?>