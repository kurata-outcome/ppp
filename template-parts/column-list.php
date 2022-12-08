<?php
$template_uri = get_template_directory_uri();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$img_url  = '';
		$img_id   = get_post_thumbnail_id($post->ID);
		if ( ! empty($img_id) ) {
			$img_url = wp_get_attachment_url( $img_id );
		}
		$bgstyle = '';
		if ( ! empty($img_url) ) {
			$bgstyle = ' style="background-image: url(' . "'" . $img_url . "'" . ');"';
		}
		$term_name = '';
		$term_style = '';
		if ( isset($args) && isset($args['term']) ) {
			$term = $args['term'];
			$term_name = $term->name;
			$term_link = get_category_link( $term );
			$color = get_field('color', 'term_'.$term->term_id);
			if ( ! empty($color) ) {
				$term_style = 'style="background-color: ' . $color . ';"';
			}
		}
?>
		<div class="blog-item col-12 col-md-6 col-lg-4 mt-5 ">
			<div class="column-lists news-lists content-bg" <?php echo $term_style; ?> >
				<img class="corner-img tl" src="<?php echo $template_uri; ?>/img/top-left.png"/>
				<img class="corner-img tr" src="<?php echo $template_uri; ?>/img/top-right.png"/>
				<img class="corner-img bl" src="<?php echo $template_uri; ?>/img/bottom-left.png"/>
				<img class="corner-img br" src="<?php echo $template_uri; ?>/img/bottom-right.png"/>
				<a href="<?php echo get_permalink($post->ID) ?>" class="column-link"></a>
				<div class="column-content txt-brown1">
					<div class="column-wrapper d-flex flex-column justify-content-start align-items-start h-100">
						<div class="column-heading">
							<h3 class="font-28 fw-bold"><?php echo get_the_title($post->ID); ?></h3>
							<span class="font-18 fw-bold"><?php echo $term_name; ?></span>
						</div>
						<div class="column-img">
							<img src="<?php echo $img_url; ?>"/>
						</div>
						<div class="column-detail mt-2">
							<p class="column-date fw-bold font-18 mb-1"><?php echo get_the_time( 'Y\年m\月d\日', $post->ID );?></p>
							<p class="mb-0 font-20"><?php echo oc_recent_excerpt($post->ID); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	endwhile;
endif;
?>
