  </div><!--.container-->
	<footer id="footer">
		<div class="container_16 clearfix">
			<div class="grid_16">

      	<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>

          <!--Widgetized Footer-->

        <?php endif ?>

        <?php if ( of_get_option('footer_menu') == 'true') { ?>  
          <nav class="footer">
						<?php wp_nav_menu( array(
              'container'       => 'ul', 
              'menu_class'      => 'footer-nav', 
              'depth'           => 0,
              'theme_location' => 'footer_menu' 
              )); 
            ?>
          </nav>
        <?php } ?>
        <?php $myfooter_text = of_get_option('footer_text'); ?>
          
          <?php if($myfooter_text){?>
            <?php echo of_get_option('footer_text'); ?>
          <?php } else { ?>
            <?php bloginfo('name'); ?> &copy; <?php echo date("Y") ?> &bull; 


<!--
<a href="<?php bloginfo('url'); ?>/privacy-policy/" title="Privacy Policy">Privacy Policy</a><br />
Like this design? Browse for <a rel="nofollow" href="http://www.templatemonster.com/wordpress-themes.php" title="WordPress templates" target="_blank">more WordPress themes</a>!
-->

          <?php } ?>

      </div>
		</div><!--.container-->
	</footer>
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work proporly -->
<?php echo stripslashes(of_get_option('ga_code')); ?>
<!-- Show Google Analytics -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-33589334-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

</body>
</html>