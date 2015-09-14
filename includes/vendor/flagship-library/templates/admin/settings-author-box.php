<?php
/**
 * A template part for the author box settings on the user profile screens.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.4.0
 */
?>
<h3><?php _e( 'Author Box Settings', 'compassbuildingrome-mpw-rome' ); ?></h3>

<p><span class="description"><?php _e( 'Choose where you would like to display an author box.', 'compassbuildingrome-mpw-rome' ); ?></span></p>

<table class="form-table">
	<tbody>
		<tr>
			<td>
				<label for="flagbox[flagship_author_box_single]">
					<input id="flagbox[flagship_author_box_single]" name="flagbox[flagship_author_box_single]" type="checkbox" value="1" <?php checked( $single_box ); ?> />
					<?php _e( 'Enable Author Box on this User\'s Posts?', 'compassbuildingrome-mpw-rome' ); ?>
				</label><br />

				<label for="flagbox[flagship_author_box_archive]">
					<input id="flagbox[flagship_author_box_archive]" name="flagbox[flagship_author_box_archive]" type="checkbox" value="1" <?php checked( $archive_box ); ?> />
					<?php _e( 'Enable Author Box on this User\'s Archives?', 'compassbuildingrome-mpw-rome' ); ?>
				</label>
			</td>
		</tr>
	</tbody>
</table>
