<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();

if(!$user->isLoggedInuser()){
  Redirect::to('login.php');
}
?>
<?php require_once "header.php";  ?>

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						

						



						<!--  -->
					

						
					</div>
				</div>

				<div class="col-sm-6 col-md-4 col-lg-9 p-b-50">
					<!--  -->
	

					<!-- Product -->
					<div class="row">
						<span class="s-text18 w-size19 w-full-sm">
						Full name :
					</span>
					<span style="margin-right: 50px; margin-top: 10px;" class="m-text21 w-size20 w-full-sm">
						<?php echo $user->data()->fullname; ?>
					</span><br/><br/>

					<span class="s-text18 w-size19 w-full-sm">
						Email :
					</span>
					<span style="margin-right: 50px; margin-top: 10px;" class="m-text21 w-size20 w-full-sm">
						<?php echo $user->data()->email; ?>
					</span><br/><br/>
					<span class="s-text18 w-size19 w-full-sm">
						Phone Number :
					</span>
					<span style="margin-right: 50px; margin-top: 10px;" class="m-text21 w-size20 w-full-sm">
						<?php echo $user->data()->phone; ?>
					</span><br/><br/>
					<span class="s-text18 w-size19 w-full-sm">
						Address :
					</span>
					<span style="margin-right: 50px; margin-top: 10px;" class="m-text21 w-size20 w-full-sm">
						<?php echo $user->data()->address; ?>
					</span><br/><br/>

					<span style="margin-right: 50px; margin-top: 12px;" class="m-text21 w-size20 w-full-sm">
						<a href="editprofile.php">Edit Profile</a>
					</span>

					



					</div>

					<!-- Pagination -->
				
				</div>
			</div>
		</div>
	</section>



<?php  require_once "footer.php"; ?>