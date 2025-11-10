<?php
define('_THEME_VERSION', '2.0.0');

require_once get_template_directory() . '/assets/php/functions-base.php';

// styles and scripts
function void_scripts()
{
	// carrega jquery no footer
	wp_deregister_script('jquery');
	wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
	wp_enqueue_script('jquery');
	$requirements = ['jquery'];

	wp_enqueue_style('bootstrap-css', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", array(), '5.1.3');
	
	wp_enqueue_style('Inter', "https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap");
	wp_enqueue_style('Montserrat', "https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap");

	// wp_enqueue_style('slick', get_template_directory_uri() . "/assets/js/libs/slick/slick.css", array(), '1.8.1');
	// wp_enqueue_style('slick-theme', get_template_directory_uri() . "/assets/js/libs/slick/slick-theme.css", array(), '1.8.1');
	// wp_enqueue_script('slick', get_template_directory_uri() . "/assets/js/libs/slick/slick.min.js", array('jquery'), '1.8.1', true);
	// $requirements[] = 'slick';

	// wp_enqueue_style('fancybox', get_template_directory_uri() . "/assets/js/libs/fancybox/fancybox.css", array(), '4.0.9');
	// wp_enqueue_script('fancybox', get_template_directory_uri() . "/assets/js/libs/fancybox/fancybox.umd.js", array(), '4.0.9', true);
	// $requirements[] = 'fancybox';

	wp_enqueue_script('bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", array('jquery'), '5.1.3', true);
	$requirements[] = 'bootstrap';

	$css_update_time = filemtime(get_stylesheet_directory()  . '/assets/css/app.min.css');
	wp_enqueue_style('void-style', get_template_directory_uri() . '/assets/css/app.min.css', array('bootstrap-css'), $css_update_time);

	// Team Modal Styles
	$team_modal_css_time = filemtime(get_stylesheet_directory()  . '/assets/css/team-modal.css');
	wp_enqueue_style('team-modal', get_template_directory_uri() . '/assets/css/team-modal.css', array('void-style'), $team_modal_css_time);

	$js_update_time = filemtime(get_stylesheet_directory()  . '/assets/js/app.js');
	wp_enqueue_script('app', get_template_directory_uri() . "/assets/js/app.js", $requirements, $js_update_time, true);

	// Custom sidebar script
	$sidebar_script_time = filemtime(get_stylesheet_directory()  . '/script.js');
	wp_enqueue_script('sidebar-script', get_template_directory_uri() . "/script.js", array('jquery'), $sidebar_script_time, true);
}
add_action('wp_enqueue_scripts', 'void_scripts');

// DROPDOWN MOBILE

class My_Walker_Nav_Menu extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\" style=\"display:none\">\n";
	}

	function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
	{
		$menu_item = $data_object;

		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ($depth) ? str_repeat($t, $depth) : '';

		$classes   = empty($menu_item->classes) ? array() : (array) $menu_item->classes;
		$classes[] = 'menu-item-' . $menu_item->ID;

		$args = apply_filters('nav_menu_item_args', $args, $menu_item, $depth);

		$class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = !empty($menu_item->attr_title) ? $menu_item->attr_title : '';
		$atts['target'] = !empty($menu_item->target) ? $menu_item->target : '';
		if ('_blank' === $menu_item->target && empty($menu_item->xfn)) {
			$atts['rel'] = 'noopener';
		} else {
			$atts['rel'] = $menu_item->xfn;
		}
		$atts['href']         = !empty($menu_item->url) ? $menu_item->url : '';
		$atts['aria-current'] = $menu_item->current ? 'page' : '';

		$atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (is_scalar($value) && '' !== $value && false !== $value) {
				$value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters('the_title', $menu_item->title, $menu_item->ID);
		$title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $this->has_children ? "<div class='dropdown-toggle'></div>" : '';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args);
	}
}

add_theme_support('editor-color-palette', array(
	array(
		'name'  => 'white',
		'slug'  => 'white',
		'color' => '#fff',
	),
	array(
		'name'  => 'black',
		'slug'  => 'black',
		'color' => '#000',
	),
));
