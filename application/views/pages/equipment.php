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
											<h3 class="page-title">Equipment</h3>
										</div><!-- /padding -->
									</section><!-- /content-section -->




									<section class="content-section content-section">
										<div class="content-section-block">
											<div class="padding">
												<ul class="item-list equalize">
                                                                                                    
                                                        <?php  foreach ($equipments as $loop) {    ?> 
                                                          	<li>
										                                                                <div class="product-item">
                                                                                                                <div class="product-item-image">
                                                                                                                    <img src="<?php echo base_url(); ?>uploads/<?=$loop->picture?>">
                                                                                                                </div><!-- /product-item-image -->

                                                                                                                <div class="product-item-content">
                                                                                                                    <span class="product-item-content-name"><?=$loop->name?></span>
                                                                                                                    <span class="product-item-content-specs"><?=$loop->details?><?=' '.$loop->created?></span>
                                                                                                                    <span class="product-item-content-price"><?='Price:'.$loop->price?></span>
                                                                                                                    
                                                                                                                     <span class="profile-content-specs"><?=$loop->fname.' '.$loop->lname?></span>
                                                                                                                     <span class="profile-content-specs"><?=$loop->contact.' '.$loop->email.' Country: '.$loop->country?></span>
                                                                                                                </div><!-- /product-item-content -->

														</div><!-- /product-item -->
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