<?php
/*
Plugin Name: Fluxi content
Plugin URI:
Description: Système de gestion de contenu personnalisé basé sur ACF
Version: 1.0.0
Author: Yann Rolland
Author URI: http://yannrolland.com
License: CC BY-NC-ND 4.0 (Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International)
*/


// vars
define('FC_VERSION', '1.0.0');
define('FC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FC_PLUGIN_BASE_NAME', plugin_basename(__FILE__));
define('FC_PLUGIN_FILE', basename(__FILE__));
define('FC_PLUGIN_FULL_PATH', __FILE__);


if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('fluxicontent') ) :

	class fluxicontent {



		/**
		*  __construct
		*
		*  A dummy constructor to ensure Fluxi-content is only initialized once
		*
		*  @type	function
		*  @date	15/06/16
		*  @since	1.0.0
		*
		*  @param	N/A
		*  @return	N/A
		*/

		function __construct() {

			/* Do nothing here */
			
		}



		/**
		*  initialize
		*
		*  The real constructor to initialize Fluxi-content
		*
		*  @type	function
		*  @date	15/06/16
		*  @since	1.0.0
		*
		*  @param	N/A
		*  @return	N/A
		*/

		function initialize() {

			// Actions - wp_enqueue_scripts
			add_action('wp_enqueue_scripts','register_fluxicontent_scripts',100);
			add_action('wp_enqueue_scripts', 'register_fluxicontent_styles', 100);

			// Actions - init
			add_action('init',	array($this, 'init'), 5);
			
		}



	   /**
		*  init
		*
		*  This function will run after all plugins and theme functions have been included
		*
		*  @type	action (init)
		*  @date	15/06/16
		*  @since	1.0.0
		*
		*  @param	N/A
		*  @return	N/A
		*/

		function init() {
			
			// Remove post type support			 
			remove_post_type_support( 'post', 'editor' );
			remove_post_type_support( 'page', 'editor' );

			// Remove auto formating
			remove_filter( 'the_content', 'wpautop' );
		}

	}

	

	/*
	 * Register plugin scripts
	 */

	function register_fluxicontent_scripts () {
		// Only for post & page
		if( is_page() || is_single() ):

			// isotope
			//wp_register_script( 'isotope', FC_PLUGIN_URL . 'assets/js/vendors/jquery.isotope.min.js', array(), null, true );

			// lightslider
			wp_register_script( 'lightslider', FC_PLUGIN_URL . 'assets/js/vendors/lg-2-lightslider.min.js', array(), null, true );

			// lightgallery
			wp_register_script( 'lg-fullscreen', FC_PLUGIN_URL . 'assets/js/vendors/lg-fullscreen.min.js', array(), null, true );
			wp_register_script( 'lg-thumbnail', FC_PLUGIN_URL . 'assets/js/vendors/lg-thumbnail.min.js', array(), null, true );
			wp_register_script( 'lg-video', FC_PLUGIN_URL . 'assets/js/vendors/lg-video.min.js', array(), null, true );
			wp_register_script( 'lightgallery', FC_PLUGIN_URL . 'assets/js/vendors/lg-1-lightgallery.min.js', array(), null, true );

			// fluxicontent
			wp_register_script( 'fluxicontent', FC_PLUGIN_URL . 'assets/js/fluxicontent.js', array('jQuery','lightslider','lightgallery','lg-fullscreen','lg-thumbnail','lg-video','lightgallery'), null, true );

			// Enqueue
			wp_enqueue_script( 'fluxicontent' );

		endif;

	}

	function register_fluxicontent_styles () {
		// Only for post & page
		if( is_page() || is_single() ):
			// Register
			wp_register_style( 'lightgallery', FC_PLUGIN_URL . 'assets/css/lightgallery.css', array(), null );
		    wp_register_style( 'lightslider', FC_PLUGIN_URL . 'assets/css/lightslider.css', array(), null );
		    //wp_register_style( 'fluxicontentcss', FC_PLUGIN_URL . 'assets/css/fluxi-content.css', array(), null );
		    // Enqueue
		    wp_enqueue_style( 'lightgallery' );
		    wp_enqueue_style( 'lightslider' );
		    //wp_enqueue_style( 'fluxicontentcss' );

		endif;
	}



	/**
	 * Include Fluxi content elements functions
	 */
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-titre.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-texte.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-image.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-liste.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-citation.php' );	
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-galerie.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-code.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-contact.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-publication.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-focus.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-lien.php' );
	require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-accordeon.php' );
	
	//require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-texte-image.php' );
	//require_once( FC_PLUGIN_DIR . 'core/elements/get-bloc-cliquable.php' );

	/**
	 * fluxi_content_save
	 *
	 *  @type	class
	 *  @date	16/06/16
	 *  @since	1.0.0
	 *
	 *  @param   INT - $post_id
	 *  @return  N/A
	 */

	function fluxi_content_save( $post_id ) {

	    global $post;

	    if( is_admin() ):
		    // Only for post & page
		    if ( get_post_type($post_id) == 'post'
		    	|| get_post_type($post_id) == 'page' ):
		    	// If there is no ACF
			 	if( empty($_POST['acf']) )
			        return;
			    // If autosave
			    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
			        return;
			    // If user can't modify post
			    if ( !current_user_can('edit_post', $post_id) )
			        return;
			    // If it's a revision
			    if( $post->post_type == 'revision' )
			    	return;

			    // Remove action to avoid infinite loop
		    	remove_action('save_post', 'fluxi_content_save');

		    	// Get Fluxi content
		    	$the_fluxi_content = get_fluxi_fields($post_id);
		    	$fluxi_resum = get_field('extrait', $post_id);

		    	// Update post content with Fluxi content
		    	wp_update_post(
					array(
						'ID' => $post_id,
						'post_content' => $the_fluxi_content,
						'post_excerpt' => $fluxi_resum
					)
				);
		    	// Re-hook fluxi_content_save
		    	add_action('save_post', 'fluxi_content_save');
			endif;
		endif;
	}

	add_action('save_post', 'fluxi_content_save');



	/**
	 * get_fluxi_fields
	 *
	 *  @type	function
	 *  @date	05/04/17
	 *  @since	1.0.1
	 *
	 *  @param   INT $post_id
	 *  @return  HTML - fluxi content ACF fields content with html
	 */

	function get_fluxi_fields($post_id){
		global $all_fluxi_content;

		if( have_rows('elements_page', $post_id) ):

			$all_fluxi_content .= '<div class="fc">';

			    while ( have_rows('elements_page', $post_id) ) : the_row();

			        if ( get_row_layout() == 'titre_1' ):
						$all_fluxi_content .= get_bloc_titre_1 ();

					elseif ( get_row_layout() == 'titre_2' ):
						$all_fluxi_content .= get_bloc_titre_2 ();

					elseif ( get_row_layout() == 'texte' ):
						$all_fluxi_content .= get_bloc_texte ();

					elseif ( get_row_layout() == 'image' ):
						$all_fluxi_content .= get_bloc_image ();

					elseif ( get_row_layout() == 'liste' ):
						$all_fluxi_content .= get_bloc_liste ();

					elseif ( get_row_layout() == 'citation' ):
						$all_fluxi_content .= get_bloc_citation ();

					elseif ( get_row_layout() == 'galerie' ):
						$all_fluxi_content .= get_bloc_galerie();

					elseif ( get_row_layout() == 'code' ):
						$all_fluxi_content .= get_bloc_code();

					elseif ( get_row_layout() == 'publication' ):
						$all_fluxi_content .= get_bloc_publication();

					elseif ( get_row_layout() == 'focus' ):
						$all_fluxi_content .= get_bloc_focus();

					elseif ( get_row_layout() == 'lien' ):
						$all_fluxi_content .= get_bloc_lien();

					elseif ( get_row_layout() == 'accordeon' ):
						$all_fluxi_content .= get_bloc_accordeon();


			        endif;

			    endwhile;

			$all_fluxi_content .= '</div>';

		    return $all_fluxi_content;
	    endif;

	}



	/**
	*  fluxicontent
	*
	*  The main function responsible for returning the one true fluxicontent Instance to functions everywhere.
	*  Use this function like you would a global variable, except without needing to declare the global.
	*
	*  Example: <?php $fluxicontent = fluxicontent(); ?>
	*
	*  @type	function
	*  @date	15/06/16
	*  @since	1.0.0
	*
	*  @param	N/A
	*  @return	(object)
	*/

	function fluxicontent() {

		global $fluxicontent;

		if( !isset($fluxicontent) ) {

			$fluxicontent = new fluxicontent();

			$fluxicontent->initialize();

		}

		return $fluxicontent;

	}


	// initialize
	fluxicontent();


endif; // class_exists check


?>