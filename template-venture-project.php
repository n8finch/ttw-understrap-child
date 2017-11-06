<?php
/**
 * Template Name: Venture Project
 *
 * The template for rendering Venture Project page.
 *
 * @package lean
 * @version	1.4.1
 * @since 	1.0
 */

?>
<?php get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/venture-project/set1.css" />

<?php $presentation_options = get_option( 'theme_presentation_options' ); ?>
<div class="row crumb-row">
<div class="container">
<?php if( ! is_front_page() ) { ?>
                        <?php get_template_part( 'breadcrumbs' ); ?>
                    <?php } // end if ?>
</div><!-- /container -->
</div><!--/row -->
    <div id="wrapper">
        <div class="container">
            <div class="row">

                <section id="main"
                         role="main"
                         class="col-sm-12 col-md-10 col-md-offset-1">



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


										<?php if( have_rows('venture_main_blocks') ): ?>
											<div class="row clearfix">
											<div class="vgrid">

											<?php while( have_rows('venture_main_blocks') ): the_row();

												// vars
												$title = get_sub_field('title');
												$description = get_sub_field('description');
												$color = get_sub_field('color');

												?>

													<figure class="effect-sarah <?php echo $color; ?>">
														<figcaption>
															<h2><?php echo $title; ?></h2>
															<?php echo $description; ?>
														</figcaption>
													</figure>


											<?php endwhile; ?>

											</div>
											</div>

										<?php endif; ?>

										<!-- Testimonies Section -->

										<?php if( have_rows('venture_testimonies') ): ?>

											<h2 class="venture-testimonies"> What People Are Saying</h2>
											<div class="row clearfix">

											<?php while( have_rows('venture_testimonies') ): the_row();

												// vars
												$name = get_sub_field('name');
												$testimony = get_sub_field('testimony');
												$image = get_sub_field('image');

												?>

													<div class="col-md-4 text-center">
														<img src="<?php echo $image;?>" class="img-circle">
														<?php echo $testimony; ?>
														<em class="text-muted">- <?php echo $name; ?></em>
													</div>


											<?php endwhile; ?>

											</div>

										<?php endif; ?>

										<!-- Values Section -->

										<?php if( have_rows('venture_values') ): ?>

											<div class="row margin-top-20 clearfix">

											<?php while( have_rows('venture_values') ): the_row();

												// vars
												$name = get_sub_field('title');
												$icon = get_sub_field('icon');
												$link = get_sub_field('link');

												?>

													<?php if($link)
														{
															echo '<a href="'. $link .'">';

														} ?>
													<div class="col-md-2 venture-values text-center">

															<div class="row clearfix">
																<span class="fa <?php echo $icon;?>"></span>
															</div>
															<div class="row title clearfix">
																<?php echo $name; ?>
															</div>

													</div>
													<?php if($link) {echo '</a>';} ?>

											<?php endwhile; ?>

											</div>

										<?php endif; ?>

                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-content -->
                            </article> <!-- /#post -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                    <?php comments_template( '', true ); ?>
                </section><!-- /#main -->
            </div><!--/ row -->
        </div><!--/container -->
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>

