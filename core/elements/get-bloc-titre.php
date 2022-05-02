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

			$jsClass = ( $taille_titre == '2' ) ? 'js-sommaire' : '';

			if($ajouter_sommaire):
				if(get_sub_field('titre_sommaire')):
					$short_title = get_sub_field('titre_sommaire');
				else:
					$short_title = fx_cut_string( $texte_titre, 40);
				endif;

				$fluxi_content_titre = '<h'.$taille_titre.' class="'.$jsClass.'" data-title="'.$short_title.'">'.$texte_titre.'</h'.$taille_titre.'>';
			else:
				$fluxi_content_titre = '<h'.$taille_titre.'>'.$texte_titre.'</h'.$taille_titre.'>';
			endif;

			return $fluxi_content_titre;

		endif;	
		
	}

?>
