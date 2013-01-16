<?php
/**
 * Template Name: Prensa
 */

get_header(); ?>
<div id="content" class="grid_16">
  <h1><?php the_title(); ?></h1>
  <p>Press Officer: <strong>celia.ramon@socialwin.es</strong></p>

  <dl class="faq_list">
      <h4>
        Links
      </h4>

     <div class="post-prensa">
         <div class="fleft"><a target="_blank" href="http://orientacion-laboral.infojobs.net/cooperacion-cocreacion">http://orientacion-laboral.infojobs.net/cooperacion-cocreacion</a></div>
     </div>

     <div class="post-prensa">
         <div class="fleft"><a target="_blank" href="http://orientacion-laboral.infojobs.net/redes-sociales-emprendedores">http://orientacion-laboral.infojobs.net/redes-sociales-emprendedores</a></div>
     </div>

     <div class="post-prensa">
         <div class="fleft"><a target="_blank" href="http://www.puromarketing.com/13/14933/redes-sociales-activo-estrategico.html">http://www.puromarketing.com/13/14933/redes-sociales-activo-estrategico.html</a></div>
     </div>

  </dl>

  <?php
  $temp = $wp_query;
  $wp_query= null;
  $wp_query = new WP_Query();
  $wp_query->query('post_type=prensa&showposts=-1');
  ?>
  <dl class="faq_list">
       <h1></h1>
      <h4>
        Notas de prensa
      </h4>

	  <h5>
	  	 <div class="post-prensa">
    	  	 <div class="fleft"><strong>Titular</strong></div>
    	     <div class="fright"><strong>Fecha</strong></div>
    	 </div>
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
