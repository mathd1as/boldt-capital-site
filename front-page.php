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
                      <p class="sector-icon-description text-center mt-2"><?php echo $icon_description; ?></p>
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
      <section class="our-team">
        <div class="container">
          <h2><?php the_field('our_team_title');?></h2>
          <p class="our-team-description"><?php the_field('our_team_subtitle');?></p>
          <p class="our-team-text"><?php the_field('our_team_text');?></p>
          <div class="our-team-images-wrapper">
            <div class="row justify-content-center">
              <?php 
                $member_1 = get_field('member_1');
                $member_2 = get_field('member_2');
                $member_3 = get_field('member_3');
              ?>
              
              <?php if($member_1): ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="our-team-image d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#memberModal1" role="button">
                    <?php echo wp_get_attachment_image($member_1['id'], 'full', false, ['class' => 'img-fluid']); ?>
                  </div>
                </div>
              <?php endif; ?>
              
              <?php if($member_2): ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="our-team-image d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#memberModal2" role="button">
                    <?php echo wp_get_attachment_image($member_2['id'], 'full', false, ['class' => 'img-fluid']); ?>
                  </div>
                </div>
              <?php endif; ?>
              
              <?php if($member_3): ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="our-team-image d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#memberModal3" role="button">
                    <?php echo wp_get_attachment_image($member_3['id'], 'full', false, ['class' => 'img-fluid']); ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Modal Member 1 -->
          <?php if($member_1): ?>
            <div class="modal fade" id="memberModal1" tabindex="-1" aria-labelledby="memberModal1Label">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content team-modal-content">
                  <button type="button" class="btn-close team-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-body p-4">
                    <div class="row">
                      <!-- Foto -->
                      <div class="img-wrapper col-md-4">
                        <?php 
                          $linkedin_icon = get_field('modal_linkedin_icon');
                          $member_1_photo = get_field('member_1_photo');
                          if($member_1_photo):
                            echo wp_get_attachment_image($member_1_photo['id'], 'medium', false, ['class' => 'img-fluid rounded']);
                          endif;
                        ?>
                      </div>
                      <!-- Nome -->
                      <div class="col-md-8 d-flex flex-column justify-content-center align-items-start">
                        <h3 class="team-member-name mb-2"><?php the_field('member_1_name'); ?></h3>
                        <?php 
                          if($linkedin_icon):
                            echo wp_get_attachment_image($linkedin_icon['id'], 'full', false, ['class' => 'linkedin-icon', 'style' => 'width: 33px; height: 33px;']);
                          endif;
                        ?>
                      </div>
                    </div>
                    <!-- Bio -->
                    <div class="row mt-4">
                      <div class="col-12">
                        <p class="team-member-bio"><?php the_field('member_1_bio'); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <!-- Modal Member 2 -->
          <?php if($member_2): ?>
            <div class="modal fade" id="memberModal2" tabindex="-1" aria-labelledby="memberModal2Label">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content team-modal-content">
                  <button type="button" class="btn-close team-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-body p-4">
                    <div class="row">
                      <!-- Foto -->
                      <div class="img-wrapper col-md-4">
                        <?php 
                          $member_2_photo = get_field('member_2_photo');
                          if($member_2_photo):
                            echo wp_get_attachment_image($member_2_photo['id'], 'medium', false, ['class' => 'img-fluid rounded']);
                          endif;
                        ?>
                      </div>
                      <!-- Nome -->
                      <div class="col-md-8 d-flex flex-column justify-content-center align-items-start">
                        <h3 class="team-member-name mb-2"><?php the_field('member_2_name'); ?></h3>
                        <?php 
                          if($linkedin_icon):
                            echo wp_get_attachment_image($linkedin_icon['id'], 'full', false, ['class' => 'linkedin-icon', 'style' => 'width: 33px; height: 33px;']);
                          endif;
                        ?>
                      </div>
                    </div>
                    <!-- Bio -->
                    <div class="row mt-4">
                      <div class="img-wrappercol-12">
                        <p class="team-member-bio"><?php the_field('member_2_bio'); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <!-- Modal Member 3 -->
          <?php if($member_3): ?>
            <div class="modal fade" id="memberModal3" tabindex="-1" aria-labelledby="memberModal3Label">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content team-modal-content">
                  <button type="button" class="btn-close team-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-body p-4">
                    <div class="row">
                      <!-- Foto -->
                      <div class="img-wrapper col-md-4">
                        <?php 
                          $member_3_photo = get_field('member_3_photo');
                          if($member_3_photo):
                            echo wp_get_attachment_image($member_3_photo['id'], 'medium', false, ['class' => 'img-fluid rounded']);
                          endif;
                        ?>
                      </div>
                      <!-- Nome -->
                      <div class="col-md-8 d-flex flex-column justify-content-center align-items-start">
                        <h3 class="team-member-name mb-2"><?php the_field('member_3_name'); ?></h3>
                        <?php 
                          if($linkedin_icon):
                            echo wp_get_attachment_image($linkedin_icon['id'], 'full', false, ['class' => 'linkedin-icon', 'style' => 'width: 33px; height: 33px;']);
                          endif;
                        ?>
                      </div>
                    </div>
                    <!-- Bio -->
                    <div class="row mt-4">
                      <div class="col-12">
                        <p class="team-member-bio"><?php the_field('member_3_bio'); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

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
