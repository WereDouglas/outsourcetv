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
                                    <h3 class="page-title">Create Job</h3>
                                </div><!-- /padding -->
                            </section><!-- /content-section -->




                            <section class="content-section content-section">
                                <div class="content-section-block content-section-block-form">
                                    <div class="padding">
                                        <div class="content-login-wrapper">

                                            <div class="content-login-message">
                                                <!-- <h2>Send Us a Message</h2> -->
                                                <form id="station-form" class="flat-form flat-form-register wide-form"  name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/user/create_job'  method="post">            

                                                    <div class="form-item">
                                                        <label for="company-name">Job type<span class="required-field">*</span></label>

                                                        <select  class="form-element"  data-placeholder="" name="type" id="type">

                                                            <?php foreach ($services as $loop) { ?>
                                                                <option  value="<?= $loop->name; ?>" /><?= $loop->name; ?>
                                                            <?php } ?>
                                                        </select>

                                                    </div>

                                                    <div class="form-item">
                                                        <label for="website">Title<span class="required-field">*</span></label>
                                                        <input class="form-element" name="title" id="title" required placeholder="" type="text" />

                                                    </div>


                                                    <div class="form-item">
                                                        <label for="company-name">Job details: (no more than 20 words)<span class="required-field">*</span></label>
                                                        <br><textarea class="form-element" name="details" id="details" required placeholder=""></textarea>

                                                    </div>

                                                    <div class="form-item">
                                                        <button class="button" type="submit" name="submit">Submit job</button>
                                                        <a href="<?php echo base_url(); ?>index.php/user">Cancel</a>
                                                    </div>

                                                    <?php echo $this->session->flashdata('msg'); ?>
                                                </form>
                                            </div><!-- /content-login-message -->
                                            <table class=" jobs table table-striped table-bordered bootstrap-datatable datatable" id="datatable">
                                                <thead>
                                                    <tr>  
                                                        <th>Type</th>
                                                        <th>Title</th>
                                                        <th>details</th>                                                                        
                                                        <th>Created on:</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>   
                                                <tbody>

                                                    <?php
                                                    if (is_array($jobs) && count($jobs)) {
                                                        foreach ($jobs as $loop) {
                                                            ?>  
                                                            <tr>
                                                                <th><?= $loop->type ?></th>
                                                                <th><?= $loop->title ?></th>
                                                                <th><?= $loop->details ?></th>

                                                                <th><?= $loop->created ?></th>
                                                                <th></th>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>




                                                </tbody>
                                            </table>     
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