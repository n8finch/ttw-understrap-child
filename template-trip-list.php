<?php
/**
 * Template Name: Trip List Page
 *
 * The template for rendering the list of trips.
 *
 * @package lean
 * @version	2.0
 * @since 	2.0
 */
?>
<?php get_header(); ?>
<div class="sub-nav gold">
	<div class="container">
		<ul>
	<?php $value_title = get_post_meta($post->ID, '_cmb_trip_value_props', true); ?>

	<?php
	$i = 0;
	foreach($value_title as $value_title )
	{
		echo '<li><button type="button" class="btn btn-sm" data-toggle="modal" data-target="#'.$i.'">'.$value_title['title'].'</button></li>';

		$i++;
	}

?>
		</ul>
<?php $value_content = get_post_meta($post->ID, '_cmb_trip_value_props', true); ?>

	<?php
	$x = 0;
	foreach($value_content as $value_content )
	{

		echo '<div class="modal fade" id="'.$x.'" tabindex="-1" role="dialog" aria-labelledby="'.$value_content['title'].'Label" aria-hidden="true">';
		echo '<div class="modal-dialog">';
		echo '<div class="modal-content">';
		echo '<div class="modal-header">';
        echo '<h4 class="modal-title" id="'.$value_content['title'].'">'.$value_content['title'].'</h4>';
		echo '</div>';
		echo '<div class="modal-body">';
        echo '<p>'.$value_content['content'].'</p>';
		echo '</div>';
		echo '<div class="modal-footer">';
		echo '<button type="button" class="close btn btn-primary " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">CLOSE</span></button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';

		$x++;
	}

?>
	</div>
</div>
<div id="wrapper">
			<div class="row aqua">
				<div class="container">
					<div class="col-sm-12">
						<?php trips_pages_menu(); ?>
					</div>
				</div>
			</div>
            <div class="row">

					<?php trips_pages(); ?>
            </div><!--/ row -->
            <div class="advanced-trips-cta row aqua">
	            <div class="col-md-8">
		            <p class="text-center"><?php $cta_title = get_post_meta($post->ID, '_cmb_advanced_trip_cta_text', true); echo $cta_title?></p>
	            </div>
	            <div class="col-md-4">
		            <a href="<?php $cta_link = get_post_meta($post->ID, '_cmb_advanced_trip_cta_button_link', true); echo $cta_link?>" class="btn btn-large btn-block"><?php $cta_button = get_post_meta($post->ID, '_cmb_advanced_trip_cta_button_text', true); echo $cta_button?></a>
	            </div>
            </div>
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>
