<?php
/**
 * Template Name: The Scoop
 *
 * The template for rendering the scoop tabs.
 *
 * @package lean
 * @version	1.4.1
 * @since 	1.0
 */

?>
<?php get_header(); ?>
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
                         class="col-sm-12">

                    

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
                                        
                                        <div class="the-scoop" role="tabpanel">
	                                        <?php the_scoop_menu(); ?>
	                                        <?php the_scoop_pages(); ?>
                                        </div>
                                        </div>
                                       
                                       
                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-content -->
                            </article> <!-- /#post -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                    
                </section><!-- /#main -->

            </div><!--/ row -->
        </div><!--/container -->
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>

	