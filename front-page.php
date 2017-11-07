<?php
/**
 * Template Name: Front Page Template
 *
 * The template for rendering the homepage.
 *
 * @package lean
 * @version	2.0
 * @since 	2.0
 */
?>
<?php get_header(); ?>

    <?php featured_slider(); ?>
	<?php bcd_orange_intro_bar(); ?>
	<div class="bcd-aqua-intro-bar">
		<div class="container">
			<h3 class="text-center"><?php $home_title = get_post_meta($post->ID, '_cmb_home_role_section_title', true); echo $home_title;?></h3>
			<p class="text-center"><?php $home_desc = get_post_meta($post->ID, '_cmb_home_role_section_description', true); echo $home_desc;?></p>
			<div class="row">
				<a href="<?php $link1 = get_post_meta($post->ID, '_cmb_link_home_role_1', true); echo $link1;?>"><div class="col-sm-3 col-xs-6 role-select">
					<img class="center-block" src="<?php $icon1 = get_post_meta($post->ID, '_cmb_icon_home_role_1', true); echo $icon1;?>" alt="group-leader" width="144" height="144" />
					<h5><?php $title1 = get_post_meta($post->ID, '_cmb_title_home_role_1', true); echo $title1;?></h5>
				</div></a>
				<a href="<?php $link2 = get_post_meta($post->ID, '_cmb_link_home_role_2', true); echo $link2;?>"><div class="col-sm-3 col-xs-6 role-select">
					<img class="center-block" src="<?php $icon2 = get_post_meta($post->ID, '_cmb_icon_home_role_2', true); echo $icon2;?>" alt="group-leader" width="144" height="144" />
					<h5><?php $title2 = get_post_meta($post->ID, '_cmb_title_home_role_2', true); echo $title2;?></h5>
				</div></a>
				<a href="<?php $link3 = get_post_meta($post->ID, '_cmb_link_home_role_3', true); echo $link3;?>"><div class="col-sm-3 col-xs-6 role-select">
					<img class="center-block" src="<?php $icon3 = get_post_meta($post->ID, '_cmb_icon_home_role_3', true); echo $icon3;?>" alt="group-leader" width="144" height="144" />
					<h5><?php $title3 = get_post_meta($post->ID, '_cmb_title_home_role_3', true); echo $title3;?></h5>
				</div></a>
				<a href="<?php $link4 = get_post_meta($post->ID, '_cmb_link_home_role_4', true); echo $link4;?>"><div class="col-sm-3 col-xs-6 role-select">
					<img class="center-block" src="<?php $icon4 = get_post_meta($post->ID, '_cmb_icon_home_role_4', true); echo $icon4;?>" alt="group-leader" width="144" height="144" />
					<h5><?php $title4 = get_post_meta($post->ID, '_cmb_title_home_role_4', true); echo $title4;?></h5>
				</div></a>
			</div>
		</div>
	</div>
	<div class="home-whats-new">
		<div class="container">
			<div class="row">
				<div class="col-md-3 title clearfix">
					<h2>Find Out what's New!</h2>
					<span class="hidden-sm hidden-xs">
					<?php get_template_part( 'social-networking' ); ?>
					</span>
				</div>
				<div class="col-md-3 posts">
					<!-- Show Latest 2 post exceprts -->

					<?php // WP_Query arguments
					$args = array (
						'pagination'             => false,
						'posts_per_page'         => '2',
						'order'                  => 'DESC',
					);

					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

					<div class="home-post-lead">
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><h3><?php the_title();?></h3></a>
						<p><?php the_excerpt();?></p>
						<span class="post-meta-details"><span class="author-name"><?php the_author_meta(display_name);?></span> - <span class="the-date"><?php echo get_the_date('m/d/y'); ?></span></span>
					</div>

					<?php endwhile;
					wp_reset_postdata();
					else : ?>
					<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>

					<a href="/blog" class="home-post-read-more">More Posts >></a>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 ad">
					<div class="home-widgets clearfix">
                        <?php dynamic_sidebar( 'sidebar-6' ); ?>
                    </div><!-- /#left-footer-widget -->
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 ad">
					<div class="home-widgets clearfix">
                        <?php dynamic_sidebar( 'sidebar-8' ); ?>
                     </div><!-- /#right-footer-widget -->
				</div>
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /home-whats-new -->
	<div class="home-ig-bar">
		<div class="row">
			<div class="container">
		<?php dynamic_sidebar( 'sidebar-10' ); ?>
			</div>
		</div>
	</div><!-- /home-ig-bar -->
<?php get_footer(); ?>
