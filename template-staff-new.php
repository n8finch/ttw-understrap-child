<?php
/**
 * Template Name: NEW Staff Page
 *
 * Use this template for displaying staff members.
 *
 * @package lean
 * @version	1.1
 * @since 	1.0
 */
?>

<?php get_header(); ?>

<?php /* Scripts added to allow masonary layout to tiles on page */ ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function( $ ) {
    //init Isotope
    var $container = $('.staff-tiles').isotope({
      itemSelector: '.item',
      layoutMode: 'masonry',

    });
     //re-layout after all images finish loading
    $container.imagesLoaded( function() {
      $container.isotope('layout');
    });
});
</script>
<script type="text/javascript">
jQuery(document).ready(function( $ ) {
    //init Isotope
    var $container = $('.ministry-tiles').isotope({
      itemSelector: '.item',
      layoutMode: 'masonry',

    });
     //re-layout after all images finish loading
    $container.imagesLoaded( function() {
      $container.isotope('layout');
    });
});
</script>

<?php /* End Masonary scripts */ ?>


<div id="wrapper">
	<div class="container">
		<div class="row">
			<section id="main" class="col-md-12 clearfix" role="main">

				<?php if ( have_posts() ) { ?>
					<?php while ( have_posts() ) { ?>
						<?php the_post(); ?>
						<article id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post' ); ?>>
							<div class="post-header clearfix">
								<h1 class="post-title entry-title"><?php the_title(); ?></h1>
							</div> <!-- /.post-header -->
							<div id="content-<?php the_ID(); ?>" class="entry-content">
							<?php the_content(); ?>
							<div class="row">
							<div id="post-layout" class="staff-tiles">

							<?php

							// WP_Query arguments
							$args = array (
								'post_type'              => 'staff',
								'order'                  => 'ASC',
								'orderby'                => 'title',
								'posts_per_page' 		 => -1,
								'paged'					 => $paged
							);

							// The Query
							$ttw_staff = new WP_Query( $args );

							// The Loop
							if ( $ttw_staff->have_posts() ) {
								while ( $ttw_staff->have_posts() ) {
									$ttw_staff->the_post();

									echo '<div class=" item staff ';
										echo the_field('staff_new_staff');
										echo ' clearfix">';
										echo '<div class="thumbnail">';
										echo '<div class="new-banner">NEW STAFF!</div>';
										$staff_photo = get_field('staff_photo');
										if (!empty($staff_photo)) {
											echo '<img src="';
											echo the_field('staff_photo');
											echo '" class="clearfix">';
										}
										echo '<div class="caption">';
										echo '<h3>';
										echo get_the_title();
										echo '</h3>';
										echo '<p class="job-title"><span class="text-muted">';
										echo the_field('staff_position');
										echo '</span></p>';
										echo '<div class="clearfix social-icons">';
										if (!empty(get_field('staff_twitter'))) {
											echo '<a href="http://www.twitter.com/';
											echo the_field('staff_twitter');
											echo '" target="_blank"><span class="fa fa-twitter"></span></a>';
										}
										if (!empty(get_field('staff_instagram'))) {
											echo '<a href="http://www.instagram.com/';
											echo the_field('staff_instagram');
											echo '" target="_blank"><span class="fa fa-instagram"></span></a>';
										}
										if (!empty(get_field('staff_facebook'))) {
											echo '<a href="';
											echo the_field('staff_facebook');
											echo '" target="_blank"><span class="fa fa-facebook"></span></a>';
										}
										if (!empty(get_field('staff_linkedin'))) {
											echo '<a href="';
											echo the_field('staff_linkedin');
											echo '" target="_blank"><span class="fa fa-linkedin"></span></a>';
										}
										if (!empty(get_field('staff_site'))) {
											echo '<a href="';
											echo the_field('staff_site');
											echo '" target="_blank"><span class="fa fa-comment"></span></a>';
										}

										echo '</div>';
										echo '<hr />';
										echo '<p>';

										if (!empty(get_field('staff_bio_excerpt'))) {
											echo the_field('staff_bio_excerpt');
										} else {
											echo the_field('staff_bio');
										}
										echo '</p>';
										// Read More
										echo '<div class="clearfix bottom-buttons">';
										echo '<div class="col-xs-12 col-sm-6 full-width">';
										echo '<a class="btn btn-primary btn-block" href="';
										echo get_permalink();
											echo '">Read More</a>';
										echo '</div>';
										// Donate Button
										echo '<div class="col-xs-12 col-sm-6 full-width">';
										echo '<a class="btn btn-primary btn-block" href="';
										echo get_permalink();
										echo '#staff_giving';
											echo '">Donate Now</a>';
										echo '</div>';
										// Newsletters
										echo '<div class="col-xs-12 col-sm-6 full-width">';
										echo '<a class="btn btn-primary btn-block" href="';
											echo get_permalink();
											echo '#staff_newsletters';
											echo '">Read Newsletters</a>';
										echo '</div>';

										// Email
										echo '<div class="col-xs-12 col-sm-6 full-width">';
										$display_email = get_field('staff_display_email');
										if ($display_email == 'yes') {
											echo '<a class="btn btn-primary btn-block" href="mailto:';
											echo the_field('staff_email_address');
											echo '">Send an Email</a>';

										}
										echo '</div>';
										echo '</div>';
										echo '</div>';
										echo '</div>';
										echo '</div>';


								}
							} else {
								// no posts found
							}

							// Restore original Post Data
							wp_reset_postdata();

							?>

							</div><!-- /#post-layout -->
							</div><!-- /.row -->
							<div class="row">
								<div class="container">

									<h2 class="page-title"><?php $section_title = get_post_meta($post->ID, '_cmb_ministries_section_title', true); echo $section_title; ?></h2>
							<div id="post-layout" class="ministry-tiles clearfix">


							<?php $ministry = get_post_meta($post->ID, '_cmb_ministries_group', true); ?>
							<?php
							foreach($ministry as $ministry)
							{

							echo '<div class=" item staff clearfix">';
							echo '<div class="thumbnail">';
							echo '<div class="img-wrapper" style="background-image:url('. $ministry['picture'].');">';
							echo '<span class="tile-title"> ' .$ministry['name'] . '</span>';
							echo '</div>';
							echo '<div class="caption">';
							echo '<p class="lead"><span class="text-muted"><small> ' .$ministry['description'] . '  </small></span></p>';
							echo '<p> ' .$ministry['contact'] . '  </p>';
							echo '<a class="btn btn-primary btn-block" href="http://'. $ministry['website'].'">Visit Website</a>';
							echo '</div>';
							echo '</div>';
							echo '</div>';

							}
							?>

							</div><!-- /#post-layout -->
								</div><!-- /container -->
							</div><!-- /.row -->

							</div><!-- /.entry-content -->
						</article> <!-- /#post -->
					<?php } // end while ?>
				<?php } // end if ?>

			</section><!-- /#main -->

		</div><!--/row -->
	</div><!-- /container -->
</div> <!-- /#wrapper -->
<?php get_footer(); ?>