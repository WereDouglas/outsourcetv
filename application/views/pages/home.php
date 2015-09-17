<?php require_once(APPPATH . 'views/pages/header.php'); ?>
<section class="content-wrapper wide">
    <div class="content-inner">	

        <div class="main-content">


            <div class="content-block content-block-content">
                <div class="content-block-inner">

                    <?php require_once(APPPATH . 'views/pages/profilesblock.php'); ?>

                    <div class="content-main">
                        <div class="padding">

                            <section class="content-section content-section-one slideshow">
                                <div class="padding">
                                    <div id="show" class="slideshow-wrapper">
                                         <?php  foreach ($banners as $loop) { if ($loop->type =='Banner'){   ?>
                                        <img  height="273px" width="628px" src="<?php echo base_url(); ?>uploads/<?=$loop->image?>">
                                      
 <?php } }?>
                                         <img src="<?php echo base_url(); ?>assets/images/slide-image-002.jpg">
                                        <img src="<?php echo base_url(); ?>assets/images/slide-image-003.jpg">
                                    </div><!-- /slideshow-wrapper -->
                                    <div class="slide-nav-controls">
                                        <ul id="show-nav">
                                            <li><a class="prev" href="#" title="Previous">Previous</a></li>
                                            <!-- <li><a class="pause" href="#" title="Pause">Pause</a></li> -->
                                            <li><a class="next" href="#" title="Next">Next</a></li>
                                        </ul>
                                        <ul id="index"></ul> <!-- #index -->
                                    </div>
                                </div><!-- /padding -->
                            </section><!-- /content-section -->


                            <section class="content-section content-section-two">
                                <div class="content-section-block content-section-block-news one">
                                    <div class="padding">
                                        <h3>News Events<span class="read-more-link"><a href="#">Read More</a></span></h3>
                                        <ul class="news-list">
                                            
                                             <?php  foreach ($news as $loop) {    ?>
  <li><a href="#"><span class="news-date"><?=$loop->created?></span><?=$loop->heading?></a></li>
                                          
                                      
 <?php } ?>
                                               </ul>
                                    </div><!-- /padding -->
                                </div><!-- /content-section-block -->


                                <div class="content-section-block content-section-block-jobs two">
                                    <div class="padding">
                                        <h3>Jobs<span class="read-more-link"><a href="<?php echo base_url(); ?>index.php/home/jobs">Read More</a></span></h3>
                                        <ul class="jobs-list bulleted">
                                              <?php  foreach ($jobs as $loop) {    ?> 
                                                   <li><a href="#"><?=$loop->title?></a></li>
                                                  <?php }?>
                                         
                                        </ul>
                                        <div>
                                            <?php if ($this->session->userdata('logged_in')) { ?>
                                            <a class="button" href="<?php echo base_url(); ?>index.php/user/job">Add Job</a>
                                            <?php }?>
                                        </div>
                                    </div><!-- /padding -->
                                </div><!-- /content-section-block -->

                            </section><!-- /content-section -->


                            <section class="content-section content-section-three equalize">

                                <div class="content-section-block content-section-block-services one">
                                    <div class="padding">
                                        <h3>Service Directory<span class="read-more-link"><a href="<?php echo base_url(); ?>index.php/home/service">Read More</a></span></h3>
                                        <ul class="services-list bulleted">
                                          <?php   foreach ($services as $loop) {    ?> 
                                                            <li><a href="<?php echo base_url(); ?>index.php/home/thisservice/<?=$loop->name?>"><?=$loop->name?></a></li>
							
                                                           <?php }?>  
                                            
                                            
                                        </ul>
                                    </div><!-- /padding -->
                                </div><!-- /content-section-block -->


                                <div class="content-section-block content-section-block-sale two">
                                    <div class="padding">
                                        <h3>Equipment for Sale<span class="read-more-link"><a href="<?php echo base_url(); ?>index.php/home/equipment">Read More</a></span></h3>
                                        <ul id="news" class="sale-list">
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
                                                    </div><!-- /product-item-content -->

                                                </div><!-- /product-item -->
			
									</li>                                                           <?php }?>
                                            
                                            
                                            
                                            
                                           
                                      
                                        </ul>
                                    </div><!-- /padding -->
                                </div><!-- /content-section-block -->


                            </section><!-- /content-section -->


                        </div><!-- /padding -->
                    </div><!-- /content-main -->

                    </div><!-- /content-block-inner -->
            </div><!-- /content-block -->

        </div><!-- /main-content -->
    </div><!-- /content-inner -->
</section>

<?php require_once(APPPATH . 'views/pages/footer.php'); ?>