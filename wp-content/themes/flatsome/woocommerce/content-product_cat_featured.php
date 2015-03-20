<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Increase loop count
$woocommerce_loop['loop']++;
$cat_span = '3';
$cat_height = '250px';
$cat_margin = 'margin-bottom:30px;';
if($woocommerce_loop['loop'] == '1'){
	$cat_span = '6';
	$cat_height = '600px';
} 

if($woocommerce_loop['loop'] == '2'){
	$cat_span = '3';
	$cat_height = '600px';
} 

if($woocommerce_loop['loop'] == '3'){
	$cat_span = '3';
	$cat_height = '300px';
	$cat_margin = 'margin-bottom:30px!important;';

} 

if($woocommerce_loop['loop'] == '4'){
	$cat_span = '3';
	$cat_height = '270px';
} 

$idcat = $category->term_taxonomy_id;
$thumbnail_id = get_woocommerce_term_meta( $idcat, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );


?>
<li class="product-category-grid columns large-<?php echo $cat_span;?>" style="float:left;list-style:none;">
<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
<div class="inner">
<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
<div id="banner_1682801308" class="ux_banner  dark hover_fade" style="height:<?php echo $cat_height; ?>; <?php echo $cat_margin; ?> overflow: hidden;">
<div class="banner-bg" style="background-image:url(<?php echo $image; ?>); "></div>
<div class="row">
<div class="inner center  text-center animated" data-animate="fadeIn" style="width: 60%; margin-bottom: -139px;">
<h1 class="uppercase"><?php echo $category->name; ?></h1>
<div class="tx-div small"></div>
<p class="lead uppercase"><?php if ( $category->count > 0 ) echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count">' . $category->count . ' '.__('Products','woocommerce').'</span>', $category); ?></p>
</div>  
</div>     
</div>
	</a>
	</div><!-- .inner -->

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
</li>