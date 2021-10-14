<a href="#0" class="btn-top"></a>

<footer id="footer" class="footer">
	<div class="container">
		<div class="footer-top">
			<div class="row">
				<a href="/" class="logo"><img src="<?= THEME_IMG; ?>logo-footer.png" alt="World iCasino"></a>

				<nav class="footer-menu">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'bottom',
							'container'      => false
						)
					); ?>
				</nav>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="copy">© <?= date('Y'); ?> <?= $_SERVER['SERVER_NAME']; ?> | <span>Все права защищены</span></div>
			<div class="limit">Для лиц старше 18 лет</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

