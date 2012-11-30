<?php get_header(); ?>
<div id="content" class="grid_13 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
      else :
      $curauth = get_userdata(intval($author));
    endif;
  ?>
  <div id="recent-author-posts">
  
  <!-- SW ini: foto del autor -->
  <div class="author-info">
    <h1>Posts  de <?php echo $curauth->display_name; ?></h1>
    <p class="avatar">

	<?php
	global $post;

	$persona = get_posts('post_type=team&cat=&orderby=post_date&order=desc&numberposts=100');

	foreach($persona as $post) 
	{
		if (get_the_title($post->ID) == $curauth->display_name)
		{
			if ( has_post_thumbnail($post->ID) )
			{
					echo '<a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'"><div class="thumb-wrap">';
					echo get_the_post_thumbnail($post->ID, "small-post-thumbnail", array( "class" => "thumb" ));
					echo '</div></a>';
			}
		}
	}
	?>
	
    </p>
  </div><!--.author-->
  <!-- SW fin -->
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /* Displays the most recent posts by that author. Note that this does not display custom content types */ ?>
      <?php static $count = 0;
        if ($count == "5") // Number of posts to display
                { break; }
        else { ?>
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
      <?php $count++; } ?>
      <?php endwhile; else: ?>
        <p>
          No posts by <?php echo $curauth->display_name; ?> yet.
        </p>
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
  </div><!--#recentPosts-->

  
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
