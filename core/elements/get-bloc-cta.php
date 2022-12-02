<?php

	/**
	 * get_bloc_cta
	 *
	 *  @type	function
	 *  @date	23/11/22
	 *  @since	1.0.0
	 *
	 *  @param INT $post
	 *  @return HTML - ACF cta fields
	 */

	function get_bloc_cta(){
		$fields = get_sub_field('call_to_action');

		if ($fields) :

			$output = '<div class="content-jump content-full">';

				if ($fields['titre_introduction']) :
					$output .= '<h3 class=" displayB h2 t-fw--900 t-align--c">'.$fields['titre_introduction'].'</h3>';
				endif;

				if ($fields['blocs_boutons']) :
					$bg_colors = ['bg-main c-white', 'bg-accent'];
					$button_color_modifier = ['-white', '-white'];
					$pattern_occitanie_modifier = ['-reverse', '-variant overflow-hidden'];
					$color_index = 0;
					$count_blocs = count($fields['blocs_boutons']);
					$modifier = ($count_blocs == 1) ? '-mono' : '';

					$output .= '<div class="l-jump -small l-duo -center '.$modifier.'">';

					for ($i = 0; $i < $count_blocs; $i++) :
						$bloc = $fields['blocs_boutons'][$i];
						$texte = $bloc['texte'];
						$bouton_grp = $bloc['bouton'];
							$type_lien = (array_key_exists('type_lien', $bouton_grp)) ? $bouton_grp['type_lien'] : 'interne';
							$target_lien = ($type_lien == 'externe') ? '_blank' : '_self';
							$texte_bouton = (array_key_exists('texte_bouton', $bouton_grp)) ? $bouton_grp['texte_bouton'] : '';
							if ($type_lien == 'externe') :
								$url_bouton = (array_key_exists('lien_externe', $bouton_grp)) ? $bouton_grp['lien_externe'] : '#';
							else :
								$url_bouton = (array_key_exists('lien_interne', $bouton_grp)) ? $bouton_grp['lien_interne'] : '#';
							endif;
							
							$output .= '<div class="l-duo__item '.$bg_colors[$color_index].'">';
								$output .= '<div class="l-duo__item__content bg-pattern-occitanie '.$pattern_occitanie_modifier[$color_index].'">';
									if ($texte) :
										$output .= '<p>'.$texte.'</p>';
									endif;
									$output .= '<div class="l-jump -small">';
										$output .= '<a href="'.$url_bouton.'" class="c-button -cta '.$button_color_modifier[$color_index].'" target="'.$target_lien.'">'.$texte_bouton.'</a>';
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';

							$color_index++;
							$color_index = ($color_index > 1) ? 0 : $color_index;
					endfor;

					if ($count_blocs == 2) :
						$output .= '<div class="l-duo__tag -occitanie">';
							$output .= '<img src="'.THEME_DIR_FOLDER.'/app/img/globe-coeur.png" />';
						$output .= '</div>';
					endif;

					$output .= '</div>';
				endif;

			$output .= '</div>';
			return $output;
		endif;
	}

?>