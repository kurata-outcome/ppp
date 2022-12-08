<?php 
	get_header();
	$template_uri = get_template_directory_uri();
	$curr_term = get_queried_object();
	$book_ids = array();
?>
<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s" style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">Book<span>デザイン実績</span></h1>
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
					'taxonomy' => 'oct_book_genres',
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
				<div class="blog-list col-10 offset-1 col-sm-12 offset-sm-0">
					<div class="row gx-5">
<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						$post_id = $post->ID;
						$book_ids[] = $post_id;
?>
						<?php get_template_part('template-parts/book', 'item',
							['post_id' => $post_id, 'term' => $curr_term]); ?>
<?php
					endwhile;
				endif;
?>
					</div>
				</div>
				<?php get_template_part('template-parts/article', 'pagination'); ?>
		</div>
	</section>

<!-- Modal -->
<div class="modal fade p-3 p-xl-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
  <div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="close" data-bs-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</div>
	  <div id="modal-body">
		...
	  </div>
	</div>
  </div>
</div>

<div id="modal-template" class="d-none">
	<div class="book-modal d-flex justify-content-start align-items-start p-5">
		<div class="modal-img">
			<img src="__IMGURL__"/>
		</div>
		<div class="modal-detail d-flex flex-column justify-content-start align-items-stretch">
			<div class="modal-desc flex-fill">
				<h3 class="font-28 txt-brown1">__TITLE__</h3>
				<p class="font-22 fw-bold txt-lbrown">__PUBLISHER__</p>
				<p class="font-20 txt-brown1">__DESC__</p>
			</div>
			<div class="modal-btn w-100 d-flex">
				<a href="__LINK___" class="pink-btn w-100 text-center py-2">Amazonページはこちら<i class="fas fa-external-link-alt"></i></a>
			</div>
		</div>
	</div>	
</div>
<script id="gBookScript" type="text/javascript">
	console.log( "DEFINING gBooks" );
	gBooks = {
	<?php
		foreach ( $book_ids as $book_id ) {
			// $cat_name = '';
			// $cats = get_the_category($book_id);
			// if ( count($cats) > 0 && $cats[0]->name != 'Uncategorized' ) {
				// $cat_name = $cats[0]->name;
				// $cat_link = get_category_link( $cats[0] );
			// }
			$img_url  = '';
			$img_id   = get_post_thumbnail_id($book_id);
			if ( ! empty($img_id) ) {
				$img_url = wp_get_attachment_url( $img_id );
			}

			echo "" . $book_id . ": ";
			echo "{ ";
			// echo 'cat_name: "'	. $cat_name . '",';
			// echo 'cat_link: "'	. $cat_link . '",';
			echo 'title: "'	   . str_replace( '"', '\\"', str_replace( "\n", " ", get_the_title($book_id) ) ) . '",';
			echo 'description: "' . str_replace( '"', '\\"', str_replace( "\n", " ", get_the_content($book_id) ) ) . '",';
			echo 'publisher: "'   . str_replace( '"', '\\"', str_replace( "\n", " ", get_field('publisher',$book_id) ) ) . '",';
			echo 'link: "'   . str_replace( '"', '\\"', str_replace( "\n", " ", get_field('link',$book_id) ) ) . '",';
			echo 'img_url: "'	 . $img_url . '"';
			echo " }, ";
		}
	?>
	};
</script>
<?php
	get_footer();
?>