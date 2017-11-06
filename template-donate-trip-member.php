<?php
/**
 * Template Name: Donate (Trip Member)
 *
 * The template for rendering the trip member donate page.
 *
 * @package lean
 * @version	2.0
 * @since 	2.0
 */
?>
<?php get_header(); ?>

<!-- Select Picker -->
<!-- DOCS: http://silviomoreto.github.io/bootstrap-select/ -->

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/select/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/js/select/bootstrap-select.min.css">

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.selectpicker').selectpicker()
    jQuery('.donatebutton').hide()

    jQuery.ajax({
      dataType: 'jsonp',
      url: "https://ttw.managedmissions.com/API/PublicProfile",
      data: "apiKey=e4c2b86c-191a-4ab9-90d6-ffcab93b8c9c"
    }).done(function(result) {
        if(jQuery.isEmptyObject(result)){
            //todo
        } else {
            jQuery.each(result, function(i, v){
              jQuery("select").append(jQuery("<option>").attr({"fname": v.FirstName, "lname": v.LastName, "tname": v.TripName, "url": v.PublicPageUrl}).append(v.FirstName + " " + v.LastName + " ("+v.TripName+")"));
            })
            jQuery('.selectpicker').selectpicker('refresh')
        }
    }).fail(function() {
      //todo
    });


    jQuery('.selectpicker').change(function(){
        sel = jQuery('.selectpicker option:selected')
        jQuery('.donatebutton').attr('target', '_blank').attr('href', sel.attr('url')).text('Support ' + sel.attr('fname')).show()
    })
})
</script>

<!-- /Select Picker -->

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

                                        <!-- TRIP MEMBER SEARCH GOES HERE -->
                                        <div class="well clearfix">
                                        <div class="row clearfix">
                                        <div class="form-group input-lg clearfix">
								        <label for="bsSelect" class="col-md-4 col-sm-12 col-xs-12 control-label">Please select a trip participant:</label>
								        <div class="col-md-8 col-sm-12 col-xs-12">
									        <select id="bsSelect" class="selectpicker form-control" data-live-search="true" data-size="10">
                                                <option disabled="disabled">Enter a name</option>
                                            </select>
								        </div>
                                        </div><!-- /form-group -->
                                        </div><!-- /row -->

                                        <!-- this area would be displayed once a name is selected -->
                                        <div class="trip-member-donate-button">
                                        <hr />
                                        <div class="row clearfix">
                                        	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                                        		<a class="btn btn-primary btn-lg btn-block donatebutton" href="#" target="">Choose a trip participant above</a>
                                        	</div>
                                        </div><!-- / row -->
                                        </div><!-- /trip-member-donate-button -->
                                        </div><!-- /well -->
                                        <!-- CLOSE TRIP MEMBER SEARCH -->

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