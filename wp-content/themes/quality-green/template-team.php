<?php
/**
 * Created by PhpStorm.
 * User: vivekbhusal
 * Date: 20/08/15
 * Time: 7:08 PM
 */
/**
 * Template Name: Team
 */

get_header(); ?>
<div class="page-seperator"></div>
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="qua_page_heading">-->
<!--            --><?php //the_post(); ?>
<!--            <h1>--><?php //the_title(); ?><!--</h1>-->
<!--            <div class="qua-separator"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div id="team" class="">
    <div class="container">

        <?php
        the_post();

        // Get 'team' posts
        $team_posts = get_posts( array(
            'post_type' => 'team_profile',
            'posts_per_page' => -1, // Unlimited posts
        ) );

        if ( $team_posts ):
            ?>
            <section class="row profiles">
                <div class="intro" style="text-align: center;">
                    <h2>Meet The Team</h2>
                    <p class="lead">&ldquo;Individuals can and do make a difference, but it takes a team<br>to really mess things up.&rdquo;</p>
                </div>

                <?php
                foreach ( $team_posts as $post ):
                    setup_postdata($post);
                    $position = get_post_meta($post->ID, 'position')[0];

                    // Resize and CDNize thumbnails using Automattic Photon service
                    $thumb_src = null;
                    if ( get_post_meta($post->ID, 'profile_picture')) {
                        $src = wp_get_attachment_image_src(get_post_meta($post->ID, 'profile_picture')[0]['ID']);
                        $thumb_src = $src[0];
                    }

                    ?>
                    <article class="col-sm-6 profile">
                        <div class="profile-header">
                            <?php if ( $thumb_src ): ?>
                                <img src="<?php echo $thumb_src; ?>" alt="<?php the_title(); ?>, <?php echo $position ?>" class="img-circle">
                            <?php endif; ?>
                        </div>

                        <div class="profile-content">
                            <h3><?php the_title(); ?></h3>
                            <p class="lead position"><?php echo $position ?></p>
                            <?php the_content(); ?>
                        </div>

                        <div class="profile-footer">
                            <!--						<a href="tel:--><?php //get_post_meta($post->ID, 'phone_number')[0] ?><!--"><i class="fa fa-phone-square"></i></a>-->
                            <a href="mailto:<?php echo antispambot(get_post_meta($post->ID, 'email')[0] ); ?>"><i class="fa fa-envelope"></i></a>
                            <?php if ( $linkedin = get_post_meta($post->ID, 'linkedin')[0] ): ?>
                                <a target="_blank" href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin-square""></i></a>
                            <?php endif; ?>
                        </div>
                    </article><!-- /.profile -->
                <?php endforeach; ?>
            </section><!-- /.row -->
        <?php endif; ?>
    </div>
</div>