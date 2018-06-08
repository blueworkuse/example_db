            
            <!-- 麵包屑-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home">首頁</i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="product">
                            <i class="fa fa-product-hunt">
                                相關產品
                            </i>
                        </a>
                    </li>
                </ol>
            </nav>
            <!-- /.麵包屑-->

            <br>

            <!-- 內容 -->
            <div class="container">
              	<div class="row">
                    <?php 
                        foreach ($result as $row) { 
                    ?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 portfolio-item mx-auto py-3">
                                <div class="card bg-light">
                                    <a href="<?=$row['refUrl']?>" target="_blank">
                                        <img class="card-img-top" src="<?=BASE_URL?>images/<?=$row['imgPath']?>" alt="">
                                    </a>

                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?=$row['name']?>
                                        </h5>

                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <span style="color:black" >
                                                <?=$row['description']?>
                                            </span>
                                        </h6>

                                        <p class="card-text">
                                            <span style="color:red" >
                                                價格：NT$ <?=number_format($row['price'])?>
                                            </span>
                                            <!--
                                            <br>
                                            <span style="color:green" >
                                                庫存量：<?=$row['storage']?>
                                            </span>
                                            -->
                                            <br>
                                            <a href="<?=$row['refUrl']?>" target="_blank">
                                                來源連結：日本樂天市場
                                            </a>
                                        </p>
                                        
                                        <div class="text-center" >
                                            <?php 
                                                if($row['storage'] > 0) {
                                            ?>
                                                    <button value="<?=BASE_URL?>do_addtocart/<?=$row['productID']?>/1" onclick="addToCart(this.value)" class="btn btn-primary btn-lg">
                                                        <i class="fa fa-shopping-cart">
                                                            加入購物車
                                                        </i>
                                                    </button>
                                            <?php 
                                                }else{
                                            ?>
                                                    <div class="btn btn-secondary btn-lg">
                                                        售完
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php 
                        }
                    ?>
                </div>

                <hr class="featurette-heading">

                <!-- 分頁 -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php 
                            if($productPage > 1) {
                                echo '<li class="page-item">';
                            }else{
                                echo '<li class="page-item disabled">';
                            }
                            echo '<a class="page-link" href="do_product/'.($productPage-1).'"><i class="fa fa-angle-double-left"></i></a></li>';
                            
                            if($productPage-5 >= 1) {
                                echo '<li class="page-item">
                                          <a class="page-link" href="do_product/'.($productPage-5).'">上五頁</a></li>';
                            }

                            if($productPageCount <= 5) {
                                $start = 1;
                                $end = $productPageCount;
                            } else {
                                if ($productPage-2 < 1) {
                                    $start = 1;
                                    $end = 5;
                                } else if ($productPage+2 > $productPageCount) {
                                    $start = $productPageCount-4;
                                    $end = $productPageCount;
                                } else {
                                    $start=$productPage-2;
                                    $end=$productPage+2;   
                                }
                            }

                            for($i=$start;$i<=$end;$i++) {
                                if($productPage != $i) {
                                    echo '<li class="page-item">';
                                }else{
                                    echo '<li class="page-item active">';
                                }
                                echo '<a class="page-link" href="do_product/'.$i.'">'.$i.'</a></li>';
                            } 

                            if($productPage+5 <= $productPageCount) {
                                echo '<li class="page-item">
                                          <a class="page-link" href="do_product/'.($productPage+5).'">下五頁</a></li>';
                            }

                            if($productPage < $productPageCount) {
                                echo '<li class="page-item">';
                            }else{
                                echo '<li class="page-item disabled">';
                            }
                            echo '<a class="page-link" href="do_product/'.($productPage+1).'"><i class="fa fa-angle-double-right"></i></a></li>';
                        ?>
                    </ul>
                </nav>
                <!-- /.分頁 -->
            </div>
            <!-- /.內容 -->

            <script>
                
                function addToCart(do_addToCart)
                {
                    $.ajax({
                        url: do_addToCart, 
                        success: function(result){
                            $("#cartNum").html(result);
                            //alert範例
                            swal("已加入購物車",
                            "",
                            "success");
                        }
                    });
                }
                
            </script>

