<?php


	/**
	 * get_bloc_galerie
	 *
	 *  @type	function
	 *  @date	17/06/16
	 *  @since	1.0.0
	 *
	 *  @param  N/A
	 *  @return HTML - ACF galerie fields
	 */


	function get_bloc_galerie(){

		$type_galerie = get_sub_field('type_galerie');
		$galerie = get_sub_field('galerie');
		$fluxi_content_galerie = '';
		global $isMobile;

		if( $galerie ):

			if( $type_galerie == 'galerie_damier' ): 
		        $fluxi_content_galerie .= '<aside class="fc__gallery"><div class="c-gallery js-gallery-damier">';
					foreach( $galerie as $image ):
						($isMobile) ? $img_size = 'thumb2x' : $img_size = 'thumbnail';
						$fluxi_content_galerie .= '<a href="'.$image['sizes']['large'].'" data-sub-html="'.$image['caption'].'"><img src="'.$image['sizes'][$img_size].'" alt="'.$image['alt'].'" class="c-gallery__img" /></a>';
		            endforeach;
		        $fluxi_content_galerie .= '</div></aside>';

			elseif( $type_galerie == 'galerie_vignettes' ):
				$fluxi_content_galerie .= '<aside class="fc__gallery"><ul class="c-gallery js-gallery-vignettes">';
					foreach( $galerie as $image ):
						$fluxi_content_galerie .= '<li data-thumb="'.$image['sizes']['thumbnail'].'" data-src="'.$image['sizes']['single'].'" data-sub-html="'.$image['caption'].'"><img src="'.$image['sizes']['large'].'" alt="'.$image['alt'].'" class="c-gallery__img" /></li>';
					endforeach;
				$fluxi_content_galerie .= '</ul></aside>';

			else:
				$fluxi_content_galerie .= '<aside class="fc__gallery"><ul class="c-gallery js-gallery-slider">';
					foreach( $galerie as $image ):
						$fluxi_content_galerie .= '<li data-thumb="'.$image['sizes']['thumbnail'].'" data-src="'.$image['sizes']['single'].'" data-sub-html="'.$image['caption'].'"><img src="'.$image['sizes']['large'].'" alt="'.$image['alt'].'" class="c-gallery__img" /></li>';
					endforeach;
				$fluxi_content_galerie .= '</ul></aside>';

			endif;

			return $fluxi_content_galerie;

		endif;

	}
?>