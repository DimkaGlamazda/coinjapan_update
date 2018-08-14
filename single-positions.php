<?php
/*
Template Name: Positions
Template Post Type: positions
*/
$args = array(
  'p'         => get_the_ID(),
  'post_type' => 'positions'
);

$position = new WP_Query($args);



get_header(); 
?>

<section class="page-title careers-title-bg" data-parallax="scroll">
    <div class="page-titke-overlay">
        <div class="cj-container">
            <h1>Careers</h1>
            <ul class="breadcrumbs">
                <li><a href="<?=get_permalink( get_page_by_path( get_link_to_page('home') ) )?>"><?php pll_e('Home')?></a></li>
                <li><a href="<?=get_permalink( get_page_by_path( get_link_to_page('careers') ) )?>"><?php pll_e('Careers')?></a></li>
                <li><a href="#"><?php the_title() ?></a></li>
            </ul>
        </div>
    </div>
</section><!-- TITLE -->


<section class="position-detail">
	<div class="cj-container">
		<?php while ( $position->have_posts() ) : $position->the_post(); ?>
			<h2 class="section-header"><?php the_title(); ?></h2>
            <?php

            $custom_fields = get_post_custom(get_the_ID());


            $country = $custom_fields['locale_country'][0];

            $city = $custom_fields['locale_sity'][0];

            $location = $country;

            if($location)
                $location .= ', ';

            $location .= $city;

            if($location):
                ?>
                <p class="sngle-additional-info position-location"><span class="position-location-icon"></span><span><?=$location ?></span></p>
            

            <?php endif; ?>
            <div class="position-detail-wrapper">
                <p><?php the_content() ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</section>


<section class="single-end-link-container">
    <div class="cj-container">
        <div class="cj-btn-container">
            <a href="<?=get_permalink( get_page_by_path( get_link_to_page('contacts') ) )?>#contact-form" class="cj-btn" data-css-animate="trigger"><span>Apply now</span></a>
        </div>
    </div>
</section>


<?php 
get_footer();