<?php
 	 get_header(); ?>
  <div class="page-seperator"></div>

<?php
$post = get_post();
$property = \titanium\TitaniumCommunityClass::getPropertyDetailsByPostID($post->ID);
$community = \titanium\TitaniumCommunityClass::getCommunityDetailsByPostID($post->ID);
?>


<div id="energy-rating-section" class="property-info qua_heading_title container">
  <h1 class="property-title"><?php echo $property['address']; ?></h1>
  <div class="qua-separator"></div>
  <div class="address">
    <div class="property-photo">
      <img id="verified" src="/wp-content/themes/quality/images/verified.png"/>
      <img id="unverified" src="/wp-content/themes/quality/images/unverified.png"/>
      <img id="house" src="<?php echo $property['house_img']; ?>"/>
    </div>
    <div class="icon-row">
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="window-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="Window">Window</h3>
        <div class="details" id="window-details">
         <?php echo $property['window']; ?>
        </div>
      </div>
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="water-tank-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="Water Tank">Water Tank</h3>
        <div class="details" id="water-tank-details">
          <?php echo $property['water_tank']['text']; ?>
        </div>
      </div>
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="air-conditioner-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="Air Conditioner">Air Conditioner</h3>
        <div class="details" id="air-conditioner-details">
          <?php echo $property['air_conditioner']['text']; ?>
        </div>
      </div>
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="skylight-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="Skylight">Skylight</h3>
        <div class="details" id="skylight-details">
          <?php echo $property['sky_light']['text']; ?>
        </div>
      </div>
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="solar-water-heating-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="Solar Water Heating">Solar Water Heating</h3>
        <div class="details" id="solar-water-heating-details">
          <?php echo $property['solar_water']['text']; ?>
        </div>
      </div>
    </div>
    <div class="icon-row">
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="thermostats-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="Thermostats">Thermostats</h3>
        <div class="details" id="thermostats-details">
          <?php echo $property['thermostat']['text']; ?>
        </div>
      </div>
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="energy-saver-system-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="Energy Saver System">Energy Saver System</h3>
        <div class="details" id="energy-saver-system-details">
          <?php echo $property['energy_saver']['text']; ?>
        </div>
      </div>
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="external-shading-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="External Shading">External Shading</h3>
        <div class="details" id="external-shading-details">
          <?php echo $property['shading']['text']; ?>
        </div>
      </div>
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <span class="heater-icon"></span>
        </div>
        <h3 class="titanium-popup-class" title="Heater">Heater</h3>
        <div class="details" id="heater-details">
          <?php echo $property['heater']['text']; ?>
        </div>
      </div>
      <div class="property-icon titanium-property-popup-container">
        <div class="hexagon-box-small">
          <?php if($property['nathers']['has']== '1') : ?>
            <a target="_blank" class='nather-file-attachment' href="<?php echo $property['nathers']['file'] ?>"><span class="nathers-icon"></span></a>
          <?php else: ?>
          <span class="nathers-icon"></span>
          <?php endif; ?>
        </div>
        <h3 class="titanium-popup-class" title="Certification">Certification</h3>
        <div class="details" id="nathers-details">

          <?php echo $property['nathers']['text']; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="community-container" class="container qua_heading_title">
  <div class="row">
    <div class="community qua_heading_title">
      <h1 id="suburb-name"><?php echo $community['suburb_info']->suburb_name  ?></h1>
      <div class="qua-separator"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
      <div class="hexagon-box">
        <span class="hospital-icon"></span>
      </div>
      <?php
        $emergencyHospital = array_filter($community['hospital'], function($hospital){
          return ($hospital->type == 'Emergency') ? true : false;
        });
      error_log(print_r($emergencyHospital, true));
      ?>
      <h2 class="titanium-popup-class" id="hospital-head" title="Hospital"><?php echo $emergencyHospital->distance ?> KM to Hospital</h2>
      <div data-my-position="center left" data-at-position="top right" class="details" id="hospital-details">
        <?php foreach($community['hospital'] as $hospital):  ?>
          <p>
            <b>Hospital Type: </b> <?php echo $hospital->type ?> <br/>
            <b>Name: </b> <?php echo $hospital->nearest_hospital ?> <br/>
            <b>Distance: </b> <?php echo $hospital->distance ?> <br/>
          </p>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
      <div class="hexagon-box">
        <span class="GPO-icon"></span>
      </div>
      <h2 class="titanium-popup-class" id="gpo-head" title="General Post Office"><?php echo $community['gpo']->distance ?>KM to GPO</h2>
      <div class="details" id="gpo-details">
        GPO is <?php echo $community['gpo']->distance ?> KM far from this suburb. According to Victoria Open Data it is approx. <?php echo $community['gpo']->travel_time ?>mins travel time.
      </div>
    </div>
    <div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
      <div class="hexagon-box">
        <span class="school-icon"></span>
      </div>
      <h2 class="titanium-popup-class"  id="school-head"  title="Schools"><?php echo $community['school']->total_schools; ?> Schools</h2>
      <div class="details" id="school-details">
        <p>
          <b>No. of Child Care : </b><span class="no-of-child-care"><?php echo $community['school']->childcare; ?></span><br/>
          <b>No. of Primary School : </b><span class="no-of-primary-school"><?php echo $community['school']->primary_school; ?></span><br/>
          <b>No. of Secondary School : </b><span class="no-of-secondary-school"><?php echo $community['school']->secondary_school; ?></span><br/>
          <b>No. of P12 Schools : </b><span class="no-of-p12-school"><?php echo $community['school']->p12_schools; ?></span><br/>
          <b>No. of Other Schools : </b><span class="no-of-other-school"><?php echo $community['school']->other_schools; ?></span><br/>
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
      <?php
      $totalAgeCare = intval($community['agecare']->high_care)
          +intval($community['agecare']->low_care)
          +intval($community['agecare']->srs);
      ?>
      <h2 class="titanium-popup-class" id="age-care-head" title="Aged Care"><?php echo $totalAgeCare ?> Aged Care</h2>
      <div class="details" id="age-care-details">
        <p>
          <b>No. of High Care : </b><span class="no-of-high-care"><?php echo $community['agecare']->high_care ?></span><br/>
          <b>No. of Low care : </b><span class="no-of-low-care"><?php echo $community['agecare']->low_care ?></span><br/>
          <b>No. of SRS : </b><span class="no-of-srs"><?php echo $community['agecare']->srs ?></span><br/>
        </p>
      </div>

    </div>
    <div class="col-md-3 col-sm-6 qua-service-area titanium-community-popup-container">
      <div class="hexagon-box">
        <span class="health-care-icon"></span>
      </div>
      <h2 class="titanium-popup-class" id="health-care-head"  title="Health Centers"><?php echo $community['healthCenters']->total_hospital ?> Health Centers</h2>
      <div class="details" id="health-care-details">
        <p>
          <b>No. of Pharmacies : </b><span class="no-of-pharmacies"><?php echo $community['healthCenters']->pharmacies ?></span><br/>
          <b>No. of Private Hospital : </b><span class="no-of-private-hospitals"><?php echo $community['healthCenters']->private_hospital ?></span><br/>
          <b>No. of Public Hospital : </b><span class="no-of-public-hospitals"><?php echo $community['healthCenters']->public_hospital ?></span><br/>
          <b>No. of Disability Health Centers : </b><span class="no-of-disable-centers"><?php echo $community['healthCenters']->disability ?></span><br/>
          <b>No. of Dental Centers : </b><span class="no-of-dental-centers"><?php echo $community['healthCenters']->dental ?></span><br/>
          <b>No. of Alternative Healths : </b><span class="no-of-alternative-centers"><?php echo $community['healthCenters']->alternative_health ?></span><br/>
          <b>No. of Community Health Centers : </b><span class="no-of-community-center"><?php echo $community['healthCenters']->communit_health_centers ?></span><br/>
          <b>No. of General Practitioners Centers : </b><span class="no-of-gp"><?php echo $community['healthCenters']->general_practice ?></span><br/>
          <b>No. of Alliled Health Centers : </b><span class="no-of-alliled"><?php echo $community['healthCenters']->alliled_health ?></span><br/>
        </p>
      </div>
    </div>
  </div>
</div>
<?php
  $crime = array(
      $community['crime']->crime_in_2012,
      $community['crime']->crime_in_2013,
      $community['crime']->crime_in_2014
  );
?>
?>

<script>
  var crimeRate = <?php echo json_encode($crime); ?>;
  new Chartist.Line('#crime-chart', {
    labels: [2012, 2013, 2014],
    series: [
      crimeRate
    ]
  }, {
    width: 200,
    height: 200
  });
</script>



<?php get_footer(); ?>