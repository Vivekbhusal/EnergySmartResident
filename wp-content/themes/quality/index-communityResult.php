<!-- Quality Service Section ---->
<?php $quality_pro_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div id="energy-rating-section" class="property-info qua_heading_title container" style="display: none">
	<h1>22 Highland Ave, Clayton, VIC, 3168</h1>
	<div class="qua-separator"></div>
	<div class="address">
		<div class="property-photo">
			<img id="house" src="/wp-content/themes/quality/images/house.png"/>
			<img id="verify" src="/wp-content/themes/quality/images/verified.png"/>
		</div>
		<div class="icon-row">
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="window-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Window">Window</h3>
				<div class="details" id="window-details">
					All the windows within the house are wood-framed.
				</div>
			</div>
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="water-tank-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Water Tank">Water Tank</h3>
				<div class="details" id="water-tank-details">
					Active hot water system is contained within the house.
				</div>
			</div>
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="air-conditioner-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Air Conditioner">Air Conditioner</h3>
				<div class="details" id="air-conditioner-details">
					The house contains air conditioner in each bedroom.
				</div>
			</div>
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="skylight-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Skylight">Skylight</h3>
				<div class="details" id="skylight-details">
					There is no skylight within the house.
				</div>
			</div>
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="solar-water-heating-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Solar Water Heating">Solar Water Heating</h3>
				<div class="details" id="solar-water-heating-details">
					There is no solar water heating system within the house.
				</div>
			</div>
		</div>
		<div class="icon-row">
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="thermostats-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Thermostats">Thermostats</h3>
				<div class="details" id="thermostats-details">
					A thermostat is used to control the temperature within the house.
				</div>
			</div>
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="energy-saver-system-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Energy Saver System">Energy Saver System</h3>
				<div class="details" id="energy-saver-system-details">
					The house uses solar electric system to saving the energy.
				</div>
			</div>
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="external-shading-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="External Shading">External Shading</h3>
				<div class="details" id="external-shading-details">
					<p>
						The house has <b>Evergreen Plants</b> for External Shading
					</p>
					<p>
						Shading can block up to 90% of solar heat which helps in increasing efficiency. Evergreen plants are recommended for hot humid and some hot dry climates to reduce unwanted glare and heat gain.
					</p>

				</div>
			</div>
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="heater-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Heater">Heater</h3>
				<div class="details" id="heater-details">
					There is central heater system within the house.
				</div>
			</div>
			<div class="property-icon titanium-popup-container">
				<div class="hexagon-box-small">
					<a href=""><span class="nathers-icon"></span></a>
				</div>
				<h3 class="titanium-popup-class" title="Nathers">Nathers</h3>
				<div class="details" id="nathers-details">
					He has certified the house from xyz company.
				</div>
			</div>
		</div>
	</div>
</div>
<div id="community-container" class="container qua_heading_title" style="display: none">
	<div class="row">
		 <div class="qua_heading_title">
			 <h1 id="suburb-name"></h1>
			 <div class="qua-separator"></div>
		 </div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 qua-service-area titanium-popup-container">
			<div class="hexagon-box">
				<a href=""><span class="hospital-icon"/></a>
			</div>
			<h2 class="titanium-popup-class" id="hospital-head" title="Hospital">1 KM Hospitals</h2>
			<div data-my-position="center left" data-at-position="top right" class="details" id="hospital-details">
			</div>
		</div>
		<div class="col-md-3 col-sm-6 qua-service-area titanium-popup-container">
			<div class="hexagon-box">
				<a href=""><span class="GPO-icon"/></a>
			</div>
			<h2 class="titanium-popup-class" id="gpo-head" title="General Post Office">GPO</h2>
			<div class="details" id="gpo-details">
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area titanium-popup-container">
			<div class="hexagon-box">
				<a href=""><span class="school-icon"/></a>
			</div>
			<h2 class="titanium-popup-class"  id="school-head"  title="Schools">School</h2>
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
		<div class="col-md-3 col-sm-6 qua-service-area titanium-popup-container">
			<div class="hexagon-box">
				<a href=""><span class="crime-rate-icon"/></a>
			</div>
			<h2 class="titanium-popup-class" id="crime-head"  title="Crime rate">Crime</h2>
			<div class="details" id="crime-details">
				<div id="crime-chart">

				</div>
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area titanium-popup-container">
			<div class="hexagon-box">
				<a href=""><span class="aged-care-icon"/></a>
			</div>
			<h2 class="titanium-popup-class" id="age-care-head" title="Aged Care">0 Aged Care</h2>
			<div class="details" id="age-care-details">
				<p>
					<b>No. of High Care : </b><span class="no-of-high-care"></span></br>
					<b>No. of Low care : </b><span class="no-of-low-care"></span></br>
					<b>No. of SRS : </b><span class="no-of-srs"></span></br>
				</p>
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area titanium-popup-container">
			<div class="hexagon-box">
				<a href=""><span class="health-care-icon"/></a>
			</div>
			<h2 class="titanium-popup-class" id="health-care-head"  title="Health Centers">Health Centers</h2>
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