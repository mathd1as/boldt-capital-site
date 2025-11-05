<?php get_header(); ?>

<main id="primary" class="site-main">

	<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php 
        $hero_background = get_field('hero_background');
        $hero_logo = get_field('hero_logo');
      ?>
      <section class="hero flex-column" style="background-image: url('<?php echo $hero_background['url'];?>');">
        <?php 
          echo wp_get_attachment_image($hero_logo['id'], 'full');
        ?>
        <button class="hero-button">
          <a href="<?php the_field('hero_button_link');?>">
            <?php the_field('hero_button_label');?>
          </a>
        </button>
      </section>
      <section class="about-us">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2><?php the_field('hero_label');?></h2>
              <p>teste</p>
            </div>
            <div class="col-lg-6">
            <?php 
              echo wp_get_attachment_image($hero_background['id'], 'full');
            ?>
            </div>
          </div>
        </div>
      </section>
    </article>

	<?php endwhile; ?>

</main>

<?php

get_footer();
