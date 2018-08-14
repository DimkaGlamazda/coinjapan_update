<?php

$args = [
    'post_type' => 'companies',
    'posts_per_page' => -1,
    'meta_key' => 'type',
    'meta_value' => 'client',
    'meta_compare' => 'LIKE'
];

$query_partners = new WP_Query($args);

$clients = [];

while ($query_partners->have_posts())
{
  $query_partners->the_post();

  $client = [];
  $custom_fields = get_post_custom(get_the_ID());
  $client['label'] = $custom_fields['reference_label'][0];
  $client['reference'] = $custom_fields['reference'][0];

  $client['title'] = get_the_title();
  $client['thumbnail'] = get_the_post_thumbnail_url();
  $client['description'] = wp_strip_all_tags(get_the_content());

  $clients[] = $client;
}

<<<<<<< HEAD
$achievements = get_option( 'achievements_options' );
=======

>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
?>
<?php get_header() ?>


  <section class="page-title projects-title-bg">
    <div class="page-titke-overlay">
      <div class="cj-container">
        <h1><?php pll_e('Projects') ?></h1>
        <ul class="breadcrumbs">
<<<<<<< HEAD
          <li><a href="<?=get_permalink(get_page_by_path(get_link_to_page('home')))?>"><?php pll_e('Home') ?></a></li>
=======
          <li><a href="<?=get_permalink(get_page_by_path('home'))?>"><?php pll_e('Home') ?></a></li>
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
          <li><a href="#"><?php pll_e('Projects') ?></a></li>
        </ul>
      </div>
    </div>
  </section><!-- TITLE -->

  <section class="services-description">
    <div class="cj-container">
      <h2 class="page-main-heading"><?php pll_e('The way of ICO providing is successful with us') ?></h2>

      <div class="services-description-text">
        <div class="services-description-list">
          <hr>
          <p><?php pll_e('Our mutual success based on the next components:') ?></p>
          <ol>
            <li><?php pll_e('Knowledge the Japanese investors’  interests') ?></li>
            <li><?php pll_e('Use of business methods adopted in Japan') ?></li>
            <li><?php pll_e('Our reputation growth on the number of successful ICO') ?></li>
          </ol>
        </div>
        <?php pll_e('projects_description') ?>
      </div>
    </div>
  </section><!-- DESCRIPTION -->


  <section class="services-steps">
    <div class="cj-container">
      <div class="row row no-gutters" data-css-animate="trigger">
        <div class="col-sm-12 col-md-6 services-moto background-color-grey">
          <hr>
          <p><?php pll_e('Cooperation with CoinJapan is the very decision, which will open your business for investments from Japan. We are sure in our capabilities and are able to create solutions for the growth of your project.') ?></p>
          <hr>
        </div>
        <div class="col-sm-12 col-md-6 order-first order-md-last steps-img">
          <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/projects1.jpg" alt="room">
        </div>
      </div>
    </div>
  </section><!-- STEPS -->

  <section class="projects-in-numbers">
    <div class="cj-container">
      <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Achievements') ?></h2>
      <div class="project-items" data-css-animate="trigger">
        <div class="row no-gutters achievements-row" data-projectsAutocount="container">
          <div class="col-sm-12 col-md-4">
            <div class="project-item">
              <h3><?php pll_e('Performed Projects') ?></h3>
<<<<<<< HEAD
              <p class="partners-number-medium">
                <span data-projectsAutocount="field" data-from="1"
                                                      data-to="<?=$achievements['performed_projects']?>"><?=$achievements['performed_projects']?></span></p>
=======
              <p class="partners-number-medium"><span data-projectsAutocount="field" data-from="1"
                                                      data-to="15">15</span></p>
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item project-item-middle">
              <h3><?php pll_e('Successful ICOs') ?></h3>
              <p><span class="success-ico-color partners-number-medium" data-projectsAutocount="field" data-from="2"
<<<<<<< HEAD
                       data-to="<?=$achievements['successful_icos']?>"><?=$achievements['successful_icos']?></span></p>
=======
                       data-to="15">15</span></p>
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item">
              <h3><?php pll_e('Collected funds') ?></h3>
              <p class="partners-number-medium">$<span data-projectsAutocount="field" data-from="100"
<<<<<<< HEAD
                                                       data-to="<?=$achievements['collected_funds']?>"><?=$achievements['collected_funds']?></span><span
=======
                                                       data-to="400">400</span><span
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
                        class="partner-number-description"><?php pll_e('Million') ?></span></p>
            </div>
          </div>
        </div>
        <div class="row no-gutters achievements-row" data-projectsAutocount="container">
          <div class="col-sm-12 col-md-4">
            <div class="project-item ">
              <h3><?php pll_e('Attracted investors') ?></h3>
              <p class="partners-number-medium"><span data-projectsAutocount="field" data-from="400"
<<<<<<< HEAD
                                                      data-to="<?=$achievements['attracted_investors']?>"><?=$achievements['attracted_investors']?></span>+</p>
=======
                                                      data-to="3100">3100</span>+</p>
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item project-item-middle">
              <h3><?php pll_e('Average contribution of one investor') ?></h3>
              <p class="partners-number-medium">$<span data-projectsAutocount="field" data-from="267"
<<<<<<< HEAD
                                                       data-to="<?=$achievements['average_contribution_of_one_investor']?>"><?=$achievements['average_contribution_of_one_investor']?></span><span
=======
                                                       data-to="129">129</span><span
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
                        class="partner-number-description"><?php pll_e('Thousand') ?></span></p>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item project-item-last">
              <h3><?php pll_e('Average time to launching ICO') ?></h3>
              <p class="partners-number-medium"><span data-projectsAutocount="field" data-from="1"
<<<<<<< HEAD
                                                      data-to="<?=$achievements['average_time_to_launching_ico']?>"><?=$achievements['average_time_to_launching_ico']?>"</span><span
=======
                                                      data-to="3">3</span><span
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
                        class="partner-number-description"><?php pll_e('Month') ?></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php if(! empty($clients)): ?>
  <section class="projects-partners">
    <div class="cj-container">
      <div class="section-header" data-css-animate="trigger"><?php pll_e('Our Clients') ?></div>
      <div class="projects-clients-slider-wraper no-gutters row">
        <div class="col-1 arrow-img-container">
          <img class="arrow-left-img" data-css-animate="trigger" src="<?=CJ_MEDIA_ROOT?>/controls/left-arrow.png" alt="left arrow">
        </div>
        <div class="col-10" data-css-animate="trigger">
          <div class="owl-carousel owl-carousel-2">
            <?php foreach ($clients as $client) : ?>
              <div class="row">
                <div class="col-12 partner-item">
                  <a href="<?=$client['reference']?>">
                    <img src="<?=$client['thumbnail']?>" alt="<?=$client['title']?>">
                  </a>
                </div>
              </div>
            <?php endforeach;?>
          </div>
        </div>
        <div class="col-1 arrow-img-container">
          <img class="arrow-right-img" data-css-animate="trigger" src="<?=CJ_MEDIA_ROOT?>/controls/right-arrow.png" alt="right arrow">
        </div>
      </div>
      <div class="row no-gutters">
        <p class="projects-partners-end"
           data-css-animate="trigger"><?php pll_e('*Most projects cannot be shared due to NDA') ?></p>
      </div>
    </div>
  </section><!-- PROJECTS-PARTNERS -->
<?php endif;?>

  <section class="clients-reviews">
    <div class="cj-container">
      <h2 class="section-header animated fadeInUp"
          data-css-animate="trigger"><?php pll_e('What our clients say') ?></h2>
      <div class="owl-carousel review-clients-slider" data-css-animate="trigger">
        <div class="review-item">
          <p class="client-review">
            <?php pll_e('projects_clients_says') ?>
          </p>
          <div class="client-info">
            <div class="client-photo-wrapper">
              <img src="<?=CJ_MEDIA_ROOT?>/images/clients/people/max.png" alt="Maxim Prasolov">
            </div>
            <div>
              <p class="client-name"><?php pll_e('Maxim Prasolov') ?></p>
              <p class="client-position"><?php pll_e('Neuromation') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php get_footer() ?>