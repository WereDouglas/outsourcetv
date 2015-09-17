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
											<h3 class="page-title">Jobs<span class="read-more-link"><a href="#">Add Job</a></span></h3>
										</div><!-- /padding -->
									</section><!-- /content-section -->


									<section class="content-section content-section">
										<div class="content-section-block">
											<div class="padding">
												<ul class="news-list columns-two">
                                                                                                                            <?php  foreach ($jobs as $loop) {    ?> 
                                                            <li><a href="<?php echo base_url(); ?>index.php/home/thisservice/<?=$loop->name?>"><?=$loop->name?></a></li>
							<li class="odds">
										<div class="padding">
											<div class="profile-image">
                                                                                            <img height="88px" width="84px" src="<?php echo base_url(); ?>uploads/<?=$loop->image;?>">
											</div>
											<div class="profile-content">
												<span class="profile-content-title"><?=$loop->fname.' '.$loop->lname?></span>
												<span class="profile-content-role"><?=$loop->title.' Created on:'.$loop->created?></span>
												<span class="profile-content-location"><?=$loop->type.' '.$loop->country?></span>
                                                                                                <span class="profile-content-location"><?=$loop->details.' '?></span>
											</div>
										</div><!-- /padding -->
									</li>                                                           <?php }?>
													
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