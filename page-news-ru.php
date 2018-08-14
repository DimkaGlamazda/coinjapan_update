<?php get_header() ?>

  <section class="page-title news-title-bg" data-parallax="scroll">
    <div class="page-titke-overlay">
      <div class="cj-container">
        <h1><?php pll_e('News') ?></h1>
        <ul class="breadcrumbs">
          <li><a href="<?=get_permalink(get_page_by_path(get_link_to_page('home')))?>"><?php pll_e('Home') ?></a></li>
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
  , 'posts_per_page' => 2
  , 'tax_query' => [
          [
              'taxonomy' => 'categories',
              'field' => 'slug',
              'terms' => $slug
          ]
      ]);

  echo '<input type="hidden" data-news-ajax="currentCategory" value="'.$slug.'">';

}


$count_data = new WP_Query($args);

$count = count( $count_data->posts );

$limit = 9;

$canMore = true;

$news_data = new WP_Query($args);

if($count <= $limit)
{
  $canMore = false;
}

<<<<<<< HEAD
$args = [
    'post_type' => 'news_item',
    'posts_per_page' => $limit,
    'orderby' => 'date',
    'order'   => 'DESC',
    'offset' => 0
];



if ($slug)
{
=======

$args = [
    'post_type' => 'news_item',
    'posts_per_page' => $limit,
    'offset' => 0
];

$slug = $_POST['category'];

if ($slug) {
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
  $args = array(
      'post_type' => 'news_item',
      'posts_per_page' => $limit,
      'offset' => 0,
<<<<<<< HEAD
      'orderby' => 'date',
      'order'   => 'DESC',
=======
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
      'tax_query' => [
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

  $categories_data = wp_get_object_terms($post->ID, 'categories');

  $news_item['categories'] = [];
  foreach ($categories_data as $category) {


    $news_item['categories'][] = [
        'title' => $category->name,
        'color' => get_option("taxonomy_term_" . $category->term_id)['categories_id'],
        'url' => get_permalink(get_page_by_path('news')) . '?' . $category->slug . '=' . $category->name
    ];
  }

  $custom_fields = get_post_custom(get_the_ID());
  $news_item['summary'] = $custom_fields['summary'][0];

  $news_item['date'] = get_the_date('Y/n/j');
  $news_item['thumbnail'] = get_the_post_thumbnail_url();
  if(! $news_item['thumbnail'])
  {
    $news_item['thumbnail'] = CJ_NEWS_DEFAULT_IMG;
  }
  $news_item['title'] = get_the_title();
  $news_item['link'] = get_permalink();

  if ($counter == 0) {
    $latest_news = $news_item;
    $counter++;
    continue;
  }

  $news[] = $news_item;
  $counter++;
endwhile;


?>

  <section class="news-page-news-list">
    <div class="cj-container">
      <div class="news-container">
        <div class="row no-gutters">
          <div data-news-ajax="item" data-css-animate="trigger" class="col-12">
            <a class="news-list-link-wrapper" href="<?=$latest_news['link']?>">
              <div class="latest-news-img-wrapper">
                <img src="<?=$latest_news['thumbnail']?>" alt="<?=$latest_news['title']?>">
              </div>
              <div class="latest-news-content">
                <h4 class="latest-news-header"><?=$latest_news['title']?></h4>
                <div class="news-item-footer">
                  <span class="news-item-footer-date"><?=$latest_news['date']?></span>
                  <div class="news-item-categories-list">
                    <?php foreach ($latest_news['categories'] as $category): ?>
                      <a href="<?=$category['url']?>" class="news-item-footer-category" style="color:#<?=$category['color']?>;">
                        <span class="news-item-footer-category-label" style="background: #<?=$category['color']?>"></span>
                        <?=$category['title']?>
                      </a>
                    <?php endforeach; ?>
                  </div>
                </div>
                <?=$latest_news['summary']?>
              </div>
            </a>
          </div>
        </div>
        <div class="news-list-other-news">
          <div class="row no-gutters" data-css-animate="trigger" data-news-ajax="container">
            <?php foreach ($news as $piece_of_news): ?>
              <div data-news-ajax="item" class="col-12 col-sm-6 col-md-6 col-lg-3">
                <a class="news-list-link-wrapper" href="<?=$piece_of_news['link']?>">
                  <div class="news-item-list-img">
                    <img src="<?=$piece_of_news['thumbnail']?>" alt="<?=$piece_of_news['title']?>">
                  </div>
                  <div class="news-item-list-content">
                    <h4><?=$piece_of_news['title']?></h4>
                    <div class="news-item-footer">
                      <span class="news-item-footer-date"><?=$latest_news['date']?></span>
                      <div class="news-item-categories-list">
                        <?php foreach ($piece_of_news['categories'] as $category): ?>
                          <a href="<?=$category['url']?>" class="news-item-footer-category"
                             style="color:#<?=$category['color']?>;">
                         <span class="news-item-footer-category-label"
                               style="background: #<?=$category['color']?>"></span>
                            <?=$category['title']?>
                          </a>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php if($canMore): ?>
        <div class="cj-btn-container">
          <a href="#" class="cj-btn" data-news-ajax="trigger" data-css-animate="trigger"><span><?php pll_e('More') ?></span></a>
        </div>
      <?php endif; ?>
<<<<<<< HEAD
      <br>
=======
>>>>>>> 595d2b78b5e77b3deceeb9e4b57f001b8277784f
    </div>
  </section>



<?php
wp_reset_postdata();

get_footer()

?>