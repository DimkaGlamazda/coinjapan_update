<?php
$args = [
  'post_type' => 'companies',
  'posts_per_page' => -1,
  'meta_key' => 'type',
  'meta_value' => 'partner',
  'meta_compare' => 'LIKE'
];

$query_partners = new WP_Query($args);

$partners = [];

while ($query_partners->have_posts())
{
  $query_partners->the_post();

  $custom_fields = get_post_custom(get_the_ID());
  $partner['label'] = $custom_fields['reference_label'][0];
  $partner['reference'] = $custom_fields['reference'][0];

  $partner['title'] = get_the_title();
  $partner['thumbnail'] = get_the_post_thumbnail_url();
  $partner['description'] = wp_strip_all_tags(get_the_content());

  $partners[] = $partner;
}

$args = [
  'post_type' => 'companies',
  'posts_per_page' => -1,
  'meta_key' => 'type',
  'meta_value' => 'consortium',
  'meta_compare' => 'LIKE'
];

$consortium_query = new WP_Query($args);

$consortium = [];

while ($consortium_query->have_posts())
{
  $consortium_query->the_post();

  $custom_fields = get_post_custom(get_the_ID());
  $consortium_member['label'] = $custom_fields['reference_label'][0];
  $consortium_member['reference'] = $custom_fields['reference'][0];

  $consortium_member['title'] = get_the_title();
  $consortium_member['thumbnail'] = get_the_post_thumbnail_url();
  $consortium_member['description'] = wp_strip_all_tags(get_the_content());

  $consortium[] = $consortium_member;
}

$slides = [];

$from = 0;
$to = 8;
for($i = 0; $i < count($consortium) / 8; $i++)
{
  for($j = $from; $j < $to; $j++)
  {
    if(isset($consortium[$j]))
    {
      $slides[$i][] = $consortium[$j];
    }
  }
  $from += 8;
  $to += 8;
}

?>

<?php get_header() ?>

<section class="page-title partners-title-bg" data-parallax="scroll">
  <div class="page-titke-overlay">
    <div class="cj-container">
      <h1><?php pll_e('Partners') ?></h1>
      <ul class="breadcrumbs">
        <li><a href="<?=get_permalink(get_page_by_path('home'))?>"><?php pll_e('Home') ?></a></li>
        <li><a href="#"><?php pll_e('Partners') ?></a></li>
      </ul>
    </div>
  </div>
</section><!-- TITLE -->

<section class="partners-page-description">
  <div class="cj-container">
    <h2 class="page-main-heading"><?php pll_e('In blockchain we trust') ?></h2>
    <article class="partners-page-description-wrapper">
      <p><?php pll_e('partners_description') ?></p>
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
    <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Partners') ?></h2>
    <div class="row no-gutters">
      <div class="col-1 arrow-img-container">
        <img class="arrow-left-img" src="<?=CJ_MEDIA_ROOT?>/controls/left-arrow.png" alt="left arrow">
      </div>
      <div class="col-10">
        <div class="owl-carousel partners-list-wrapper" data-css-animate="trigger">
          <?php foreach ($partners as $partner): ?>
           <div class="partner-item-wrapper">
            <div class="partner-image-wrapper">
              <img src="<?=$partner['thumbnail']?>" alt="<?=$partner['title']?>">
            </div>
            <h3 class="partner-name"><?=$partner['title']?></h3>
            <div class="partner-description"><?=$partner['description']?></div>
            <a href="<?=$partner['reference']?>" class="partner-link"><?=$partner['label']?></a>
          </div>
        <?php endforeach; ?>
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
    <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Consortium') ?></h2>
    <div class="row no-gutters" data-css-animate="trigger">
      <div class="col-md-12">
        <article class="partners-page-description-wrapper pt-5">
          <?php
          pll_e("partners_consorcium_description");
          ?>
        </article>
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="owl-carousel consortium-carousel" data-css-animate="trigger">
      <?php foreach ($slides as $slide_items): ?>
        <div class="consortium-section">
          <div class="consortium-overlay"></div>
          <div class="consortium-grid">
            <div class="row no-gutters">
              <?php foreach ($slide_items as $consortium): ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                  <div class="consortium-border">
                    <div class="consortium-item" style="visibility: hidden">
                      <div class="consortium-img-wrapper">
                        <img src="<?=$consortium['thumbnail']?>" alt="<?=$consortium['title']?>">
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>  
            </div>
          </div>
          <div class="consortium-items">
            <div class="row no-gutters">
              <?php foreach ($slide_items as $consortium): ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                  <div class="consortium-item flip-container">
                    <div class="flipper">
                      <div class="consortium-img-wrapper front">
                        <img src="<?=$consortium['thumbnail']?>" alt="<?=$consortium['title']?>">
                      </div>
                      <div class="back">
                        <h4 class="consortium-member-title"><?=$consortium['title']?></h4>
                        <p class="consortium-member-description"><?=$consortium['description'] ?></p>
                        <a class="consortium-member-reference" href="<?=$consortium['reference']?>"><?=$consortium['label']?></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <br>
    <br>
    <div class="row no-gutters">
      <div class="cj-btn-container">
        <a href="//docs.google.com/forms/d/e/1FAIpQLScahoaxWGjHVZV1RpI3emge6SGYJMn1CS_n4YSAnQyYWje62A/viewform"
        class="cj-btn" data-css-animate="trigger"><span><?php pll_e("Application form") ?></span></a>
      </div>
    </div>
  </div>
</section>

<section class="partners-page-wanted">
  <div class="cj-container">
    <h2 class="section-header"
    data-css-animate="trigger"><?php pll_e('Let\'s start a new chapter of the blockchain together') ?></h2>
    <article class="partners-page-wanted-text-wrapper" data-css-animate="trigger">
      <p><?php pll_e('partners_call_to_action_description') ?></p>
    </article>

    <div class="cj-btn-container">
      <a href="<?=get_permalink(get_page_by_path('contacts'))?>#contact-form" class="cj-btn"
       data-css-animate="trigger"><span><?php pll_e('Contact us') ?></span></a>
     </div>
   </div>
 </section>
 <?php get_footer() ?>