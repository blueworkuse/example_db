<?php

    /**
     * 頁面
     * 忘記密碼
     * http://localhost/example_db/forget
     */

    // if logged in redirect to members page
    if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
        header('Location: home'); 
        exit();
    }
    
    //define page title
    $title = 'Forget';

    // 顯示忘記密碼頁面
    include('view/header/header.php');
    include('view/body/forget.php');
    include('view/footer/footer.php');

?>