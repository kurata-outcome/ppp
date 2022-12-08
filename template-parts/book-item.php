<?php
	$template_uri = get_template_directory_uri();

	$post_id = $args['post_id'];

	$img_url  = '';
	$img_id   = get_post_thumbnail_id($post_id);
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
<div class="col-12 col-md-6 col-lg-4 mt-5">
<div class="blog-item book-item content-bg p-4 h-100" <?php echo $term_style; ?>
	data-book="<?php echo $post_id; ?>"
	data-bs-toggle="modal"
	data-bs-target="#exampleModal"
>
	<img class="corner-img tl" src="<?php echo $template_uri; ?>/img/top-left.png"/>
	<img class="corner-img tr" src="<?php echo $template_uri; ?>/img/top-right.png"/>
	<img class="corner-img bl" src="<?php echo $template_uri; ?>/img/bottom-left.png"/>
	<img class="corner-img br" src="<?php echo $template_uri; ?>/img/bottom-right.png"/>
	<div class="tax-book d-flex flex-column justify-content-start align-items-center txt-brown1">
		<div class="tax-book-title">
			<h3 class="mb-4"><?php echo get_field('publisher',$post_id) ?></h3>
		</div>
		<div class="tax-book-img">
			<span class="book-cate"><?php echo $term_name; ?></span>
			<img src="<?php echo $img_url; ?>">
		</div>
		<div class="tax-book-desc mt-4">
			<p class="text-center mb-0"><?php echo get_the_title($post_id); ?></p>
		</div>
	</div>
</div>
</div>