<?php
/**
 * The template for displaying a single trip page and its related content.
 *
 * @package Lean
 * @since 	3.0
 * @version	3.1
 */
?>

<?php get_header(); ?>
    <div id="wrapper">
        <div class="container">
            <div class="row">

                <section id="main"
                         role="main"
                         class="col-md-12">

                    <?php if( ! is_front_page() ) { ?>
                        <?php get_template_part( 'breadcrumbs' ); ?>
                    <?php } // end if ?>

                    <?php if ( have_posts() ) { ?>
                        <?php while ( have_posts() ) { ?>
                            <?php the_post(); ?>
                            <article id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post' ); ?>>
                                <div class="post-header clearfix">
	                                <div class="col-sm-8">
                                    <h1 class="post-title entry-title page-header"><?php the_title(); ?></h1>
	                                </div>
	                                <div class="col-sm-4 event-date">
		                                <p><?php echo get_post_meta(get_the_id(), "_event_date", true); ?></p>
	                                </div>
                                </div> <!-- /.post-header -->
								<div class="clearfix">
                                	<div id="content-<?php the_ID(); ?>" class="entry-content clearfix">
	                                <div class="content">
		                                	<div class="col-md-6">

	                                        	<?php the_content(); ?>

		                                	</div>
											<div class="col-md-6">
	                                        	<?php the_post_thumbnail(); ?>
	                                    	</div>

									</div>
									</div><!-- /.entry-content -->
								</div>

                                <div class="coral clearfix event-details">
	                                <div class="col-xs-12">
	                                <h2 class="title">Event Details</h2>
	                                <hr />
	                                <div class="row">
	                                <div class="col-sm-4 col-xs-6 box">
		                                <p><?php echo get_post_meta(get_the_id(), "_event_date", true); ?></p>
		                                <p><?php echo get_post_meta(get_the_id(), "_event_time", true); ?></p>
	                                </div>
	                                <div class="col-sm-4 col-xs-6 box">
		                                <p><?php echo get_post_meta(get_the_id(), "_event_address", true); ?></p>
	                                </div>
	                                <div class="col-sm-4 col-xs-12 box">
		                                <p><?php echo get_post_meta(get_the_id(), "_event_contact", true); ?></p>
	                                </div>
	                                </div>
	                                </div>
                                </div>

                                <div class="registration clearfix">
	                                <div class="container">
	                                <h2 class="title"><?php the_field('ttw_event_form_section_heading');?></h2>
	                                <hr />
	                                <div class="">
	                                	<?php
										    $form_object = get_field('ttw_select_event_form');
										    gravity_form_enqueue_scripts($form_object['id'], true);
										    gravity_form($form_object['id'], true, true, false, '', true, 1);
										?>
	                                </div>
	                                </div>
                                </div>

                            </article> <!-- /#post -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                </section><!-- /#main -->
            </div><!--/ row -->
        </div><!--/container -->
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>