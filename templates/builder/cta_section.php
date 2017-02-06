<?php
//Variables
$styles = get_sub_field( 'section_styles' );
$content_width = $styles['content_width'];

echo '<div class="'.$content_width.'">';
  echo 'cta_section';
echo '</div>';
