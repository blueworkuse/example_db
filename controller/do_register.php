<?php

    /**
     * 邏輯
     * 註冊：驗證資料
     * http://localhost/example_db/do_register
     */ 

    if(isset($_POST['submit'])) 
    {
        // 接收表單傳來的資料
        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); 

        // 驗證資料合法性
        $validation_rules_array = array(
            'username' => 'required|alpha_numeric|max_len,20|min_len,3',
            'email' => 'required|valid_email',
            'password' => 'required|max_len,20|min_len,3',
            'passwordConfirm' => 'required'
        );
        $gump->validation_rules($validation_rules_array);

        $filter_rules_array = array(
            'username' => 'trim|sanitize_string',
            'email'    => 'trim|sanitize_email',
            'password' => 'trim',
            'passwordConfirm' => 'trim'
        );
        $gump->filter_rules($filter_rules_array);

        $validated_data = $gump->run($_POST);

        // 判斷驗證結果
        if($validated_data === false) {
            // 驗證失敗
            $error = $gump->get_readable_errors(false);
        } else {
            // 驗證成功
            foreach($validation_rules_array as $key => $val) {
                // 轉換為本地參數
                ${$key} = $_POST[$key];
            }

            // 驗證使用者在資料庫裡的資料
            $userVeridator = new UserVeridator();
            $userVeridator->isPasswordMatch($password, $passwordConfirm);
            $userVeridator->isUsernameDuplicate($username);
            $userVeridator->isEmailDuplicate($email);
            $error = $userVeridator->getErrorArray();
        } 

        // if no errors have been created carry on
        if(count($error) == 0)
        {
            /*
            // hash the password
            $passwordObject = new Password();
            $hashedpassword = $passwordObject->password_hash($password, PASSWORD_BCRYPT);
            */
            
            // create the random activasion code
            $activasion = md5(uniqid(rand(),true));

            try {
                // 新增到資料庫
                $table = 'members';
                $data_array = array(
                    'username' => $username,
                    'password' => md5($password),
                    'email' => $email,
                    'active' => $activasion
                );
                Database::get()->insert($table, $data_array);
                $memberID = Database::get()->getLastId();

                if(isset($memberID) AND !empty($memberID) AND is_numeric($memberID)){
                    // 寄出認證信
                    $subject = "Registration Confirmation";
                    $body = "<p>Thank you for registering at demo site.</p>
                             <p>To activate your account, please click on this link: <a href='".BASE_URL."do_activate/$memberID/$activasion'>".BASE_URL."activate/$memberID/$activasion</a></p>
                             <p>Regards Site Admin</p>";

                    $mail = new Mail(MAIL_USERNAME, MAIL_PASSWORD);
                    $mail->setFrom(MAIL_FROM, MAIL_FROMNAME);
                    $mail->addAddress($email);
                    $mail->subject($subject);
                    $mail->body($body);
                    
                    if($mail->send()){
                        $msg->success('註冊成功後，請檢查您的電子郵件以激活您的帳戶.');
                    }else{
                        $msg->error('對不起，無法發送電子郵件.');
                    }

                    // redirect to index page
                    header('Location: '.BASE_URL.'register');
                    exit;
                }else{
                    $error[] = "Registration Error Occur on Database.";
                }
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