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
				<div class="row py-3">
					<div class="col-auto col-lg-3 d-flex align-items-center"><?php the_custom_logo() ?></div>
					<div class="col-lg-6 d-none d-lg-flex align-items-center">
						<?php wp_nav_menu([
							'theme_location' => 'primary-menu',
							'container' => '',
							'menu_class' => 'menu w-100 d-flex justify-content-between'
						]) ?>
					</div>
					<div class="col-lg-3 text-end">
						<a href="#">Quero investir</a>
					</div>
					<div class="col d-flex justify-content-end align-items-center d-lg-none">

						<button class="hamburger hamburger--squeeze" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>

					</div>
				</div>
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