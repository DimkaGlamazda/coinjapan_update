<?php
/*
Template Name: News Item
Template Post Type: news_item
*/

$args = array(
  'p'         => get_the_ID(),
  'post_type' => 'news_item'
);

$position = new WP_Query($args);



get_header(); 
?>


<section class="page-title careers-title-bg">
    <div class="page-titke-overlay">
        <div class="cj-container">
            <h1>News</h1>
            <ul class="breadcrumbs">
                <li><a href="<?=get_permalink( get_page_by_path( 'home' ) )?>"><?php pll_e('Home')?></a></li>
                <li><a href="<?=get_permalink( get_page_by_path( 'news' ) )?>"><?php pll_e('News')?></a></li>
                <li><a href="#" class="last-breadcrumb"><?php the_title() ?></a></li>
            </ul>
        </div>
    </div>
</section><!-- TITLE -->


<section class="position-detail">
	<div class="cj-container">
		<?php while ( $position->have_posts() ) : $position->the_post(); ?>
			<h2 class="section-header"><?php the_title(); ?></h2>
            <p class="sngle-additional-info"><?php echo get_the_date('Y/n/j') ?></p>
			<div class="position-detail-wrapper">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php the_content() ?>
                    </main>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="single-end-link-container">
    <div class="cj-container">
        <div class="cj-btn-container">
            <a href="<?=get_permalink( get_page_by_path( 'news' ) )?>#categories_list" class="cj-btn" data-css-animate="trigger"><span>Back to list</span></a>
        </div>
    </div>
</section>

<section class="bottom-links">
    <div class="cj-container background-color-grey">
        <div class="bottom-links-container">
            <div class="link-item-wrapper" data-css-animate="trigger">
                <a href="<?=get_permalink( get_page_by_path( 'services' ) )?>">
                    <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/link-services.jpg" alt="A lamp">
                    <span>Services</span>
                </a>
            </div>
            <div class="link-item-wrapper" data-css-animate="trigger">
                <a href="<?=get_permalink( get_page_by_path( 'projects' ) )?>">
                    <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/link-project.jpg" alt="Toy">
                    <span>Projects</span>
                </a>
            </div>
        </div>
    </div>
</section><!-- LINKS -->
<?php 
get_footer();