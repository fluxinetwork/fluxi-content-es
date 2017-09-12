<?php

	/**
	 * get_bloc_liste
	 *
	 *  @type	function
	 *  @date	06/01/17
	 *  @since	1.0.0
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF list fields
	 */

	function get_bloc_liste(){

		$type_liste = get_sub_field('type_liste');
		$fluxi_content_liste = '';

		if( $type_liste ):

			($type_liste == 'numero' ? $type_liste = 'ol' : $type_liste = 'ul');

			$fluxi_content_liste = '<'.$type_liste.' class="c-list">';
				while( have_rows('element_liste') ): the_row();

					$type_element = get_sub_field('type_element');
					$texte_liste = get_sub_field('texte_element');

					$fluxi_content_liste .= '<li class="c-list__item">';
					$fluxi_content_liste .= $type_element == 'lien' ? '<a href="'.get_sub_field('url_lien').'" class="c-list__item">'.$texte_liste.'</a>' : $texte_liste;
					$fluxi_content_liste .= '</li>';

				endwhile;
			$fluxi_content_liste .= '</'.$type_liste.'>';

			return $fluxi_content_liste;

		endif;

	}

?>