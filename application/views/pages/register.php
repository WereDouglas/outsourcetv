
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
                                    <h3 class="page-title">Register</h3>
                                </div><!-- /padding -->
                            </section><!-- /content-section -->




                            <section class="content-section content-section">
                                <div class="content-section-block content-section-block-form">
                                    <div class="padding">
                                        <div class="content-login-wrapper">
 <?php echo $this->session->flashdata('msg'); ?>
                                            <div class="content-login-message">
                                <form id="station-form" class="flat-form flat-form-register wide-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/user/create'  method="post">            
                                <fieldset>
                                  
                                             <div class="form-item control-group">
                                        <label class="control-label" for="focusedInput">E-mail</label>
                                        <div class="controls">
                                            <input class="focused form-element" name="email" id="email"  type="text">
                                        </div>
                                    </div>
                                    <div class="form-item control-group">
                                        <label class="control-label" for="fileInput">Profile picture</label>
                                        <div class="controls">
                                            <input class="input-file uniform_on form-element" id="imgfile" name="imgfile" type="file">
                                        </div>
                                        <img id="preview"  width=150px" height="150px" src="<?= base_url(); ?>img/placeholder.jpg" alt=" Your profile passport image" />

                                    </div> 
                                 
                                   
                                          <div class="form-item control-group">
                                        <label class="control-label">Username</label>
                                        <div class="controls">
                                            <input class="focused form-element" id="username" name="username" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-item control-group">
                                        <label class="control-label">First name</label>
                                        <div class="controls">
                                            <input class="focused form-element" id="fname" name="fname" type="text" >
                                        </div>
                                    </div>
                                    <div class=" form-item control-group">
                                        <label class="control-label">Last name</label>
                                        <div class="controls">
                                            <input class="focused form-element" id="lname" name="lname" type="text">
                                        </div>
                                    </div>
                                        
                                  
                                        
                                           <div class="form-item control-group">
                                        <label class="control-label" for="selectError3">User type</label>
                                        <div class="controls">
                                            <select class="form-element" id="type" name="type">                                               
                                                <option>Member</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-item control-group">
                                        <label class="control-label" for="focusedInput">Password</label>
                                        <div class="controls">
                                            <input class="form-element focused" id="password" name="password" type="password" >
                                        </div>
                                        <div class="controls">
                                            <input class="form-element focused" id="password2" name="password2" type="password" placeholder="confirm password" >
                                        </div>
                                    </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button class="btn">Cancel</button>
                                  
                                    
                                 
                                </fieldset>
                            </form>                            </div><!-- /content-login-message -->

                                        </div><!-- /content-login-wrapper -->
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