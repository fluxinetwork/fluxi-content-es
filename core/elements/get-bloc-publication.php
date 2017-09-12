<?php

	/**
	 * get_bloc_publication
	 *
	 *  @type	function
	 *  @date	18/01/17
	 *  @since	1.0.0
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF titles fields
	 */

	function get_bloc_publication(){
			
		$titre_publication = get_sub_field('titre_publication');
		$fluxi_content_publication = '';	

		if( $titre_publication ):

			$couverture = get_sub_field('couverture');

			$fluxi_content_publication = '<a href="'.get_sub_field('fichier_referent').'" class="c-newsH fc__item fc__publication">';
			$fluxi_content_publication .= '<div class="c-newsH__img" style="background-image: url('.$couverture['sizes']['publi'].')"></div>';
			$fluxi_content_publication .= '<div class="c-newsH__body">';
			$fluxi_content_publication .= '<span class="c-newsH__body__meta">Publication</span>';
			$fluxi_content_publication .= '<h1 class="c-newsH__body__title">'.$titre_publication.'</h1>';
			if (get_sub_field('description')) {
				$fluxi_content_publication .= '<p class="c-newsH__body__desc">'.get_sub_field('description').'</p>';
			}
			$fluxi_content_publication .= '<span class="c-link c-link--more c-newsH__body__link" target="_blank">Consulter la publication</span>';
			$fluxi_content_publication .= '</div>';
			$fluxi_content_publication .= '</a>';

			return $fluxi_content_publication;
			
		endif;
		
	}

?>
