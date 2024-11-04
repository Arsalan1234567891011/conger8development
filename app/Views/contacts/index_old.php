      <?php

$urole = get_user_role(session()->user_id);

if($urole == 'churchadmin'){

  $att_link = get_att_link();
  //$att_link = get_att_link_church();
}





if($urole == 'user'){

  $att_link = get_sub_user_att_link();
  //$att_link = get_att_link_church();

}


if($urole == 'superadmin'){

  $att_link = "";
  //$att_link = get_att_link_church();

}



?>

<!-- In your view -->
<?php $session = \Config\Services::session(); ?>

<?php if ($session->has('toast_message')): ?>
    <div class="toast alert-<?php echo $session->getFlashdata('toast_message')['type']; ?>">
        <?php echo $session->getFlashdata('toast_message')['message']; ?>
    </div>
<?php endif; ?>


      <div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Contacts</h3>

                  <div class="row breadcrumbs-top d-inline-block">

                     <div class="breadcrumb-wrapper col-12">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="">Home</a>

                           </li>

                           <li class="breadcrumb-item active">Contacts</li>

                        </ol>

                     </div>

                  </div>

               </div>

               <div class="content-header-right col-md-4 col-12">

                  <div class="btn-group float-md-right">

                     <!-- <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Action</button> -->

                     <div class="dropdown-menu arrow">

                        <a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>

                     </div>

                  </div>

               </div>

            </div>

            <!-- <div class="content-detached content-right"> -->

            <div class="content-body">

               <section class="row">

                  <div class="col-12">
                  <div class="row">
                                 
                          
                     </div>
                        
                     <div class="card">                   
                        

                        <div class="card-head">

                           <div class="card-header">
                              <h4 class="card-title">Filter Results</h4>
                              <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                              <div class="row">
                                <div class="col-3">
                                    <select class="form-control" id="status">
                                      <option value="">Select Status</option> 
                                      <option value="active">Active</option> 
                                    </select>

                                </div>
                                <div class="col-3">
                                        <select class="form-control" id="type">
                                          <option value="">Select Type</option> 
                                          <option value="Member">Member</option> 
                                          <option value="Visitor">Visitor</option>
                                          <option value="Non-member">Non-member</option>
                                        </select>
                                </div>
                              </div>
                              <div class="heading-elements">  
                                    <!-- <a target="_blank" href='<?php //echo base_url('/addexternalcontact')."?id=".$att_link; ?>' class="btn btn-danger">External Contact</a>                                -->
                                    </div>
                              <div class="">
                              <!-- <div class="content-header-right col-md-4 col-12"> -->
                                 <div class="btn-group float-md-right">
                                 
                                 <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Action</button>
                                 <div class="dropdown-menu arrow">

                                    <a class="dropdown-item" href="<?php echo base_url('/addcontacts'); ?>"><i class="fa icon-plus"></i> Add Contacts</a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="<?php echo base_url('/import_contact'); ?>"><i class="fa icon-cloud-upload"></i> Import Contacts</a>

                                    <div class="dropdown-divider"></div>

                                    <!-- <a class="dropdown-item" href="https://form.congreg8.org/contact.php?id=<?php echo $att_link; ?>"><i class="fa icon-cloud-upload"></i> Add Contact Via External Link</a> -->
                                    <a class="dropdown-item" href='<?php echo base_url('/addexternalcontact')."?id=".$att_link; ?>'><i class="fa icon-cloud-upload"></i> Add Contact Via External Link</a>

                                 </div>
                                 <!-- </div> -->
                              </div>

                       


                                 
                              </div>

                           </div>

                           <div class="card-content">

                              <!-- /////////////////////////////////////// -->

                              <div class="card-body">

                                 <!-- Task List table -->

                                 <div class="table-responsive">
                                                           

                              <table id="contact-data" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">

                                    <thead>
                                          
                                       <tr>                                
                                       

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                            <th>Tags</th>                                       

                                       </tr>

                                    </thead>                                  

                                 </table>
                           

                              </div>

                              </div>

                           </div>

                        </div>

                  </div>

               </section>

               </div>

            </div>

         </div>

      
      <!-- BEGIN VENDOR JS-->

      <script src="<?php echo base_url(); ?>/app-assets/vendors/js/vendors.min.js"></script>

      <!-- BEGIN VENDOR JS-->
      


    

      <!-- BEGIN PAGE VENDOR JS-->

    


      <!-- END PAGE VENDOR JS-->

      <!-- BEGIN ROBUST JS-->

      <script src="<?php echo base_url(); ?>/app-assets/js/core/app-menu.js"></script>

      <script src="<?php echo base_url(); ?>/app-assets/js/core/app.js"></script>

      <script src="<?php echo base_url(); ?>/app-assets/vendors/js/extensions/sweetalert.min.js"></script>

      <!-- END ROBUST JS-->

      <!-- BEGIN PAGE LEVEL JS-->

      <script src="<?php echo base_url(); ?>/app-assets/js/scripts/pages/users-contacts.js"></script>

      <!-- END PAGE LEVEL JS-->

      <!-- <script type="text/javascript">

         $(document).ready(function () {

         

         var table = $('#users-contacts').DataTable({

         "processing": true,
         dom: 'Bfrtip',       

         "order": [[0, 'desc']],

         "columnDefs": [

                  {

                      "targets": [0],

                      "visible": false,

                      "orderable": false,

                      "searchable": false

                  }],

         "bDestroy": true

         });

         

         //table.columns( [0] ).visible( false );

         });

         

      </script> -->

