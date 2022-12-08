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
?>
		<div class="blog-item col-12 col-md-6 col-lg-4 mt-5 d-flex flex-fill">
			<div class="column-lists news-lists content-bg">
				<img class="corner-img tl" src="<?php echo $template_uri; ?>/img/top-left.png"/>
				<img class="corner-img tr" src="<?php echo $template_uri; ?>/img/top-right.png"/>
				<img class="corner-img bl" src="<?php echo $template_uri; ?>/img/bottom-left.png"/>
				<img class="corner-img br" src="<?php echo $template_uri; ?>/img/bottom-right.png"/>
		    	<a href="<?php echo get_permalink($post->ID) ?>" class="column-link"></a>
		    	<div class="column-content">
		    		<div class="column-wrapper d-flex flex-column justify-content-start align-items-start">
		    			<div class="column-heading">
			    			<h3 class="font-28 txt-brown1"><?php echo get_the_title($post->ID); ?></h3>
			    			<span><a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a></span>
			    		</div>
			    		<div class="column-img">
			    			<img src="<?php echo $img_url; ?>"/>
			    		</div>
			    		<div class="column-detail">
			    			<p class="column-date font-18 txt-brown1 fw-bold mt-2 mb-0"><?php echo get_the_time( 'Y\年m\月d\日', $post->ID );?></p>
			    			<p class="mb-0 font-20 txt-brown1"><?php echo oc_news_excerpt($post->ID); ?></p>
			    		</div>
		    		</div>
		    	</div>
		    </div>
		</div>
<?php
	endwhile;
endif;
?>
