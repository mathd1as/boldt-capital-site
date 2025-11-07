<?php get_header(); ?>

<main id="primary" class="site-main">
	<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php 
        $hero_background = get_field('hero_background');
        $we_are_boldt_background = get_field('we_are_boldt_background');
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
              <h2><?php the_field('about_us_title');?></h2>
              <p><?php the_field('about_us_text');?></p>
            </div>
            <div class="col-lg-6">
            <?php 
              $about_us_image = get_field('about_us_image');
              echo wp_get_attachment_image($about_us_image['id'], 'full');
            ?>
            </div>
          </div>
        </div>
      </section>
      <section class="we-are-boldt flex-column" style="background-image: url('<?php echo $we_are_boldt_background['url'];?>');">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <p class="we-are-boldt-text"><?php the_field('we_are_boldt_text');?></p>
            </div>
            <div class="col-lg-4">
              <h2><?php the_field('we_are_boldt_title');?></h2>
              <p class="we-are-boldt-description"><?php the_field('we_are_boldt_description');?></p>
            </div>
          </div>
        </div>
      </section>
      <section class="strategy">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2><?php the_field('strategy_title');?></h2>
              <p class="strategy-text"><?php the_field('strategy_text');?></p>
              <p class="strategy-strong-text"><?php the_field('strategy_strong_text');?></p>
            </div>
            <div class="strategy-image-wrapper col-lg-6">
              <?php 
                $strategy_image = get_field('strategy_image');
                echo wp_get_attachment_image($strategy_image['id'], 'full', false, ['width' => '592', 'height' => '499']);
              ?>
            </div>
          </div>
        </div>
      </section>
      <section class="sectors">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <h2><?php the_field('sector_title');?></h2>
              <p class="sector-desription"><?php the_field('sector_description');?></p>
            </div>
            <div class="col-lg-6 offset-lg-2">
            <p class="sector-text"><?php the_field('sector_text');?></p>
          </div>
          <div class="col-lg-12">
            <div class="sectors-icons-wrapper d-flex flex-nowrap justify-content-between align-items-start">
              <?php if (have_rows('sectors_icons')): ?>
                <?php while (have_rows('sectors_icons')): the_row(); 
                  $icon_logo = get_sub_field('sectors_icon_logo');
                  $icon_description = get_sub_field('sectors_icon_description');
                ?>
                  <div class="sector-icon-item">
                    <?php if ($icon_logo): ?>
                      <div class="sector-icon-image-wrapper d-flex align-items-start justify-content-center" style="height: 112px;">
                        <?php echo wp_get_attachment_image($icon_logo['id'], 'full', false, ['class' => 'sector-icon', 'width' => '112', 'height' => '112']); ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($icon_description): ?>
                      <p class="sector-icon-description text-center mt-2"><?php echo esc_html($icon_description); ?></p>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section class="solutions">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2><?php the_field('solutions_title');?></h2>
              <p class="solutions-description"><?php the_field('solutions_description');?></p>
            </div>
            <div class="col-lg-6">
              <div class="solutions-box-dialog-wrapper flex no">
                <p class="solutions-box-dialog"><?php the_field('solutions_box_dialog_1');?></p>
              </div>
              <div class="solutions-box-dialog-wrapper flex">
                <p class="solutions-box-dialog"><?php the_field('solutions_box_dialog_2');?></p>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row solutions-icons-wrapper">
                <?php if (have_rows('solutions_icons')): ?>
                  <?php while (have_rows('solutions_icons')): the_row(); 
                    $logo = get_sub_field('icon');
                    $title = get_sub_field('title');
                  ?>
                    <div class="col-lg-4 solution-icon-item">
                      <?php if ($logo): ?>
                        <div class="solution-icon-image-wrapper">
                          <?php echo wp_get_attachment_image($logo['id'], 'full', false, ['class' => 'solution-icon']); ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($title): ?>
                        <h3 class="solutions-logo-title"><?php echo esc_html($title); ?></h3>
                      <?php endif; ?>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="our-team">
        <div class="container">
          <h2><?php the_field('our_team_title');?></h2>
          <p class="our-team-description"><?php the_field('our_team_subtitle');?></p>
          <p class="our-team-text"><?php the_field('our_team_text');?></p>
        </div>
      </section>
      <section class="our-portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2><?php the_field('our_portfolio_title');?></h2>
              <p class="our-portfolio-subtitle"><?php the_field('our_portfolio_subtitle');?></p>
              <p class="our-portfolio-description"><?php the_field('our_portfolio_description');?></p>
            </div>
            <div class="col-lg-12">
              <div class="row our-portfolio-logos-wrapper">
                <?php if (have_rows('our_portfolio_logos')): ?>
                  <?php while (have_rows('our_portfolio_logos')): the_row(); 
                    $logo = get_sub_field('logo');
                  ?>
                    <div class="col-lg-4 portfolio-logo-item">
                      <?php if ($logo): ?>
                        <div class="portfolio-logo-wrapper">
                          <?php echo wp_get_attachment_image($logo['id'], 'full', false, ['class' => 'portfolio-logo']); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </article>
	<?php endwhile; ?>
</main>

<?php

get_footer();
