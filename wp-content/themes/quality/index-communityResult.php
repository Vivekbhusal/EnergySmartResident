<!-- Quality Service Section ---->
<?php $quality_pro_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div class="property-info qua_heading_title">
	<h1>22 Highland Ave, Clayton, VIC, 3168</h1>
	<div class="qua-separator" id=""></div>
	<div class="address">
		<img src="http://localhost:8888/wp-content/themes/quality/images/house.jpg"/>
		<p>
			<img src="http://localhost:8888/wp-content/themes/quality/images/window.png"/>
			<img src="http://localhost:8888/wp-content/themes/quality/images/water-tank.png"/>
			<img src="http://localhost:8888/wp-content/themes/quality/images/air-conditioner.png"/>
		</p>
	</div>
</div>
<div class="container" style="display: none">
	<div class="row">
		<div class="col-md-3 col-sm-6 qua-service-area">
			<?php if($current_options['service_two_icon']) { ?>
				<div class="hexagon-box">
					<a href=""><span class="hospital-icon"/></a>
				</div>
			<?php } ?>
			<?php if($current_options['service_two_title']) { ?>
				<h2><?php echo $current_options['service_two_title']; ?></h2>
			<?php } ?>
			<?php if($current_options['service_two_text']) { ?>
				<p><?php echo $current_options['service_two_text'];?></p>
			<?php } ?>
		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<?php if($current_options['service_three_icon']) { ?>
				<div class="hexagon-box">
					<a href=""><span class="GPO-icon"/></a>
				</div>
			<?php } ?>
			<?php if($current_options['service_three_title']) { ?>
				<h2><?php echo $current_options['service_three_title']; ?></h2>
			<?php } ?>
			<?php if($current_options['service_three_text']) { ?>
				<p><?php echo $current_options['service_three_text'];?></p>
			<?php } ?>
		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<?php if($current_options['service_four_icon']) { ?>
				<div class="hexagon-box">
					<a href=""><span class="school-icon"/></a>
				</div>
			<?php } ?>
			<?php if($current_options['service_four_title']) { ?>
				<h2><?php echo $current_options['service_four_title']; ?></h2>
			<?php } ?>
			<?php if($current_options['service_four_text']) { ?>
				<p><?php echo $current_options['service_four_text'];?></p>
			<?php } ?>
		</div>

	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 qua-service-area">
			<?php if($current_options['service_two_icon']) { ?>
				<div class="hexagon-box">
					<a href=""><span class="crime-rate-icon"/></i></a>
				</div>
			<?php } ?>
			<?php if($current_options['service_two_title']) { ?>
				<h2><?php echo $current_options['service_two_title']; ?></h2>
			<?php } ?>
			<?php if($current_options['service_two_text']) { ?>
				<p><?php echo $current_options['service_two_text'];?></p>
			<?php } ?>
		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<?php if($current_options['service_three_icon']) { ?>
				<div class="hexagon-box">
					<a href=""><span class="aged-care-icon"/></i></a>
				</div>
			<?php } ?>
			<?php if($current_options['service_three_title']) { ?>
				<h2><?php echo $current_options['service_three_title']; ?></h2>
			<?php } ?>
			<?php if($current_options['service_three_text']) { ?>
				<p><?php echo $current_options['service_three_text'];?></p>
			<?php } ?>
		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<?php if($current_options['service_four_icon']) { ?>
				<div class="hexagon-box">
					<a href=""><span class="health-care-icon"/></a>
				</div>
			<?php } ?>
			<?php if($current_options['service_four_title']) { ?>
				<h2><?php echo $current_options['service_four_title']; ?></h2>
			<?php } ?>
			<?php if($current_options['service_four_text']) { ?>
				<p><?php echo $current_options['service_four_text'];?></p>
			<?php } ?>
		</div>

	</div>
</div>
<div class="container">

	<div class="row">
		<div class="qua_heading_title">
			<?php if($current_options['service_title']) { ?>
				<h1><?php echo $current_options['service_title']; ?></h1>
				<div class="qua-separator" id=""></div>
			<?php } ?>

			<?php if($current_options['service_description']) { ?>
				<p><?php echo $current_options['service_description']; ?></p>
			<?php } ?>
		</div>
	</div>

</div>
<!-- /Quality Service Section ---->
