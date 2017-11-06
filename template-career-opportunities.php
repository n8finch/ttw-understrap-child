<?php
/**
 * Template Name: Career Opportunities Template
 *
 * The template for rendering the job openings page.
 *
 * @package lean
 * @version	2.0
 * @since 	2.0
 */
?>

<?php get_header(); ?>
<?php $presentation_options = get_option( 'theme_presentation_options' ); ?>

<?php /* Scripts added to allow masonary layout to tiles on page */ ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/isotope.pkgd.min.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function( $ ) {
    //init Isotope
    var $container = $('.job-tiles').isotope({
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

                <section id="main"
                         role="main"
                         class="col-12 <?php echo 'full_width_layout' == $presentation_options['layout'] ? 'col-md-12' : 'col-md-8 col-sm-8'; ?> <?php echo 'left_sidebar_layout' == $presentation_options['layout'] ? ' col-md-push-4' : ''; ?>">

                    <?php if( ! is_front_page() ) { ?>
                        <?php get_template_part( 'breadcrumbs' ); ?>
                    <?php } // end if ?>

                    <?php if ( have_posts() ) { ?>
                        <?php while ( have_posts() ) { ?>
                            <?php the_post(); ?>
                            <article id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post' ); ?>>
                                <div class="post-header clearfix">
                                    <h1 class="post-title entry-title page-header"><?php the_title(); ?></h1>
                                </div> <!-- /.post-header -->
                                <div id="content-<?php the_ID(); ?>" class="entry-content clearfix">
                                    <div class="content">
                                        <?php the_content(); ?>
                                        
                                    </div><!-- /.entry-content -->
                                    <?php career_opportunities_pages(); ?>
                                    <div class="job-contact-form">
										
										<!-- Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h4 class="modal-title" id="myModalLabel">Career Opportunity Interest</h4>
										      </div>
										      <div class="modal-body">
											      <p><small>Submit the form, and we'll get in touch with you shortly to talk more about the exciting career opportunities at Touch The World. If you have any questions, or want to talk personally, give us a call, 201-760-9925.</small></p>
											      <hr />
										        <?php echo do_shortcode('[gravityform id=1 title=false description=false]'); ?>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										      </div>
										    </div>
										  </div>
										</div>
	                              
                                    </div>
                                </div><!-- /.entry-content -->
                            </article> <!-- /#post -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                    <?php comments_template( '', true ); ?>
                </section><!-- /#main -->

                <?php get_sidebar(); ?>

            </div><!--/ row -->
        </div><!--/container -->
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>