<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package void
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container my-4">

		<section class="error-404 not-found text-center">
			<header class="page-header">
				<h1 class="page-title">Ops! Página não encontrada</h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p>Parece que nada foi encontrado neste local. Volte para a home ou tente pesquisa</p>

				<a href="<?php echo home_url("/") ?>" class="btn btn-secondary d-inline-block mb-4">Voltar para Home</a>

				<?php get_search_form(); ?>


			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</div>
</main><!-- #main -->

<?php
get_footer();
