<!-- Quality Service Section ---->
<?php $quality_pro_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div id="energy-rating-section" class="property-info qua_heading_title container" style="display: none">
	<h1 class="property-title"></h1>
	<div class="qua-separator"></div>
	<div class="address">
		<div class="property-photo">
			<img id="verified" src="/wp-content/themes/quality/images/verified.png"/>
			<img id="unverified" src="/wp-content/themes/quality/images/unverified.png"/>
			<img id="house" src="/wp-content/themes/quality/images/house.png"/>
		</div>
		<div class="icon-row">
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="window-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Window">Window</h3>
				<div class="details" id="window-details">
					All the windows within the house are wood-framed.
				</div>
			</div>
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-water-tank water-tank-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Water Tank">Water Tank</h3>
				<div class="details" id="water-tank-details">
					Active hot water system is contained within the house.
				</div>
			</div>
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-air-conditioner air-conditioner-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Air Conditioner">Air Conditioner</h3>
				<div class="details" id="air-conditioner-details">
					The house contains air conditioner in each bedroom.
				</div>
			</div>
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-skylight skylight-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Skylight">Skylight</h3>
				<div class="details" id="skylight-details">
					There is no skylight within the house.
				</div>
			</div>
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-solar-water-heating solar-water-heating-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Solar Water Heating">Solar Water Heating</h3>
				<div class="details" id="solar-water-heating-details">
					There is no solar water heating system within the house.
				</div>
			</div>
		</div>
		<div class="icon-row">
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-thermostats thermostats-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Thermostats">Thermostats</h3>
				<div class="details" id="thermostats-details">
					A thermostat is used to control the temperature within the house.
				</div>
			</div>
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-energy-saver-system energy-saver-system-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Energy Saver System">Energy Saver System</h3>
				<div class="details" id="energy-saver-system-details">
					The house uses solar electric system to saving the energy.
				</div>
			</div>
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-external-shading external-shading-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="External Shading">External Shading</h3>
				<div class="details" id="external-shading-details">
				</div>
			</div>
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-heater heater-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Heater">Heater</h3>
				<div class="details" id="heater-details">
					There is central heater system within the house.
				</div>
			</div>
			<div class="property-icon titanium-property-popup-container">
				<div class="hexagon-box-small">
					<span class="titanium-nather nathers-icon"></span>
				</div>
				<h3 class="titanium-popup-class" title="Certification">Certification</h3>
				<div class="details" id="nathers-details">
				</div>
			</div>
		</div>
	</div>
</div>
<div id="community-container" class="container qua_heading_title" style="display: none">
	<div class="row">
		 <div class="community qua_heading_title">
			 <h1 id="suburb-name"></h1>
			 <div class="qua-separator"></div>
		 </div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
			<div class="hexagon-box">
				<span class="hospital-icon"></span>
			</div>
			<h2 class="titanium-popup-class" id="hospital-head" title="Hospital">1 KM Hospitals</h2>
			<div data-my-position="center left" data-at-position="top right" class="details" id="hospital-details">
			</div>
		</div>
		<div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
			<div class="hexagon-box">
				<span class="GPO-icon"></span>
			</div>
			<h2 class="titanium-popup-class" id="gpo-head" title="General Post Office">GPO</h2>
			<div class="details" id="gpo-details">
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
			<div class="hexagon-box">
				<span class="school-icon"></span>
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
		<div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
			<div class="hexagon-box">
				<span class="crime-rate-icon"></span>
			</div>
			<h2 class="titanium-popup-class" id="crime-head"  title="Crime rate">Crime</h2>
			<div class="details" id="crime-details">
				<div id="crime-chart">

				</div>
			</div>

		</div>
		<div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
			<div class="hexagon-box">
				<span class="aged-care-icon"></span>
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
		<div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
			<div class="hexagon-box">
				<span class="health-care-icon"></span>
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
<!-- /Quality Service Section ---->