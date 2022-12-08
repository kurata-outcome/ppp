<?php
	$template_uri = get_template_directory_uri();
	get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-10 offset-md-1">
			<div class="static-content">
				<?php echo the_content(); ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>