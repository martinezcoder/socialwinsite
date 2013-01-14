<?php
/**
 * Template Name: Informes
 */

/*
 * 
 * 
SELECT term.term_id, term.name, term.slug, term.term_group, tax.term_taxonomy_id, tax.term_id
FROM `wp_terms`  term, 
`wp_term_taxonomy`  tax, 
`wp_term_relationships`  rel 
where 
rel.object_id = 1952
and rel.term_taxonomy_id = tax.term_taxonomy_id
and tax.term_id = term.term_id
 * 
 * 
 * */
get_header(); ?>


<div id="content" class="grid_13 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php
  $temp = $wp_query;
  $wp_query= null;
  $wp_query = new WP_Query();
  $wp_query->query("showposts=".of_get_option('posts_count')."&paged=".$paged."&post_type=informes");
  ?>

  <h1 style="font-size:1.5em;color:#333">Informes sectoriales Social<span style="color:#76E4D5;">Win</span></h1>

  <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

    </article>

  <?php endwhile; else: ?>

    <div class="no-results">
      <p><strong>No hay informes.</strong></p>
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
<?php get_sidebar('informes'); ?>
<?php get_footer(); ?>