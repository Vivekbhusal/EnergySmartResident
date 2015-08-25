<!-- Quality Service Section ---->
<?php $quality_pro_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div id="community-container" class="container">
	<div class="row">
		<div class="qua_heading_title">
			<h1 id="suburb-name">Hughesdale</h1>
			<div class="qua-separator" id=""></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="hospital-icon"/></a>
			</div>
			<h2 id="hospital-head" title="Hospital">1 KM Hospitals</h2>
			<div class="details" id="hospital-details" style="display: none;">
				<p>
					<b>Hospital Type :</b>Public</br>
					<b>Name :</b>Monash Health Center</br>
					<b>Distance :</b>2 KM</br>
				</p>
				<p>
					<b>Hospital Type :</b>Emergency</br>
					<b>Name :</b>Monash Health Center</br>
					<b>Distance :</b>2 KM</br>
				</p>
				<p>
					<b>Hospital Type :</b>Maternatiy</br>
					<b>Name :</b>Monash Health Center</br>
					<b>Distance :</b>2 KM</br>
				</p>
			</div>


		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="GPO-icon"/></a>
			</div>
			<h2 id="gpo-head"  title="General Post Office">GPO</h2>
			<p id="gpo-details"></p>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="school-icon"/></a>
			</div>
			<h2 id="school-head"  title="Schools">School</h2>
			<p id="school-details"></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="crime-rate-icon"/></a>
			</div>
			<h2 id="crime-head"  title="Crime rate">Crime</h2>
			<div class="details" id="crime-details" style="display: none;">
				Do not ever give rent to Mingda,, he is not good and is holding to passport and criminal.
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="aged-care-icon"/></a>
			</div>
			<h2 id="age-care-head"  title="Aged Care">0 Aged Care</h2>
			<div class="details" id="age-care-details" style="display: none">
				<b>No of High Care :</b> 212</br>
				<b>No of Low Care :</b> 212</br>
				<b>No of SRS Care :</b> 212</br>
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area">
			<div class="hexagon-box">
				<a href=""><span class="health-care-icon"/></a>
			</div>
			<h2 id="health-care-head"  title="Health Centers">Health Centers</h2>
			<p id="health-care-details"></p>
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
