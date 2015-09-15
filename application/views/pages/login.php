<?php require_once(APPPATH . 'views/pages/header.php'); ?>
<section class="content-wrapper wide">
    <div class="content-inner">	

        <div class="main-content">

            <div class="content-block content-block-content">
                <div class="content-block-inner">

                    <div class="content-main">
                        <div class="padding">
                            <?php echo $this->session->flashdata('msg'); ?>

                            <section class="content-section content-section-page-title">
                                <div class="padding">
                                    <h3 class="page-title">Login</h3>
                                </div><!-- /padding -->
                            </section><!-- /content-section -->




                            <section class="content-section content-section">
                                <div class="content-section-block content-section-block-news one">
                                    <div class="padding">
                                        <div class="content-login-wrapper">

                                            <div class="content-login-message">
                                                <!-- <h2>Send Us a Message</h2> -->
                                                <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/user/login'  method="post">            

                                                    <div class="form-item">
                                                        <input class="form-element" name="email" id="email" required placeholder="email" type="text" />

                                                    </div>

                                                    <div class="form-item">
                                                        <input class="form-element" name="password" id="password" required placeholder="Password" type="password" />

                                                    </div>

                                                    <div class="form-item">
                                                        <button class="button" type="submit" name="submit">Sign In</button>
                                                    </div>


                                                    <p><a href="<?php echo base_url(); ?>index.php/user/register">Create Account</a></p>
                                                    <?php echo $this->session->flashdata('msg'); ?>
                                                </form>
                                            </div><!-- /content-login-message -->

                                        </div><!-- /content-login-wrapper -->
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

<?php require_once(APPPATH . 'views/pages/footer.php'); ?>