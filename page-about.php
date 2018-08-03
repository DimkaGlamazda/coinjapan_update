<?php get_header() ?>
<section class="page-title parallax-window about-title-bg">
    <div class="page-titke-overlay">
        <div class="cj-container">
            <h1><?php pll_e('About') ?></h1>
            <ul class="breadcrumbs">
                <li><a href="<?=get_permalink( get_page_by_path( 'home' ) )?>"><?php pll_e('Home') ?></a></li>
                <li><a href="#"><?php pll_e('About')?></a></li>
            </ul>
        </div>
    </div>
</section><!-- TITLE -->

<section class="about-description">

    <div class="cj-container">

        <h2 class="page-main-heading"><?php pll_e('Who we are')?></h2>

        <div class="row no-gutters">
            <div class="col-12">
                <article class="about-description-main-text">
                    <p><?php pll_e('about_description') ?></p>
                </article>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col-md-6 offset-md-3">
                <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/team.jpg" alt="Meeting">
            </div>
        </div>

        <div class="row no-gutters about-description-options">
            <div class="col-md-6 about-description-text">
                <article data-css-animate="trigger">
                    <h2 class="section-header"><?php pll_e('Vision')?></h2>
                    <p><?php pll_e('about_vision_description')?></p>
                </article>
            </div>
            <div class="col-md-6 about-description-text">
                <article data-css-animate="trigger">
                    <h2 class="section-header"><?php pll_e('Our Aim') ?></h2>
                    <p><?php pll_e('about_our_aim_description')?></p>
                </article>
            </div>
        </div>
    </div>
</section><!-- DESCRIPTION -->

<section class="about-team">
    <div class="cj-container">
        <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Our Team')?></h2>
        <div class="row no-gutters team-members">
            <?php
            $args = array(
                 'post_type' => 'staff',
                 'posts_per_page' => -1,
                 'orderby' => 'date',
                 'order'   => 'ASC',
                 'suppress_filters' => true,
             );
            $staff = new WP_Query($args);
            ?>

            <?php while ( $staff->have_posts() ) : $staff->the_post(); ?>

                <?php

                $custom_fields = get_post_custom(get_the_ID());
                $position = $custom_fields['position'][0];

                ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="team-member" data-css-animate="trigger" data-team-member="detail">
                        <div class="team-member-photo">
                            <img src="<?=get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                            <article>
                                <?php the_content() ?>
                            </article>
                        </div>
                        <h3 class="member-name"><?php the_title() ?></h3>
                        <h4 class="member-position"><?=$position ?></h4>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <i class="fas fa-angle-double-up"></i>
    </div>
</section><!-- TEAM -->

<section class="bottom-links">
    <div class="cj-container background-color-grey">
        <div class="bottom-links-container">
            <div class="link-item-wrapper" data-css-animate="trigger">
                <a href="<?=get_permalink( get_page_by_path( 'services' ) )?>">
                    <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/link-services.jpg" alt="A lamp">
                    <span><?php pll_e('Services')?></span>
                </a>
            </div>
            <div class="link-item-wrapper" data-css-animate="trigger">
                <a href="<?=get_permalink( get_page_by_path( 'projects' ) )?>">
                    <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/link-project.jpg" alt="Toy">
                    <span><?php pll_e('Projects')?></span>
                </a>
            </div>
        </div>
    </div>
</section><!-- LINKS -->

<?php get_footer()?>
