<?php get_header(); ?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<div class="section section-slots">
	<div class="container">
		<div class="row">

			<div class="main">
				<h1><?php single_term_title(); ?></h1>

				<?php the_field( 'top_text' ); ?>

				<?php get_template_part( 'template-parts/section-posts' ); ?>
			</div>

			<?php get_sidebar( 'slots' ); ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>
