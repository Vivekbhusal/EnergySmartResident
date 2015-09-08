<!-- Quality Main Slider --->
<?php $quality_pro_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>


<!-- /Quality Main Slider --->
<div class="slider-input">
<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $current_options['home_feature']; ?>"></div>

<div class="flex-slider-center">
	<div class="input-group center-block search-suburb">
		<input type="text" class="form-control" placeholder="Please enter the house address... (eg. 9/30 Maroo street, Hughesdale, 3166)"/>
	</div>
</div>
</div>

<div class="carousel">
</div>