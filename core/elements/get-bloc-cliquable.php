<?php 

	/**
	 * get_bloc_cliquable
	 *
	 *  @type	function
	 *  @date	17/06/16
	 *  @since	1.0.0
	 *
	 *  @param  INT - $post_id
	 *  @return HTML - ACF cliquable fields
	 */


	function get_bloc_cliquable(){

		if( have_rows('module_cliquable') ):

			$fluxi_content_cliquable = '<aside>';

			while( have_rows('module_cliquable') ): the_row();

				$fluxi_content_cliquable .= '<a href="'.get_sub_field('url_du_cliquable').'" target="'.get_sub_field('open_new_page').'" class="button"><h3>'.get_sub_field('titre_du_cliquable').'</h3><p>'.get_sub_field('texte_du_cliquable').'</p><span>'.get_sub_field('texte_bouton').'</span></a>';

			endwhile;

			$fluxi_content_cliquable .= '</aside>';

			return $fluxi_content_cliquable;

		endif;

	}



?>
