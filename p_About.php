<?php 
	/* Template Name: About */
	get_header();
	$template_uri = get_template_directory_uri();
?>

<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s"
	style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">About<span>概要</span></h1>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/breadcrumb', 'section'); ?>

<section class="about-ppp section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">会社概要<br><span class="font-36 font-bp-ic">Pink Parl Planning</span></h2>
		</div>
		<div class="col-12">
			<div class="about-img my-5">
				<img src="<?php echo $template_uri; ?>/img/about-img.png">
			</div>
			<table class="about-table">
				<tr>
					<td>会社名</td>
					<td>有限会社ピンクパールプランニング</td>
				</tr>
				<tr>
					<td>所地</td>
					<td>東京都大田区北千束3丁目22-10ラ・アトレ大岡山102号室 <a class="ms-2 txt-pink" href="#">>>アクセスはこちら</a></td>
				</tr>
				<tr>
					<td>資本金</td>
					<td>300万円</td>
				</tr>
				<tr>
					<td>設立</td>
					<td>昭和63年（1988年）6月20日</td>
				</tr>
				<tr>
					<td>役員</td>
					<td>宮崎恵里子 他2名</td>
				</tr>
				<tr>
					<td>従業員数</td>
					<td>4名</td>
				</tr>
				<tr>
					<td>業種</td>
					<td>サービス業</td>
				</tr>
				<tr>
					<td>取引銀行</td>
					<td>みずほ銀行大岡山支店
						<br>城南新表金庫　大岡山支店　
					</td>
				</tr>
				<tr>
					<td>主要取引先</td>
					<td>
						株式会社サンリオ　殿　　　　　　　　　　　　
						<br>株式会社ハマナカ　殿
						<br>株式会社アガツマ　殿
						<br>日本放送協会　殿
						<br>PHP研究所　殿
						<br>株式会社日東書院本社　殿
						<br>株式会社デアゴスティーニ　殿
						<br>株式会社ブティック社　殿 
						<br>株式会社日本ヴォーグ社　殿　
						<br>株式会社汐文社　殿
						<br>株式会社新日本出版　殿
						<br>株式会社朝日新聞出版　殿
						<br>株式会社主婦と生活社　殿　
						<br>株式会社主婦の友社　殿　
						<br>株式会社世界文化社　殿
						<br>株式会社講談社　殿
					</td>
				</tr>
			</table>
		</div>
	</div>
</section>

<section class="about-ppp section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">アクセス<br><span class="font-36 font-bp-ic">Access</span></h2>
		</div>
		<div class="about-maps mt-5">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1621.94469386488!2d139.68577797076898!3d35.60579499812888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f533d336d2c3%3A0xcc7a8b6cfcbe768e!2z77yI5pyJ77yJ44OU44Oz44Kv44OR44O844Or44OX44Op44Oz44OL44Oz44Kw!5e0!3m2!1sth!2sth!4v1650889733535!5m2!1sth!2sth" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="maps-desc mt-4">
			<a href="#" class="txt-pink font-20">>> Google Mapはこちら</a>
			<p class="font-20 txt-brown1">東京都大田区北千束3丁目22-10ラ・アトレ大岡山102号室</p>
		</div>
	</div>
</section>

<?php 
	get_footer();
?>