<?php
/**
 * Template Name: Blog
 */

get_header(); ?>
<div id="content" class="grid_13 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php
  $temp = $wp_query;
  $wp_query= null;
  $wp_query = new WP_Query();
  $wp_query->query("showposts=".of_get_option('posts_count')."&paged=".$paged);
  ?>
  <h1 style="font-size:1.5em;color:#333">Blog de noticias Social<span style="color:#76E4D5;">Win</span></h1>
  <h2></h2>
  <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header>
        <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php $post_meta = of_get_option('post_meta'); ?>
        <?php if ($post_meta=='true' || $post_meta=='') { ?>
          <div class="post-meta">
		          <div class="fleftall">Artículo escrito el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> at <?php the_time() ?></time> por <?php the_author_posts_link() ?>       </div> 
		          <div class="fleft">Categorías: <?php the_category(', ') ?> </div>
		          <div class="fright"><?php comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); ?></div>
          </div><!--.post-meta-->
        <?php } ?>		
      </header>
      <?php $post_image_size = of_get_option('post_image_size'); ?>
      <?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
        <?php if(has_post_thumbnail()) {
          echo '<a href="'; the_permalink(); echo '">';
          echo '<div class="featured-thumbnail"><div class="img-wrap">'; the_post_thumbnail(); echo '</div></div>';
          echo '</a>';
          }
        ?>
      <?php } else { ?>
        <?php if(has_post_thumbnail()) {
          echo '<a href="'; the_permalink(); echo '">';
          echo '<div class="featured-thumbnail large"><div class="img-wrap"><div class="f-thumb-wrap">'; the_post_thumbnail('post-thumbnail-xl'); echo '</div></div></div>';
          echo '</a>';
          }
        ?>
      <?php } ?>
      
      <div class="post-content">
      	<?php $post_excerpt = of_get_option('post_excerpt'); ?>
      	<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
          <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,50);?></div>
        <?php } ?>
        <a href="<?php the_permalink() ?>" class="button"><?php _e('M&aacute;s','theme1312');?></a>
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
  
  <?php if(function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi(); ?>
	<?php else : ?>
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
  <?php endif; ?>
  <!-- Page navigation -->
  
  <?php $wp_query = null; $wp_query = $temp;?>

</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>