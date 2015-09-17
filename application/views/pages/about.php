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
                                    <h3 class="page-title">About Us</h3>
                                </div><!-- /padding -->
                            </section><!-- /content-section -->

                            <?php foreach ($abouts as $loop) { ?> 
                                <section class="content-section content-section">
                                    <div class="content-section-block">
                                        <div class="padding">

                                            <img class="inline-image-align-left" src="<?php echo base_url(); ?>uploads/<?=$loop->image;?>">

                                            <?php echo $loop->details;?>

                                        </div><!-- /padding -->
                                    </div><!-- /content-section-block -->
                                </section><!-- /content-section -->

                            <?php } ?>
                  

                        </div><!-- /padding -->
                    </div><!-- /content-main -->

                 <?php require_once(APPPATH . 'views/pages/adsblock.php'); ?>


                </div><!-- /content-block-inner -->
            </div><!-- /content-block -->

        </div><!-- /main-content -->
    </div><!-- /content-inner -->
</section>

<?php require_once(APPPATH . 'views/pages/footer.php'); ?>