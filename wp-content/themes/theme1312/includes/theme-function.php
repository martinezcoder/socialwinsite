<?php


// Mostrar fichero PDF link
function my_pdf_file_link($string, $word_limit)
{
  $words = explode('</a>', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  	array_pop($words);
  return implode(' ', $words).' ';;
}

function my_string_delete_start($string, $word_limit)
{
  $words = explode('Descarga Descarga el informe.', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  	array_pop($words);
  return implode(' ', $words).' ';;
}



// The excerpt based on words
function my_string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words).'... ';
}


// The excerpt based on character
function my_string_limit_char($excerpt, $substr=0)
{

	$string = strip_tags(str_replace('...', '...', $excerpt));
	if ($substr>0) {
		$string = substr($string, 0, $substr);
	}
	return $string;
		}


add_action( 'after_setup_theme', 'my_setup' );


// Remove invalid tags
function remove_invalid_tags($str, $tags) 
{
    foreach($tags as $tag)
    {
    	$str = preg_replace('#^<\/'.$tag.'>|<'.$tag.'>$#', '', trim($str));
    }

    return $str;
}

// Generates a random string (for embedding flash)
function theme1312_random($length){

	srand((double)microtime()*1000000 );
	
	$random_id = "";
	
	$char_list = "abcdefghijklmnopqrstuvwxyz";
	
	for($i = 0; $i < $length; $i++) {
		$random_id .= substr($char_list,(rand()%(strlen($char_list))), 1);
	}
	
	return $random_id;
}




// For embedding video file
function mytheme_video($file, $image, $width, $height, $color){

	//Template URL
	$template_url = get_template_directory_uri();
	
	//Unique ID
	$id = "video-".theme1312_random(15);
	
	$object_height = $height + 39;

	//JS
	$output  = '<script type="text/javascript">'."\n";
	$output .= 'var flashvars = {};'."\n";
	$output .= 'flashvars.player_width="'.$width.'";'."\n";
	$output .= 'flashvars.player_height="'.$height.'"'."\n";
	$output .= 'flashvars.player_id="'.$id.'";'."\n";
	$output .= 'flashvars.thumb="'.$image.'";'."\n";
	$output .= 'flashvars.colorTheme="'.$color.'";'."\n";
	$output .= 'var params = { "wmode": "transparent" };'."\n";
	$output .= 'params.wmode = "transparent";'."\n";
	$output .= 'params.quality = "high";';
	$output .= 'params.allowFullScreen = "true";'."\n";
	$output .= 'params.allowScriptAccess = "always";'."\n";
	$output .= 'params.quality="high";'."\n";
	$output .= 'var attributes = {};'."\n";
	$output .= 'attributes.id = "'.$id.'";'."\n";
	$output .= 'swfobject.embedSWF("'.$template_url.'/flash/video.swf?fileVideo='.$file.'", "'.$id.'", "'.$width.'", "'.$object_height.'", "9.0.0", false, flashvars, params, attributes);'."\n";
	$output .= '</script>'."\n\n";
	
	$output .= '<div class="video-bg" style="width:'.$width.'px; height:'.$height.'px; background-image:url('.$image.')">'."\n";
	$output .= '</div>'."\n";
	
	//HTML
	$output .= '<div id="'.$id.'">'."\n";
			$output .= '<a href="http://www.adobe.com/go/getflashplayer">'."\n";
					$output .= '<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />'."\n";
			$output .= '</a>'."\n";
	$output .= '</div>';

	return $output;
    
}



// Add Thumb Column
if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
// for post and page
add_theme_support('post-thumbnails', array( 'post', 'page' ) );
function fb_AddThumbColumn($cols) {
$cols['thumbnail'] = __('Thumbnail');
return $cols;
}
function fb_AddThumbValue($column_name, $post_id) {
$width = (int) 35;
$height = (int) 35;
if ( 'thumbnail' == $column_name ) {
// thumbnail of WP 2.9
$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
// image from gallery
$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
if ($thumbnail_id)
$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
elseif ($attachments) {
foreach ( $attachments as $attachment_id => $attachment ) {
$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
}
}
if ( isset($thumb) && $thumb ) {
echo $thumb;
} else {
echo __('None');
}
}
}
// for posts
add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
// for pages
add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );
}


/**
 * Display the sector list for the informe.
 *
 *
 * @param string $separator Optional, default is empty string. Separator for between the categories.
 * @param string $parents Optional. How to display the parents.
 * @param int $post_id Optional. Post ID to retrieve categories.
 */
function the_sector( $separator = '', $parents='', $post_id = false ) {
	echo get_the_sector_list( $separator, $parents, $post_id );
}


/**
 * Retrieve sector list in either HTML list or custom format.
 *
 *
 * @param string $separator Optional, default is empty string. Separator for between the categories.
 * @param string $parents Optional. How to display the parents.
 * @param int $post_id Optional. Post ID to retrieve categories.
 * @return string
 */
function get_the_sector_list( $separator = '', $parents='', $post_id = false ) {
	global $wp_rewrite;
	if ( ! is_object_in_taxonomy( get_post_type( $post_id ), 'sectores' ) )
		return apply_filters( 'the_sector', '', $separator, $parents );

	$sectores = get_the_sector( $post_id );
	if ( empty( $sectores ) )
		return apply_filters( 'the_sector', __( 'Todos' ), $separator, $parents );

	$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';

	$thelist = '';
	if ( '' == $separator ) {
		$thelist .= '<ul class="post-categories">';
		foreach ( $sectores as $sector ) {
			$thelist .= "\n\t<li>";
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $sector->parent )
//						$thelist .= get_category_parents( $sector->parent, true, $separator );
					$thelist .= '<a href="' . esc_url( get_sector_link( $sector->term_id ) ) . '" title="' . esc_attr( sprintf( __( "Ver todos los posts del sector %s" ), $sector->name ) ) . '" ' . $rel . '>' . $sector->name.'</a></li>';
					break;
				case 'single':
					$thelist .= '<a href="' . esc_url( get_sector_link( $sector->term_id ) ) . '" title="' . esc_attr( sprintf( __( "Ver todos los posts del sector %s" ), $sector->name ) ) . '" ' . $rel . '>';
					if ( $sector->parent )
//						$thelist .= get_category_parents( $sector->parent, false, $separator );
					$thelist .= $sector->name.'</a></li>';
					break;
				case '':
				default:
					$thelist .= '<a href="' . esc_url( get_sector_link( $sector->term_id ) ) . '" title="' . esc_attr( sprintf( __( "Ver todos los posts del sector %s" ), $sector->name ) ) . '" ' . $rel . '>' . $sector->name.'</a></li>';
			}
		}
		$thelist .= '</ul>';
	} else {
		$i = 0;
		foreach ( $sectores as $sector ) {
			if ( 0 < $i )
				$thelist .= $separator;
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $sector->parent )
//						$thelist .= get_category_parents( $sector->parent, true, $separator );
					$thelist .= '<a href="' . esc_url( get_sector_link( $sector->term_id ) ) . '" title="' . esc_attr( sprintf( __( "Ver todos los posts del sector %s" ), $sector->name ) ) . '" ' . $rel . '>' . $sector->name.'</a>';
					break;
				case 'single':
					$thelist .= '<a href="' . esc_url( get_sector_link( $sector->term_id ) ) . '" title="' . esc_attr( sprintf( __( "Ver todos los posts del sector %s" ), $sector->name ) ) . '" ' . $rel . '>';
					if ( $sector->parent )
//						$thelist .= get_category_parents( $sector->parent, false, $separator );
					$thelist .= "$sector->name</a>";
					break;
				case '':
				default:
					$thelist .= '<a href="' . esc_url( get_sector_link( $sector->term_id ) ) . '" title="' . esc_attr( sprintf( __( "Ver todos los posts del sector %s" ), $sector->name ) ) . '" ' . $rel . '>' . $sector->name.'</a>';
			}
			++$i;
		}
	}
	return apply_filters( 'the_sector', $thelist, $separator, $parents );
}


/**
 * Retrieve informes sector.
 *
 * @param int $id Optional, default to current post ID. The post ID.
 * @return array
 */
function get_the_sector( $id = false ) {
	$sectores = get_the_terms( $id, 'sectores' );

	if ( ! $sectores )
		$sectores = array();

	$sectores = array_values( $sectores );

	foreach ( array_keys( $sectores ) as $key ) {
		_make_cat_compat( $sectores[$key] );
	}

	// Filter name is plural because we return alot of categories (possibly more than #13237) not just one
	return apply_filters( 'get_the_sectors', $sectores );
}


/**
 * Retrieve sector link URL.
 *
 * @see get_term_link()
 *
 * @param int|object $sector sector ID or object.
 * @return string Link on success, empty string if sector does not exist.
 */
function get_sector_link( $sector ) {
	if ( ! is_object( $sector ) )
		$sector = (int) $sector;

	$sector = get_term_link( $sector, 'sectores' );

	if ( is_wp_error( $sector ) )
		return '';

	return $sector;
}


function the_sociallinks($id = 0) {

	$post_title = get_the_title($id);
	$post_permalink = get_permalink($id);
	
	$html_text = "";
	$html_text = "<div class='sociable-header' style='float:none'>";
	$html_text = $html_text."<ul class='s_clearfix'>";

	$html_text = $html_text."<li id=\"Twitter_Counter\">";

    $html_text = $html_text."<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}";
    $html_text = $html_text."(document,\"script\",\"twitter-wjs\");</script>";    

	$html_text = $html_text."<a href=\"https://twitter.com/share\" data-text=\"".$post_title."\" 
	                                                               data-url=\"".$post_permalink."\" 
	                                                               class=\"twitter-share-button\" 
	                                                               data-count=\"horizontal\"
	                                                               data-via=\"SocialWinApp\"
	                                                               data-lang=\"es\"></a></li>";

	$html_text = $html_text."
	                         <li id=\"Facebook_Counter\"><iframe src=\"http://www.facebook.com/plugins/like.php?href=".$post_permalink."&send=false&layout=button_count&show_faces=false&action=like&colorscheme=light&font\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden;height:32px;width:100px\" allowTransparency=\"true\"></iframe></li>";

	$html_text = $html_text."
	                         <li id=\"LinkedIn_Counter\"><script src=\"http://platform.linkedin.com/in.js\" type=\"text/javascript\"></script>";

	$html_text = $html_text."<script type=\"IN/Share\" data-url=".$post_permalink." data-counter=\"right\"></script></li>";

	$html_text = $html_text."
	                         <li id=\"Google_p\"><script type=\"text/javascript\" src=\"http://apis.google.com/js/plusone.js\">{lang:'es'}</script>";
	$html_text = $html_text."<g:plusone annotation=\"bubble\" href=\"".$post_permalink."\" size=\"medium\"></g:plusone></li>";

	$html_text = $html_text."</ul>";
	$html_text = $html_text."</div>"; 
	echo $html_text;
}

?>