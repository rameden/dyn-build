<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php ( !defined( 'WPSEO_VERSION' ) ) ? ( wp_title( '|', true, 'right' ) . bloginfo( 'name' ) ) : wp_title( '' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?>
<?php
if(get_field('optimizely_toggle', 'option') == "on"){
	echo 'optimizely to be added<br>';
}
if(get_field('evergage_toggle', 'option') == "on"){
	echo 'evergage script to be added<br>';
}
?>
</head>
<?php
if(get_field('chat_toggle', 'option') == "on"){
	$chat_pages = get_field('post_ids', 'option');
	if(is_page(array($chat_pages))){
	echo 'chat to be added';
	}
}

?>
<body <?php body_class(); ?>>
	<?php do_action( 'basey_head' );
