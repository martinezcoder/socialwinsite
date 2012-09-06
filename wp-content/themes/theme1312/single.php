<?php get_header(); ?>

   <?php if (get_post( $args[0] )->post_type != 'clients') { ?>
	<?php echo '<div id="content" class="grid_12';of_get_option('blog_sidebar_pos');echo '">'; ?>
   <?php } else { ?>
	<?php echo '<div id="content" class="grid_15';of_get_option('blog_sidebar_pos');echo '">'; ?>
   <?php } ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">
        <header>
          <h1><?php the_title(); ?></h1>
        </header>

<!-- Fran inicio:  "me gusta!" para redes sociales -->
		<div class='sociable' style='float:none'>
			<ul class='clearfix'>
				<li id="Twitter_Counter"><a href="https://twitter.com/share" data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script></li>
				<li id="Facebook_Counter"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&send=false&layout=button_count&show_faces=false&action=like&colorscheme=light&font" scrolling="no" frameborder="0" style="border:none; overflow:hidden;height:32px;width:100px" allowTransparency="true"></iframe></li>
				<li id="LinkedIn_Counter"><script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script></li>
				<li id="Google_p"><script type="text/javascript" src="http://apis.google.com/js/plusone.js">{lang:'es'}</script><g:plusone annotation="bubble" href="<?php the_permalink(); ?>" size="medium"></g:plusone></li>
			</ul>
		</div> 		
<!-- Fran final -->

<!-- Fran inicio: a�adimos informaci�n sobre la noticia en la misma noticia -->
        <div class="post-meta">
          <div class="fleft">Categor&iacuteas: <?php the_category(', ') ?> | <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> at <?php the_time() ?></time> , por <?php the_author_posts_link() ?></div>
          <div class="fright"><?php comments_popup_link('Sin comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Post cerrado'); ?></div>
        </div><!--.post-meta-->
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

        
<!--
			<?php /* If a user fills out their bio info, it's included here */ ?>
      <div id="post-author">
        <h3>Written by <?php the_author_posts_link() ?></h3>
        <p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '80' ); /* This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address */  } ?></p>
        <div id="author-description">
          <?php the_author_meta('description') ?> 
          <div id="author-link">
            <p>View all posts by: <?php the_author_posts_link() ?></p>
          </div><!--#author-link-- >
        </div><!--#author-description -- >
      </div><!--#post-author-- >
-->
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

<!-- Fran inicio:  "me gusta!" para redes sociales -->
		<div class='sociable' style='float:none'>
			<ul class='clearfix'>
				<li id="Twitter_Counter"><a href="https://twitter.com/share" data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script></li>
				<li id="Facebook_Counter"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&send=false&layout=button_count&show_faces=false&action=like&colorscheme=light&font" scrolling="no" frameborder="0" style="border:none; overflow:hidden;height:32px;width:100px" allowTransparency="true"></iframe></li>
				<li id="LinkedIn_Counter"><script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script></li>
				<li id="Google_p"><script type="text/javascript" src="http://apis.google.com/js/plusone.js">{lang:'es'}</script><g:plusone annotation="bubble" href="<?php the_permalink(); ?>" size="medium"></g:plusone></li>
			</ul>
		</div> 		
<!-- Fran final -->


    <?php comments_template( '', true ); ?>

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->


<?php 
	if (get_post( $args[0] )->post_type != 'clients') {
		get_sidebar();
	}
?>

<?php get_footer(); ?>
