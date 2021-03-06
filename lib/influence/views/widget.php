<?php
/**
 * Renders the the Influence Widget.
 *
 * @package		lean
 * @subpackage	Influence Widget
 * @version 	1.1.3
 * @since		1.0
 */
?>
<?php if( $this->supports_outbound_requests() ) { ?>
	<?php echo $args['before_widget']; ?>
		
		<?php if( 'both' == $display || 'total' == $display ) { ?>
			<div class="si-total">
				<div class="si-total-number"><?php  echo $this->get_total_influence_count( $twitter, $facebook ); ?></div>
				<span class="si-total-title">Social Influence</span>
			</div><!-- /.si-total -->
		<?php } // end if  ?>
	
		<?php if( 'both' == $display || 'each' == $display ) { ?>
			<div class="si-individual">
				<ul class="si-indvidual-list">
					<?php if( '' != $twitter ) { ?>
						<li class="si-twitter pull-left">
							<span class="fa fa-twitter-square"></span><a href="http://twitter.com/<?php echo $twitter; ?>/" title="Twitter" target="_blank"><?php echo number_format( $this->twitter_follower_count( $twitter ) ); ?></a>
						</li>
					<?php } // end if ?>
					
					<?php if( '' != $facebook ) { ?>
						<li class="si-facebook pull-right">
                            <span class="fa fa-facebook-square"></span><a href="http://facebook.com/<?php echo $facebook; ?>/" title="Facebook" target="_blank"><?php echo number_format( $this->facebook_like_count( $facebook ) ); ?></a>
						</li>
					<?php } // end if ?>
				</ul>
			</div><!-- /.si-individual -->
		<?php } // end if/else ?>
		
	<?php echo $args['after_widget']; ?>
<?php } // end if ?>