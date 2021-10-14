<div class="section">
	<div class="container">
		<div class="row top-cas">
			<div class="item item-cas-wrap">
				<div class="item-cas item-cas-single">
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
						<div class="item-cas-bonus">
							<div class="item-cas-icon icon-bonus"><?php the_field( 'bonus' ); ?></div>
							<div class="item-cas-text">Бонус на первый депозит</div>
						</div>
					</div>
					<div class="item-cas-nav">
						<a href="<?php the_field( 'link' ); ?>" class="btn btn-orange" target="_blank">Получить бонус</a>
						<a href="/" class="btn-light">вернуться в топ</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
