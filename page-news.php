<?php get_header() ?>

  <section class="page-title news-title-bg" data-parallax="scroll">
    <div class="page-titke-overlay">
      <div class="cj-container">
        <h1><?php pll_e('News') ?></h1>
        <ul class="breadcrumbs">
          <li><a href="<?=get_permalink(get_page_by_path('home'))?>"><?php pll_e('Home') ?></a></li>
          <li><a href="#"><?php pll_e('News') ?></a></li>
        </ul>
      </div>
    </div>
  </section><!-- TITLE -->

<?php
$terms = get_terms([
    'taxonomy' => 'categories',
    'hide_empty' => true,
]);
?>

  <section class="news-page-description">
    <div class="cj-container">
      <h2 class="page-main-heading"><?php pll_e('Our latest news') ?></h2>

      <div class="row no-gutters">
        <div class="col-12">
          <article class="about-description-main-text">
            <p><?php pll_e('Discover the latest breaking news about the blockchain and ICO around the world.') ?></p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="news-page-categories" id="categories_list">
    <div class="cj-container">
      <h2 class="section-header"><?php pll_e('Categories') ?></h2>
      <form>
        <div class="category-list-item-wrapper">
          <span style="background: #999"></span>
          <input type="submit" name="all" value="All">
        </div>
        <?php foreach ($terms as $key => $value): ?>
          <div class="category-list-item-wrapper">
            <span style="background: #<?=get_option("taxonomy_term_" . $value->term_id)['categories_id']?>"></span>
            <input type="submit" name="<?=$value->slug?>" value="<?=$value->name?>">
          </div>
        <?php endforeach; ?>
      </form>
    </div>
  </section>

<?php

$slug = false;

foreach ($terms as $term) {
  if (array_key_exists($term->slug, $_GET)) {
    $slug = $term->slug;
  }
}


$args = [
    'post_type' => 'news_item'
  , 'posts_per_page' => -1
];


if ($slug) {
  $args = array(
      'post_type' => 'news_item'
  , 'posts_per_page' => -1
  , 'tax_query' => [
          [
              'taxonomy' => 'categories',
              'field' => 'slug',
              'terms' => $slug
          ]
      ]);
}

$news_data = new WP_Query($args);

$counter = 0;
$latest_news = null;
$news = [];



while ($news_data->have_posts()) :

  $news_data->the_post();

  $category = wp_get_object_terms($post->ID, 'categories')[0];

  $news_item['category'] = $category->name;
  $news_item['category_color'] = get_option("taxonomy_term_" . $category->term_id)['categories_id'];

  $custom_fields = get_post_custom(get_the_ID());
  $news_item['summary'] = $custom_fields['summary'][0];

  $news_item['date'] = get_the_date('Y/n/j');
  $news_item['thumbnail'] = get_the_post_thumbnail_url();
  $news_item['title'] = get_the_title();

  if($counter == 0)
  {
    $latest_news = $news_item;
    continue;
  }

  $news[] = $news_item;

endwhile;


?>

  <section class="news-page-news-list">
    <div class="cj-container">
      <div class="news-container">
        <div class="row no-gutters">
          <div class="col-md-3">
            <div class="latest-news-img-wrapper">
              <img src="<?=$latest_news['thumbnail']?>" alt="<?=$latest_news['title']?>">
            </div>
          </div>
          <div class="col-md-9">
            <div class="latest-news-content">
              <h4><?=$latest_news['title']?></h4>
              <p><?=$latest_news['summary']?></p>
              <div class="news-item-footer">
                <span class="news-item-footer-date"><?=$latest_news['date']?></span>  <a href="#" class="news-item-footer-category" style="color:#<?=$latest_news['category_color']?>;"><?=$latest_news['category']?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">

          </div>
        </div>
      </div>
    </div>
  </section>


<?php
wp_reset_postdata();

get_footer()

?>