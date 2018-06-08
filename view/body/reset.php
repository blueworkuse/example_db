
			<!-- 麵包屑-->
			<nav aria-label="breadcrumb">
			  	<ol class="breadcrumb">
				    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home">首頁</i>
                        </a>
				   	</li>
				    <li class="breadcrumb-item">
				    	<a href="reset">重置密碼</a>
				   	</li>
			  	</ol>
			</nav>
			<!-- /.麵包屑-->

			<br>
			
			<!-- 內容 -->
			<div class="container">
				<div class="row">
				    <div class="col-sm-10 col-lg-6 mx-auto pt-3">
						<h2>重置密碼</h2>
						<div class="card mb-3">
			        		<div class="card-body">
			          			<p class="card-text">
									<form role="form" method="post" action="<?=BASE_URL?>do_reset" autocomplete="off">
										
										<hr>

										<?php 
											if ($msg->hasMessages()) $msg->display(); 
										?>

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="password" name="password" id="password" class="form-control input-lg" placeholder="新密碼" tabindex="1">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="確認新密碼" tabindex="2">
												</div>
											</div>
										</div>
										
										
										<div class="row">
											<div class="col-xs-6 col-md-6">
												<input type="hidden" name="resetToken" value="<?=$_SESSION['resetToken']?>">
												<input type="submit" name="submit" value="重置密碼" class="btn btn-primary btn-block btn-lg" tabindex="3">
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
			