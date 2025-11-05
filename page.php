<?php get_header(); ?>

<main id="primary" class="site-main">

	<?php while (have_posts()) : the_post(); ?>
		<div class="container">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<figure><?php the_post_thumbnail(); ?></figure>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			</article>

		</div>
	<?php endwhile; ?>

</main>

<?php
// get_sidebar();
get_footer();
