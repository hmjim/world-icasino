<?php $features = get_field( 'features', 'options' ); ?>
<?php if ( $features ) : ?>
	<div class="section section-features">
		<div class="container">
			<div class="row">
				<?php foreach ( $features as $f ) : ?>
					<div class="features-item">
						<div class="features-icon">
							<?php $thumb = get_post( $f['icon'] ); ?>
							<img src="<?= kama_thumb_src( 'w=100 &h=100', $f['icon'] ); ?>"
							     title="<?= $thumb->post_title; ?>"
							     alt="<?= get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true ); ?>">
						</div>
						<div class="features-text">
							<div class="features-title"><?= $f['title']; ?></div>
							<div class="features-descr"><?= $f['descr']; ?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
