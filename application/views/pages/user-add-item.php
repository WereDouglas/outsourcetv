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
                                    <h3 class="page-title">Create Item</h3>
                                </div><!-- /padding -->
                            </section><!-- /content-section -->
                            <section class="content-section content-section">
                                <div class="content-section-block content-section-block-form">
                                    <div class="padding">
                                        <div class="content-login-wrapper">

                                            <div class="content-login-message">
                              <form id="station-form" class="flat-form flat-form-register wide-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/user/create_item'  method="post">            
                                <fieldset>
                                
                                        <div class=" form-item control-group">
                                        <label class="control-label">Name</label>
                                     
                                            <input class=" form-element focused" id="name" name="name" type="text" >
                                      
                                    </div>  
                                    
                                      <div class="form-item control-group">
                                        <label class="control-label">Country</label>                                       
                                            <input class=" form-element focused" id="country" name="country" type="text" >
                                       
                                    </div>    
                                     <div class="form-item control-group">
                                        <label class="control-label">Price</label>
                                       
                                            <input class=" form-element focused" id="price" name="price" type="text" >
                                        
                                    </div>
                                      <div class="form-item">
                                                    <select  class="form-element"  data-placeholder="" name="transaction" id="transaction">

                                                        <?php foreach ($trans as $loop) { ?>
                                                            <option class=" form-element focused" value="<?= $loop->name; ?>" /><?= $loop->name; ?>
                                                        <?php } ?>
                                                    </select>
                                      </div>
                                                    <div class="form-item">
                                                        <label for="company-name">Item transaction details: (no more than 20 words)</label>
                                                       <textarea class="form-element form-element" name="details" id="details" required placeholder=""></textarea>

                                                    </div>
                                    
                                                                    
                                           <div class="form-item control-group">
                                        <label class="control-label" for="fileInput">File input</label>
                                     
                                            <input class="form-element input-file " id="imgfile" name="imgfile" type="file">
                                      
                                        <img id="preview"  width=150px" height="150px" src="<?= base_url(); ?>uploads/sale.jpg" alt="sale image" />

                                    </div>
                                   
                                                                      
                                
                                        <button type="submit" class="btn btn-primary">Submit </button>
                                        <button class="btn">Cancel</button>
                                  
                                
                                  
                                 
                                 
                                    
                                 
                                </fieldset>
                            </form>

                       
                                                <?php echo $this->session->flashdata('msg'); ?>
                                            </div><!-- /content-login-message -->
  <table class="jobs" id="datatable">
                                                <thead>
                                                    <tr> 
                                                       <th></th>
                                                        
                                                         <th>Name</th>
                                                         <th>Transaction</th>
                                                        <th>Price</th>
                                                        <th>details</th>                                                                        
                                                        <th>Created on:</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>   
                                                <tbody>

                                                    <?php
                                                    if (is_array($equip) && count($equip)) {
                                                        foreach ($equip as $loop) {
                                                            ?>  
                                                            <tr>
                                                                <th><img class="avatar" alt="" height="60px" width="60px" src="<?php echo base_url(); ?>uploads/<?php echo $loop->image; ?>">
								</th>
                                                                <th><?= $loop->name ?></th>
                                                                <th><?= $loop->transaction ?></th>
                                                                <th><?= $loop->price ?></th>
                                                                <th><?= $loop->details ?></th>
                                                                <th><?= $loop->created ?></th>
                                                                <th>  <a class="btn btn-danger" href="<?php echo base_url() . "index.php/user/delete/equipment/" .$loop->id; ?>">
                                                                                    <i class="halflings-icon white trash">Remove</i> </a></th>
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
<script src="<?= base_url(); ?>js/jquery-1.9.1.min.js"></script>
<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>js/jquery.min.js"></script>
	<script src='<?= base_url(); ?>js/jquery.dataTables.min.js'></script>

<script type="text/javascript">


    $("#imgfile").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>