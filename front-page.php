<?php 
	get_header();
	$template_uri = get_template_directory_uri();
?>

<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s"
	style="background-image: url('<?php echo $template_uri; ?>/img/front-cover.png');">
</section>

<section class="news-section section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container-fluid p-0">
		<div class="section-border-title"> 
			<h2 class="txt-brown font-bp-ic font-58">News</h2>
		</div>
		<div class="news-slide mt-5">
			<!-- Slider main container -->
			<div class="swiper">
			  <!-- Additional required wrapper -->
			  <div class="swiper-wrapper">
				<!-- Slides -->
<?php 
				$slide_args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page'=>9,
					'order'=>'DESC',
					'orderby'=>'date',
					);

				$slide_query = new WP_Query( $slide_args );
				if ( $slide_query->have_posts() ) :
				while ( $slide_query->have_posts() ) : $slide_query->the_post(); 
					$cat_name = '';
					$cat_style = '';
					$cats = get_the_category($post->ID);
					if ( count($cats) > 0 && $cats[0]->name != 'Uncategorized' ) {
						$cat_name = $cats[0]->name;
						$cat_link = get_category_link( $cats[0] );
						$color = get_field('color', 'term_'.$cats[0]->term_id);
						if ( ! empty($color) ) {
							$cat_style = 'style="background-color: ' . $color . ';"';
						}
					}
					$img_id   = get_post_thumbnail_id($post->ID);
					if ( ! empty($img_id) ) {
						$img_url = wp_get_attachment_url( $img_id );
					}
?>
				<div class="swiper-slide">
					<a href="<?php echo get_the_permalink(); ?>" class="link-slide"></a>
					<div class="slide-content">
						<div class="slide-wrapper d-block p-3" <?php echo $cat_style; ?> >
							<div class="slide-img">
								<img src="<?php echo $img_url; ?>"/>
							</div>
							<div class="slide-detail">
								<h3 class="font-28 txt-brown1"><?php echo get_the_title(); ?></h3>
								<span class="cate-brown font-20"><?php echo $cat_name; ?></span>
								<p class="mb-0 font-20 txt-brown1"><?php echo get_the_content(); ?></p>
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

			  <!-- If we need navigation buttons -->
			  <div class="swiper-button-prev"></div>
			  <div class="swiper-button-next"></div>

			</div>
		</div>
		<div class="section-btn mt-5 d-flex justify-content-center align-items-center">
			<a class="btn-flower" href="#">
				<span class="txt-pink d-flex justify-content-center align-items-center">記事一覧はこちら</span>
				<i class="fas fa-angle-right"></i>
			</a>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/works', 'section'); ?>

<section class="about-section section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-title d-flex justify-content-between align-items-center">
			<div class="col-12">
				<div class="row">
					<div class="col-7 flex-fill d-flex justify-content-end align-items-center ">
						<h4 class="text-end txt-lbrown">寺西恵里子は、子どもたちの未来を明るくするために、
						<br>手芸・料理・工作などを通じて様々な業務を行っております。</h4>
					</div>
					<div class="col-5">
						<h1 class="font-smt-ir font-big-title txt-lbrown mb-0">About</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="section-detail">
			<div class="row">
				<div class="col-4 offset-4 col-lg-3 offset-lg-0 order-2 order-lg-1 d-flex flex-fill justify-content-end align-items-end">
					<img class="w-100" src="<?php echo $template_uri; ?>/img/about-img1.png ?>"/>
				</div>
				<div class="col-12 col-lg-9 order-1 order-lg-2 bg-image" style="background-image: url('<?php echo $template_uri; ?>/img/about-img2.png');">
					<img src="<?php echo $template_uri; ?>/img/about-img3.png ?>"/>
					<p class="mb-0 font-20">
			<span class="txt-pink fw-bold">「 HAPPINESS FOR KIDS 」</span>をテーマに、 子どもたちの未来を明るくする企画に取り組む。
 企画をメインにデザイン活動をするプランナーであり、デザイナーでもある。
<br><br>
(株)サンリオに勤務し、子ども向け商品の企画・デザインを担当。退社後もテーマをもとに、手芸、料理、工作、子ども服、雑貨、おもちゃ等の商品としての企画・デザインを手がけると同時に、手作りとして誰もが作るように、伝えることを創作活動として本で発表。
<br><br>
実用書・女性誌・子ども雑誌・テレビと多方面に活躍中。
					</p>
				</div>
			</div>
		</div>
		<div class="section-btn mt-5 d-flex justify-content-center align-items-center">
			<a class="btn-flower" href="#">
				<span class="txt-pink d-flex justify-content-center align-items-center">記事一覧はこちら</span>
				<i class="fas fa-angle-right"></i>
			</a>
		</div>
	</div>
</section>

<section class="column-section section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-title d-flex justify-content-between align-items-center">
			<div class="col-12">
				<div class="row">
					<div class="col-5">
						<h1 class="font-smt-ir font-big-title txt-lbrown mb-0 text-end">Column</h1>
					</div>
					<div class="col-7 flex-fill d-flex justify-content-start align-items-center ">
						<h4 class="text-start txt-lbrown">寺西恵里子の作品や、徒然コラムをご紹介しています。
						<br>テキストが入ります。テキスト。</h4>
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-12 mt-3">
			<div class="row gx-5">
<?php 
				$column_args = array(
					'post_type' => 'ocp_column',
					'post_status' => 'publish',
					'posts_per_page'=>3,
					'order'=>'DESC',
					'orderby'=>'date',
					);

				$column_query = new WP_Query( $column_args );
				if ( $column_query->have_posts() ) :
				while ( $column_query->have_posts() ) : $column_query->the_post(); 
					$terms = get_the_terms( $post->ID, 'oct_column_category' );
					$term_name = '';
					$term_link = '';
					$term_style = '';
					if ( count($terms) > 0 ) {
						$term_name = $terms[0]->name;
						$term_link = get_term_link( $terms[0] );
						$color = get_field('color', 'term_'.$terms[0]->term_id);
						if ( ! empty($color) ) {
							$term_style = 'style="background-color: ' . $color . ';"';
						}
					}
					$img_id   = get_post_thumbnail_id($post->ID);
					if ( ! empty($img_id) ) {
						$img_url = wp_get_attachment_url( $img_id );
					}
?>
				<div class="col-12 col-xl-4 mb-4">
					<div class="column-lists content-bg" <?php echo $term_style; ?> >
						<img class="corner-img tl" src="<?php echo $template_uri; ?>/img/top-left.png"/>
						<img class="corner-img tr" src="<?php echo $template_uri; ?>/img/top-right.png"/>
						<img class="corner-img bl" src="<?php echo $template_uri; ?>/img/bottom-left.png"/>
						<img class="corner-img br" src="<?php echo $template_uri; ?>/img/bottom-right.png"/>
						<a href="<?php echo get_the_permalink(); ?>" class="column-link"></a>
						<div class="column-content">
							<div class="column-wrapper d-flex flex-column justify-content-start align-items-start">
							<div class="column-heading">
								<h3 class="font-28 fw-bold txt-brown1"><?php echo get_the_title(); ?></h3>
								<span><?php echo $term_name; ?></span>
							</div>
							<div class="column-img">
								<img class="w-100" src="<?php echo $img_url; ?>"/>
							</div>
							<div class="column-detail mt-3">
								<p class="column-date mb-1 font-18 fw-bold"><?php echo get_the_time( 'Y\年m\月d\日');?></p>
								<p class="mb-0 font-20"><?php echo oc_recent_excerpt($post->ID); ?></p>
							</div>
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
		<div class="section-btn mt-5 d-flex justify-content-center align-items-center">
			<a class="btn-flower" href="#">
				<span class="txt-pink d-flex justify-content-center align-items-center">記事一覧はこちら</span>
				<i class="fas fa-angle-right"></i>
			</a>
		</div>
	</div>
</section>

<section class="job-section section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-title d-flex justify-content-between align-items-center">
			<h4 class="text-end font-tsu-b font-28 txt-lbrown"></h4>
			<h1></h1>
			<div class="col-12">
				<div class="row">
					<div class="col-7 flex-fill d-flex justify-content-end align-items-center ">
						<h4 class="text-end font-tsu-b font-28 txt-lbrown">ピンクパールプランニング・寺西恵里子へのお仕事の依頼を
						<br>お待ちしております。「ご依頼はこちら」からご連絡下さい。</h4>
					</div>
					<div class="col-5">
						<h1 class="font-smt-ir font-big-title txt-lbrown mb-0">Job Request</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="section-btn mt-5 d-flex flex-wrap justify-content-center align-items-center">
			<a class="btn-flower" href="#">
				<span class="txt-pink d-flex justify-content-center align-items-center">デザイン実績を見る</span>
				<i class="fas fa-angle-right"></i>
			</a>
			<a class="btn-flower" href="#">
				<span class="txt-pink d-flex justify-content-center align-items-center">ご依頼はこちら</span>
				<i class="fas fa-angle-right"></i>
			</a>
		</div>
	</div>
</section>

<section class="partner-section section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-title d-flex justify-content-between align-items-center">
			<div class="col-12">
				<div class="row">
					<div class="col-5">
						<h1 class="font-smt-ir text-end font-big-title txt-lbrown mb-0">Partner</h1>
					</div>
					<div class="col-7 flex-fill d-flex justify-content-start align-items-center ">
						<h4 class="text-start txt-lbrown">HAPPINESS FOR KIDS
						<br>一緒に子どもたちの未来を明るくする企画を考えませんか</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="section-subtitle my-5">
			<h2 class="font-52 font-tsu-b txt-lbrown text-center">こんな仲間を探しています</h2>
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col-12 col-sm-8 offset-sm-2 col-lg-4 offset-lg-0 mt-4 mt-lg-0">
					<div class="partner-item bg-image" style="background-image: url('<?php echo $template_uri; ?>/img/partner-img1.png');">
						<div class="partner-title">
						<h3 class="text-white label-bg-pink">テキストが入ります</h3>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-8 offset-sm-2 col-lg-4 offset-lg-0 mt-4 mt-lg-0">
					<div class="partner-item bg-image" style="background-image: url('<?php echo $template_uri; ?>/img/partner-img2.png');">
						<div class="partner-title">
						<h3 class="text-white label-bg-blue">テキストが入ります</h3>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-8 offset-sm-2 col-lg-4 offset-lg-0 mt-4 mt-lg-0">
					<div class="partner-item bg-image" style="background-image: url('<?php echo $template_uri; ?>/img/partner-img3.png');">
						<div class="partner-title">
						<h3 class="text-white label-bg-orange">テキストが入ります</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-btn mt-5 d-flex justify-content-center align-items-center">
			<a class="btn-flower" href="#">
				<span class="txt-pink d-flex justify-content-center align-items-center">デザイン実績を見る</span>
				<i class="fas fa-angle-right"></i>
			</a>
		</div>
	</div>
</section>

<section class="ppp-section section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container p-0">
		<div class="section-border-title"> 
			<h2 class="txt-brown font-bp-ic font-50">Pink Parl Puranning <span class="font-28">からのメッセージ</span></h2>
		</div>
		<div class="col-12 mt-5">
			<div class="row">
				<div class="col-6 offset-3 col-md-3 offset-md-0">
					<div class="pink-circle-img">
					<img class="w-100" src="<?php echo $template_uri; ?>/img/ppp-img.png"/>
					</div>
				</div>
				<div class="col-12 col-md-9">
					<p class="section-desc lh-2 font-20 txt-brown1">
						私たちは多くのお客様に、
						<br><span class="txt-pink2">「手づくりに込められた想いの価値をお伝えしたい」</span>
						<br><span class="txt-pink2">「子供達のために豊かなくらし社会づくりに貢献したい」</span>
						<br>そのように考えています。
						<br><br>そのためにまず、目の前のお客様に真の満足を提供できることが必要です。社員一人ひとりが知恵を絞り、
						<br>どのようにすれば良いか考えることが、お客様の笑顔への第一歩です。
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
	get_footer();
?>