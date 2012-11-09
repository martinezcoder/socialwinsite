<?php get_header(); ?>
<div id="content" class="grid_12 <?php echo of_get_option('blog_sidebar_pos') ?>">
  <h1><?php printf( __( 'Tag Archives: %s' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
  <!-- displays the tag's description from the Wordpress admin -->
  <?php echo tag_description(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header>
        <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php $post_meta = of_get_option('post_meta'); ?>
        <?php if ($post_meta=='true' || $post_meta=='') { ?>
          <div class="post-meta">
	          <div class="fleftall">Artículo escrito el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> at <?php the_time() ?></time> por <?php the_author_posts_link() ?></div> 
	          <div class="fleft">Categorías: <?php the_category(', ') ?> </div>
	          <div class="fright"><?php comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); ?></div>
          </div><!--.post-meta-->
        <?php } ?>		
      </header>
      <?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
      
      <div class="post-content">
        <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,50);?></div>
        <a href="<?php the_permalink() ?>" class="button">M&aacute;s</a>
      </div>
			<br>
			<?php the_sociallinks(); ?>

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
<?php get_sidebar(); ?>
<?php get_footer(); ?>