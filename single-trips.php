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
        <div id="image-slider">
            <div class="container">
                <div class="row">
                    <div id="carousel" class="carousel slide col-sm-12">
	                    <?php $indicator = get_post_meta($post->ID, '_cmb_trip_slider_group', true); ?>
                        <ol class="carousel-indicators">
	                        <?php
								$i = 0;
								$len = count($array);
								foreach($indicator as $indicator)
								{

									if ($i == 0) {
								        echo '<li data-target="#carousel" data-slide-to="0" class="active"></li>';
								    } else {
								        echo '<li data-target="#carousel" data-slide-to="'.$i.'"></li>';
								    }
								    // …
								    $i++;
								}
							?>
                        </ol>
                        <div class="carousel-inner">
	                        <?php $slide = get_post_meta($post->ID, '_cmb_trip_slider_group', true); ?>
						<?php
							$w = 0;
							$len = count($array);
							foreach($slide as $slide)
							{

								if ($w == 0) {
							        echo '<div class="item active">';
								    	echo ' <img src="'. $slide['picture'].'">';
								    echo '</div>';
							    } else {
							        echo '<div class="item">';
								    	echo ' <img src="'. $slide['picture'].'">';
								    echo '</div>';
							    }
							    // …
							    $w++;
							}
						?>
                        </div> <!-- /.carousel-inner -->
                         <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
		                                    <ul class="breadcrumb">
		                                        <li class="home-breadcrumb">
		                                            <a href="<?php echo get_site_url(); ?>/mission-trip" itemprop="url"><span itemprop="title"><< All Trips</span></a>
		                                        </li>
		                                        <li class="active"><?php echo " / " . get_the_title($ID); ?></li>
		                                    </ul>
		                                </div>

                    </div> <!-- /#carousel -->

                </div> <!-- /.row -->
            </div> <!-- /.row -->
        </div> <!-- /#image-slider -->
        <div class="container">
            <div class="row">
                <div id="main" class="clearfix" role="main">
                    <?php if ( have_posts() ) { ?>
                        <?php while ( have_posts() ) { ?>
                            <?php the_post(); ?>
                            <div class="default-page">

                                <div class="row">
                                    <div class="col-md-9 col-sm-8">
                                        <div class="servants-page-header clearfix">
                                            <h1 class="pull-left"><?php the_title(); ?></h1>
                                            <p class="pull-right trip-cats clearfix" style="display: <?php $trip_cats_display = get_post_meta( get_the_ID(), '_cmb_trip_cats_display', true); echo $trip_cats_display;?>;">

	                                            <?php $trip_cat = get_post_meta( get_the_ID(), '_cmb_trip_cats', true); ?>

	                                            <?php
												foreach($trip_cat as $trip_cat)
												{
													if ($trip_cat == 'junior-high') {
														echo '<span class="badge trip_cat '.$trip_cat.'" alt="Junior High Trip" title="Junior High Trip">JH</span>';
													} elseif ($trip_cat == 'senior-high') {
														echo '<span class="badge trip_cat '.$trip_cat.'" alt="Senior High Trip" title="Senior High Trip">SH</span>';
													} elseif ($trip_cat == 'college') {
														echo '<span class="badge trip_cat '.$trip_cat.'" alt="College Trip" title="College Trip">C</span>';
													} elseif ($trip_cat == 'individual') {
														echo '<span class="badge trip_cat '.$trip_cat.'" alt="Individual Trip" title="Individual Trip">I</span>';
													} elseif ($trip_cat == 'group') {
														echo '<span class="badge trip_cat '.$trip_cat.'" alt="Group Trip" title="Group Trip">G</span>';
													} elseif ($trip_cat == 'family') {
														echo '<span class="badge trip_cat '.$trip_cat.'" alt="Family Trip" title="Family Trip">F</span>';
													}
												}
												?>

                                            </p>


                                        </div>
                                        <div class="clearfix">
	                                        <p class="text-muted">Trip cost starts at <?php echo get_post_meta(get_the_id(), "_cost", true); ?></p>
                                        </div>
                                        <div class="the-content">
                                            <?php the_content(); ?>
                                        </div> <!-- /.the-content -->
                                    </div>
                                    <div class="col-md-3 col-sm-4 trip-sidebar">
	                                   	                                    <div class="widget the-scoop">
		                                    <h2>The Scoop</h2>
		                                    <ul>
			                                    <a href="<?php $details = get_post_meta($post->ID, '_cmb_the_scoop_details', true); echo $details;?>"><li><span class="fa fa-info-circle"></span>Details</li></a>
			                                    <a href="<?php $health = get_post_meta($post->ID, '_cmb_the_scoop_health', true); echo $health;?>"><li><span class="fa fa-shield"></span>Health & Safety</li></a>
			                                    <a href="<?php $transportation = get_post_meta($post->ID, '_cmb_the_scoop_transportation', true); echo $transportation;?>"><li><span class="fa fa-car"></span>Transportation</li></a>
			                                    <a href="<?php $mission_training = get_post_meta($post->ID, '_cmb_the_scoop_mission_training', true); echo $mission_training;?>"><li><span class="fa fa-book"></span>Mission Training</li></a>
			                                    <a href="<?php $support_raising = get_post_meta($post->ID, '_cmb_the_scoop_support_raising', true); echo $support_raising;?>"><li><span class="fa fa-dollar"></span>Support Raising</li></a>
			                                    <a href="<?php $finance = get_post_meta($post->ID, '_cmb_the_scoop_finance', true); echo $finance;?>"><li><span class="fa fa-university"></span>Financial Policy</li></a>
			                                    <a href="<?php $faq = get_post_meta($post->ID, '_cmb_the_scoop_faq', true); echo $faq;?>"><li><span class="fa fa-question-circle"></span>FAQ's</li></a>
			                                    <a href="<?php $flyer = get_post_meta($post->ID, '_cmb_the_scoop_flyer', true); echo $flyer;?>"><li><span class="fa fa-send"></span>Trip Flyer</li></a>
		                                    </ul>
	                                    </div>

                                    </div> <!-- /.span3 -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="charts clearfix" style="display: <?php $trip_scales_display = get_post_meta( get_the_ID(), '_cmb_trip_scales_display', true); echo $trip_scales_display;?>;">
	                                        <h4><?php global $post; $section_title = get_post_meta($post->ID, '_cmb_trip_scales_title', true); echo $section_title; ?></h4>
	                                        <div class="col-sm-4 col-xs-12 chart clearfix">
		                                        <?php global $post; $scale1_level = get_post_meta($post->ID, '_cmb_trip_scales_1_level', true); ?>
		                                        <?php global $post; $scale1_color = get_post_meta($post->ID, '_cmb_trip_scales_1_color', true); ?>

			                                        <?php if ($scale1_level == 0) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale1_level == 1) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale1_level == 2) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale1_level == 3) { ?>
														 <div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale1_level == 4) { ?>

													    <div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale1_color; ?>" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } ?>
												<div class="label col-xs-12">
													<p class="text-center"><?php global $post; $scale1_title = get_post_meta($post->ID, '_cmb_trip_scales_1_title', true); echo $scale1_title; ?></p>
												</div>

	                                        </div>
											<div class="col-sm-4 col-xs-12 chart clearfix">
		                                        <?php global $post; $scale2_level = get_post_meta($post->ID, '_cmb_trip_scales_2_level', true); ?>
		                                        <?php global $post; $scale2_color = get_post_meta($post->ID, '_cmb_trip_scales_2_color', true); ?>

			                                        <?php if ($scale2_level == 0) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale2_level == 1) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale2_level == 2) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale2_level == 3) { ?>
														 <div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale2_level == 4) { ?>

													    <div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale2_color; ?>" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } ?>
												<div class="label col-xs-12">
													<p class="text-center"><?php global $post; $scale2_title = get_post_meta($post->ID, '_cmb_trip_scales_2_title', true); echo $scale2_title; ?></p>
												</div>

	                                        </div>
											<div class="col-sm-4 col-xs-12 chart clearfix">
		                                        <?php global $post; $scale3_level = get_post_meta($post->ID, '_cmb_trip_scales_3_level', true); ?>
		                                        <?php global $post; $scale3_color = get_post_meta($post->ID, '_cmb_trip_scales_3_color', true); ?>

			                                        <?php if ($scale3_level == 0) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale3_level == 1) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale3_level == 2) { ?>
														<div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale3_level == 3) { ?>
														 <div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar empty" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } elseif ($scale3_level == 4) { ?>

													    <div class="center-block chart-area">
													        <div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="40"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="60"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="80"></div>
															</div>
															<div class="progress vertical bottom">
															    <div class="progress-bar <?php echo $scale3_color; ?>" role="progressbar" data-transitiongoal="100"></div>
															</div>
													    </div>
													<?php } ?>
												<div class="label col-xs-12">
													<p class="text-center"><?php global $post; $scale3_title = get_post_meta($post->ID, '_cmb_trip_scales_3_title', true); echo $scale3_title; ?></p>
												</div>

	                                        </div>
                                        </div><!-- /charts -->
                                       <div class="trip-details" style="display: <?php $trip_details_display = get_post_meta( get_the_ID(), '_cmb_trip_details_display', true); echo $trip_details_display;?>;">
                                        <h4>Trip Details</h4>
                                        <div class="panel-group faq" id="accordion" role="tablist">

	                                        <?php $question = get_post_meta($post->ID, '_cmb_trip_faq_group', true); ?>
												<?php
												$i = 0;
												$len = count($array);
												foreach($question as $question)
												{

													if ($i == 0) {
												        echo '<div class="panel panel-default card">';
													    echo '<div class="panel-heading first card-header" id="question'. $question['number'] .'">';
													    	echo '<h4 class="panel-title">';
													        echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bcd-'. $question['number'].'">';
													        echo '' .$question['question'] . '';
													        echo '</a>';

															echo '</h4>';
													    echo '</div>';
														echo '<div id="bcd-'. $question['number'].'" class="panel-collapse collapse show in">';
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
                                       </div><!-- /trip-details -->
                                        <div class="trip-options clearfix" style="display: <?php $trip_options_display = get_post_meta( get_the_ID(), '_cmb_trip_options_display', true); echo $trip_options_display;?>;">
	                                        <div class="table-responsive">
		                                        <table class="table table-hover table-striped table-bordered">
			                                        <thead class="aqua">
												        <tr>
												          <th>Available Dates</th>
												          <th>Cost</th>
												          <th>Type of Trip</th>
												          <th>First Step</th>
												          <th>Apply</th>
												        </tr>
												      </thead>
												      <tbody>
													      	<?php $trip = get_post_meta($post->ID, '_cmb_trip_options_table', true); ?>
															<?php
																$i = 0;
																foreach($trip as $trip)
																{

																	echo '<tr class="'.$trip['type'].'">';
																	echo '<td>'.$trip['dates'].'</td>';
																	echo '<td>'.$trip['cost'].'</td>';
																	echo '<td class="'.$trip['type'].'">'.$trip['type'].'</td>';
																	echo '<td><a href="'.$trip['first_step'].'" target="_blank">Link</a></td>';
																	echo '<td><a href="'.$trip['apply'].'" target="_blank">Apply</a></td>';
																	echo '</tr>';

																// …
																$i++;
																}

															?>
												      </tbody>
		                                        </table>
	                                        </div>
                                        </div><!-- /trip-options table -->

										<!-- code for this function is in includes/mm-trip-call.php -->
										<?php managedmissions_ttw_trip_display(); ?>

                                    </div> <!-- /.span9 -->

                                </div> <!-- /.row -->
                            </div> <!-- /.container -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                    <?php comments_template( '', true ); ?>
                </div><!-- /#main -->

            </div><!--/row -->
        </div><!-- /container -->
    </div> <!-- /#wrapper -->
    <script type="text/javascript">
        !function ($) {
            $(function() {
                $('.carousel').carousel({ interval: 4000 })
            });
        }(window.jQuery);
    </script>
    <script type="text/javascript">
		jQuery(document).ready(function( $ ) {
	    $('.progress .progress-bar').progressbar();
	});
	</script>
<?php get_footer(); ?>
