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

		if( !empty($texte_titre) ):		
			
			$fluxi_content_titre = '<h'.$taille_titre.'>'.$texte_titre.'</h'.$taille_titre.'>';

			return $fluxi_content_titre;

		endif;	
		
	}



?>