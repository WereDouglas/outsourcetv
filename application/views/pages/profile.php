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
											
										</div><!-- /padding -->
									</section><!-- /content-section -->





									<section class="content-section content-section">
										<div class="content-section-block">
											<div class="padding">

												
                                          
                                                      <?php
                                                       if (is_array($profile) && count($profile)) {
                                                        foreach ($profile as $loop) {

                                                            $email = $loop->email;
                                                            $username = $loop->username;
                                                            $lname = $loop->lname;
                                                            $fname = $loop->fname;
                                                            $name = $loop->lname.' '.$loop->fname;
                                                            $id = $loop->id;
                                                            $type = $loop->type;
                                                            $image = $loop->image;
                                                            if ($image==""){
                                                                
                                                                $image = "placeholder.jpg";
                                                            }
                                                              $active = $loop->active;
                                                                $created = $loop->created;
                                                            ?>  
                                                                                            <h1 style="font-size:18px;">  <?php echo $name. '<br> E-mail: '.$email; ?></h1>
                                                                                          <img style="float:left;" class="avatar" alt="" height="360px" width="260px" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>">
                                                                       
                                                                                          <div id="<?php echo $id; ?>" class="edit_tr">
                                                                  
                                                           <div class="profile">
                                                                           
                                                              
                                                                <div class="edit_td">
                                                                   USERNAME: <span id="username_<?php echo $id; ?>" class="text"><?php echo $username; ?></span>
                                                                    <input type="text" value="<?php echo $username; ?>" class="editbox" id="username_input_<?php echo $id; ?>"
                                                                </div>
                                                                           <br>
                                                                <div class="edit_td">
                                                                   LAST NAME: <span id="lname_<?php echo $id; ?>" class="text"><?php echo $lname; ?></span>
                                                                    <input type="text" value="<?php echo $lname; ?>" class="editbox" id="lname_input_<?php echo $id; ?>"
                                                                </div>  <br>
                                                                <div class="edit_td">
                                                                   FIRST NAME: <span id="fname_<?php echo $id; ?>" class="text"><?php echo $fname; ?></span>
                                                                    <input type="text" value="<?php echo $fname; ?>" class="editbox" id="fname_input_<?php echo $id; ?>"
                                                                </div>     <br>
                                                                 <div class="edit_td">
                                                                   MEMBERSHIP: <span id="type_<?php echo $id; ?>" class="text"><?php echo $type; ?></span>
                                                                    <input type="text" value="<?php echo $type; ?>" class="editbox" id="type_input_<?php echo $id; ?>"
                                                                </div>     <br>
                                                                 <div class="edit_td">
                                                                   STATUS <span id="active_<?php echo $id; ?>" class="text"><?php echo $active; ?></span>
                                                                    <input type="text" value="<?php echo $active; ?>" class="editbox" id="active_input_<?php echo $id; ?>"
                                                                </div>   <br>
                                                                 <div class="edit_td">
                                                                    <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                                                    <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                                                                </div>  <br>   
                                                                </div>
                                                            
                                                            </div>
                                                               <?php
                                                        }
                                                    }
                                                    ?>
                                                            
                                                            
						
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

<script src="<?= base_url(); ?>js/jquery-1.9.1.min.js"></script>
<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>js/jquery.min.js"></script>

        
<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#fname" + ID).hide();
            $("#fname_input_" + ID).show();
            
            $("#username" + ID).hide();
            $("#username_input_" + ID).show();

            $("#lname" + ID).hide();
            $("#lname_input_" + ID).show();
            
            $("#active" + ID).hide();
            $("#active_input_" + ID).show();

            $("#contact" + ID).hide();
            $("#contact_input_" + ID).show();


           

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var fname = $("#fname_input_" + ID).val();
            var username = $("#username_input_" + ID).val();
            var lname = $("#lname_input_" + ID).val();          
               var active = $("#active_input_" + ID).val();


            var dataString = 'id=' + ID + '&fname=' + fname + '&lname=' + lname + '&username=' + username+ '&active=' + active;
            $("#fname_" + ID).html('<img src="<?= base_url(); ?>img/loading.gif" />'); // Loading image
            $("#lname_" + ID).html('<img src="<?= base_url(); ?>img/loading.gif" />'); // Loading image
            $("#active_" + ID).html('<img src="<?= base_url(); ?>img/loading.gif" />'); // Loading image
           
            if (fname.length > 0 && lname.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/admin/user/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#fname_" + ID).html(fname);
                        $("#lname_" + ID).html(lname);
                        $("#username_" + ID).html(username);
                        $("#active_" + ID).html(active);
                     
                    }
                });
            }
            else
            {
                alert('Enter something.');
            }

        });

        // Edit input box click action
        $(".editbox").mouseup(function ()
        {
            return false
        });

        // Outside click action
        $(document).mouseup(function ()
        {
            $(".editbox").hide();
            $(".text").show();
        });

    });
</script>