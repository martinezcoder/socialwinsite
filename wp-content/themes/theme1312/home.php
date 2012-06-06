<?php get_header(); ?>
<div id="top-content">
	<div class="container_16 clearfix">
		<?php if ( ! dynamic_sidebar( 'Top Content (Home)' ) ) : ?>
      <!--Widgetized 'Top Content' for the home page-->
    <?php endif ?>
  </div>
</div>
<div id="bottom-content">
	<div class="container_16 clearfix">
		<?php if ( ! dynamic_sidebar( 'Bottom Content (Home)' ) ) : ?>
      <!--Widgetized 'Bottom Content' for the home page-->
    <?php endif ?>
  </div>
</div>
<?php get_footer(); ?>
