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
