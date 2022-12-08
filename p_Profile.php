<?php 
	/* Template Name: Profile */
	get_header();
	$template_uri = get_template_directory_uri();
?>

<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s"
	style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">Profile<span>寺西恵里子について</span></h1>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/breadcrumb', 'section'); ?>

<section class="profile-section section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">寺西恵里子<br><span class="font-36 font-bp-ic">Eriko Teranishi</span></h2>
		</div>
		<div class="col-12 mt-5">
			<div class="row">
				<div class="col-6 offset-3 col-md-3 offset-md-0">
					<div class="pink-circle-img">
					<img class="w-100" src="<?php echo $template_uri; ?>/img/eriko.png"/>
					</div>
				</div>
				<div class="col-12 col-md-9 mt-3 mt-md-0">
					<p class="section-desc txt-brown1 font-20">
						<span class="txt-pink fw-bold">「 HAPPINESS FOR KIDS 」</span>をテーマに、 子どもたちの未来を明るくする企画に取り組む。
 <br>企画をメインにデザイン活動をするプランナーであり、デザイナーでもある。
<br>
<br>(株)サンリオに勤務し、子ども向け商品の企画・デザインを担当。退社後もテーマをもとに、手芸、料理、工作、子ども服、雑貨、おもちゃ等の商品としての企画・デザインを手がけると同時に、手作りとして誰もが作るように、伝えることを創作活動として本で発表。
<br><br>
実用書・女性誌・子ども雑誌・テレビと多方面に活躍中。
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="copyright-work section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">著作物<br><span class="font-36 font-bp-ic">Copyrighted work</span></h2>
		</div>
		<div class="col-12 mt-3">
			<div class="row">
				<div class="col-12 col-lg-6">
					<p class="font-20 txt-brown1">
					『ハンドメイドで元気手作り雑貨』（朝日新聞出版） 
<br>『チラシで作るバスケット』（NHK出版）　　 
<br>『サンリオキャラクターのときめきスイーツレシピ』（学研） 
<br>『スマイルプリキュア！お弁当＆デザートレシピブック』（講談社）カタログ
<br>一覧
<br>『３歳からのお手伝い』（河出書房） カタログ一覧カタログ一覧
<br>『かんたん手芸』（小峰書店） 
<br>『ねんどでつくるスイーツ＆サンリオキャラクター』（サンリオ） 
<br>『おしゃれターバンとヘアバンド』（主婦と生活社） 
<br>『手作り知育おもちゃ』（主婦の友社） 
<br>『365日子どもが夢中になるあそび』（祥伝社） 
<br>『はじめてママの通園＆通学バッグ』（辰巳出版） 
<br>『にぎっておいしいきほんのおにぎり』（汐文社） 
<br>『ニードルフェルトでねこあつめ』（ディアゴスティーニ） 
<br>『子どもの手芸バッグと雑貨』（日東書院） 
<br>『はじめてママでも安心!!通園通学グッズ』（日本ヴォーグ社） 
<br>『かわいいうで編 み＆ゆび編み」』（PHP研究所） 
<br>『 発表会コスチューム』（ひかりのくに） 
<br>『フェルトのままごと』（ブティック社） 
<br>『0・1・2歳のあそびと環境』（フレーベル館） 
<br>『通園、通学バッグと洋服』（文化出版局）
<br>アプリ詳細についてテキストが入ります。 
<br>‥‥他、ジャンルも幅広く著作物は700冊を越える。
</p>
				</div>
				<div class="col-8 offset-2 col-lg-6 offset-lg-0">
					<img class="w-100" src="<?php echo $template_uri; ?>/img/copyright-works.png">
				</div>
			</div>
		</div>
		<div class="section-btn mt-5 d-flex justify-content-center align-items-center">
			<a class="btn-flower ext-link" href="#">
				<span class="txt-pink d-flex justify-content-center align-items-center">Iphoneアプリはこちらから<i class="fas fa-external-link-alt"></i></span>
			</a>
		</div>
	</div>
</section>

<section class="bio-section section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">略歴<br><span class="font-36 font-bp-ic">Biography</span></h2>
		</div>
		<table class="bio-table mt-5">
<?php 
$bio_data = get_field('biography');
if( $bio_data ) {
    foreach( $bio_data as $bio ) {
    	$bio_year 	= $bio['bio_year'];
        $bio_title 	= $bio['bio_title'];
        $bio_desc	= $bio['bio_desc'];
?>
			<tr>
				<td><?php echo $bio_year; ?></td>
				<td>
					<h4><?php echo $bio_title; ?></h4>
					<p><?php echo $bio_desc; ?></p>
				</td>
			</tr>
<?php
    }
}
?>
		</table>
	</div>
</section>
<?php 
	get_footer();
?>