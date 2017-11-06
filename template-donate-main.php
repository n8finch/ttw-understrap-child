<?php
/**
 * Template Name: Donate Main Template
 *
 * The template for rendering the main about page.
 *
 * @package lean
 * @version	2.0
 * @since 	2.0
 */
?>
<?php get_header(); ?>
<?php $presentation_options = get_option( 'theme_presentation_options' ); ?>

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

                                        <div class="trip-tile-menu">
	                                        <?php if( have_rows('ttw_donate_main_links') ): ?>

											<?php while( have_rows('ttw_donate_main_links') ): the_row();

												// vars
												$title = get_sub_field('title');
												$link = get_sub_field('link');
												$color = get_sub_field('color');

												?>


													<?php if( $link ): ?>
														<a href="<?php echo $link; ?>">
													<?php endif; ?>

														<div class="trip-tile col-md-6 col-sm-6 col-xs-12 <?php echo $color; ?>">
													    	<span class="tile-title"><?php echo $title; ?></span>
													    </div>

													<?php if( $link ): ?>
														</a>
													<?php endif; ?>


											<?php endwhile; ?>

										<?php endif; ?>
                                        </div>


                                        </div><!-- /.entry-content -->
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