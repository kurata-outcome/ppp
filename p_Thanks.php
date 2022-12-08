<?php 
	/* Template Name: Thankyou */
	get_header();
	$template_uri = get_template_directory_uri();
?>

<div class="header-space"></div>
<section class="section-thanks section-padding">
	<div class="container">
		
		<div class="cover-button text-center">
			<h2 class="font-tsu-b txt-lbrown text-center">お問い合わせありがとうございました。</h2>
			<div class="section-btn mt-5 d-flex justify-content-center align-items-center">
			<a class="btn-flower" href="<?php echo get_home_url(); ?>">
				<span class="txt-pink d-flex justify-content-center align-items-center">トップページへ</span>
			</a>
			</div>
		</div>

	</div>
</section>
<?php 
	get_footer();
?>