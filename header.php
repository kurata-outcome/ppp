<?php
	global $post;
	$template_uri = get_template_directory_uri();
	$pfx_title = get_field( 'page_title_prefix', 'option' );
	$slug = get_post_field( 'post_name', get_post() );
	$page_title = empty($post) ? (empty($slug) ? 'ページ' : $slug) : $post->post_title;
	$title = ( empty($pfx_title) ? (get_bloginfo('name') . '：') : $pfx_title ) .
		( empty($page_title) ? '' : $page_title );

	$fontawesome_link = '';
	$fontawesome_url = get_field('fontawesome_url', 'options');
	$fontawesome_sum = get_field('fontawesome_sum', 'options');
	$fontawesome_crs = get_field('fontawesome_crs', 'options');
	if ( ! empty($fontawesome_url) ) {
		$fontawesome_link = '<link rel="stylesheet" href="' . $fontawesome_url . '"';
		if ( ! empty($fontawesome_sum) ) {
			$fontawesome_link .= ' integrity="' . $fontawesome_sum . '"';
		}
		if ( ! empty($fontawesome_crs) ) {
			$fontawesome_link .= ' crossorigin="' . $fontawesome_crs . '"';
		}
		$fontawesome_link .= '>';
	}
?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	

<?php
	if ( ! empty($fontawesome_link) ) {
		echo $fontawesome_link;
	}

	wp_head();
?>
<link rel="stylesheet" href="https://use.typekit.net/jbv2ozs.css">
<script>
  (function(d) {
    var config = {
      kitId: 'tqs7jja',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
	<div class="desktop-menu py-4 d-flex justify-content-end justify-content-xl-center align-items-center">
<?php
	$main_menu_args = array(
		'theme_location' => 'primary',
		'menu_id'        => 'primary',
		'menu_class'	=>	'd-none d-xl-flex justify-content-center align-items-center list-unset',
		'container'      => false,
	);
	wp_nav_menu( $main_menu_args );
?>
		<div class="burger-icon d-flex d-xl-none">
			<div class="burger-line burger-line-1"></div>
			<div class="burger-line burger-line-2"></div>
			<div class="burger-line burger-line-3"></div>
		</div>
	</div>
	<div class="mobile-menu-container">
<?php
	$mobile_menu_args = array(
		'theme_location' => 'primary',
		'menu_id'        => 'mobile-menu',
		'menu_class'	=>	'mobile-menu list-unset',
		'container'      => false,
	);
	wp_nav_menu( $mobile_menu_args );
?>
	</div>
</header>