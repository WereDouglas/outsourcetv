<link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link id="bootstrap-style" href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link id="base-style-responsive" href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
<!-- end: CSS -->

<link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">
<link id="base-style-responsive" href="<?php echo base_url(); ?>css/table.css" rel="stylesheet">

<?php echo $this->session->flashdata('msg'); ?>
<div class="row-fluid">
    <div class="span12 widget-container-span">
      	
					<div class="box-content">
                                            <table class="jobs table table-striped table-bordered bootstrap-datatable datatable" id="datatable">
						  <thead>
							  <tr>  
                                                               <th></th>
								  <th>User</th>
								 <th>Transaction</th>
                                                                  <th>Price</th>
                                                                  <th>Name</th>
                                                                   <th>Contact</th>
                                                                   <th>Country</th>
                                                                    <th>Created on:</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      
                                                      <?php
                                                       if (is_array($equips) && count($equips)) {
                                                        foreach ($equips as $loop) {         ?>  
                                                               <tr >
                                                                   <td><img height="30px" width="20px" src="<?php echo base_url(); ?>uploads/<?=$loop->picture?>"></td>
                                                                   <td><?=$loop->username?></td>
                                                                    <td><?=$loop->transaction?></td>
                                                                     <td><?=$loop->price?></td>
                                                                      <td><?=$loop->name?></td>                                                                      
                                                                         <td><?=$loop->contact?></td>
                                                                         <td><?=$loop->country?></td>
                                                                       <td><?=$loop->created?></td>
                                                                

                                                                   <td >
									
									<a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/mequipment/delete/" .$loop->id; ?>">
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
