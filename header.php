<?php
/**
 * The template for displaying the header
 *
 * @package lean
 * @version	1.1
 * @since 	1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8 ]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="https://use.typekit.net/hfi0zom.css">
	
    <title><?php wp_title( '' ); ?></title>
    <?php global $post; ?>
    <?php wp_head(); ?>
    <!-- <script src="//use.typekit.net/swn5oma.js"></script> -->
	<script>try{Typekit.load();}catch(e){}</script>
	<script type="text/javascript">
	            jQuery(document).ready(function() {

            jQuery('header').affix({
      offset: {
        top: jQuery('nav').height()
      }
});
          jQuery('header').on('affix.bs.affix', function () {
            var navHeight = jQuery('.menu-above-header').outerHeight(true);
            jQuery('#wrapper').css('margin-top', navHeight);
			jQuery('#image-slider').css('margin-top', navHeight);
            jQuery('header + .container').css('margin-top', navHeight);
		});
          jQuery('header').on('affix-top.bs.affix', function () {
			 jQuery('#wrapper').css('margin-top', 0);
			 jQuery('#image-slider').css('margin-top', 0);
             jQuery('header + .container').css('margin-top', 0);
		});

        });
	</script>
</head>
<?php $presentation_options = get_option( 'theme_presentation_options' ); ?>
<?php $dark = 'dark' == $presentation_options['contrast']; ?>
<?php $bodyClass = $dark ? '' : ' light'; ?>
<body <?php body_class($bodyClass); ?>>

<?php if( is_offline() && ! current_user_can( 'manage_options' ) ) { ?>
    <?php get_template_part( 'page', 'offline-mode' ); ?>
    <?php exit; ?>
<?php } // end if ?>

<?php get_template_part( 'lib/breadcrumbs/breadcrumbs' ); ?>
<?php if( has_nav_menu( 'menu_above_logo' ) ) { ?>
    <nav class="menu-above-header menu-navigation navbar-static-top navbar navbar-default<?php echo $dark ? ' navbar-inverse' : ''; ?>" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <div class="visible-xs">
                    <?php $social_options = get_option( 'theme_social_options' ); ?>
                    <?php if( isset( $social_options['active-social-icons'] ) && '' != $social_options['active-social-icons'] ) { ?>
                        <?php get_template_part( 'social-networking' ); ?>
                    <?php } // end if ?>
                </div>
            </div>

            <div class="menu-above">
                <?php
                wp_nav_menu(
                    array(
                        'container_class'	=> 'menu-header-container',
                        'theme_location'  	=> 'menu_above_logo',
                        'items_wrap'      	=> '<ul id="%1$s" class="nav navbar-right navbar-nav %2$s">%3$s</ul>',
                        'fallback_cb'	  	=> null,
                        'walker'			=> new Bootstrap_Nav_Walker()
                    )
                );
                ?>

                <div class="hidden-xs">
                    <?php $social_options = get_option( 'theme_social_options' ); ?>
                    <?php if( isset( $social_options['active-social-icons'] ) && '' != $social_options['active-social-icons'] ) { ?>
                        <?php get_template_part( 'social-networking' ); ?>
                    <?php } // end if ?>
                </div>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
        </div><!-- ./navbar-inner -->
    </nav> <!-- /#menu-under-header -->
<?php } // end if ?>

<?php
// Check to see if there is a header image, to set a class for the positioning of the logo
$header_image = get_header_image();
$head_class = ! empty( $header_image ) ? 'imageyup' : 'imageless';
?>

<header class="header jumbotron  <?php echo $head_class; ?> sticky-menu affix">

    <div id="head-wrapper" class="container">

        <?php // If a user has uploaded a header image, then display at as an anchor to the header ?>
        <?php if( 'imageyup' == $head_class && ! empty( $header_image ) ) { ?>

            <div id="header-image" class="row">
                <div class="col-12 col-md-12">

                    <?php if( is_front_page() || is_archive() || 'video' == get_post_format() || 'image' == get_post_format() || '' == get_the_title() ) { ?>
                        <h1>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                                <img src="<?php esc_url( header_image() ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                            </a>
                        </h1>
                    <?php } else { ?>
                        <p>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                                <img src="<?php esc_url( header_image() ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                            </a>
                        </p>
                    <?php } // end if/else ?>

                </div><!-- /.span12 -->
            </div><!-- /#header-image -->

        <?php } else { ?>

            <div id="hgroup" class="clearfix">

                <div id="logo" class="pull-left">

                    <?php // If a logo has been set in the theme Presentation options, display it ?>
                    <?php if( has_logo() ) { ?>

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                            <img src="<?php echo $presentation_options['logo']; ?>" alt="<?php bloginfo( 'name' ); ?>" id="header-logo" />
                        </a>

                        <?php // Otherwise, we'll display the header text ?>
                    <?php } else if( has_header_text() ) { ?>

                        <?php // If the user is on the front page, archive page, or one of the post formats without titles, we render h1's. ?>
                        <?php if( is_home() || is_archive() || 'video' == get_post_format() || 'image' == get_post_format() || '' == get_the_title() ) { ?>

                            <h1 id="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </h1><!-- /#site-title -->

                        <?php } else { ?>

                            <p id="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </p><!-- /#site-title -->

                        <?php } //end if/else ?>

                        <p><small id="site-description"><?php bloginfo( 'description' ); ?></small></p>

                    <?php } // end if/else ?>

                </div><!-- /#logo -->

               <?php if( has_nav_menu( 'menu_below_logo' ) ) { ?>
			   <!-- Place Mobile Menu Button -->
			   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menu-below">
                   <span>Menu</span>
               </button>
    <nav class="menu-below-header menu-navigation navbar-static-top navbar navbar-right<?php echo $dark ? ' navbar-inverse' : ''; ?>" role="navigation">

            <div class="navbar-header">
                <!-- Menu Button was here -->
                <?php if( ! has_nav_menu( 'menu_above_logo' ) ) { ?>
                    <div class="visible-xs">
                        <?php get_template_part( 'social-networking' ); ?>
                    </div>
                <?php } // end if ?>
            </div>

            <div class="collapse navbar-collapse menu-below">
                <?php
                wp_nav_menu(
                    array(
                        'container_class'	=> 'menu-header-container',
                        'theme_location'  	=> 'menu_below_logo',
                        'items_wrap'      	=> '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
                        'fallback_cb'	  	=> null,
                        'walker'			=> new Bootstrap_Nav_Walker()
                    )
                );
                ?>

                <div class="hidden-xs">
                    <?php if( ! has_nav_menu( 'menu_above_logo' ) ) { ?>
                        <?php get_template_part( 'social-networking' ); ?>
                    <?php } // end if ?>
                </div>

            </div><!-- /.nav-collapse -->



            </div><!-- /#hgroup -->

        <?php } //end if/else ?>

    </div><!-- /#head-wrapper -->
</header><!-- /#header -->

        </div><!-- ./navbar-inner -->
    </nav> <!-- /#menu-under-header -->
<?php } // end if ?>
