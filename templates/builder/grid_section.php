<?php
//Variables
$styles = get_sub_field( 'section_styles' );
$content_width = $styles['content_width'];

echo '<div class="'.$content_width.'">';
if( have_rows('grid_sections') ):
  echo '<div class="uk-grid">';
     // loop through the rows of data
    while ( have_rows('grid_sections') ) : the_row();
      $grid_width = "";
      if(get_sub_field('grid_width_small') == "inherit" && get_sub_field('grid_width_medium') == "inherit"){
        $grid_width .= str_replace("-large", "", get_sub_field('grid_width_large'));
      }else{
        if(!empty(get_sub_field('grid_width_small'))){$grid_width .= ' '.get_sub_field('grid_width_small');}
        if(!empty(get_sub_field('grid_width_medium'))){$grid_width .= ' '.get_sub_field('grid_width_medium');}
        if(!empty(get_sub_field('grid_width_large'))){$grid_width .= ' '.get_sub_field('grid_width_large');}
      }
      $content = get_sub_field('content');

      echo '<div class="'.$grid_width.'">';
        echo 'content: '.$content;
      echo '</div>';
    endwhile;
  echo '</div>';
endif;
echo '</div>';
