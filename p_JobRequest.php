<?php 
	/* Template Name: JobRequest */
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
				<h1 class="cover-txt txt-brown text-center mb-0">Job Request<span>ご依頼はこちら</span></h1>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/breadcrumb', 'section'); ?>


<section class="job-request section-padding wow animate__fadeIn" data-wow-duration="1s">
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
		<div class="col-8 offset-2">
			<p class="font-20 txt-brown1">弊社では、広くお客様のご意見・ご感想・ご質問などをお伺いしたいと考えております。どうぞお気軽にお問い合わせください。
			<br>内容によっては、回答をさしあげるのにお時間をいただくこともございます。
			<br>お問い合わせいただく前に、<a href="#" class="txt-pink">プライバシーポリシー</a>をご確認ください。* は必須項目です。
			</p>
		</div>
		<div class="contact-box mt-5">
			<h2>お仕事のご依頼フォーム</h2>
			<form id="jobrequest-contact" method="POST" action="<?php echo $template_uri; ?>/php/process-jobrequest.php">
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
			<div class="form-input checkbox-input">
				<label>お問い合わせ項目<span class="req">*</span><span class="label-desc">（ご選択ください）</span></label>
				<div class="checkbox-item mt-4">
					<ul class="list-unset d-flex flex-wrap justify-content-start align-items-start">
						<li class="checkbox-container mb-3">
							<label for="opt1" class="mt-1">
							<input type="checkbox" value="著作物の利用について" class="check-input" name="fld_opt1" id="opt1"/>
							<span class="custom-checkbox"></span>
							著作物の利用について</label>
						</li>
						<li class="checkbox-container mb-3">
							<label for="opt2" class="mt-1">
							<input type="checkbox" value="メディア出演依頼" class="check-input" name="fld_opt2" id="opt2"/>
							<span class="custom-checkbox"></span>
							メディア出演依頼</label>
						</li>
						<li class="checkbox-container mb-3">
							<label for="opt3" class="mt-1">
							<input type="checkbox" value="お仕事の依頼" class="check-input" name="fld_opt3" id="opt3"/>
							<span class="custom-checkbox"></span>
							お仕事の依頼</label>
						</li>
						<li class="checkbox-container mb-3">
							<label for="opt4" class="mt-1">
							<input type="checkbox" value="採用" class="check-input" name="fld_opt4" id="opt4"/>
							<span class="custom-checkbox"></span>
							採用</label>
						</li>
						<li class="checkbox-container mb-3">
							<label for="opt5" class="mt-1">
							<input type="checkbox" value="その他" class="check-input" name="fld_opt5" id="opt5"/>
							<span class="custom-checkbox"></span>
							その他</label>
						</li>
					</ul>
				</div>
			</div>
			<div class="form-input">
				<label>お問い合わせ内容</label>
				<textarea name="fld_ta_message" placeholder="お問い合わせ内容" rows="5"><?php echo ( isset($_SESSION['form']['fld_ta_message']) ? $_SESSION['form']['fld_ta_message'] : '' );?></textarea>
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
				<input type="hidden" name="fld_checkitem" id="checkitem" value=""/>
				<button class="submit-btn ms-3" type="submit">送信する</button>
			</div>
			</form>
		</div>
	</div>
</section>

<?php 

	get_footer();
?>