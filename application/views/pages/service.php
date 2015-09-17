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
											<h3 class="page-title"><?php echo $service.' '?>Service Directory</h3>
										</div><!-- /padding -->
									</section><!-- /content-section -->


   <?php// var_dump($memberservices);   ?> 
                                                       	<section class="content-section content-section">
										<div class="content-section-block">
											<div class="padding">
												
												<ul class="news-list columns-two">
                                                                                                   
                                                                                                    <?php  foreach ($memberservices as $loop2){  ?> 
                                                                                                   
                                                                                                    <li>  <div class="profile-image" style="margin-right:10px;">
                                                                                            <img height="88px" width="84px" src="<?php echo base_url(); ?>uploads/<?=$loop2->image;?>">
											</div><a href="#"><span><?=$loop2->country?></span> <?=$loop2->details.' Created on:'.$loop2->created.' Contact:'.$loop2->contact.' Website:'.$loop2->website;?></a></li>
												<p> </p>	
                                                                                                    <?php }?>
                                                                                                    
                                                                                                    
                                                                                                    
												</ul>
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