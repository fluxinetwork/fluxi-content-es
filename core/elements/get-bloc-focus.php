<?php 	

	/**
	 * get_bloc_focus
	 *
	 *  @type	function
	 *  @date	23/01/17
	 *  @since	1.0.0
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF focus fields
	 */

	function get_bloc_focus (){

		$fluxi_content_focus = get_sub_field('titre_focus');		

		if( $fluxi_content_focus ):

			$fluxi_content_focus = '<div class="fc__item fc__focus">';

			$fluxi_content_focus .= '<h2 calss="fc__focus__title">'.get_sub_field('titre_focus').'</h2>';
			$fluxi_content_focus .= '<p>'.get_sub_field('texte_focus').'</p>';

			if( get_sub_field('ajouter_lien_focus') == 1 ) {
				$fluxi_content_focus .= '<a href="'.get_sub_field('url_lien').'" class="fc__focus__link">'.get_sub_field('texte_lien').'</a>';
			}

			$fluxi_content_focus .= '</div>';

			return $fluxi_content_focus;

		endif;	

	}
		
?>
