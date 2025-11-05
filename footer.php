<footer id="colophon" class="site-footer py-5 mt-5">
	<div class="site-info container">

		<div class="row gy-5">

			<div class="col-12 col-lg-4 text-center text-lg-start">
				<?php the_custom_logo() ?>
			</div>

			<div class="col-12 col-lg-4 text-center text-lg-start">
				<h3 class="fw-bold">Menu</h3>
				<?php wp_nav_menu([
					'theme_location' => 'footer-menu',
					'container' => '',
					'menu_class' => 'menu d-flex flex-column'
				]) ?>
			</div>
		</div>

	</div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>