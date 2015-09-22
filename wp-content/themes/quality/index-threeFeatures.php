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
        <a href="/green-energy">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/green-energy.png">
            <h4>Green Energy</h4>
        </div>
        <div class="website-feature-text">
            <p class="website-feature-p">
                Choose your green energy house and save your expenses
            </p>
        </div>
    </div>
    <div class="website-feature-content">
        <a href="/liveable-community">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/livable-community.png">
            <h4>Livable Community</h4>
        </div>
        <div class="website-feature-text">
            <p class="website-feature-p">
                Check whether the community is suitable or livable with your standards.
            </p>
        </div>
    </div>
    <div class="website-feature-content">
        <a href="/energy-measurement">
        <div class="website-feature-title">
            <img class="website-feature-title-img" src="/wp-content/themes/quality/images/energy-measurement.png">
            <h4>Energy Measurement</h4>
        </div>
        <div class="website-feature-text">
            <p class="website-feature-p">
                Check the energy factors of resident and make an informed decision.
            </p>
        </div>
    </div>
</div>