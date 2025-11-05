<?php
#region Dashboard
function disable_default_dashboard_widgets()
{
	remove_action('welcome_panel', 'wp_welcome_panel');
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_site_health', 'dashboard', 'core');
	remove_meta_box('dashboard_php_nag', 'dashboard', 'normal');
	remove_meta_box('dashboard_activity', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

function dashboard_void()
{
	echo '
	<h2><b>Olá!</b></h2>
	<p>Bem-vindo ao painel do seu Website! <br>
	Aqui você poderá fazer a gestão de todo o conteúdo disponível para edição. <br>
	</p>
	<a href="' . site_url() . '/manual" class="btManual">Manual</a>
	';
}
function add_dashboard_widgets()
{
	wp_add_dashboard_widget('dashboard_suporte_widget', 'Suporte', 'dashboard_void');
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets');
#endregion

#region User Caps
function add_manual_caps()
{
	$role = get_role('administrator');
	$role->add_cap('edit_manual');
	$role->add_cap('edit_manuals');
	$role->add_cap('edit_others_manuals');
	$role->add_cap('publish_manuals');
	$role->add_cap('read_manual');
	$role->add_cap('read_private_manuals');
	$role->add_cap('delete_manual');
	$role->add_cap('edit_published_manuals');
	$role->add_cap('delete_published_manuals');
}
add_action('admin_init', 'add_manual_caps');
#endregion


#region Manual Post Type / ACF Fields and Page Creation
function create_post_type()
{
	$labels = array(
		'name' => 'Manual',
		'singular_name' => 'Manual',
		'add_new' => 'Adicionar ',
		'all_items' => 'Itens do manual',
		'add_new_item' => 'Adicionar ',
		'edit_item' => 'Editar',
		'new_item' => 'Nova',
		'view_item' => 'Ver',
		'search_items' => 'Buscar',
		'not_found' =>  'Nenhum encontrado',
		'not_found_in_trash' => 'Nenhum encontrado',
		'parent_item_colon' => '',
		'menu_name' => 'Manual'
	);
	$args = array(
		'labels' => $labels,
		'description' => "Cadastro",
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-media-document',
		'capability_type' => 'manual',
		'capabilities' => array(
			'read_post' => 'read_manual',
			'publish_posts' => 'publish_manuals',
			'edit_posts' => 'edit_manuals',
			'edit_others_posts' => 'edit_others_manuals',
			'delete_posts' => 'delete_manuals',
			'delete_others_posts' => 'delete_others_manuals',
			'read_private_posts' => 'read_private_manuals',
			'edit_post' => 'edit_manual',
			'delete_post' => 'delete_manual',
		),
		'rewrite' => array('slug' => 'manual'),
		'supports' => array('title', 'editor', 'excerpt'),
		'query_var' => true,
		'can_export' => true,
	);
	register_post_type('manual', $args);
}
add_action('init', 'create_post_type');

function create_manual_acf_fields()
{
	if (function_exists('acf_add_local_field_group')) :
		acf_add_local_field_group(array(
			'key' => 'group_5f481b2ba6d2a',
			'title' => 'Manual',
			'fields' => array(
				array(
					'key' => 'field_5f481b417173a',
					'label' => 'Resumo',
					'name' => 'resumo',
					'type' => 'textarea',
					'instructions' => 'O resumo aparece no item da home do manual. É importante descrever brevemente do que se trata o item em questão.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => 2,
					'new_lines' => 'br',
				),
				array(
					'key' => 'field_5f481b3071739',
					'label' => 'Descrição',
					'name' => 'descricao',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'manual',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array(
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'page_attributes',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
			'active' => true,
			'description' => '',
		));

	endif;
}
// add_action('admin_init', 'create_manual_acf_fields');

function force_create_manual_page()
{
	if (empty(get_page_by_path('manual'))) {
		wp_insert_post(array(
			'post_title'     => 'Manual',
			'post_type'      => 'page',
			'post_name'      => 'manual',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'post_content'   => '',
			'post_status'    => 'publish'
		));
	}
}
add_action('admin_init', 'force_create_manual_page');
