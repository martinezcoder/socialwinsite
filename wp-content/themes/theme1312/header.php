<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_category() ) {
		echo 'Categoría &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo 'Tag &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Búsqueda &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo 'Error 404 Not Found | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
	    $titulo_del_post = single_post_title( '', false );
	    if ( ($titulo_del_post != "Contacto")
                && ($titulo_del_post != "Nuestros Partners")
                && ($titulo_del_post != "Equipo")
                && ($titulo_del_post != "Clientes")
           )
        {
            echo wp_title( 'Redes Sociales | ', false, right ); bloginfo( 'name' );    
        }else{
		  echo wp_title( ' | ', false, right ); bloginfo( 'name' );
        }
	} ?></title>
	
	<meta name="description" content="<?php 
        $titulo_del_post = single_post_title( '', false );
        if ( ($titulo_del_post != "Contacto")
                && ($titulo_del_post != "Nuestros Partners")
                && ($titulo_del_post != "Equipo")
                && ($titulo_del_post != "Clientes")
           )
        {
            echo wp_title( 'Social Media | ', false, right ); bloginfo( 'description' );    
        }else{
          echo wp_title( ' | ', false, right ); bloginfo( 'description' );
        }
	?>" />
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="keywords" content="<?php echo wp_title('redes sociales, ', false, right); echo wp_title('social media, ', false, right); bloginfo( 'description' ); echo ', análisis redes sociales, Consultoria, Redes Sociales, Social Media, Planes Estrategicos, Estrategias Online, Estrategias Facebook, Estrategias Twitter, Reputacion Online'; ?>" />
    <meta name="author" content="SocialWin">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/socialwin.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<!-- The HTML5 Shim is required for older browsers, mainly older versions IE -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" &nbsp;alt="" /></a>
    </div>
  <![endif]-->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/grid.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/jquery.bxslider.css"/>
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  <!--[if lt IE 9]>
  <style type="text/css">
    .border, #content .button, #top-content .button, #bottom-content .button, .wpcf7-form .submit-wrap input {
      behavior:url(<?php bloginfo('stylesheet_directory'); ?>/PIE.php)
      }
  </style>
  <![endif]-->
  
  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout 
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>',height:'<?php echo of_get_option('sf_sl_animation'); ?>'}, // fade-in and slide-down animation 
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed 
				autoArrows:  <?php echo of_get_option('sf_arrows'); ?>,   // generation of arrow mark-up (for submenu) 
				dropShadows: <?php echo of_get_option('sf_shadows'); ?>   // drop shadows (for submenu)
			});
			
			// prettyphoto init
			jQuery("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				theme:'facebook',
				slideshow:5000,
				autoplay_slideshow: false
			});
			
			// easyTooltip init
			//jQuery("a.tooltip, .social-networks li a").easyTooltip();
			
			jQuery(".recent-posts.clients li:nth-child(3n), .recent-posts.team li.entry:nth-child(4n), .recent-posts.services li:odd").addClass('nomargin')
			
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
  </script>
  
  <script type="text/javascript">
		jQuery(window).load(function() {
			// nivoslider init
			jQuery('#slider').nivoSlider({
				effect: '<?php echo of_get_option('sl_effect'); ?>',
				slices:<?php echo of_get_option('sl_slices'); ?>,
				boxCols:<?php echo of_get_option('sl_box_columns'); ?>,
				boxRows:<?php echo of_get_option('sl_box_rows'); ?>,
				animSpeed:<?php echo of_get_option('sl_animation_speed'); ?>,
				pauseTime:<?php echo of_get_option('sl_pausetime'); ?>,
				directionNav:<?php echo of_get_option('sl_dir_nav'); ?>,
				directionNavHide:<?php echo of_get_option('sl_dir_nav_hide'); ?>,
				controlNav:<?php echo of_get_option('sl_control_nav'); ?>,
				captionOpacity:<?php echo of_get_option('sl_caption_opacity'); ?>
			});
		});
	</script>
	
	<!-- jQuery slider presentacion -->
	<script type="text/javascript">
		
		jQuery(window).load(function() {
			$('.bxslider').bxSlider({
			  mode: 'horizontal',
			  useCSS: false,
			  infiniteLoop: true,
			  hideControlOnEnd: true,
			  /*easing: 'easeOutElastic',*/
			  speed: 800,
			  pager:false
			});
		});

</script>
  <!-- Custom CSS -->
	<?php if(of_get_option('custom_css') != ''){?>
  <style type="text/css">
  	<?php echo of_get_option('custom_css' ) ?>
  </style>
  <?php }?>
  
  
  
  
  <style type="text/css">
		/* Body styling options */
		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>
		
  	/* Header styling options */
		<?php $header_styling = of_get_option('header_color'); 
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>
		
		/* Links and buttons color */
		<?php $links_styling = of_get_option('links_color'); 
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>
		
		/* Body typography */
		<?php $body_typography = of_get_option('body_typography'); 
			if($body_typography) {
				echo 'body {font-family:'.$body_typography['face'].'; color:'.$body_typography['color'].'}';
				echo '#main {font-size:'.$body_typography['size'].'; font-style:'.$body_typography['style'].';}';
			}
		?>
  </style>
</head>

<body <?php body_class(); ?>>

<div id="main"><!-- this encompasses the entire Web site -->
	<header id="header">
		<div class="container_16">
			<div class="grid_16">
      	<div class="logo">
          
          <?php if(of_get_option('logo_type') == 'text_logo'){?>
          
          	<?php if( is_front_page() || is_home() || is_404() ) { ?>
              <h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } else { ?>
              <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
            <?php } ?>
            <h6><?php bloginfo('description'); ?></h6>
            
          <?php } else { ?>
          
          	<?php if(of_get_option('logo_url') != ''){ ?>
            	<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
            <?php } else { ?>
            	<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
            <?php } ?>
            
          <?php }?>
        </div>

        <nav class="primary">
        	<span class="ltc"></span>
          <span class="rtc"></span>
          <span class="rbc"></span>
          <span class="lbc"></span>
          <?php wp_nav_menu( array(
            'container'       => 'ul', 
            'menu_class'      => 'sf-menu', 
            'menu_id'         => 'topnav',
            'depth'           => 0,
            'theme_location' => 'header_menu' 
            )); 
          ?>
        </nav><!--.primary-->
        <?php if ( of_get_option('g_search_box_id') == 'yes') { ?>  
          <div id="top-search">
            <form method="get" action="<?php echo get_option('home'); ?>/">
              <input type="text" name="s"  class="input-search"/><input type="submit" value="GO" id="submit">
            </form>
          </div>  
        <?php } ?>


        <div id="sociable-header">
        	<div class="sociable-header">
				<ul class='s_clearfix'>				
					<li><a title="Síguenos en Twitter" class="option1_32 tooltip tool-left youtube-icon" style="background-position:-288px -32px" rel="nofollow" target="_blank" href="https://twitter.com/SocialWinApp"></a></li>
					<li><a title="Síguenos en Facebook" class="option1_32 tooltip tool-left youtube-icon" style="background-position:-96px 0px" rel="nofollow" target="_blank" href="https://www.facebook.com/pages/SocialWin/349679691794392"></a></li>
					<li><a title="Síguenos en LinkedIn" class="option1_32 tooltip tool-center youtube-icon" style="background-position:-288px 0px" rel="nofollow" target="_blank" href="http://www.linkedin.com/company/socialwin"></a></li>
					<li><a title="Síguenos en Youtube" class="option1_32 tooltip tool-center youtube-icon" style="background-position:-353px 0px" rel="nofollow" target="_blank" href="http://www.youtube.com/user/SocialWin"></a></li>
					<li><a title="Síguenos en Google+" class="option1_32 tooltip tool-right youtube-icon" style="background-position:-96px -32px" rel="nofollow" target="_blank" href="https://plus.google.com/u/0/106528211751763873508"></a></li>
					<li><a title="Síguenos en Pinterest" class="option1_32 tooltip tool-right youtube-icon" style="background-position:-128px -32px" rel="nofollow" target="_blank" href="http://pinterest.com/socialwin/"></a></li>	
					<li><a title="RSS" class="option1_32 tooltip tool-right youtube-icon" style="background-position:-128px 0px" rel="nofollow" target="_blank" href="http://feeds.feedburner.com/SocialWin"></a></li>	
				</ul>
			</div>
		</div>
<!--
        <div id="widget-header">
        	<?php /* if ( ! dynamic_sidebar( 'Header' ) ) : ?>
            <?php endif */ ?>
        </div>
-->
      </div>

	</div><!--.container-->

	</header>
	
  <?php if( is_front_page() ) { ?>
  <section id="slider-wrapper">
    <div class="container_16">
      <div class="grid_16">
      	<?php include_once(TEMPLATEPATH . '/slider.php'); ?>
      </div>
    </div>
  </section><!--#slider-->
  <?php } ?>
  <?php
		$container_class='';
		if(is_front_page() != true){
			$addclass = "container_16";
		}
	?>
	<div class="primary_content_wrap clearfix <?php echo $addclass; ?>">