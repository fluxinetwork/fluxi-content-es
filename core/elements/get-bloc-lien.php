<?php 	

	/**
	 * get_bloc_lien
	 *
	 *  @type	function
	 *  @date	28/09/17
	 *  @since	1.1.0
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF text fields
	 */

	function get_bloc_lien (){

		$fluxi_content_lien = get_sub_field('texte_lien');
		$type_lien = get_sub_field('type_lien');
		$target = '';

		if( $fluxi_content_lien ):			
			// Option externe
			if ( $type_lien && in_array("externe", $type_lien) ):
				$target = ' target="_blank"';				
			endif;
			// Bouton
			if( $type_lien && in_array("bouton", $type_lien) ):
				$fluxi_content_lien = '<a class="c-button c-button--ghost l-jump" href="'.get_sub_field('url_lien').'"'.$target.'>'.get_sub_field('texte_lien').'</a>';			
			else:	
				// Basic
				$fluxi_content_lien = '<p><a href="'.get_sub_field('url_lien').'" class="c-link"'.$target.'>'.get_sub_field('texte_lien').'</a></p>';				
			endif;

			return $fluxi_content_lien;

		endif;	

	}
		
?>
