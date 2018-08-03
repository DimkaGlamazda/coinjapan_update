<?php get_header() ?>

<section class="page-title news-title-bg" data-parallax="scroll">
    <div class="page-titke-overlay">
        <div class="cj-container">
            <h1><?php pll_e('News')?></h1>
            <ul class="breadcrumbs">
                <li><a href="<?=get_permalink( get_page_by_path( 'home' ) )?>"><?php pll_e('Home')?></a></li>
                <li><a href="#"><?php pll_e('News')?></a></li>
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
        <h2 class="page-main-heading"><?php pll_e('Our latest news')?></h2>

        <div class="row no-gutters">
            <div class="col-12">
                <article class="about-description-main-text">
                    <p><?php pll_e('Discover the latest breaking news about the blockchain and ICO around the world.')?></p>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="news-page-categories" id="categories_list">
	<div class="cj-container">
     <h2 class="section-header"><?php pll_e('Categories')?></h2>
     <form>
        <div class="category-list-item-wrapper" >
            <span style="background: #999"></span>
            <input type="submit" name="all" value="All">
        </div>
        <?php foreach ($terms as $key => $value):?>
            <div class="category-list-item-wrapper" >
              <span style="background: #<?=get_option( "taxonomy_term_" . $value->term_id )['categories_id']?>"></span>
              <input type="submit" name="<?=$value->slug ?>" value="<?=$value->name ?>">
          </div>
      <?php endforeach; ?>
  </form>
</div>
</section>

<?php 

$slug = false;

foreach ($terms as $term) {
    if(array_key_exists($term->slug, $_GET)) {
        $slug = $term->slug;
    }
}



$args = [
    'post_type' => 'news_item'
    ,'posts_per_page' => -1
];



if($slug){
    $args = array(
     'post_type' => 'news_item'
     ,'posts_per_page' => -1
     ,'tax_query' => [
        [
            'taxonomy'  => 'categories',
            'field'    => 'slug',
            'terms'    => $slug
        ]
    ]);
}

$news = new WP_Query($args);

$counter = 0;
$latest_news = null;
$side_news = [];


while ( $news->have_posts() ) : $news->the_post();
    $category = wp_get_object_terms( $post->ID, 'categories')[0];

    $news_item['category'] = $category->name;
    $news_item['category_color'] = get_option( "taxonomy_term_" . $category->term_id )['categories_id'];
    $news_item['date'] = get_the_date('Y/n/j');

endwhile;    


?>

<section class="newa-page-news-list">
    <div class="cj-container">
        <div class="row no-gutters">
            <div class="col-12 col-md-8 col-lg-8">
                1
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="row no-gutters">
                    <div class="col-12 col-sm-6 col-md-12 col-lg-12">
                        1
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 col-lg-12">
                        1
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="news-list col-sm-12">
    <?php while ( $news->have_posts() ) : $news->the_post(); ?>

        <?php
        $category = wp_get_object_terms( $post->ID, 'categories')[0];
        $label_color = get_option( "taxonomy_term_" . $category->term_id )['categories_id'];
        ?>

        <a href="<?=get_permalink()?>" class="row no-gutters news-list-item" data-css-animate="trigger">
            <span class="col-md-2 col-4 news-category-wrapper">
                <span class="news-category-label">
                  <span style="background-color: #<?=$label_color?>;"><?=$category->name?></span>
                </span>
            </span>
            <span class="col-md-2 col-6 news-date-wrapper">
                <span class="news-date">
                  <?php echo get_the_date('Y/n/j'); ?>
                </span>
            </span>
            <span class="col-md-8 news-title-wrapper">
                <span class="news-title"><?php the_title() ?></span>
            </span>
        </a>
    <?php endwhile; ?>
</div>

<?php 
wp_reset_postdata();

get_footer() 

?>