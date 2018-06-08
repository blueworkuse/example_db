			
			<!-- 麵包屑-->
			<nav aria-label="breadcrumb">
			  	<ol class="breadcrumb">
				    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home">首頁</i>
                        </a>
				   	</li>
				    <li class="breadcrumb-item">
				    	<a href="forget">忘記密碼</a>
				   	</li>
			  	</ol>
			</nav>
			<!-- /.麵包屑-->

			<br>
			
			<!-- 內容 -->
			<div class="container">
				<div class="row">
				  	<div class="col-sm-10 col-lg-6 mx-auto pt-3">
				  		<h2>忘記密碼</h2>
				  		<div class="card mb-3">
						  	<div class="card-body">
			          			<p class="card-text">
									<form role="form" method="post" action="<?=BASE_URL?>do_forget" autocomplete="off">
										<p><a href='login'>回到登入頁面</a></p>

										<hr>

										<?php 
											if ($msg->hasMessages()) $msg->display(); 
										?>

										<div class="form-group">
											<input type="email" name="email" id="email" class="form-control input-lg" placeholder="電子郵件地址" value="" tabindex="1">
										</div>

										<hr>

										<div class="row">
											<div class="col-xs-6 col-md-6">
												<input type="submit" name="submit" value="發送驗證碼" class="btn btn-primary btn-block btn-lg" tabindex="2">
											</div>
										</div>
									</form>
								</p>
							</div>
						</div>
					</div>
				</div>

				<hr class="featurette-heading">
			</div>
			<!-- /.內容 -->
