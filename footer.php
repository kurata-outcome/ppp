<?php
	$template_uri = get_template_directory_uri();
	get_template_part('template-parts/works', 'section');
?>

<footer class="section-padding">
	<div class="container">
		<div class="desktop-footer d-flex justify-content-between align-items-center">
			<a class="footer-logo">
				<span class="text-white font-smt-ibr font-62">Eriko Tranishi</span>
			</a>
			<ul class="footer-social list-unset d-flex justify-content-end align-items-center">
				<li>
					<a href="#">
						<i class="fab fa-youtube text-white"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fab fa-instagram text-white"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="footer-menu-container mt-5">
<?php
	$footer_menu_args = array(
		'theme_location' => 'secondary',
		'menu_id'        => 'secondary',
		'menu_class'	=>	'footer-menu d-flex justify-content-center align-items-center list-unset',
		'container'      => false
	);
	wp_nav_menu( $footer_menu_args );

	$footer2_menu_args = array(
		'theme_location' => 'footer',
		'menu_id'        => 'footer',
		'menu_class'	=>	'footer-menu2 mt-5 d-flex justify-content-center align-items-center list-unset',
		'container'      => false
	);
	wp_nav_menu( $footer2_menu_args );
?>
		</div>
	</div>
<!--
	This is: <theme>/footer.php
	*** PLACE COMMON FOOTER AND NAVIGATION CODE HERE ***

	$secondary_menu_args = array(
		'theme_location' => 'secondary',
		'menu_id'        => 'secondary',
		'container'      => false
	));
	wp_nav_menu( $secondary_menu_args );

	IF the page being displayed has a Google Map, then include the API...
< ?php
	$slug = get_post_field( 'post_name', get_post() );
	if ( $slug == 'company' ) {
? >
	<script async defer
		src="//maps.googleapis.com/maps/api/js?key=XXXX&callback=google_maps_callback"
		></script>
< ?php
	}
? >
-->
<div class="copyright">
	Copyright © Pink Parl Planning. All rights reserved.
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
