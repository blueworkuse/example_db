<?php

    /**
     * 邏輯
     * 登入：驗證帳號、密碼
     * http://localhost/example_db/do_login
     */ 

	if(isset($_POST['submit'])) {
		// 驗證錯誤訊息
	  	$error = array(); 
		
    	// 接收表單傳來的資料
	  	$gump = new GUMP();
	  	$_POST = $gump->sanitize($_POST); 

		// 驗證資料合法性
	  	$validation_rules_array = array(
	      	'username' => 'required|alpha_numeric|max_len,20|min_len,3',
	      	'password' => 'required|max_len,20|min_len,3'
	  	);
	  	$gump->validation_rules($validation_rules_array);
	  	
	  	$filter_rules_array = array(
	      	'username' => 'trim|sanitize_string',
	      	'password' => 'trim',
	  	);
	  	$gump->filter_rules($filter_rules_array);
	  	$validated_data = $gump->run($_POST);

    	// 判斷驗證結果
	  	if($validated_data === false) {
        	// 驗證失敗
	    	$error = $gump->get_readable_errors(false);
	  	}else{
        	// 驗證成功
	    	foreach($validation_rules_array as $key => $val) {
	    		// 轉換為本地參數
	      		${$key} = $_POST[$key]; 
	    	}

        	// 驗證使用者在資料庫裡的資料
	    	$userVeridator = new UserVeridator();
	    	$userVeridator->loginVerification($username, $password);
	    	$error = $userVeridator->getErrorArray();

	    	if(count($error) == 0){
				$table = "members";
				$condition = "username = :username";
				$order_by = "1";
				$fields = "*";
				$limit = "LIMIT 1";
				$data_array = array(":username" => $username);
				$result = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
				$_SESSION['memberID'] = $result[0]['memberID'];
				$_SESSION['username'] = $username;
				header('Location: index');
				exit;
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