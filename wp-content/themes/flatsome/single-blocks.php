<?php
/**
 * The Template for previwing blocks
 *
 * @package flatsome
 */

global $woo_options;
global $woocommerce;
global $flatsome_opt;
show_admin_bar(false);
if ( !current_user_can( 'manage_options' ) ) die;
?>
<!DOCTYPE html>
<!--[if lte IE 9 ]><html class="ie lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> style="margin-top:0!important"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body style="background-color:#FFF;">
	<div id="primary" class="content-area" style="padding-bottom:50px;">
		<div id="content" class="site-content" role="main">
	
		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->

	<?php
	 $post_data = get_post(get_the_ID(), ARRAY_A);
	 $slug = $post_data['post_name']; ?>
	 	<div style="position:fixed;bottom:0;left:0;right:0;background:#FFF;border-top:1px solid #eee;padding:10px;text-align:center;color:#555;z-index:999;opacity:0.8">
		<span style="font-weight:bold;color:#666;"> [block id="<?php echo $slug; ?>'"]</span></div>
	 <?php
	?>
<?php wp_footer(); ?>

</body>
</html>