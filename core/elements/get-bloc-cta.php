<?php

	/**
	 * get_bloc_cta
	 *
	 *  @type	function
	 *  @date	23/11/22
	 *  @since	1.0.0
	 *
	 *  @param INT $post
	 *  @return HTML - ACF cta fields
	 */

	function get_bloc_cta(){

		$output = '';
		if (have_rows('cta')) :
		    while(have_rows('cta')) : the_row();

		    	$texte = get_sub_field('texte');
		    	$bouton_grp = get_sub_field('bouton');
		    	$type_lien = (array_key_exists('type_lien', $bouton_grp)) ? $bouton_grp['type_lien'] : 'interne';
		    	$target_lien = ($type_lien == 'externe') ? '_blank' : '_self';
		    	$texte_bouton = (array_key_exists('texte_bouton', $bouton_grp)) ? $bouton_grp['texte_bouton'] : '';
		    	if ($type_lien == 'externe') :
		    		$url_bouton = (array_key_exists('lien_externe', $bouton_grp)) ? $bouton_grp['lien_externe'] : '#';
		    	else :
		    		$url_bouton = (array_key_exists('lien_interne', $bouton_grp)) ? $bouton_grp['lien_interne'] : '#';
		    	endif;
		    	
		    	$output .= '<div>';

		    		if ($texte) :
		    			$output .= '<p>'.$texte.'</p>';
		    		endif;

		    		$output .= '<a href="'.$url_bouton.'" class="c-button c-button--cta" target="'.$target_lien.'">'.$texte_bouton.'</a>';

		    	$output .= '</div>';

		    endwhile;
		endif;
			
		return $output;
	}

?>