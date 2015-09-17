							<aside class="content-side content-side-right">
								<div class="padding">
                                                                     <?php  foreach ($banners as $looper) { if ($looper->type =="Advert"){   ?>
                                                                    <div class="block-ad double">
										
                                                                                 <p><img  height="328px" width="265px" src="<?php echo base_url(); ?>uploads/<?=$looper->image?>">
								</p>
                                                                    </div><!-- /block-ad --><br>
                                       
                                      
 <?php } }?>

									


								</div><!-- /padding -->
							</aside><!-- /content-side -->