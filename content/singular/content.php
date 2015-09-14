<?php
/**
 * A template part for displaying single entries.
 *
 * @package     CompassBuildingRome
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
$show_title = true;
$should_hide = get_post_meta( get_the_id() , 'rw_hide_title', true );
//if ( get_post_meta( get_the_id() , 'rw_hide_title', true ) == true )
?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<header class="entry-header">

		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

		<p class="entry-meta">
			<?php flagship_entry_author(); ?>
			<?php flagship_entry_published(); ?>
			<?php flagship_entry_comments_link(); ?>
			<?php edit_post_link(); ?>
		</p><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'content/parts/entry-footer' ); ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
