<?php 
	/* Template Name: Contact */
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

	get_header();
?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<section class="text-bg-top img-cover-white"
		style="background-image: url('<?php echo $template_uri; ?>/img/top-main.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="caption">
						<h2 class="text-jp">お問い合わせ</h2>
						<h2 class="text-eng">&lt;theme&gt;/p_Contact.php</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="feedback" class="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="title-text">Feel Free To Contact Us</h2>
<?php
			if ( ! is_null($form_result) ) {
				echo '<div class="contact-result ' . ($form_result === FALSE ? 'failed' : 'success') . '">';
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
					<form class="contact-form col-md-12" id="contact" method="POST"
							action="<?php echo $template_uri; ?>/php/process-contact.php">
						<div class="row input-item">
							<div class="col-md-4 label-title">
								<label>Name</label>
							</div>
							<div class="col-md-8 box-input">
								<input type="text" name="fld_name" placeholder="Name..." required
									value="<?php echo ( isset($_SESSION['form']['fld_name']) ?
										$_SESSION['form']['fld_name'] : '' ); ?>">
							</div>
						</div>
						<div class="row input-item">
							<div class="col-md-4 label-title">
								<label>E-mail</label>
							</div>
							<div class="col-md-8 box-input">
								<input type="text" name="fld_email" placeholder="E-mail..." required
									value="<?php echo ( isset($_SESSION['form']['fld_email']) ?
										$_SESSION['form']['fld_email'] : '' ); ?>">
							</div>
						</div>
						<div class="row input-item">
							<div class="col-md-4 label-title">
								<label>Phone</label>
							</div>
							<div class="col-md-8 box-input ">
								<input type="text" name="fld_phone" placeholder="Phone" required
									value="<?php echo ( isset($_SESSION['form']['fld_phone']) ?
										$_SESSION['form']['fld_phone'] : '' ); ?>">
							</div>
						</div>
						<div class="row input-item">
							<div class="col-md-4 label-title">
								<label>Company</label>
							</div>
							<div class="col-md-8 box-input">
								<input type="text" name="fld_company" placeholder="Company..." required
									value="<?php echo ( isset($_SESSION['form']['fld_company']) ?
										$_SESSION['form']['fld_company'] : '' ); ?>">
							</div>
						</div>
						<div class="row input-item">
							<div class="col-md-4 label-title">
								<label>Address</label>
							</div>
							<div class="col-md-8 box-input">
								<input type="text" name="fld_address" placeholder="Address..." required
									value="<?php echo ( isset($_SESSION['form']['fld_address']) ?
										$_SESSION['form']['fld_address'] : '' ); ?>">
							</div>
						</div>
						<div class="row input-item">
							<div class="col-md-4 label-title">
								<label>Message</label>
							</div>
							<div class="col-md-8 box-input wide-input">
								<textarea id="" name="fld_ta_message" placeholder="Message"><?php
									echo ( isset($_SESSION['form']['fld_ta_message']) ?
										$_SESSION['form']['fld_ta_message'] : '' );
								?></textarea>
							</div>
						</div>
						<div class="box-btn-block">
							<button class="btn-pink" type="submit" form="contact" value="Submit">Submit</button>
						</div>
<?php
				        $google_recaptcha_sitekey = get_field('google_recaptcha_sitekey', 'option');
				        if ( ! empty($google_recaptcha_sitekey) ) :
?>
							<div class="g-recaptcha" data-sitekey="<?php echo $google_recaptcha_sitekey; ?>"></div>
<?php
						endif;
?>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php 
	$_SESSION['form'] = array();
	get_footer();
?>