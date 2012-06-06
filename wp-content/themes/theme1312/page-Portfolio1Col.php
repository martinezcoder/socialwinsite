<?php
/**
 * Template Name: Portfolio 1 column
 */

get_header(); ?>

<div id="content" class="grid_16">
	<?php include_once (TEMPLATEPATH . '/title.php');?>   
  <?php global $more;	$more = 0;?>
  <?php $values = get_post_custom_values("category-include"); $cat=$values[0];  ?>
  <?php $catinclude = 'portfoliocat='. $cat ;?>
  
  <?php $wp_query = new WP_Query(); ?>
  <?php $wp_query->query("post_type=portfolio&". $catinclude ."&paged=".$paged.'&showposts=5'); ?>
  <?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'theme1312' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'theme1312' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>
<div id="gallery" class="one_column">
  <ul class="portfolio">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php
      $custom = get_post_custom($post->ID);
      $lightbox = $custom["lightbox-url"][0];
      
    ?>
    
      <li>
      	<div class="hr"></div>
				<div class="clearfix">
        	<?php if($lightbox!=""){ ?>
          <span class="image-border"><a class="image-wrap" href="<?php echo $lightbox;?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>"><?php the_post_thumbnail( 'portfolio-post-thumbnail-xl' ); ?><span class="zoom-icon"></span></a></span>
        <?php }else{ ?>
          <span class="image-border"><a class="image-wrap" href="<?php the_permalink() ?>" title="<?php _e('Permanent Link to', 'theme1312');?> <?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'portfolio-post-thumbnail-xl' ); ?><span class="zoom-icon"></span></a></span>
          <?php } ?>
          <div class="folio-desc">
            <header>
              <h2><a href="<?php the_permalink(); ?>"><?php $title = the_title('','',FALSE); echo substr($title, 0, 40); ?></a></h2>
              <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('F j, Y'); ?></time>
            </header>
            <p class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,50);?></p>
            <a href="<?php the_permalink(); ?>" class="button">Read more</a>
          </div>
        </div>
      </li>
    
  
    <?php endwhile; ?>
  </ul>
  <div class="clear"></div>
</div>





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
</div><!-- #content -->
<!-- end #main -->
<?php get_footer(); ?>