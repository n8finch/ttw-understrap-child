<?php
/**
 * The template for rendering the footer.
 *
 * @version	1.1
 * @since 	1.0
 */
?>
<?php $presentation_options = get_option( 'theme_presentation_options' ); ?>
<?php $dark = 'dark' == $presentation_options['contrast']; ?>
<?php if(!is_front_page()): ?>
<?php bcd_orange_intro_bar(); ?>
<?php endif; ?>
<footer>

    <nav id="footer-menu" class="menu-navigation navbar-fixed-bottom navbar navbar-default<?php echo $dark ? ' navbar-inverse' : ''; ?>" role="navigation">
        <div class="container">

                    <div class="row">

                        <div class="footer-widget col-md-4 col-sm-6 col-xs-6">
                            <?php dynamic_sidebar( 'sidebar-3' ); ?>
                            <span class="footer-social"><?php get_template_part( 'social-networking' ); ?></span>
							<?php $global_options = get_option( 'theme_global_options' ); ?>
                        </div><!-- /.footer-widget  -->


                        <div class="footer-widget col-md-4 col-sm-6 col-xs-6">
                            <?php dynamic_sidebar( 'sidebar-5' ); ?>
                        </div><!-- /.footer-widget  -->

						<div class="footer-widget col-md-3 col-md-offset-1 col-sm-12 col-xs-12 visible-md visible-lg">
							<a href="<?php echo home_url();?>/donate" class="btn btn-primary pull-right">Donate</a>
			                <p class="navbar-text navbar-right">
			                    <?php if( 'always' == $presentation_options['display_footer_credits'] ) { ?>
			                        <?php
			                            $bcd_url = 'http://brooklyncreativedesign.com';
			                            $theme_url = THEME_URL;
			                        ?>
			                        <?php if( null != get_page_by_path( 'privacy-policy' ) && 0 != get_page_by_path( 'privacy-policy' )->ID && 'publish' == get_page_by_path( 'privacy-policy' )->post_status ) { ?>
			                            <?php printf( __( '&copy; %1$s %2$s<br />%3$s | %4$s', TRANSLATION_KEY ), date( 'Y' ), '<a class="navbar-link" href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>', '<a class="navbar-link" href="' . get_permalink( get_page_by_path( 'privacy-policy' )->ID ) . '">Privacy Policy</a>', '<a class="navbar-link" href="' . $bcd_url . '" target="_blank">Site Credits</a>' ); ?>
			                        <?php } else { ?>
			                            <?php printf( __( '&copy; %1$s %2$s<br />%3$s', TRANSLATION_KEY ), date( 'Y' ), '<a class="navbar-link" href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>', '<a class="navbar-link" href="' . $bcd_url . '" target="_blank">Site Credits</a>' ); ?>
			                        <?php } // end if/else ?>
			                    <?php } else { ?>
			                        <?php printf( __( '&copy; %1$s %2$s', TRANSLATION_KEY ), date( 'Y' ), '<a class="navbar-link" href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>'); ?>
			                    <?php } // end if ?>
			                    </p>
			                <div class="affiliations">
			                	<?php dynamic_sidebar( 'sidebar-12' ); ?>
			                </div>

						</div><!-- /.footer-widget  -->
                    </div><!-- /row -->
					<div class="row clearfix bottom-footer hidden-md hidden-lg">
						<div class="footer-widget col-sm-6">
							<a href="<?php echo home_url();?>/donate" class="btn btn-primary btn-block">Donate</a>
			                <p class="navbar-text navbar-right">
			                    <?php if( 'always' == $presentation_options['display_footer_credits'] ) { ?>
			                        <?php
			                            $bcd_url = 'http://brooklyncreativedesign.com';
			                            $theme_url = THEME_URL;
			                        ?>
			                        <?php if( null != get_page_by_path( 'privacy-policy' ) && 0 != get_page_by_path( 'privacy-policy' )->ID && 'publish' == get_page_by_path( 'privacy-policy' )->post_status ) { ?>
			                            <?php printf( __( '&copy; %1$s %2$s<br />%3$s | %4$s', TRANSLATION_KEY ), date( 'Y' ), '<a class="navbar-link" href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>', '<a class="navbar-link" href="' . get_permalink( get_page_by_path( 'privacy-policy' )->ID ) . '">Privacy Policy</a>', '<a class="navbar-link" href="' . $bcd_url . '" target="_blank">Site Credits</a>' ); ?>
			                        <?php } else { ?>
			                            <?php printf( __( '&copy; %1$s %2$s<br />%3$s', TRANSLATION_KEY ), date( 'Y' ), '<a class="navbar-link" href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>', '<a class="navbar-link" href="' . $bcd_url . '" target="_blank">Site Credits</a>' ); ?>
			                        <?php } // end if/else ?>
			                    <?php } else { ?>
			                        <?php printf( __( '&copy; %1$s %2$s', TRANSLATION_KEY ), date( 'Y' ), '<a class="navbar-link" href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>'); ?>
			                    <?php } // end if ?>
			                    </p>
						</div>

						<div class="footer-widget col-sm-6">
			                <div class="affiliations">
			                	<?php dynamic_sidebar( 'sidebar-12' ); ?>
			                </div>

						</div><!-- /.footer-widget  -->
					</div>

        </div><!-- /.container -->
    </nav> <!-- /#menu-under-header -->

</footer><!-- /#footer -->
<?php wp_footer(); ?>
</body>
</html>
