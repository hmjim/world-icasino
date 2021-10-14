<?php get_header(); ?>
<?php the_post(); ?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="main post-content">

				<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
			</div>

			<?php get_sidebar( 'slots' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
