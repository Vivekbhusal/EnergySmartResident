<?php
/**
 * The Header template file
 */
$gardenia_options = get_option('gardenia_theme_options');
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if (!empty($gardenia_options['favicon'])) { ?>
		<link rel="shortcut icon" href="<?php echo esc_url($gardenia_options['favicon']); ?>"> 
	<?php } ?>	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="themepage">
	<?php if (!empty($gardenia_options)) { ?>
		<div class="section-content">
			<div class="container">
				<div class="row header-top">
					<?php if(!empty($gardenia_options['phone']) || !empty($gardenia_options['email']) ) { ?>
					<div class="col-md-6 left-head">
						<?php if (!empty($gardenia_options['phone'])) { ?>
							<div class="phone"><?php echo esc_attr($gardenia_options['phone']); ?></div>
						<?php } ?>
						<?php if (!empty($gardenia_options['email'])) { ?>
							<div class="mail"><a href="mailto:<?php echo esc_attr($gardenia_options['email']); ?>"><?php echo esc_attr($gardenia_options['email']); ?></a></div>
						<?php } ?>
					</div>
					<?php } ?>
					<?php if(!empty($gardenia_options['fburl']) || !empty($gardenia_options['twitter']) || !empty($gardenia_options['gplus']) || !empty($gardenia_options['linkedin']) || !empty($gardenia_options['pinterest']) || !empty($gardenia_options['rss']) ) { ?>
					<div class="col-md-6 right-head <?php if(empty($gardenia_options['phone']) && empty($gardenia_options['email']) ) { echo "col-md-offset-6";}?>">
						<ol class="social">
							<?php if (!empty($gardenia_options['fburl'])) { ?>
								<li class="fb"><a class="animate1" href="<?php echo esc_url($gardenia_options['fburl']); ?>"><i class="animate1 social_facebook"></i></a></li>
							<?php } ?>  

							<?php if (!empty($gardenia_options['twitter'])) { ?>
								<li><a class="animate1" href="<?php echo esc_url($gardenia_options['twitter']); ?>"><i class="animate1 social_twitter"></i></a></li>
							<?php } ?>

							<?php if (!empty($gardenia_options['gplus'])) { ?>
								<li><a class="animate1" href="<?php echo esc_url($gardenia_options['gplus']); ?>"><i class="animate1 social_googleplus"></i></a></li>
							<?php } ?>

							<?php if (!empty($gardenia_options['linkedin'])) { ?>
								<li><a class="animate1" href="<?php echo esc_url($gardenia_options['linkedin']); ?>"><i class="animate1 social_linkedin"></i></a></li>
							<?php } ?>

							<?php if (!empty($gardenia_options['pinterest'])) { ?>
								<li><a class="animate1" href="<?php echo esc_url($gardenia_options['pinterest']); ?>"><i class="animate1 social_pinterest"></i></a></li>
							<?php } ?>
							<?php if (!empty($gardenia_options['rss'])) { ?>
								<li><a class="animate1" href="<?php echo esc_url($gardenia_options['rss']); ?>"><i class="animate1 social_rss "></i></a></li>
							<?php } ?>
						</ol>
					</div>
					<?php } ?>
				</div>
			</div></div>
	<?php } ?>
	<div class="container gardenia-container">
		<div class="col-md-12"> 
			<div class="header-main row">
				<div class="col-md-3 col-sm-3 logo">		 
					<?php if (!empty($gardenia_options['logo'])) { 
						$gardenia_options_image = getimagesize($gardenia_options['logo']) ;						
					?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><img alt="<?php _e('logo', 'gardenia') ?>" src="<?php echo esc_url($gardenia_options['logo']); ?>" height= "<?php echo $gardenia_options_image[1]; ?>" width="<?php echo $gardenia_options_image[0]; ?>"></a> 
					<?php } else { ?>		  
						<a class="home-link" style="color:#<?php echo get_header_textcolor(); ?>!important;" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
							<h2 class="site-title"><?php bloginfo('name'); ?></h2>	
						</a>
						<?php	$gardenia_description = get_bloginfo( 'description', 'display' );
					if ( $gardenia_description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $gardenia_description; ?></p>
					<?php endif;?>			
						
					<?php } ?>
				</div>
				<div class="col-md-9 col-sm-9 theme-menu">
					<nav class="gg-nav">          
						<div class="navbar-header">
							<?php if (has_nav_menu('primary')) { ?>
								<button type="button" class="navbar-toggle navbar-toggle-top sort-menu-icon collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"><?php _e('Toggle navigation', 'gardenia'); ?></span> <span class="icon_menu-square_alt"></span></button>
							<?php } ?>
						</div>			  
						<?php
						$gardenia_defaults = array(
							'theme_location' => 'primary',
							'container' => 'div',
							'container_class' => 'navbar-collapse collapse gg-navbar main-menu',
							'container_id' => '',
							'menu_class' => 'navbar-collapse collapse gg-navbar',
							'menu_id' => '',
							'submenu_class' => '',
							'echo' => true,							
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id="menu" class="gg-menu">%3$s</ul>',
							'depth' => 0,
							'walker' => ''
						);
						if (has_nav_menu('primary')) {
							wp_nav_menu($gardenia_defaults);
						}
						?>        
					</nav>
				</div>      
			</div>
		</div>
	</div>  
<?php if (get_header_image()) { ?>
                <div class="custom-header-img">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    </a>
                </div>
<?php } ?>   
</header>	
