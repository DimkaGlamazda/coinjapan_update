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
?>

<footer class="footer">
    <div class="footer-container">
        <div class="row">
            <div class="col-12">
                <span class="footer-connect-us">Connect with us</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="social-links">
                    <a href="//www.facebook.com/CoinJapan/" class="fb-icon"></a>
                    <a href="//www.linkedin.com/in/coinjapan" class="linked-in-icon"></a>
                    <a href="//twitter.com/CoinJapanNews" class="twitter-icon"></a>
                    <a href="//t.me/coinjapan" class="telegram-icon"></a>
                    <a href="//youtube.com/coinjapan" class="youtube-icon"></a>
                    <a href="//medium.com/@coinjapan" class="medium-icon"></a>
                    <a href="//www.reddit.com/user/coinjapanofficial/" class="reddit-icon"></a>
                    <a href="//www.quora.com/profile/%D0%A1oin-Japan" class="quora-icon"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="copyright">© 2018 CoinJapan</div>
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