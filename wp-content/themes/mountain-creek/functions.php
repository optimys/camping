<?php
	function mountaincreek_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
	}
	add_action( 'init', 'mountaincreek_add_editor_styles' );
	if ( ! isset( $content_width ) ) $content_width = 680;
	
	function mountaincreek_scripts() {
		wp_enqueue_script('jquery','','','', true);
		wp_enqueue_script('script',get_template_directory_uri() . '/js/script.js','','', true);
		wp_enqueue_script('responsive',get_template_directory_uri() . '/js/responsive.js','','', true);
	}
	add_action('wp_enqueue_scripts', 'mountaincreek_scripts');

	function mountaincreek_css() {
    	wp_enqueue_style( 'main_style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'responsive_style', get_template_directory_uri() . '/responsive.css' );
		}

	add_action( 'wp_enqueue_scripts', 'mountaincreek_css' );
?>
<?php
	register_sidebar(array('name'=>__('Sidebar','mountaincreek'),
	    'id'            => 'sidebar-1',
		'before_widget' => '<div class="hot-news rounds">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
?>
<?php add_action( 'after_setup_theme', 'theme_setup' );

		if ( ! function_exists('theme_setup') ):
				function theme_setup() {
					add_theme_support( 'post-thumbnails' );
					set_post_thumbnail_size( 413, 230 );	
					add_theme_support( 'automatic-feed-links' );
					$lang = get_template_directory() . '/languages';
					load_theme_textdomain('mountaincreek', $lang);
					add_image_size( 'gallery-single', 690, 9999 ); 
					add_image_size( 'slider', 738, 291, true );
					register_nav_menus(
									array(
											'social' => 'Header Social',
											'sidebar-nav' => 'Sidebar Navigation'
											));
					define( 'HEADER_TEXTCOLOR', '' );
					define( 'HEADER_IMAGE', '%s/images/mc/logo.png' );
					define( 'HEADER_IMAGE_WIDTH', apply_filters( 'yourtheme_header_image_width', 430 ) );
					define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'yourtheme_header_image_height',	68 ) );
					define( 'NO_HEADER_TEXT', true );
					$header_defaults = array(
						'default-color'          => '',
						'default-image'          => '',
						'wp-head-callback'       => '',
						'admin-head-callback'    => 'admin_header_style',
						'admin-preview-callback' => ''
						);
						add_theme_support( 'custom-header',$header_defaults );
						add_theme_support( 'custom-background', array(
						'default-color' => '333',
						'default-image' => get_template_directory_uri() . '/images/mc/back.png'
						) );
						}
						endif;
		if ( ! function_exists( 'mountaincreek_admin_header_style' ) ) :				
				function mountaincreek_admin_header_style() {
				?>
				<style type="text/css">
										#headimg {
										height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
										width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
										}
										#headimg h1, #headimg #desc {
											display: none;
											}
				</style>
				<?php
					} endif;
?>