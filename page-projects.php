<?php get_header() ?>


  <section class="page-title projects-title-bg">
    <div class="page-titke-overlay">
      <div class="cj-container">
        <h1><?php pll_e('Projects') ?></h1>
        <ul class="breadcrumbs">
          <li><a href="<?=get_permalink(get_page_by_path('home'))?>"><?php pll_e('Home') ?></a></li>
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
              <p class="partners-number-medium"><span data-projectsAutocount="field" data-from="1"
                                                      data-to="15">15</span></p>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item project-item-middle">
              <h3><?php pll_e('Successful ICOs') ?></h3>
              <p><span class="success-ico-color partners-number-medium" data-projectsAutocount="field" data-from="2"
                       data-to="15">15</span></p>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item">
              <h3><?php pll_e('Collected funds') ?></h3>
              <p class="partners-number-medium">$<span data-projectsAutocount="field" data-from="100"
                                                       data-to="400">400</span><span
                        class="partner-number-description"><?php pll_e('Million') ?></span></p>
            </div>
          </div>
        </div>
        <div class="row no-gutters achievements-row" data-projectsAutocount="container">
          <div class="col-sm-12 col-md-4">
            <div class="project-item ">
              <h3><?php pll_e('Attracted investors') ?></h3>
              <p class="partners-number-medium"><span data-projectsAutocount="field" data-from="400"
                                                      data-to="3100">3100</span>+</p>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item project-item-middle">
              <h3><?php pll_e('Average contribution of one investor') ?></h3>
              <p class="partners-number-medium">$<span data-projectsAutocount="field" data-from="267"
                                                       data-to="129">129</span><span
                        class="partner-number-description"><?php pll_e('Thousand') ?></span></p>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="project-item project-item-last">
              <h3><?php pll_e('Average time to launching ICO') ?></h3>
              <p class="partners-number-medium"><span data-projectsAutocount="field" data-from="1"
                                                      data-to="3">3</span><span
                        class="partner-number-description"><?php pll_e('Month') ?></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="projects-partners">
    <div class="cj-container">
      <div class="section-header" data-css-animate="trigger"><?php pll_e('Our Clients') ?></div>
      <div class="projects-clients-slider-wraper no-gutters row">
        <div class="col-1 arrow-img-container">
          <img class="arrow-left-img" src="<?=CJ_MEDIA_ROOT?>/controls/left-arrow.png" alt="left arrow">
        </div>
        <div class="col-10" data-css-animate="trigger">
          <div class="owl-carousel owl-carousel-2">
            <div class="row">
              <div class="col-12 partner-item">
                <a href="http://solidopinion.com">
                  <img src="<?=CJ_MEDIA_ROOT?>/images/clients/solidopinion.jpg" alt="Solid Opinion">
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-12 partner-item">
                <a href="https://neuromation.io">
                  <img src="<?=CJ_MEDIA_ROOT?>/images/clients/logo_2.svg" alt="Neuromation">
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-12 partner-item">
                <a href="http://osadc.io">
                  <img src="<?=CJ_MEDIA_ROOT?>/images/clients/osa.png" alt="OSA">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-1 arrow-img-container">
          <img class="arrow-right-img" src="<?=CJ_MEDIA_ROOT?>/controls/right-arrow.png" alt="right arrow">
        </div>
      </div>
      <div class="row no-gutters">
        <p class="projects-partners-end"
           data-css-animate="trigger"><?php pll_e('*Most projects cannot be shared due to NDA') ?></p>
      </div>
    </div>
  </section><!-- PROJECTS-PARTNERS -->

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