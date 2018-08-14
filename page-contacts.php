<?php get_header() ?>

    <section class="page-title contacts-title-bg"  data-parallax="scroll">
        <div class="page-titke-overlay">
            <div class="cj-container">
                <h1><?php pll_e('Contacts')?></h1>
                <ul class="breadcrumbs">
                    <li><a href="<?=get_permalink( get_page_by_path( get_link_to_page('home') ) )?>"><?php pll_e('Home')?></a></li>
                    <li><a href="#"><?php pll_e('Contacts')?></a></li>
                </ul>
            </div>
        </div>
    </section><!-- TITLE -->

    <section class="addresses-container">
        <div class="cj-container">
            <div class="row no-gutters addresses-wrapper">
                <div class="col-md-6 address-item">
                    <h2 class="section-header"><?php pll_e('CoinJapan KIEV')?></h2>
                    <p id="mp0" class="address-line"><?php pll_e('Office 20, Vatslava Havela Boulevard, 4, Kiev, 03124, Ukraine')?></p>
                    <p class="email-line"><a href="mailto:sh@coinjapan.io"><?php pll_e('sh@coinjapan.io')?></a></p>
                    <p class="phone-line"><a href="tel:+380 97 575 9464"><?php pll_e('+380 97 575 9464')?></a></p>
                </div>
                <div class="col-md-6 address-item">
                    <h2 class="section-header"><?php pll_e('CoinJapan MINSK')?></h2>
                    <p id="mp1" class="address-line"><?php pll_e('3/19, 258, Gamamika St., 30, Minsk, 22131, Belarus Republic')?></p>
                    <p class="email-line"><a href="mailto:ad@coinjapan.io"><?php pll_e('ad@coinjapan.io')?></a></p>
                    <p class="phone-line"><a href="tel:+380 63 171 1788"><?php pll_e('+380 63 171 1788')?></a></p>
                </div>
            </div>
            <div class="row no-gutters map-wrapper">
                <div class="col-md-12 map-container" data-css-animate="trigger">
                    <div id="map" class="contacts-map"></div>
                </div>
            </div>
        </div>
    </section>


   
    <section class="contact-form" id="contact-form">
        <div class="cj-container">
            <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Let\'s keep in touch')?></h2>
            <div class="row no-gutters contact-form-padding" data-css-animate="trigger">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="form-side-img">
                        <img src="<?=CJ_MEDIA_ROOT?>/icons/envelop.png" class="tild-effect" data-tilt alt="envelop">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form-wrapper">
					<?php echo do_shortcode('[contact-form-7 id="31" title="Contact Form"]'); ?>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- CONTACT-FORM -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBwY9f3meuCBvcVK20P8RkGlxYQMbhz08"></script>
<?php get_footer()?>