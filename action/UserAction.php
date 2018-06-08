<?php

    /**
     * 對使用者操作封裝
     */
    
    class UserAction {

        private $email = "";

        public function __construct($email){
            $this->email = $email;
        }

        // 創建 Token 並存到資料庫
        function getResetToken(){
            $data_array['resetComplete'] = 'No';
            $data_array['resetToken'] = md5(rand().time());
            Database::get()->update('members', $data_array, "email", $this->email);
            $resetToken = $data_array['resetToken'];
            return $resetToken;
        }

        // 用 Token 組出重置信件並寄出
        function sendResetEmail($resetToken){
            $body = "<p>Someone requested that the password be reset.</p>
                     <p>If this was a mistake, just ignore this email and nothing will happen.</p>
                     <p>To reset your password, visit the following address: <a href='".BASE_URL."do_checkreset/$resetToken'>".BASE_URL."reset/$resetToken</a></p>";

            $mail = new Mail(MAIL_USERNAME, MAIL_PASSWORD);
            $mail->setFrom(MAIL_FROM, MAIL_FROMNAME);
            $mail->addAddress($this->email);
            $mail->subject("Password Reset");
            $mail->body($body);
            $mail->send();
        }

        // 重導向登入頁並顯示成功
        function redir2login(){
            $msg = new \Plasticbrain\FlashMessages\FlashMessages();
            $msg->success("請檢查您的收件箱是否有重置鏈接.");
            header('Location: '.BASE_URL.'login');
            exit;
        }
    }

?>