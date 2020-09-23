<?php


	/**
	 * get_bloc_titre
	 *
	 *  @type	function
	 *  @date	19/09/17
	 *  @since	1.0.1
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF titles fields
	 */


	function get_bloc_titre(){
			
		$taille_titre = get_sub_field('taille_titre');
		$texte_titre = get_sub_field('texte_titre');		
		$ajouter_sommaire = get_sub_field('ajouter_sommaire');

		if( !empty($texte_titre) ):	

			$data_titre_court = '';
		    if( $ajouter_sommaire && get_sub_field('titre_court') ):
		    	$data_titre_court = ' data-sommaire="'.get_sub_field('titre_court').'"';
		    elseif($ajouter_sommaire && get_sub_field('titre_court') == ''):
		    	$data_titre_court = ' data-sommaire="'.$texte_titre.'"';
		    endif;
			
			$fluxi_content_titre = '<h'.$taille_titre.' '.$data_titre_court.'>'.$texte_titre.'</h'.$taille_titre.'>';

			return $fluxi_content_titre;

		endif;	
		
	}



?>