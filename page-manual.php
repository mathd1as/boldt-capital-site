<?php if (is_user_logged_in()) : ?>
	<?php include('assets/manual/header_manual.php'); ?>

	<div class="uk-section section-hero uk-position-relative" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
		<div class="uk-container uk-container-small">
			<p class="hero-image uk-text-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/manual/src/img/destaque.svg" alt="Hero"></p>
			<h1 class="uk-heading-medium uk-text-center uk-margin-remove-top" style="text-transform: uppercase;font-weight: 800;font-size: 45px;">Manual do Website</h1>
			<p class="uk-text-lead uk-text-center">
				Esta página contém um manual de todas as funcionalidades de gestão de conteúdo do seu site. <br>
			</p>
		</div>
	</div>

	<div class="uk-section">
		<div class="uk-container">
			<div class="uk-child-width-1-3@m uk-grid-match uk-text-center uk-margin-medium-top" data-uk-grid>
				<?php
				$cont = 1;
				$array_ultimas = array();
				$args = array(
					'post_type' => 'manual',
					'post_status' => 'publish',
					'posts_per_page' => -1
				);
				$query = new WP_Query($args);

				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post(); ?>
						<div>
							<div class="uk-card uk-card-default uk-box-shadow-medium uk-card-hover uk-card-body uk-inline border-radius-large border-xlight">
								<a class="uk-position-cover" href="<?php the_permalink(); ?>"></a>
								<span class="numero"><?php echo str_pad($cont, 2, '0', STR_PAD_LEFT); ?></span>
								<h3 class="uk-card-title uk-margin"><?php the_title(); ?></h3>
								<p><?php the_excerpt() ?></p>
							</div>
						</div>
						<?php $cont++; ?>
					<?php endwhile; ?>
				<?php else : ?>
					<div style="text-align: center; width: 100%!important;">
						<p>Ops, não há nada aqui ainda. Cadastre os índices do manual pelo painel Wordpress.</p>
					</div>
				<?php endif; ?>


			</div>
		</div>
	</div>


	<?php include('assets/manual/footer_manual.php'); ?>

<?php else : ?>

	<?php include('assets/manual/header_manual.php'); ?>
	<div style="text-align: center; width: 100%!important;padding:100px 0">
		<p>Você precisa estar logado para ver o manual deste site</p>
	</div>

<?php endif; ?>