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
    <button class="contato">Abrir Contato</button>

    <div id="sidebar" class="sidebar">
        <button class="close-btn">&times;</button>
        <h2>Conteúdo da Sidebar</h2>
        <p>Este é o conteúdo da sua sidebar. Você pode adicionar o que quiser aqui.</p>
    </div>

    <div class="overlay"></div>