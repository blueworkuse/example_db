<?php

    /**
     * 邏輯
     * 忘記密碼：產生 Token 並寄出信件
     * http://localhost/example_db/do_forget
     */ 

    // if form has been submitted process it
    if(isset($_POST['submit']) AND isset($_POST['email'])) {
        $email = $_POST['email'];
        $postVeridator = new PostVeridator();
        $userVeridator = new UserVeridator();
        $userAction = new UserAction($email);
        $log = new Log();

        // 信箱是否合法
        if($postVeridator->isValidEmail($email)) { 
            // 信箱是否存在
            if($userVeridator->isEmailDuplicate($email)) { 
                try {
                  // 創建 Token 並存到資料庫
                  $resetToken = $userAction->getResetToken(); 
                  // 用 Token 組出重置信件並寄出
                  $userAction->sendResetEmail($resetToken); 
                  // 重導向登入頁並顯示成功
                  $userAction->redir2login(); 
                } catch(PDOException $e) {
                  $error[] = $e->getMessage();
                  $log->error(__FILE__, json_encode($error));
                }
            }else{ 
                // 不存在就假裝成功, 避免被試出會員信箱
                $log->warning(__FILE__, 'WRONG EMAIL: ' .$email);
                sleep(rand(1,2));
                // 重導向登入頁並顯示成功
                $userAction->redir2login(); 
                exit;
            }
        }else{ 
            // 不合法就顯示踢回上一頁顯示錯誤
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }else{ 
        // 非正常進入就踢回首頁
        header('Location: ' . BASE_URL);
        exit;
    }

?>