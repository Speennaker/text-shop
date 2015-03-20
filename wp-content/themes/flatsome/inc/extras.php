<?php

/* CONTENT */

/* - Extra body classes */
/* - Filter for next/previous image links 
/* - Custom metabox for Product Categories
/* - Extra editor styles

/**
 * Adds custom classes to the array of body classes.
 */


function flatsome_body_classes( $classes ) {
	global $flatsome_opt;
	// add antialias to all texts 
	$classes[] = 'antialiased';

	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// adds dark header class
	if($flatsome_opt['header_color'] == 'dark'){
		$classes[] = 'dark-header';
	}

	// add stikcy header class
	if($flatsome_opt['header_sticky'] && !isset($_GET["shortcode"])){
		$classes[] = 'sticky_header';
	}	

	if($flatsome_opt['breadcrumb_size']){
		$classes[] = $flatsome_opt['breadcrumb_size'];
	}	
	
	// add logo-center class
	if($flatsome_opt['logo_position'] == 'center'){
		$classes[] = 'logo-center';
	}

	if($flatsome_opt['catalog_mode_prices']){
		$classes[] = 'no-prices';
	}

	// add boxed layout class if selected
	if($flatsome_opt['body_layout']){
		$classes[] = $flatsome_opt['body_layout'];
	}

	if($flatsome_opt['body_layout'] == "framed-layout"){
		$classes[] = "boxed";
	}

	// add background settings
	if($flatsome_opt['body_bg_image']){
		$classes[] = $flatsome_opt['body_bg_type'];
	}

	return $classes;
}
add_filter( 'body_class', 'flatsome_body_classes' );


/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function flatsome_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'flatsome_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function flatsome_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'flatsome' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'flatsome_wp_title', 10, 2 );




/* ADD CUSTOM META BOX TO CATEGORY PAGES */
if(function_exists('get_term_meta')){
function pippin_taxonomy_edit_meta_field($term) {
	// put the term ID into a variable
	$t_id = $term->term_id;
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_term_meta($t_id,'cat_meta');
	if(!$term_meta){$term_meta = add_term_meta($t_id, 'cat_meta', '');}
	 ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[cat_header]"><?php _e( 'Top Content', 'pippin' ); ?></label></th>
		<td>				
				<?php 

				$content = esc_attr( $term_meta[0]['cat_header'] ) ? esc_attr( $term_meta[0]['cat_header'] ) : ''; 
				echo '<textarea id="term_meta[cat_header]" name="term_meta[cat_header]">'.$content.'</textarea>'; ?>
			<p class="description"><?php _e( 'Enter a value for this field. Shortcodes are allowed. This will be displayed at top of the category.','pippin' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product_cat_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2 );


/* SAVE CUSTOM META*/
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_term_meta($t_id,'cat_meta');
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_term_meta($term_id, 'cat_meta', $term_meta);

	}
}  
add_action( 'edited_product_cat', 'save_taxonomy_custom_meta', 10, 2 );  
}





/* EXTRA EDITOR STYLES (add extra styles to the content editor box) */
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}


add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );
function my_mce_before_init( $settings ) {

    $style_formats = array(

    	  array(
          'title' => 'Paragraph - Lead',
          'selector' => 'p',
          'classes' => 'lead',
  
        ),

    	  array(
          'title' => 'Paragraph - Lead, Centered',
          'selector' => 'p',
          'classes' => 'lead text-center',
  
        ),

         array(
          'title' => 'Uppercase',
          'selector' => '*',
          'classes' => 'uppercase',
  
        ),
         array(
          'title' => 'Thin Font',
          'selector' => '*',
          'classes' => 'thin-font',
        ),

        array(
          'title' => 'Alternative Font',
          'selector' => '*',
          'classes' => 'alt-font',
  
        ),

        array(
          'title' => 'Title - Large',
          'selector' => '*',
          'classes' => 'h-large',
  
        ),

         array(
          'title' => 'Title - X-Large',
          'selector' => '*',
          'classes' => 'h-xlarge',
  
        ),

        array(
          'title' => 'Backgroud - Black',
          'selector' => '*',
          'classes' => 'text-box-dark',
  
        ),

        array(
          'title' => 'Background - White',
          'selector' => '*',
          'classes' => 'text-box-light',
  
        ),

         array(
          'title' => 'Background - Primary Color',
          'selector' => '*',
          'classes' => 'text-box-primary',
  
        ),

          array(
          'title' => 'Text Border White',
          'selector' => '*',
          'classes' => 'text-bordered-white',
  
        ),
          array(
          'title' => 'Text Border Primary',
          'selector' => '*',
          'classes' => 'text-bordered-primary',
  
        ),
          array(
          'title' => 'Text Border Dark',
          'selector' => '*',
          'classes' => 'text-bordered-dark',
  
        ),
        array(
          'title' => 'Text shadow',
          'selector' => '*',
          'classes' => 'drop-shadow',
  
        ),


          array(
          'title' => 'Animate -Fade In',
          'selector' => '*',
          'classes' => 'animated fadeIn',
  
        ),

        array(
          'title' => 'Animate - Fade In Left',
          'selector' => '*',
          'classes' => 'animated fadeInLeft',
  
        ),
        array(
          'title' => 'Animate - Fade In Right',
          'selector' => '*',
          'classes' => 'animated fadeInRight',
  
        ),

    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

function add_my_editor_style() {
  add_editor_style();
}
add_action( 'admin_init', 'add_my_editor_style' );



/* Add HTML after Short description */
if($flatsome_opt['html_before_add_to_cart']){
	function before_add_to_cart_html(){
		global $flatsome_opt;
		echo do_shortcode($flatsome_opt['html_before_add_to_cart']);
	}
	add_action( 'woocommerce_single_product_summary', 'before_add_to_cart_html', 20);

}

if($flatsome_opt['html_after_add_to_cart']){
	function after_add_to_cart_html(){
		global $flatsome_opt;
		echo do_shortcode($flatsome_opt['html_after_add_to_cart']);
	}
	add_action( 'woocommerce_single_product_summary', 'after_add_to_cart_html', 30);
}

/* HTML AFTER CART */
if($flatsome_opt['html_cart_footer']){
	function html_cart_footer(){
		global $flatsome_opt;
		echo do_shortcode($flatsome_opt['html_cart_footer']);
	}
	add_action( 'woocommerce_after_cart', 'html_cart_footer', 0);
}


/* SHORTCODE FIX */
function fixShortcode($content){
      $fix = array (
          					    '_____' => '<div class="tx-div large"></div>',
    		                '____' => '<div class="tx-div medium"></div>',
    		                '___' => '<div class="tx-div small"></div>',
                        '<br>' => '', 
                        '<br/>' => '', 
                        '&nbsp;' => '', 
                        '<p>' => '', 
                        '</p>' => '', 
                        '<p></p>' => '', 
                        '<p>[' => '[', 
                        ']</p>' => ']', 
                        ']<br />' => ']',
                        '////' => '<div class="clearfix"></div>',
                        '///' => '<div class="clearfix"></div>',
       );
    $content = strtr($content, $fix);
    echo do_shortcode( $content );
}


/* EDITOR COLORS */
function my_mce4_options( $init ) {
global $flatsome_opt;
$default_colours = '
    "000000", "Black",        "993300", "Burnt orange", "333300", "Dark olive",   "003300", "Dark green",   "003366", "Dark azure",   "000080", "Navy Blue",      "333399", "Indigo",       "333333", "Very dark gray", 
    "800000", "Maroon",       "FF6600", "Orange",       "808000", "Olive",        "008000", "Green",        "008080", "Teal",         "0000FF", "Blue",           "666699", "Grayish blue", "808080", "Gray", 
    "FF0000", "Red",          "FF9900", "Amber",        "99CC00", "Yellow green", "339966", "Sea green",    "33CCCC", "Turquoise",    "3366FF", "Royal blue",     "800080", "Purple",       "999999", "Medium gray", 
    "FF00FF", "Magenta",      "FFCC00", "Gold",         "FFFF00", "Yellow",       "00FF00", "Lime",         "00FFFF", "Aqua",         "00CCFF", "Sky blue",       "993366", "Brown",        "C0C0C0", "Silver", 
    "FF99CC", "Pink",         "FFCC99", "Peach",        "FFFF99", "Light yellow", "CCFFCC", "Pale green",   "CCFFFF", "Pale cyan",    "99CCFF", "Light sky blue", "CC99FF", "Plum",         "FFFFFF", "White"
';
$custom_colours = '
    "e14d43", "Primary Color", "d83131", "Color 2 Name", "ed1c24", "Color 3 Name", "f99b1c", "Color 4 Name", "50b848", "Color 5 Name", "00a859", "Color 6 Name",   "00aae7", "Color 7 Name", "282828", "Color 8 Name"
';
$init['textcolor_map'] = '['.$custom_colours.','.$default_colours.']';
return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

/* Facebook meta tags */
if($flatsome_opt['facebook_meta'] && !is_home()) {
function share_meta_head() {
	global $post; ?>
  	<!-- Facebook Share Meta -->
	<meta property="og:title" content="<?php the_title(); ?>" />
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<meta property="og:image" content="<?php echo $image[0]; ?>" />
	<?php endif; ?>
	<meta property="og:url" content="<?php the_permalink(); ?>" />
<?php 
}
add_action('wp_head', 'share_meta_head');
}

/* Shorter exerpt */
function short_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
}

/* HEX TO RGB */
function hex2rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';
	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
        //Return rgb(a) color string
        return $output;
}


/* AJAX FIX */
add_filter('sod_ajax_layered_nav_product_container', 'ux_product_container');
function ux_product_container($product_container){
//Enter either the class or id of the container that holds your products
return 'ul.products';
}