<?php get_header() ?>

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
          <span><?php pll_e("ICO Consulting and")?></span>
          <span><?php pll_e("Blockchain Technologies")?></span>
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
        <h2 class="section-header" data-css-animate="trigger"><?php pll_e('We are CoinJapan')?></h2>
        <p data-css-animate="trigger"><?php pll_e('Coinjapan is a reliable partner to attract Japanese investments via crowdfunding.
          The world\'s largest cryptocurrency market with proactive investors, who willingly invest in innovative
          projects and the future tech, is open only to those who "speak" with it understandable language. Coinjapan
          will pave the way to the Japanese investment market for your company, with further providing of successful ICO
          for the rapid development of the project.')?></p>
        <div class="cj-btn-container">
          <a href="<?=get_permalink(get_page_by_path('about'))?>" class="cj-btn" data-css-animate="trigger"><span><?php pll_e('Read more') ?></span></a>
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
      <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Achievements')?></h2>
      <div class="project-items" data-css-animate="trigger">
        <div class="row no-gutters" data-projectsAutocount="container">
          <div class="col-sm-12 col-md-4">
            <div class="project-item ">
              <h3><?php pll_e('Collected funds') ?></h3>
              <p class="partners-number-medium">
                $
                <span data-projectsAutocount="field" data-from="267" data-to="400">400</span>
                <span class="partner-number-description"><?php pll_e('Million')?></span>
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
          <a href="<?=get_permalink(get_page_by_path('projects'))?>" class="cj-btn" data-css-animate="trigger"><span><?php pll_e('Read more')?></span></a>
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

      <div class="partners-carousel-container row no-gutters" data-css-animate="trigger">
        <div class="owl-carousel index-partners-slider col-md-12">
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//uvca.eu" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/partners/uvca.png" alt="UVCA">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//hacken.io/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/partners/Hacken.png" alt="Hacken">
              </a>
            </div>
          </div>
          <!--  <div class="partner-item-wrapper">
                        <div class="partner-image-wrapper">
                            <a href="https://blockchainhub.one/en/" class="partner-link"><img src="<?=CJ_MEDIA_ROOT?>/images/partners/blockchain-hub-kyiv.png" alt="Blockchain Hub Kyiv"></a>
                        </div>
                    </div> -->
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.park.by/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/partners/HTP.png" alt="Hi-Tech Park Belarus">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//axon.partners/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/partners/AXON.png" alt="Axon Partners">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//kasko2go.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/kasko-2-go.png" alt="Kasko2GO">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//engagementtoken.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/engagement-token.png" alt="Engagement Token">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//482.solutions/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/482-solution.png" alt="482 Solution">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//romad.io/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/romad.png" alt="Romad">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//endo.im/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/endo.png" alt="Endo">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//bitupper.com/ru/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/bitupper.png" alt="Bitupper">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//animal-id.info/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/animal-id.png" alt="Animal ID">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//crystals.io/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/crystals.png" alt="Crystals">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//geo-pay.net/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/geo-pay.png" alt="Geo Pay">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.kchain.kr/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/k-chain.png" alt="K Chain">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.neuromation.io/ru/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/neuromation.png" alt="Neuromation">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//krypton.capital/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/krypton-capital.png" alt="Krypton Capital">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//skillonomy.org/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/skillonomy.png" alt="Skillonomy">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.kryptonevents.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/krypton-events.png" alt="Krypton Events">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//trueplay.io/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/true-play.png" alt="TruePlay">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//x10.agency/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/x-10-agency.png" alt="X-10 agency">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.bzntm.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/byzantium.png" alt="Byzantium">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.vutoken.io/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/vu-token.png" alt="VU Token">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//getsupertext.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/super-text.png" alt="Super Text">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//joinjapan.com.ua/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/joinjapan.png" alt="JoinJapan">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//uspfund.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/usp-capital.png" alt="USP Capital">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//modltoken.io/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/module.png" alt="Module">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.olam-platform.org/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/olam-foundation.png" alt="Olam Foundation">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//bettium.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/bettium.png" alt="Bettium">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.stox.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/stox.png" alt="Stox">
              </a>
            </div>
          </div>
          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//xenchain.io/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/xenchain.png" alt="Xenchain">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//longenesis.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/longenesis.png" alt="Longenesis">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.digitalx.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/digitalx.png" alt="DigitalX">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.rsk.co/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/rsk.png" alt="RSK">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//cot.curecos.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/cosplay-token.png" alt="Cosplay">
              </a>
            </div>
          </div>

<!--          <div class="partner-item-wrapper">-->
<!--            <div class="partner-image-wrapper">-->
<!--              <a href="//ico.fluzfluz.com/" class="partner-link">-->
<!--                <img src="--><?//=CJ_MEDIA_ROOT?><!--/images/consortium/fuzcoin.png" alt="Fluz">-->
<!--              </a>-->
<!--            </div>-->
<!--          </div>-->

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.bidooh.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/bidooh.png" alt="Bidooh">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//terravirtua.io/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/terra-virtua.png" alt="Terra Virtua">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.menlo.one/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/menlo-one.png" alt="Menlo One">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//azbit.com/ru" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/azbit.png" alt="AZbit">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//askfm.io" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/askfm.png" alt="AskFM">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.keos.kr/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/keos.png" alt="Keos">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.skyfchain.io" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/skyfchain.png" alt="Skychaina">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//www.givingledger.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/givingledger.png" alt="GivingLedger">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//thetokenpost.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/thetokenpost.png" alt="TokenPost">
              </a>
            </div>
          </div>

          <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <a href="//ico.clashgo.com/" class="partner-link">
                <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/clash-go.png" alt="Clash & Go">
              </a>
            </div>
          </div>
        </div>
      </div>
  </section>

<?php get_footer() ?>