<?php 
	/* Template Name: Works */
	get_header();
	$template_uri = get_template_directory_uri();
?>

<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s"
	style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">Works<span>デザイン実績</span></h1>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/breadcrumb', 'section'); ?>

<section class="section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">プランデザイン<br><span class="font-36 font-bp-ic">Plan & Design</span></h2>
		</div>
		<div class="section-desc my-5">
			<p class="text-center mb-0 font-20 txt-lbrown">思い出した順に加筆していきます。</p>
		</div>
		<div class="col-10 offset-1 col-sm-12 offset-sm-0">
			<div class="row gx-5">
<?php 
				$works_args = array(
					'post_type' => 'ocp_works',
					'post_status' => 'publish',
					'posts_per_page'=>3,
					'order'=>'DESC',
					'orderby'=>'date',
					);

				$works_query = new WP_Query( $works_args );
				if ( $works_query->have_posts() ) :
				while ( $works_query->have_posts() ) : $works_query->the_post(); 
					$img_id   = get_post_thumbnail_id($post->ID);
					if ( ! empty($img_id) ) {
						$img_url = wp_get_attachment_url( $img_id );
					}
					$term_obj_list = get_the_terms( $post->ID, 'oct_work_category' );
					$term_name = '';
					$term_style = '';
					$terms = get_the_terms( $post->ID, 'oct_work_category' );
					if ( count($terms) > 0 ) {
						$term_name = $terms[0]->name;
						$term_link = get_category_link( $terms[0] );
						$color = get_field('color', 'term_'.$terms[0]->term_id);
						if ( ! empty($color) ) {
							$term_style = 'style="background-color: ' . $color . ';"';
						}
					}
?>
				<div class="col-12 col-xl-4 mt-4 mt-xl-0">
					<div class="recent-works content-bg" <?php echo $term_style; ?> >
					<img class="corner-img tl" src="<?php echo $template_uri; ?>/img/top-left.png"/>
					<img class="corner-img tr" src="<?php echo $template_uri; ?>/img/top-right.png"/>
					<img class="corner-img bl" src="<?php echo $template_uri; ?>/img/bottom-left.png"/>
					<img class="corner-img br" src="<?php echo $template_uri; ?>/img/bottom-right.png"/>
					<a href="<?php echo get_the_permalink(); ?>" class="link-slide"></a>
					<div class="recent-content">
						<div class="recent-title mb-3">
							<h3 class="txt-brown1 font-28"><?php echo get_the_title(); ?></h3>
							<span class="cate-brown"><?php echo $term_name; ?></span>
						</div>
						<div class="recent-img">
							<img src="<?php echo $img_url; ?>"/>
						</div>
						<div class="recent-detail">
							<p class="item-date txt-brown1 font-18 fw-bold"><?php echo get_the_time( 'Y\年m\月d\日');?></p>
							<p class="mb-0 txt-brown1 font-20"><?php echo oc_recent_excerpt($post->ID); ?></p>
						</div>
					</div>
					</div>
				</div>
<?php 
				endwhile; 
				wp_reset_postdata(); 
				endif;
?>
			</div>
		</div>
	</div>
</section>

<section class="section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="workscate-list col-12 ">
			<div class="row">
<?php 
	$terms = get_terms([
		'taxonomy' => 'oct_work_category',
		'hide_empty' => false,
	]);
		foreach ($terms as $term){
		$cate_img = get_field('image', $term->taxonomy . '_' . $term->term_id);
?>
			<div class="col-6 col-md-4 col-lg-3 cate-item">
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