<?php
function dyn_enque_files() {
  if(get_field('optimizely_toggle', 'option') == "on"){
    wp_enqueue_script( 'optimizely', '//cdn.optimizely.com/js/2573310155.js', array(), '', true );
  }
}
add_action( 'wp_enqueue_scripts', 'dyn_enque_files' );

function assets() {

	wp_enqueue_style('my-css', get_stylesheet_directory_uri().'/style.css', false, null);

  $inline_css = '';

  // Section styles
  if ( have_rows('main_builder') ) {
    $i = 1;
    while ( have_rows('main_builder') ) {
      the_row();

      $styles = get_sub_field( 'section_styles' );

      // element id
      $inline_css .= "
#content_section_{$i} {
";

      // set background
      if ( !empty( $styles['background_image'] ) ) {
        $inline_css .= "
				  background-image: url({$styles['background_image']['url']});
				  background-size:{$styles['background_style']};
				  background-position:{$styles['background_position']};
				";
      }
			if ( !empty( $styles['background_color'] ) ) {
				$inline_css .= "
				  background-color: {$styles['background_color']};
				";
			}

      // set other styles
      $inline_css .= "
			  padding: {$styles['padding']};
			";

      // end element id
      $inline_css .= "
  }
  ";

      $i++;
    }
  }

  wp_add_inline_style( 'my-css', $inline_css );
}

add_action('wp_enqueue_scripts', 'assets');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Dyn General Settings',
		'menu_title'	=> 'Dyn Settings',
		'menu_slug' 	=> 'dyn-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}
