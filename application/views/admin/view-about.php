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
           About us
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

                            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/admin/about/create'  method="post">            
                                <fieldset>
                                    <div class="span4">
                                          
                                    <div class="control-group">
                                        <label class="control-label" for="fileInput">File input</label>
                                        <div class="controls">
                                            <input class="input-file uniform_on" id="imgfile" name="imgfile" type="file">
                                        </div>
                                        <img id="preview"  width=150px" height="150px" src="<?= base_url(); ?>uploads/placeholder.png" alt="Banner image" />

                                    </div> 
                                    </div>
                                  
                                    <div class="span4">
                                           <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Content</label>
							  <div class="controls">
								<textarea class="cleditor" name="details" id="textarea2" rows="3"></textarea>
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
								   <th>Content</th>
                                                                          <th>Created on:</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      
                                                      <?php
                                                       if (is_array($abouts) && count($abouts)) {
                                                        foreach ($abouts as $loop) {

                                                         
                                                            $id = $loop->id;
                                                            $details = $loop->details;
                                                            $image = $loop->image;
                                                            if ($image==""){
                                                                
                                                                $image = "placeholder.png";
                                                            }                                                            
                                                                $created = $loop->created;
                                                            ?>  
                                                               <tr id="<?php echo $id; ?>" class="edit_tr">
                                                                   <td><a href="#">
                                                                           <img class="avatar" alt="" height="60px" width="60px" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>">
								</a></td>
                                                                
                                                                 <td class="edit_td">
                                                                    <span id="details_<?php echo $id; ?>" class="text"><?php echo $details; ?></span>
                                                                    <input type="text" value="<?php echo $details; ?>" class="editbox" id="details_input_<?php echo $id; ?>"
                                                                </td> 
                                                                 
                                                                 <td class="edit_td">
                                                                    <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                                                    <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                                                                </td>   

                                                              <td class="center">
									
									<a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/about/delete/" .$id; ?>">
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
        
        
<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".editbox").hide();
        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#details" + ID).hide();
            $("#details_input_" + ID).show();

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var details = $("#details_input_" + ID).val();
           


            var dataString = 'id=' + ID + '&details=' + details;
            $("#details_" + ID).html('<img src="<?= base_url(); ?>img/loading.gif" />'); // Loading image
          
            if (details.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/admin/about/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#details_" + ID).html(type);
                                            
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
<script src="<?= base_url(); ?>js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="<?= base_url(); ?>js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="<?= base_url(); ?>js/jquery.ui.touch-punch.js"></script>
	
		<script src="<?= base_url(); ?>js/modernizr.js"></script>
                <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
                <script src="<?= base_url(); ?>js/jquery.cookie.js"></script>
	
		<script src='<?= base_url(); ?>js/fullcalendar.min.js'></script>
	

<script src="<?= base_url(); ?>js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- Page script -->
        <script src="<?=  base_url();?>js/jquery.chosen.min.js"></script>
	
		<script src="<?=  base_url();?>js/jquery.uniform.min.js"></script>
        <script src="<?=  base_url();?>js/jquery.cleditor.min.js"></script>
        <script src="<?=  base_url();?>js/jquery.noty.js"></script>
	
		<script src="<?=  base_url();?>js/jquery.elfinder.min.js"></script>
                <script src="<?=  base_url();?>js/jquery.raty.min.js"></script>
                	<script src="<?=  base_url();?>js/jquery.iphone.toggle.js"></script>
	
		<script src="<?=  base_url();?>js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="<?=  base_url();?>js/jquery.gritter.min.js"></script>
	
		<script src="<?=  base_url();?>js/jquery.imagesloaded.js"></script>
	
		<script src="<?=  base_url();?>js/jquery.masonry.min.js"></script>
	
		<script src="<?=  base_url();?>js/jquery.knob.modified.js"></script>
	
		<script src="<?=  base_url();?>js/jquery.sparkline.min.js"></script>
	
		<script src="<?=  base_url();?>js/counter.js"></script>
	
		<script src="<?=  base_url();?>js/retina.js"></script>

		<script src="<?=  base_url();?>js/custom.js"></script>

         <script type="text/javascript">
            $(function() {
                $("#datatable").dataTable();
            
            });
        </script>
     
