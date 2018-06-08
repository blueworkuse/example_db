
        <!-- 圖片 or 輪播 -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <!-- /.轮播（Carousel）指标 -->

            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img class="first-slide" src="<?=BASE_URL?>images/carousel/firstSlide.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-center">
                            <!-- 可打內容 -->
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="second-slide" src="<?=BASE_URL?>images/carousel/secondSlide.jpg" alt="Second slide">
                </div>

                <div class="carousel-item">
                    <img class="third-slide" src="<?=BASE_URL?>images/carousel/thirdSlide.jpg" alt="Third slide">
                </div>

                <div class="carousel-item">
                    <img class="fourth-slide" src="<?=BASE_URL?>images/carousel/fourthSlide.jpg" alt="Fourth slide">
                </div>

                <div class="carousel-item">
                    <img class="fifth-slide" src="<?=BASE_URL?>images/carousel/fifthSlide.jpg" alt="Fifth slide">
                </div>
            </div>
            <!-- /.轮播（Carousel）项目 -->

            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- /.轮播（Carousel）导航 -->

        </div>
        <!-- /.圖片 or 輪播 -->