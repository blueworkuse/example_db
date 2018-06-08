
		</main>
		<!-- /.body 中間 -->

		<!-- body 表尾：頁尾社群、頁尾版權 -->
		<footer >
			<div class="container-fluid bg-primary py-3">
			    <div class="container">
			      	<div class="row">
			        	<div class="col-sm-12 col-md-12 col-lg-5 text-center">
	                		<div class="footer text-left">
	                			<p>
									<?=copyright()?>毛小孩股份有限公司
								</p>
								<ul class="list-inline">
									<li>
										<i class="fa fa-phone"></i>
										06 0000 000
									</li>
									<li>
										<i class="fa fa-envelope"></i> 
										<a href="mailto:blue.workuse@gmai.com"> blue.workuse@gmai.com</a>
									</li>
									<li>
										<i class="fa fa-map-marker"></i> 702 台南市南區
									</li>
									<li>
										<i class="fa fa-info-circle"></i> 週一~週五 上午9:00~下午6:00
									</li>
								</ul>
	                		</div>
	                		<br>
			            	<div class="bg-circle-outline d-inline-block" style="background-color:#3b5998">
			              		<a href="https://www.facebook.com/">
			              			<i class="fa fa-2x fa-fw fa-facebook text-white"></i>
								</a>
			            	</div>
			            	<div class="bg-circle-outline d-inline-block" style="background-color:#4099FF">
			              		<a href="https://twitter.com/">
			                		<i class="fa fa-2x fa-fw fa-twitter text-white"></i>
			                	</a>
			            	</div>
			            	<div class="bg-circle-outline d-inline-block" style="background-color:#0077B5">
			              		<a href="https://www.linkedin.com/company/">
			                		<i class="fa fa-2x fa-fw fa-linkedin text-white"></i>
			                	</a>
			            	</div>
			            	<div class="bg-circle-outline d-inline-block" style="background-color:#d34836">
			              		<a href="https://www.google.com/">
			                		<i class="fa fa-2x fa-fw fa-google text-white"></i>
			                	</a>
			            	</div>
			       		</div>

			       		<div class="col-sm-12 col-md-12 col-lg-2">
			       			<p></p>
			       		</div> 
				        
				        <div class="col-sm-12 col-md-12 col-lg-5 text-center">
				        	<br>
				        	<div class="d-inline-block">
				        		<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1836.4263585968256!2d120.18464146792645!3d22.992442838635473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5Y-w5Y2X5biC5a6J5bmz5Y2A5rC46I-v6Lev5q61NuiZnw!5e0!3m2!1szh-TW!2stw!4v1525797891729" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
				          	</div>
				          	<br>
				        </div>
				    </div>
			    </div>
		    </div>
		</footer>
		<!-- /.body 表尾：頁尾社群、頁尾版權 -->

		
		<!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="js/jquery.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.js" type="text/javascript"></script>
    
    
		<!-- Back To Top -->
		<a href="#">
			<img class="back-to-top-img" src="./images/backToTop.jpg" alt="BackToTop"> 
		</a>
		<script>
			jQuery(document).ready(function() {
				var offset = 220;
				var duration = 500;
				jQuery(window).scroll(function() {
					if (jQuery(this).scrollTop() > offset) {
						jQuery('.back-to-top-img').fadeIn(duration);
					} else {
						jQuery('.back-to-top-img').fadeOut(duration);
					}
				});

				jQuery('.back-to-top-img').click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
				})
			});
		</script>
		<!-- /.Back To Top -->

	</body>
</html>
