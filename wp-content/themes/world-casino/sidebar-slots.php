<div class="sidebar">

	<?php
	$casino_top = get_field( 'casino_rating', 'options' );
	if ( $casino_top ) : ?>
		<div class="widget-casino">

			<div class="widget-title">Рейтинг казино</div>

			<div class="widget-content">
				<?php foreach ( $casino_top as $casino ) : ?>
					<?php
					$casino_id     = $casino['casino'];
					$casino_link   = get_post_permalink( $casino_id );
					$casino_thumb  = get_post( get_post_thumbnail_id( $casino_id ) );
					?>

					<div class="widget-casino-item">
						<div class="widget-casino-item-pos">
							<div class="widget-casino-item-label"><span></span></div>
						</div>

						<a href="<?= $casino_link; ?>" class="widget-casino-img">
							<img src="<?= kama_thumb_src( 'w=230 &h=140', $casino_thumb->guid ); ?>"
							     title="<?= $casino_thumb->post_title; ?>"
							     alt="<?= get_post_meta( $casino_thumb->ID, '_wp_attachment_image_alt', true ); ?>">
						</a>

						<div class="widget-casino-nav">
							<a href="<?= $casino_link; ?>" class="btn btn-border">Обзор</a>
							<a href="<?= get_field( 'link', $casino_id ); ?>" class="btn btn-site" title="Играть в казино" target="_blank">Сайт</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	<?php endif; ?>

	<?php
	$news_posts = get_posts( [
		'numberposts' => 6,
		'post_type'   => 'news'
	] );
	if ( $news_posts ) : ?>
		<div class="widget-news">
			<div class="widget-title">Новости</div>

			<div class="widget-content">
				<?php foreach ( $news_posts as $post ) : ?>
					<?php setup_postdata( $post ); ?>
					<div class="widget-news-item">
						<div class="widget-news-date"><?php echo get_the_date( 'd F Y' ); ?></div>
						<div class="widget-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata() ?>
				<div class="widget-news-item widget-news-item-last"><a href="/news/" class="btn btn-more">Все новости</a></div>
			</div>
		</div>
	<?php endif; ?>

</div>
