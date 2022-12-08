<?php
$template_uri = get_template_directory_uri();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$cat_name = '';
		$cats = get_the_category($post->ID);
		if ( count($cats) > 0 && $cats[0]->name != 'Uncategorized' ) {
			$cat_name = $cats[0]->name;
			$cat_link = get_category_link( $cats[0] );
		}
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
		<div class="blog-item col-12 mt-5 content-bg p-4" <?php echo $term_style; ?> >
			<img class="corner-img tl" src="<?php echo $template_uri; ?>/img/top-left.png"/>
			<img class="corner-img tr" src="<?php echo $template_uri; ?>/img/top-right.png"/>
			<img class="corner-img bl" src="<?php echo $template_uri; ?>/img/bottom-left.png"/>
			<img class="corner-img br" src="<?php echo $template_uri; ?>/img/bottom-right.png"/>
			<div class="tax-work d-flex justify-content-start align-items-start">
				<a href="<?php echo get_permalink($post->ID) ?>" class="tax-link"></a>
				<div class="tax-work-img">
					<img src="<?php echo $img_url; ?>">
				</div>
				<div class="tax-work-desc">
					<p class="column-date font-18 fw-bold txt-brown1"><?php echo get_the_time( 'Y\年m\月d\日', $post->ID );?></p>
					<h3 class="font-28 fw-bold txt-brown1"><?php echo get_the_title($post->ID); ?></h3>
	    			<p class="mb-0 font-20 txt-brown1"><?php echo oc_news_excerpt($post->ID); ?></p>
				</div>
			</div>
		</div>
<?php
	endwhile;
endif;
?>
