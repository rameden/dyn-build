<?php

do_action( 'basey_footer' );
wp_footer();
do_action( 'basey_debug' );

?>
<?php
//Add custom header content
if(!empty(get_field('footer_content', 'option'))){
	echo '<section class="footer_after">';
		echo get_field('footer_content','option');
	echo '</section>';
}
?>
	</body>
</html>
