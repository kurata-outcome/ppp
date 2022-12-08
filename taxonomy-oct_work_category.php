<?php 
	get_header();
	$template_uri = get_template_directory_uri();
	$curr_term = get_queried_object(); // The taxonomy being displayed...
?>
<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s" style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">Works<span>デザイン実績</span></h1>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('template-parts/breadcrumb', 'section'); ?>
	<section class="works-blog-list wow animate__fadeIn" data-wow-duration="1s">
		<div class="container">
			<div class="selector-wrappper col-4 offset-4">
				<select id="cate-selector">
<?php
				$terms = get_terms([
					'taxonomy' => 'oct_work_category',
					'hide_empty' => false,
				]);
				foreach ($terms as $term){
?>
					<option value="<?php echo get_term_link( $term ); ?>"
					<?php echo ($curr_term->name == $term->name)?'selected':''; ?>
					><?php echo $term->name; ?></option>
<?php
				}
?>

				</select>
			</div>
			<div class="col-10 offset-1 col-sm-12 offset-sm-0">
				<div class="blog-list">
					<?php get_template_part('template-parts/work', 'list', ['term' => $curr_term]); ?>
				</div>
				<?php get_template_part('template-parts/article', 'pagination'); ?>
			</div>
		</div>
	</section>

<?php
	get_footer();
?>