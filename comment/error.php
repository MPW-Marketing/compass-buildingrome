<?php
/**
 * A template part to display when comments are closed.
 *
 * @package     CompassBuildingRome
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<?php if ( pings_open() && ! comments_open() ) : ?>

	<p class="comments-closed pings-open">
		<?php
			// Translators: The two %s are placeholders for HTML. The order can't be changed.
			printf(
				__( 'Comments are closed, but %strackbacks%s and pingbacks are open.', 'compassbuildingrome-mpw-rome' ),
				'<a href="' . esc_url( get_trackback_url() ) . '">',
				'</a>'
			);
		?>
	</p><!-- .comments-closed .pings-open -->
	<?php

elseif ( ! comments_open() ) : ?>

	<p class="comments-closed">
		<?php _e( 'Comments are closed.', 'compassbuildingrome-mpw-rome' ); ?>
	</p><!-- .comments-closed -->

	<?php

endif;
