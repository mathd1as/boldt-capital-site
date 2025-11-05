<?php
#region CLEANUP
function wps_deregister_styles()
{
	wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'wps_deregister_styles', 100);

function disable_wp_headcrap()
{
	// emojis styles
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');

	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

	// legado void theme
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	// remove_action('rest_api_init', 'wp_oembed_register_route');
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'disable_wp_headcrap');

function void_cleanup_user_roles()
{
	remove_role('editor');
	remove_role('file_uploader');
	remove_role('author');
	remove_role('contributor');
	remove_role('subscriber');
}
add_action('admin_init', 'void_cleanup_user_roles');
#endregion

add_filter('show_admin_bar', '__return_false');

function void_create_cliente_user()
{
	add_role('cliente', 'Cliente');

	global $wp_roles;
	$role = get_role('cliente');
	$role->add_cap('read');
	$role->add_cap('edit_files');					//arquivos
	$role->add_cap('upload_files');
	$role->add_cap('remove_upload_files');

	$role->add_cap('edit_pages');					//paginas
	$role->add_cap('edit_others_pages');
	$role->add_cap('edit_published_pages');
	$role->add_cap('edit_private_pages');
	$role->add_cap('publish_pages');

	$role->add_cap('edit_posts');					// posts
	$role->add_cap('edit_others_posts');
	$role->add_cap('edit_published_posts');
	$role->add_cap('edit_private_posts');
	$role->add_cap('publish_posts');
	$role->add_cap('delete_others_posts');
	$role->add_cap('delete_published_posts');
	$role->add_cap('delete_posts');

	$role->add_cap('manage_categories');			//categorias (posts e custom post types)

	//$role->add_cap('unfiltered_html');			// plugins specific
	$role->add_cap('cfdb7_access');
}
add_action('admin_init', 'void_create_cliente_user');
#endregion

#region void MANUAL
require_once(get_template_directory() . "/assets/php/functions-manual.php");
#endregion

#region ACF
function acf_caminho_configuracoes($path)
{
	return get_stylesheet_directory() . '/assets/php/acf/';
}
add_filter('acf/settings/path', 'acf_caminho_configuracoes');

function acf_diretorio_configuracoes($dir)
{
	return get_stylesheet_directory_uri() . '/assets/php/acf/';
}
add_filter('acf/settings/dir', 'acf_diretorio_configuracoes');

include_once(get_stylesheet_directory() . '/assets/php/acf/acf.php');
#endregion

#region Lazyblock
function void_block_category($categories, $post)
{
	return array_merge(
		array(
			array(
				'slug' => 'void-blocks',
				'title' => 'void Blocks',
			),
		),
		$categories
	);
}
add_filter('block_categories_all', 'void_block_category', 10, 2);
add_filter('lzb/block_render/allow_wrapper', '__return_false');
#endregion

#region DADOS option page
acf_add_options_page(array(
	'menu_title'  => 'Dados',
	'page_title'   => 'Dados',
	'menu_slug'   => 'dados',
	'post_id' => 'dados',
	'icon_url' => 'dashicons-admin-generic',
));
#endregion



#region SETUP
function add_slug_body_class($classes)
{
	global $post;
	if (isset($post)) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter('body_class', 'add_slug_body_class');

function void_setup()
{
	load_theme_textdomain('void', get_template_directory() . '/languages');

	//gutemberg
	add_theme_support('align-wide');
	add_theme_support('disable-custom-colors');
	add_theme_support('disable-custom-gradients');
	add_theme_support('disable-custom-font-sizes');
	add_theme_support('editor-font-sizes', []);
	//

	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	register_nav_menus(
		array(
			'primary-menu' => "Menu Principal",
			'footer-menu' => "Menu Rodapé",
			'social-menu' => "Menu Social"
		)
	);

	// add_image_size('blog-featured', 300, 250, true);
}
add_action('after_setup_theme', 'void_setup');

function void_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'void'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'void'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'void_widgets_init');
#endregion
