<?php

	/**
	 * get_bloc_citation
	 *
	 *  @type	function
	 *  @date	16/06/16
	 *  @since	1.0.0
	 *
	 *  @param INT $post_id
	 *  @return HTML - ACF citation fields
	 */

	function get_bloc_citation(){		
		
		$fluxi_content_citation = get_sub_field('citation');		
		
		if($fluxi_content_citation):

			$fluxi_content_citation = '<blockquote class="fc__blockquote"><span class="fc__blockquote__deco fc__blockquote__deco--top"></span>'.$fluxi_content_citation.'<span class="fc__blockquote__deco fc__blockquote__deco--bottom"></span></blockquote>';


			return $fluxi_content_citation;	

		endif;	
		
	}

?>