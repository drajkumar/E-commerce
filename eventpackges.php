<?php 
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();

$service = $user->servicePackges('packs', 'category', 'eventmanagement');


?>
<?php require_once "header.php";  ?>


<div class="container bgwhite p-t-35 p-b-80">
	 <?php foreach ($service as $key => $value) : ?>
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="slick3">
							<div class="wrap-pic-w">
								<img src="uploads/<?php echo $service[$key]['picture'] ?>" alt="IMG-PRODUCT">
							</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $service[$key]['title'] ?>
				</h4>
				<span class="m-text17">
					<?php echo $service[$key]['new_rate'] ?>
				</span>

					<span class="block2-oldprice m-text7 p-r-5">
									  <?php 
										if($service[$key]['old_rate'] == 0){
				                            echo '';
										}else{
										echo 'Tk:'. $service[$key]['old_rate'];
										 } 

										 ?>
								</span>
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $service[$key]['description'] ?>
						</p>
					</div>
				</div>
			</div>
		</div>

   <hr/>

	<?php endforeach;  ?>
	</div>






<?php  require_once "footer.php"; ?>