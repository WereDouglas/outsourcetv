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
           Banners/Adverts
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

                            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/admin/banner/create'  method="post">            
                                <fieldset>
                                    <div class="span4">
                                          
                                    <div class="control-group">
                                        <label class="control-label" for="fileInput">Image input(Banner 628H X 273W)(Advertisement 328HX265W)</label>
                                        <div class="controls">
                                            <input class="input-file uniform_on" id="imgfile" name="imgfile" type="file">
                                        </div>
                                        <img id="preview"  width=150px" height="150px" src="<?= base_url(); ?>uploads/placeholder.png" alt="Banner image" />

                                    </div> 
                                    </div>
                                  
                                    <div class="span4">
                                              <div class="control-group">
                                        <label class="control-label" for="selectError3">Type</label>
                                        <div class="controls">
                                            <select id="type" name="type">
                                                <option>Advert</option>
                                                <option>Banner</option>

                                            </select>
                                        </div>
                                    </div>
                                         
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button class="btn">Cancel</button>
                                  
                                    </div>
                                 
                                </fieldset>
                            </form>

                        </div><!-- /.box -->


                        </form>	
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
								   <th>Type</th>
                                                                          <th>Created on:</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      
                                                      <?php
                                                       if (is_array($banners) && count($banners)) {
                                                        foreach ($banners as $loop) {

                                                         
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
                                                                    <span id="type_<?php echo $id; ?>" class="text"><?php echo $type; ?></span>
                                                                    <input type="text" value="<?php echo $type; ?>" class="editbox" id="type_input_<?php echo $id; ?>"
                                                                </td> 
                                                                 
                                                                 <td class="edit_td">
                                                                    <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                                                    <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                                                                </td>   

                                                              <td class="center">
									
									<a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/banner/delete/" .$id; ?>">
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
            $("#type" + ID).hide();
            $("#type_input_" + ID).show();
            
           


           

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var type = $("#type_input_" + ID).val();
           


            var dataString = 'id=' + ID + '&type=' + type;
            $("#type_" + ID).html('<img src="<?= base_url(); ?>img/loading.gif" />'); // Loading image
          
            if (type.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/admin/banner/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#type_" + ID).html(type);
                                            
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
