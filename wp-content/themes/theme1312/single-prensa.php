<?php get_header(); ?>

	<?php echo '<div id="content" class="grid_15';of_get_option('blog_sidebar_pos');echo '">'; ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">

        <header>

		    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		      <div>
				
		        <?php $post_meta = of_get_option('post_meta'); ?>
		        <?php if ($post_meta=='true' || $post_meta=='') { ?>
		          <div class="post-meta">
			         <div class="fleft">Nota publicada el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> </time></div>
		          </div><!--.post-meta-->
		        <?php } ?>		
	
		      </div>
			
		    </div><!-- #post-## -->

 	       <h1><?php the_title(); ?></h1>
        </header>


        <div class="post-content">
          <?php the_content(); ?>
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.post-content-->
      </article>


	<!-- orden inverso siguiendo tipo posts -->
    <nav class="oldernewer">
      <div class="older">
        <?php next_post_link('%link', '&laquo; Siguiente') ?>
      </div>
      <div class="#">
      	<a href="<?php echo home_url('/notas-de-prensa') ?>" class="button">Índice</a>
      </div>
      <div class="newer">
        <?php previous_post_link('%link', 'Anterior &raquo;') ?>
      </div>
    </nav>

    </div><!-- #post-## -->

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->



<?php get_footer(); ?>
