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
	wp_enqueue_script( 'popper-scripts', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}

/*/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\/\/\/\/\/\

* FUNCTIONS MOVED OVER FROM LEAN THEME

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ */

// Import function for site to communicate with ManagedMissions for trip details
include 'includes/mm-trip-call.php';

// Define Custom Featured Image Sizes

add_action( 'after_setup_theme', 'ttw_theme_setup' );

function ttw_theme_setup() {
	add_image_size( 'trip-thumb', 350, 350, array ('center', 'center') ); // 300 pixels wide (and unlimited height)
}



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
	<?php if ( is_front_page()) { ?>
	<div class="orange-bottom-bar">
		<div class="arrow-down"></div>
	</div>
<?php } //end if
} // end bcd_orange_intro_bar()


/**
* Adds four widgetized areas: the sidebar, the left footer, center footer, and right footer.
*
* This function can be overridden by child themes.
*
* @version	1.3
* @since	1.0
*/
function ttw_add_theme_sidebars() {

	// main
	register_sidebar(
		array(
			'name' 			=> __( 'Sidebar THIS', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-0',
			'description'	=> __( 'The primary sidebar.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// header
	register_sidebar(
		array(
			'name' 			=> __( 'Header', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-1',
			'description'	=> __( 'This area is designed for a 468x60 advertisement, but other widgets can be used here as well.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// post advertisements
	register_sidebar(
		array(
			'name'			=>	__( 'Below Single Post', TRANSLATION_KEY),
			'id'			=>	'sidebar-2',
			'description'	=>	__( 'Shown after post content and before comments. Ideal for the 468x60 ad widget.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// footer left
	register_sidebar(
		array(
			'name' 			=> __( 'Footer Left', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-3',
			'description'	=> __( 'Shown in the first column of the footer.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);


	// footer right
	register_sidebar(
		array(
			'name' 			=> __( 'Footer Right', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-5',
			'description'	=> __( 'Shown in the Second column of the footer.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// footer affiliations
	register_sidebar(
		array(
			'name' 			=> __( 'Footer Affiliations', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-12',
			'description'	=> __( 'Shown in the Last column of the footer.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// home left
	register_sidebar(
		array(
			'name' 			=> __( 'Home Left', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-6',
			'description'	=> __( 'Shown in the first column for the image widgets.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// home right
	register_sidebar(
		array(
			'name' 			=> __( 'Home Right', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-8',
			'description'	=> __( 'Shown in the second column for the image widgets.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// offline widget
	register_sidebar(
		array(
			'name' 			=> __( 'Offline Mode', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-9',
			'description'	=> __( 'Shown if the site is set to offline mode.', TRANSLATION_KEY ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// IG Footer widget
	register_sidebar(
		array(
			'name' 			=> __( 'IG Footer Widget', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-10',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	// Mission Overview Page - Yellow Nav
	register_sidebar(
		array(
			'name' 			=> __( 'Missions Role Nav', TRANSLATION_KEY ),
			'id' 			=> 'sidebar-11',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

} // end ttw_add_theme_sidebars

add_action( 'widgets_init', 'ttw_add_theme_sidebars' );

// CUSTOM EXCERPT LENGTH

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Events Post Type

function ttw_events_posttype() {
 register_post_type( 'events',
     array(
         'labels' => array(

             'name' => __( 'Events' ),
             'singular_name' => __( 'Event' ),
             'add_new' => __( 'Add New Event' ),
             'add_new_item' => __( 'Add New Event' ),
             'edit_item' => __( 'Edit Event' ),
             'new_item' => __( 'Add New Event' ),
             'view_item' => __( 'View Event' ),
             'search_items' => __( 'Search Events' ),
             'not_found' => __( 'No events found' ),
             'not_found_in_trash' => __( 'No events found in trash' )
         ),
         'hierarchical'=> true,
         'public' => true,
         'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail', 'page-attributes' ),
         'capability_type' => 'page',
         'rewrite' => array("slug" => "event"), // Permalinks format
         'menu_position' => 5,
         'register_meta_box_cb' => 'add_apply_metabox',
         'menu_icon' => 'dashicons-calendar-alt',
     )
 );
}

add_action( 'init', 'ttw_events_posttype' );



// Registers the new post type and taxonomy - Mission Trips

function trips_posttype() {
 register_post_type( 'trips',
     array(
         'labels' => array(
             'name' => __( 'Trips' ),
             'singular_name' => __( 'Trip' ),
             'add_new' => __( 'Add New Trip' ),
             'add_new_item' => __( 'Add New Trip' ),
             'edit_item' => __( 'Edit Trip' ),
             'new_item' => __( 'Add New Trip' ),
             'view_item' => __( 'View Trip' ),
             'search_items' => __( 'Search Trips' ),
             'not_found' => __( 'No trips found' ),
             'not_found_in_trash' => __( 'No trips found in trash' )
         ),
         'hierarchical'=> true,
         'public' => true,
         'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail', 'page-attributes' ),
         'capability_type' => 'post',
         'rewrite' => array("slug" => "mission-trip"), // Permalinks format
         'menu_position' => 5,
         'register_meta_box_cb' => 'add_apply_metabox',
         'menu_icon' => 'dashicons-location-alt',
     )
 );
}

add_action( 'init', 'trips_posttype' );


// Add the Slide URL Meta Box

function add_apply_metabox() {
 add_meta_box('wpt_apply_url', 'Apply URL', 'wpt_apply_url', 'trips', 'side', 'default');
 add_meta_box('wpt_schedule', 'Dates', 'wpt_schedule', 'trips', 'side', 'default');
 add_meta_box('wpt_cost', 'Cost', 'wpt_cost', 'trips', 'side', 'default');
 add_meta_box('wpt_gi_need', 'Project Need', 'wpt_gi_need', 'global_initiatives', 'side', 'default');
 add_meta_box('wpt_gi_donate', 'Donated Funds (offline)', 'wpt_gi_donate', 'global_initiatives', 'side', 'default');
 add_meta_box('wpt_gi_goal', 'Project Goal', 'wpt_gi_goal', 'global_initiatives', 'side', 'default');
 add_meta_box('wpt_gi_form_id', 'Enter Gravity Form ID #', 'wpt_gi_form_id', 'global_initiatives', 'side', 'default');
 add_meta_box('wpt_career_location', 'Location', 'wpt_career_location', 'jobs', 'side', 'default');
	add_meta_box('wpt_career_description', 'Job Description Link', 'wpt_career_description', 'jobs', 'side', 'default');
 add_meta_box('wpt_mm_trip_display', 'ManagedMissions Trip Display', 'wpt_mm_trip_display', 'trips', 'normal', 'high');
 // Event Metaboxes
 add_meta_box('wpt_event_date', 'Event Date(s)', 'wpt_event_date', 'events', 'side', 'high');
 add_meta_box('wpt_event_time', 'Event Time', 'wpt_event_time', 'events', 'side', 'high');
 add_meta_box('wpt_event_address', 'Event Venue Address', 'wpt_event_address', 'events', 'side', 'high');
 add_meta_box('wpt_event_contact', 'Event Contact Information', 'wpt_event_contact', 'events', 'side', 'high');

}

add_action( 'add_meta_boxes', 'add_apply_metabox' );

// The Managed Missions Trip Options Metabox

function wpt_mm_trip_display() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $mm_options = get_post_meta($post->ID, '_mm_options', true);


 ?>

 <div id="select"></div>
<div class="row">
	<h4>Which trip would you like to display?</h4>
</div>
<p>
<div class="row">
	<select id="tripselect" class="form-control" name="_mm_options" value="<?php echo $mm_options; ?>">
	  <option value="<?php echo $mm_options; ?>" selected="selected"><?php echo $mm_options; ?> is currently selected</option>
	</select>
</div>
</p>
<div class="row">
<div id="resultdiv">the request has not yet run</div>
<table class="widefat">
	<thead>
		<tr>
		<th>Departure Date</th>
		<th>Return Date</th>
		<th>Cost</th>
		<th>Qualifications</th>
		<th>Apply</th>
		</tr>
	</thead>
	<tbody id="thediv"></tbody></table>
</div>
<script>
var $j = jQuery.noConflict();
$j("#resultdiv").text("running");

//
// admin-side code to populate combo box
//
var uniqueGroupId = [];

//get current and upcoming groups (does not include past groups -- call with "Upcoming: false")
$j.ajax({
dataType: 'jsonp',
url: "https://app.managedmissions.com/API/MissionTripAPI/List",
data: "apiKey=e4c2b86c-191a-4ab9-90d6-ffcab93b8c9c"
}).done(function(result) {
 $j("#resultdiv").text("");
	$j.each(result.data, function(i, v){
	  var id = v.Id;
	  var tripName = v.TripName
	  var pubTripName = v.PublicTripName
	  var purpCode = v.PurposeCode
	  var impExpKey = v.ImportExportKey
	  var country = v.Country
	  var groupName = v.GroupName
	  var groupId = v.GroupId

	  if(!!groupId && $j.inArray(groupId, uniqueGroupId) === -1){
	    uniqueGroupId.push(groupId)
     $j("#tripselect").append($j("<option>").attr({"gName": v.GroupName, "tripName": v.TripName, "ieKey": v.ImportExportKey, "value": v.GroupId}).append(v.GroupName + " ("+v.GroupId+")"));
	  }
	});
}).fail(function() {
//todo
$j("#resultdiv").text("API request failed");
});
</script>

											<script>

											var $j = jQuery.noConflict();
											$j("#resultdiv").text("running");


											//
											// front-end code to populate table with a specific group/location list of trips
											//
											$j.ajax({
											  dataType: 'jsonp',
											  url: "https://app.managedmissions.com/API/MissionTripAPI/List",
											  data: "apiKey=e4c2b86c-191a-4ab9-90d6-ffcab93b8c9c&GroupId="+<?php echo get_post_meta(get_the_id(), "_mm_options", true); ?> //todo verify
											}).done(function(result) {
											    $j("#resultdiv").text("");
												$j("#thediv").text("");

											    $j.each(result.data, function(i, v){
												  var depDate = v.DepartureDate
												  var retDate = v.ReturnDate
												  var tripMemGoal = v.TripMemberGoal
												  var quals = v.Qualifications
												  var missApps = v.MissionApplications

												  if(quals == null) quals = ""

											      $j("#thediv").append("<tr><td>"+ depDate +"</td><td>"+ retDate +"</td><td>$"+ tripMemGoal +"</td><td>"+ quals +"</td><td id='appLinks"+i+"'></td></tr>");

												  $j.each(missApps, function(i2,v){
												    if(i2>0) $j("#appLinks"+i).append("<br>");
												    $j("#appLinks"+i).append("<a href='"+v.Url+"'>"+v.Name+"</a>")
												  })
												  //TODO #appLinks can be removed now for cleaner HTML, if desired
											    })
											}).fail(function() {
											  //todo
											  $j("#resultdiv").text("API request failed");
											});

											</script>
</p>

<?php }


// The Slide Location Metabox

function wpt_apply_url() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $url = get_post_meta($post->ID, '_url', true);

 // Echo out the field
 echo '<input type="text" name="_url" value="' . $url  . '" class="widefat" />';

}

function wpt_cost() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $cost = get_post_meta($post->ID, '_cost', true);

 // Echo out the field
 echo '<input type="text" name="_cost" value="' . $cost  . '" class="widefat" />';

}

function wpt_gi_need() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $need = get_post_meta($post->ID, '_gi_need', true);

 // Echo out the field
 echo '<input type="text" name="_gi_need" value="' . $need  . '" class="widefat" />';

}

function wpt_gi_donate() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $donate = get_post_meta($post->ID, '_gi_donate', true);

 // Echo out the field
 echo '<input type="text" name="_gi_donate" value="' . $donate  . '" class="widefat" />';

}

function wpt_gi_goal() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $goal = get_post_meta($post->ID, '_gi_goal', true);

 // Echo out the field
 echo '<input type="text" name="_gi_goal" value="' . $goal  . '" class="widefat" />';

}

function wpt_gi_form_id() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $gf_form = get_post_meta($post->ID, '_gi_form_id', true);

 // Echo out the field
 echo '<input type="text" name="_gi_form_id" value="' . $gf_form . '" class="widefat" />';

}

function wpt_career_location() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $location = get_post_meta($post->ID, '_career_location', true);

 // Echo out the field
 echo '<input type="text" name="_career_location" value="' . $location  . '" class="widefat" />';

}

function wpt_career_description() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $description = get_post_meta($post->ID, '_career_description', true);

 // Echo out the field
 echo '<input type="text" name="_career_description" value="' . $description  . '" class="widefat" />';

}


function wpt_schedule() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $schedule = get_post_meta($post->ID, '_schedule', true);

 // Echo out the field
 echo '<input type="text" name="_schedule" value="' . $schedule  . '" class="widefat" />';
}

// Event Metabox Details

function wpt_event_date() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $event_date = get_post_meta($post->ID, '_event_date', true);

 // Echo out the field
 echo '<input type="text" name="_event_date" value="' . $event_date  . '" class="widefat" />';
}

function wpt_event_time() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $event_time = get_post_meta($post->ID, '_event_time', true);

 // Echo out the field
 echo '<input type="text" name="_event_time" value="' . $event_time  . '" class="widefat" />';
}

function wpt_event_address() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $event_address = get_post_meta($post->ID, '_event_address', true);

 // Echo out the field
 echo '<input type="text" name="_event_address" value="' . $event_address  . '" class="widefat" />';
}

function wpt_event_contact() {
 global $post;

 // Noncename needed to verify where the data originated
 echo '<input type="hidden" name="applymeta_noncename" id="applymeta_noncename" value="' .
     wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

 // Get the location data if its already been entered
 $event_contact = get_post_meta($post->ID, '_event_contact', true);

 // Echo out the field
 echo '<input type="text" name="_event_contact" value="' . $event_contact  . '" class="widefat" />';
}


// enable new wysiwyg features

function ttw_add_theme_editor_style() {
 add_editor_style( 'css/editor-style.css' );
} // end reign_add_theme_editor_style
add_action( 'init', 'ttw_add_theme_editor_style' );

/*
This is not the right way to do this.
add_filter('mce_css', 'my_editor_style');
function my_editor_style($url) {
 if ( !empty($url) )
     $url .= ',';
 // Change the path here if using sub-directory
 $url .= trailingslashit( get_stylesheet_directory_uri() ) . 'editor-style.css';
 return $url;
}
*/
// Save the Metabox Data

function wpt_save_apply_meta($post_id, $post) {

 // verify this came from the our screen and with proper authorization,
 // because save_post can be triggered at other times
 if ( !wp_verify_nonce( $_POST['applymeta_noncename'], plugin_basename(__FILE__) )) {
     return $post->ID;
 }

 // Is the user allowed to edit the post or page?
 if ( !current_user_can( 'edit_post', $post->ID ))
     return $post->ID;

 // OK, we're authenticated: we need to find and save the data
 // We'll put it into an array to make it easier to loop though.

 $apply_meta['_url'] = $_POST['_url'];
 $apply_meta['_cost'] = $_POST['_cost'];
 $apply_meta['_gi_need'] = $_POST['_gi_need'];
 $apply_meta['_gi_donate'] = $_POST['_gi_donate'];
 $apply_meta['_gi_goal'] = $_POST['_gi_goal'];
 $apply_meta['_gi_form_id'] = $_POST['_gi_form_id'];
 $apply_meta['_schedule'] = $_POST['_schedule'];
 $apply_meta['_tripimage'] = $_POST['_tripimage'];
 $apply_meta['_career_location'] = $_POST['_career_location'];
 $apply_meta['_career_description'] = $_POST['_career_description'];
 $apply_meta['_mm_options'] = $_POST['_mm_options'];
 $apply_meta['_event_date'] = $_POST['_event_date'];
 $apply_meta['_event_time'] = $_POST['_event_time'];
 $apply_meta['_event_address'] = $_POST['_event_address'];
 $apply_meta['_event_contact'] = $_POST['_event_contact'];

 // Add values of $apply_meta as custom fields

 foreach ($apply_meta as $key => $value) { // Cycle through the $apply_meta array!
     if( $post->post_type == 'revision' ) return; // Don't store custom data twice
     $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
     if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
         update_post_meta($post->ID, $key, $value);
     } else { // If the custom field doesn't have a value
         add_post_meta($post->ID, $key, $value);
     }
     if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
 }

}

add_action('save_post', 'wpt_save_apply_meta', 1, 2); // save the custom fields


function trips_pages() {
 $args = array(
     'post_type' => 'trips',
     'orderby' => 'name',
     'order' => 'ASC'
 );
 $query = new WP_Query( $args );
 $excerpts = '';
 $html = '<div id="mission-trip-pages">';

 while ( $query->have_posts() ) :
     $query->the_post();
     $excerpts .= '<div id="' . get_the_title() . '" class="row mission-trip-page">';
     $excerpts .= '<div class="container">';
     $excerpts .= '<div class="col-md-3">';
     $excerpts .= '<div class="hidden-sm hidden-xs">';
     $excerpts .= get_the_post_thumbnail($post->ID, 'trip-thumb');
     $excerpts .= '</div>';
     $excerpts .= '<div class="visible-sm visible-xs">';
     $excerpts .= '<div class="trip-page-header row">';
     $excerpts .='<a href="';
     $excerpts .= get_permalink();
     $excerpts .= '">';
     $excerpts .= '<h2 class="pull-left">' . get_the_title() . '</h2>';
     $excerpts .= '</a>';
     $excerpts .= '</div> <!-- /.pag-header -->';
     $excerpts .= '<div class="the-content">';
     $excerpts .= '<p>';
     $excerpts .= get_the_excerpt();
     $excerpts .= '</p>';
     $excerpts .= '<a class="clearfix trip-more" href="';
     $excerpts .= get_permalink();
     $excerpts .= '">LEARN MORE >>';
     $excerpts .= '</a></span>';
     $excerpts .= '</div> <!-- /.the-content -->';
     $excerpts .= '</div>';
     $excerpts .= '</div> <!-- /.col3 -->';

     $excerpts .= '<div class="col-xs-12 visible-xs the-content">';
     $excerpts .= '<div class="trip-page-header row">';
     $excerpts .= '<h2 class=""><small>Trip Details</small></h2>';
     $excerpts .= '</div> <!-- /.pag-header -->';
     $excerpts .= '<div class="the-content">';
     $excerpts .= '<div class="details col-xs-12">';
     $excerpts .= '<p class="schedule">Dates</p>';
     $excerpts .= get_post_meta(get_the_id(), "_schedule", true);
		$excerpts .= '</div>';
		$excerpts .= '<div class="details col-xs-12">';
     $excerpts .= '<p class="schedule">Cost</p>';
     $excerpts .= get_post_meta(get_the_id(), "_cost", true);
     $excerpts .= '</div>';
     $excerpts .= '</div>';
     $excerpts .= '</div> <!-- /.col3 -->';


     $excerpts .= '<div class="col-md-6 col-sm-6 col-xs-12">';
     $excerpts .= '<div class="visible-sm visible-xs">';
     $excerpts .= get_the_post_thumbnail($post->ID, 'trip-thumb');
     $excerpts .= '</div>';
     $excerpts .= '<div class="hidden-sm hidden-xs">';
     $excerpts .= '<div class="trip-page-header row">';
     $excerpts .='<a href="';
     $excerpts .= get_permalink();
     $excerpts .= '">';
     $excerpts .= '<h2 class="pull-left">' . get_the_title() . '</h2>';
     $excerpts .= '</a>';
     $excerpts .= '</div> <!-- /.pag-header -->';
     $excerpts .= '<div class="the-content">';
     $excerpts .= '<p>';
     $excerpts .= get_the_excerpt();
     $excerpts .= '</p>';
     $excerpts .= '<a class="clearfix trip-more" href="';
     $excerpts .= get_permalink();
     $excerpts .= '">LEARN MORE >>';
     $excerpts .= '</a></span>';
     $excerpts .= '</div> <!-- /.the-content -->';
     $excerpts .= '</div>';
     $excerpts .= '</div> <!-- /.col6 -->';
     $excerpts .= '<div class="col-md-3 col-sm-6 hidden-xs details clearfix">';
     $excerpts .= '<h2 class="">Trip Details</h2>';
     $excerpts .= '<div class="sub-details clearfix">';
     $excerpts .= '<p class="schedule">Dates</p>';
     $excerpts .= get_post_meta(get_the_id(), "_schedule", true);
		$excerpts .= '</div>';
		$excerpts .= '<div class="sub-details clearfix">';
     $excerpts .= '<p class="schedule">Cost</p>';
     $excerpts .= get_post_meta(get_the_id(), "_cost", true);
     $excerpts .= '</div>';
     $excerpts .= '<a class="btn btn-primary apply" href="';
     $excerpts .= get_permalink();
     $excerpts .= '#trip-options';
     // $excerpts .= get_post_meta(get_the_id(), "_url", true);
     $excerpts .= '">Apply Today';
     $excerpts .= '</a>';
     $excerpts .= '</div> <!-- /.col3 -->';
     $excerpts .= '<div class="sub-details col-xs-12 visible-xs clearfix">';
     $excerpts .= '<a class="btn btn-primary btn-block apply bottom" href="';
     $excerpts .= get_permalink();
     $excerpts .= '#trip-options';
     // $excerpts .= get_post_meta(get_the_id(), "_url", true);
     $excerpts .= '">Apply Today';
     $excerpts .= '</a>';
     $excerpts .= '</div>';
     $excerpts .= '</div> <!-- /.container -->';
     $excerpts .= '</div> <!-- /.row -->';
 endwhile;

 $html .= $excerpts;
 $html .= '</div>';

 echo $html;

 wp_reset_postdata();
}



function trips_pages_menu() {
 $args = array(
     'post_type' => 'trips',
     'orderby' => 'name',
     'order' => 'ASC'
 );
 $query = new WP_Query( $args );
 $excerpts = '';

 $html = '<div class="trip-tile-menu"><div class="row">';

 while ( $query->have_posts() ) :
     $query->the_post();

     $thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, array(350, 350), true);
		$thumb_url = $thumb_url_array[0];




		$excerpts .= '<a href="#';
		$excerpts .= get_the_title();
		$excerpts .= '" alt="';
     $excerpts .= get_the_title();
     $excerpts .= '">';
     $excerpts .= '<div class="col-md-5ths col-sm-5ths trip-tile">';
     $excerpts .= '<div class="background" style="background-image:url('.$thumb_url.');">';
     $excerpts .= '</div>';
     $excerpts .= '<span class="tile-title">';
     $excerpts .= get_the_title();
     $excerpts .= '</span>';

     $excerpts .= '</div>';
     $excerpts .= '</a>';



 endwhile;

 $html .= $excerpts;
 $html .= '</div></div>';

 echo $html;

 wp_reset_postdata();
}


function custom_bootstrap_script () {
	wp_enqueue_script('bs_progress_bars', get_stylesheet_directory_uri() . '/js/bootstrap-progressbar.min.js', array( 'jquery' ));
	wp_enqueue_script('affix', get_stylesheet_directory_uri() . '/js/affix-min.js', array( 'jquery' ));

}

add_action('wp_enqueue_scripts', 'custom_bootstrap_script');

// THE SCOOP TAB CONTENT

function scoop_posttype() {
 register_post_type( 'the-scoop',
     array(
         'labels' => array(
             'name' => __( 'The Scoop' ),
             'singular_name' => __( 'Item' ),
             'add_new' => __( 'Add New Item' ),
             'add_new_item' => __( 'Add New Item' ),
             'edit_item' => __( 'Edit Item' ),
             'new_item' => __( 'Add New Item' ),
             'view_item' => __( 'View Item' ),
             'search_items' => __( 'Search Item' ),
             'not_found' => __( 'No items found' ),
             'not_found_in_trash' => __( 'No items found in trash' )
         ),
         'hierarchical'=> true,
         'public' => true,
         'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail', 'page-attributes' ),
         'capability_type' => 'page',
         'rewrite' => array("slug" => "the-scoop"), // Permalinks format
         'menu_position' => 5,
         'menu_icon' => 'dashicons-format-aside',
     )
 );
}

add_action( 'init', 'scoop_posttype' );

function get_the_slug() {

	global $post;

	if ( is_single() || is_page() ) {
	return $post->post_name;
	}
	else {
	return "";
	}

}

function the_scoop_menu() {
$args = array(
     'post_type' => 'the-scoop',
     'orderby' => 'menu_order',
     'order' => 'ASC'
 );
 $query = new WP_Query( $args );
 $excerpts = '';
 $i = 1;
 $html = '<div class="clearfix"><ul id="tab-menu" class"nav nav-tabs clearfix" role="tablist">';

 while ( $query->have_posts() ) :
     $query->the_post();
     if($i == 1) {
	        $excerpts .= '<li role="presentation" class="active"><a href="#';
	        $excerpts .= get_the_slug();
	        $excerpts .= '" aria-controls="';
	        $excerpts .= get_the_slug();
	        $excerpts .= '" role="tab" data-toggle="tab">';
	        $excerpts .= get_the_title();
	        $excerpts .= '</a></li>';
     } else {
     	$excerpts .= '<li role="presentation" class=""><a href="#';
	        $excerpts .= get_the_slug();
	        $excerpts .= '" aria-controls="';
	        $excerpts .= get_the_slug();
	        $excerpts .= '" role="tab" data-toggle="tab">';
	        $excerpts .= get_the_title();
	        $excerpts .= '</a></li>';        }
		$i ++;
 endwhile;

 $html .= $excerpts;
 $html .= '</ul></div>';

 echo $html;

 wp_reset_postdata();
}


function the_scoop_pages() {
 $args = array(
     'post_type' => 'the-scoop',
     'orderby' => 'menu_order',
     'order' => 'ASC'
 );
 $query = new WP_Query( $args );
 $excerpts = '';
 $index = 1;
 $html = '<div class="tab-content clearfix">';

 while ( $query->have_posts() ) :
     $query->the_post();
     if($index == 1) {
	        $excerpts .= '<div role="tabpanel" class="tab-pane active" id="';
	        $excerpts .= get_the_slug();
	        $excerpts .= '">';
	        $excerpts .= '<h3>';
	        $excerpts .= get_the_title();
	        $excerpts .= '</h3>';
	        $excerpts .= '<div class="the-content">';
	        $excerpts .= get_the_content();
	        $excerpts .= '</div>';
	        $excerpts .= '</div>';

     } else {
     	$excerpts .= '<div role="tabpanel" class="tab-pane" id="';
	        $excerpts .= get_the_slug();
	        $excerpts .= '">';
	        $excerpts .= '<h3>';
	        $excerpts .= get_the_title();
	        $excerpts .= '</h3>';
	        $excerpts .= '<div class="the-content">';
	        $excerpts .= get_the_content();
	        $excerpts .= '</div>';
	        $excerpts .= '</div>';
     }
     $index ++;
 endwhile;

 $html .= $excerpts;
 $html .= '</div>';

 echo $html;

 wp_reset_postdata();
}

// Job Opportunties Post Type

function jobs_posttype() {
 register_post_type( 'jobs',
     array(
         'labels' => array(
             'name' => __( 'Career Opportunities' ),
             'singular_name' => __( 'Job Opening' ),
             'add_new' => __( 'Add New Job Opening' ),
             'add_new_item' => __( 'Add New Job Opening' ),
             'edit_item' => __( 'Edit Job Opening' ),
             'new_item' => __( 'Add New Job Opening' ),
             'view_item' => __( 'View Job Opening' ),
             'search_items' => __( 'Search Job Opening' ),
             'not_found' => __( 'No job openings found' ),
             'not_found_in_trash' => __( 'No job openings found in trash' )
         ),
         'hierarchical'=> true,
         'public' => true,
         'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail', 'page-attributes' ),
         'capability_type' => 'page',
         'rewrite' => array("slug" => "job-opportunities"), // Permalinks format
         'menu_position' => 5,
         'menu_icon' => 'dashicons-id',
     )
 );
}

add_action( 'init', 'jobs_posttype' );

function career_opportunities_pages() {
 $args = array(
     'post_type' => 'jobs',
     'orderby' => 'name',
     'order' => 'ASC'
 );
 $query = new WP_Query( $args );
 $excerpts = '';

 $html = '<div class="row"><div id="post-layout" class="job-tiles">';

 while ( $query->have_posts() ) :
     $query->the_post();

     $slug = $post->post_name;

     $excerpts .= '<div class="item">';
     $excerpts .=	'<div class="job-title">';
     $excerpts .= get_the_title();
     $excerpts .= '</div>';
     $excerpts .=	'<div class="job-location">';
     $excerpts .= '<p>';
     $excerpts .= get_post_meta(get_the_id(), "_career_location", true);
     $excerpts .= '</p>';
     $excerpts .= '</div>';
     $excerpts .= '<div class="job-description">';
     $excerpts .= get_the_content();
     $excerpts .= '</div>';
     $excerpts .=	'<div class="contact">';
     $excerpts .= '<button type="button" class="btn btn-block" data-toggle="modal" data-target="#myModal">Learn More</button>';
     $excerpts .= '<small><a href="';
     $excerpts .= get_post_meta(get_the_id(), "_career_description", true);;
		$excerpts .= '">Download Job Description</a></small>';
     $excerpts .= '</div>';
     $excerpts .= '</div>';

 endwhile;

 $html .= $excerpts;
 $html .= '</div></div>';

 echo $html;

 wp_reset_postdata();
}

// CREATE JOB OPPORTUNTIES WIDGET //

// Creating the widget
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget',

// Widget name will appear in UI
__('Caeer Opportunties', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Display list of available career opportunties', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
$args = array(
     'post_type' => 'jobs',
     'orderby' => 'name',
     'order' => 'ASC',
     'posts_per_page=1',
 );
 $query = new WP_Query( $args );
 $excerpts = '';
 $html = '<ul>';

 while ( $query->have_posts() ) :
     $query->the_post();

     $excerpts .= '<li class="job-title"><a href="'.get_permalink().'" target="_blank">';
     $excerpts .= get_the_title();
     $excerpts .= '</a></li>';

	endwhile;

 $html .= $excerpts;
 $html .= '</ul></div>';

 echo $html;

 wp_reset_postdata();
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );



// update the '1' to the ID of your form
add_filter('gform_pre_render_1', 'populate_posts');

function populate_posts($form){

 foreach($form['fields'] as &$field){

     if($field['type'] != 'select' || strpos($field['cssClass'], 'job-openings-posts') === false)
         continue;

     // you can add additional parameters here to alter the posts that are retreieved
     // more info: http://codex.wordpress.org/Template_Tags/get_posts

     $posts = get_posts('post_type=jobs&numberposts=-1&orderby=name&order=asc');

     // update 'Select a Post' to whatever you'd like the instructive option to be
     $choices = array(array('text' => 'Select a Position', 'value' => ' '));

     foreach($posts as $post){
         $choices[] = array('text' => $post->post_title, 'value' => $post->post_title);
     }

     $field['choices'] = $choices;

 }

 return $form;
}


// update the '2' to the ID of your form
add_filter('gform_pre_render_2', 'populate_trips');

function populate_trips($form){

 foreach($form['fields'] as &$field){

     if($field['type'] != 'select' || strpos($field['cssClass'], 'trip-options') === false)
         continue;

     // you can add additional parameters here to alter the posts that are retreieved
     // more info: http://codex.wordpress.org/Template_Tags/get_posts

     $posts = get_posts('post_type=trips&numberposts=-1&orderby=name&order=asc');

     // update 'Select a Post' to whatever you'd like the instructive option to be
     $choices = array(array('text' => 'Select a Trip', 'value' => ' '));

     foreach($posts as $post){
         $choices[] = array('text' => $post->post_title, 'value' => $post->post_title);
     }

     $field['choices'] = $choices;

 }

 return $form;
}

// Donation Form Counter

// http://pastebin.com/kHpaHQvi originally
// http://www.gravityhelp.com/forums/topic/show-total-donations
// usage: [donations form=37] where 37 is the form ID

add_shortcode('donations', 'total_donations');
function total_donations($atts) {
     $form_id = get_post_meta(get_the_id(), "_gi_form_id", true);
     // function to pull all the entries for one form
     $donations = RGFormsModel::get_leads($form_id);
     // start the total at zero
     $total = 0;
     // initialize a counter for the number of donations made
     $i = 0;
     // loop through all the returned results
     foreach ($donations as $amount) {
             // add each donation amount to the total
             // change 3 here to the field ID which holds the donation amount
             $total += $amount[5];
             // increment the counter so we know how many donations there are as well
             $i++;
     }
     // change this to your locale, or, if your locale is already defined, you can remove this line
      // setlocale(LC_MONETARY, 'en_US');
     // do some formatting and return the html output from the shortcode
     $output = money_format('%i', $total);
     // just the string above will be returned.  You can style it here or where you are using the shortcode
     return $output;
}

// needed for the above to process the donation shortcode in sidebar widget
add_filter('widget_text', 'do_shortcode');


// Global Initiatives Post Type

function global_initiatives_posttype() {
 register_post_type( 'global_initiatives',
     array(
         'labels' => array(

             'name' => __( 'Global Initiatives' ),
             'singular_name' => __( 'Global Initiative' ),
             'add_new' => __( 'Add New Initiative' ),
             'add_new_item' => __( 'Add New Initiative' ),
             'edit_item' => __( 'Edit Initiative' ),
             'new_item' => __( 'Add New Initiative' ),
             'view_item' => __( 'View Initiative' ),
             'search_items' => __( 'Search Global Initiatives' ),
             'not_found' => __( 'No global initiatives found' ),
             'not_found_in_trash' => __( 'No global initiatives found in trash' )
         ),
         'hierarchical'=> true,
         'public' => true,
         'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail', 'page-attributes' ),
         'capability_type' => 'page',
         'rewrite' => array("slug" => "global-initiatives"), // Permalinks format
         'menu_position' => 5,
         'menu_icon' => 'dashicons-admin-site',
     )
 );
}

add_action( 'init', 'global_initiatives_posttype' );

// Register Custom Taxonomy
function global_initiatives_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Project Types', 'Taxonomy General Name', TRANSLATION_KEY ),
		'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', TRANSLATION_KEY ),
		'menu_name'                  => __( 'Project Types', TRANSLATION_KEY ),
		'all_items'                  => __( 'All Project Types', TRANSLATION_KEY ),
		'parent_item'                => __( 'Parent Project Type', TRANSLATION_KEY ),
		'parent_item_colon'          => __( 'Parent Project Type:', TRANSLATION_KEY ),
		'new_item_name'              => __( 'New Project Type', TRANSLATION_KEY ),
		'add_new_item'               => __( 'Add New Project Type', TRANSLATION_KEY ),
		'edit_item'                  => __( 'Edit Project Type', TRANSLATION_KEY ),
		'update_item'                => __( 'Update Project Type', TRANSLATION_KEY ),
		'separate_items_with_commas' => __( 'Select one project type to display', TRANSLATION_KEY ),
		'search_items'               => __( 'Search Project Types', TRANSLATION_KEY ),
		'add_or_remove_items'        => __( 'Add or remove project types', TRANSLATION_KEY ),
		'choose_from_most_used'      => __( 'Choose from the most used project types', TRANSLATION_KEY ),
		'not_found'                  => __( 'Not Found', TRANSLATION_KEY ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_type', array( 'global_initiatives' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'global_initiatives_taxonomy', 0 );




function global_initiatives_pages() {
 $args = array(
     'post_type' => 'global_initiatives',
     'orderby' => 'name',
     'order' => 'ASC'
 );
 $query = new WP_Query( $args );

 $excerpts = '';
 $html = '<div class="row"><div id="post-layout" class="gi-tiles">';

 while ( $query->have_posts() ) :
     $query->the_post();

     $excerpts .= '<div class="item col-md-12 clearfix">';
     $excerpts .= '<div class="gi-title clearfix">';
     $excerpts .= get_the_title();
     $excerpts .= '<span class="pull-right type">';
     $excerpts .=  custom_taxonomies_terms_links();
     $excerpts .= '</span>';
     $excerpts .= '</div>';
		$excerpts .= '<div class="col-md-8 col-sm-6 section gi-float-left">';
			$excerpts .= get_the_content_with_formatting();
		$excerpts .= '</div>';
		$excerpts .= '<div class="col-md-4 col-sm-6 section gi-float-right">';
			$excerpts .= get_the_post_thumbnail();
		$excerpts .= '</div>';
		$excerpts .= '<div class="col-xs-12 details section gi-float-left">';
			$excerpts .= '<p class="details-title">Project Details</p>';

			$excerpts .= '<div class="col-md-3 col-sm-6 col-xs-12 section">';
				$excerpts .= '<p><span class="heading">Need:</span> ';
		        $excerpts .= get_post_meta(get_the_id(), "_gi_need", true);
		        $excerpts .='</p>';
			$excerpts .= '</div>';

			$excerpts .= '<div class="col-md-3 col-sm-6 col-xs-12 section">';
				$excerpts .= '<p><span class="heading">Goal:</span>';
		        $now_goal = get_post_meta(get_the_id(), "_gi_goal", true);
		        $excerpts .= money_format('$%i', $now_goal );
		        $excerpts .='</p>';
			$excerpts .= '</div>';

			$excerpts .= '<div class="col-md-3 col-sm-6 col-xs-12 section">';
				$excerpts .= '<p><span class="heading">Amount Raised:</span> $';
		        $atts = get_post_meta(get_the_id(), "_gi_form_id", true);
		        $donate = get_post_meta(get_the_id(), "_gi_donate", true);
		        $raised = total_donations($atts) + $donate;

		        $goal = get_post_meta(get_the_id(), "_gi_goal", true);
		        $result = round((($raised / $goal) *100), 1);
		        $excerpts .= ''.$raised.' / '.$result.'%';
		        $excerpts .='</p>';
			$excerpts .= '</div>';

			$excerpts .= '<div class="col-md-3 col-sm-6 col-xs-12 section">';
				$excerpts .= '<button type="button" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#';
		        $excerpts .= get_the_slug();
		        $excerpts .= '">Donate Now</button>';
			$excerpts .= '</div>';

		$excerpts .= '</div>';






     $excerpts .= '</div>';
     $excerpts .= '</div>';

		$excerpts .= '<div class="donor-form">';
			$excerpts .= '<div class="modal fade" id="';
			$excerpts .= get_the_slug();
			$excerpts .= '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
			  $excerpts .= '<div class="modal-dialog">';
			    $excerpts .= '<div class="modal-content">';
			      $excerpts .= '<div class="modal-header">';
			        $excerpts .= '<h4 class="modal-title" id="myModalLabel">Donate Now to ';
			        $excerpts .= get_the_title();
			        $excerpts .= '</h4>';
			      $excerpts .= '</div>';
			      $excerpts .= '<div class="modal-body">';
				      $atts = get_post_meta(get_the_id(), "_gi_form_id", true);
				   $excerpts .=  do_shortcode('[gravityform id='.$atts.' title=false]');
			      $excerpts .= '</div>';
			      $excerpts .= '<div class="modal-footer">';
			        $excerpts .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
			      $excerpts .= '</div>';
			    $excerpts .= '</div>';
			  $excerpts .= '</div>';
			$excerpts .= '</div>';
     $excerpts .= '</div>';

 endwhile;

 $html .= $excerpts;
 $html .= '</div></div>';

 echo $html;

 wp_reset_postdata();
}

// CUSTOM Excerpt Lengths
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

// get taxonomies terms links
function custom_taxonomies_terms_links(){
// get post by post id
$post = get_post( $post->ID );

// get post type by post
$post_type = $post->post_type;

// get post type taxonomies
$taxonomies = get_object_taxonomies( $post_type, 'objects' );

$out = array();
foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

 // get the terms related to post
 $terms = get_the_terms( $post->ID, $taxonomy_slug );

 if ( !empty( $terms ) ) {
   foreach ( $terms as $term ) {
     $out[] =
       '  <span>'
     .    $term->name
     . "</span>\n";
   }
   $out[] = "\n";
 }
}

return implode('', $out );
}


// Change Admin Login Logo

function my_login_logo() { ?>
 <style type="text/css">
     body.login div#login h1 a {
         background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/ttw-white-circle.png);
         padding-bottom: 0px;
         width: 250px;
         height: 245px;
         background-size: contain;
     }
     body.login {background: #00B3b0;}
     body.login div#login a {color:#01605e;padding: 10px;text-align: center;}
     body.login div#login a:hover {color: #fff;border:1px solid #fff;}
     input#wp-submit.button.button-primary.button-large {border-radius:0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;background:#ef4e24;box-shadow:none;-moz-box-shadow:none;-webkit-box-shadow:none;border: none;}
     input#wp-submit.button.button-primary.button-large:hover {
	        background-color: #666;
     }
 </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


// Stff Post Type

function ttw_staff_posttype() {
 register_post_type( 'staff',
     array(
         'labels' => array(

             'name' => __( 'Staff' ),
             'singular_name' => __( 'Staff' ),
             'add_new' => __( 'Add New Staff' ),
             'add_new_item' => __( 'Add New Staff' ),
             'edit_item' => __( 'Edit Staff' ),
             'new_item' => __( 'Add New Staff' ),
             'view_item' => __( 'View Staff' ),
             'search_items' => __( 'Search Staff' ),
             'not_found' => __( 'No staff found' ),
             'not_found_in_trash' => __( 'No staff found in trash' )
         ),
         'hierarchical'=> true,
         'public' => true,
         'supports' => array( 'title', 'thumbnail' ),
         'capability_type' => 'post',
         'rewrite' => array("slug" => "staff"), // Permalinks format
         'menu_position' => 5,
         'menu_icon' => 'dashicons-groups',
     )
 );
}

add_action( 'init', 'ttw_staff_posttype' );


// Newsletters Post Type

function ttw_newsletters_posttype() {
 register_post_type( 'newsletters',
     array(
         'labels' => array(

             'name' => __( 'Newsletters' ),
             'singular_name' => __( 'Newsletter' ),
             'add_new' => __( 'Add New Newsletter' ),
             'add_new_item' => __( 'Add New Newsletter' ),
             'edit_item' => __( 'Edit Newsletter' ),
             'new_item' => __( 'Add New Newsletter' ),
             'view_item' => __( 'View Newsletter' ),
             'search_items' => __( 'Search Newsletters' ),
             'not_found' => __( 'No newsletters found' ),
             'not_found_in_trash' => __( 'No newsletters found in trash' )
         ),
         'hierarchical'=> true,
         'public' => true,
         'supports' => array( 'title', 'thumbnail' ),
         'capability_type' => 'post',
         'rewrite' => array("slug" => "staff/newsletters"), // Permalinks format
         'menu_position' => 5,
         'menu_icon' => 'dashicons-media-text',
     )
 );
}

add_action( 'init', 'ttw_newsletters_posttype' );

// Register Custom Taxonomy
function ttw_newsletters_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Staff Member', 'Taxonomy General Name', TRANSLATION_KEY ),
		'singular_name'              => _x( 'Staff Member', 'Taxonomy Singular Name', TRANSLATION_KEY ),
		'menu_name'                  => __( 'Staff Members', TRANSLATION_KEY ),
		'all_items'                  => __( 'All Staff Members', TRANSLATION_KEY ),
		'parent_item'                => __( 'Parent Staff Member', TRANSLATION_KEY ),
		'parent_item_colon'          => __( 'Parent Staff Member:', TRANSLATION_KEY ),
		'new_item_name'              => __( 'New Staff Member', TRANSLATION_KEY ),
		'add_new_item'               => __( 'Add New Staff Member', TRANSLATION_KEY ),
		'edit_item'                  => __( 'Edit Staff Member', TRANSLATION_KEY ),
		'update_item'                => __( 'Update Staff Member', TRANSLATION_KEY ),
		'separate_items_with_commas' => __( 'Select one staff member to display', TRANSLATION_KEY ),
		'search_items'               => __( 'Search Staff Members', TRANSLATION_KEY ),
		'add_or_remove_items'        => __( 'Add or remove staff members', TRANSLATION_KEY ),
		'choose_from_most_used'      => __( 'Choose from the most used staff members', TRANSLATION_KEY ),
		'not_found'                  => __( 'Not Found', TRANSLATION_KEY ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'Staff Name', array( 'newsletters' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ttw_newsletters_taxonomy', 0 );



/**
 * Override Read More excerpt links from the UnderStrap Parent Theme (see understrap/functions.php)
 * @var [type]
 */

add_filter( 'excerpt_more', 'custom_excerpt_more' );
add_filter( 'wp_trim_excerpt', 'all_excerpts_get_more_link' );

if ( ! function_exists( 'custom_excerpt_more' ) ) {
	function custom_excerpt_more( $more ) {
		return '';
	}
}

if ( ! function_exists( 'all_excerpts_get_more_link' ) ) {
	function all_excerpts_get_more_link( $post_excerpt ) {
		return $post_excerpt;
	}
}
