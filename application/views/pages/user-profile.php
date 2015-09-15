
		<section class="content-wrapper wide">
			<div class="content-inner">	

				<div class="main-content">

					<div class="content-block content-block-content">
						<div class="content-block-inner">

							<div class="content-main">
								<div class="padding">


									<section class="content-section content-section-page-title">
										<div class="padding">
											<h3 class="page-title">My Profile<span class="read-more-link"><a href="<?php echo base_url(); ?>index.php/user/edit-profile/1">Edit Profile</a></span></h3>
										</div><!-- /padding -->
									</section><!-- /content-section -->


									<section class="content-section content-section-wide wide">
										<div class="content-section-block">
											<div class="padding">

												<div class="profile-wrapper">

													<h4 class="article-title">John Doe</h4>

													<div class="profile-wrapper-image">
														<img src="<?php echo base_url(); ?>assets/images/profile-image.png">
													</div>

													<div class="profile-wrapper-details">
														<ul class="summary-list columns-two">
															<li><span>Email:</span> john@mail.com</li>
															<li><span>Company:</span> Camera 4 All</li>
															<li><span>Country:</span> Uganda</li>
															<li><span>Phone:</span> +256 782 123456</li>
															<li><span>Website:</span> www.camera4all.com</li>
														</ul>
													</div>
												</div><!-- /profile-wrapper -->

											</div><!-- /padding -->
										</div><!-- /content-section-block -->
									</section><!-- /content-section -->


									<section class="content-section content-section-wide wide">
										<div class="content-section-block">
											<div class="padding">

												<div class="tabs-block">

													<div class="tabs-links">
														<ul class="tabs">
															<li class="active"><a href="#tab1">My Services</a></li>
															<li><a href="#tab2">My Jobs</a></li>
															<li><a href="#tab3">My Items</a></li>
														</ul>
													</div>

													<div class="tab-container">

														<div id="tab1" class="tab-content" style="display: block;">
															<a href="<?php echo base_url(); ?>index.php/user/add-service">Add Service</a>

															<div class="block-table">
																<div class="block-table-content">
																	<?php $this->table->set_heading('Date', 'Service Name', 'Action'); ?>
																	<?php $table_array = array(
																		array('05-08-2015', 'Camera Crew', 'Action Edit'),
																		array('05-08-2015', 'Camera Crew', 'Action Edit'),
																		array('05-08-2015', 'Camera Crew', 'Action Edit')
																	); ?>
																	<?php echo $this->table->generate($table_array); ?>
																</div><!-- block-table-content -->
															</div><!-- /block-table -->

														</div><!-- /tab-content -->
															

														<div id="tab2" class="tab-content" style="display: none;">
															<a href="<?php echo base_url(); ?>index.php/user/add-job">Add Job</a>
														
															<div class="block-table">
																<div class="block-table-content">
																	<?php $this->table->set_heading('Date', 'Service Name', 'Action'); ?>
																	<?php $table_array = array(
																		array('05-08-2015', 'Camera Crew', 'Action Edit'),
																		array('05-08-2015', 'Camera Crew', 'Action Edit'),
																		array('05-08-2015', 'Camera Crew', 'Action Edit')
																	); ?>
																	<?php echo $this->table->generate($table_array); ?>
																</div><!-- block-table-content -->
															</div><!-- /block-table -->

														</div><!-- /tab-content -->
															

														<div id="tab3" class="tab-content" style="display: none;">
															<a href="<?php echo base_url(); ?>index.php/user/add-item">Add Item</a>
														
															<div class="block-table">
																<div class="block-table-content">
																	<?php $this->table->set_heading('Date', 'Service Name', 'Action'); ?>
																	<?php $table_array = array(
																		array('05-08-2015', 'Camera Crew', 'Action Edit'),
																		array('05-08-2015', 'Camera Crew', 'Action Edit'),
																		array('05-08-2015', 'Camera Crew', 'Action Edit')
																	); ?>
																	<?php echo $this->table->generate($table_array); ?>
																</div><!-- block-table-content -->
															</div><!-- /block-table -->
															
														</div><!-- /tab-content -->

													</div><!-- /tab-container -->

												</div>

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

