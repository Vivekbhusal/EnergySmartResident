<?php $quality_pro_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div class="qua_footer_area">
  <div class="container">
    <div class="col-md-4 titanium-footer-copyright">
			<?php if($current_options['footer_copyright_text']!='') { ?>
			<?php echo $current_options['footer_copyright_text']; } ?>
    </div>
    <div class="col-md-4 titanium-footer-menu">
      <ul class="titanium-footer-mernu-list">
        <li><a href="/api-documentation">Developers</a></li>
        <li><a href="/blog">Blogs</a></li>
        <li><a href="/future">Futures</a></li>
      </ul>
    </div>

    <div class="col-md-4 titanium-footer-socialmedia">
      <ul class="titanium-social-media-list">
        <li><a target="_blank" href="https://www.facebook.com/energysmartresident"><img src="/wp-content/themes/quality-green/images/facebook-titanium.png"/></a></li>
        <li><a target="_blank" href="https://twitter.com/EengySR"><img src="/wp-content/themes/quality-green/images/twitter-titanium.png"/></a></li>
      </ul>
    </div>

  </div>
</div>
<!-- /Footer Widget Secton -->
<?php wp_footer(); ?>
</body>
</html>