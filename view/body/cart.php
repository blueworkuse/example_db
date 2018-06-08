    
            <!-- 麵包屑-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home">首頁</i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="cart">
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
                </ol>
            </nav>
            <!-- /.麵包屑-->

            <br>
            
            <!-- 內容 -->
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <?php 
                            if ($msg->hasMessages()) $msg->display(); 
                        ?>
                    </div>
                </div>
                <div class="card shopping-cart">
                    <div class="card-header bg-dark text-light">
                        <i class="fa fa-shopping-cart" aria-hidden="true">
                            購物車
                        </i>
                        <a href="product" class="btn btn-outline-info btn-sm pull-right">
                            繼續購物
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <!-- 產品 -->
                        <?php 
                            foreach ($result as $row) { 
                        ?>
                                <div class="row">
                                    <div class="text-center col-12 col-sm-12 col-md-2 col-lg-2 mx-auto">    
                                        <img class="img-responsive" src="<?=BASE_URL?>images/<?=$row['imgPath']?>" alt="prewiew" width="120" height="80">
                                    </div>
                                    <div class="text-center col-12 text-sm-center col-sm-12 text-md-left col-md-5 text-lg-left col-lg-5 mx-auto">
                                        <h4 class="product-name">
                                            <strong>
                                                <?=$row['name']?>
                                            </strong>
                                        </h4>
                                        <h4>
                                            <small>
                                                <?=$row['description']?>
                                            </small>
                                        </h4>
                                    </div>
                                    <div class="text-center col-12 text-sm-center col-sm-12  text-md-right col-md-5 text-lg-right col-lg-5 max-auto row">
                                        <div class="text-center col-5 text-sm-center col-sm-5 text-md-center col-md-6 text-lg-right col-lg-6 max-auto" style="padding-top: 5px">
                                            <h6>
                                                <strong>
                                                    NT$ <?=number_format($row['price'])?>
                                                    <span class="text-muted">
                                                        x
                                                    </span>
                                                </strong>
                                            </h6>
                                        </div>
                                        <div class="text-center col-5 text-sm-center col-sm-5 text-md-center col-md-4 text-lg-right col-lg-4 max-auto">
                                            <div class="quantity">
                                                <input type="number" step="1" max="99" min="1" value="<?=$row['qty']?>" title="Qty" class="qty" size="4"
                                                id="num_<?=$row['seq']?>" onchange="updateCart(<?=$row['seq']?>)" >
                                            </div>
                                        </div>
                                        <div class="text-center col-2 text-sm-center col-sm-2 text-md-center col-md-2 text-md-right col-lg-2 max-auto">
                                            <a href="<?=BASE_URL?>do_delcart/<?=$row['productID']?>" class="btn btn-outline-danger btn-xs">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <input type="hidden" value="<?=BASE_URL?>do_updatecart/<?=$row['productID']?>" id="productID_<?=$row['seq']?>">
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
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#exampleModalCenter">
                                結帳去
                            </button>
                            <div class="pull-right" style="margin: 5px">
                                <strong>
                                    總金額：
                                    <label id="total">
                                        NT$ <?=$total?>
                                    </label>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            
                <hr class="featurette-heading">
            </div>
            <!-- /.內容 -->

            <!-- 互動視窗 -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">提醒您~</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>目前結帳是連結到 「ECPay」 測試環境</p>
                            <p>測試信用卡號為 「4311-9522-2222-2222」</p>
                            <p>測試信用卡期限為 「當月/當年」</p>
                            <p>測試信用卡未三碼為 「222」</p>
                            <p>手機請輸入能收到 「簡訊」 的正確的號碼</p>
                            <p>請勿輸入自己的 「信用卡號」</p>
                            <p>如不放心，請選擇 「close」 結束交易</p>
                            <p>謝謝~</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="do_checkout" class="btn btn-success pull-right">
                                結帳去
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.互動視窗 -->

            <!-- js -->
            <script>

                function updateCart(seq)
                {
                    do_updateCart = document.getElementById("productID_"+seq).value;
                    qty = document.getElementById("num_"+seq).value;
                    $.ajax({
                        url: do_updateCart+"/"+qty, 
                        success: function(result){
                            document.getElementById("total").innerHTML = "NT$ " + result;
                        }
                    });
                }

            </script>
            <!-- /.js -->
            