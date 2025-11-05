<?php if (is_user_logged_in()) : ?>

	<?php include('assets/manual/header_manual.php'); ?>

	<div class="uk-section">
		<div class="uk-container">
			<div class="uk-grid-large" data-uk-grid>

				<?php $link = get_the_permalink(); ?>
				<div class="sidebar-fixed-width uk-visible@m">
					<div class="sidebar-docs uk-position-fixed uk-margin-top">
						<h5>Índice</h5>
						<ul class="uk-nav uk-nav-default doc-nav">
							<?php
							$array_ultimas = array();
							$args = array(
								'post_type' => 'manual',
								'post_status' => 'publish',
								'posts_per_page' => -1,
								'order' => 'ASC'
							);
							$query = new WP_Query($args);
							if ($query->have_posts()) :
								while ($query->have_posts()) : $query->the_post(); ?>
									<li class="<?php if ($link == get_the_permalink()) : echo 'uk-active';
												endif; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>

				<div class="uk-width-1-1 uk-width-expand@m">
					<article class="uk-article">
						<h1 class="uk-article-title"><?php the_title(); ?></h1>

						<div class="article-content link-primary">
							<?php the_content() ?>
						</div>

					</article>
				</div>
			</div>
		</div>
	</div>

	<?php include('assets/manual/footer_manual.php'); ?>

<?php endif; ?>