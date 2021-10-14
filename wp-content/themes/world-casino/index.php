<?php get_header(); ?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<div class="section section-slots">
	<div class="container">
		<div class="row">

			<div class="main">
				<h1><?php the_field( 'page_slots_title', 'options' ); ?></h1>

				<div class="post-content"><?php the_field( 'page_slots_text', 'options' ); ?></div>

				<?php get_template_part( 'template-parts/section-posts' ); ?>
			</div>

			<?php get_sidebar( 'slots' ); ?>

		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/anchor-menu' ); ?>

<?php get_template_part( 'template-parts/features' ); ?>

<?php get_footer(); ?>
