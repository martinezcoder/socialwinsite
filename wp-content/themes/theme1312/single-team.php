<?php get_header(); ?>
<div id="content" class="grid_15 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">
        <header>
          <h1><?php the_title(); ?></h1>
        </header>
        <?php if(has_post_thumbnail()) {
					echo '<div class="featured-thumbnail no-hover"><div class="img-wrap">'; the_post_thumbnail(''); echo '</div></div>';
					}
				?>
        <div class="post-content extra-wrap">
          <?php the_content(); ?>
        </div><!--.post-content-->
      </article>

    </div><!-- #post-## -->

  <?php endwhile; /* end loop */ ?>

<!-- Fran inicio. Ultimas noticias del autor -->
  <?php

	$corte = strpos($post->post_title, " ");
	$partner = substr($post->post_title, 0, $corte);
	$partner_name = get_userdatabylogin($partner);

	global $post_noticia;

	$lista_noticias = get_posts('post_type=post&cat=&orderby=post_date&order=desc&numberposts=');

	$post_counter = 0;
	foreach($lista_noticias as $post_noticia)
	{
		$autor_noticia = get_userdata(intval($post_noticia->post_author));
		
		$autor = $autor_noticia->display_name;
		$socio = $partner_name->display_name;
		if ($autor == $socio)
		{

			if ($post_counter == 0)
			{
				echo '<h1>&Uacute;ltimos posts  de ';
				echo $socio;
				echo '</h1>';
			}

			echo '<article id="post-'; echo $post_noticia->ID; echo '" '; echo post_class('', $post_noticia->ID); echo '>';
			echo '<header>';
				echo '<h2>';
					echo '<a href="'.get_permalink($post_noticia->ID).'" title="'.get_the_title($post_noticia->ID).'" rel="bookmark">';
					echo get_the_title($post_noticia->ID);
				echo '</a></h2>';
				echo '<div class="post-meta">';
					echo '<div class="fleft">Categor&iacuteas: ';
						echo the_category(', ', '', $post_noticia->ID);
						echo ' | <time datetime="'; echo $post_noticia->post_date; echo'">';
						echo $post_noticia->post_date; echo '</time>';
					echo '</div>';
					echo '<div class="fright">';
					$comentarios = $post_noticia–>comment_count;
					if ($comentarios > 0){
						echo $post_noticia–>comment_count; echo ' comentarios.';
					}else{
						echo 'Sin comentarios.';
					}
					echo '</div>';
				echo '</div><!--.post-meta-->';
			echo '</header>';
			echo '<div class="featured-thumbnail">'.get_the_post_thumbnail($post_noticia->ID, "post-thumbnail", array( "class" => "thumb" )).'</div>';
				echo '<div class="post-content">';
				echo '<div class="excerpt">';
				echo my_string_limit_words($post_noticia->post_content, 50);
				echo '</div>';
				echo '<a href="'.$post_noticia->guid.'" class="button">M&aacute;s</a>';
			echo '</div>';
			echo '</article>';

			if ($post_counter == 4) break;
			$post_counter++;
		}

	}

  ?>

<!-- Fran final -->


</div><!--#content-->
<!-- < ?php get_sidebar(); ? > -->
<?php get_footer(); ?>
