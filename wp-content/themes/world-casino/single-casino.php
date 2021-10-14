<?php get_header(); ?>
<?php the_post(); ?>

<?php
$casino_thumb        = get_post( get_post_thumbnail_id( get_the_ID() ) );
$casino_square_thumb = get_post( get_field( 'logo' ) );
$casino_pays         = get_the_terms( get_the_ID(), 'currency' );
$casino_soft         = get_the_terms( get_the_ID(), 'developer' );
$casino_country      = get_the_terms( get_the_ID(), 'country' );
$casino_rating       = get_field( 'rating' );
$casino_bonus        = get_field( 'bonus' );
$casino_site         = get_field( 'link' );
$casino_mirror       = get_field( 'mirror_link' );
?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<div class="casino-header">
	<div class="container">

		<h1 class="title">Обзор казино <?php the_title(); ?></h1>

		<div class="cas-header">
			<div class="cas-left">
				<div class="cas-thumb">
					<img src="<?= kama_thumb_src( 'w=210 &h=210', get_field( 'logo' ) ); ?>"
					     title="<?= $casino_square_thumb->post_title; ?>"
					     alt="<?= get_post_meta( $casino_square_thumb->ID, '_wp_attachment_image_alt', true ); ?>">
				</div>

				<?php if ($casino_mirror) : ?>
				<a href="<?php echo $casino_mirror; ?>" class="btn btn-border" target="_blank">Зеркало казино</a>
				<?php endif; ?>
				<a href="<?php echo $casino_site; ?>" class="btn btn-site" target="_blank">Сайт казино</a>
			</div>

			<div class="cas-center">
				<div class="cas-features-item soft">
					<div class="cas-features-title">Софт игр:</div>
					<ul>
						<?php foreach ( $casino_soft as $item ): ?>
							<?php $logo = get_field( 'logo', $item ); ?>
							<li><img src="<?= kama_thumb_src( 'w=70 &nocrop=true', $logo['url'] ); ?>" title="<?= $logo['title']; ?>" alt="<?= $logo['title']; ?>"></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="cas-features-item pay">
					<div class="cas-features-title">Способы выплаты:</div>
					<ul>
						<?php foreach ( $casino_pays as $item ): ?>
							<?php $logo = get_field( 'logo', $item ); ?>
							<li><img src="<?= kama_thumb_src( 'w=70 &nocrop=true', $logo['url'] ); ?>" title="<?= $logo['title']; ?>" alt="<?= $logo['title']; ?>"></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="cas-features-item country">
					<div class="cas-features-title">Принимает игроков из:</div>
					<ul>
						<?php foreach ( $casino_country as $item ): ?>
							<?php $logo = get_field( 'logo', $item ); ?>
							<li><img src="<?= kama_thumb_src( 'w=70 &h=45', $logo['url'] ); ?>" title="<?= $logo['title']; ?>" alt="<?= $logo['title']; ?>"></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="cas-right">
				<div class="top-cas-item-rating">
					<div class="top-cas-item-icon icon-rating"><?php the_field( 'rating' ); ?></div>
					<div class="top-cas-item-text">отзывов</div>
				</div>

				<div class="top-cas-item-bonus">
					<div class="top-cas-item-icon icon-bonus"><?php the_field( 'bonus' ); ?></div>
					<div class="top-cas-item-text">бонус</div>
				</div>

				<div class="top-cas-item-slots">
					<div class="top-cas-item-icon icon-slots"><?php the_field( 'slots' ); ?></div>
					<div class="top-cas-item-text">слотов</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php get_template_part( 'template-parts/anchor-menu' ); ?>

<div class="section section-slots-single">
	<div class="container">
		<div class="post-content content"><?php the_content(); ?></div>
	</div>
</div>

<?php get_template_part( 'template-parts/casino-banner' ); ?>

<?php get_template_part( 'template-parts/features' ); ?>

<?php get_footer(); ?>

