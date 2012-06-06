<?php get_header(); ?>
<div id="content" class="grid_16">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">
        <header>
          <h1><?php the_title(); ?></h1>
        </header>
        <?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('portfolio-post-thumbnail-xl'); echo '</div>'; /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ ?>
        <div class="post-content">
          <?php the_content(); ?>
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.post-content-->
      </article>
    </div><!-- #post-## -->
    
    <?php comments_template( '', true ); ?>

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php get_footer(); ?>