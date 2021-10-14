<div class="row slots-loop">

	<?php if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/loop' );
		endwhile;
	else :
		get_template_part( 'template-parts/loop-none' );
	endif; ?>

</div>

<?php if ( function_exists( 'pagination' ) ) {
	pagination();
} ?>
