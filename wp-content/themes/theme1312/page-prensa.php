<?php
/**
 * Template Name: Prensa
 */

get_header(); ?>
<div id="content" class="grid_16">
  <h1><?php the_title(); ?></h1>

  <dl class="faq_list">
      <h4>
        Links
      </h4>

     <div class="post-prensa">
        <a target="_blank" href="http://www.elmundofinanciero.com/noticia/10609/Analisis-y-Opinion/De-verdad-existe-el-ROI-en-social-media?.html">
            <div class="fleft">¿De verdad existe el ROI en social media?</div>
            <div class="fright">Mundo Financiero, 18/02/2013</div>
        </a>
     </div>
     
     <div class="post-prensa">
        <a target="_blank" href="http://cocheglobal.blogspot.com.es/2013/01/marcas-con-muchos-fans-pero-con-pocos.html?m=1">
            <div class="fleft">Marcas con muchos fans pero con pocos clics</div>
            <div class="fright">Coche Global, 31/01/2013</div>
        </a>
     </div>

     <div class="post-prensa">
        <a target="_blank" href="http://www.marketingnews.es/tendencias/noticia/1072016029005/audi-marca-mejor-conduce-redes-sociales-espanolas.1.html?utm_source=rss&utm_medium=feed&utm_campaign=20130201">
            <div class="fleft">Audi, la marca que mejor se conduce en las redes sociales españolas</div>
            <div class="fright">Marketing News, 30/01/2013</div>            
        </a>
     </div>

     <div class="post-prensa">
        <a target="_blank" href="http://www.anuncios.com/investigacion-marketing-opinion-publica/noticia/1072023009601/audi-marca-coches-mas-seguidores-redes-sociales.1.html">
            <div class="fleft">Audi es la marca de coches con más seguidores en redes sociales</div>
            <div class="fright">Revista Anuncios, 30/01/2013</div>            
        </a>
     </div>

     <div class="post-prensa">
         <a target="_blank" href="http://www.elmundofinanciero.com/noticia/9828/Motor/AUDI-gana-de-calle-en-las-redes-sociales-espanolas.html">
             <div class="fleft">AUDI gana de calle en las redes sociales españolas</div>
             <div class="fright">El mundo financiero, 29/01/2013</div>
         </a>
     </div>

     <div class="post-prensa">
        <a target="_blank" href="http://www.ondacro.com/podcast/entrevista-celia-ramon-informe-auto-en-rrss-29-de-enero-2013?tipo=player&pos=0">
            <div class="fleft">Entrevista a Celia Ramón Wyser</div>
            <div class="fright">Onda Cro "Atrapados en las redes", 29/01/2013</div>            
        </a>
     </div>

     <div class="post-prensa">
         <a target="_blank" href="http://www.ivoox.com/entrevista-celia-ramon-informe-auto-rrss-29-audios-mp3_rf_1745023_1.html?autoplay=1"> 
            <div class="fleft">Entrevista a Celia Ramón Wyser</div>
            <div class="fright">Ivoox (kiosko de audio), 29/01/2013</div>
         </a>
     </div>

     <div class="post-prensa">
         <a target="_blank" href="http://ticsyformacion.com/2013/01/29/redes-sociales-en-el-sector-de-la-automocion-espana-infografia-infographic-socialmedia/">
            <div class="fleft">Redes Sociales en el sector de la automoción España#infographic</div>
            <div class="fright">Ticsyformacion (Alfredo Vela), 29/01/2013</div>            
        </a>
     </div>

     <div class="post-prensa">
        <a target="_blank" href="http://www.dominio.ws/29/redes-sociales-en-el-sector-de-la-automocion-espana-infografia-infographic-socialmedia/">
            <div class="fleft">Redes Sociales en el sector de la automoción España #infografia #infographic #socialmedia</div>
            <div class="fright">Dominio, 29/01/2013</div>            
        </a>
     </div> 

     <div class="post-prensa">
        <a target="_blank" href="http://www.puromarketing.com/13/14933/redes-sociales-activo-estrategico.html">
            <div class="fleft">¿Por qué las redes sociales son un activo estratégico?</div>
            <div class="fright">PuroMarketing, 10/01/2013</div>            
        </a>
     </div>

     <div class="post-prensa">
        <a target="_blank" href="http://orientacion-laboral.infojobs.net/cooperacion-cocreacion">
            <div class="fleft">2 claves para hacer realidad tus ideas de negocio</div>
            <div class="fright">Infojobs, 20/10/2012</div>            
        </a>
     </div>

     <div class="post-prensa">
        <a target="_blank" href="http://orientacion-laboral.infojobs.net/redes-sociales-emprendedores">
            <div class="fleft">Redes Sociales: Ventajas competitivas para tu negocio</div>
            <div class="fright">Infojobs, 08/10/2012</div>            
        </a>
     </div>

  </dl>

  <?php
  $temp = $wp_query;
  $wp_query= null;
  $wp_query = new WP_Query();
  $wp_query->query('post_type=prensa&showposts=-1');
  ?>
  <dl class="faq_list">
       <h1></h1>
      <h4>
        Notas de prensa
      </h4>

	  <h5>
	  	 <div class="post-prensa">
    	  	 <div class="fleft"><strong>Titular</strong></div>
    	     <div class="fright"><strong>Fecha</strong></div>
    	 </div>
	  </h5>

	<?php $num = 1 ?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	      <div>
			
	        <?php $post_meta = of_get_option('post_meta'); ?>
	        <?php if ($post_meta=='true' || $post_meta=='') { ?>
	          <div class="post-prensa">
	          	 <div class="fleft"><?php echo $num; $num++; ?>.  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
		         <div class="fright">Publicada el <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('d/m/Y'); ?> </time></div>
	          </div><!--.post-meta-->
	        <?php } ?>		

	      </div>
		
	    </div><!-- #post-## -->

  	<?php endwhile; ?>

  </dl>
  
  <?php $wp_query = null; $wp_query = $temp;?>

</div><!--#content-->
<?php get_footer(); ?>
