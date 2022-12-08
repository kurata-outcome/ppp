<?php 
	$template_uri = get_template_directory_uri();
	
?>
<?php if (!is_front_page()) { ?>
<section class="bc-section">
	<div class="container-fluid">
		<ul class="bc-item p-4 d-flex flex-wrap justify-content-start align-items-center">
			<li><a href="<?php echo home_url(); ?>" class="d-inline-flex justify-content-start align-items-center ">HOME</a></li>
<?php
			if (is_single()) {
				if ( is_singular( 'ocp_works' ) ) {
				$term_obj_list = get_the_terms( $post->ID, 'oct_work_category' );
				$term_name = $term_obj_list[0]->name;
				$term_link = get_term_link( $term_obj_list[0] );
?>
				
				<li><a href="<?php echo home_url('/works'); ?>" class="">実績</a></li>
				<li><a href="<?php echo $term_link; ?>" class=""><?php echo $term_name; ?></a></li>
<?php 
				}elseif ( is_singular( 'ocp_column' ) ) {
				$term_obj_list = get_the_terms( $post->ID, 'oct_column_category' );
				$term_name = $term_obj_list[0]->name;
				$term_link = get_term_link( $term_obj_list[0] );
?>
				<li><a href="<?php echo home_url('/column'); ?>" class="">コラム</a></li>
				<li><a href="<?php echo $term_link; ?>" class=""><?php echo $term_name; ?></a></li>
<?php 
				}else{
?>
				<li><a href="<?php echo home_url('/blog'); ?>" class="">お知らせ一覧</a></li>
<?php 			
				} 
?>
			<li><?php echo get_the_title(); ?></li>
<?php
			}
			if (is_category()) {
?>
			<li><?php echo single_cat_title(); ?></li>
<?php
			}
			if (is_tax()) {
				$term_id = get_queried_object_id();
				$term_data = get_term($term_id);
?>
			<li><?php echo $term_data->name; ?></li>
<?php
			}
			if (is_home()) {
?>
			<li>お知らせ一覧</li>
<?php
			}
			if (is_page()) {
?>
			<li><?php echo get_the_title(); ?></li>
<?php
			}
?>
		</ul>
	</div>
</section>
<?php
	}
?>