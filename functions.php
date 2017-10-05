<?php

//* And in legacy functions
include_once( __DIR__ . '/lean-functions.php');


function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}



/**
 * FUNCTIONS MOVED OVER FROM LEAN THEME
 */

 // Orange Value Props

 function bcd_orange_intro_bar () { ?>
 	<div class="orange-intro-bar" id="accordion" role="tablist" aria-multiselectable="true">
 		<div class="container-fluid">
 			<div class="row">
 				<div class="col-sm-4" role="tab" id="headingOne">
 					<p>We specialize in training</p>
 					<a href="#training" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" ari-acontrols="training"><h3>Pre-Trip</h3></a>
 				</div>
 				<div class="col-sm-4" role="tab" id="headingTwo">
 					<p>Focus on service, culture, and poverty</p>
 					<a href="#location" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" ari-acontrols="location"><h3>On Location</h3></a>
 				</div>
 				<div class="col-sm-4" role="tab" id="headingThree">
 					<p>We believe in discipleship</p>
 					<a href="#post" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" ari-acontrols="post"><h3>Post Trip</h3></a>
 				</div>
 			</div><!-- /row -->
 			<div class="row hidden-panels">
 				<div id="training" class="col-sm-12 collapse" role="tabpanel" aria-labelledby="headingOne">
 					<div class="col-sm-3">
 						<span class="droptitle clearfix">PRE-TRIP<br />TRAINING</span>
 						<a class="close" href="#training" data-parent="#accordion" data-toggle="collapse" aria-label="Close"><span aria-hidden="true">close</a>
 					</div>
 					<div class="col-sm-9">
 					<p>We specialize in training pre-trip to fully prepare individuals and teams for ministry in culturally relevant and effective ways.  Not only do we believe in preparing teams for service, we focus on building disciples to live out the mission of God everyday, everywhere.  TTW also fully equips team leaders to guide and mentor their team through this life-changing experience.</p>
 					</div>
 				</div>
 				<div id="location" class="col-sm-12 collapse" role="tabpanel" aria-labelledby="headingTwo">
 					<div class="col-sm-3">
 						<span class="droptitle clearfix">ON<br />LOCATION</span>
 						<a class="close" href="#location" data-parent="#accordion" data-toggle="collapse" aria-label="Close"><span aria-hidden="true">close</a>
 					</div>
 					<div class="col-sm-9">
 					<p>TTW carefully chooses mission locations based upon like-minded ministry philosophy and through long-term partnership.  On location, we find that the greatest transformation comes through exposure to the elements of service, culture and poverty.  Utilizing team devotionals and curriculum on site, intentional discussion helps facilitate increased growth and transformation in each team member.</p>
 					</div>
 				</div>
 				<div id="post" class="col-sm-12 collapse" role="tabpanel" aria-labelledby="headingThree">
 					<div class="col-sm-3">
 						<span class="droptitle clearfix">POST<br />TRIP</span>
 						<a class="close" href="#post" data-parent="#accordion" data-toggle="collapse" aria-label="Close"><span aria-hidden="true">close</a>
 					</div>
 					<div class="col-sm-9">
 					<p>We focus on extensive debriefing on-location and at the end of the trip to help equip team members to return home and continue to live a life of mission.  TTW also provides opportunities for team members to take their passion for missions to a deeper level through our Venture Program internship or through partnership with local ministries for service opportunities throughout the year in your own neighborhood.</p>
 					</div>
 				</div>
 			</div>
 		</div><!-- /container -->
 	</div><!-- /orange-intro-bar -->
 	<?php if ( is_front_page() ) { ?>
 	<div class="orange-bottom-bar">
 		<div class="arrow-down"></div>
 	</div>
	<?php } ?>
<?php }
