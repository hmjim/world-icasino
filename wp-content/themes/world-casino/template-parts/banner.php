<?php
$slider = get_field( 'slider' );
?>
<?php if ( $slider ) : ?>
	<div class="slider">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php foreach ( $slider as $slide ) : ?>
						<?php
						$slide_text      = $slide['slider_text'];
						$slide_img       = $slide['slider_img'];
						$slide_btn       = $slide['slider_btn'];
						$slide_color_btn = $slide['color_btn'];
						?>
						<div class="swiper-slide">
							<div class="slide" style="background-image: url(<?= $slide_img; ?>);">
								<div class="slide-text"><?= $slide_text; ?></div>
								<?= get_field_link( $slide_btn, 'btn btn-' . $slide_color_btn ); ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="slider-pagination"></div>
			</div>
	</div>
<?php endif; ?>
