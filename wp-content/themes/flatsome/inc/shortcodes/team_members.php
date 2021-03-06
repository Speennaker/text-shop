<?php 
// [team_member]
function team_member($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"name" => '',
		"title" => '',
		'twitter' => '',
		'facebook' => '',
		'pinterest' => '',
		'instagram' => '',
		'email' => '',
		'img'  => '',
        'pos' => '',
        'linkedin' => ''
	), $atts));
	ob_start();
	?>

	<div class="featured-box team-member text-center <?php if($pos) echo 'pos-'.$pos; ?>">
	<div class="team-member-img">
	<img class="circle" src="<?php echo $img; ?>">
 	</div><!-- .team-member-img -->

    <h4><span><?php echo $name; ?></span></h4>
    <h5><span><?php echo $title; ?></span></h5>
    <div class="tx-div small"></div>

    <div class="social-icons">
    	<?php if($facebook){?> 
    	<a href="<?php echo $facebook; ?>" target="_blank"  class="icon icon_facebook tip-top" title="<?php echo $facebook; ?>"><span class="icon-facebook"></span></a>
		<?php }?>
		<?php if($twitter){?> 
		       <a href="<?php echo $twitter; ?>" target="_blank" class="icon icon_twitter tip-top" title="<?php echo $twitter; ?>"><span class="icon-twitter"></span></a>
		<?php }?>
		<?php if($email){?> 
		       <a href="mailto:<?php echo $email; ?>" target="_blank" class="icon icon_email tip-top" title="<?php echo $email; ?>"><span class="icon-envelop"></span></a>
		<?php }?>
		<?php if($pinterest){?> 
		       <a href="<?php echo $pinterest; ?>" target="_blank" class="icon icon_pintrest tip-top" title="<?php echo $pinterest; ?>"><span class="icon-pinterest"></span></a>
		<?php }?>
		<?php if($instagram){?> 
		       <a href="<?php echo $instagram; ?>" target="_blank" class="icon icon_instagram tip-top" title="<?php echo $instagram; ?>"><span class="icon-instagram"></span></a>
		<?php }?>
		<?php if($linkedin){?> 
		       <a href="<?php echo $linkedin; ?>" target="_blank" class="icon icon_linkedin tip-top" title="<?php echo $linkedin; ?>"><span class="icon-linkedin"></span></a>
		<?php }?>
     </div>
    	
    <p><?php echo $content; ?></p>

	</div>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}


add_shortcode("team_member", "team_member");
