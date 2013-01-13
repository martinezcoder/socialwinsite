<?php get_header(); ?>

	<?php echo '<div id="content" class="grid_13';of_get_option('blog_sidebar_pos');echo '">'; ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">
        <header>
          <h1><?php the_title(); ?></h1>
        </header>
		
		<?php 
			  	the_sociallinks();
        ?>
        <?php $post_meta = of_get_option('post_meta'); ?>
        <?php if ($post_meta=='true' || $post_meta=='') { ?>
          <div class="post-meta">
	         <div class="fleftall">Informe publicado el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> </time></div>
		     <div class="fleft">Sector: <?php the_sector(', ') ?> </div>
	         <div class="fright"><?php comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); ?></div>
          </div><!--.post-meta-->
        <?php } ?>		

        <?php $single_image_size = of_get_option('single_image_size'); ?>

	  <?php if($single_image_size=='' || $single_image_size=='normal'){ ?>
		          <?php if(has_post_thumbnail()) {
		            echo '<div class="featured-thumbnail"><div class="img-wrap">'; the_post_thumbnail(); echo '</div></div>';
		            }
		          ?>
        <?php } else { ?>
		          <?php if(has_post_thumbnail()) {
		            echo '<div class="featured-thumbnail large"><div class="img-wrap"><div class="f-thumb-wrap">'; the_post_thumbnail('post-thumbnail-xl'); echo '</div></div></div>';
		            }
		          ?>
        <?php } ?>

        <div class="post-content">
          <?php the_content(); ?>
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.post-content-->
      </article>


    </div><!-- #post-## -->


	<?php the_sociallinks(); ?>
	

    <?php comments_template( '', true ); ?>

    
    <nav class="oldernewer">
      <div class="older">
        <?php previous_post_link('%link', '&laquo; Anterior') ?>
      </div>
      <div class="newer">
        <?php next_post_link('%link', 'Siguiente &raquo;') ?>
      </div>
    </nav>

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->


<?php 
		get_sidebar('informes');
?>

<?php get_footer(); ?>
