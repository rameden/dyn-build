<?php

/*-----------------------------------------------------------------------------------*/
/*	Define HTML

This section is used to add your HTML output to the theme. If you look throughout the theme, you'll notice
several function() calls that share similarities based on their position. Those are merely references to
WP actions that you can add content to (in this case - HTML output). This way, it keeps our core theme files
neat and allows us to change HTML on several pages easily (you can always use standard conditional template
logic)

/*-----------------------------------------------------------------------------------*/

/**
 * Add menu to header
 * @return void
 */
function basey_head_output() { ?>
	<nav class="uk-navbar">
		<div class="uk-container">
			<a class="uk-navbar-brand" href="<?php echo home_url(); ?>"><img src="/wp-content/themes/dyn-build/assets/svg/build/dyn-logo-white.svg"></a>
			<?php
			wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => '',
				'menu_class'        => 'uk-navbar-nav uk-hidden-small uk-hidden-medium',
				'fallback_cb'       => 'basey_primary_menu::fallback',
				'walker'            => new basey_primary_menu())
			);
			?>
			<div class="uk-navbar-flip uk-hidden-large">
				<a href="#offcanvas-menu" class="uk-navbar-toggle" data-uk-offcanvas></a>
			</div>
			<div id="navbar-side" class="uk-navbar-flip uk-hidden-small">
					<ul class="uk-navbar-nav">
							<li><a class="uk-text-uppercase uk-text-spaced uk-button-nav" href="#main-contact" data-uk-modal>Connect</a></li>
							<li><a href="#main-search" data-uk-modal><i class="icon-search uk-icon-medium"></i></a></li>
							<li class="uk-parent" data-uk-dropdown="" aria-haspopup="true" aria-expanded="false">
                  <a href=""><i class="icon-circle_account uk-icon-medium"></i></a>
                  <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-bottom" aria-hidden="true" style="top: 40px; left: 0px;" tabindex="">
										<?php
										wp_nav_menu( array(
											'menu'              => 'user',
											'theme_location'    => 'user',
											'depth'             => 2,
											'container'         => '',
											'menu_class'        => 'uk-nav uk-hidden-small',
											'fallback_cb'       => 'basey_primary_menu::fallback',
											'walker'            => new basey_primary_menu())
										);
										?>
                  </div>

              </li>
					</ul>
			</div>
		</div>
	</nav>
	<?php
}
add_action( 'basey_head', 'basey_head_output' );

/**
 * Before content
 * @return void
 */
function basey_content_before_output() { ?>
	<?php if ( !is_page_template( 'main.php' ) ) { ?>
	<section class="uk-margin">
		<div class="uk-container">
			<div class="uk-grid" data-uk-grid-margin>
				<div class="uk-width-medium-7-10">
			<?php
		}
}
add_action( 'basey_content_before', 'basey_content_before_output' );

/**
 * After content
 * @return void
 */
function basey_content_after_output() {
	if ( !is_page_template( 'main.php' ) ) { ?>
				</div>
				<div class="uk-width-medium-3-10">
					<div class="uk-panel uk-panel-box">
						<?php dynamic_sidebar( 'basey-sidebar' ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
	<div id="offcanvas-menu" class="uk-offcanvas">
		<div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
			<?php
			wp_nav_menu( array(
				'menu'           => 'primary',
				'theme_location' => 'primary',
				'depth'          => 3,
				'container'      => '',
				'menu_class'     => 'uk-nav uk-nav-offcanvas uk-nav-parent-icon',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-uk-nav>%3$s</ul>',
				'fallback_cb'    => 'basey_offcanvas_menu::fallback',
				'walker'         => new basey_offcanvas_menu())
			);

			wp_nav_menu( array(
				'menu'              => 'user',
				'theme_location'    => 'user',
				'depth'             => 2,
				'container'         => '',
				'menu_class'        => 'uk-nav uk-nav-offcanvas uk-nav-parent-icon',
				'fallback_cb'       => 'basey_primary_menu::fallback',
				'walker'            => new basey_offcanvas_menu())
			);
			?>
		</div>
	</div>
	<?php
}
add_action( 'basey_content_after', 'basey_content_after_output' );

/**
 * Basey Footer
 * @return void
 */
function basey_footer_content() {
?>
<section id="footer" class="uk-text-center">
	<?php dynamic_sidebar( 'basey-footer' ); ?>
</section>
<!-- Search modal -->
<div id="main-search" class="uk-modal">
    <div class="uk-modal-dialog uk-animation-slide-right uk-animation-1">
        <a class="uk-modal-close uk-close"></a>
        <?php get_search_form(); ?>
    </div>
</div>
<section id="modal">
<!-- Contact modal -->
<div id="main-contact" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        ...
    </div>
</div>
</section>
<?php
}
add_action( 'basey_footer', 'basey_footer_content' );


/**
 * Display query count and load time
 * @return void
 */
function basey_query_load_time() {

	if (current_user_can( 'manage_options' )) { ?>
		<div class="uk-container uk-margin-bottom">
			<div class="uk-panel uk-panel-box">
				<strong><?php echo get_num_queries(); ?></strong> queries in <strong><?php timer_stop(1); ?></strong> seconds
			</div>
		</div>
	<?php }
}
add_action( 'basey_debug', 'basey_query_load_time' );
