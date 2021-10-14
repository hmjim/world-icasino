<?php
/*
Template Name: Главная
*/
?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/banner' ); ?>

<div class="container">
	<h1><?php the_title(); ?></h1>
</div>

<?php $casino_top = get_field( 'casino_rating', 'options' ); ?>
<?php if ( $casino_top ) : ?>
	<div class="section">
		<div class="container">
			<div class="row top-cas">
				<?php foreach ( $casino_top as $casino ) : ?>
					<?php
					$post = get_post( $casino['casino'] );
					setup_postdata( $post );
					get_template_part( 'template-parts/loop-casino' );
					?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_template_part( 'template-parts/anchor-menu' ); ?>
<?php get_footer(); ?>
