<?php 
	get_header();
	$template_uri = get_template_directory_uri();
?>
<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s" style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center">News<span>お知らせ</span></h2>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('template-parts/breadcrumb', 'section'); ?>
	<section class="wrapp-blog-list pb-5 wow animate__fadeIn" data-wow-duration="1s">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="blog-list">
						<div class="row gx-5">
						<?php get_template_part('template-parts/article', 'list'); ?>
						</div>
					</div>
					<?php get_template_part('template-parts/article', 'pagination'); ?>
				</div>
			</div>
		</div>
	</section>

<?php
	get_footer();
?>