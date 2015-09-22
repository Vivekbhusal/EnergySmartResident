<?php
/**
 * Created by PhpStorm.
 * User: Rachel
 * Date: 21/09/15
 * Time: 21:24
 */
?>
<?php $quality_pro_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div class="website-features">
    <div class="website-feature-content">
        <a href="/?page_id=449">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/green-energy.png">
            <h4>Green Energy</h4>
        </div>
        <div class="website-feature-text">
            <p class="website-feature-p">
                We provide information about environmental friendly choices in houses and try to help users live in a greener life
            </p>
        </div>
    </div>
    <div class="website-feature-content">
        <a href="/?page_id=452">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/livable-community.png">
            <h4>Livable Community</h4>
        </div>
        <div class="website-feature-text">
            <p class="website-feature-p">
                Users can find out a community that is most suitable for them based on the broad community information provided by us
            </p>
        </div>
    </div>
    <div class="website-feature-content">
        <a href="/?page_id=455">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/energy-measurement.png">
            <h4>Energy Measurement</h4>
        </div>
        <div class="website-feature-text">
            <p class="website-feature-p">
                User can know the efficiency of different products in the house so that they can choose the proper one for reducing energy consumption
            </p>
        </div>
    </div>
</div>