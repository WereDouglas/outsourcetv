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
        News
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

                            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/admin/news/create'  method="post">            
                                <fieldset>
                                  <div class="span4">    
                                             <div class="control-group">
                                        <label class="control-label" for="focusedInput"> Heading</label>
                                        <div class="controls">
                                            <input class="focused" name="heading" id="heading"  type="text">
                                        </div>
                                    </div>          
                                 
                              </div>
                                    <div class="span4"> 
                                        <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="description" id="textarea2" rows="3"></textarea>
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
							  <tr>  
								  <th>Heading</th>
                                                                   <th>Description</th>								 
                                                                   <th>Created on:</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      
                                                      <?php
                                                       if (is_array($news) && count($news)) {
                                                        foreach ($news as $loop) {
                                                           
                                                              $heading = $loop->heading;
                                                              $description = $loop->description;
                                                                $created = $loop->created;
                                                                $id = $loop->id;
                                                            ?>  
                                                               <tr id="<?php echo $id; ?>" class="edit_tr">
                                                              
                                                                <td class="edit_td">
                                                                    <span id="heading_<?php echo $id; ?>" class="text"><?php echo $heading; ?></span>
                                                                    <input type="text" value="<?php echo $heading; ?>" class="editbox" id="heading_input_<?php echo $id; ?>"
                                                                </td>
                                                                 <td class="edit_td">
                                                                    <span id="description_<?php echo $id; ?>" class="text"><?php echo $description; ?></span>
                                                                 
                                                                           <textarea class="editbox cleditor" value="<?php echo $description; ?>"  id="description_input_<?php echo $id; ?>" name="description"  rows="2"><?=$description?></textarea>
						
                                                                </td>
                                                              
                                                             
                                                                 <td class="edit_td">
                                                                    <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                                                    <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                                                                </td>   

                                                              <td class="center">
									
									<a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/news/delete/" .$id; ?>">
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
    $(document).ready(function ()
    {
        $(".editbox").hide();
         $(".cleditor").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#heading" + ID).hide();
            $("#heading_input_" + ID).show();
            
              $("#description" + ID).hide();
            $("#description_input_" + ID).show();
          

           

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var description = $("#description_input_" + ID).val();
              var heading = $("#heading_input_" + ID).val();
          

            var dataString = 'id=' + ID + '&heading=' + heading+ '&description=' + description ;
            $("#heading_" + ID).html('<img src="<?= base_url(); ?>img/loading.gif" />'); // Loading image
           
            if (heading.length > 0 )
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/admin/news/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#heading_" + ID).html(heading);
                         $("#description_" + ID).html(description);
                       
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
             $(".cleditor").hide();
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
     


