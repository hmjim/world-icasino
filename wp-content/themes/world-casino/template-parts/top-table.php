<?php $casino_top = get_field( 'casino_rating', 'options' ); ?>
<?php if ( $casino_top ) : ?>
	<div class="top-cas">
		<?php foreach ( $casino_top as $casino ) : ?>
			<?php
			$post = get_post( $casino['casino'] );
			setup_postdata( $post );
			get_template_part( 'template-parts/loop-casino' );
			?>
		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php endif; ?>
