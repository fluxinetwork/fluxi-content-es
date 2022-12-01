<?php 

	/**
	 * get_bloc_image_texte
	 *
	 *  @type	function
	 *  @date	22/11/17
	 *  @since	1.0.0
	 *
	 *  @param  INT - $post_id
	 *  @return HTML - ACF image fields
	 */

	function get_bloc_image_texte() {
		
		$img = get_sub_field('image');
		$txt = get_sub_field('texte');
		$titre = ( get_sub_field('titre') ) ? get_sub_field('titre') : false;

		$lien = ( get_sub_field('ajouter_lien') == 1 ) ? true : false;
		if ( $lien ) {
			$txt_lien = get_sub_field('texte_lien');
			$url_lien = get_sub_field('adresse_lien');
			$externe = ( get_sub_field('lien_externe') == 1 ) ? 'target="_blank"' : '';
		}

		$output = '';

		$output .= '<div class="l-imgTxt content-jump">';
			$output .= '<div class="l-imgTxt__img">';
				$output .= fx_get_lazy_img($img);
			$output .= '</div>';
			$output .= '<div class="l-imgTxt__txt">';
				if ( $titre ) {
					$output .= '<h4>'.$titre.'</h4>';
				}
				$output .= '<p>'.$txt.'</p>';
				if ( $lien ) {
					$output .= '<p><a href="'.$url_lien.'" '.$externe.' class="c-link">'.$txt_lien.'</a></p>';
				}
			$output .= '</div>';
		$output .= '</div>';

		return $output;

	}	
?>
