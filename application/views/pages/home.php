<?php require_once(APPPATH . 'views/pages/header.php'); ?>
<section class="content-wrapper wide">
    <div class="content-inner">	

        <div class="main-content">


            <div class="content-block content-block-content">
                <div class="content-block-inner">

                    <?php $this->load->view('pages/profilesblock'); ?>

                    <div class="content-main">
                        <div class="padding">

                            <section class="content-section content-section-one slideshow">
                                <div class="padding">
                                    <div id="show" class="slideshow-wrapper">
                                        <img src="<?php echo base_url(); ?>assets/images/slide-image-001.jpg">
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
                                            <li><a href="#"><span class="news-date">01.08.2015</span> President Y.K. Museveni picks forms</a></li>
                                            <li><a href="#"><span class="news-date">01.08.2015</span> Obama in Kenya.</a></li>
                                            <li><a href="#"><span class="news-date">01.08.2015</span> The Siria War.</a></li>
                                            <li><a href="#"><span class="news-date">01.08.2015</span> President Y.K. Museveni picks forms</a></li>
                                            <li><a href="#"><span class="news-date">01.08.2015</span> Obama in Kenya.</a></li>
                                            <li><a href="#"><span class="news-date">02.08.2015</span> The Siria War.</a></li>
                                        </ul>
                                    </div><!-- /padding -->
                                </div><!-- /content-section-block -->


                                <div class="content-section-block content-section-block-jobs two">
                                    <div class="padding">
                                        <h3>Jobs<span class="read-more-link"><a href="#">Read More</a></span></h3>
                                        <ul class="jobs-list bulleted">
                                            <li><a href="#">Camera Man Needed</a></li>
                                            <li><a href="#">Graphics Editor</a></li>
                                            <li><a href="#">News Intern Needed</a></li>
                                            <li><a href="#">News Editor</a></li>
                                            <li><a href="#">Journalist with skills in</a></li>
                                        </ul>
                                        <div>
                                            <a class="button" href="#">Add Job</a>
                                        </div>
                                    </div><!-- /padding -->
                                </div><!-- /content-section-block -->

                            </section><!-- /content-section -->


                            <section class="content-section content-section-three equalize">

                                <div class="content-section-block content-section-block-services one">
                                    <div class="padding">
                                        <h3>Service Directory<span class="read-more-link"><a href="#">Read More</a></span></h3>
                                        <ul class="services-list bulleted">
                                            <li><a href="#">Jobs</a></li>
                                            <li><a href="#">Camera Crew</a></li>
                                            <li><a href="#">Equipment Hire</a></li>
                                            <li><a href="#">Equipmet Sale</a></li>
                                            <li><a href="#">Outside Broadcast Facilities</a></li>
                                            <li><a href="#">SNG Uplink Providers</a></li>
                                            <li><a href="#">Cellular Uplink</a></li>
                                            <li><a href="#">Equipmet Sale</a></li>
                                            <li><a href="#">IP streaming</a></li>
                                        </ul>
                                    </div><!-- /padding -->
                                </div><!-- /content-section-block -->


                                <div class="content-section-block content-section-block-sale two">
                                    <div class="padding">
                                        <h3>Equipment for Sale<span class="read-more-link"><a href="#">Read More</a></span></h3>
                                        <ul id="news" class="sale-list">
                                            <li>
                                                <div class="product-item">
                                                    <div class="product-item-image">
                                                        <img src="<?php echo base_url(); ?>assets/images/sale-image-001.png">
                                                    </div><!-- /product-item-image -->

                                                    <div class="product-item-content">
                                                        <span class="product-item-content-name">Sony HDV</span>
                                                        <span class="product-item-content-specs">Battery, Flashlight...</span>
                                                        <span class="product-item-content-price">USD 480</span>
                                                    </div><!-- /product-item-content -->

                                                </div><!-- /product-item -->
                                            </li>
                                            <li>
                                                <div class="product-item">
                                                    <div class="product-item-image">
                                                        <img src="<?php echo base_url(); ?>assets/images/sale-image-001.png">
                                                    </div><!-- /product-item-image -->

                                                    <div class="product-item-content">
                                                        <span class="product-item-content-name">Sony HDV</span>
                                                        <span class="product-item-content-specs">Battery, Flashlight...</span>
                                                        <span class="product-item-content-price">USD 348</span>
                                                    </div><!-- /product-item-content -->

                                                </div><!-- /product-item -->
                                            </li>
                                            <li>
                                                <div class="product-item">
                                                    <div class="product-item-image">
                                                        <img src="<?php echo base_url(); ?>assets/images/sale-image-001.png">
                                                    </div><!-- /product-item-image -->

                                                    <div class="product-item-content">
                                                        <span class="product-item-content-name">Sony HDV</span>
                                                        <span class="product-item-content-specs">Battery, Flashlight...</span>
                                                        <span class="product-item-content-price">USD 590</span>
                                                    </div><!-- /product-item-content -->

                                                </div><!-- /product-item -->
                                            </li>
                                            <li>
                                                <div class="product-item">
                                                    <div class="product-item-image">
                                                        <img src="<?php echo base_url(); ?>assets/images/sale-image-001.png">
                                                    </div><!-- /product-item-image -->

                                                    <div class="product-item-content">
                                                        <span class="product-item-content-name">Sony HDV</span>
                                                        <span class="product-item-content-specs">Battery, Flashlight...</span>
                                                        <span class="product-item-content-price">USD 600</span>
                                                    </div><!-- /product-item-content -->

                                                </div><!-- /product-item -->
                                            </li>
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