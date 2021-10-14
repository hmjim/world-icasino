<?php get_header(); ?>
<?php the_post(); ?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<div class="section section-slots-single">
	<div class="container">
		<div class="post">
			<div class="row">
				<div class="main">
					<h1>Игровой автомат <?php the_title(); ?> на деньги</h1>

					<?php the_field( 'seo_text' ); ?>

					<div class="main-game-frame">
						<div class="main-game-frame-box">
							<iframe src="<?php the_field( 'iframe' ) ?>" width="100%" height="477"></iframe>

							<div class="game-frame-nav">
								<a href="#popup" class="game-frame-nav-feedback open-popup"><i class="fas fa-exclamation-triangle"></i></a>

								<div class="game-frame-nav-rating">
									<div class="game-frame-nav-rating-title">Оценить слот</div>
									<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
								</div>

								<div class="game-frame-nav-maximize btn-maximize"></div>
							</div>
						</div>
						<a href="/gotocas/slots" class="btn btn-orange btn-fullwidth" target="_blank"><span>Играть на деньги</span></a>
					</div>

					<div class="post-content content">
						<?php the_content(); ?>
					</div>
				</div>

				<?php get_sidebar( 'slots-single' ); ?>
			</div>
		</div>

	</div>
</div>

<?php
$casino_top = get_field( 'casino_rating', 'options' );
$i = 1;
?>
<?php if ( $casino_top ) : ?>
	<div class="section">
		<div class="container">
			<div class="section-header">
				<?php $title = get_field( 'single_rating_title', 'options' ); ?>
				<?php if ( $title ) : ?>
					<h2><?= $title; ?></h2>
				<?php endif; ?>

				<a href="/" class="btn btn-more">Полный рейтинг</a>
			</div>

			<div class="row top-cas">
				<?php foreach ( $casino_top as $casino ) : ?>
					<?php
					if ($i===4) break;
					$post = get_post( $casino['casino'] );
					setup_postdata( $post );
					get_template_part( 'template-parts/loop-casino' );
					?>
					<?php $i++; ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_template_part( 'template-parts/features' ); ?>

<div id="popup" class="popup mfp-hide">
	<div class="popup-title">Произошла ошибка?</div>
	<div class="popup-descr">сообщите нам и мы постараемся все исправить</div>
	<?= do_shortcode('[contact-form-7 id="142" title="Контактная форма"]'); ?>
</div>

<?php get_footer(); ?>
