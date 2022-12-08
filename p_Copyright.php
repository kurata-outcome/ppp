<?php 
	/* Template Name: Copyright */
	get_header();
	$template_uri = get_template_directory_uri();
?>

<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s"
	style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">Copyright<span>著作権について</span></h1>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/breadcrumb', 'section'); ?>

<section class="about-ppp section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">著作権について<br><span class="font-36 font-bp-ic">Copyright</span></h2>
		</div>
		<div class="copy-desc mt-5">
			<p class="font-20 txt-brown">
			著作物利用許可申請について
<br>
<br>出版物および当ホームページに掲載された記事や写真、図表、動画などの著作物を利用するには、原則として著作権者の了解「許諾」を得ることが必要です。
<br>利用を希望される方は下記のお問い合わせフォームから必要な情報を入力して、お問い合わせください。送付の際、利用を希望する記事のコピーなど記事内容を確認できるものを添付してください。
<br>許諾する場合は、原則として有料となります。
<br>審査終了後、結果（利用の可否）と利用料を回答いたします。
<br>
<br>当サイト内に掲載されている全ての写真等の画像データ、文章データ、及びその内容の利用については、複製・転用・転載・加工等の二次的使用を一切お断りいたします。
			</p>
		</div>
		
		<div class="section-btn mt-5 d-flex justify-content-center align-items-center">
			<a class="btn-flower" href="#">
				<span class="txt-pink d-flex justify-content-center align-items-center">お問い合わせはこちら</span>
			</a>
		</div>
	</div>
</section>

<?php 
	get_footer();
?>