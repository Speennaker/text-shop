<?php

get_header(); ?>

<div  class="page-wrapper page-left-sidebar page-featured-item">
<div class="row">

<div id="content" class="large-3 columns left" role="main">
<header class="entry-header">
	<div class="featured_item_cats">
		<?php echo get_the_term_list( get_the_ID(), 'featured_item_category', '', ', ', '' ); ?> 
	</div>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<div class="tx-div small"></div>
</header><!-- .entry-header -->

<div class="entry-summary">
		<?php the_excerpt();?>
		
		<?php echo do_shortcode('[share]')?>
	
	    <?php if(get_the_term_list( get_the_ID(), 'featured_item_tag')) { ?> 
	    <div class="item-tags">
	    		<span>Tags:</span><?php echo strip_tags (get_the_term_list( get_the_ID(), 'featured_item_tag', '', ' / ', '' )); ?>
	    </div>
	    <?php } ?>

</div><!-- .entry-summary -->

</div><!-- #content -->

<div  class="large-9 right columns" >
<div class="page-inner">
		<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
</div><!-- .page-inner -->
</div><!-- .#content large-9 left -->

</div><!-- .row -->
</div><!-- -page-right-sidebar .container -->


<?php 
// RELATED SLIDER
global $flatsome_opt;
$cat = get_the_terms( get_the_ID(), 'featured_item_category', '', ', ', '' );
if($flatsome_opt['featured_items_related'] == 'style1') {
	echo do_shortcode('[featured_items_slider style="1" height="'.$flatsome_opt['featured_items_related_height'].'" cat="'.current($cat)->slug.'"]');
} elseif($flatsome_opt['featured_items_related'] == 'style2') {
	echo do_shortcode('[featured_items_slider style="2" height="'.$flatsome_opt['featured_items_related_height'].'" cat="'.current($cat)->slug.'"]');
}
?>

<?php get_footer(); ?>