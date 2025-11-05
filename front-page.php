<?php get_header(); ?>

<main id="primary" class="site-main">

	<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php 
        $hero_background = get_field('hero_background');
      ?>
      <section class="hero" style="background-image: url('<?php the_field('hero_background');?>');">
        <button class="hero-button">
          <a href="<?php the_field('hero_button_link');?>">
            <?php the_field('hero_button_label');?>
          </a>
        </button>
      </section>
    </article>

	<?php endwhile; ?>

</main>

<?php
// get_sidebar();
get_footer();
