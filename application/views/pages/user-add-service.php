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
                                    <h3 class="page-title">Create a Service</h3>
                                </div><!-- /padding -->
                            </section><!-- /content-section -->




                            <section class="content-section content-section">
                                <div class="content-section-block content-section-block-form">
                                    <div class="padding">
                                        <div class="content-login-wrapper">

                                            <div class="content-login-message">
                                                <!-- <h2>Send Us a Message</h2> -->
                                                <form id="station-form" class="flat-form flat-form-register wide-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/user/create_service'  method="post">            

                                                    <div class="form-item">
                                                        <label for="username">Person / Company Name<span class="required-field">*</span></label>
                                                        <input class="form-element" name="company" id="company" required placeholder="" type="text" />

                                                    </div>


                                                    <div class="form-item">
                                                        <label for="email">Contact Name<span class="required-field">*</span></label>
                                                        <input class="form-element" name="contact" id="contact" required placeholder=""  />

                                                    </div>


                                                    <div class="form-item">
                                                        <label for="password">Country<span class="required-field">*</span></label>
                                                        <input class="form-element" name="country" id="country" required placeholder="" type="text" />

                                                    </div>


                                                    <div class="form-item">
                                                        <label for="retype-password">Telephone/ Mobile No<span class="required-field">*</span></label>
                                                        <input class="form-element" name="telephone" id="telephone" required placeholder="" type="text" />

                                                    </div>

                                                    <div class="form-item">
                                                        <label for="lname">Email:<span class="required-field">*</span></label>
                                                        <input class="form-element" name="email" id="email" required placeholder="" type="text" />

                                                    </div>


                                                    <div class="form-item">
                                                        <label for="website">Website<span class="required-field">*</span></label>
                                                        <input class="form-element" name="website" id="website" required placeholder="" type="text" />

                                                    </div>



                                                    <div class="form-item">
                                                        <label for="company-name">Service details: (no more than 20 words)<span class="required-field">*</span></label>
                                                        <textarea class="form-element" name="details" id="details" required placeholder=""></textarea>

                                                    </div>
                                                    <select  class="form-element"  data-placeholder="" name="service" id="service">

                                                        <?php foreach ($services as $loop) { ?>
                                                            <option  value="<?= $loop->name; ?>" /><?= $loop->name; ?>
                                                        <?php } ?>
                                                    </select>

                                                    <div class="form-item">
                                                        <button class="button" type="submit" name="submit">Create Service</button>
                                                        <a href="<?php echo base_url(); ?>index.php/user">Cancel</a>
                                                    </div>

                                                    <?php echo $this->session->flashdata('msg'); ?>
                                                </form>
                                            </div><!-- /content-login-message -->
    <table class="CSSTableGenerator" id="datatable">
						  <thead>
							  <tr>  
                                                              <th>Company</th>
								   <th>Web site</th>
                                                                      <th>details</th>
                                                                         <th>Service</th>
                                                                            <th>Active</th>
                                                                          <th>Created on:</th>
                                                                            <th>Action</th>
								
							  </tr>
						  </thead>   
						  <tbody>
                                                      
                                                      <?php
                                                       if (is_array($serv) && count($serv)) {
                                                        foreach ($serv as $loop) {                                                         
                                                           
                                                            ?>  
                                                <tr>
                                                       <th><?=$loop->company?></th>
								   <th><?=$loop->website?></th>
                                                                      <th><?=$loop->details?></th>
                                                                         <th><?=$loop->service?></th>
                                                                            <th><?=$loop->active?></th>
                                                                          <th><?=$loop->created?></th>
                                                                            <th>
                                                                                
                                                                                <a class="btn btn-danger" href="<?php echo base_url() . "index.php/user/delete/memberservice/" .$loop->id; ?>">
                                                                                    <i class="halflings-icon white trash">Remove</i> </a>
								</th>
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