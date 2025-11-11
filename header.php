<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Botão de Menu Fixo -->
    <button class="contato">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <button class="close-btn">&times;</button>
        <nav>
            <?php wp_nav_menu([
                'theme_location' => 'primary-menu',
                'container' => '',
                'menu_class' => 'menu mt-4 w-100 h-100 d-flex flex-column',
            ]) ?>
        </nav>
    </div>

    <!-- Overlay -->
    <div class="overlay"></div>

<div id="page" class="site">