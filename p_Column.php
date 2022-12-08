<?php 
	/* Template Name: Column */
	get_header();
	$template_uri = get_template_directory_uri();
?>

<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s"
	style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">Column<span>コラム</span></h1>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/breadcrumb', 'section'); ?>

<section class="about-ppp section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">ジャンル<br><span class="font-36 font-bp-ic">Category</span></h2>
		</div>
		<div class="col-12 mt-4 cate-list">
			<div class="row">
<?php 
		$terms = get_terms([
	    	'taxonomy' => 'oct_column_category',
	    	'hide_empty' => false,
		]);
			foreach ($terms as $term){
			$cate_img = get_field('image',$term->taxonomy . '_' . $term->term_id);
?>
				<div class="cate-item col-6 col-md-4 col-lg-3">
					<a href="<?php echo get_term_link( $term ); ?>">
					<div class="cate-img">
						<img src="<?php echo $cate_img['sizes']['thumbnail']; ?>">
					</div>
					<p class="cate-name text-center mt-2 txt-brown1 font-30 fw-bold"><?php echo $term->name; ?></p>
					</a>
				</div>
<?php
		}
?>
			</div>
		</div>
	</div>
</section>


<?php 
	get_footer();
?>