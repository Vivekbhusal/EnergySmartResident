<!-- Quality Service Section ---->
<?php $quality_pro_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div class="property-info qua_heading_title">
	<h1>22 Highland Ave, Clayton, VIC, 3168</h1>
	<div class="qua-separator"></div>
	<div class="address">
		<div class="property-photo">
				<img src="http://localhost:9005/wp-content/themes/quality/images/house.png"/>
			</div>
			<div class="icon-row">
					<div class="property-icon">
						<img src="http://localhost:9005/wp-content/themes/quality/images/window.png"/>
						<h3>Window</h3>
					</div>
					<div class="property-icon">
						<img src="http://localhost:9005/wp-content/themes/quality/images/water-tank.png"/>
						<h3>Water Tank</h3>
					</div>
					<div class="property-icon">
						<img src="http://localhost:9005/wp-content/themes/quality/images/air-conditioner.png"/>
						<h3>Air Conditioner</h3>
					</div>
					<div class="property-icon">
						<img src="http://localhost:9005/wp-content/themes/quality/images/skylight.png"/>
						<h3>Skylight</h3>
					</div>
			</div>
		<div class="icon-row">
			<div class="property-icon">
				<img src="http://localhost:9005/wp-content/themes/quality/images/thermostats.png"/>
				<h3>Thermostats</h3>
			</div>
			<div class="property-icon">
				<img src="http://localhost:9005/wp-content/themes/quality/images/energy-saver-system.png"/>
				<h3>Energy Saver System</h3>
			</div>
			<div class="property-icon">
				<img src="http://localhost:9005/wp-content/themes/quality/images/external-shading.png"/>
				<h3>External Shading</h3>
			</div>
			<div class="property-icon">
				<img src="http://localhost:9005/wp-content/themes/quality/images/nathers.png"/>
				<h3>Nathers</h3>
			</div>
		</div>
	</div>
</div>
<div class="container" style="display: none">
	<div class="row">
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="hospital-icon"/></a>
			</div>
			<h2 id="hospital-head" title="Hospital">1 KM Hospitals</h2>
			<div data-my-position="center left" data-at-position="top right" class="details" id="hospital-details">
			</div>
		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="GPO-icon"/></a>
			</div>
			<h2 id="gpo-head"  title="General Post Office">GPO</h2>
			<div class="details" id="gpo-details">
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="school-icon"/></a>
			</div>
			<h2 id="school-head"  title="Schools">School</h2>
			<div class="details" id="school-details">
				<p>
					<b>No. of Child Care : </b><span class="no-of-child-care"></span></br>
					<b>No. of Primary School : </b><span class="no-of-primary-school"></span></br>
					<b>No. of Secondary School : </b><span class="no-of-secondary-school"></span></br>
					<b>No. of P12 Schools : </b><span class="no-of-p12-school"></span></br>
					<b>No. of Other Schools : </b><span class="no-of-other-school"></span></br>
				</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="crime-rate-icon"/></a>
			</div>
			<h2 id="crime-head"  title="Crime rate">Crime</h2>
			<div class="details" id="crime-details">
				<div id="crime-chart">

				</div>
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="aged-care-icon"/></a>
			</div>
			<h2 id="age-care-head"  title="Aged Care">0 Aged Care</h2>
			<div class="details" id="age-care-details">
				<p>
					<b>No. of High Care : </b><span class="no-of-high-care"></span></br>
					<b>No. of Low care : </b><span class="no-of-low-care"></span></br>
					<b>No. of SRS : </b><span class="no-of-srs"></span></br>
				</p>
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="health-care-icon"/></a>
			</div>
			<h2 id="health-care-head"  title="Health Centers">Health Centers</h2>
			<div class="details" id="health-care-details">
				<p>
					<b>No. of Pharmacies : </b><span class="no-of-pharmacies"></span></br>
					<b>No. of Private Hospital : </b><span class="no-of-private-hospitals"></span></br>
					<b>No. of Public Hospital : </b><span class="no-of-public-hospitals"></span></br>
					<b>No. of Disability Health Centers : </b><span class="no-of-disable-centers"></span></br>
					<b>No. of Dental Centers : </b><span class="no-of-dental-centers"></span></br>
					<b>No. of Alternative Healths : </b><span class="no-of-alternative-centers"></span></br>
					<b>No. of Community Health Centers : </b><span class="no-of-community-center"></span></br>
					<b>No. of General Practitioners Centers : </b><span class="no-of-gp"></span></br>
					<b>No. of Alliled Health Centers : </b><span class="no-of-alliled"></span></br>
				</p>
			</div>
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
