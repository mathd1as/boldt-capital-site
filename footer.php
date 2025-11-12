<footer id="colophon" class="site-footer py-5">
	<div class="site-info container">
		<div class="row">
			<div class="col-lg-5">
				<?php 
					$footer_logo = get_field('footer_logo');
					if ($footer_logo): 
				?>
					<div class="footer-logo-wrapper">
						<?php echo wp_get_attachment_image($footer_logo['id'], 'full'); ?>
					</div>
				<?php endif; ?>
				
				<?php 
					$footer_description = get_field('footer_logo_description');
					if ($footer_description): 
				?>
					<p class="logo-description"><?php echo esc_html($footer_description); ?></p>
				<?php endif; ?>
			</div>
			<div class="col-lg-3">
			<h3 class="contact-info-title">Let's talk</h3>
			<?php 
				$footer_number = get_field('footer_number');
				$footer_email = get_field('footer_email');
				$footer_linkedin = get_field('footer_linkedin');
				$footer_linkedin_link = get_field('footer_linkedin_link');	
			?>
		<p class="contact-info"><?php echo esc_html($footer_number); ?></p>
		<a href="mailto:<?php echo esc_html($footer_email); ?>" class="contact-info mb-3 d-block"><?php echo esc_html($footer_email); ?></a>
		<p class="contact-info">
			<?php if ($footer_linkedin_link): ?>
				<a href="<?php echo esc_url($footer_linkedin_link); ?>" target="_blank" rel="noopener noreferrer">
					<?php echo esc_html($footer_linkedin); ?>
				</a>
			<?php else: ?>
				<?php echo esc_html($footer_linkedin); ?>
			<?php endif; ?>
		</p>
			</div>
			<div class="col-lg-4">
				<h3 class="contact-info-title">We are Here</h3>
				<?php 
					$footer_we_are_here = get_field('footer_we_are_here');	
				?>
				<p class="contact-we-are-here"><?php echo esc_html($footer_we_are_here); ?></p>
			</div>
		</div>
		<hr class="footer-divider">
		<div>
			<div class="col-lg-12">
				<?php 
					$boldt_copyright = get_field('boldt_copyright');	
				?>
				<p class="footer-copyright"><?php echo $boldt_copyright; ?></p>
			</div>
		</div>
	</div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>