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

	function get_bloc_accordeon() {

		$fluxi_content_accordeon = get_sub_field('titre_accordeon');		

		if( $fluxi_content_accordeon ):

			$fluxi_content_accordeon = '<div class="c-accordeon content-jump">';

			$fluxi_content_accordeon .= '<div class="c-accordeon__title js-accordeon">';
				$fluxi_content_accordeon .= '<button class="c-roundButton c-roundButton--ghost c-roundButton--2icon c-accordeon__title__icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></button>';
				$fluxi_content_accordeon .= '<h4 class="c-accordeon__title">'.get_sub_field('titre_accordeon').'</h4>';
			$fluxi_content_accordeon .= '</div>';

			if( have_rows('contenu_accordeon') ):				

				$fluxi_content_accordeon .= '<div class="c-accordeon__content js-accordeon-content">';

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
