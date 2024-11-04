 <div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Integrations</h3>

                  <div class="row breadcrumbs-top d-inline-block">

                     <div class="breadcrumb-wrapper col-12">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="">Home</a>

                           </li>

                           <li class="breadcrumb-item active">Integration</li>

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

                            
                              
                              
                             

                           </div>

                           <div class="card-content">

                              <!-- /////////////////////////////////////// -->

                              <div class="card-body">
                                 <div class="row">


                                    <form class="row gx-3 gy-2 align-items-center" action="<?php echo site_url('/saveintegration'); ?>" method="POST">
                                    <input type="hidden" name="id" >
                                       <div class="col-md-12">
                                          <label for="name" class="form-label">ManyChat Security Key</label>
                                          <input type='text' id="key_value" class="form-control "  name="key_value" required />
                                       </div>
                                      
                                       <div class="col-md-12"></div>
                                       <div class="col-md-6">
                                                                      
                                       </div>
                                       <div class="col-md-6">
                                       
                                       </div>
                                       <div class="col-md-6">
                                                                      
                                       </div>
                                       <div class="col-md-6">
                                       
                                       </div>
                                       <div class="col-md-12">
                                          <button type="submit"class="btn btn-primary w-md">Save</button>
                                          </div>
                                    </form>
                                 </div>
                                 <br>
                                 <br>
                                 <!-- Task List table -->

                                 <div class="table-responsive">
                                                           

                              <table id="integration-data" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">

                                    <thead>
                                          
                                       <tr>                                
                                       

                                            <th>Sr#</th>
                                            <th>ManyChat Key</th>
                                            <th>Action</th>                                       

                                       </tr>

                                    </thead>  

                                    <tbody>

                                       <?php 
                                       $i = 1;
                                       foreach($integration as $integ){ ?>

                                          <tr> 
                                               <td><?php echo $i; ?></td>                     
                                               <td>
                                                <?php echo $integ['key_value']; ?>
                                               </td>
                                               <td>
                                                  <i class="icon-trash del-integ" style="color: red;cursor:pointer;" id="<?php echo $integ['id']; ?>"></i>
                                                  <i class="pen ft-edit-2 integration-edit" style="color: green;cursor:pointer;" id="<?php echo $integ['id']; ?>"></i>
                                               </td>                                       

                                          </tr>

                                       <?php 
                                       $i++;
                                       } ?>
                                          
                                       

                                    </tbody>  


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
