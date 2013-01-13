<?php get_header(); ?>

	<?php echo '<div id="content" class="grid_15';of_get_option('blog_sidebar_pos');echo '">'; ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">



        <header>
          <h1><?php the_title(); ?></h1>
        </header>

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


	<!-- orden inverso siguiendo tipo posts -->
    <nav class="oldernewer">
      <div class="older">
        <?php next_post_link('%link', '&laquo; Anterior') ?>
      </div>
      <div class="newer">
        <?php previous_post_link('%link', 'Siguiente &raquo;') ?>
      </div>
    </nav>

    </div><!-- #post-## -->

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->



<?php get_footer(); ?>
