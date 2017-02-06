<?php
//Variables
$styles = get_sub_field( 'section_styles' );
$content_width = $styles['content_width'];

echo '<div class="'.$content_width.'">';
//Variables
$type = get_sub_field('type_of_case_study');

if($type == "single"){
$case_studies = get_sub_field('case_study');
}else{
$case_studies = get_sub_field('case_studies');
}
echo $case_studies;
$args = array(
  'post_type'        => 'case_studies',
  'orderby'          => 'date',
  'order'            => 'DESC',
);

$args['post__in'] = $case_studies;

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
