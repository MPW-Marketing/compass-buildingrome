<?php
/**
 * A template part for displaying single pages.
 *
 * @package     CompassBuildingRome
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

$hide_title = get_post_meta( get_the_id() , 'rw_hide_title', true );

?>
<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<header class="entry-header">
	<?php if (!$hide_title) { ?>
		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
<?php	} ?>
	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php if ( current_user_can( 'edit_pages' ) ) : ?>
		<footer class="entry-footer">
			<?php edit_post_link(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
