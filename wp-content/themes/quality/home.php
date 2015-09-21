<?php 
		if('page' == get_option('show_on_front')){ get_template_part('index');}
		else {
			get_header();
			$quality_pro_options=theme_data_setup();
			$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options );
			//****** get index static banner  ********
			get_template_part('index', 'static');

			/**Display Community Results **/
			get_template_part('index', 'communityResult');
			get_template_part('index', 'threeFeatures');
			get_template_part('index', 'aboutus');

//			get_template_part('index', 'team');

			get_template_part('index', 'blog');

			get_footer();
		}
?>