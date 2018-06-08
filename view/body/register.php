
			<!-- 麵包屑-->
			<nav aria-label="breadcrumb">
			  	<ol class="breadcrumb">
				    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home">首頁</i>
                        </a>
				   	</li>
				    <li class="breadcrumb-item">
				    	<a href="register">註冊</a>
				   	</li>
			  	</ol>
			</nav>
			<!-- /.麵包屑-->

			<br>

			<!-- 內容 -->
			<div class="container">
				<div class="row">
				  	<div class="col-sm-10 col-lg-6 mx-auto pt-3">
				  		<h2>請註冊</h2>
				  		<div class="card mb-3">
			        		<div class="card-body">
			          			<p class="card-text">
									<form role="form" method="post" action="<?=BASE_URL?>do_register" autocomplete="off">
							
										<p>已經是會員? <a href='login'>登入</a></p>
										<hr>

										<?php 
											if ($msg->hasMessages()) $msg->display(); 
										?>

										<div class="form-group">
											<input type="text" name="username" id="username" class="form-control input-lg" placeholder="用戶名" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
											<small id="passwordHelpBlock" class="form-text text-muted">
  												您的用戶名長度必須為3-20個字符，包含字母和數字，且不得包含空格，特殊字符或表情符號。
											</small>
										</div>
							
										<div class="form-group">
											<input type="email" name="email" id="email" class="form-control input-lg" placeholder="電子郵件地址" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" tabindex="2">
										</div>

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="password" name="password" id="password" class="form-control input-lg" placeholder="密碼" tabindex="3">
												</div>
											</div>

											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="確認密碼" tabindex="4">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6 col-md-6">
												<input type="submit" name="submit" value="註冊" class="btn btn-primary btn-block btn-lg" tabindex="5">
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
