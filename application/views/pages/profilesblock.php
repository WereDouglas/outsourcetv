							<aside class="content-side content-side-left">
								<ul class="profile-list">
								
                                                                           <?php  foreach ($jobs as $loop) {    ?> 
                                                            <li><a href="<?php echo base_url(); ?>index.php/home/thisservice/<?=$loop->name?>"><?=$loop->name?></a></li>
							<li class="odd">
										<div class="padding">
											<div class="profile-image">
                                                                                            <img height="88px" width="84px" src="<?php echo base_url(); ?>uploads/<?=$loop->image;?>">
											</div>
											<div class="profile-content">
												<span class="profile-content-title"><?=$loop->fname.' '.$loop->lname?></span>
												<span class="profile-content-role"><?=$loop->title?></span>
												<span class="profile-content-location"><?=$loop->country?></span>
											</div>
										</div><!-- /padding -->
									</li>
                                                           <?php }?>
                                                                        
                                                                        
								
								
								
								</ul>
							</aside><!-- /content-side -->