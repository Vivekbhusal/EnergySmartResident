<?php
/**
 * Created by PhpStorm.
 * User: vivekbhusal
 * Date: 12/09/15
 * Time: 3:59 PM
 */
?>
<?php $quality_pro_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div class="website-features">
    <div class="website-feature-content">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/green-energy.png"/>
            <h4>Green Energy</h4>
        </div>
        <div class="website-feature-text">
            <p>
                We provide information about environmental friendly choices in houses and try to help users live in a greener life
            </p>
        </div>
    </div>
    <div class="website-feature-content">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/livable-community.png"/>
            <h4>Livable Community</h4>
        </div>
        <div class="website-feature-text">
            <p>
                Users can find out a community that is most suitable for them based on the broad community information provided by us
            </p>
        </div>
    </div>
    <div class="website-feature-content">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/energy-measurement.png"/>
            <h4>Energy Measurement</h4>
        </div>
        <div class="website-feature-text">
            <p>
                User can know the efficiency of different products in the house so that they can choose the proper one for reducing energy consumption
            </p>
        </div>
    </div>
</div>
<div class="container about-us">

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
