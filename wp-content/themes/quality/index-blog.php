<?php $quality_pro_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div class="container container-blog titanium-blog-container">
	<div class="row">
		<?php if($current_options['blog_heading']) { ?>
		<div class="qua_heading_title">
			<h1><?php echo $current_options['blog_heading']; ?></h1>
			<div class="qua-separator" id=""></div>
		</div>
		<?php } ?>
	</div>
	<div class="row">
	<?php	$args = array( 'post_type' => 'post','posts_per_page' => 4,'ignore_sticky_posts' => 1);
			query_posts( $args );
			while(have_posts()):the_post();			
			{	?>
			<div class="col-md-4 col-sm-6 titanium-blog">
				<div class="qua-blog-area energy-blog-area">
				<div class="qua-blog-info">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="qua-blog-post-detail">
							<span><?php _e('Posted By Admin','quality');?>
							<?php if(get_the_tag_list() != '') { ?>
							</span><i class="post-seperator"></i>
							<div class="qua-tags">
								<?php the_tags('',' , ', '<br />'); ?>
							</div>
							<?php } ?>
						</div>
					<?php $defalt_arg =array('class' => "img-responsive titanum-blog-thumbnail blog-image"); ?>
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail('quality_blog_img', $defalt_arg); ?>
					<?php endif; ?>

					<?php the_excerpt(); ?>
						
						<div class="qua-blog-date-cm">
							<span class="left"><?php echo get_the_date('M j, Y'); ?></span><span class="right"><a href="#"><?php comments_number( 'No Comments', 'one comment', '% comments' ); ?></a></span>
						</div>
				</div>
				</div>
			</div>
			<?php  } 
			endwhile; ?>
	</div>
</div>
