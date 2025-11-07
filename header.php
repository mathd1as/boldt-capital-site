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

	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<div class="nav-wrapper container">
			</div>
			<div class="mobile-nav container-lg px-5 overflow-hidden d-flex flex-column">
				<nav>
					<?php wp_nav_menu([
						'theme_location' => 'primary-menu',
						'container' => '',
						'menu_class' => 'menu w-100 h-100 d-flex flex-column'
					]) ?>
				</nav>
			</div>
		</header>