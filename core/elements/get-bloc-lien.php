<?php 	

	/**
	 * get_bloc_lien
	 *
	 *  @type	function
	 *  @date	23/01/17
	 *  @since	1.0.0
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF text fields
	 */

	function get_bloc_lien (){

		$fluxi_content_lien = get_sub_field('texte_lien');		

		if( $fluxi_content_lien ):

			if( get_sub_field('afficher_bouton') == 1 ):
				$fluxi_content_lien = '<a class="c-btn c-btn--ghost fc__lien" href="'.get_sub_field('url_lien').'">'.get_sub_field('texte_lien').'</a>';
			else:
				$fluxi_content_lien = '<p><a href="'.get_sub_field('url_lien').'">'.get_sub_field('texte_lien').'</a></p>';
			endif;

			return $fluxi_content_lien;

		endif;	

	}
		
?>
