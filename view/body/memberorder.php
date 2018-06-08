
            <!-- 麵包屑-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home">首頁</i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <i class="fa fa-user">
                            會員中心
                        </i>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="memberorder">
                            訂單查詢
                        </a>
                    </li>
                </ol>
            </nav>
            <!-- /.麵包屑-->

            <br>
            
            <!-- 內容 -->
            <div class="container">
                <?php 
                    if(count($result) == 0) {
                ?>
                        <div class="row alert alert-info" role="alert">
                            <div class="col-sm-10 col-lg-6 mx-auto pt-3 text-center">
                                <h2 class="py-md-3">尚未有訂購單資料，謝謝！</h2>
                            </div>
                        </div>
                <?php 
                    }
                ?>

                <?php
                    foreach ($result as $row) { 
                ?>
                        <div class="card">
                            <div class="card-header bg-success text-light">
                                <div class="row">
                                    <div class="text-left col-12 text-sm-left col-sm-12 text-md-left col-md-7 text-lg-left col-lg-7 mx-auto">
                                        訂單編號：<?=$row['orderID']?>
                                    </div>
                                    <div class="text-left col-12 text-sm-left col-sm-12 text-md-right col-md-5 text-lg-right col-lg-5 mx-auto">
                                        訂單日期：<?=$row['orderDate']?>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- 產品 -->
                                <?php 
                                    foreach ($row['detail'] as $rowDetail) { 
                                ?>
                                <div class="row">
                                    <div class="text-center col-12 col-sm-12 col-md-2 col-lg-2 mx-auto">    
                                        <img class="img-responsive" src="<?=BASE_URL?>images/<?=$rowDetail['imgPath']?>" alt="prewiew" width="120" height="80">
                                    </div>
                                    <div class="text-center col-12 text-sm-center col-sm-12 text-md-left col-md-5 text-lg-left col-lg-5 mx-auto">
                                        <h4 class="product-name">
                                            <strong>
                                                <?=$rowDetail['name']?>
                                            </strong>
                                        </h4>
                                        <h4>
                                            <small>
                                                <?=$rowDetail['description']?>
                                            </small>
                                        </h4>
                                    </div>
                                    <div class="text-center col-12 text-sm-center col-sm-12  text-md-right col-md-5 text-lg-right col-lg-5 max-auto row">
                                        <div class="text-left col-6 text-sm-left col-sm-6 text-md-right col-md-5 text-lg-right col-lg-5 max-auto">
                                            數量：<?=$rowDetail['num']?>
                                        </div>
                                        <div class="text-right col-6 text-sm-right col-sm-6 text-md-right col-md-7 text-lg-right col-lg-7 max-auto" style="padding-top: 5px">
                                            <h6>
                                                <strong>
                                                    NT$ <?=number_format($rowDetail['total'])?>
                                                </strong>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr>

                                <?php 
                                    }
                                ?>
                                <!-- /.產品 -->
                            </div>

                            <div class="card-footer">
                                <div class="pull-right" style="margin: 10px">
                                    <div class="pull-right" style="margin: 5px">
                                        <strong>
                                            總金額：
                                            NT$ <?=number_format($row['orderTotal'])?>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                    <?php
                        }
                    ?>
                </div>
            
                <hr class="featurette-heading">
            </div>
            <!-- /.內容 -->