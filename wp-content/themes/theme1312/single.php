<?php get_header(); ?>

	<?php echo '<div id="content" class="grid_13';of_get_option('blog_sidebar_pos');echo '">'; ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">
        <header>
          <h1><?php the_title(); ?></h1>
        </header>

<!-- Fran inicio: a�adimos informaci�n sobre la noticia en la misma noticia -->
		
		<?php 
			  	the_sociallinks();
				 
				echo '<div class="post-meta">';
				echo '<div class="fleftall">Artículo escrito el <time datetime="'; the_time('Y-m-d\TH:i'); echo'">'; the_time('d/m/Y'); echo '</time> por '; the_author_posts_link(); echo '</div>';
				echo '<div class="fleft">Categorías: ';  the_category(', '); echo '</div>';
				echo '<div class="fright">'; comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); echo '</div>';
        		echo '</div><!--.post-meta-->';
        ?>
<!-- Fran final -->

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




      <div id="post-author">
        <p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '80' ); /* This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address */  } ?></p>
        <div id="author-description">
        Artículo escrito por <?php the_author_posts_link() ?>
          
          <div id="author-link">
            <?php the_author_meta('description') ?> 
          </div><!--#author-link-->
        </div><!--#author-description -->
      </div><!--#post-author-->



    </div><!-- #post-## -->
    
<!--    
    <nav class="oldernewer">
      <div class="older">
        <?php previous_post_link('%link', '&laquo; Previous post') ?>
      </div><!--.older-- >
      <div class="newer">
        <?php next_post_link('%link', 'Next Post &raquo;') ?>
      </div><!--.newer-- >
    </nav><!--.oldernewer-- >
-->

	<?php the_sociallinks(); ?>
	

    <?php comments_template( '', true ); ?>

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->


<?php 
		get_sidebar();
?>

<?php get_footer(); ?>
