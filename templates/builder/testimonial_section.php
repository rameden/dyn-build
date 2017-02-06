<?php
//Variables
$styles = get_sub_field( 'section_styles' );
$content_width = $styles['content_width'];

echo '<div class="'.$content_width.'">';
//Variables
$type = get_sub_field('type_of_testimonial');

if($type == "single"){
$testimonials = get_sub_field('testimonial');
}else{
$testimonials = get_sub_field('testimonials');
}

$args = array(
  'post_type'        => 'testimonials',
  'orderby'          => 'date',
  'order'            => 'DESC',
);

$args['post__in'] = $testimonials;

echo '<pre>';
  print_r($args);
echo '</pre>';

$posts = get_posts( $args );

foreach($posts as $post){
  echo '<pre>';
    print_r($post);
  echo '</pre>';
}

echo '</div>';
//Reset the loop back to the flexible content field
wp_reset_postdata();
