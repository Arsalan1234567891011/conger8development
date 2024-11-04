<div class="app-content content">
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                  <h3 class="content-header-title mb-0 d-inline-block">Billing</h3>
                  <div class="row breadcrumbs-top d-inline-block">
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/">Home</a>
                           </li>
                           <li class="breadcrumb-item active">Billing</li>
                           
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
            <br>
            <!-- <div class="content-detached content-right"> -->
            <div class="content-body">
               <section class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-head">
                           <div class="card-header">
                              <h4 class="card-title">Billing</h4>
                              <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                              <div class="heading-elements d-flex ">
                                 
                                 <div class="mr-2">
                                   
                                  </div>
                                 <div style="display:none" class="">
                                     <a href="<?php echo base_url('/adduser'); ?>" style="color: #fff !important;    padding: 12px 22px; font-size: 15px;" class="dropdown-item btn-primary btn-sm"><i class="ft-plus white"></i> Add Users</a> 
                                 </div
                              </div> 
                              <?php 
                              $user_role = get_user_role(session()->user_id); 
                              if( $user_role=='superadmin')
                              {
                              ?>
                              <br><br>
                              <div  class="btn-group float-md-left" >
                                 <div >
                                    
                                    <select name="fetchval" id="fetchval">
                                       <option value="" disable="" selected="">Select Role</option>     
                                       <option value="churchadmin" >Churchadmin</option>  
                                       <option value="user" >Users</option> 
                                       <option value="superadmin" >superadmin</option>                                   



                                    </select>
                                 </div>
<!-- 
                                 <div >
                                    <label>Select Role</label>
                                    <select class="table-filter"  id="role" name="role">
                                       <option value=""></option>                                   
                                    </select>
                                 </div>
                              </div> -->
                              <br>
                              <?php 
                              }
                           
                              ?> 
                                       
                           </div>
                        </div>
                        <div class="card-content">
                           <div class="card-body">
                              <!-- Task List table -->
                              <div class="table-responsive">
                                 <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                    <thead>
                                       <tr>
                                          <!-- <th>Sr#</th> -->
                                          <th>Date</th>
                                          <th>Users</th>
                                          <th>amount</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                       </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                          <!-- <th>Sr#</th> -->
                                         <th>Date</th>
                                          <th>Users</th>
                                          <th>amount</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                       </tr>
                                    </tfoot>
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

      <script>

         $(document).ready(function(){
             $(document).on('click', '.user_remove', function(e) {
                 
                 var id = $(this).attr('id');
              swal({
                    title: "Are you sure?",
                    // text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                         $.ajax({
                            url: '<?php echo base_url('removeuser'); ?>', 
                            data: { id: id }, 
                            type: 'POST', 
                            dataType: 'json', 
                            success: function(data){
                                swal("Deleted!",data, "success");
                                location.reload();
                            },
                            error: function(xhr, status, error){
                             //alert("error");
                            }
                        });
                    
                    } else {
                      //swal("Cancelled", "Operation Cancelled by User", "error");
                    }
                });

             });

          var church = "";
          var type = "" ;

          load_interests_table(church,type);


          function load_interests_table(church,type){

            

            if ( $.fn.dataTable.isDataTable( '#users-contacts' ) ) {
              $( '#users-contacts' ).DataTable().destroy();
            }


              var dataTable = $('#users-contacts').DataTable({

               'processing': true,

               'serverSide': true,

               'serverMethod': 'POST',

               dom: 'Blfrtip',
               buttons: [
                     'copyHtml5',
                     'excelHtml5',
                     'csvHtml5',
                     'pdfHtml5'
               ],

               //'searching': false, // Remove default Search Control

               'ajax': {

                  'url':'/getbilling',

                  'data': function(data){
                    data.searchByChurch = church;
                    data.searchByType = type;

                 }

               },

               'columns': [

          
                  { data: 'created_at' }, 

                  { data: 'Users' }, 

                  { data: 'amount' },

                  { data: 'Status' },

                  { data: 'Actions' },

               ]

             });

              if(status != ""){
                dataTable.draw();
              }

              if(type != ""){
                dataTable.draw();
              }

          }


          $('#status').on('change', function() {
                  load_interests_table($(this).val(),$("#type").val());
          });


          $('#type').on('change', function() {
                  load_interests_table($("#status").val(),$(this).val());
          });
          
         });

      </script>

      <!-- 15.march.2023 start -->
