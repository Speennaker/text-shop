<?php
/* Registrer post menu */
register_post_type('blocks', array(  'menu_icon' => 'dashicons-tagcloud',
  'label' => 'Blocks','description' => 'Create blocks that can be used in posts, pages and widgets.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'page','hierarchical' => true,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => true,'supports' => array('title','editor','custom-fields','revisions','author','thumbnail'),'labels' => array (
  'name' => 'Blocks',
  'singular_name' => 'Block',
  'menu_name' => 'Blocks',
  'add_new' => 'Add block',
  'add_new_item' => 'Add New block',
  'edit' => 'Edit',
  'edit_item' => 'Edit block',
  'new_item' => 'New block',
  'view' => 'View block',
  'view_item' => 'View block',
  'search_items' => 'Search Blocks',
  'not_found' => 'No Blocks Found',
  'not_found_in_trash' => 'No Blocks Found in Trash',
  'parent' => 'Parent block',
),) );



add_filter( 'manage_edit-blocks_columns', 'my_edit_blocks_columns' ) ;

function my_edit_blocks_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',

		'title' => __( 'Title' ),
         'quick_preview' => __( 'Preview' ),

		'shortcode' => __( 'Shortcode' ),
   
		'date' => __( 'Date' ),
	);

	return $columns;
}

add_action( 'manage_blocks_posts_custom_column', 'my_manage_blocks_columns', 10, 2 );
function my_manage_blocks_columns( $column, $post_id ) {
	global $post;
	 $post_data = get_post($post_id, ARRAY_A);
	 $slug = $post_data['post_name'];
   add_thickbox();
	switch( $column ) {
		case 'shortcode' :
			echo '<span style="background:#eee;font-weight:bold;"> [block id="'.$slug.'"] </span>';
		break;
    case 'quick_preview' :
      echo '<a title="'.get_the_title().'" href="'.get_the_permalink().'?preview&TB_iframe=true&width=1100&height=600" rel="logos1" class="thickbox button">+ Quick Preview</a>';
    break;
	}
}

// UPDATE BLOCK PREVIEW URL
function ux_block_scripts() {
	global $typenow;
    if( 'blocks' == $typenow && isset($_GET["post"])){
    ?>
    <script>
    	jQuery( document ).ready(function($) {
    		var preview_url = $('input[value="preview_url"]').parent().parent().find('textarea').val();
    		var preview_title = $('input[value="preview_title"]').parent().parent().find('textarea').val();
        var block_id = $('input#post_name').val();
        $('#submitdiv').after('<div class="postbox"><div class="inside"><p>Shortcode:<br> <b>[block id="'+block_id+'"]</b></p></div></div>');
    		if(preview_url){
	    		$('#view-post-btn a').attr('href',preview_url+'?block=block-'+block_id);
	    		$('#view-post-btn a').html('View block in <b>'+preview_title+'</b>');
	    		$('#edit-slug-box a[href="#"]').remove();
    		}
		});
    </script>
    <?php
    }
    if (isset($_GET["preview_url"])) { 
  	$permalink = get_the_permalink($_GET["preview_url"]);
  	$preview_title = get_the_title($_GET["preview_url"]);
 		add_post_meta( $_GET["post"], 'preview_url', $permalink , true ) || update_post_meta( $_GET["post"], 'preview_url', $permalink );
 		add_post_meta( $_GET["post"], 'preview_title', $preview_title , true ) || update_post_meta( $_GET["post"], 'preview_title', $preview_title );
    }
    
}
add_action( 'admin_head', 'ux_block_scripts' );

function ux_block_frontend() {
	if(isset($_GET["block"])){
    ?>
    <script>
    	jQuery( document ).ready(function($) {
    		 $.scrollTo('#<?php echo $_GET["block"];?>',300,{offset:-200});
    	});
    </script>
    <?php
    }
}
add_action( 'wp_footer', 'ux_block_frontend');


/* ADD SHORTCODE */
// [block id=""]
function block_shortcode($atts, $content = null) {	
	 extract( shortcode_atts( array(
    	'id' => ''
  	 ), $atts ) );
  	global $post;
	// get content by slug
	global $wpdb;
	$post_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$id'");
	if($post_id){
		$html =	get_post_field('post_content', $post_id);

		// add edit link for admins
		if (current_user_can('edit_posts')) {
		   $edit_link = get_edit_post_link( $post_id ); 
	 	   $html = '<div id="block-'.$id.'" class="ux_block"><a class="edit-link" href="'.$edit_link.'&preview_url='.$post->ID.'">Edit Block</a>'.$html.'</div>';
		}

		$html = do_shortcode( $html );

	} else{
		
		$html = '<p><mark>UX Block <b>"'.$id.'"</b> not found! Wrong ID?</mark></p>';	
	
	}

	return $html;
}
add_shortcode('block', 'block_shortcode');


/* ADD CATEGOIRES SUPPORT */
if ( ! function_exists( 'blocks_categories' ) ) {

// Register Custom Taxonomy
function blocks_categories() {
  $args = array(
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_in_nav_menus'          => true,
  );
  register_taxonomy( 'block_categories', array( 'blocks' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'blocks_categories', 0 );
}