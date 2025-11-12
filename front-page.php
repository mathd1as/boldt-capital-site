<?php get_header(); ?>

<main id="primary" class="site-main">
	<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php 
        $hero_background = get_field('hero_background');
        $we_are_boldt_background = get_field('we_are_boldt_background');
        $hero_logo = get_field('hero_logo');
      ?>
      <section id="hero" class="hero flex-column" style="background-image: url('<?php echo $hero_background['url'];?>');">
        <?php 
          echo wp_get_attachment_image($hero_logo['id'], 'full', false, ['class' => 'px-5 px-lg-0']);
        ?>
        <button class="hero-button">
          <a href="<?php the_field('hero_button_link');?>">
            <?php the_field('hero_button_label');?>
          </a>
        </button>
      </section>
      <section id="about-us" class="about-us">
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
      <section id="we-are-boldt" class="we-are-boldt flex-column" style="background-image: url('<?php echo $we_are_boldt_background['url'];?>');">
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
      <section id="strategy" class="strategy">
        <div class="container">
          <div class="row align-items-center">
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
      <section id="sectors" class="sectors">
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
            <div class="sectors-icons-wrapper">
              <?php if (have_rows('sectors_icons')): ?>
                <?php while (have_rows('sectors_icons')): the_row(); 
                  $icon_logo = get_sub_field('sectors_icon_logo');
                  $icon_description = get_sub_field('sectors_icon_description');
                ?>
                  <div>
                    <?php if ($icon_logo): ?>
                      <div class="sector-icon-image-wrapper d-flex align-items-start justify-content-center" style="height: 112px;">
                        <?php echo wp_get_attachment_image($icon_logo['id'], 'full', false, ['class' => 'sector-icon', 'width' => '112', 'height' => '112']); ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($icon_description): ?>
                      <p class="sector-icon-description text-center mt-2"><?php echo $icon_description; ?></p>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section id="solutions" class="solutions">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2><?php the_field('solutions_title');?></h2>
              <?php
                $texto = get_field('solutions_description'); // exemplo ACF
                $palavra1 = 'climate';
                $palavra2 = 'economic value.';

                $texto_formatado = str_replace(
                  $palavra1,
                  '<span class="destaque">'.$palavra1.'</span>',
                  $texto
                );

                $texto_formatado = str_replace(
                  $palavra2,
                  '<span class="destaque">'.$palavra2.'</span>',
                  $texto_formatado
                );

              ?>
              <p class="solutions-description"><?php echo $texto_formatado; ?></p>
            </div>
            <div class="col-lg-6">
              <div class="solutions-box-dialog-wrapper flex no">
                <?php
                  $texto = get_field('solutions_box_dialog_1');
                  $palavra = 'proven solutions';

                  $texto_formatado = str_replace(
                    $palavra,
                    '<span>'.$palavra.'</span>',
                    $texto
                  );
                ?>
                <p class="solutions-box-dialog"><?php echo $texto_formatado; ?></p>
              </div>
              <div class="solutions-box-dialog-wrapper flex">
                <?php
                  $texto = get_field('solutions_box_dialog_2');
                  $palavra = 'ready to scale,';

                  $texto_formatado = str_replace(
                    $palavra,
                    '<span>'.$palavra.'</span>',
                    $texto
                  );
                ?>
                <p class="solutions-box-dialog"><?php echo $texto_formatado; ?></p>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row solutions-icons-wrapper">
                <?php if (have_rows('solutions_icons')): ?>
                  <?php while (have_rows('solutions_icons')): the_row(); 
                    $logo = get_sub_field('icon');
                    $title = get_sub_field('title');
                    
                    $palavra = 'NBS';
                    $title = str_replace(
                      $palavra,
                      'NBS<br>',
                      $title
                    );
                  ?>
                    <div class="col-lg-4 solution-icon-item">
                      <?php if ($logo): ?>
                        <div class="solution-icon-image-wrapper">
                          <?php echo wp_get_attachment_image($logo['id'], 'full', false, ['class' => 'solution-icon']); ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($title): ?>
                        <h3 class="solutions-logo-title"><?php echo $title; ?></h3>
                      <?php endif; ?>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="our-team" class="our-team">
        <div class="container">
          <h2><?php the_field('our_team_title');?></h2>
          <p class="our-team-description"><?php the_field('our_team_subtitle');?></p>
          <p class="our-team-text"><?php the_field('our_team_text');?></p>
          <div class="our-team-images-wrapper">
            <div class="row justify-content-center">
             <?php if (have_rows('team')): ?>
              <?php $count = 0; ?>
                <?php while (have_rows('team')): the_row();
                  $photo = get_sub_field('photo');
                  $name = get_sub_field('name');
                  $linkedin = get_sub_field('linkedin');
                  $biography = get_sub_field('biography');
                ?>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="our-team-image d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#memberModal<?php echo $count; ?>" role="button">
                    <?php echo wp_get_attachment_image($photo['id'], 'full', false, ['class' => 'img-fluid']); ?>
                  </div>
                  <a href="<?php echo $linkedin; ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/linkedin_icon.png" alt="LinkedIn" class="linkedin-icon">
                  </a>
                  <p class="team-member-name-display"><?php echo $name; ?></p>
                  </div>
                  <div class="modal fade" id="memberModal<?php echo $count; ?>" tabindex="-1" aria-labelledby="memberModal<?php echo $count; ?>Label">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content team-modal-content">
                        <button type="button" class="btn-close team-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body p-4">
                          <div class="row">
                            <!-- Foto -->
                            <div class="img-wrapper col-md-4">
                              <?php 
                                $linkedin_icon = get_field('modal_linkedin_icon');
                                if($photo):
                                  echo wp_get_attachment_image($photo['id'], 'medium', false, ['class' => 'img-fluid rounded']);
                                endif;
                              ?>
                            </div>
                            <!-- Nome -->
                            <div class="col-md-8 d-flex flex-column justify-content-center align-items-start">
                              <h3 class="team-member-name mb-2"><?php echo $name; ?></h3>
                              <?php 
                                $linkedin = get_field('linkedin');
                                if($linkedin_icon):
                              ?>
                                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer">
                                  <?php echo wp_get_attachment_image($linkedin_icon['id'], 'full', false, ['class' => 'linkedin-icon', 'style' => 'width: 33px; height: 33px;']); ?>
                                </a>
                              <?php endif; ?>
                            </div>
                          </div>
                          <!-- Bio -->
                          <div class="row mt-4">
                            <div class="col-12">
                              <p class="team-member-bio"><?php echo $biography; ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php $count++; endwhile; ?>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </section>
      <section id="our-portfolio" class="our-portfolio">
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
                    $logo_link = get_sub_field('link');
                  ?>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 portfolio-logo-item">
                      <?php if ($logo): ?>
                        <div class="portfolio-logo-wrapper">
                          <a href="<?php echo esc_url($logo_link); ?>" target="_blank" rel="noopener noreferrer" class="portfolio-logo-link">
                            <?php echo wp_get_attachment_image($logo['id'], 'medium', false, ['class' => 'portfolio-logo']); ?>
                          </a>
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
