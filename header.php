<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php ( !defined( 'WPSEO_VERSION' ) ) ? ( wp_title( '|', true, 'right' ) . bloginfo( 'name' ) ) : wp_title( '' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?>
<?php
if(get_field('evergage_toggle', 'option') == "on"){?>
	<script type="text/javascript">
	  var _aaq = window._aaq || (window._aaq = []);
	  var evergageAccount = 'dyn';
	  // var dataset = 'dyn_end2end_development'; // Use in Development
	  // var dataset = 'dyn_end2end_staging'; // Use in Staging
	  var dataset = 'dyn_end2end_production'; // Use in Production (No tests should hit this)
	  _aaq.push(['setEvergageAccount', evergageAccount], ['setDataset', dataset], ['setUseSiteConfig', true], ['setUser', window.fingerprintId], ['setCompany', 'DynCustomer']);

	  (function(){
	    var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
	        g.type = 'text/javascript'; g.defer = true; g.async = true;
	        g.src = document.location.protocol + '//cdn.evergage.com/beacon/'
	                + evergageAccount + '/' + dataset + '/scripts/evergage.min.js';
	        s.parentNode.insertBefore(g, s);
	  })();
	</script>
<?php }

//Custom CSS sitewide
if(!empty(get_field('css_content', 'option'))){
	echo '<style>';
		echo get_field('css_content','option');
	echo '</style>';
}
?>
</head>
<?php
//Add custom header content
if(!empty(get_field('header_content', 'option'))){
	echo '<section class="header_before">';
		echo get_field('header_content','option');
	echo '</section>';
}
?>
<body <?php body_class(); ?>>
	<?php do_action( 'basey_head' );

	//Add chat to page
	if(get_field('chat_toggle', 'option') == "on"){
		$chat_pages = get_field('post_ids', 'option');
		if(is_page(array($chat_pages))){
			locate_template( 'inc/chat.php', true, false );
		}
	}
