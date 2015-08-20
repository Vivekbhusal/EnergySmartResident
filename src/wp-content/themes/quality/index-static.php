<!-- Quality Main Slider --->
<?php $quality_pro_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>


<!-- /Quality Main Slider --->

<div class="carousel">

<?php 	if($current_options['home_feature']!=''){ ?>
	<img src="<?php echo $current_options['home_feature']; ?>"  alt="Quality" class="img-responsive" />
	<?php } ?>
	<div class="flex-slider-center">
		<div class="input-group center-block search-suburb">
			<input type="text" class="form-control" placeholder="Search this site"/>

		</div>
	</div>

</div>