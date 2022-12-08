<?php 
	/* Template Name: Partner */
	get_header();
	$template_uri = get_template_directory_uri();

	// Refer to comment in functions.php regarding the reason we now perform a
	// 'read_and_close' operation here to get the 'form' session variable.
	session_start(['read_and_close' => true]);
	$form_result = NULL;
	$form_msg = '不明なエラーが発生しました。';
	if ( isset($_SESSION['form']) && isset($_SESSION['form']['result']) ) {
		$form_result = $_SESSION['form']['result'];
		if ( isset($_SESSION['form']['msg']) && ! empty($_SESSION['form']['msg']) ) {
			$form_msg = $_SESSION['form']['msg'];
		}
	}
?>
<script src='https://www.google.com/recaptcha/api.js'></script>

<section class="text-bg-top bg-image wow animate__fadeIn" data-wow-duration="1s"
	style="background-image: url('<?php echo $template_uri; ?>/img/page-cover.png');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="cover-txt txt-brown text-center mb-0">Partner<span>パートナー募集</span></h2>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/breadcrumb', 'section'); ?>

<section class="about-ppp section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
		<div class="section-border-title"> 
			<h2 class="txt-brown text-center font-34">パートナー募集<br><span class="font-36 font-bp-ic">Partner</span></h2>
		</div>
		<div class="col-12">
			<div class="about-img my-5">
				<img src="<?php echo $template_uri; ?>/img/partner-img.png">
			</div>
			<table class="about-table">
				<tr>
					<td>職種</td>
					<td>デザイナー</td>
				</tr>
				<tr>
					<td>給与</td>
					<td>基本給：XX万円～</td>
				</tr>
				<tr>
					<td>勤務地</td>
					<td>東京都大田区北千束3丁目22-10 ラ・アトレ大岡山102号室</td>
				</tr>
				<tr>
					<td>勤務時間</td>
					<td>8:30～17:30
					<br>週休2日制（土日休日）</td>
				</tr>
				<tr>
					<td>交通費</td>
					<td>交通費支給有</td>
				</tr>
				<tr>
					<td>仕事内容</td>
					<td>仕事内容が入ります。テキストが入ります。
<br>
<br>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入りります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキスト
<br>が入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
<br>
<br>サンリオ展　ニッポンのカワイイ文化60年史の「Lady Gaga <br>キティドレス」のレプリカを制作しました。ドレス本体は打掛で作り、テキストが入ります。テキストが入ります。テキストが入ります。
<br>
<br>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入りります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキスト
<br>が入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</td>
				</tr>
				
			</table>
		</div>
		<div class="section-btm mt-5">
			<p class="text-center font-30 font-tsu-b txt-lbrown ">ハンドメイドの価値・楽しさを、私達と一緒に伝えていきませんか？
			<br>みなさまの応募をお待ちしております。
			</p>
		</div>
	</div>
</section>

<section class="partner-contact section-padding wow animate__fadeIn" data-wow-duration="1s">
	<div class="container">
<?php
			if ( ! is_null($form_result)) {
				echo '<div id="feedback" class="contact-result mt-3 ' . ($form_result === FALSE ? 'failed' : 'success') . '">';
				echo   '<p>' . $form_msg . '</p>';
				echo '</div>';
			}
			// NOTE
			// All fields beginning with "fld_ta_" are expected to be <textarea> inputs, and their
			// content will be processed with the special oc_sanetize_textarea_input() before being
			// replaced into to the email template. It is important to use this mechanism due to the
			// problems of UTF-8 data that is longer than the allowable line length in "quoted-printable"
			// emails, which are generated in WP mail. https://en.wikipedia.org/wiki/Quoted-printable
?>
		<div class="contact-box">
			<h2>応募フォーム</h2>
			<form id="partner-contact" method="POST" action="<?php echo $template_uri; ?>/php/process-partner.php">
			<div class="form-input">
				<label>お名前<span class="req">*</span></label>
				<input type="text" name="fld_name" placeholder="山田　太郎" <?php echo ( isset($_SESSION['form']['fld_name']) ? $_SESSION['form']['fld_name'] : '' ); ?> required>
			</div>
			<div class="form-input">
				<label>ふりがな<span class="req">*</span></label>
				<input type="text" name="fld_furigana" placeholder="youremail@address.com" <?php echo ( isset($_SESSION['form']['fld_furigana']) ? $_SESSION['form']['fld_furigana'] : '' ); ?> required>
			</div>
			<div class="form-input">
				<label>会社名</label>
				<input type="text" name="fld_company" placeholder="080-1234-5678" <?php echo ( isset($_SESSION['form']['fld_company']) ? $_SESSION['form']['fld_company'] : '' ); ?>>
			</div>
			<div class="form-input">
				<label>郵便番号</label>
				<input type="text" name="fld_postal" placeholder="youremail@address.com" <?php echo ( isset($_SESSION['form']['fld_postal']) ? $_SESSION['form']['fld_postal'] : '' ); ?>>
			</div>
			<div class="form-input">
				<label>住所<span class="req">*</span></label>
				<input type="text" name="fld_address" placeholder="080-1234-5678" <?php echo ( isset($_SESSION['form']['fld_address']) ? $_SESSION['form']['fld_address'] : '' ); ?> required>
			</div>
			<div class="form-input">
				<label>電話番号<span class="req">*</span></label>
				<input type="text" name="fld_phone" placeholder="youremail@address.com" <?php echo ( isset($_SESSION['form']['fld_phone']) ? $_SESSION['form']['fld_phone'] : '' ); ?> required>
			</div>
			<div class="form-input">
				<label>ＦＡＸ番号</label>
				<input type="text" name="fld_fax" placeholder="080-1234-5678" <?php echo ( isset($_SESSION['form']['fld_fax']) ? $_SESSION['form']['fld_fax'] : '' ); ?>>
			</div>
			<div class="form-input">
				<label>メールアドレス<span class="req">*</span></label>
				<input type="email" name="fld_email" placeholder="youremail@address.com" <?php echo ( isset($_SESSION['form']['fld_email']) ? $_SESSION['form']['fld_email'] : '' ); ?> required>
			</div>
			<div class="form-input">
				<label>自己紹介</label>
				<textarea name="fld_ta_message" placeholder="職務経歴があれば記載ください" rows="8"><?php echo ( isset($_SESSION['form']['fld_ta_message']) ? $_SESSION['form']['fld_ta_message'] : '' );?></textarea>
			</div>
			<div class="mt-5 consent-input ps-3">
				<label for="consent" class="checkbox-container font-18 mb-0 ms-2 font-18 d-flex justify-content-start align-items-center" >
				<input class="ms-3" type="checkbox" name="consent" required id="consent"/>
				<span class="custom-checkbox"></span>
				<span class="ms-3 mt-1 txt-lbrown">プライバシーポリシーを確認しました。
					<a href="" class="txt-pink">
					<svg xmlns="http://www.w3.org/2000/svg" width="26.842" height="20.244" viewBox="0 0 26.842 20.244">
					  <g id="Group_1350" data-name="Group 1350" transform="translate(0 0.5)">
					    <g id="Rectangle_355" data-name="Rectangle 355" transform="translate(0 4.744)" fill="#fff" stroke="#eb6e9a" stroke-width="1">
					      <rect width="21" height="15" stroke="none"/>
					      <rect x="0.5" y="0.5" width="20" height="14" fill="none"/>
					    </g>
					    <path id="Path_167" data-name="Path 167" d="M-22121.645-662.5v-2.8h19.7v14.342h-3.176" transform="translate(22128.283 665.3)" fill="none" stroke="#eb6e9a" stroke-width="1"/>
					  </g>
					</svg>
					プライバシーポリシーはこちら</a>
					</span>
				</label>
			</div>
<?php
	        $google_recaptcha_sitekey = get_field('google_recaptcha_sitekey', 'option');
	        if ( ! empty($google_recaptcha_sitekey) ) :
?>
				<div class="g-recaptcha mt-4 ms-3 d-flex justify-content-start align-items-center" data-sitekey="<?php echo $google_recaptcha_sitekey; ?>"></div>
<?php
			endif;
?>
			<div class="form-btn mt-4">
				<button class="submit-btn ms-3" type="submit">送信する</button>
			</div>
			</form>
		</div>
	</div>
</section>

<?php 

	get_footer();
?>