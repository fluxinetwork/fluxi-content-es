<?php 

	/**
	 * get_bloc_image
	 *
	 *  @type	function
	 *  @date	16/06/16
	 *  @since	1.0.0
	 *
	 *  @param  INT - $post_id
	 *  @return HTML - ACF image fields
	 */

	function get_bloc_image(){
		
		$image_only = get_sub_field('image');
		$image_caption = $image_only['caption'];	
		$fluxi_content_image = '';

		$fluxi_content_image .= '<a href="'.$image_only['sizes']['large'].'" class="js-is-lightbox content-jump"><figure><img src="'.$image_only['sizes']['large'].'" alt="'.$image_only['name'].'" />';
				
			if(  $image_caption ):									
				$fluxi_content_image .= '<figcaption>'.$image_caption.'</figcaption>';
			endif;			 
		
		$fluxi_content_image .= '</figure></a>';

		return $fluxi_content_image;

	}	
?>
