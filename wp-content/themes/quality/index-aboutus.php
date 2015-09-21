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
<?php $args = array(
    'posts_per_page'   => 3,
    'offset'           => 0,
    'category'         => '',
    'category_name'    => '',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'house',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'	   => '',
    'post_status'      => 'publish',
    'suppress_filters' => true
);
$posts_array = get_posts( $args );
?>
<div id="latest">
    <?php foreach($posts_array as $house): ?>
        <?php
        $permalink = get_post_permalink($house->ID);
        $property = \titanium\TitaniumCommunityClass::getPropertyDetailsByPostID($house->ID);
        ?>
        <div class="col-md-4 col-sm-6 latest-property">
            <a href="<?php echo $permalink; ?>" class="latest-property-item-link">
                <div class="latest-property-info">
                    <span class="latest-property-address"><?php echo $property['address']; ?></span>
                    <div class="latest-property-row">
                        <?php
                        $airConditionClass = ($property['air_conditioner']['has']=='0')
                            ? 'latest-property-air-conditioner-icon-grey'
                            : 'latest-property-air-conditioner-icon';
                        $heaterClass = ($property['heater']['has']=='0')
                            ? 'latest-property-heater-icon-grey'
                            : 'latest-property-heater-icon';
                        $waterTankClass = ($property['water_tank']['has']=='0')
                            ? 'latest-property-water-tank-icon-grey'
                            : 'latest-property-water-tank-icon';
                        $certificationClass = ($property['nathers']['has']== '1')
                            ? 'latest-property-certification-icon'
                            : 'latest-property-certification-icon-grey';
                        ?>
                        <span class="latest-property-row-item <?php echo $airConditionClass; ?>"></span>
                        <span class="latest-property-row-item <?php echo $heaterClass; ?>"></span>
                        <span class="latest-property-row-item <?php echo $waterTankClass; ?>" ></span>
                        <span class="latest-property-row-item <?php echo $certificationClass; ?>"></span>
                    </div>
                </div>
            </a>
            <img class="latest-house" src="<?php echo $property['house_img']; ?>">
        </div>
    <?php endforeach; ?>
</div>

