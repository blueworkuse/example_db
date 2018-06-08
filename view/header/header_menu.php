
        <!-- body 表頭：導覽列 -->
        <head>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="index">
                    <img class="logo-img" src="images/logo.jpg" alt="毛小孩" />
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index">
                                <i class="fa fa-home">
                                    首頁
                                </i>
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="do_product/1">
                                <i class="fa fa-product-hunt">
                                    相關產品
                                </i>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="cart">
                                <i class="fa fa-shopping-cart">
                                    購物車
                                    <span class="badge badge-light">
                                        <div id="cartNum">
                                            <?php echo $_SESSION["cartNum"]; ?>
                                        </div>
                                    </span>
                                </i>
                            </a>
                        </li>

                        <?php
                            if(!UserVeridator::isLogin(isset($_SESSION['memberID'])?$_SESSION['memberID']:'')){ 
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login">
                                        <i class="fa fa-sign-in">
                                            登入
                                        </i>
                                    </a>
                                </li>
                        <?php 
                            }else{
                        ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user">
                                            會員中心
                                        </i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                                        <a class="dropdown-item" href="memberorder">訂單查詢</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="do_logout">
                                        <i class="fa fa-sign-out">
                                            登出
                                        </i>
                                    </a>
                                </li>
                        <?php
                            } 
                        ?>
                    </ul>
                </div>
            </nav>
        </head>
        <!-- /.body 表頭：導覽列 -->
