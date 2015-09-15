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
           Transaction types
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

                            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/admin/transaction/create'  method="post">            
                                <fieldset>
                                    <div class="span4">
                                             <div class="control-group">
                                        <label class="control-label" for="focusedInput"> Transaction name</label>
                                        <div class="controls">
                                            <input class="focused" name="name" id="name"  type="text">
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
								  <th>name</th>
								 
                                                                    <th>Created on:</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      
                                                      <?php
                                                       if (is_array($transactions) && count($transactions)) {
                                                        foreach ($transactions as $loop) {

                                                           
                                                            $name = $loop->name;
                                                                $created = $loop->created;
                                                                $id = $loop->id;
                                                            ?>  
                                                               <tr id="<?php echo $id; ?>" class="edit_tr">
                                                              
                                                                <td class="edit_td">
                                                                    <span id="name_<?php echo $id; ?>" class="text"><?php echo $name; ?></span>
                                                                    <input type="text" value="<?php echo $name; ?>" class="editbox" id="name_input_<?php echo $id; ?>"
                                                                </td>
                                                              
                                                             
                                                                 <td class="edit_td">
                                                                    <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                                                    <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                                                                </td>   

                                                              <td class="center">
									
									<a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/service/delete/" .$id; ?>">
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
            $("#name" + ID).hide();
            $("#name_input_" + ID).show();
          

           

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var name = $("#name_input_" + ID).val();
          

            var dataString = 'id=' + ID + '&name=' + name ;
            $("#name_" + ID).html('<img src="<?= base_url(); ?>img/loading.gif" />'); // Loading image
           
            if (name.length > 0 )
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/admin/transaction/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#name_" + ID).html(name);
                       
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
