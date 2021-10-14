<?php get_header(); ?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="main">

				<h1 class="page-title"><?php printf( 'Поиск по строке: %s', get_search_query() ); ?></h1>

				<div class="row top-cas top-cas-search">
					<?php
					$cpts = [ 'casino', 'post', 'news' ];
					if ( have_posts() ) :
						foreach ( $cpts as $cpt ) :
							while ( have_posts() ) : the_post();
								if ( $cpt == get_post_type() ) : ?>
									<?php get_template_part( 'template-parts/loop', $cpt ); ?>
								<?php endif;
							endwhile;
							rewind_posts();
						endforeach;
					else : ?>
						<div class="item">
							<?php get_template_part( 'template-parts/loop', 'none' );; ?>
						</div>
					<?php
					endif;
					?>
				</div>
			</div>

			<?php get_sidebar( 'slots' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>


