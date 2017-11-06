<?php
/**
 * Template Name: Global Initiatives Template
 *
 * The template for rendering the Global Initiatives page.
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
                         class="col-md-12">

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
                                    <?php global_initiatives_pages(); ?>  
                                </div><!-- /.entry-content -->
                            </article> <!-- /#post -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                    
                </section><!-- /#main -->

            </div><!--/ row -->
        </div><!--/container -->
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>