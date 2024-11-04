<div class="app-content content">
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                  <h3 class="content-header-title mb-0 d-inline-block">Users</h3>
                  <div class="row breadcrumbs-top d-inline-block">
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/">Home</a>
                           </li>
                           <li class="breadcrumb-item active">Users</li>
                           
                        </ol>
                     </div>
                  </div>
               </div>


               <input type="hidden" name="churchadminid" id="churchadminid" value="<?php echo $churchadminid; ?>">

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
                              <h4 class="card-title">All Users</h4>
                              <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                                            
                           </div>
                        </div>
                        <div class="card-content">
                           <div class="card-body">
                              <!-- Task List table -->
                              <div class="table-responsive">
                                 <table id="church_users" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                    <thead>
                                       <tr>
                                          <!-- <th>Sr#</th> -->
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Phone</th>
                                          <th>Role</th>
                                       </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                          <!-- <th>Sr#</th> -->
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Phone</th>
                                          <th>Role</th>
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

          var churchid =$('#churchadminid').val();

          

          load_church_users_table(churchid);


          function load_church_users_table(churchid){

            

            if ( $.fn.dataTable.isDataTable( '#church_users' ) ) {
              $( '#church_users' ).DataTable().destroy();
            }


              var dataTable = $('#church_users').DataTable({

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

                  'url':'getuserdataforchurchurchusers',

                  'data': function(data){
                    data.churchid = churchid;
                

                 }

               },

               'columns': [

          
                  { data: 'Name' }, 

                  { data: 'Email' }, 

                  { data: 'Phone' },

                  { data: 'Role' },

               ]

             });

              if(status != ""){
                dataTable.draw();
              }

            

          }

      

       

 
         });

      </script>

      <!-- 15.march.2023 start -->
