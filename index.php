<?php

$args = [
    'post_type' => 'companies',
    'posts_per_page' => -1,
    'meta_key' => 'type',
    'meta_value' => 'partner',
    'meta_compare' => 'LIKE'
];

$partners = new WP_Query($args);


get_header()

?>

  <div class="cj-container">
    <div class="go-to-top" data-go-to-top="btn">
      <img src="<?=CJ_MEDIA_ROOT?>/controls/arrow-to-top.png" alt="Arrow top">
    </div>
  </div>

  <section class="home-title">
    <div class="home-title-bg">
      <canvas id="js-background-renderer"></canvas>
    </div>
    <div class="home-title-content">
      <div class="cj-container">
        <h1 data-css-animate="trigger">
          <span><?php pll_e("ICO Consulting and") ?></span>
          <span><?php pll_e("Blockchain Technologies") ?></span>
        </h1>
        <div class='icon-scroll' data-go-to-top="btn-down">
          <div class="icon-scroll-screen"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="home-about-us" data-go-to-top="down-destination">
    <div class="cj-container">
      <div class="about-us-content">
        <h2 class="section-header" data-css-animate="trigger"><?php pll_e('We are CoinJapan') ?></h2>
        <p data-css-animate="trigger"><?php pll_e('description_we_are_coinjapan') ?></p>
        <div class="cj-btn-container">
          <a href="<?=get_permalink(get_page_by_path('about'))?>" class="cj-btn"
             data-css-animate="trigger"><span><?php pll_e('Read more') ?></span></a>
        </div>
      </div>
      <div class="about-us-slider">
        <div id="mainSlider" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="<?=CJ_MEDIA_ROOT?>/images/slider/slider-home/index1.jpg"
                   alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="<?=CJ_MEDIA_ROOT?>/images/slider/slider-home/index2.jpg"
                   alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="<?=CJ_MEDIA_ROOT?>/images/slider/slider-home/index3.jpg"
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
  </section>
  <section class="home-projects">
    <div class="cj-container">
      <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Achievements') ?></h2>
      <div class="project-items" data-css-animate="trigger">
        <div class="row no-gutters" data-projectsAutocount="container">
          <div class="col-sm-12 col-md-4">
            <div class="project-item ">
              <h3><?php pll_e('Collected funds') ?></h3>
              <p class="partners-number-medium">
                $
                <span data-projectsAutocount="field" data-from="267" data-to="400">400</span>
                <span class="partner-number-description"><?php pll_e('Million') ?></span>
              </p>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item project-item-middle">
              <h3><?php pll_e('Successful ICOs') ?></h3>
              <p><span class="success-ico-color partners-number-medium" data-projectsAutocount="field"
                       data-from="7" data-to="15">15</span></p>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item project-item-last">
              <h3><?php pll_e('Attracted investors') ?></h3>
              <p class="partners-number-medium"><span data-projectsAutocount="field" data-from="2500"
                                                      data-to="3100">3100</span><span>+</span></p>
            </div>
          </div>
        </div>
        <div class="cj-btn-container">
          <a href="<?=get_permalink(get_page_by_path('projects'))?>" class="cj-btn"
             data-css-animate="trigger"><span><?php pll_e('Read more') ?></span></a>
        </div>
      </div>

    </div>
  </section>

<?php
$args = [
    'post_type' => 'news_item'
  , 'posts_per_page' => 6
];

$news = new WP_Query($args);

if ($news->have_posts()) :
  ?>
  <section class="home-news">
    <div class="cj-container">
      <h2 class="section-header" data-css-animate="trigger"><?php pll_e('News') ?></h2>
      <div class="news-list">
        <?php while ($news->have_posts()) : $news->the_post();

          $category = wp_get_object_terms($post->ID, 'categories')[0];
          $label_color = get_option("taxonomy_term_" . $category->term_id)['categories_id'];

          ?>
          <a href="<?=get_permalink()?>" class="row no-gutters news-list-item" data-css-animate="trigger">
                    <span class="col-md-2 col-4 news-category-wrapper">
                        <span class="news-category-label">
                            <span style="background-color: #<?=$label_color?>;"><?=$category->name?></span>
                        </span>
                    </span>
            <span class="col-md-2 col-6 news-date-wrapper">
                        <span class="news-date">
                            <?php echo get_the_date('Y/n/j') ?>
                        </span>
                    </span>
            <span class="col-md-8 news-title-wrapper">
                        <span class="news-title"><?php the_title() ?></span>
                    </span>
          </a>
        <?php endwhile; ?>
      </div>
      <div class="cj-btn-container">
        <a href="<?=get_permalink(get_page_by_path('news'))?>" class="cj-btn"
           data-css-animate="trigger"><span>Read more</span></a>
      </div>
    </div>
  </section>

  <?php
endif;
wp_reset_postdata();
?>

  <section class="home-partners">
    <div class="cj-container">
      <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Partners') ?></h2>
      <div class="home-partners-list" data-css-animate="trigger">
        <div class="row no-gutters">
          <?php while ($partners->have_posts()) : $partners->the_post(); ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="home-partner-item">

                <div class="home-img-wrapper">
                  <img src="<?=get_the_post_thumbnail_url()?>" alt="<?php the_title() ?>">
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
  </section>

<?php get_footer() ?>