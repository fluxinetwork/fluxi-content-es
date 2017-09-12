<?php

	/**
	 * get_bloc_titre_1
	 *
	 *  @type	function
	 *  @date	05/03/17
	 *  @since	1.0.1
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF titles fields
	 */

	function get_bloc_titre_1(){
			
		$texte_titre = get_sub_field('texte_titre');

		if( $texte_titre ):
			
			$fluxi_content_titre = '<h2 class="fc__title">'.$texte_titre.'</h2>';

			return $fluxi_content_titre;
		
		endif;
		
	}

	/**
	 * get_bloc_titre_2
	 *
	 *  @type	function
	 *  @date	05/03/17
	 *  @since	1.0.1
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF titles fields
	 */

	function get_bloc_titre_2(){
			
		$texte_titre = get_sub_field('texte_titre');		

		if( $texte_titre ):
		
			$fluxi_content_titre = '<h3 class="t-fw--700 fc_subtitle">'.$texte_titre.'</h3>';

			return $fluxi_content_titre;
		
		endif;
		
	}

?>