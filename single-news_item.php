<?php
/*
Template Name: News Item
Template Post Type: news_item
*/

$args = array(
  'p'         => get_the_ID(),
  'post_type' => 'news_item'
);

$db_query = new WP_Query($args);

$current_news = [];

$current_news_id = null;

while ( $db_query->have_posts() ) 
{
    $db_query->the_post();

    $current_news_id = $post->ID;

    $categories_data = wp_get_object_terms($post->ID, 'categories');

    $current_news['categories'] = [];

    foreach ($categories_data as $category) {

        $current_news['categories'][] = [
            'title' => $category->name,
            'color' => get_option("taxonomy_term_" . $category->term_id)['categories_id'],
            'url' => get_permalink(get_page_by_path('news')) . '?' . $category->slug . '=' . $category->name
        ];

    }

    $current_news['date'] = get_the_date('Y/n/j');
    $current_news['title'] = get_the_title();
    $current_news['content'] = get_the_content();

    $current_news['fb_url'] = '//www.facebook.com/sharer.php?u='. get_permalink();
    $current_news['twetter_url'] = '//twitter.com/share?url='. get_permalink();
    $current_news['telegram_url'] = '//t.me/coinjapan';

    
}


$args = [
    'post_type' => 'news_item'
    , 'posts_per_page' => 4
];

$db_query = new WP_Query($args);

$additional_news = [];

while ( $db_query->have_posts() ) 
{
    $db_query->the_post();

    if($post->ID == $current_news_id)
    {
        continue;
    }

    $news_item = [];

    $categories_data = wp_get_object_terms($post->ID, 'categories');

    $news_item['categories'] = [];

    foreach ($categories_data as $category) {

        $news_item['categories'][] = [
            'title' => $category->name,
            'color' => get_option("taxonomy_term_" . $category->term_id)['categories_id'],
            'url' => get_permalink(get_page_by_path('news')) . '?' . $category->slug . '=' . $category->name
        ];

    }

    $news_item['thumbnail'] = get_the_post_thumbnail_url();
    $news_item['date'] = get_the_date('Y/n/j');
    $news_item['title'] = get_the_title();
    $news_item['content'] = get_the_content();
    $news_item['link'] = get_permalink();
    $additional_news[] = $news_item;
}


get_header(); 
?>


<section class="page-title careers-title-bg">
    <div class="page-titke-overlay">
        <div class="cj-container">
            <h1>News</h1>
            <ul class="breadcrumbs">
                <li><a href="<?=get_permalink( get_page_by_path( get_link_to_page('home') ) )?>"><?php pll_e('Home')?></a></li>
                <li><a href="<?=get_permalink( get_page_by_path( get_link_to_page('news') ) )?>"><?php pll_e('News')?></a></li>
                <li><a href="#" class="last-breadcrumb"><?php the_title() ?></a></li>
            </ul>
        </div>
    </div>
</section><!-- TITLE -->


<section class="position-detail">
	<div class="cj-container">
        <div class="news-item-page-news-container">
            <div class="row no-gutters">
                <div class="col-12 col-md-9">
                    <h2 class="section-header" data-css-animate="trigger"><?=$current_news['title']?></h2>
                    <div class="news-item-page">
                        <span class="news-item-footer-date"><?=$current_news['date']?></span>
                        <?php foreach ($current_news['categories'] as $category): ?>
                          <a href="<?=$category['url']?>" class="news-item-footer-category" style="color:#<?=$category['color']?>;"><span class="news-item-footer-category-label" style="background: #<?=$category['color']?>"></span>   
                            <?=$category['title']?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="news-item-page-current-news-content">
                    <?=$current_news['content']?>

                    <div class="news-item-bottom-links">
                        <a href="<?=$current_news['fb_url']?>" class="cj-btn-fb" data-css-animate="trigger">
                            <span class="btn-title">Share</span>
                            <span class="btn-img"><img src="<?=CJ_MEDIA_ROOT?>/icons/facebook-active.png" alt="Facebook icon"></span>
                        </a>
                        <a href="<?=$current_news['twetter_url']?>" class="cj-btn-twitter" data-css-animate="trigger">
                            <span class="btn-title">Tweet</span>
                            <span class="btn-img"><img src="<?=CJ_MEDIA_ROOT?>/icons/twitter-active.png" alt="Tweeter icon"></span>
                        </a>
                        <a href="<?=$current_news['telegram_url']?>?>" class="cj-btn-telegram" data-css-animate="trigger">
                            <span class="btn-title">Telegram</span>
                            <span class="btn-img"><img src="<?=CJ_MEDIA_ROOT?>/icons/telegram-active.png" alt="Telegram icon"></span>
                        </a>
                        <a href="<?=get_permalink( get_page_by_path( 'news' ) )?>#categories_list" class="cj-btn-back" data-css-animate="trigger">
                            <span class="btn-title">Back to list</span>
                            <span class="btn-img">Back</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="row no-gutters">
                    <div class="col-12">
                        <?php foreach ($additional_news as $piece_of_news): ?>
                            <a class="news-list-link-wrapper" href="<?=$piece_of_news['link']?>">
                              <div class="news-item-list-img">
                                <img src="<?=$piece_of_news['thumbnail']?>" alt="<?=$piece_of_news['title']?>">
                            </div>
                            <div class="news-item-list-content">
                                <h4><?=$piece_of_news['title']?></h4>
                                <div class="news-item-footer">
                                  <span class="news-item-footer-date"><?=$piece_of_news['date']?></span>
                                  <div class="news-item-categories-list">
                                    <?php foreach ($piece_of_news['categories'] as $category): ?>
                                      <a href="<?=$category['url']?>" class="news-item-footer-category" style="color:#<?=$category['color']?>;">
                                         <span class="news-item-footer-category-label"
                                         style="background: #<?=$category['color']?>"></span>
                                         <?=$category['title']?>
                                     </a>
                                 <?php endforeach; ?>
                             </div>
                         </div>
                     </div>
                 </a>
             <?php endforeach; ?>
         </div>
     </div>
 </section>


 <section class="single-end-link-container">

 </section>

 <section class="bottom-links">
    <div class="cj-container background-color-grey">
        <div class="bottom-links-container">
            <div class="link-item-wrapper" data-css-animate="trigger">
                <a href="<?=get_permalink( get_page_by_path( get_link_to_page('services') ) )?>">
                    <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/link-services.jpg" alt="A lamp">
                    <span>Services</span>
                </a>
            </div>
            <div class="link-item-wrapper" data-css-animate="trigger">
                <a href="<?=get_permalink( get_page_by_path( get_link_to_page('projects') ) )?>">
                    <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/link-project.jpg" alt="Toy">
                    <span>Projects</span>
                </a>
            </div>
        </div>
    </div>
</section><!-- LINKS -->
<?php 
get_footer();