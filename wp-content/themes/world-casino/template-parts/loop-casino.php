<div class="item item-cas-wrap">
	<div class="item-cas">
		<div class="item-cas-pos">
			<div class="item-cas-label"><span></span></div>
		</div>
		<div class="item-cas-logo">
			<a href="<?php the_permalink(); ?>" class="c-logo-img">
				<?php $casino_thumb = get_post( get_post_thumbnail_id() ); ?>
				<img src="<?= kama_thumb_src( 'w=210 &h=130', $casino_thumb->guid ); ?>"
				     title="<?= $casino_thumb->post_title; ?>"
				     alt="<?= get_post_meta( $casino_thumb->ID, '_wp_attachment_image_alt', true ); ?>">
			</a>
		</div>
		<div class="item-cas-features">
			<div class="item-cas-rating">
				<div class="item-cas-icon icon-rating"><?php the_field( 'rating' ); ?></div>
				<div class="item-cas-text">отзывов</div>
			</div>
			<div class="item-cas-bonus">
				<div class="item-cas-icon icon-bonus"><?php the_field( 'bonus' ); ?></div>
				<div class="item-cas-text">бонус</div>
			</div>
			<div class="item-cas-slots">
				<div class="item-cas-icon icon-slots"><?php the_field( 'slots' ); ?></div>
				<div class="item-cas-text">слотов</div>
			</div>
		</div>
		<div class="item-cas-nav">
			<a href="<?php the_permalink(); ?>" class="btn btn-border" title="Обзор казино и отзывы">Обзор</a>
			<a href="<?php the_field( 'link' ); ?>" class="btn btn-site" title="Перейти и играть на деньги" target="_blank">Сайт</a>
		</div>
	</div>
</div>
