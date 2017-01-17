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
	<nav class="uk-navbar uk-navbar-attached">
		<div class="uk-container">
			<a class="uk-navbar-brand" href="<?php echo home_url(); ?>"><img src="/wp-content/themes/dyn-build/assets/media/build/dyn-logo-white.png" height="50"></a>
			<?php
			wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => '',
				'menu_class'        => 'uk-navbar-nav uk-hidden-small',
				'fallback_cb'       => 'basey_primary_menu::fallback',
				'walker'            => new basey_primary_menu())
			);
			?>
			<div id="navbar-side" class="uk-navbar-flip uk-hidden-small">
					<ul class="uk-navbar-nav">
							<li><a class="uk-text-uppercase uk-text-spaced uk-temp-button" href="">Connect</a></li>
							<li><a href=""><i class="uk-icon-search uk-icon-medium"></i></a></li>
							<li class="uk-parent" data-uk-dropdown="" aria-haspopup="true" aria-expanded="false">
                  <a href=""><i class="uk-icon-rebel uk-icon-medium"></i></a>
                  <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-bottom" aria-hidden="true" style="top: 40px; left: 0px;" tabindex="">
										<?php
										wp_nav_menu( array(
											'menu'              => 'user',
											'theme_location'    => 'user',
											'depth'             => 2,
											'container'         => '',
											'menu_class'        => 'uk-navbar-nav uk-hidden-medium',
											'fallback_cb'       => 'basey_primary_menu::fallback',
											'walker'            => new basey_primary_menu())
										);
										?>
                  </div>

              </li>
					</ul>
			</div>
			<div class="uk-navbar-flip uk-visible-small">
				<a href="#offcanvas-menu" class="uk-navbar-toggle" data-uk-offcanvas></a>
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
			?>
		</div>
	</div>
	<?php
}
add_action( 'basey_content_after', 'basey_content_after_output' );


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
