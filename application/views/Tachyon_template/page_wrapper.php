<section role="main" class="page-wrapper">
	
		<!-- Dashboard -->
		<?php include_once('page_wrapper/dashboard.php') ?>
		<!-- /Dashboard -->
	
		<div class="clearfix"></div> <!-- We're really sorry for this, but because of IE7 we still need separated div with clearfix -->
		
		<!-- Full width content box -->
		<?php include_once('page_wrapper/content_box.php') ?>
		<!-- /Full width content box -->
		<!-- benchmark testing -->
		<div style="color red">
			<?php //echo $this->benchmark->elapsed_time();?>
		</div>
</section>
	<!-- /Main Content -->