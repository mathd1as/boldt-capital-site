<footer id="colophon" class="site-footer py-5">
	<div class="site-info container">
		<div class="row">
			<div class="col-lg-5">
				<?php 
					$footer_logo = get_field('footer_logo', 'option');
					if ($footer_logo): 
				?>
					<div class="footer-logo-wrapper">
						<?php echo wp_get_attachment_image($footer_logo['id'], 'full', false, ['class' => 'footer-logo']); ?>
					</div>
				<?php endif; ?>
				
				<?php 
					$footer_description = get_field('footer_logo_description', 'option');
					if ($footer_description): 
				?>
					<p class="footer-description"><?php echo esc_html($footer_description); ?></p>
				<?php endif; ?>
			</div>
			<div class="col-lg-3">
			</div>
			<div class="col-lg-4">
			</div>
		</div>


	</div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>