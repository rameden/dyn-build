<?php
//Variables
$styles = get_sub_field( 'section_styles' );
$content_width = $styles['content_width'];

//Grid specific Variables
$grid = "uk-grid";
$grid_gutter = $styles['grid_gutter'];
$grid_divider = $styles['grid_divider'];
$grid_match_height = $styles['grid_match_height'];

if(!empty($grid_gutter)){$grid .= ' '.$grid_gutter;}
if(!empty($grid_divider)){$grid .= ' '.$grid_divider;}

echo '<div class="'.$content_width.'">';
if( have_rows('grid_sections') ):
  echo '<div class="'.$grid.'"';
  if(!empty($grid_match_height)){echo $grid_match_height;}
  echo '>';
     // loop through the rows of data
    while ( have_rows('grid_sections') ) : the_row();
      $grid_sub = "";

      if( get_sub_field('apply_panel_styles') == 'yes' ){$grid_sub .= "uk-panel ";}

      if(get_sub_field('grid_width_small') == "inherit" && get_sub_field('grid_width_medium') == "inherit"){
        $grid_sub .= str_replace("-large", "", get_sub_field('grid_width_large'));
      }elseif(get_sub_field('grid_width_medium') == "inherit"){
        $grid_sub .= ' '.get_sub_field('grid_width_small');
        $grid_sub .= ' '.get_sub_field('grid_width_large');
      }elseif(get_sub_field('grid_width_small') == "inherit"){
        $grid_sub .= ' '.get_sub_field('grid_width_medium');
        $grid_sub .= ' '.get_sub_field('grid_width_large');
      }else{
        $grid_sub .= ' '.get_sub_field('grid_width_small');
        $grid_sub .= ' '.get_sub_field('grid_width_medium');
        $grid_sub .= ' '.get_sub_field('grid_width_large');
      }

      $content = get_sub_field('content');

      echo '<div class="'.$grid_sub.'">';
        echo $content;
      echo '</div>';
    endwhile;
  echo '</div>';
endif;
echo '</div>';
