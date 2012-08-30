<?php get_header(); ?>
<div id="content" class="grid_12 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
      else :
      $curauth = get_userdata(intval($author));
    endif;
  ?>
  <div id="recent-author-posts">
  
  <div class="author-info">
    <h1>&Uacute;ltimos posts  de <?php echo $curauth->display_name; ?></h1>
    <p class="avatar">

	<?php
	global $post;

	$persona = get_posts('post_type=team&cat=&orderby=post_date&order=desc&numberposts=5');

	foreach($persona as $post) {
		if (get_the_title($post->ID) == $curauth->display_name)
		{
			if ( has_post_thumbnail($post->ID) ){
					echo '<a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'"><div class="thumb-wrap">';
					echo get_the_post_thumbnail($post->ID, "small-post-thumbnail", array( "class" => "thumb" ));
					echo '</div></a>';
			}
/*
			echo wp_trim_words($post->post_content, 30);
*/
		}
	}
	?>
	
    </p>
  </div><!--.author-->

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
            <div class="fleft">Categor&iacuteas: <?php the_category(', ') ?> | <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> at <?php the_time() ?></time> , por <?php the_author_posts_link() ?></div>
                  <div class="fright"><?php comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); ?></div>
                </div><!--.post-meta-->
              <?php } ?>		
            </header>
            <?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
            
            <div class="post-content">
              <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,50);?></div>
              <a href="<?php the_permalink() ?>" class="button">M&aacute;s</a>
            </div>
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
  <div id="recent-author-comments">
    <h3>Recent Comments by <?php echo $curauth->display_name; ?></h3>
      <?php
        $number=5; // number of recent comments to display
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number");
      ?>
      <ul>
        <?php
          if ( $comments ) : foreach ( (array) $comments as $comment) :
          echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_date(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
        endforeach; else: ?>
                  <p>
                    No comments by <?php echo $curauth->display_name; ?> yet.
                  </p>
        <?php endif; ?>
            </ul>
  </div><!--#recentAuthorComments-->

  
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
