<?php 	

	/**
	 * get_bloc_texte
	 *
	 *  @type	function
	 *  @date	16/06/16
	 *  @since	1.0.0
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF text fields
	 */

	function get_bloc_texte (){

		$fluxi_content_text = get_sub_field('texte');		

		if( $fluxi_content_text ):

			return $fluxi_content_text;

		endif;	

	}
		
?>
