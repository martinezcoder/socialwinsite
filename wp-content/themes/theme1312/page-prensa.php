<?php
/**
 * Template Name: Prensa
 */

get_header(); ?>
<div id="content" class="grid_16">
  <h1><?php the_title(); ?></h1>
  <p>Press Officer: <strong>celia.ramon@socialwin.es</strong></p>
  <?php
  $temp = $wp_query;
  $wp_query= null;
  $wp_query = new WP_Query();
  $wp_query->query('post_type=prensa&showposts=-1');
  ?>
  <dl class="faq_list">

	  <h5>
	  	 <div class="fleftall"></div>
	  	 <div class="fleft"><strong>Titular</strong></div>
	     <div class="fright"><strong>Fecha</strong></div>
	  </h5>

	<?php $num = 1 ?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	      <div>
			
	        <?php $post_meta = of_get_option('post_meta'); ?>
	        <?php if ($post_meta=='true' || $post_meta=='') { ?>
	          <div class="post-prensa">
	          	 <div class="fleft"><?php echo $num; $num++; ?>.  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
		         <div class="fright">Publicada el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> </time></div>
	          </div><!--.post-meta-->
	        <?php } ?>		

	      </div>
		
	    </div><!-- #post-## -->

  	<?php endwhile; ?>

  </dl>
  
  <?php $wp_query = null; $wp_query = $temp;?>

</div><!--#content-->
<?php get_footer(); ?>
