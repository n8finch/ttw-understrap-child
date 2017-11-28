/**
 * Add all custom JS to this scoped function
 */

(function($) {

	$(document).ready(function() {

		// Add in slider controls functionality again
		$('.carousel').carousel('cycle');


		// Fix custom tabs on The Scoop page
		if( $('body').hasClass('page-template-template-the-scoop') ) {

			$('.nav-link').click( function( e ) {
				var hash = e.target.hash;

				$('.tab-pane').hide();
				$(hash).show();

			});
		}
	});

}(jQuery));
