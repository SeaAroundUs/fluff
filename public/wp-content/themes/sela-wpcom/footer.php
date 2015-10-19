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
            <span>&copy; 2015 Sea Around Us</span>
            <a href="/contact/">Contact us</a>
            <a href="/citation-policy/">Citation Policy</a>
            <a href="https://github.com/seaaroundus/" target="_blank">View source code</a>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-61452144-1',  { 'cookieDomain': 'none' });
    ga('send', 'pageview');
</script>
</body>
</html>
