<?php get_header() ?>

<main id="primary" class="site-main">
	<div class="container">

		<?php if (have_posts()) : ?>
			<header class="page-header my-5">
				<h1 class="page-title">
					<?php printf("Resultado de busca por: %s", '<span>' . get_search_query() . '</span>'); ?>
				</h1>
			</header>

			<?php
			while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
						<div class="entry-meta">
							<div>em <span><?php the_date(); ?></span></div>
							<div>por <span><?php the_author(); ?></span></div>
						</div>
					</header>
					<?php the_post_thumbnail(); ?>
					<div class="entry-summary"><?php the_excerpt(); ?></div>
				</article>

			<?php
			endwhile;
			the_posts_navigation();
		else : ?>

			<div>nenhum resultado encontrado</div>

		<?php endif ?>

	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
