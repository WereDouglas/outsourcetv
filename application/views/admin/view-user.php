<link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link id="bootstrap-style" href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link id="base-style-responsive" href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
<!-- end: CSS -->

<link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">

<?php echo $this->session->flashdata('msg'); ?>
<div class="row-fluid">
    <div class="span12 widget-container-span">
        <div class="alert alert-block alert-info span12 ">     
            User
            <div class="btn-toolbar ">

                <a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

                    <button class="btn btn-default btn-default">
                        <i class="icon-save bigger-125"></i>
                        Add
                    </button></a>
                <a href="#collapseThree" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

                    <button class="btn btn-default btn-default">
                        <i class="icon-list bigger-110"></i>
                        List
                    </button>
                </a>


            </div>
        </div>

        <div class="widget-main ">
            <div id="accordion2" class="accordion">              

                <div class="accordion-group">
                    <div class="accordion-body collapse" id="collapseTwo">
                        <div class="accordion-inner">

                            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/admin/user/create'  method="post">            
                                <fieldset>
                                    <div class="span4">
                                             <div class="control-group">
                                        <label class="control-label" for="focusedInput">E-mail</label>
                                        <div class="controls">
                                            <input class="focused" name="email" id="email"  type="text">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="fileInput">File input</label>
                                        <div class="controls">
                                            <input class="input-file uniform_on" id="imgfile" name="imgfile" type="file">
                                        </div>
                                        <img id="preview"  width=150px" height="150px" src="<?= base_url(); ?>img/placeholder.jpg" alt=" Your profile passport image" />

                                    </div> 
                                    </div>
                                    <div class="span4">
                                          <div class="control-group">
                                        <label class="control-label">Username</label>
                                        <div class="controls">
                                            <input class="focused" id="username" name="username" type="text" >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">First name</label>
                                        <div class="controls">
                                            <input class="focused" id="fname" name="fname" type="text" >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Last name</label>
                                        <div class="controls">
                                            <input class="focused" id="lname" name="lname" type="text">
                                        </div>
                                    </div>
                                        
                                    </div>
                                    <div class="span4">
                                        
                                           <div class="control-group">
                                        <label class="control-label" for="selectError3">User type</label>
                                        <div class="controls">
                                            <select id="type" name="type">
                                                <option>Administrator</option>
                                                <option>Member</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="focusedInput">Password</label>
                                        <div class="controls">
                                            <input class="focused" id="password" name="password" type="password" >
                                        </div>
                                        <div class="controls">
                                            <input class="focused" id="password2" name="password2" type="password" placeholder="confirm password" >
                                        </div>
                                    </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button class="btn">Cancel</button>
                                  
                                    </div>
                                 
                                </fieldset>
                            </form>

                        </div><!-- /.box -->


                    </div>
                </div>
            </div>

            <div class="accordion-group">


                <div class="accordion-body collapsed" id="collapseThree">
                    <div class="accordion-inner">
                     	<div class="row-fluid sortable">		
				
				
					<div class="box-content">
                                            <table class="table table-striped table-bordered bootstrap-datatable datatable" id="datatable">
						  <thead>
							  <tr>  <th></th>
								  <th>E-mail</th>
								  <th>Username</th>
								  <th>Last name</th>
								  <th>First name</th>
                                                                    <th>User type</th>
                                                                       <th>Active?</th>
                                                                          <th>Created on:</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      
                                                      <?php
                                                       if (is_array($users) && count($users)) {
                                                        foreach ($users as $loop) {

                                                            $email = $loop->email;
                                                            $username = $loop->username;
                                                            $lname = $loop->lname;
                                                            $fname = $loop->fname;
                                                            $id = $loop->id;
                                                            $type = $loop->type;
                                                            $image = $loop->image;
                                                            if ($image==""){
                                                                
                                                                $image = "placeholder.jpg";
                                                            }
                                                              $active = $loop->active;
                                                                $created = $loop->created;
                                                            ?>  
                                                               <tr id="<?php echo $id; ?>" class="edit_tr">
                                                                   <td><a href="#">
                                                                           <img class="avatar" alt="Dennis Ji" height="60px" width="60px" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>">
								</a></td>
                                                                <td class="edit_td">
                                                                    <span id="email_<?php echo $id; ?>" class="text"><?php echo $email; ?></span>
                                                                    <input type="text" value="<?php echo $email; ?>" class="editbox" id="email_input_<?php echo $id; ?>"
                                                                </td>
                                                                <td class="edit_td">
                                                                    <span id="username_<?php echo $id; ?>" class="text"><?php echo $username; ?></span>
                                                                    <input type="text" value="<?php echo $username; ?>" class="editbox" id="username_input_<?php echo $id; ?>"
                                                                </td>
                                                                <td class="edit_td">
                                                                    <span id="lname_<?php echo $id; ?>" class="text"><?php echo $lname; ?></span>
                                                                    <input type="text" value="<?php echo $lname; ?>" class="editbox" id="lname_input_<?php echo $id; ?>"
                                                                </td>
                                                                <td class="edit_td">
                                                                    <span id="fname_<?php echo $id; ?>" class="text"><?php echo $fname; ?></span>
                                                                    <input type="text" value="<?php echo $fname; ?>" class="editbox" id="fname_input_<?php echo $id; ?>"
                                                                </td>   
                                                                 <td class="edit_td">
                                                                    <span id="type_<?php echo $id; ?>" class="text"><?php echo $type; ?></span>
                                                                    <input type="text" value="<?php echo $type; ?>" class="editbox" id="type_input_<?php echo $id; ?>"
                                                                </td>   
                                                                 <td class="edit_td">
                                                                    <span id="active_<?php echo $id; ?>" class="text"><?php echo $active; ?></span>
                                                                    <input type="text" value="<?php echo $active; ?>" class="editbox" id="active_input_<?php echo $id; ?>"
                                                                </td> 
                                                                 <td class="edit_td">
                                                                    <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                                                    <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                                                                </td>   

                                                              <td class="center">
									
									<a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/user/delete/" .$id; ?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
                                                            </tr>
                                                               <?php
                                                        }
                                                    }
                                                    ?>
                                                            
                                                            
						
						
						  </tbody>
					  </table>            
					</div>
				
		
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


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
<script src="<?= base_url(); ?>js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- Page script -->
        
        
         <script type="text/javascript">
            $(function() {
                $("#datatable").dataTable();
            
            });
        </script>
        
        
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
