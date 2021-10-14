<?php
$thumb     = get_post( get_post_thumbnail_id() );
$image_alt = get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true );
$link = get_field('home_link') ? get_field('home_link') : get_field('game_link_default', 'options');
?>
<div class="item item-slot-wrap">
	<div class="item-slot">
		<div class="item-slot-icon">
			<img src="<?= kama_thumb_src( "w=290 &h=186", get_post_thumbnail_id() ); ?>" title="<?php echo $thumb->post_title; ?>" alt="<?php echo $thumb->post_title; ?>">

			<div class="item-slot-btns">
				<a href="<?php the_permalink(); ?>" class="btn btn-border">Бесплатно</a>
				<a href="<?= $link; ?>" class="btn btn-site">На деньги</a>
			</div>
		</div>
		<div class="item-slot-title">
			<div class="item-slot-text"><?php the_title(); ?></div>
			<a href="<?php the_permalink(); ?>" class="item-slot-demo">Demo</a>
		</div>
	</div>
</div>


