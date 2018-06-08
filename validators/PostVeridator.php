<?php 

    class PostVeridator {

        public function isValidEmail( $email )
        {
            $data_array['email'] = $email;

            // 接收表單傳來的資料
            $gump = new GUMP();
            $data_array = $gump->sanitize($data_array); 

            // 驗證資料合法性
            $validation_rules_array = array(
                'email' => 'required|valid_email'
            );
            $gump->validation_rules($validation_rules_array);
            
            $filter_rules_array = array(
                'email' => 'trim|sanitize_email'
            );
            $gump->filter_rules($filter_rules_array);
            $validated_data = $gump->run($data_array);
            
            // 判斷驗證結果
            if($validated_data === false) {
                // 驗證失敗
                $error = $gump->get_readable_errors(false);
                $msg = new \Plasticbrain\FlashMessages\FlashMessages();
                foreach( $error as $e) {
                    $msg->error($e);
                }
                return false;
            } else {
                // 驗證成功
                return true;
            }
        }  
    }

?>