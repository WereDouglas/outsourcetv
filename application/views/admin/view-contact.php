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
      Contact us
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

                            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/admin/contact/create'  method="post">            
                                <fieldset>
                                  <div class="span4">    
                                             <div class="control-group">
                                        <label class="control-label" for="focusedInput"> Address line 1</label>
                                        <div class="controls">
                                            <input class="focused" name="line1" id="line1"  type="text">
                                        </div>
                                         <div class="controls">
                                            <input class="focused" name="line2" id="line2"  type="text">
                                        </div>
                                         <div class="controls">
                                            <input class="focused" name="line3" id="line3"  type="text">
                                        </div>
                                         <div class="controls">
                                            <input class="focused" name="line4" id="line4"  type="text">
                                        </div>
                                    </div>          
                                 
                              </div>
                                    <div class="span4">                                       
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
								  <th>Address line 1</th>
                                                                   <th>Address line 2</th>	
                                                                       <th>Address line 3</th>	
                                                                           <th>Address line 4</th>	
                                                                   <th>Created on:</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      
                                                      <?php
                                                       if (is_array($contacts) && count($contacts)) {
                                                        foreach ($contacts as $loop) {
                                                           
                                                              $line1 = $loop->line1;
                                                               $line2 = $loop->line2;
                                                                 $line3 = $loop->line3;
                                                                   $line4 = $loop->line4;
                                                                    $created = $loop->created;
                                                                $id = $loop->id;
                                                            ?>  
                                                               <tr id="<?php echo $id; ?>" class="edit_tr">
                                                              
                                                                <td class="edit_td">
                                                                    <span id="line1_<?php echo $id; ?>" class="text"><?php echo $line1; ?></span>
                                                                    <input type="text" value="<?php echo $line1; ?>" class="editbox" id="line1_input_<?php echo $id; ?>"
                                                                </td>
                                                                 <td class="edit_td">
                                                                    <span id="line2_<?php echo $id; ?>" class="text"><?php echo $line2; ?></span>
                                                                    <input type="text" value="<?php echo $line2; ?>" class="editbox" id="line2_input_<?php echo $id; ?>"
                                                                </td>
                                                                 <td class="edit_td">
                                                                    <span id="line3_<?php echo $id; ?>" class="text"><?php echo $line3; ?></span>
                                                                    <input type="text" value="<?php echo $line3; ?>" class="editbox" id="line3_input_<?php echo $id; ?>"
                                                                </td>
                                                                 <td class="edit_td">
                                                                    <span id="line4_<?php echo $id; ?>" class="text"><?php echo $line4; ?></span>
                                                                    <input type="text" value="<?php echo $line4; ?>" class="editbox" id="line4_input_<?php echo $id; ?>"
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
            $("#line1" + ID).hide();
            $("#line1_input_" + ID).show();
            
             $("#line2" + ID).hide();
            $("#line2_input_" + ID).show();
            
             $("#line3" + ID).hide();
            $("#line3_input_" + ID).show();
            
             $("#line4" + ID).hide();
            $("#line4_input_" + ID).show();
            
           

           

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var line1 = $("#line1_input_" + ID).val();
              var line2 = $("#line2_input_" + ID).val();
                var line3 = $("#line3_input_" + ID).val();
                  var line4 = $("#line4_input_" + ID).val();
         
          

            var dataString = 'id=' + ID + '&line1=' + line1+ '&line2=' + line2+ '&line3=' + line3+ '&line4=' + line4  ;
            $("#line1_" + ID).html('<img src="<?= base_url(); ?>img/loading.gif" />'); // Loading image
           
            if (line1.length > 0 )
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/admin/contact/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#line1_" + ID).html(line1);
                         $("#line2_" + ID).html(line2);
                          $("#line3_" + ID).html(line3);
                           $("#line4_" + ID).html(line4);
                       
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
     


