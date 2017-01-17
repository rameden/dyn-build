<?php
/*
Template Name: Main
*/

locate_template( 'templates/header.php', true, true );
	// start loop
	while ( have_posts() ) { the_post();
		if ( have_rows('main_builder') ) {
			$i = 1;
			echo '<div class="main_content">';
		  while ( have_rows('main_builder') ) {
		    the_row();
				//Global Variables
			  $styles = get_sub_field( 'section_styles' );
				$section_styles = "";

				if($styles['section_width'] != ''){$section_styles .= ' '.$styles['section_width'];};
				if($styles['margin_top'] != ''){$section_styles .= ' '.$styles['margin_top'];};
				if($styles['margin_right'] != ''){$section_styles .= ' '.$styles['margin_right'];};
				if($styles['margin_bottom'] != ''){$section_styles .= ' '.$styles['margin_bottom'];};
				if($styles['margin_left'] != ''){$section_styles .= ' '.$styles['margin_left'];};

				echo '<section id="content_section_' . $i . '" class="content_section_'.get_row_layout();
				if($section_styles != ""){
					echo $section_styles;
				}
				echo '">';
					// get flexible content file based on layout name
					locate_template( 'templates/builder/' . get_row_layout() . '.php', true, false );
				echo '</section>';
				$i++;
		  }
			echo '</div>';
		}
	}

	// if no posts
	if ( ( !have_posts() ) || ( get_search_query() == ' ' ) ) {
		basey_no_results();
	}

locate_template( 'templates/footer.php', true, true );
