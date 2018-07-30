<?php 
$args = [
  'post_type' => 'companies',
  'posts_per_page' => -1,
  'meta_key' => 'type',
  'meta_value' => 'partner',
  'meta_compare' => 'LIKE'
];

$partners = new WP_Query($args);

$args = [
  'post_type' => 'companies',
  'posts_per_page' => -1,
  'meta_key' => 'type',
  'meta_value' => 'consorcium',
  'meta_compare' => 'LIKE'
];

$consorcium = new WP_Query($args);

?>

<?php get_header() ?>

<section class="page-title partners-title-bg" data-parallax="scroll">
  <div class="page-titke-overlay">
    <div class="cj-container">
      <h1><?php pll_e('Partners')?></h1>
      <ul class="breadcrumbs">
        <li><a href="<?=get_permalink(get_page_by_path('home'))?>"><?php pll_e('Home')?></a></li>
        <li><a href="#"><?php pll_e('Partners')?></a></li>
      </ul>
    </div>
  </div>
</section><!-- TITLE -->

<section class="partners-page-description">
  <div class="cj-container">
    <h2 class="page-main-heading"><?php pll_e('In blockchain we trust')?></h2>
    <article class="partners-page-description-wrapper">
      <p><?php pll_e('partners_description')?></p>
    </article>
  </div>
</section>

<section class="partners-page-picture-separator">
  <div class="cj-container" data-fix-img-position="img-container">
    <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/partners1.png" alt="City Views">
  </div>
</section>

<section class="partners-page-partners">
  <div class="cj-container">
    <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Partners')?></h2>
    <div class="row no-gutters">
      <div class="col-1 arrow-img-container">
        <img class="arrow-left-img" src="<?=CJ_MEDIA_ROOT?>/controls/left-arrow.png" alt="left arrow">
      </div>
      <div class="col-10">
        <div class="owl-carousel partners-list-wrapper" data-css-animate="trigger">
          <?php while ( $partners->have_posts() ) : $partners->the_post(); ?>

            <?php 
            $custom_fields = get_post_custom(get_the_ID());
            $label = $custom_fields['reference_label'][0];
            $reference = $custom_fields['reference'][0];
            ?>

            <div class="partner-item-wrapper">
              <div class="partner-image-wrapper">
                <img src="<?=get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
              </div>
              <h3 class="partner-name"><?php the_title() ?></h3>
              <div class="partner-description"><?php the_content(); ?></div>
              <a href="<?=$reference?>" class="partner-link"><?=$label?></a> 
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <div class="col-1 arrow-img-container">
        <img class="arrow-right-img" src="<?=CJ_MEDIA_ROOT?>/controls/right-arrow.png" alt="right arrow">
      </div>
    </div>
  </div>
</section>

<section class="partners-page-partners">
  <div class="cj-container">
    <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Consortium')?></h2>
    <div class="row no-gutters" data-css-animate="trigger">
      <div class="col-md-12">
        <article class="partners-page-description-wrapper pt-5">
          <?php
          pll_e("partners_consorcium_description");
          ?>
        </article>
      </div>
    </div>

    <article class="partners-page-consortium-wrapper row no-gutters">

      <?php while ( $consorcium->have_posts() ) : $consorcium->the_post(); ?>
        <div class="consortium-company col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="flip-container">
           <div class="flipper">
            <div class="front">
              <div class="consorcium-image-wrapper">
                <img src="<?=get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
              </div>
            </div>
            <div class="back">
              <?php the_title() ?>
              <div class="partner-description"><?php the_content(); ?></div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>

  </article>

  <div class="row no-gutters">
    <div class="cj-btn-container">
      <a href="//docs.google.com/forms/d/e/1FAIpQLScahoaxWGjHVZV1RpI3emge6SGYJMn1CS_n4YSAnQyYWje62A/viewform" class="cj-btn" data-css-animate="trigger"><span><?php pll_e("Application form")?></span></a>
    </div>
  </div>
</div>
</section>

<section class="partners-page-wanted">
  <div class="cj-container">
    <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Let\'s start a new chapter of the blockchain together')?></h2>
    <article class="partners-page-wanted-text-wrapper" data-css-animate="trigger">
      <p><?php pll_e('partners_call_to_action_description')?></p>
    </article>

    <div class="cj-btn-container">
      <a href="<?=get_permalink(get_page_by_path('contacts'))?>#contact-form" class="cj-btn"
       data-css-animate="trigger"><span><?php pll_e('Contact us')?></span></a>
     </div>
   </div>
 </section>
 <?php get_footer() ?>