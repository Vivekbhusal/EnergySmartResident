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
<div class="latest" style="display: block">
<!--    <div class="row">-->
        <div class="col-md-4 col-sm-6 latest-property">
            <a href="#" class="latest-property-item-link">
                <div class="latest-property-info">
                    <span class="latest-property-address">144 Wells Ave. South Melbourne, 3205</span>
                    <div class="latest-property-row">
                        <span class="latest-property-row-item latest-property-air-conditioner-icon"></span>
                        <span class="latest-property-row-item latest-property-heater-icon"></span>
                        <span class="latest-property-row-item latest-property-water-tank-icon" ></span>
                        <span class="latest-property-row-item latest-property-certification-icon"></span>
                    </div>
                </div>
            </a>
            <img class="latest-house" src="http://localhost:8888/wp-content/uploads/2015/09/64-marshal-ave.jpg">
        </div>
        <div class="col-md-4 col-sm-6 latest-property">
            <a href="#" class="latest-property-item-link">
                <div class="latest-property-info">
                <span class="latest-property-address">144 Wells Ave. South Melbourne, 3205</span>
                <div class="latest-property-row">
                    <span class="latest-property-row-item latest-property-air-conditioner-icon"></span>
                    <span class="latest-property-row-item latest-property-heater-icon"></span>
                    <span class="latest-property-row-item latest-property-water-tank-icon"></span>
                    <span class="latest-property-row-item latest-property-certification-icon"></span>
                </div>
                    </div>
            </a>
            <img class="latest-house" src="http://localhost:8888/wp-content/uploads/2015/09/64-marshal-ave.jpg">
        </div>
        <div class="col-md-4 col-sm-6 latest-property">
            <a href="#" class="latest-property-item-link">
                <div class="latest-property-info">
                <span class="latest-property-address">144 Wells Ave. South Melbourne, 3205</span>
                <div class="latest-property-row">
                    <span class="latest-property-row-item latest-property-air-conditioner-icon"></span>
                    <span class="latest-property-row-item latest-property-heater-icon"></span>
                    <span class="latest-property-row-item latest-property-water-tank-icon"></span>
                    <span class="latest-property-row-item latest-property-certification-icon"></span>
                </div>
                    </div>
            </a>
            <img class="latest-house" src="http://localhost:8888/wp-content/uploads/2015/09/64-marshal-ave.jpg">
        </div>
<!--    </div>-->
</div>
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
