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
  <h2></h2>

  <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header>
        <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php $post_meta = of_get_option('post_meta'); ?>
        <?php if ($post_meta=='true' || $post_meta=='') { ?>
          <div class="post-meta">
	         <div class="fleftall">Informe publicado el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> </time></div>
		     <div class="fleft">Sector: <?php the_sector(', ') ?> </div>
	         <div class="fright"><?php comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); ?></div>
          </div><!--.post-meta-->
        <?php } ?>		

      </header>

    </article>


  <?php endwhile; else: ?>
    <div class="no-results">
      <p><strong>Ha ocurrido un error.</strong></p>
      <p>Lamentamos las molestias. Intente acceder de nuevo desde la barra de menús.</p>
    </div><!--noResults-->
  <?php endif; ?>



</div><!--#content-->
<?php get_sidebar('informes'); ?>
<?php get_footer(); ?>