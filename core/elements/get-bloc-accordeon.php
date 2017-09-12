<?php 	

	/**
	 * get_bloc_accordeon
	 *
	 *  @type	function
	 *  @date	23/01/17
	 *  @since	1.0.0
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF accordeon fields
	 */

	function get_bloc_accordeon (){

		$fluxi_content_accordeon = get_sub_field('titre_accordeon');		

		if( $fluxi_content_accordeon ):

			$fluxi_content_accordeon = '<div class="fc__accordeon fc__item js-accordeon">';

			$fluxi_content_accordeon .= '<h2 class="fc__accordeon__title">';
			$fluxi_content_accordeon .= '<i class="fa fa-chevron-right fc__accordeon__icon" aria-hidden="true"></i>';
			$fluxi_content_accordeon .= '<span>'.get_sub_field('titre_accordeon').'</span>';
			$fluxi_content_accordeon .= '</h2>';

			if( have_rows('contenu_accordeon') ):				

				$fluxi_content_accordeon .= '<div class="fc__accordeon__content">';

				while( have_rows('contenu_accordeon') ): the_row(); 

					if ( get_row_layout() == 'liste' ):					

						$fluxi_content_accordeon .= get_bloc_liste ();

					elseif( get_row_layout() == 'texte' ):

						$fluxi_content_accordeon .= get_bloc_texte ();

					endif;

				endwhile;

				$fluxi_content_accordeon .= '</div>';

			endif;

			$fluxi_content_accordeon .= '</div>';

			return $fluxi_content_accordeon;

		endif;	

	}
		
?>
