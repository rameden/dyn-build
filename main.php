<?php
/*
Template Name: Main
*/

locate_template( 'templates/header.php', true, true );

	echo '<h2 class="uk-article-title">';
		basey_title();
	echo '</h2>';

	// start loop
	while ( have_posts() ) : the_post();

	if ( have_rows('main_builder') ) {
	  $section_id = 1;

	  while ( have_rows('main_builder') ) {
	    the_row();

	    $layout = get_row_layout();

	    echo '<section id="content-section-' . $section_id . '">';
			echo $layout;
	    $styles = get_sub_field( 'section_styles' );
			echo '<pre>';
				print_r($styles);
			echo '</pre>';

			the_sub_field( 'content' );
			
	    echo '</section>';

	    $section_id++;
	  }
	}

	endwhile;

	// display navigation to next/previous pages when applicable
	basey_pagination();

	// if no posts
	if ( ( !have_posts() ) || ( get_search_query() == ' ' ) ) {
		basey_no_results();
	}

locate_template( 'templates/footer.php', true, true );
