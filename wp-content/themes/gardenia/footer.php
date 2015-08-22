<?php $gardenia_options = get_option( 'gardenia_theme_options' ); ?>
<footer>
  <div class="row bg1">
    <div class="container gardenia-container">
	<div class="col-md-12">
      <div class="row">		        
			<?php if ( is_active_sidebar( 'footer-1' ) ) {  ?>
				<div class="col-md-3 col-sm-6 footer-widget">
				<?php dynamic_sidebar( 'footer-1' );  ?>
				</div>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer-2' ) ) {  ?>
				<div class="col-md-3 col-sm-6 footer-widget">
				<?php dynamic_sidebar( 'footer-2' );  ?>
				</div>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) {  ?>
				<div class="col-md-3 col-sm-6 footer-widget">
				<?php dynamic_sidebar( 'footer-3' );  ?>
				</div>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer-4' ) ) {  ?>
				<div class="col-md-3 col-sm-6 footer-widget">
				<?php dynamic_sidebar( 'footer-4' );  ?>
				</div>
			<?php } ?>           
      </div> 
    </div>       
    </div>
  </div>
  
  <div class="row bg2">
    <div class="container gardenia-container">
      <div class="footer-bottom">
		<div class="col-md-12">
        <div class="row">
          <div class="col-md-6 col-sm-6 copyright-text">
		<?php if(!empty($gardenia_options['footertext'])) { ?> 
            <?php echo esc_html($gardenia_options['footertext']);?>
        <?php } ?>
        
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'gardenia' ) ); ?>"><?php printf( __( 'Powered by %s', 'gardenia' ), 'WordPress' ); ?></a> <?php _e('and','gardenia') ?>	<a href="<?php echo esc_url( __('http://fruitthemes.com/wordpress-themes/gardenia', 'gardenia' )); ?>" target="_blank"><?php _e('Gardenia','gardenia');?></a>	 

          </div>         			  
			 <?php			
				  if ( has_nav_menu( 'footer' ) )   { 
                    $gardenia_defaults = array(
                    'theme_location'  => 'footer',                    
                    'echo'            => true,                    
                    'items_wrap'      => '<ul id="menu" class="footer-menu">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                    ); 					  
					  ?>
					<div class="col-md-6 col-sm-6 terms">	
					<?php wp_nav_menu($gardenia_defaults);  ?>
					</div>
				  <?php } ?>                      
          </div>
        </div>
        </div>
      </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
