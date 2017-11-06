<?php
/**
 * The template for displaying a single staff page and its related newsletters and content.
 *
 * @package Lean
 * @since 	3.0
 * @version	3.1
 */
?>

<?php get_header(); ?>
    <div id="wrapper">

		<div class="container-fluid new-staff <?php echo the_field('staff_new_staff');?>">
			<div class="row secondary">
				<p class="white pull-right poxima">New Staff!</p>
			</div>
		</div>

        <div class="container">
            <div class="row">
                <div id="main" class="clearfix" role="main">
                    <?php if ( have_posts() ) { ?>
                        <?php while ( have_posts() ) { ?>
                            <?php the_post(); ?>
                            <article id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post' ); ?>>
	                            <div class="row">
		                            <div class="col-md-6 col-sm-6 col-xs-12">
			                            <div class="post-header clearfix">
											<h1 class="post-title entry-title"><?php the_title(); ?></h1>
											<?php
											echo '<p class="job-title"><span class="text-muted">';
											echo the_field('staff_position');
											echo '</span></p>';
											?>
			                            <!-- /.post-header -->
			                            <?php
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
											echo the_field('staff_bio');


											?>
										</div> <!-- /.post-header -->
		                            </div><!-- close 1st column -->
		                            <div class="col-md-6 col-sm-6 col-xs-12">
			                            <?php
			                            $staff_photo = get_field('staff_photo');
										if (!empty($staff_photo)) {
											echo '<img src="';
											echo the_field('staff_photo');
											echo '" class="clearfix">';
										}
										// Email

										$display_email = get_field('staff_display_email');
										if ($display_email == 'yes') {
											echo '<a class="btn btn-primary btn-block" href="mailto:';
											echo the_field('staff_email_address');
											echo '">Send an Email</a>';

										}?>
			                        </div><!-- close 2nd column -->
	                            </div>

                            </article>
                            <?php } // end while ?>
                    <?php } // end if ?>
                </div><!-- close main -->
            </div><!-- /row -->
        </div> <!-- /.container -->

        <div class="container-fluid staff-newsletters" id="staff_newsletters">
	        <div class="row">
	        	<div class="container">
									<h4>Latest Newsletters</h4>
									<div id="content-<?php the_ID(); ?>" class="entry-content">

									<?php
									$staff_member = basename(get_permalink());
									$news_date = get_field ('newsletter_date');
									// WP_Query arguments
									$args = array (
										'post_type'              => 'newsletters',
										'taxonomy'				 => 'Staff Name',
										'term'               	 => $staff_member,
										'posts_per_page'         => '12',
										'order'                  => 'ASC',
										'orderby'                => $news_date,
									);

									// The Query
									$newsletters = new WP_Query( $args );

									// The Loop
									if ( $newsletters->have_posts() ) {
										while ( $newsletters->have_posts() ) {
											$newsletters->the_post();
											echo '<a href="';
											echo the_field('newsletter_pdf');
											echo '">';
											echo '<div class="col-sm-2 col-xs-6 newsletter accent text-center">';
											echo '<p class="the_title">';
											echo the_title();
											echo '</p>';
											echo '<p class="the_date">';
											echo the_field('newsletter_date');
											echo '</p>';
											echo '</div>';
											echo '</a>';
										}
									} else {
										// no posts found
									}

									// Restore original Post Data
									wp_reset_postdata();

									?>

									</div><!-- close content -->
								</div>
	        </div>
        </div>
		<div class="container-fluid staff-giving" id="staff_giving">
	        <div class="row">

	        	<div class="container">

									<div>
										<div class="row">
											<div class="col-sm-6 col-xs-12">
											<h4>Help Support <?php echo the_title();?></h4>
											</div>
											<div class="col-sm-6 col-xs-12">
											<?php $support_level = get_field('staff_current_support_level'); ?>
												<?php if (!empty($support_level)) { ?>


												<p>Current Support Level</p>
												<div class="progress">

												  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $support_level;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $support_level;?>%;">
												    <?php echo $support_level;?>%
												  </div>
												</div>
												<?php } ?>
												<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
									  Donate Now
									</button>
											</div>
										</div>



									<div class="collapse staff_giving_form" id="collapseExample">
									  <div class="well">
									    <?php
									    $form_object = get_field('select_giving_form');
									    echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="true" ajax="true"]');
									?>
									  </div>
									</div>




									</div><!-- close content -->
								</div>
	        </div>
        </div>
                    <?php comments_template( '', true ); ?>
                </div><!-- /#main -->

            </div><!--/row -->
        </div><!-- /container -->
    </div> <!-- /#wrapper -->
    <?php get_footer(); ?>