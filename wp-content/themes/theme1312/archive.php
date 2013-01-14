<?php get_header(); ?>
<div id="content" class="grid_13 <?php echo of_get_option('blog_sidebar_pos') ?>">
  <h1>
    <?php if ( is_day() ) : /* if the daily archive is loaded */ ?>
      <?php printf( __( 'Archivos diarios: <span>%s</span>' ), get_the_date() ); ?>
    <?php elseif ( is_month() ) : /* if the montly archive is loaded */ ?>
      <?php printf( __( 'Archivos mensuales: <span>%s</span>' ), get_the_date('F Y') ); ?>
    <?php elseif ( is_year() ) : /* if the yearly archive is loaded */ ?>
      <?php printf( __( 'Archivos anuales: <span>%s</span>' ), get_the_date('Y') ); ?>
    <?php else : /* if anything else is loaded, ex. if the tags or categories template is missing this page will load */ ?>
		<?php if (get_post( $args[0] )->post_type == 'informes') { ?>
			Archivos de Informes
		<?php } else { ?>
      		Archivos del Blog
	    <?php } ?>

    <?php endif; ?>
  </h1>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if (get_post( $args[0] )->post_type == 'informes') { ?>

		<header>
			<?php $post_meta = of_get_option('post_meta'); ?>
			<?php if ($post_meta=='true' || $post_meta=='') { ?>
			
			  <div class="post-meta">
			     <div class="fleftall">Informe publicado el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> </time></div>
			     <div class="fleft">Sector: <?php the_sector(', ') ?> </div>
			     <div class="fright"><?php comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); ?></div>
			  </div><!--.post-meta-->
			
			<?php } ?>		
		</header>

		<?php /*
		<?php $post_image_size = of_get_option('post_image_size'); ?>
		<?php if(has_post_thumbnail()) {
			echo '<a href="'; the_permalink(); echo '">';
			echo '<div class="featured-thumbnail small"><div class=""><div class="">'; the_post_thumbnail('portfolio-post-thumbnail-small'); echo '</div></div></div>';
			echo '</a>';
		  }
		?>
		*/ ?>
		<div class="post-content">

	        <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	        
	      	<?php $post_excerpt = of_get_option('post_excerpt'); ?>
	      	<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>

	          <div class="excerpt"><?php $preexcerpt = get_the_excerpt(); 
	          							$excerpt = my_string_delete_start($preexcerpt,2);
	          							echo my_string_limit_words($excerpt,35); ?></div>	          

	        <?php } ?>

			<div class="fleft">
				<a href="<?php the_permalink() ?>" class="button"><?php _e('Resumen...','theme1312');?></a>
			</div>

			<div class="fleft margenizq">
				<?php $file = apply_filters('the_content', $post->post_content); ?>
				<?php echo my_pdf_file_link($file, 1); ?></a>
			</div>


		</div>
		<div class="socialcount_informes">
			<?php the_sociallinks(); ?>
		</div>


<?php } else { ?>

      <header>
        <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php $post_meta = of_get_option('post_meta'); ?>
        <?php if ($post_meta=='true' || $post_meta=='') { ?>
          <div class="post-meta">
	          <div class="fleftall">Artículo escrito el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> </time> por <?php the_author_posts_link() ?></div> 
	          <div class="fleft">Categorías: <?php the_category(', ') ?> </div>
	          <div class="fright"><?php comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); ?></div>
          </div><!--.post-meta-->
        <?php } ?>		
      </header>
      <?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
      
      <div class="post-content">
        <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,50);?></div>
        <a href="<?php the_permalink() ?>" class="button">Más</a>
      </div>
      <br>
	  <?php the_sociallinks(); ?>

<?php } ?>

    </article>
    
  <?php endwhile; else: ?>
    <div class="no-results">
      <p><strong>There has been an error.</strong></p>
      <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
      <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
    </div><!--noResults-->
  <?php endif; ?>
    
  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav class="oldernewer">
      <div class="older">
        <?php next_posts_link('&laquo; Older Entries') ?>
      </div><!--.older-->
      <div class="newer">
        <?php previous_posts_link('Newer Entries &raquo;') ?>
      </div><!--.newer-->
    </nav><!--.oldernewer-->
  <?php endif; ?>
  
</div><!--#content-->

	
<?php if (get_post( $args[0] )->post_type == 'informes') { ?>
	<?php get_sidebar('informes'); ?>
<?php } else { ?>
	<?php get_sidebar(); ?>
<?php } ?>


<?php get_footer(); ?>