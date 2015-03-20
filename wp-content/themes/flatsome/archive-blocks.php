<?php
// TEMPLATE USED TO PREVIEW BLOCKS

global $woo_options;
global $woocommerce;
global $flatsome_opt;
global $page;
if ( !current_user_can( 'manage_options' ) ) die;
?>

<!--[if lte IE 9 ]><html class="ie lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<style>
	.blocks-cats li{float:left;margin-right: 10px;}
	.blocks-cats a{padding:3px 10px;-webkit-border-radius: 99px;
-moz-border-radius: 99px; text-transform: uppercase;
font-size: 13px;
border-radius: 99px;}
	.blocks-cats a.current{background: #888;color:#FFF;}
	</style>
</head>

<body style="background-color:#FFF!important;">
<div style="position:fixed;top:30px;left:0;right:0;padding:10px;background-color:#eee;z-index:99">
<?php
//list terms in a given taxonomy (useful as a widget for twentyten)
$taxonomy = 'block_categories';
$tax_terms = get_terms($taxonomy);
?>
<ul class="blocks-cats">
<?php
foreach ($tax_terms as $tax_term) {
$cur_class = '';
if(isset($_GET["cat"])){
if($tax_term->slug == $_GET["cat"]) {$cur_class = 'current';}
}
echo '<li><a href="?cat='.$tax_term->slug.'" class="'.$cur_class.'">'.$tax_term->name.'</a></li>';
}
?>
</div><!-- .header-wrapper -->

	<div id="primary" class="content-area" style="padding-bottom:50px;padding-top:60px;background:#ccc;">
		<div id="content" class="site-content" role="main">
				<?php
				if(isset($_GET["cat"])){ $cat = $_GET["cat"];
				} else {$cat = '';}
 
				$wp_query = new WP_Query(array(
					'post_type' => 'blocks',
					'orderby'=> 'menu_order',
					'tax_query' => array(
					array(
						'taxonomy' => 'block_categories',
						'field' => 'slug',
						'terms' => $cat,
					)
				)
				));
				while ($wp_query->have_posts()) : $wp_query->the_post();
				$post_data = get_post(get_the_ID(), ARRAY_A);
	 			 $slug = $post_data['post_name'];
				?>

				<div class="block-shortcode" style="margin:30px auto; border-bottom:10px solid #ccc;max-width: 70.5em; background:#FFF;">
				<div class="block-title" style="background:#f1f1f1;padding:15px;margin-bottom:40px;">
						<a href="<?php echo get_edit_post_link();?>"><?php echo the_title(); ?></a><span class="right">[block id="<?php echo $slug; ?>"]</span> 
				</div>

					<?php the_content(); ?>

				<?php  
				 
	             ?>
	           
				</div>

				<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php wp_footer(); ?>

</body>
</html>
