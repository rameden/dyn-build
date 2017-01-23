<?php
//Variables
$styles = get_sub_field( 'section_styles' );
$content_width = $styles['content_width'];

echo '<div class="'.$content_width.'">';
//Variables
$custom_promotion = get_sub_field('custom_promotion');
if($custom_promotion == 1){
//Variation Variables
$content = get_sub_field('custom_promotion_content');
  echo 'set';
}else{
//Variation Variables
$promotion = get_sub_field('promotion');
echo '<pre>';
  print_r($promotion);
echo '</pre>';
}

echo '</div>';
