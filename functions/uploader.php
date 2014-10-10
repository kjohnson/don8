<?php

// Main function
if ( ! function_exists( 'don8_media_uploader' ) ) {
	function don8_media_uploader( $meta_name, $meta_value, $button_name = 'Choose/Upload an Image' ) {

		$image = wp_get_attachment_image_src( $meta_value, 'thumb' ); ?>
		<div class="don8-media-upload">
			<img class="don8-preview" src="<?php echo $image[0]; ?>"/>

			<div style="clear:both;"></div>
			<input type="hidden" class="don8-media" name="<?php echo $meta_name; ?>" id="<?php echo $meta_name; ?>"
			       value="<?php echo $meta_value; ?>"/>
			<input type="button" class="don8-button button" value="<?php echo $button_name; ?>"
			       onclick="don8_media_uploader(this)"/>
			<input type="button" class="don8-button-remove button" value="Remove Image"
			       onclick="don8_media_uploader_remove(this)" />
		</div>
	<?php
	}
}