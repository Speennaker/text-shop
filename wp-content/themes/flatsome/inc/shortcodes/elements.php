<?php
// [ux_price_table]
// [hotspot]


// [ux_price_table]
function ux_price_table( $atts, $content = null ){
  extract( shortcode_atts( array(
    'title' => 'Title',
    'price' => '$99.99',
    'description' => 'Description',
    'button_style' => 'small alt-button',
    'button_text' => 'Buy Now',
    'button_link' => '',
    'featured' => 'false',
  ), $atts ) );
  ob_start();
?>

<div class="ux_price_table text-center">
<ul class="pricing-table">
  <li class="title"><?php echo $title;?></li>
  <li class="price"><?php echo $price;?></li>
  <li class="description"><?php echo $description;?></li>
  <?php fixShortcode($content); ?>
  <li class="cta-button"><a class="button <?php echo $button_style;?>" href="<?php echo $button_link;?>"><?php echo $button_text;?></a></li>
</ul>
</div>

<?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
add_shortcode('ux_price_table', 'ux_price_table');

// Price bullet 
function bullet_item( $atts, $content = null ){
  extract( shortcode_atts( array(
    'text' => 'Title',
    'icon' => '',
  ), $atts ) );
    $content = '<li class="bullet-item">'.$text.'</li>';
    return $content;
}
add_shortcode('bullet_item', 'bullet_item');



// [hotspot]
function ux_hotspot($atts, $content = null) {
  extract(shortcode_atts(array(
    'product_id'  => '',
    'color' => '',
    'lightbox' => 'true',
      'show_text' => 'false',
      'style' => '1',
      'font_size' => ''
  ), $atts));
  ob_start();
  ?>
    
    <?php 
  /**
  * Check if WooCommerce is active
  **/
  if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  global $woocommerce, $product;
  $product = get_product($product_id);
  ?>
  
  <?php if($style == '1'){ ?>
  <span class="ux_hotspot <?php if($lightbox == 'true') {echo 'open-quickview';} ?> tip-top" title="<?php echo esc_html($product->get_title());
?> / <b><?php echo esc_html($product->get_price_html());
?></b>" data-prod="<?php echo $product_id;?>" style="<?php if($color){ echo 'background-color:'.$color; } ?>">
<?php if($lightbox == 'false')  {echo '<a href="'.$product->get_permalink().'">';} ?>
  <span class="icon-plus"></span>
  <?php if($lightbox == 'false')  {echo '</a>';} ?>
  </span>


  <?php } elseif($style == '2'){ ?>
  <?php if($lightbox == 'false')  {echo '<a href="'.$product->get_permalink().'">';} ?>
  <span class="ux_hotspot_text <?php if($lightbox == 'true') {echo 'open-quickview';} ?>" data-prod="<?php echo $product_id;?>"  style="<?php if($color){ echo 'color:'.$color; } ?>  <?php if($font_size )  {echo 'font-size:'.$font_size.';';} ?>">
    <span class="prod-title"><?php echo $product->get_title();?></span>
    <span class="prod-price"><?php echo $product->get_price_html();?></span>
  </span>
  <?php if($lightbox == 'false')  {echo '</a>';} ?>
  <?php } ?>

    <?php } else {echo 'WooCommerce not installed';} ?>

  <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

add_shortcode("hotspot", "ux_hotspot");



//  [scroll_to link="#this" bullet="true" bullet_title="Scroll to This"]
function ux_scroll_to($atts, $content = null) {
  extract(shortcode_atts(array(
    'link'  => '#',
    'bullet' => 'true',
    'title' => 'Scroll to this',
  ), $atts));
  ob_start();
  ?>
  <div class="scroll-to" data-link="<?php echo $link ?>" data-bullet="<?php echo $bullet ?>" data-title="<?php echo $title; ?>"></div>
  <?php 
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

add_shortcode("scroll_to", "ux_scroll_to");