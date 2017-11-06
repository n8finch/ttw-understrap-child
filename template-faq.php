<?php
/**
 * Template Name: FAQ
 *
 * The template for rendering FAQ page.
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
                                        
                                        <div class="panel-group faq" id="accordion">
	                                        
	                                        <?php $question = get_post_meta($post->ID, '_cmb_faq_group', true); ?>
												<?php
												$i = 0;
												$len = count($array);
												foreach($question as $question)
												{
													
													if ($i == 0) {
												        echo '<div class="panel panel-default">';
													    echo '<div class="panel-heading first">';
													    	echo '<h4 class="panel-title">';
													        echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bcd-'. $question['number'].'">';
													        echo '' .$question['question'] . '';
													        echo '</a>';
													        
															echo '</h4>';
													    echo '</div>';
														echo '<div id="bcd-'. $question['number'].'" class="panel-collapse collapse in">';
															echo '<div class="panel-body">';
													        echo '' .$question['description'] . '';
															echo '</div>';
														echo '</div>';
													echo '</div>';
												    } else {
												        echo '<div class="panel panel-default">';
													    echo '<div class="panel-heading">';
													    	echo '<h4 class="panel-title">';
													        echo '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#bcd-'. $question['number'].'">';
													        echo '' .$question['question'] . '';
													        echo '</a>';
													        
															echo '</h4>';
													    echo '</div>';
														echo '<div id="bcd-'. $question['number'].'" class="panel-collapse collapse">';
															echo '<div class="panel-body">';
													        echo '' .$question['description'] . '';
															echo '</div>';
														echo '</div>';
													echo '</div>';
												    }
												    // …
												    $i++;
												}
												?>
										</div>
                                       
                                       
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

	