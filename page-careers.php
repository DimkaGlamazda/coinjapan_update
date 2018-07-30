<?php

get_header();

?>

  <section class="page-title careers-title-bg" data-parallax="scroll">
    <div class="page-titke-overlay">
      <div class="cj-container">
        <h1><?php pll_e('Careers') ?></h1>
        <ul class="breadcrumbs">
          <li><a href="<?=get_permalink(get_page_by_path('home'))?>"><?php pll_e('Home') ?></a></li>
          <li><a href="#"><?php pll_e('Careers') ?></a></li>
        </ul>
      </div>
    </div>
  </section><!-- TITLE -->

  <section class="career-page-about">
    <div class="cj-container">
      <div class="row no-gutters career-page-about-wrapper">
        <div class="col-lg-6 col-12">
          <div class="career-page-about-description-wrapper">
            <h2 class="section-header"><?php pll_e('What we do') ?></h2>
            <article>
              <p><?php pll_e('careers_section1_description') ?></p>
            </article>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="about-us-slider">
            <div id="mainSlider" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block img-fluid" src="<?=CJ_MEDIA_ROOT?>/images/slider/slider-careers/careers1.jpg"
                       alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="<?=CJ_MEDIA_ROOT?>/images/slider/slider-careers/careers2.jpg"
                       alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="<?=CJ_MEDIA_ROOT?>/images/slider/slider-careers/careers3.jpg"
                       alt="Third slide">
                </div>
              </div>
              <div class="slide-controls-box">
                <a class="about-us-slider-prev" href="#mainSlider" role="button" data-slide="prev">
                  <img src="<?=CJ_MEDIA_ROOT?>/controls/prev-arrow.png" alt="prev">
                </a>
                <a class="about-us-slider-next" href="#mainSlider" role="button" data-slide="next">
                  <img src="<?=CJ_MEDIA_ROOT?>/controls/next-arrow.png" alt="next">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php

$positions = new WP_Query(array('post_type' => 'positions', 'posts_per_page' => 10));

if ($positions->have_posts()): ?>
  <section class="career-page-positions">
    <div class="cj-container">
      <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Open positions in CoinJapan')?></h2>
      <div class="positions-wrapper row no-gutters">
        <?php while ($positions->have_posts()) : $positions->the_post(); ?>
          <div class="col-lg-4 col-md-6" data-css-animate="trigger">
            <div class="position-item">
              <a href="<?php echo get_permalink(); ?>">
                <span class="position-title"><?php the_title(); ?></span>
                <?php

                $custom_fields = get_post_custom(get_the_ID());


                $country = $custom_fields['locale_country'][0];

                $city = $custom_fields['locale_sity'][0];

                $location = $country;

                if ($location)
                  $location .= ', ';

                $location .= $city;

                if ($location):
                  ?>

                  <span class="position-location"><span class="position-location-icon"></span><span><?=$location?></span></span>
                <?php endif; ?>
              </a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php
endif;
wp_reset_postdata();
?>

  <section class="career-page-core-values">
    <div class="cj-container">
      <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Our core values')?></h2>
      <div class="row no-gutters core-value-wrapper" data-css-animate="trigger">
        <div class="col-md-4 core-value-item">
          <div class="core-value-image tild-effect" data-tilt>
            <img src="<?=CJ_MEDIA_ROOT?>/icons/move-fast.png" alt="Move fast">
          </div>
          <h3 class="core-value-title"><?php pll_e('Move fast')?></h3>
        </div>
        <div class="col-md-4 core-value-item">

          <div class="core-value-image tild-effect" data-tilt>
            <img src="<?=CJ_MEDIA_ROOT?>/icons/make-brave-decision.png" alt="Make a brave decision">
          </div>
          <h3 class="core-value-title"><?php pll_e('Make a brave decision')?></h3>
        </div>
        <div class="col-md-4 core-value-item">

          <div class="core-value-image tild-effect" data-tilt>
            <img src="<?=CJ_MEDIA_ROOT?>/icons/share-ypu-knowladge.png" alt="Share your knowledge">
          </div>
          <h3 class="core-value-title"><?php pll_e('Share your knowledge')?></h3>
        </div>
      </div>
    </div>
  </section>

  <section class="career-page-culture">
    <div class="cj-container">
      <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Our culture')?></h2>
      <article class="culture-description-wrapper" data-css-animate="trigger">
        <p><?php pll_e('careers_section4_description')?></p>
      </article>
    </div>
  </section>

<?php get_footer() ?>