<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$languages = pll_the_languages(['raw' => 1]);

$current_lang = 'en';

foreach ($languages as $key => $language){
    if($language['current_lang']){
      $current_lang = $key;
  }
}

$home_page = $current_lang == 'en' ? 'home' : 'home-ru';


$pages_CoinJapan = [
    pll__('About') => $current_lang == 'en' ? 'about' : 'about-ru',
    pll__('Contacts') =>  $current_lang == 'en' ? 'contacts' : 'contacts-ru',
    pll__('Careers') => $current_lang == 'en' ? 'careers' : 'careers-ru',
    pll__('News') => $current_lang == 'en' ? 'news' : 'news-ru'
];

$pages_Solutions = [
    pll__('Services') => $current_lang == 'en' ? 'services' : 'services-ru',
    pll__('Projects') => $current_lang == 'en' ? 'projects' : 'projects-ru',
    pll__('Partners') => $current_lang == 'en' ? 'partners' : 'partners-ru'
];
?>

<footer class="footer">
    <div class="footer-container">
        <div class="row no-gutters footer-content">
            <div class="col-6 col-md-2">
                <h3><?=pll_e('CoinJapan')?></h3>
                <ul>
                    <?php foreach ($pages_CoinJapan as $title => $slug): ?>
                        <li><a href="<?=get_permalink(get_page_by_path($slug))?>"><?=$title?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class=" col-6 col-md-2">
                <h3><?=pll_e('Solutions')?></h3>
                <ul>
                    <?php foreach ($pages_Solutions as $title => $slug): ?>
                        <li><a href="<?=get_permalink(get_page_by_path($slug))?>"><?=$title?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="col-6 col-md-2 footer-social">
                <h3><?=pll_e('Social')?></h3>
                <div class="row no-gutters">
                    <div class="col-3">
                        <a href="//www.facebook.com/CoinJapan/" class="fb-icon"></a>
                    </div>
                    <div class="col-3">
                        <a href="//www.linkedin.com/in/coinjapan" class="linked-in-icon"></a>
                    </div>
                    <div class="col-3">
                        <a href="//twitter.com/CoinJapanNews" class="twitter-icon"></a>
                    </div>
                    <div class="col-3">
                        <a href="//t.me/coinjapan" class="telegram-icon"></a>
                    </div>
                    <div class="col-3">
                        <a href="//youtube.com/coinjapan" class="youtube-icon"></a>
                    </div>
                    <div class="col-3">
                        <a href="//medium.com/@coinjapan" class="medium-icon"></a>
                    </div>
                    <div class="col-3">
                        <a href="//www.reddit.com/user/coinjapanofficial/" class="reddit-icon"></a>
                    </div>
                    <div class="col-3">
                        <a href="//www.quora.com/profile/%D0%A1oin-Japan" class="quora-icon"></a>
                    </div>
                </div>   
            </div>
        </div>
        <div class="row no-gutters footer-copyright">
            <div class="col-12 col-md-4 footer-languages">

                <?php 
                
                $lanf_urls = [];

                foreach($languages as $key => $language_item) {
                    $lanf_urls[$key] = $language_item['url'];
                }

                $i = 0;


                foreach($lanf_urls as $slug => $url): 

                    if($i != 0 && $i < count($lanf_urls))
                    {
                        echo '<span class="lang-devider"></span>';
                    }
                    $i++;
                    if($current_lang == $slug):
                     ?><span class="footer-lang-active"><?=$slug?></span><?php
                     continue;
                 endif;  
                 ?>
                 <a href="<?=$url?>"><span><?=$slug?></span></a>
             <?php endforeach; ?>  
         </div>
         <div class="col-12 col-md-4 text-center">
            <div class="copyright"><?php pll_e('© 2018 CoinJapan All Rights Reserved')?></div>
        </div>
    </div>
    <div class="footer-go-to-top" data-go-to-top="btn">
        <img src="<?=CJ_MEDIA_ROOT?>/controls/arrow-to-top.png" alt="go to top">
    </div>
</div>
</footer>


<div id="preloader"></div>

<?php wp_footer(); ?>

</body>
</html>