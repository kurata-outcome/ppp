<?php
get_header();
$template_uri = get_template_directory_uri();
$img_id   = get_post_thumbnail_id();
$img_url  = wp_get_attachment_url( $img_id );
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$cat_name = '';
		$cats = get_the_category($post->ID);
		if ( count($cats) > 0 && $cats[0]->name != 'Uncategorized' ) {
			$cat_name = $cats[0]->name;
			$cat_link = get_category_link( $cats[0] );
		}
?>
<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s" style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">News<span>お知らせ</span></h2>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('template-parts/breadcrumb', 'section'); ?>
	<section class="wrapp-blog-content wow animate__fadeIn" data-wow-duration="1s">
		<div class="container">
			<div class="col-10 offset-1 col-sm-12 offset-sm-0">
			<div class="row">
				<div class="col-12 col-lg-3 order-2 order-lg-1 mt-5 mt-lg-0">
					<div class="year-lists">
						<img src="<?php echo $template_uri; ?>/img/flower-img.png"/>
<?php 
					$args = array(
					    'post_type'    => 'post',
					    'type'         => 'yearly',
					    'echo'         => 0,
					    
					);
					echo '<ul>'.wp_get_archives($args).'</ul>';
?>
					</div>
				</div>
				<div class="col-12 col-lg-9 order-1 order-lg-2 content-bg p-4 txt-brown1">
					<img class="corner-img tl" src="<?php echo $template_uri; ?>/img/top-left.png"/>
					<img class="corner-img tr" src="<?php echo $template_uri; ?>/img/top-right.png"/>
					<img class="corner-img bl" src="<?php echo $template_uri; ?>/img/bottom-left.png"/>
					<img class="corner-img br" src="<?php echo $template_uri; ?>/img/bottom-right.png"/>
					<div class="blog-header d-flex justify-content-start align-items-start">
						<?php
						if ( ! empty($cat_name) ) {
?>
							<a href="<?php echo $cat_link; ?>"
								title="Category <?php echo $cat_name; ?>" class="single-cate font-20"
								><span><?php echo $cat_name; ?></span></a>
<?php
						}
?>
						<div class="blog-title">
						<p class="text-time font-20 fw-bold"><?php the_time( 'Y\年 m\月 d\日' ) ?></p>
						<h1 class="title-name font-28 fw-bold"><?php the_title(); ?></h1>
						</div>
					</div>
					<div class="blog-content mt-4">
						<?php the_content(); ?>
					</div>
					<div class="wrapp-button">
<?php
						$prev_post = get_adjacent_post(false, '', true);
						if ( ! empty($prev_post) ) {
							echo '<a href="' . get_permalink($prev_post->ID) .
								'" class="btn-orange prev" title="' .
								$prev_post->post_title . '">前の記事へ</a>';
						}
						$next_post = get_adjacent_post(false, '', false);
						if ( ! empty($next_post) ) {
							echo '<a href="' . get_permalink($next_post->ID) .
								'" class="btn-orange next" title="' .
								$next_post->post_title . '">次の記事</a>';
						}
?>
					</div>
				</div>
			</div>
			</div>
		</div>
	</section>
<?php
	endwhile;
endif;
get_footer();
?>