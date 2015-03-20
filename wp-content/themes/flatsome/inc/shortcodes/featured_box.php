<?php 
// [featured_box]
function featured_box($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		'title' => '',
		'title_small' => '',
		'img'  => '',
		'img_width' => '',
        'pos' => '',
        'link' => '',
        'tooltip' => '',
 	), $atts));
	ob_start();
	?>

	<div class="featured-box <?php if($pos) echo 'pos-'.$pos; ?>  <?php if($tooltip){echo 'tip-top';} ?>" title="<?php echo $tooltip; ?>">
	<div class="box-inner">
	<?php if($link) { echo '<a href="'.$link.'">'; } ?>
	<?php if($img) { ?><img class="featured-img" src="<?php echo $img; ?>" alt="<?php echo $title; ?>" style="<?php if($img_width){echo 'max-width:'.$img_width;} ;?>"><?php } ?>
	<?php if($link) { echo '</a>'; } ?>
	<?php if($link) { echo '<a href="'.$link.'">'; } ?>
    <h4><?php echo $title; ?> <span><?php echo $title_small; ?> </span></h4>
    <?php if($link) { echo '</a>'; } ?>
    <p><?php echo fixShortcode( $content ); ?></p>
	</div>
	</div>
	
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}


add_shortcode("featured_box", "featured_box");
