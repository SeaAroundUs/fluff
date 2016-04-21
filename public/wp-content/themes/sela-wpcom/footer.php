<?php
/**
 * The template for displaying the footer.
 *
 * @package Sela
 */
?>

	</div><!-- #content -->

	<?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer">
        <div id="copyright" class="pull-left">
            <span>&copy; 2016 Sea Around Us</span>
            <a href="/contact/">Contact us</a>
            <a href="/citation-policy/">Citation Policy</a>
            <a href="/privacy-policy/">Privacy Policy</a>
            <a href="/terms-and-conditions/">Terms and Conditions</a>
            <a href="https://github.com/seaaroundus/" target="_blank">
                View code on GitHub <img src="/gh.png" />
            </a>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- google analytics footer -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-61452144-1',  { 'cookieDomain': 'none' });
    ga('send', 'pageview');
</script>

<!-- twitter footer -->
<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">twttr.conversion.trackPid('nttxz', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>
<noscript>
    <img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=nttxz&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
    <img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=nttxz&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
</noscript>

</body>
</html>
