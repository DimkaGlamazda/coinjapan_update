<!DOCTYPE html>
<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<?php
$languages = pll_the_languages(['raw' => 1]);
$current_lang = 'en';
foreach ($languages as $key => $language){
    if($language['current_lang']){
      $current_lang = $key;
  }
}
?>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?> <?php wp_title('|', true); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php if($current_lang == 'en'): ?>
        <link href="https://fonts.googleapis.com/css?family=Jaldi:400,700" rel="stylesheet">
    <?php else: ?>
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,700" rel="stylesheet">
    <?php endif; ?>    

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122481967-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-122481967-1');
    </script>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="home">
                    <img src="<?=CJ_MEDIA_ROOT?>/logo/logotype.png" alt="Logo">
                </a>
            </div>
            <button class="menu-control external">
                <span></span>
            </button>
            <div class="header-controls">
                <p class="header-controls-title">CoinJapan</p>
                <nav class="header-navigation">
                    <?php cj_menu_customization() ?>
                </nav>

                <div class="header-lang-btn">
                    <div class="current-lang"><?php echo $current_lang?></div>
                    <div class="lang-icon"></div>
                </div>
                <ul class="header-languages">
                    <?php foreach($languages as $key => $language_item): ?>
                      <?php if($key != $current_lang): ?>
                        <li><a href="<?=$language_item['url']?>"><span><?=$language_item['slug']?></span></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</header>

<div class="cj-container">
    <div class="go-to-top" data-go-to-top="btn">
        <img src="<?=CJ_MEDIA_ROOT?>/controls/arrow-to-top.png" alt="go to top">
    </div>
</div>
