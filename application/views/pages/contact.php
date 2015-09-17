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
											<h3 class="page-title">Contact Us</h3>
										</div><!-- /padding -->
									</section><!-- /content-section -->

									<section class="content-section content-section">
										<div class="content-section-block content-section-block-news one">
											<div class="padding">
												<div class="content-contact-wrapper">

													<div class="content-contact-message">
														<!-- <h2>Send Us a Message</h2> -->
														<?php $attributes = array("class" => "flat-form flat-form-contact", "name" => "contactform"); ?>
														<?php  echo form_open('contact/message', $attributes); ?>

														<div class="form-item">
															<input class="form-element" name="name" id="name" required placeholder="Name" type="text" value="<?php echo set_value('name'); ?>" />
															<div class="error-message"><?php echo form_error('name'); ?></div>
														</div>

														<div class="form-item">
															<input class="form-element" name="email" id="email" required placeholder="Email" type="text" value="<?php echo set_value('email'); ?>" />
															<div class="error-message"><?php echo form_error('email'); ?></div>
														</div>

														<div class="form-item">
															<input class="form-element" name="subject" id="subject" required placeholder="Subject" type="text" value="<?php echo set_value('subject'); ?>" />
															<div class="error-message"><?php echo form_error('subject'); ?></div>
														</div>

														<div class="form-item">
															<textarea class="form-element" name="message" id="message" required placeholder="Message"><?php echo set_value('message'); ?></textarea>
															<div class="error-message"><?php echo form_error('message'); ?></div>
														</div>

														<div class="form-item">
															<button class="button" type="submit" name="submit">Send Message</button>
														</div>

														<?php  echo form_close(); ?>
														<?php echo $this->session->flashdata('msg'); ?>
													</div><!-- /content-contact-message -->

												</div><!-- /content-contact-wrapper -->
											</div><!-- /padding -->
										</div><!-- /content-section-block -->


										<div class="content-section-block content-section-block-jobs two">
											<div class="padding">
												<div class="content-contact-wrapper">
													<div class="content-contact-details">
														<ul>
                                                                                                                     <?php  foreach ($contacts as $loop) {    ?> 
                                                                                                                         <li><?=$loop->line1;?></li>
                                                                                                                           <li><?=$loop->line2;?></li>
                                                                                                                             <li><?=$loop->line3;?></li>
                                                                                                                                <li><?=$loop->line4;?></li>
                                                                                                                         <?php }?>
															
														</ul>
													</div><!-- /content-contact-details -->
												</div><!-- /content-contact-wrapper -->
											</div><!-- /padding -->
										</div><!-- /content-section-block -->

									</section><!-- /content-section -->


									<section class="content-section content-section">
										<div class="content-section-block content-section-block-map wide">
											<div class="padding">
												<div class="content-contact-wrapper">

													<div class="content-block content-block-map">
														<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1677.4859481366602!2d32.58776550919113!3d0.3190832511268962!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8593c44a441a98f3!2sKampala+Serena+Hotel!5e0!3m2!1sen!2s!4v1439838184358" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
													</div><!-- /content-block -->

												</div><!-- /content-contact-wrapper -->
											</div><!-- /padding -->
										</div><!-- /content-section-block -->
									</section><!-- /content-section -->


								</div><!-- /padding -->
							</div><!-- /content-main -->

						  <?php require_once(APPPATH . 'views/pages/adsblock.php'); ?>

						</div><!-- /content-block-inner -->
					</div><!-- /content-block -->

				</div><!-- /main-content -->
			</div><!-- /content-inner -->
		</section>

<?php require_once(APPPATH . 'views/pages/footer.php'); ?>