<?php require_once(APPPATH . 'views/pages/header.php'); ?>
		<section class="content-wrapper wide">
			<div class="content-inner">	

				<div class="main-content">

					<div class="content-block content-block-content">
						<div class="content-block-inner">

							<div class="content-main">
								<div class="padding">


									<section class="content-section content-section-page-title">
										<div class="padding">
											<h3 class="page-title">Create Job</h3>
										</div><!-- /padding -->
									</section><!-- /content-section -->




									<section class="content-section content-section">
										<div class="content-section-block content-section-block-form">
											<div class="padding">
												<div class="content-login-wrapper">

													<div class="content-login-message">
														<!-- <h2>Send Us a Message</h2> -->
														<?php $attributes = array("class" => "flat-form flat-form-register wide-form", "name" => "registerform"); ?>
														<?php  echo form_open('register/authenticate', $attributes); ?>

														<div class="form-item">
															<label for="username">Username<span class="required-field">*</span></label>
															<input class="form-element" name="username" id="username" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('username'); ?></div>
														</div>


														<div class="form-item">
															<label for="email">Email<span class="required-field">*</span></label>
															<input class="form-element" name="email" id="email" required placeholder="" type="email" />
															<div class="error-message"><?php echo form_error('email'); ?></div>
														</div>


														<div class="form-item">
															<label for="password">Password<span class="required-field">*</span></label>
															<input class="form-element" name="password" id="password" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('password'); ?></div>
														</div>


														<div class="form-item">
															<label for="retype-password">Retype Password<span class="required-field">*</span></label>
															<input class="form-element" name="confirm_password" id="retype-password" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('confirm_password'); ?></div>
														</div>


														<div class="form-item">
															<label for="fname">First Name<span class="required-field">*</span></label>
															<input class="form-element" name="fname" id="fname" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('fname'); ?></div>
														</div>


														<div class="form-item">
															<label for="lname">Last Name<span class="required-field">*</span></label>
															<input class="form-element" name="lname" id="lname" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('lname'); ?></div>
														</div>

														<!--
														<div class="form-item">
															<label for="company-name">Company Name<span class="required-field">*</span></label>
															<input class="form-element" name="companyname" id="company-name" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('companyname'); ?></div>
														</div>


														<div class="form-item">
															<label for="country">Country<span class="required-field">*</span></label>
															<select class="form-element" name="country" id="country" required>
																<option>- - Select Country - -</option>
															</select>
															<div class="error-message"><?php echo form_error('country'); ?></div>
														</div>


														<div class="form-item">
															<label for="phone">Phone<span class="required-field">*</span></label>
															<input class="form-element" name="phone" id="phone" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('phone'); ?></div>
														</div>


														<div class="form-item">
															<label for="website">Website<span class="required-field">*</span></label>
															<input class="form-element" name="website" id="website" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('website'); ?></div>
														</div>
													-->


														<div class="form-item">
															<label for="">Type Validation Code<span class="required-field">*</span></label>
															<input class="form-element" name="validation" id="validation" required placeholder="" type="text" />
															<div class="error-message"><?php echo form_error('validation'); ?></div>
														</div>


														<div class="form-item">
															<label for="">Jiberish text here!</label>
														</div>


														<div class="form-item">
															<?php echo form_checkbox('agree-terms', 'accept', FALSE, 'required'); ?>
															<label class="inline-label">I accept <a href="<?php echo base_url(); ?>#">terms of usage</a></label>
															<div class="error-message"><?php echo form_error('username'); ?></div>
														</div>

														<div class="form-item">
															<button class="button" type="submit" name="submit">Create Job</button>
															<a href="<?php echo base_url(); ?>index.php/user">Cancel</a>
														</div>

														<?php  echo form_close(); ?>

														<?php echo $this->session->flashdata('msg'); ?>
													</div><!-- /content-login-message -->

												</div><!-- /content-login-wrapper -->
											</div><!-- /padding -->
										</div><!-- /content-section-block -->
									</section><!-- /content-section -->


								</div><!-- /padding -->
							</div><!-- /content-main -->

							<?php $this->load->view('templates/adsblock'); ?>

						</div><!-- /content-block-inner -->
					</div><!-- /content-block -->

				</div><!-- /main-content -->
			</div><!-- /content-inner -->
		</section>

<?php require_once(APPPATH . 'views/pages/footer.php'); ?>