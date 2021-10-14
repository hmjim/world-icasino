<div class="sidebar">
	<?php global $post;
	$posts = get_posts(
		array(
			'numberposts' => 5,
			'post_type'   => 'post',
			'exclude'     => array( get_the_ID() ),
		)
	);
	?>
	<?php if ( $posts ) : ?>
		<div class="widget-slots">
			<div class="widget-title">Похожие автоматы</div>

			<div class="widget-content">
				<?php foreach ( $posts as $post ) {
					setup_postdata( $post );
					$thumb     = get_post( get_post_thumbnail_id() );
					$image_alt = get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true );
					?>
					<a href="<?php the_permalink(); ?>" class="widget-slot">
						<img src="<?= kama_thumb_src( 'w=93 &h=59' ); ?>" class="widget-slot-img" title="<?= $thumb->post_title; ?>" alt="<?= $image_alt; ?>">
						<span class="widget-slot-title"><?php the_title(); ?></span>
						<span class="widget-slot-btn"></span>
					</a>
				<?php }
				wp_reset_postdata(); ?>
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
