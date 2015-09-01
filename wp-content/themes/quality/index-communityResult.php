<!-- Quality Service Section ---->
<?php $quality_pro_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div class="property-info qua_heading_title">
	<h1>22 Highland Ave, Clayton, VIC, 3168</h1>
	<div class="qua-separator"></div>
	<div class="address">
		<div class="property-photo">
				<img src="http://localhost:8888/wp-content/themes/quality/images/house.png"/>
			</div>
			<div class="icon-row">
					<div class="property-icon">
						<img src="http://localhost:8888/wp-content/themes/quality/images/window.png"/>
						<h3>Window</h3>
					</div>
					<div class="property-icon">
						<img src="http://localhost:8888/wp-content/themes/quality/images/water-tank.png"/>
						<h3>Water Tank</h3>
					</div>
					<div class="property-icon">
						<img src="http://localhost:8888/wp-content/themes/quality/images/air-conditioner.png"/>
						<h3>Air Conditioner</h3>
					</div>
					<div class="property-icon">
						<img src="http://localhost:8888/wp-content/themes/quality/images/skylight.png"/>
						<h3>Skylight</h3>
					</div>
			</div>
		<div class="icon-row">
			<div class="property-icon">
				<img src="http://localhost:8888/wp-content/themes/quality/images/thermostats.png"/>
				<h3>Thermostats</h3>
			</div>
			<div class="property-icon">
				<img src="http://localhost:8888/wp-content/themes/quality/images/energy-saver-system.png"/>
				<h3>Energy Saver System</h3>
			</div>
			<div class="property-icon">
				<img src="http://localhost:8888/wp-content/themes/quality/images/external-shading.png"/>
				<h3>External Shading</h3>
			</div>
			<div class="property-icon">
				<img src="http://localhost:8888/wp-content/themes/quality/images/nathers.png"/>
				<h3>Nathers</h3>
			</div>
		</div>
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
