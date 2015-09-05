<?php 

function login_page_designer_featured_plugins(){
		$plugins_array=array(
			'wp-recent-tweets-widget'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/wp-recent-tweets-widget.png',
						'site_url'		=>	'https://wordpress.org/plugins/wp-recent-tweets-widget/',
						'title'			=>	'Recent Tweets Widget',
						'description'	=>	'Easy to add twitter recent tweets on your WordPress site by using the Recent Tweets Widget plugin.'
						),
			'wpchandra-fb-like-box-widgets'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/fb-like-box-widgets.png',
						'site_url'		=>	'https://wordpress.org/plugins/wpchandra-fb-like-box-widgets/',
						'title'			=>	'Facebook Like Box Widget',
						'description'	=>	'Using Facebook like box widget easy and quick in your blog. This Plugin support you to customize facebook like box in easy way.'
						),
						
			'wpchandra-google-plus-widget'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/wpchandra-google-plus-widget.png',
						'site_url'		=>	'https://wordpress.org/plugins/wp-google-plus-badge-widget/',
						'title'			=>	'Google+ Badge Widget',
						'description'	=>	'Our Google+ badge widget plugin will help you to display Google+ badge widget on your wordpress wesite, just add google+ badge widget to your sidebar and use it. '
						),
			
			'wp-awesome-recent-posts-widget'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/wp-awesome-recent-posts-widget.png',
						'site_url'		=>	'https://wordpress.org/plugins/wp-awesome-recent-posts-widget/',
						'title'			=>	'WP Awesome Recent Posts Widget',
						'description'	=>	'WP Awesome Recent posts widget plugin provides easy way to show recent posts from your blog.'
						),
			'wpchandra-awesome-custom-scrollbar'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/awesome-custom-scrollbar.png',
						'site_url'		=>	'https://wordpress.org/plugins/wpchandra-awesome-custom-scrollbar/',
						'title'			=>	'Awesome Custom Scrollbar',
						'description'	=>	'WPChandra Awesome Custom Scrollbar is a jQuery custom scrollbar for your wordpress website. This plugin will enable awesome custom scrollbar.'
						),
			'wpchandra-floating-facebook-like-box'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/floating-facebook-like-box.png',
						'site_url'		=>	'https://wordpress.org/plugins/wpchandra-floating-facebook-like-box/',
						'title'			=>	'Floating Facebook Like Box',
						'description'	=>	'WPChandra Floating Facebook like box for wordpress is plugin that allow you to customize facebook like box with animation easily.'
						),
			'disable-all-updates-notifications'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/disable-all-updates-notifications.png',
						'site_url'		=>	'https://wordpress.org/plugins/disable-all-updates-notifications/',
						'title'			=>	'Disable All Updates & Notifications',
						'description'	=>	'Easy way to disables all wordpress, themes, plugins, core updates & notifications in wordpress.'
						),
            'wp-header-cleaner'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/wp-header-cleaner.png',
						'site_url'		=>	'https://wordpress.org/plugins/wp-header-cleaner/',
						'title'			=>	'WP Header Cleaner',
						'description'	=>	'Easy way to clean unwanted links from header & footer.'
						),
            'wpchandra-responsive-full-background-image'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/responsive-full-background-image.png',
						'site_url'		=>	'https://wordpress.org/plugins/wpchandra-responsive-full-background-image/',
						'title'			=>	'Responsive Background Image',
						'description'	=>	'Easy way to add fixed responsive background image to your blog & website. This plugin helps you to easy to add responsive background image.'
						),
            'wp-live-comments-validation'=>array(
						'image_url'		=>	wlpd_plugin_url.'images/featured_plugins/wp-live-comments-validation.png',
						'site_url'		=>	'https://wordpress.org/plugins/wp-live-comments-validation/',
						'title'			=>	'WP Live Comments Validation',
						'description'	=>	'Using WP Live Comments Validation plugin to validate comments form using jquery validation. This plugin allow you to easy way to validate comment form'
						),						
			
		);
		?>
        <style>
         .featured_plugin_main{
			 background-color: #ffffff;
			 border: 1px solid #dedede;
			 box-sizing: border-box;
			 float:left;
			 margin-right:20px;
			 margin-bottom:20px;
			 
			 width:450px;
		 }
		.featured_plugin_image{
			padding: 15px;
			display: inline-block;
			float:left;
			width:128px;
			height:128px;
		}
		.featured_plugin_image a{
		  display: inline-block;
		}
		.featured_plugin_information{			
			float: left;
			width: auto;
			max-width: 282px;

		}
		.featured_plugin_title{
			color: #0073aa;
			font-size: 18px;
			display: inline-block;
		}
		.featured_plugin_title a{
			text-decoration:none;
					
		}
		.featured_plugin_title h4{
			margin:0px;
			margin-top: 20px;
			margin-bottom:8px;			  
		}
		.featured_plugin_description{
			display: inline-block;
		}
        
        </style>
        <script>
		
        jQuery(window).resize(wpchandra_feature_resize);
		jQuery(document).ready(function(e) {
            wpchandra_feature_resize();
        });
		
		function wpchandra_feature_resize(){
			var wpchandra_width=jQuery('.featured_plugin_main').eq(0).parent().width();
			var count_of_elements=Math.max(parseInt(wpchandra_width/450),1);
			var width_of_plugin=((wpchandra_width-count_of_elements*24-2)/count_of_elements);
			jQuery('.featured_plugin_main').width(width_of_plugin);
			jQuery('.featured_plugin_information').css('max-width',(width_of_plugin-160)+'px');
		}
       	</script>
		<br>
        	<h1><?php _e('Login Page Designer » Featured Plugins','wpchandra'); ?><br></h1>
            <br>
            
            <?php foreach($plugins_array as $key=>$plugin) { ?>
            <div class="featured_plugin_main">
            	<span class="featured_plugin_image"><a target="_blank" href="<?php echo $plugin['site_url'] ?>"><img width="128px" height="128px" src="<?php echo $plugin['image_url'] ?>"></a></span>
                <span class="featured_plugin_information">
                	<span class="featured_plugin_title"><h4><a target="_blank" href="<?php echo $plugin['site_url'] ?>"><?php echo $plugin['title'] ?></a></h4></span>
                    <span class="featured_plugin_description"><?php echo $plugin['description'] ?></span>
                </span>
                <div style="clear:both"></div>                
            </div>
            <?php } 
	}