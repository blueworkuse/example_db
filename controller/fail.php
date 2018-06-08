<?php

    /**
     * 頁面
     * 失敗
     * http://localhost/example_db/fail
     */

    if(!UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
        header('Location: '.BASE_URL);
        exit;
    }

    //define page title
    $title = 'Fail';

    // 顯示失敗頁面
    include('view/header/header.php');
    include('view/body/fail.php');
    include('view/footer/footer.php');

?>