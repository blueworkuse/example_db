
			<!-- 麵包屑-->
			<nav aria-label="breadcrumb">
			  	<ol class="breadcrumb">
				    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home">首頁</i>
                        </a>
				   	</li>
				    <li class="breadcrumb-item">
				    	<a href="login">
							<i class="fa fa-sign-in">
                                登入
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
					<div class="col-sm-10 col-lg-6 mx-auto pt-3">
					  	<h2>請登入</h2>
					  	<div class="card mb-3">
				        	<div class="card-body">
				          		<p class="card-text">
						  			<form role="form" method="post" action="<?=BASE_URL?>do_login" autocomplete="off">
								
										<p><a href='<?=BASE_URL?>register'>註冊一個新帳戶</a></p>
										
										<hr>

										<?php 
											if ($msg->hasMessages()) $msg->display(); 
										?>

										<div class="form-group">
											<input type="text" name="username" id="username" class="form-control input-lg" placeholder="用戶名" value="<?php if($msg->hasErrors()){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
										</div>

										<div class="form-group">
											<input type="password" name="password" id="password" class="form-control input-lg" placeholder="密碼" tabindex="3">
										</div>
								
										<div class="row">
											<div class="col-xs-9 col-sm-9 col-md-9">
										 		<a href='<?=BASE_URL?>forget'>忘記密碼?</a>
											</div>
										</div>
								
										<hr>
								
										<div class="row">
											<div class="col-xs-6 col-md-6">
												<input type="submit" name="submit" value="登入" class="btn btn-primary btn-block btn-lg" tabindex="5">
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
