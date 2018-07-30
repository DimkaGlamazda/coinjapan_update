<?php get_header() ?>

<section class="page-title services-title-bg">
    <div class="page-titke-overlay">
        <div class="cj-container">
            <h1><?php pll_e('Services')?></h1>
            <ul class="breadcrumbs">
                <li><a href="<?=get_permalink( get_page_by_path( 'home' ) )?>"><?php pll_e('Home')?></a></li>
                <li><a href="services.html"><?php pll_e('Services')?></a></li>
            </ul>
        </div>
    </div>
</section><!-- TITLE -->

<section class="services-description">
    <div class="cj-container">
        <h2 class="page-main-heading"><?php pll_e('Your success story begins here')?></h2>

        <div class="services-description-text">
            <div class="services-description-list">
                <hr>
                <p><?php pll_e('Three fundamental conditions for gaining success in the Japanese market:') ?></p>
                <ol>
                    <li><?php pll_e('Professional localization')?></li>
                    <li><?php pll_e('Effective strategic planning')?></li>
                    <li><?php pll_e('Willingness to follow the Japanese business rules')?></li>
                </ol>
            </div>

            <span><?php pll_e('services_desription')?></span>
        </div>
    </div>
</section><!-- DESCRIPTION -->


<section class="services-steps">
    <div class="cj-container">
        <div class="row no-gutters" data-css-animate="trigger">
            <div class="col-sm-12 col-md-6  services-moto background-color-grey">
                <hr>
                <p><?php pll_e('Partnerships with CoinJapan is your guarantee of entering Japanese market for the providing of hyper-growth your product. We can help to raise funds for you because we understand the market, know its features, requirements and business rules.')?></p>
                <hr>
            </div>
            <div class="col-sm-12 order-first order-md-last col-md-6 steps-img">
                <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/services1.jpg" alt="room">
            </div>
        </div>
    </div>
</section><!-- STEPS -->

<section class="ather-services">
    <div class="cj-container">
        <h2 class="section-header"  data-css-animate="trigger"><?php pll_e('What we can do for you')?></h2>
        <div class="ather-services-wrapper row no-gutters">
            <div class="col-sm-12 col-md-6 service-container">
                <div class="sevice-wrapper" data-css-opacity-ather="item">
                    <div class="sevice-wrapper-overlay">

                    </div>
                    <h2><?php pll_e('Strategic Advisory')?></h2>
                    <article>
                        <p><?php pll_e('On the first stage of our cooperation we will help you to appraise the strengths, weaknesses, opportunities and threats of your project. After the appraisal our experts will help you to develop “must do” activities plan to solve problems and use advantages. It allows to prepare for entering in the investment market.')?></p>
                    </article>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 service-container">
                <div class="sevice-wrapper" data-css-opacity-ather="item">
                    <div class="sevice-wrapper-overlay"></div>
                    <h2><?php pll_e('Crowdfunding')?></h2>
                    <article>
                        <ol>
                            <li><?php pll_e('ICO Strategy and Planning')?></li>
                            <li><?php pll_e('Fundraising via Pre-sale')?></li>
                            <li><?php pll_e('Fundraising via ICO')?></li>
                            <li><?php pll_e('Putting on the listings of Japanese exchanges')?></li>
                            <li><?php pll_e('Affiliate Programs')?></li>
                            <li><?php pll_e('Dashboard Solutions')?></li>
                        </ol>
                    </article>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 service-container">
                <div class="sevice-wrapper" data-css-opacity-ather="item">
                    <div class="sevice-wrapper-overlay"></div>
                    <h2><?php pll_e('Marketing')?></h2>
                    <article>
                        <ol>
                            <li><?php pll_e('Localization (Whitepaper, Web, Marketing)')?></li>
                            <li><?php pll_e('Online advertisement in Japan')?></li>
                            <li><?php pll_e('Promotion to Japanese Angel Investors')?></li>
                            <li><?php pll_e('Press releases on Japanese media')?></li>
                            <li><?php pll_e('Public Relations')?></li>
                            <li><?php pll_e('Social media control')?></li>
                        </ol>
                    </article>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 service-container">
                <div class="sevice-wrapper" data-css-opacity-ather="item">
                    <div class="sevice-wrapper-overlay"></div>
                    <h2><?php pll_e('Support')?></h2>
                    <article>
                        <ol>
                            <li><?php pll_e('Legal consultation')?></li>
                            <li><?php pll_e('Sales Channel Development')?></li>
                            <li><?php pll_e('Long Term Business Development')?></li>
                            <li><?php pll_e('Partner Search')?></li>
                            <li><?php pll_e('Sales support')?></li>
                        </ol>
                    </article>
                </div>
            </div>
        </div>
		
		<div class="cj-btn-container">
			<a href="//coinjapan.io/wp-content/uploads/2018/06/Coin_Japan_Offer_Menu2018_06_01.pdf" class="cj-btn" data-css-animate="trigger"><span><?php pll_e('Download ICO Menu')?></span></a>
        </div>
    </div>
</section><!-- ATHER SERVICES -->

<?php get_footer()?>