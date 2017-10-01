<?php 
	
	function enqueue_theme_scripts() {
	    wp_enqueue_style( 'parent-build', get_template_directory_uri() . '/build/css/build.css' );
	    wp_enqueue_style( 'parent-login', get_template_directory_uri() . '/build/css/login.css' );
	    wp_enqueue_style( 'child-build', get_stylesheet_directory_uri() . '/build/css/build.css', array( 'parent-build' ) );

	    wp_enqueue_script( 'theme' );
	    wp_dequeue_script( 'exec' );
	    wp_enqueue_script( 'child-build-js', get_stylesheet_directory_uri() . '/build/js/build.js' );
	    wp_enqueue_script( 'child-exec-js', get_stylesheet_directory_uri() . '/build/js/exec.js' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_theme_scripts', 100 );

	function wpse_233129_admin_menu_items() {
	    global $menu;

	    $menu[5][0] = 'Blog Posts';

	    foreach ( $menu as $key => $value ) {
	        if ( 'edit.php' == $value[2] ) {
	            $oldkey = $key;
	        }
	    }
	    
	    // change Posts menu position in the backend
	    $newkey = 83; // use whatever index gets you the position you want
	    // if this key is in use you will write over a menu item!
	    $menu[$newkey]=$menu[$oldkey];
	    unset($menu[$oldkey]);

	}

	function render_page_links($menu_class = '', $menu_item_class = '', $menu_item_link_class = ''){
		$render_string = '<ul class="' . $menu_class . '">';

		$active_pages = get_active_pages();

		foreach($active_pages as $active_page){
			$page_name =  get_field($active_page['name'].'-alt-toggle', 'option') && !empty(get_field($active_page['name'].'-alt', 'option')) ? get_field($active_page['name'].'-alt', 'option') : str_replace('-', ' ', $active_page['name']);
			$render_string .= '<li class="' . $menu_item_class .'">' . '<a href="' . site_url() . '/' . $active_page['name'] . '" class="' . $menu_item_link_class . '">' . $page_name . '</a></li>';
		}

		$render_string .= '</ul>';

		echo $render_string;
	}

	add_action( 'wp_head', 'custom_color_css' );

	function custom_color_css(){
				
		if( get_field('buttons-underlines-toggle', 'option') ):
			$color = get_field('buttons-underlines', 'option');
		?>
			<style type="text/css">
				.services-services-grid-item-header{
					background-color: <?php echo $color; ?>;
				}
			</style>
		<?php
		endif;
	}
	
?>