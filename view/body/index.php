
			<?php 
				// 載入輪播
				include('view/header/header_img.php'); 
			?>

			<!-- 內容 -->
		    <div class="container-fluid">
		    	<?php 
        			foreach ($result as $row) { 
        		?>
        				<!--
		        		<div class="row img" style="background-image: url('<?=BASE_URL?>/images/<?=$row['imgPath']?>');">
		        			<-->
		        		<div row>
				            <div class="col">
				            	<a href="<?=$row['refUrl']?>" target="_blank">
                    				<img class="div-img-max" src="<?=BASE_URL?>images/<?=$row['imgPath']?>" alt=""> 
                    			</a>
                    		</div>
                    		<div class="col">
				                <h1 class="text-left">
				                    <?=$row['title']?>
				                </h1>
				                <h2 class="text-left">
				                	<a href="<?=$row['refUrl']?>" target="_blank">
				                		<?=$my_string_mutator->trim($row['content'])?>
				                    </a>
				                </h2>
				                <p class="text-right">
				                    <span class="glyphicon glyphicon-time"></span>
				                    發表於 <?=Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row['createDate'])->diffForHumans()?>
				                </p>
				            </div>
		        		</div>

                		<hr class="featurette-heading">
	            <?php 
	        		}
	        	?>
		    </div>
		    <!-- /.內容 -->
