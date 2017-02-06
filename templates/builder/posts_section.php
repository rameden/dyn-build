<?php
//Variables
$styles = get_sub_field( 'section_styles' );
$content_width = $styles['content_width'];

echo '<div class="'.$content_width.'">';
$post_categories_array = array();
$post_categories = get_sub_field('post_categories');
$post_tags_array = array();
$post_tags = get_sub_field('post_tags');
$post_count = get_sub_field('post_count');

foreach($post_categories as $term){
  $post_categories_array[] = $term->name;
}

foreach($post_tags as $term){
  $post_tags_array[] = $term->term_id;
}

$args = array(
  'post_type'        => 'post',
  'orderby'          => 'date',
  'order'            => 'DESC',
);

$args['posts_per_page'] = $post_count;

if(!empty($post_categories_array)){
  $args['cat'] = $post_categories_array;
}

if(!empty($post_tags_array)){
  $args['tag__in'] = $post_tags_array;
}

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
