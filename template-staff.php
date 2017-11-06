<?php
/**
 * Template Name: Staff Page
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
							
							<?php $staff = get_post_meta($post->ID, '_cmb_staff_group', true); ?>

							<?php
							foreach($staff as $staff)
							{
							
							echo '<div class=" item '. $staff['staff_class'].' clearfix">';
							echo '<div class="thumbnail">';
							echo '<div class="new-banner">NEW STAFF!</div>';
							if (!empty($staff['picture'])) {
								echo '<img src="'. $staff['picture'].'" class="clearfix">';
							}
							echo '<div class="caption">';
							echo '<h3> ' .$staff['name'] . '</h3>';
							echo '<p class="job-title"><span class="text-muted">' .$staff['position'] . '</span></p>';
							echo '<div class="clearfix social-icons">';
							if (!empty($staff['twitter_address'])) {
								echo '<a href="http://www.twitter.com/'.$staff['twitter_address'].'" target="_blank"><span class="fa fa-twitter"></span></a>';
							}
							if (!empty($staff['instagram_address'])) {
								echo '<a href="http://www.instagram.com/'.$staff['instagram_address'].'" target="_blank"><span class="fa fa-instagram"></span></a>';
							}
							if (!empty($staff['facebook_address'])) {
								echo '<a href="'.$staff['twitter_address'].'" target="_blank"><span class="fa fa-facebook"></span></a>';
							}
							if (!empty($staff['linkedin_address'])) {
								echo '<a href="'.$staff['linkedin_address'].'" target="_blank"><span class="fa fa-linkedin"></span></a>';
							}
							if (!empty($staff['blog_address'])) {
								echo '<a href="'.$staff['blog_address'].'" target="_blank"><span class="fa fa-comment"></span></a>';
							}
							
							echo '</div>';
							echo '<hr />';
							echo '<p> ' .$staff['bio'] . '  </p>';
							echo '<a class="btn btn-primary btn-block" style="display:' .$staff['email_select']. '" href="mailto:'. $staff['email'].'">Send an Email</a>';
							echo '</div>';
							echo '</div>';
							echo '</div>';

							
							}
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
				<?php comments_template( '', true ); ?>
			</section><!-- /#main -->
			
		</div><!--/row -->
	</div><!-- /container -->
</div> <!-- /#wrapper -->
<?php get_footer(); ?>